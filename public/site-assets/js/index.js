const { createApp, ref, computed, onMounted, watch } = Vue;

createApp({
    setup() {
        // 🌐 API Base URL
        axios.defaults.baseURL = "http://127.0.0.1:8000";

        // 📦 البيانات
        const bookings = ref([]);
        const filterStatus = ref("all");
        const loadingId = ref(null);

        let contactChart = null;

        // 📡 جلب البيانات
        const fetchBookings = () => {
            axios.get("/api/bookings")
                .then((res) => {
                    bookings.value = res.data.map((b) => ({
                        ...b,
                        fullName: b.full_name,
                        contactMethod: b.contact_method,
                        createdAt: b.created_at,
                        challengeShort: b.challenge?.substring(0, 25),

                        contactMethodDisplay:
                            b.contact_method === "email"
                                ? "📧 البريد الإلكتروني"
                                : b.contact_method === "whatsapp"
                                ? "💬 واتساب"
                                : "📞 مكالمة",
                    }));
                })
                .catch((err) => console.error(err));
        };

        // 🔄 تحديث الحالة (Backend 🔥)
        const updateStatus = (id, status) => {
            loadingId.value = id;

            axios.patch(`/api/bookings/${id}/status`, { status })
                .then((res) => {
                    console.log(res.data.message);

                    // تحديث مباشر بدون reload
                    const booking = bookings.value.find(b => b.id === id);
                    if (booking) booking.status = status;
                })
                .catch((err) => console.error(err))
                .finally(() => loadingId.value = null);
        };

        // 📊 إحصائيات
        const totalBookings = computed(() => bookings.value.length);

        const uniqueClients = computed(() =>
            new Set(bookings.value.map(b => b.email)).size
        );

        const contactedCount = computed(() =>
            bookings.value.filter(
                b => b.status === "contacted" || b.status === "completed"
            ).length
        );

        const contactRate = computed(() =>
            totalBookings.value === 0
                ? 0
                : ((contactedCount.value / totalBookings.value) * 100).toFixed(1)
        );

        const newBookingsThisMonth = computed(() => {
            const now = new Date();
            const currentMonth = now.getMonth();

            return bookings.value.filter((b) => {
                const date = new Date(b.createdAt);
                return date.getMonth() === currentMonth;
            }).length;
        });

        // 🔍 فلترة
        const filteredBookings = computed(() => {
            if (filterStatus.value === "all") return bookings.value;
            return bookings.value.filter(b => b.status === filterStatus.value);
        });

        // 📊 طرق التواصل
        const contactMethodStats = computed(() => {
            const methods = { email: 0, whatsapp: 0, phone: 0 };

            bookings.value.forEach((b) => {
                if (b.contactMethod === "email") methods.email++;
                else if (b.contactMethod === "whatsapp") methods.whatsapp++;
                else if (b.contactMethod === "phone") methods.phone++;
            });

            return methods;
        });

        // 🏷️ ترجمة الحالة
        const getStatusText = (status) => {
            const map = {
                pending: "قيد الانتظار",
                contacted: "تم التواصل",
                completed: "مكتمل",
            };
            return map[status] || status;
        };

        // 👁️ عرض التفاصيل
        const viewDetails = (booking) => {
            alert(`
الاسم: ${booking.fullName}
البريد: ${booking.email}
التحدي: ${booking.challenge}
الهدف: ${booking.goals}
            `);
        };

        // 📊 رسم Chart
        const initCharts = () => {
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

        // 🚀 عند التحميل
        onMounted(() => {
            fetchBookings();
        });

        // 👀 تحديث الرسم عند تغيير البيانات
        watch(bookings, () => {
            initCharts();
        });

        return {
            bookings,
            filterStatus,
            filteredBookings,
            totalBookings,
            uniqueClients,
            contactedCount,
            contactRate,
            newBookingsThisMonth,
            getStatusText,
            updateStatus,
            viewDetails,
            loadingId,
        };
    },
}).mount("#app");
