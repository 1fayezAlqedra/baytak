const { createApp, ref, computed, onMounted, watch } = Vue;

// Sample bookings data (mock data from previous form submissions)
const generateMockBookings = () => {
    const names = [
        "أحمد محمد",
        "سارة علي",
        "محمد خالد",
        "نور إبراهيم",
        "ليلى حسن",
        "عمر عبدالله",
        "فاطمة الزهراء",
        "يوسف عادل",
    ];
    const emails = [
        "ahmed@example.com",
        "sara@example.com",
        "mohammed@example.com",
        "nour@example.com",
        "laila@example.com",
        "omar@example.com",
        "fatima@example.com",
        "yousef@example.com",
    ];
    const challenges = [
        "قلق وتوتر",
        "اكتئاب بسيط",
        "صعوبات في العلاقات",
        "ضغط نفسي",
        "مشاكل نوم",
        "ضعف التركيز",
        "فقدان الشغف",
        "صدمة نفسية",
    ];
    const methods = [
        "email",
        "whatsapp",
        "phone",
        "email",
        "whatsapp",
        "phone",
        "email",
        "whatsapp",
    ];
    const statuses = [
        "pending",
        "pending",
        "contacted",
        "pending",
        "completed",
        "contacted",
        "pending",
        "contacted",
    ];

    return Array.from({ length: 12 }, (_, i) => ({
        id: i + 1,
        fullName: names[i % names.length],
        email: emails[i % emails.length],
        phone: "+9627xxxxxxx",
        challenge: challenges[i % challenges.length],
        challengeShort: challenges[i % challenges.length].substring(0, 25),
        goals: "تحسين الصحة النفسية والعيش بسلام",
        contactMethod: methods[i % methods.length],
        contactMethodDisplay:
            methods[i % methods.length] === "email"
                ? "📧 البريد الإلكتروني"
                : methods[i % methods.length] === "whatsapp"
                  ? "💬 واتساب"
                  : "📞 مكالمة هاتفية",
        status: statuses[i % statuses.length],
        createdAt: new Date(Date.now() - i * 86400000).toISOString(),
    }));
};

createApp({
    setup() {
        const bookings = ref(generateMockBookings());
        const filterStatus = ref("all");
        let contactChart = null;
        let weeklyChart = null;

        // Computed stats
        const totalBookings = computed(() => bookings.value.length);
        const uniqueClients = computed(
            () => new Set(bookings.value.map((b) => b.email)).size,
        );
        const contactedCount = computed(
            () =>
                bookings.value.filter(
                    (b) => b.status === "contacted" || b.status === "completed",
                ).length,
        );
        const contactRate = computed(() =>
            ((contactedCount.value / totalBookings.value) * 100).toFixed(1),
        );
        const satisfactionRate = ref(94);

        // New bookings this month (mock)
        const newBookingsThisMonth = computed(() => {
            const now = new Date();
            const currentMonth = now.getMonth();
            return bookings.value.filter((b) => {
                const date = new Date(b.createdAt);
                return date.getMonth() === currentMonth;
            }).length;
        });

        const filteredBookings = computed(() => {
            if (filterStatus.value === "all") return bookings.value;
            return bookings.value.filter(
                (b) => b.status === filterStatus.value,
            );
        });

        // Contact method distribution for chart
        const contactMethodStats = computed(() => {
            const methods = { email: 0, whatsapp: 0, phone: 0 };
            bookings.value.forEach((b) => {
                if (b.contactMethod === "email") methods.email++;
                else if (b.contactMethod === "whatsapp") methods.whatsapp++;
                else if (b.contactMethod === "phone") methods.phone++;
            });
            return methods;
        });

        // Weekly bookings (last 7 days mock distribution)
        const weeklyData = computed(() => {
            const days = [
                "الأحد",
                "الإثنين",
                "الثلاثاء",
                "الأربعاء",
                "الخميس",
                "الجمعة",
                "السبت",
            ];
            const counts = [3, 5, 4, 6, 7, 2, 4];
            return { days, counts };
        });

        const getStatusText = (status) => {
            const statusMap = {
                pending: "قيد الانتظار | Pending",
                contacted: "تم التواصل | Contacted",
                completed: "مكتمل | Completed",
            };
            return statusMap[status] || status;
        };

        const updateStatus = (id, newStatus) => {
            const booking = bookings.value.find((b) => b.id === id);
            if (booking) {
                booking.status = newStatus;
                // Re-render charts after status change
                setTimeout(() => {
                    if (contactChart) contactChart.destroy();
                    if (weeklyChart) weeklyChart.destroy();
                    initCharts();
                }, 50);
            }
        };

        const viewDetails = (booking) => {
            alert(
                `تفاصيل الحجز | Booking Details:\n\nالاسم: ${booking.fullName}\nالبريد: ${booking.email}\nالتحدي: ${booking.challenge}\nالهدف: ${booking.goals}\nطريقة التواصل: ${booking.contactMethodDisplay}\nالحالة: ${getStatusText(booking.status)}`,
            );
        };

        const goToHome = () => {
            window.location.href =
                window.location.pathname.replace(/dashboard\.html$/, "") +
                "index.html";
            // If on same page, just reload or alert
            alert("سيتم التوجيه للصفحة الرئيسية | Redirecting to home page");
            // For demo, we can reload main page - but in real scenario you'd link
        };

        const initCharts = () => {
            const ctx1 = document
                .getElementById("contactMethodChart")
                ?.getContext("2d");
            const ctx2 = document
                .getElementById("weeklyBookingsChart")
                ?.getContext("2d");

            if (ctx1) {
                if (contactChart) contactChart.destroy();
                contactChart = new Chart(ctx1, {
                    type: "doughnut",
                    data: {
                        labels: [
                            "البريد الإلكتروني | Email",
                            "واتساب | WhatsApp",
                            "مكالمة | Phone Call",
                        ],
                        datasets: [
                            {
                                data: [
                                    contactMethodStats.value.email,
                                    contactMethodStats.value.whatsapp,
                                    contactMethodStats.value.phone,
                                ],
                                backgroundColor: [
                                    "#66bb6a",
                                    "#81c784",
                                    "#a5d6a7",
                                ],
                                borderWidth: 0,
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                position: "bottom",
                                labels: { font: { family: "Cairo" } },
                            },
                        },
                    },
                });
            }

            if (ctx2) {
                if (weeklyChart) weeklyChart.destroy();
                weeklyChart = new Chart(ctx2, {
                    type: "line",
                    data: {
                        labels: weeklyData.value.days,
                        datasets: [
                            {
                                label: "عدد الحجوزات | Bookings",
                                data: weeklyData.value.counts,
                                borderColor: "#2e7d32",
                                backgroundColor: "rgba(46,125,50,0.1)",
                                tension: 0.3,
                                fill: true,
                                pointBackgroundColor: "#43a047",
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                position: "top",
                                labels: { font: { family: "Cairo" } },
                            },
                        },
                    },
                });
            }
        };

        onMounted(() => {
            initCharts();
        });

        watch([contactMethodStats, weeklyData], () => {
            setTimeout(() => {
                if (contactChart) contactChart.destroy();
                if (weeklyChart) weeklyChart.destroy();
                initCharts();
            }, 50);
        });

        return {
            bookings,
            filterStatus,
            totalBookings,
            uniqueClients,
            contactedCount,
            contactRate,
            satisfactionRate,
            newBookingsThisMonth,
            filteredBookings,
            contactMethodStats,
            weeklyData,
            getStatusText,
            updateStatus,
            viewDetails,
            goToHome,
        };
    },
}).mount("#app");
