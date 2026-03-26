// Quotes data (الصحة النفسية) - bilingual
const quotesData = [
    {
        ar: "لا تجعل الماضي يأسر حاضرك، أنت تستحق السلام الداخلي.",
        en: "Don't let the past imprison your present, you deserve inner peace.",
        authorAr: "بيتك",
        authorEn: "Bytak",
    },
    {
        ar: "الصحة النفسية ليست رفاهية، إنها أساس لحياة متوازنة.",
        en: "Mental health is not a luxury, it's the foundation of a balanced life.",
        authorAr: "د. كارل يونغ",
        authorEn: "Dr. Carl Jung",
    },
    {
        ar: "التعافي رحلة وليس وجهة، كل خطوة صغيرة تقدّمك.",
        en: "Recovery is a journey, not a destination; every small step moves you forward.",
        authorAr: "بيتك",
        authorEn: "Bytak",
    },
    {
        ar: "كن لطيفًا مع عقلك كما تكون مع صديقك العزيز.",
        en: "Be kind to your mind as you would to your dearest friend.",
        authorAr: "لويز هاي",
        authorEn: "Louise Hay",
    },
    {
        ar: "طلب المساعدة علامة قوة، وليس ضعف.",
        en: "Asking for help is a sign of strength, not weakness.",
        authorAr: "بيتك النفسي",
        authorEn: "Bytak Psychology",
    },
    {
        ar: "أنت لست وحدك، الكثيرون يشعرون بما تشعر به.",
        en: "You are not alone; many feel what you feel.",
        authorAr: "برينيه براون",
        authorEn: "Brené Brown",
    },
    {
        ar: "عقلك يستحق الرعاية التي تقدمها لجسدك.",
        en: "Your mind deserves the care you give your body.",
        authorAr: "بيتك",
        authorEn: "Bytak",
    },
    {
        ar: "الشفاء يبدأ عندما تتجرأ على مواجهة مشاعرك.",
        en: "Healing begins when you dare to face your emotions.",
        authorAr: "بيتك",
        authorEn: "Bytak",
    },
    {
        ar: "أنت أقوى مما تعتقد، وأجمل مما تتخيل.",
        en: "You are stronger than you think, and more beautiful than you imagine.",
        authorAr: "بيتك",
        authorEn: "Bytak",
    },
];

const { createApp, ref, onMounted, onUnmounted } = Vue;

createApp({
    setup() {
        // Reactive state
        const currentQuote = ref({
            ar: "لا تجعل الماضي يأسر حاضرك، أنت تستحق السلام الداخلي.",
            en: "Don't let the past imprison your present, you deserve inner peace.",
            authorAr: "بيتك",
            authorEn: "Bytak",
        });
        const quoteIndex = ref(0);
        let intervalId = null;

        const form = ref({
            fullName: "",
            email: "",
            phone: "",
            challenge: "",
            goals: "",
            contactMethod: "email",
            otherContactMethod: "",
        });

        const submittedSuccess = ref(false);

        // Start quote rotation (every 20 seconds)
        const startQuoteRotation = () => {
            intervalId = setInterval(() => {
                quoteIndex.value = (quoteIndex.value + 1) % quotesData.length;
                const q = quotesData[quoteIndex.value];
                currentQuote.value = {
                    ar: q.ar,
                    en: q.en,
                    authorAr: q.authorAr,
                    authorEn: q.authorEn,
                };
            }, 20000);
        };

        // Submit form handler
        const submitBooking = () => {
            // Basic validation
            if (
                !form.value.fullName ||
                !form.value.email ||
                !form.value.challenge ||
                !form.value.goals ||
                !form.value.contactMethod
            ) {
                alert(
                    "الرجاء تعبئة جميع الحقول المطلوبة | Please fill all required fields.",
                );
                return;
            }
            if (
                form.value.contactMethod === "other" &&
                !form.value.otherContactMethod
            ) {
                alert(
                    "يرجى تحديد طريقة التواصل الأخرى | Please specify other contact method.",
                );
                return;
            }

            // Here you can integrate API call if needed
            console.log("Form Data (Vue 3):", {
                fullName: form.value.fullName,
                email: form.value.email,
                phone: form.value.phone,
                challenge: form.value.challenge,
                goals: form.value.goals,
                contactMethod:
                    form.value.contactMethod === "other"
                        ? form.value.otherContactMethod
                        : form.value.contactMethod,
            });

            submittedSuccess.value = true;
            // Reset success message after 5 seconds
            setTimeout(() => {
                submittedSuccess.value = false;
            }, 5000);

            // Optional: reset form fields if desired - keeping for better UX we don't auto clear
            // but we scroll to success
            setTimeout(() => {
                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: "smooth",
                });
            }, 100);
        };

        // Lifecycle hooks
        onMounted(() => {
            startQuoteRotation();
        });

        onUnmounted(() => {
            if (intervalId) clearInterval(intervalId);
        });

        return {
            currentQuote,
            form,
            submittedSuccess,
            submitBooking,
        };
    },
}).mount("#app");
