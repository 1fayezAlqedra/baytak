<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>بيتك | Bytak - حجز جلسة تعريفية مجانية | Free Introductory Session</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Vue 3 CDN -->
    <script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{ asset('site-assets/css/welcome.css') }}">
</head>

<body>
    <div id="app">
        <div class="app-container">
            <div class="main-card">
                <!-- Hero section: Logo + Bytak + Arabic/English side by side -->
                <div class="hero-section">
                    <div class="logo-area">
                        <img style="max-width: 220px ; max-height:220px; margin-left: 0px;"
                            src="{{ asset('site-assets/img/baytak-logo.png') }}" alt="">

                    </div>
                    <div class="bytak-sub">نادي اللياقة النفسية | Mental Fitness Club</div>

                    <div class="credentials">
                        <div class="cred-badge">
                            <span class="cred-ar">🎓 ماجستير في علم النفس الإكلينيكي - جامعه عمان الأهلية</span>
                            <span class="cred-en">Master in Clinical Psychology - Al-Ahliyya Amman University</span>
                        </div>
                        <div class="cred-badge">
                            <span class="cred-ar">📖 بكالوريوس الإرشاد النفسي - الجامعة الإسلامية بغزة</span>
                            <span class="cred-en">Bachelor of Psychology - Islamic University of Gaza</span>
                        </div>
                    </div>

                    <!-- Stats: +50 cases with bilingual -->
                    <div class="stats-row">
                        <div class="stat-box">
                            <div class="stat-number">+50</div>
                            <div class="stat-label-ar"> مشترك في نادي اللياقة النفسية </div>
                            <div class="stat-label-en">Member of the Mental Fitness Club</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number"><i class="fas fa-hand-holding-heart"></i> 100%</div>
                            <div class="stat-label-ar"> تدريب نفسي متخصص</div>
                            <div class="stat-label-en"> Specialized psychological training</div>
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

                    </div>
                </div>

                <!-- Form: حجز جلسة تعريفية مجانية (Bilingual Full) -->
                <div class="form-section">
                    <div class="form-header">
                        <h2>📅 حجز جلسة استشارة مجانية | Free consultation Session Booking</h2>
                        حين تضيق بك الطرق…
                        لا تحتاج دائمًا إلى الابتعاد، بل إلى مساحة تفهمك.<br>

                        When life’s paths feel tight and overwhelming…<br>
                        you don’t always need to walk away — you just need a space that truly understands you.
                    </div>

                </div>

                <form @submit.prevent="submitBooking">
                    <div class="form-grid">
                        <!-- الاسم الكامل Full Name -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">الاسم الكامل <span style="color:#2e7d32;">*</span></span>
                                <span class="label-en">Full Name</span>
                            </div>
                            <input type="text" v-model="form.fullName" required
                                placeholder="example: أحمد محمد | Ahmed Mohammed">
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
                                <span class="label-ar">رقم الهاتف <span class="optional-badge">اختياري |
                                        Optional</span></span>
                                <span class="label-en">Phone Number (Optional)</span>
                            </div>
                            <input type="tel" v-model="form.phone" placeholder="+962 7XXXXXXX">
                        </div>

                        <!-- التحدي النفسي paragraph -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">ما التحدي النفسي أو العاطفي الذي تواجهه حاليًا؟ <span
                                        style="color:#2e7d32;">*</span></span>
                                <span class="label-en">What psychological or emotional challenge are you currently
                                    facing?</span>
                            </div>
                            <textarea v-model="form.challenge" required rows="3"
                                placeholder="شاركنا باختصار... | Briefly share..."></textarea>
                        </div>

                        <!-- ما الذي تأمل أن تحققه -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">ما الذي تأمل أن تحققه من خلال هذه الجلسة؟ <span
                                        style="color:#2e7d32;">*</span></span>
                                <span class="label-en">What do you hope to gain from this session?</span>
                            </div>
                            <textarea v-model="form.goals" required rows="3"
                                placeholder="أهدافك وتطلعاتك | Your goals and expectations"></textarea>
                        </div>

                        <!-- كيف تفضل التواصل معك؟ radio + other -->
                        <div class="input-group full-width">
                            <div class="bilingual-label">
                                <span class="label-ar">كيف تفضل أن يتم التواصل معك؟ <span
                                        style="color:#2e7d32;">*</span></span>
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
                                <input type="text" v-model="form.otherContactMethod"
                                    placeholder="حدد طريقة أخرى | Specify other method" style="width:100%;">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-calendar-check"></i> احجز جلستك المجانية | Book Your Free Session
                    </button>

                    <div v-if="submittedSuccess" class="success-message">
                        <i class="fas fa-check-circle"></i> ✅ تم استلام طلبك بنجاح! سنتواصل معك قريبًا | Your
                        request has been received successfully! We'll contact you soon.
                    </div>
                </form>
            </div>
            <footer>
                <div>💚 بيتك | Bytak <br>حين تضيق بك الطرق…
                    لا تحتاج دائمًا إلى الابتعاد، بل إلى مساحة تفهمك.<br>

                    When life’s paths feel tight and overwhelming…
                    you don’t always need to walk away — you just need a space that truly understands you.</div>
        </div>
        </footer>
    </div>
    </div>
    </div>

    <script src="{{ asset('site-assets/js/welcome.js') }}"></script>
</body>

</html>
