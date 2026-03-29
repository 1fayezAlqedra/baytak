<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>بيتك | Bytak - تسجيل الدخول | Login</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Vue 3 CDN -->
    <script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="{{ asset('site-assets/css/login.css') }}">
</head>

<body>
    <div id="app">
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <div class="logo-icon" style="background-color: #fff ">

                        <img style="max-width: 150px ; max-height:150px"
                            src="{{ asset('site-assets/img/baytak-logo.png') }}" alt="">
                    </div>
                    <h1>بيتك | Bytak</h1>
                    <p>بيتك النفسي الآمن | Your Safe Psychological Space</p>
                    <div class="admin-badge">
                        <i class="fas fa-user-shield"></i> لوحة المشرف | Admin Dashboard
                    </div>
                </div>

                <div class="login-form-section">
                    {{-- <!-- Error/Success Messages -->
                    <div v-if="errorMessage" class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ errorMessage }}</span>
                    </div>
                    <div v-if="successMessage" class="success-message">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ successMessage }}</span>
                    </div> --}}

                    <form  method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <!-- البريد الإلكتروني | Email -->
                        <div class="input-group">
                            <div class="bilingual-label">
                                <span class="label-ar">البريد الإلكتروني <span style="color:#2e7d32;">*</span></span>
                                <span class="label-en">Email Address</span>
                            </div>
                            <div class="input-wrapper">
                                <i class="fas fa-envelope"></i>
                                <input type="email" v-model="loginData.email" required placeholder="admin@bytak.com">
                            </div>
                        </div>

                        <!-- كلمة المرور | Password -->
                        <div class="input-group">
                            <div class="bilingual-label">
                                <span class="label-ar">كلمة المرور <span style="color:#2e7d32;">*</span></span>
                                <span class="label-en">Password</span>
                            </div>
                            <div class="input-wrapper">
                                <i class="fas fa-lock"></i>
                                <input :type="showPassword ? 'text' : 'password'" v-model="loginData.password" required
                                    placeholder="••••••••">
                                <button type="button" class="toggle-password" @click="showPassword = !showPassword">
                                    <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="remember-forgot">
                            <label class="checkbox-label">
                                <input type="checkbox" v-model="rememberMe">
                                <span>تذكرني | Remember Me</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-login" :disabled="loading">
                            <i class="fas fa-sign-in-alt"></i>
                            {{-- {{ loading ? 'جاري تسجيل الدخول... | Logging in...' : 'دخول إلى لوحة التحكم | Login to
                            Dashboard' }} --}}
                        </button>
                    </form>

                    <!-- Info box with credentials (only for admin) -->
                    <div class="info-box">
                        <p>
                            <i class="fas fa-key"></i>
                            بيانات الدخول الخاصة بالمشرف | Admin Credentials:<br>
                            <strong>البريد الإلكتروني | Email: admin@bytak.com</strong><br>
                            <strong>كلمة المرور | Password: admin123</strong>
                        </p>
                    </div>
                </div>

                <footer>
                    <div>💚 بيتك | Bytak — نقدم خدمات متكاملة للصحة النفسية | Integrated mental health services</div>
                    <div style="margin-top:4px;">نساعدك على تخطي عقبات حياتك | Helping you overcome life's obstacles
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{asset('site-assets/js/login.js')}}"></script>
</body>

</html>
