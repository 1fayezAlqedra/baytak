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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Chart.js for simple charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('site-assets/css/index.css') }}">
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
                        <div class="stat-number-dash">{{ $totalBookings }}</div>
                        <div class="stat-label-dash">إجمالي الحجوزات | Total Bookings</div>
                        <div class="stat-trend"><i class="fas fa-chart-simple"></i> +15 هذا الشهر</div>
                    </div>
                    <div class="stat-dashboard-card">
                        <div class="stat-icon"><i class="fas fa-user-friends"></i></div>
                        <div class="stat-number-dash">{{ $contacted }}</div>
                        <div class="stat-label-dash">تم التواصل معهم | contacted</div>
                        <div class="stat-trend"><i class="fas fa-heart"></i> قاعدة عملاء متنوعة</div>
                    </div>
                    <div class="stat-dashboard-card">
                        <div class="stat-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="stat-number-dash">{{$completed}}</div>
                        <div class="stat-label-dash">تم إكمال التواصل | completed</div>
                        <div class="stat-trend"><i class="fas fa-check-circle"></i> نسبة تواصل {{$contactRate}}%</div>
                    </div>
                    <div class="stat-dashboard-card">
                        <div class="stat-icon"><i class="fas fa-smile"></i></div>
                        <div class="stat-number-dash">{{ $pending }}</div>
                        <div class="stat-label-dash"> عدد المرضى الانتظار | Pending</div>
                        <div class="stat-trend"><i class="fas fa-star"></i> نسبة تواصل {{ $pendingRate }} %</div>
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
                        <canvas id="weeklyChart" width="400" height="250"></canvas>
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
                            @verbatim
                                <tbody>
                                    <tr v-for="booking in filteredBookings" :key="booking.id">
                                        <td>{{ booking . fullName }}</td>
                                        <td>{{ booking . email }}</td>

                                        <td>
                                            <span class="contact-badge">
                                                {{ booking . contactMethod }}
                                            </span>
                                        </td>

                                        <td>{{ booking . challenge }}</td>

                                        <td>
                                            <span class="status-badge">
                                                {{ getStatusText(booking . status) }}
                                            </span>
                                        </td>

                                        <td>
                                            <button @click="updateStatus(booking.id, 'contacted')" style="
                                                                                                                background: linear-gradient(135deg, #4caf50, #2e7d32) !important;
                                                                                                                color: white !important;
                                                                                                                border: none !important;
                                                                                                                padding: 8px 12px !important;
                                                                                                                margin: 0 4px;
                                                                                                                border-radius: 10px;
                                                                                                                cursor: pointer;
                                                                                                                box-shadow: 0 4px 10px rgba(0,0,0,0.2);
                                                                                                            ">
                                                📞
                                            </button>

                                            <button @click="updateStatus(booking.id, 'completed')" style="
                                                                                                                background: linear-gradient(135deg, #2196f3, #1565c0) !important;
                                                                                                                color: white !important;
                                                                                                                border: none !important;
                                                                                                                padding: 8px 12px !important;
                                                                                                                margin: 0 4px;
                                                                                                                border-radius: 10px;
                                                                                                                cursor: pointer;
                                                                                                                box-shadow: 0 4px 10px rgba(0,0,0,0.2);
                                                                                                            ">
                                                ✔
                                            </button>

                                            <button @click="viewDetails(booking)" style="
                                                                                                                background: linear-gradient(135deg, #ff9800, #ef6c00) !important;
                                                                                                                color: white !important;
                                                                                                                border: none !important;
                                                                                                                padding: 8px 12px !important;
                                                                                                                margin: 0 4px;
                                                                                                                border-radius: 10px;
                                                                                                                cursor: pointer;
                                                                                                                box-shadow: 0 4px 10px rgba(0,0,0,0.2);
                                                                                                            ">
                                                👁
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                            @endverbatim<td>

                        </table>
                    </div>
                </div>
                @verbatim
                    <div class="pagination">
                        <button @click="prevPage">
                            previous  ||  السابق
                        </button>

                        <span>صفحة {{ currentPage }} من {{ lastPage }}</span>

                        <button @click="nextPage">
                            next  || التالي
                        </button>
                    </div>
                @endverbatim
                <footer>
                    <div>💚 بيتك | Bytak — نقدم خدمات متكاملة للصحة النفسية | Integrated mental health services</div>
                    <div style="margin-top:6px;">نساعدك على تخطي عقبات حياتك | Helping you overcome life's obstacles
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('site-assets/js/index.js') }}"></script>
</body>

</html>
