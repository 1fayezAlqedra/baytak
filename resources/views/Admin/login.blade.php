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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-container {
            max-width: 480px;
            width: 100%;
            margin: 0 auto;
        }

        /* login card */
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 48px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(80, 180, 100, 0.2);
            overflow: hidden;
            backdrop-filter: blur(2px);
        }

        /* header */
        .login-header {
            background: linear-gradient(135deg, #f1fcf0 0%, #e8f5e9 100%);
            padding: 2rem 2rem 1.5rem 2rem;
            text-align: center;
            border-bottom: 2px solid #b9f6ca;
        }

        .logo-icon {
            background: #2e7d32;
            width: 75px;
            height: 75px;
            border-radius: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
            box-shadow: 0 12px 20px -8px rgba(46, 125, 50, 0.4);
        }

        .logo-icon i {
            font-size: 2.8rem;
            color: white;
        }

        .login-header h1 {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1b5e20, #43a047);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.3rem;
        }

        .login-header p {
            color: #2b5e3b;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .admin-badge {
            display: inline-block;
            background: #e8f5e9;
            padding: 0.3rem 1rem;
            border-radius: 30px;
            font-size: 0.7rem;
            margin-top: 0.8rem;
            color: #2e7d32;
            font-weight: 600;
        }

        /* form section */
        .login-form-section {
            padding: 2rem 2rem 2rem 2rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .bilingual-label {
            font-weight: 700;
            color: #1a4a2a;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 8px;
        }

        .label-ar {
            font-size: 0.95rem;
        }

        .label-en {
            font-weight: 400;
            font-size: 0.7rem;
            color: #5c8b68;
            direction: ltr;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            right: 18px;
            color: #7cb342;
            font-size: 1.1rem;
        }

        input {
            width: 100%;
            border: 1.5px solid #d4e6d4;
            border-radius: 60px;
            padding: 14px 45px 14px 20px;
            font-family: 'Cairo', sans-serif;
            font-size: 0.95rem;
            background: #ffffff;
            transition: all 0.2s;
            outline: none;
            color: #1f3e2c;
        }

        input:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .toggle-password {
            position: absolute;
            left: 18px;
            right: auto;
            cursor: pointer;
            color: #7cb342;
            background: none;
            border: none;
            font-size: 1.1rem;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.8rem;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 0.85rem;
            color: #2b5e3b;
        }

        .checkbox-label input {
            width: 18px;
            height: 18px;
            accent-color: #2e7d32;
            margin: 0;
            padding: 0;
        }

        .btn-login {
            background: linear-gradient(105deg, #2b6e2f, #4caf50);
            border: none;
            padding: 14px 28px;
            border-radius: 60px;
            font-weight: 800;
            font-size: 1.1rem;
            color: white;
            cursor: pointer;
            transition: 0.2s;
            width: 100%;
            font-family: 'Cairo', sans-serif;
            box-shadow: 0 8px 20px -6px #2e7d3250;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:hover:not(:disabled) {
            transform: scale(0.98);
            background: linear-gradient(105deg, #1f5522, #3d9c41);
            box-shadow: 0 4px 12px -4px #2e7d32;
        }

        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .error-message {
            background: #ffebee;
            border-right: 4px solid #f44336;
            padding: 0.8rem 1rem;
            border-radius: 28px;
            margin-bottom: 1.2rem;
            color: #c62828;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message {
            background: #e8f5e9;
            border-right: 4px solid #4caf50;
            padding: 0.8rem 1rem;
            border-radius: 28px;
            margin-bottom: 1.2rem;
            color: #2e7d32;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-box {
            margin-top: 1.5rem;
            background: #f9fff6;
            border-radius: 24px;
            padding: 0.8rem;
            text-align: center;
            border: 1px dashed #b9f6ca;
        }

        .info-box p {
            font-size: 0.7rem;
            color: #558b2f;
        }

        footer {
            text-align: center;
            padding: 1.2rem;
            font-size: 0.7rem;
            color: #6c8e74;
            border-top: 1px solid #cfe5cf;
            background: white;
        }

        @media (max-width: 500px) {
            .login-card {
                border-radius: 32px;
            }

            .login-form-section {
                padding: 1.5rem;
            }

            .login-header {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <div class="logo-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h1>بيتك | Bytak</h1>
                    <p>بيتك النفسي الآمن | Your Safe Psychological Space</p>
                    <div class="admin-badge">
                        <i class="fas fa-user-shield"></i> لوحة المشرف | Admin Dashboard
                    </div>
                </div>

                <div class="login-form-section">
                    <!-- Error/Success Messages -->
                    <div v-if="errorMessage" class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ errorMessage }}</span>
                    </div>
                    <div v-if="successMessage" class="success-message">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ successMessage }}</span>
                    </div>

                    <form @submit.prevent="handleLogin">
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
                            {{ loading ? 'جاري تسجيل الدخول... | Logging in...' : 'دخول إلى لوحة التحكم | Login to Dashboard' }}
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

    <script>
        const { createApp, ref, onMounted } = Vue;

        createApp({
            setup() {
                // Login form data
                const loginData = ref({
                    email: '',
                    password: ''
                });

                const showPassword = ref(false);
                const rememberMe = ref(false);
                const loading = ref(false);
                const errorMessage = ref('');
                const successMessage = ref('');

                // Single admin credentials (only one person can access)
                const ADMIN_EMAIL = 'admin@bytak.com';
                const ADMIN_PASSWORD = 'admin123';

                // Handle login
                const handleLogin = () => {
                    errorMessage.value = '';
                    successMessage.value = '';

                    // Validation
                    if (!loginData.value.email || !loginData.value.password) {
                        errorMessage.value = 'الرجاء إدخال البريد الإلكتروني وكلمة المرور | Please enter email and password';
                        return;
                    }

                    loading.value = true;

                    // Simulate API call delay
                    setTimeout(() => {
                        if (loginData.value.email === ADMIN_EMAIL && loginData.value.password === ADMIN_PASSWORD) {
                            // Successful login
                            successMessage.value = 'مرحباً بك في لوحة التحكم! جاري التوجيه... | Welcome to Dashboard! Redirecting...';

                            // Save session based on remember me
                            if (rememberMe.value) {
                                localStorage.setItem('bytak_admin_logged_in', 'true');
                                localStorage.setItem('bytak_admin_email', loginData.value.email);
                            } else {
                                sessionStorage.setItem('bytak_admin_logged_in', 'true');
                            }

                            // Redirect to dashboard after 1.5 seconds
                            setTimeout(() => {
                                window.location.href = 'dashboard.html';
                            }, 1500);
                        } else {
                            errorMessage.value = 'البريد الإلكتروني أو كلمة المرور غير صحيحة | Invalid email or password';
                            loading.value = false;
                        }
                    }, 800);
                };

                // Check if already logged in (auto-redirect)
                const checkAuth = () => {
                    const isLoggedIn = localStorage.getItem('bytak_admin_logged_in') === 'true' ||
                        sessionStorage.getItem('bytak_admin_logged_in') === 'true';
                    if (isLoggedIn) {
                        // Auto redirect to dashboard if already logged in
                        window.location.href = 'dashboard.html';
                    }

                    // Auto-fill remembered email
                    const rememberedEmail = localStorage.getItem('bytak_admin_email');
                    if (rememberedEmail) {
                        loginData.value.email = rememberedEmail;
                        rememberMe.value = true;
                    }
                };

                onMounted(() => {
                    checkAuth();
                });

                return {
                    loginData,
                    showPassword,
                    rememberMe,
                    loading,
                    errorMessage,
                    successMessage,
                    handleLogin
                };
            }
        }).mount('#app');
    </script>
</body>

</html>
