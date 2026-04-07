const quotesData = [
    {
        ar: "حين تضيق بك الطرق، لا تحتاج دائمًا إلى الابتعاد، بل إلى مساحة تفهمك؛ وكلما تاهت خطواتك ولم تجد في محيطك ما يحتويك، ورغبت أن تبتعد قليلًا عن صخب الحياة، في بيتك لا نأخذك بعيدًا، بل نصنع معك طريق العودة إلى ذاتك وأحلامك وسلامك الداخلي، فالتعافي رحلة وليس وجهة، وكل خطوة صغيرة تقدّمك، ونحن نرافقك بهدوء خطوة بخطوة حتى تصل إلى ما يشبهك حقًا.",
        en: "",
        authorAr: "بيتك",
        authorEn: "Bytak",
    },
    {
        ar: "في زحمة الأدوار، حين تضيع ملامحك بين ما يُتوقع منك ومن أنت فعلًا، وحين تصبح الأصوات الخارجية أعلى من صوتك الداخلي، في بيتك تعود إلى الأصل، إلى المساحة التي تشبهك وتشبه أحلامك، نرافقك بلطف لتستعيد نفسك وتنمو من جديد، بخطى نابعة منك لا مفروضة عليك.",
        en: "",
        authorAr: "بيتك",
        authorEn: "Bytak",
    },
    {
        ar: "عندما يتغير كل شيء حولك، وتشعر أن ما بداخلك وحده ثابت، وأنه لا مكان يحتملك كما أنت، في بيتك لا نسألك من تكون، بل نحتضنك كما أنت، نخفف عنك بعض الثقل ونسير معك الطريق حتى تبني حياة تناسبك لا تثقلك.",
        en: "",
        authorAr: "بيتك",
        authorEn: "Bytak",
    },
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
            axios
                .post("/booking", {
                    full_name: form.value.fullName,
                    email: form.value.email,
                    phone: form.value.phone,
                    challenge: form.value.challenge,
                    goals: form.value.goals,

                    contact_method:
                        form.value.contactMethod === "other"
                            ? form.value.otherContactMethod
                            : form.value.contactMethod,
                })
                .then((response) => {
                    console.log(response.data);

                    // نجاح
                    // submittedSuccess.value = true;

                    // scroll
                    setTimeout(() => {
                        window.scrollTo({
                            top: document.body.scrollHeight,
                            behavior: "smooth",
                        });
                    }, 100);
                })
                .catch((error) => {
                    console.log(error.response.data);

                    // ممكن تعرض error للمستخدم
                    alert("حدث خطأ، حاول مرة أخرى");
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
