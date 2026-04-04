const { createApp, ref, computed, onMounted, watch } = Vue;

createApp({
    setup() {
        // 🌐 API
        axios.defaults.baseURL = "http://127.0.0.1:8000/api";

        // 📦 البيانات
        const bookings = ref([]);
        const filterStatus = ref("all");
        const loadingId = ref(null);

        // 📄 Pagination
        const currentPage = ref(1);
        const lastPage = ref(1);

        // 📊 Charts
        let contactChart = null;
        let weeklyChart = null;

        const labels = ref([]);
        const values = ref([]);

        // 📡 جلب الحجوزات
        const fetchBookings = (page = 1) => {
            axios
                .get(`/bookings?page=${page}&per_page=10`)
                .then((res) => {
                    bookings.value = res.data.data.map((b) => ({
                        ...b,
                        fullName: b.full_name,
                        contactMethod: b.contact_method,
                        createdAt: b.created_at,
                        challengeShort: b.challenge?.substring(0, 25),

                        contactMethodDisplay:
                            b.contact_method === "email"
                                ? "📧 Email"
                                : b.contact_method === "whatsapp"
                                ? "💬 WhatsApp"
                                : "📞 Phone",
                    }));

                    currentPage.value = res.data.current_page;
                    lastPage.value = res.data.last_page;
                })
                .catch((err) => console.error(err));
        };

        // 🔄 تحديث الحالة
        const updateStatus = (id, status) => {
            loadingId.value = id;

            axios
                .patch(`/bookings/${id}/status`, { status })
                .then(() => {
                    const booking = bookings.value.find((b) => b.id === id);
                    if (booking) booking.status = status;
                })
                .finally(() => (loadingId.value = null));
        };

        // 🧹 تنظيف الرقم
        const cleanPhone = (phone) => {
            if (!phone) return "";
            return phone.replace(/\D/g, "");
        };

        // ✉️ فتح الإيميل
        const emailLink = (email) => {
            return `mailto:${email}`;
        };

        // 📊 إحصائيات
        const totalBookings = computed(() => bookings.value.length);

        const uniqueClients = computed(
            () => new Set(bookings.value.map((b) => b.email)).size
        );

        const contactedCount = computed(() =>
            bookings.value.filter(
                (b) => b.status === "contacted" || b.status === "completed"
            ).length
        );

        const contactRate = computed(() =>
            totalBookings.value === 0
                ? 0
                : ((contactedCount.value / totalBookings.value) * 100).toFixed(1)
        );

        const pendingCount = computed(() =>
            bookings.value.filter((b) => b.status === "pending").length
        );

        const pendingRate = computed(() =>
            totalBookings.value === 0
                ? 0
                : ((pendingCount.value / totalBookings.value) * 100).toFixed(1)
        );

        // 🔍 فلترة
        const filteredBookings = computed(() => {
            if (filterStatus.value === "all") return bookings.value;
            return bookings.value.filter(
                (b) => b.status === filterStatus.value
            );
        });

        // 📞 طرق التواصل
        const contactMethodStats = computed(() => {
            const stats = { email: 0, whatsapp: 0, phone: 0 };

            bookings.value.forEach((b) => {
                if (b.contactMethod === "email") stats.email++;
                else if (b.contactMethod === "whatsapp") stats.whatsapp++;
                else stats.phone++;
            });

            return stats;
        });

        // 📊 Pie Chart
        const renderContactChart = () => {
            const ctx = document.getElementById("contactMethodChart");
            if (!ctx) return;

            if (contactChart) contactChart.destroy();

            contactChart = new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["Email", "WhatsApp", "Phone"],
                    datasets: [
                        {
                            data: [
                                contactMethodStats.value.email,
                                contactMethodStats.value.whatsapp,
                                contactMethodStats.value.phone,
                            ],
                        },
                    ],
                },
            });
        };

        // 📈 جلب الأسبوع
        const fetchWeeklyStats = () => {
            axios.get("/weekly-stats").then((res) => {
                labels.value = res.data.map((i) => i.date);
                values.value = res.data.map((i) => i.total);

                renderWeeklyChart();
            });
        };

        // 📈 Line Chart
        const renderWeeklyChart = () => {
            const ctx = document.getElementById("weeklyChart");
            if (!ctx) return;

            if (weeklyChart) weeklyChart.destroy();

            weeklyChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: labels.value,
                    datasets: [
                        {
                            label: "الحجوزات الأسبوعية",
                            data: values.value,
                            borderWidth: 2,
                            tension: 0.4,
                        },
                    ],
                },
            });
        };

        // 🏷️ الحالة
        const getStatusText = (status) => {
            const map = {
                pending: "قيد الانتظار",
                contacted: "تم التواصل",
                completed: "مكتمل",
            };
            return map[status] || status;
        };

        // 👁️ تفاصيل
        const viewDetails = (booking) => {
            alert(`
الاسم: ${booking.fullName}
البريد: ${booking.email}
التحدي: ${booking.challenge}
الهدف: ${booking.goals}
            `);
        };

        // 🔘 Pagination
        const nextPage = () => {
            if (currentPage.value < lastPage.value) {
                fetchBookings(currentPage.value + 1);
            }
        };

        const prevPage = () => {
            if (currentPage.value > 1) {
                fetchBookings(currentPage.value - 1);
            }
        };

        // 🚀 تحميل أولي
        onMounted(() => {
            fetchBookings();
            fetchWeeklyStats();
        });

        // 👀 تحديث الشارت
        watch(bookings, () => {
            renderContactChart();
        });

        return {
            bookings,
            filterStatus,
            filteredBookings,

            totalBookings,
            uniqueClients,
            contactedCount,
            contactRate,
            pendingCount,
            pendingRate,

            updateStatus,
            getStatusText,
            viewDetails,
            loadingId,

            currentPage,
            lastPage,
            nextPage,
            prevPage,

            cleanPhone,
            emailLink,
        };
    },
}).mount("#app");
