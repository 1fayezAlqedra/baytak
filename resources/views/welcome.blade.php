<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>بيتك | Bytak - حجز جلسة تعريفية مجانية | Free Introductory Session</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            padding: 2rem 1rem;
        }

        .app-container {
            max-width: 1280px;
            margin: 0 auto;
        }

        /* main card */
        .main-card {
            background: rgba(255, 255, 255, 0.96);
            border-radius: 48px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(80, 180, 100, 0.2);
            overflow: hidden;
        }

        /* header */
        .hero-section {
            background: #f1fcf0;
            padding: 2rem 2rem 1.5rem 2rem;
            border-bottom: 2px solid #b9f6ca;
            text-align: center;
        }

        .logo-area {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .logo-icon {
            background: #2e7d32;
            width: 65px;
            height: 65px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 18px -8px rgba(46,125,50,0.3);
        }

        .logo-icon i {
            font-size: 2.8rem;
            color: white;
        }

        .bytak-text {
            font-size: 2.8rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #1b5e20, #43a047);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .bytak-sub {
            font-size: 1.1rem;
            font-weight: 500;
            color: #2b5e3b;
            background: #e0f2e9;
            display: inline-block;
            padding: 0.3rem 1.5rem;
            border-radius: 60px;
        }

        /* credentials with bilingual */
        .credentials {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 25px 0 10px;
        }

        .cred-badge {
            background: white;
            padding: 0.8rem 1.8rem;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 6px 12px -6px rgba(0,0,0,0.05);
            border-right: 4px solid #66bb6a;
            color: #1f4f2d;
            text-align: center;
        }

        .cred-badge i {
            color: #2e7d32;
            margin-left: 8px;
        }

        .cred-ar {
            display: block;
            font-weight: 700;
        }
        .cred-en {
            display: block;
            font-size: 0.7rem;
            font-weight: 400;
            color: #4a7653;
            margin-top: 4px;
        }

        /* stats boxes bilingual */
        .stats-row {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 30px 0 20px;
            flex-wrap: wrap;
        }

        .stat-box {
            background: white;
            padding: 1rem 2rem;
            border-radius: 48px;
            text-align: center;
            min-width: 200px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border: 1px solid #c8e6c9;
        }

        .stat-number {
            font-size: 2.7rem;
            font-weight: 800;
            color: #2b5e2b;
            line-height: 1;
        }
        .stat-label-ar {
            font-weight: 700;
            font-size: 1rem;
        }
        .stat-label-en {
            font-size: 0.75rem;
            color: #527a5c;
        }

        /* motivation quotes */
        .motivation-section {
            background: #eaf7ea;
            margin: 20px 20px 0 20px;
            border-radius: 40px;
            padding: 1.5rem 1rem;
            text-align: center;
            box-shadow: inset 0 1px 3px #c8e6c9, 0 12px 20px -12px rgba(0,0,0,0.1);
        }

        .quote-text {
            font-size: 1.45rem;
            font-weight: 500;
            line-height: 1.45;
            color: #1c441c;
        }
        .quote-author {
            margin-top: 12px;
            font-weight: 600;
            color: #2c6e2c;
        }
        .lang-switch-quote {
            display: inline-block;
            margin-top: 12px;
            font-size: 0.75rem;
            background: #c8e6c9;
            padding: 4px 14px;
            border-radius: 40px;
            color: #1f5420;
        }

        /* form section bilingual */
        .form-section {
            padding: 2rem 2rem 2.5rem 2rem;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-header h2 {
            font-size: 1.9rem;
            font-weight: 800;
            background: linear-gradient(120deg, #1e5a2a, #4caf50);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .form-header p {
            color: #3b6e47;
            font-weight: 500;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.8rem;
        }

        .full-width {
            grid-column: span 2;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .bilingual-label {
            font-weight: 800;
            color: #1a4a2a;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 8px;
        }
        .label-ar {
            font-size: 0.98rem;
        }
        .label-en {
            font-weight: 400;
            font-size: 0.75rem;
            color: #5c8b68;
            direction: ltr;
            display: inline-block;
        }

        input, textarea, select {
            border: 1.5px solid #d4e6d4;
            border-radius: 28px;
            padding: 12px 20px;
            font-family: 'Cairo', sans-serif;
            font-size: 0.95rem;
            background: #ffffff;
            transition: all 0.2s;
            outline: none;
            color: #1f3e2c;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }
        textarea {
            border-radius: 28px;
            resize: vertical;
            min-height: 90px;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1.2rem;
            align-items: center;
            background: #f9fff9;
            padding: 10px 20px;
            border-radius: 60px;
            border: 1px solid #cfe9cf;
        }
        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .radio-option input {
            width: 18px;
            height: 18px;
            accent-color: #2e7d32;
        }
        .other-input {
            margin-top: 12px;
            margin-right: 28px;
        }

        .btn-submit {
            background: linear-gradient(105deg, #2b6e2f, #4caf50);
            border: none;
            padding: 16px 28px;
            border-radius: 60px;
            font-weight: 800;
            font-size: 1.2rem;
            color: white;
            cursor: pointer;
            transition: 0.2s;
            width: 100%;
            margin-top: 1rem;
            font-family: 'Cairo', sans-serif;
            box-shadow: 0 10px 20px -6px #2e7d3250;
        }
        .btn-submit:hover {
            transform: scale(0.98);
            background: linear-gradient(105deg, #1f5522, #3d9c41);
        }
        .success-message {
            background: #d9f0da;
            border-radius: 40px;
            padding: 1rem;
            text-align: center;
            color: #145c1e;
            margin-top: 1.5rem;
            font-weight: 600;
        }
        footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.8rem;
            color: #426e49;
            border-top: 1px solid #cfe5cf;
            margin-top: 10px;
        }

        @media (max-width: 750px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .full-width {
                grid-column: span 1;
            }
            .quote-text {
                font-size: 1.1rem;
            }
            .bytak-text {
                font-size: 2rem;
            }
            .radio-group {
                flex-direction: column;
                align-items: flex-start;
            }
        }
        hr {
            margin: 0.2rem 0;
            border-color: #cfe9cf;
        }
        .optional-badge {
            font-size: 0.7rem;
            background: #e9f5e9;
            padding: 2px 8px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="app-container">
        <div class="main-card">
            <!-- Hero section: Logo + Bytak + Arabic/English side by side -->
            <div class="hero-section">
                <div class="logo-area">
                    <div class="logo-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="bytak-text">بيتك | Bytak</div>
                </div>
                <div class="bytak-sub">بيتك النفسي | Your Psychological Home</div>

                <!-- Credentials: bilingual (كل مؤهل بالعربي والانجليزي معا) -->
                <div class="credentials">
                    <div class="cred-badge">
                        <span class="cred-ar">🎓 ماجستير في علم النفس الإكلينيكي - الجامعة الأردنية</span>
                        <span class="cred-en">Master in Clinical Psychology - University of Jordan</span>
                    </div>
                    <div class="cred-badge">
                        <span class="cred-ar">📖 بكالوريوس في علم النفس - الجامعة الإسلامية بغزة</span>
                        <span class="cred-en">Bachelor of Psychology - Islamic University of Gaza</span>
                    </div>
                </div>

                <!-- Stats: +50 cases with bilingual -->
                <div class="stats-row">
                    <div class="stat-box">
                        <div class="stat-number">+50</div>
                        <div class="stat-label-ar">حالة تم علاجها</div>
                        <div class="stat-label-en">Cases Successfully Treated</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number"><i class="fas fa-hand-holding-heart"></i> 100%</div>
                        <div class="stat-label-ar">رعاية متخصصة</div>
                        <div class="stat-label-en">Specialized Care</div>
                    </div>
                </div>

                <!-- Motivational Quotes: تغير كل 20 ثانية بالعربي والانجليزي معا -->
              <div class="motivation-section">
    <div class="quote-text">
        @{{ currentQuote.ar }} | @{{ currentQuote.en }}
    </div>
    <div class="quote-author">
        @{{ currentQuote.authorAr }} | @{{ currentQuote.authorEn }}
    </div>
    <div class="lang-switch-quote">
        <i class="fas fa-clock"></i> تتجدد كل 20 ثانية • Refreshes every 20 seconds
    </div>
</div>
            </div>

            <!-- Form: حجز جلسة تعريفية مجانية (Bilingual Full) -->
            <div class="form-section">
                <div class="form-header">
                    <h2>📅 حجز جلسة تعريفية مجانية | Free Introductory Session Booking</h2>
                    <p>نساعدك على تخطي عقبات حياتك | We help you overcome life's obstacles</p>
                    <p style="font-size:0.85rem;">🌟 نقدم لك خدمات متكاملة للصحة النفسية | Comprehensive mental health services</p>
                </div>

                <form @submit.prevent="submitBooking">
                    <div class="form-grid">
                        <!-- الاسم الكامل Full Name -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">الاسم الكامل <span style="color:#2e7d32;">*</span></span>
                                <span class="label-en">Full Name</span>
                            </div>
                            <input type="text" v-model="form.fullName" required placeholder="example: أحمد محمد | Ahmed Mohammed">
                        </div>

                        <!-- البريد الإلكتروني Email -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">البريد الإلكتروني <span style="color:#2e7d32;">*</span></span>
                                <span class="label-en">Email Address</span>
                            </div>
                            <input type="email" v-model="form.email" required placeholder="info@example.com">
                        </div>

                        <!-- رقم الهاتف (اختياري) Phone Number optional -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">رقم الهاتف <span class="optional-badge">اختياري | Optional</span></span>
                                <span class="label-en">Phone Number (Optional)</span>
                            </div>
                            <input type="tel" v-model="form.phone" placeholder="+962 7XXXXXXX">
                        </div>

                        <!-- التحدي النفسي paragraph -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">ما التحدي النفسي أو العاطفي الذي تواجهه حاليًا؟ <span style="color:#2e7d32;">*</span></span>
                                <span class="label-en">What psychological or emotional challenge are you currently facing?</span>
                            </div>
                            <textarea v-model="form.challenge" required rows="3" placeholder="شاركنا باختصار... | Briefly share..."></textarea>
                        </div>

                        <!-- ما الذي تأمل أن تحققه -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">ما الذي تأمل أن تحققه من خلال هذه الجلسة؟ <span style="color:#2e7d32;">*</span></span>
                                <span class="label-en">What do you hope to gain from this session?</span>
                            </div>
                            <textarea v-model="form.goals" required rows="3" placeholder="أهدافك وتطلعاتك | Your goals and expectations"></textarea>
                        </div>

                        <!-- كيف تفضل التواصل معك؟ radio + other -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">كيف تفضل أن يتم التواصل معك؟ <span style="color:#2e7d32;">*</span></span>
                                <span class="label-en">How do you prefer to be contacted?</span>
                            </div>
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" value="email" v-model="form.contactMethod">
                                    <span>📧 البريد الإلكتروني | Email</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" value="whatsapp" v-model="form.contactMethod">
                                    <span>💬 واتساب | WhatsApp</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" value="phone" v-model="form.contactMethod">
                                    <span>📞 مكالمة هاتفية | Phone Call</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" value="other" v-model="form.contactMethod">
                                    <span>🔄 أخرى | Other</span>
                                </label>
                            </div>
                            <div v-if="form.contactMethod === 'other'" class="other-input">
                                <input type="text" v-model="form.otherContactMethod" placeholder="حدد طريقة أخرى | Specify other method" style="width:100%;">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-calendar-check"></i> احجز جلستك المجانية | Book Your Free Session
                    </button>

                    <div v-if="submittedSuccess" class="success-message">
                        <i class="fas fa-check-circle"></i> ✅ تم استلام طلبك بنجاح! سنتواصل معك قريبًا | Your request has been received successfully! We'll contact you soon.
                    </div>
                </form>
            </div>
            <footer>
                <div>💚 بيتك | Bytak — نقدم لك خدمات متكاملة للصحة النفسية | We provide integrated mental health services</div>
                <div style="margin-top:6px;">نساعدك على تخطي عقبات حياتك | Helping you overcome life's obstacles</div>
            </footer>
        </div>
    </div>
</div>

<script>
    // Quotes data (الصحة النفسية) - bilingual
    const quotesData = [
        { ar: "لا تجعل الماضي يأسر حاضرك، أنت تستحق السلام الداخلي.", en: "Don't let the past imprison your present, you deserve inner peace.", authorAr: "بيتك", authorEn: "Bytak" },
        { ar: "الصحة النفسية ليست رفاهية، إنها أساس لحياة متوازنة.", en: "Mental health is not a luxury, it's the foundation of a balanced life.", authorAr: "د. كارل يونغ", authorEn: "Dr. Carl Jung" },
        { ar: "التعافي رحلة وليس وجهة، كل خطوة صغيرة تقدّمك.", en: "Recovery is a journey, not a destination; every small step moves you forward.", authorAr: "بيتك", authorEn: "Bytak" },
        { ar: "كن لطيفًا مع عقلك كما تكون مع صديقك العزيز.", en: "Be kind to your mind as you would to your dearest friend.", authorAr: "لويز هاي", authorEn: "Louise Hay" },
        { ar: "طلب المساعدة علامة قوة، وليس ضعف.", en: "Asking for help is a sign of strength, not weakness.", authorAr: "بيتك النفسي", authorEn: "Bytak Psychology" },
        { ar: "أنت لست وحدك، الكثيرون يشعرون بما تشعر به.", en: "You are not alone; many feel what you feel.", authorAr: "برينيه براون", authorEn: "Brené Brown" },
        { ar: "عقلك يستحق الرعاية التي تقدمها لجسدك.", en: "Your mind deserves the care you give your body.", authorAr: "بيتك", authorEn: "Bytak" },
        { ar: "الشفاء يبدأ عندما تتجرأ على مواجهة مشاعرك.", en: "Healing begins when you dare to face your emotions.", authorAr: "بيتك", authorEn: "Bytak" },
        { ar: "أنت أقوى مما تعتقد، وأجمل مما تتخيل.", en: "You are stronger than you think, and more beautiful than you imagine.", authorAr: "بيتك", authorEn: "Bytak" }
    ];

    const { createApp, ref, onMounted, onUnmounted } = Vue;

    createApp({
        setup() {
            // Reactive state
            const currentQuote = ref({
                ar: "لا تجعل الماضي يأسر حاضرك، أنت تستحق السلام الداخلي.",
                en: "Don't let the past imprison your present, you deserve inner peace.",
                authorAr: "بيتك",
                authorEn: "Bytak"
            });
            const quoteIndex = ref(0);
            let intervalId = null;

            const form = ref({
                fullName: '',
                email: '',
                phone: '',
                challenge: '',
                goals: '',
                contactMethod: 'email',
                otherContactMethod: ''
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
                        authorEn: q.authorEn
                    };
                }, 20000);
            };

            // Submit form handler
            const submitBooking = () => {
                // Basic validation
                if (!form.value.fullName || !form.value.email || !form.value.challenge || !form.value.goals || !form.value.contactMethod) {
                    alert("الرجاء تعبئة جميع الحقول المطلوبة | Please fill all required fields.");
                    return;
                }
                if (form.value.contactMethod === 'other' && !form.value.otherContactMethod) {
                    alert("يرجى تحديد طريقة التواصل الأخرى | Please specify other contact method.");
                    return;
                }

                // Here you can integrate API call if needed
                console.log("Form Data (Vue 3):", {
                    fullName: form.value.fullName,
                    email: form.value.email,
                    phone: form.value.phone,
                    challenge: form.value.challenge,
                    goals: form.value.goals,
                    contactMethod: form.value.contactMethod === 'other' ? form.value.otherContactMethod : form.value.contactMethod
                });

                submittedSuccess.value = true;
                // Reset success message after 5 seconds
                setTimeout(() => {
                    submittedSuccess.value = false;
                }, 5000);

                // Optional: reset form fields if desired - keeping for better UX we don't auto clear
                // but we scroll to success
                setTimeout(() => {
                    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
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
                submitBooking
            };
        }
    }).mount('#app');
</script>
</body>
</html>
