const { createApp, ref } = Vue;

createApp({
    setup() {
        const loginData = ref({
            email: "",
            password: "",
        });

        const showPassword = ref(false);
        const rememberMe = ref(false);
        const loading = ref(false);
        const errorMessage = ref("");

        const handleLogin = (event) => {
            // هذا مجرد loader frontend
            loading.value = true;
            // ترك العملية لبك اند Laravel
            setTimeout(() => {
                loading.value = false;
            }, 300);
        };

        return {
            loginData,
            showPassword,
            rememberMe,
            loading,
            errorMessage,
            handleLogin,
        };
    },
}).mount("#app");
