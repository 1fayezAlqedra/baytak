<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>بيتك | Bytak - لوحة التحكم | Dashboard</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Vue 3 CDN -->
    <script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>
    <!-- Chart.js for simple charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(145deg, #e8f5e9 0%, #c8e6c9 100%);
            color: #1e3a2f;
            line-height: 1.5;
            padding: 2rem 1rem;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* main card */
        .dashboard-card {
            background: rgba(255, 255, 255, 0.96);
            border-radius: 48px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(80, 180, 100, 0.2);
            overflow: hidden;
        }

        /* header */
        .dashboard-header {
            background: #f1fcf0;
            padding: 1.5rem 2rem;
            border-bottom: 2px solid #b9f6ca;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            background: #2e7d32;
            width: 50px;
            height: 50px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 12px -6px rgba(46, 125, 50, 0.3);
        }

        .logo-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .header-title h1 {
            font-size: 1.6rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1b5e20, #43a047);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .header-title p {
            font-size: 0.8rem;
            color: #2b5e3b;
        }

        .back-link {
            background: white;
            padding: 0.6rem 1.2rem;
            border-radius: 40px;
            text-decoration: none;
            color: #2e7d32;
            font-weight: 600;
            transition: all 0.2s;
            border: 1px solid #c8e6c9;
        }

        .back-link:hover {
            background: #e8f5e9;
            transform: translateY(-2px);
        }

        /* stats grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            padding: 2rem 2rem 1rem 2rem;
        }

        .stat-dashboard-card {
            background: white;
            padding: 1.5rem;
            border-radius: 32px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #c8e6c9;
            transition: transform 0.2s;
        }

        .stat-dashboard-card:hover {
            transform: translateY(-4px);
        }

        .stat-icon {
            font-size: 2.5rem;
            color: #2e7d32;
            margin-bottom: 0.5rem;
        }

        .stat-number-dash {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1b5e20;
        }

        .stat-label-dash {
            font-size: 0.9rem;
            color: #527a5c;
            font-weight: 500;
        }

        .stat-trend {
            font-size: 0.75rem;
            margin-top: 8px;
            color: #66bb6a;
        }

        /* charts row */
        .charts-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
            padding: 0 2rem 1.5rem 2rem;
        }

        .chart-box {
            background: white;
            border-radius: 32px;
            padding: 1.2rem;
            border: 1px solid #c8e6c9;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .chart-title {
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f4f2d;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        canvas {
            max-height: 250px;
            width: 100%;
        }

        /* bookings table */
        .bookings-section {
            padding: 0 2rem 2rem 2rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .section-header h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1a4a2a;
        }

        .filter-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: #e8f5e9;
            border: none;
            padding: 0.4rem 1rem;
            border-radius: 30px;
            cursor: pointer;
            font-family: 'Cairo', sans-serif;
            font-weight: 500;
            color: #2e5c2e;
            transition: all 0.2s;
        }

        .filter-btn.active {
            background: #2e7d32;
            color: white;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 28px;
            background: #f9fff9;
            border: 1px solid #d4e6d4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        th {
            background: #eaf7ea;
            padding: 1rem;
            text-align: right;
            font-weight: 700;
            color: #1f4f2d;
        }

        td {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid #e0f0e0;
            color: #2c5e3a;
        }

        .contact-badge {
            background: #e8f5e9;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
            font-size: 0.75rem;
            display: inline-block;
        }

        .status-badge {
            padding: 0.2rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3e0;
            color: #e67e22;
        }

        .status-contacted {
            background: #e3f2fd;
            color: #1976d2;
        }

        .status-completed {
            background: #e8f5e9;
            color: #388e3c;
        }

        .action-btn {
            background: none;
            border: none;
            color: #2e7d32;
            cursor: pointer;
            margin: 0 4px;
            font-size: 1rem;
            transition: 0.2s;
        }

        .action-btn:hover {
            color: #1b5e20;
            transform: scale(1.1);
        }

        footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.8rem;
            color: #426e49;
            border-top: 1px solid #cfe5cf;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                text-align: center;
            }

            .stats-grid {
                padding: 1rem;
            }

            .charts-row {
                padding: 0 1rem 1rem 1rem;
            }

            .bookings-section {
                padding: 0 1rem 1.5rem 1rem;
            }

            th,
            td {
                font-size: 0.75rem;
                padding: 0.6rem;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="dashboard-container">
            <div class="dashboard-card">
                <!-- Header -->
                <div class="dashboard-header">
                    <div class="logo-area">
                        <div class="logo-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="header-title">
                            <h1>لوحة التحكم | Dashboard</h1>
                            <p>بيتك | Bytak - نظرة شاملة على الحجوزات والإحصائيات</p>
                        </div>
                    </div>
                    <a href="#" class="back-link" @click.prevent="goToHome">
                        <i class="fas fa-arrow-right"></i> العودة للرئيسية | Back to Home
                    </a>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-dashboard-card">
                        <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                        <div class="stat-number-dash">{{ totalBookings }}</div>
                        <div class="stat-label-dash">إجمالي الحجوزات | Total Bookings</div>
                        <div class="stat-trend"><i class="fas fa-chart-simple"></i> +{{ newBookingsThisMonth }} هذا
                            الشهر</div>
                    </div>
                    <div class="stat-dashboard-card">
                        <div class="stat-icon"><i class="fas fa-user-friends"></i></div>
                        <div class="stat-number-dash">{{ uniqueClients }}</div>
                        <div class="stat-label-dash">عملاء فريدون | Unique Clients</div>
                        <div class="stat-trend"><i class="fas fa-heart"></i> قاعدة عملاء متنوعة</div>
                    </div>
                    <div class="stat-dashboard-card">
                        <div class="stat-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="stat-number-dash">{{ contactedCount }}</div>
                        <div class="stat-label-dash">تم التواصل معهم | Contacted</div>
                        <div class="stat-trend"><i class="fas fa-check-circle"></i> نسبة تواصل {{ contactRate }}%</div>
                    </div>
                    <div class="stat-dashboard-card">
                        <div class="stat-icon"><i class="fas fa-smile"></i></div>
                        <div class="stat-number-dash">{{ satisfactionRate }}%</div>
                        <div class="stat-label-dash">رضا العملاء | Satisfaction</div>
                        <div class="stat-trend"><i class="fas fa-star"></i> بناءً على التقييمات</div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="charts-row">
                    <div class="chart-box">
                        <div class="chart-title"><i class="fas fa-chart-pie"></i> طرق التواصل المفضلة | Preferred
                            Contact Methods</div>
                        <canvas id="contactMethodChart" width="400" height="250"></canvas>
                    </div>
                    <div class="chart-box">
                        <div class="chart-title"><i class="fas fa-chart-line"></i> الحجوزات الأسبوعية | Weekly Bookings
                        </div>
                        <canvas id="weeklyBookingsChart" width="400" height="250"></canvas>
                    </div>
                </div>

                <!-- Bookings Table -->
                <div class="bookings-section">
                    <div class="section-header">
                        <h3><i class="fas fa-list-ul"></i> قائمة الحجوزات الأخيرة | Recent Bookings</h3>
                        <div class="filter-buttons">
                            <button class="filter-btn" :class="{ active: filterStatus === 'all' }"
                                @click="filterStatus = 'all'">الكل | All</button>
                            <button class="filter-btn" :class="{ active: filterStatus === 'pending' }"
                                @click="filterStatus = 'pending'">قيد الانتظار | Pending</button>
                            <button class="filter-btn" :class="{ active: filterStatus === 'contacted' }"
                                @click="filterStatus = 'contacted'">تم التواصل | Contacted</button>
                            <button class="filter-btn" :class="{ active: filterStatus === 'completed' }"
                                @click="filterStatus = 'completed'">مكتمل | Completed</button>
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>الاسم | Name</th>
                                    <th>البريد الإلكتروني | Email</th>
                                    <th>طريقة التواصل | Contact Method</th>
                                    <th>التحدي | Challenge</th>
                                    <th>الحالة | Status</th>
                                    <th>الإجراءات | Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="booking in filteredBookings" :key="booking.id">
                                    <td>{{ booking . fullName }}</td>
                                    <td>{{ booking . email }}</td>
                                    <td><span class="contact-badge">{{ booking . contactMethodDisplay }}</span></td>
                                    <td>{{ booking . challengeShort }}</td>
                                    <td>
                                        <span class="status-badge" :class="{
                                        'status-pending': booking.status === 'pending',
                                        'status-contacted': booking.status === 'contacted',
                                        'status-completed': booking.status === 'completed'
                                    }">
                                            {{ getStatusText(booking . status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="action-btn" @click="updateStatus(booking.id, 'contacted')"
                                            title="تم التواصل"><i class="fas fa-phone-alt"></i></button>
                                        <button class="action-btn" @click="updateStatus(booking.id, 'completed')"
                                            title="مكتمل"><i class="fas fa-check-circle"></i></button>
                                        <button class="action-btn" @click="viewDetails(booking)" title="تفاصيل"><i
                                                class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr v-if="filteredBookings.length === 0">
                                    <td colspan="6" style="text-align:center;">لا توجد حجوزات | No bookings found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <footer>
                    <div>💚 بيتك | Bytak — نقدم خدمات متكاملة للصحة النفسية | Integrated mental health services</div>
                    <div style="margin-top:6px;">نساعدك على تخطي عقبات حياتك | Helping you overcome life's obstacles
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script>
        const { createApp, ref, computed, onMounted, watch } = Vue;

        // Sample bookings data (mock data from previous form submissions)
        const generateMockBookings = () => {
            const names = ['أحمد محمد', 'سارة علي', 'محمد خالد', 'نور إبراهيم', 'ليلى حسن', 'عمر عبدالله', 'فاطمة الزهراء', 'يوسف عادل'];
            const emails = ['ahmed@example.com', 'sara@example.com', 'mohammed@example.com', 'nour@example.com', 'laila@example.com', 'omar@example.com', 'fatima@example.com', 'yousef@example.com'];
            const challenges = ['قلق وتوتر', 'اكتئاب بسيط', 'صعوبات في العلاقات', 'ضغط نفسي', 'مشاكل نوم', 'ضعف التركيز', 'فقدان الشغف', 'صدمة نفسية'];
            const methods = ['email', 'whatsapp', 'phone', 'email', 'whatsapp', 'phone', 'email', 'whatsapp'];
            const statuses = ['pending', 'pending', 'contacted', 'pending', 'completed', 'contacted', 'pending', 'contacted'];

            return Array.from({ length: 12 }, (_, i) => ({
                id: i + 1,
                fullName: names[i % names.length],
                email: emails[i % emails.length],
                phone: '+9627xxxxxxx',
                challenge: challenges[i % challenges.length],
                challengeShort: challenges[i % challenges.length].substring(0, 25),
                goals: 'تحسين الصحة النفسية والعيش بسلام',
                contactMethod: methods[i % methods.length],
                contactMethodDisplay: methods[i % methods.length] === 'email' ? '📧 البريد الإلكتروني' : (methods[i % methods.length] === 'whatsapp' ? '💬 واتساب' : '📞 مكالمة هاتفية'),
                status: statuses[i % statuses.length],
                createdAt: new Date(Date.now() - i * 86400000).toISOString()
            }));
        };

        createApp({
            setup() {
                const bookings = ref(generateMockBookings());
                const filterStatus = ref('all');
                let contactChart = null;
                let weeklyChart = null;

                // Computed stats
                const totalBookings = computed(() => bookings.value.length);
                const uniqueClients = computed(() => new Set(bookings.value.map(b => b.email)).size);
                const contactedCount = computed(() => bookings.value.filter(b => b.status === 'contacted' || b.status === 'completed').length);
                const contactRate = computed(() => ((contactedCount.value / totalBookings.value) * 100).toFixed(1));
                const satisfactionRate = ref(94);

                // New bookings this month (mock)
                const newBookingsThisMonth = computed(() => {
                    const now = new Date();
                    const currentMonth = now.getMonth();
                    return bookings.value.filter(b => {
                        const date = new Date(b.createdAt);
                        return date.getMonth() === currentMonth;
                    }).length;
                });

                const filteredBookings = computed(() => {
                    if (filterStatus.value === 'all') return bookings.value;
                    return bookings.value.filter(b => b.status === filterStatus.value);
                });

                // Contact method distribution for chart
                const contactMethodStats = computed(() => {
                    const methods = { email: 0, whatsapp: 0, phone: 0 };
                    bookings.value.forEach(b => {
                        if (b.contactMethod === 'email') methods.email++;
                        else if (b.contactMethod === 'whatsapp') methods.whatsapp++;
                        else if (b.contactMethod === 'phone') methods.phone++;
                    });
                    return methods;
                });

                // Weekly bookings (last 7 days mock distribution)
                const weeklyData = computed(() => {
                    const days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
                    const counts = [3, 5, 4, 6, 7, 2, 4];
                    return { days, counts };
                });

                const getStatusText = (status) => {
                    const statusMap = {
                        pending: 'قيد الانتظار | Pending',
                        contacted: 'تم التواصل | Contacted',
                        completed: 'مكتمل | Completed'
                    };
                    return statusMap[status] || status;
                };

                const updateStatus = (id, newStatus) => {
                    const booking = bookings.value.find(b => b.id === id);
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
                    alert(`تفاصيل الحجز | Booking Details:\n\nالاسم: ${booking.fullName}\nالبريد: ${booking.email}\nالتحدي: ${booking.challenge}\nالهدف: ${booking.goals}\nطريقة التواصل: ${booking.contactMethodDisplay}\nالحالة: ${getStatusText(booking.status)}`);
                };

                const goToHome = () => {
                    window.location.href = window.location.pathname.replace(/dashboard\.html$/, '') + 'index.html';
                    // If on same page, just reload or alert
                    alert('سيتم التوجيه للصفحة الرئيسية | Redirecting to home page');
                    // For demo, we can reload main page - but in real scenario you'd link
                };

                const initCharts = () => {
                    const ctx1 = document.getElementById('contactMethodChart')?.getContext('2d');
                    const ctx2 = document.getElementById('weeklyBookingsChart')?.getContext('2d');

                    if (ctx1) {
                        if (contactChart) contactChart.destroy();
                        contactChart = new Chart(ctx1, {
                            type: 'doughnut',
                            data: {
                                labels: ['البريد الإلكتروني | Email', 'واتساب | WhatsApp', 'مكالمة | Phone Call'],
                                datasets: [{
                                    data: [contactMethodStats.value.email, contactMethodStats.value.whatsapp, contactMethodStats.value.phone],
                                    backgroundColor: ['#66bb6a', '#81c784', '#a5d6a7'],
                                    borderWidth: 0
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                plugins: { legend: { position: 'bottom', labels: { font: { family: 'Cairo' } } } }
                            }
                        });
                    }

                    if (ctx2) {
                        if (weeklyChart) weeklyChart.destroy();
                        weeklyChart = new Chart(ctx2, {
                            type: 'line',
                            data: {
                                labels: weeklyData.value.days,
                                datasets: [{
                                    label: 'عدد الحجوزات | Bookings',
                                    data: weeklyData.value.counts,
                                    borderColor: '#2e7d32',
                                    backgroundColor: 'rgba(46,125,50,0.1)',
                                    tension: 0.3,
                                    fill: true,
                                    pointBackgroundColor: '#43a047'
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                plugins: { legend: { position: 'top', labels: { font: { family: 'Cairo' } } } }
                            }
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
                    goToHome
                };
            }
        }).mount('#app');
    </script>
</body>

</html>
