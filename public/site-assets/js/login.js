const { createApp, ref, onMounted } = Vue;

createApp({
    setup() {
        // Login form data
        const loginData = ref({
            email: "",
            password: "",
        });

        const showPassword = ref(false);
        const rememberMe = ref(false);
        const loading = ref(false);
        const errorMessage = ref("");
        const successMessage = ref("");

        // Single admin credentials (only one person can access)
        const ADMIN_EMAIL = "admin@bytak.com";
        const ADMIN_PASSWORD = "admin123";

        // Handle login
        const handleLogin = () => {
            errorMessage.value = "";
            successMessage.value = "";

            // Validation
            if (!loginData.value.email || !loginData.value.password) {
                errorMessage.value =
                    "الرجاء إدخال البريد الإلكتروني وكلمة المرور | Please enter email and password";
                return;
            }

            loading.value = true;

            // Simulate API call delay
            setTimeout(() => {
                if (
                    loginData.value.email === ADMIN_EMAIL &&
                    loginData.value.password === ADMIN_PASSWORD
                ) {
                    // Successful login
                    successMessage.value =
                        "مرحباً بك في لوحة التحكم! جاري التوجيه... | Welcome to Dashboard! Redirecting...";

                    // Save session based on remember me
                    if (rememberMe.value) {
                        localStorage.setItem("bytak_admin_logged_in", "true");
                        localStorage.setItem(
                            "bytak_admin_email",
                            loginData.value.email,
                        );
                    } else {
                        sessionStorage.setItem("bytak_admin_logged_in", "true");
                    }

                    // Redirect to dashboard after 1.5 seconds
                    setTimeout(() => {
                        window.location.href = "dashboard.html";
                    }, 1500);
                } else {
                    errorMessage.value =
                        "البريد الإلكتروني أو كلمة المرور غير صحيحة | Invalid email or password";
                    loading.value = false;
                }
            }, 800);
        };

        // Check if already logged in (auto-redirect)
        const checkAuth = () => {
            const isLoggedIn =
                localStorage.getItem("bytak_admin_logged_in") === "true" ||
                sessionStorage.getItem("bytak_admin_logged_in") === "true";
            if (isLoggedIn) {
                // Auto redirect to dashboard if already logged in
                window.location.href = "dashboard.html";
            }

            // Auto-fill remembered email
            const rememberedEmail = localStorage.getItem("bytak_admin_email");
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
            handleLogin,
        };
    },
}).mount("#app");
