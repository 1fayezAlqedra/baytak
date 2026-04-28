<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>بيتك | Bytak - حجز جلسة تعريفية مجانية | Free Introductory Session</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{ asset('site-assets/css/welcome.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('site-assets/img/Baytak.png') }}">
</head>

<body>
    <div id="app">
        <div class="app-container">
            <div class="main-card">

                <div class="hero-section">
                    <div class="logo-area">
                        <img class="main-logo" src="{{ asset('site-assets/img/Baytak.png') }}" alt="Bytak Logo">
                    </div>

                    <h1 class="hero-title"> لياقتك النفسية تبدأ من هنا</h1>

                    <div class="text-content">
                        <p class="hero-description">
                            انضم إلى نادي "بيتك" للياقة النفسية؛ مساحتك الآمنة لبناء القوة النفسية، توازن المشاعر،
                            وتطوير المرونة مع مختصين.
                        </p>
                    </div>

                    <div class="top-action">
                        <a href="#booking-section" class="btn-cta">
                            <i class="fas fa-calendar-check"></i> ابدأ رحلتك الآن
                        </a>
                    </div>

                    <hr class="section-divider">

                    <div class="profile-header-wrapper">
                        <div class="profile-photo-area">
                            <img src="{{ asset('site-assets/img/DRAlaa.png') }}" alt="د. الاء" class="doctor-photo">
                        </div>

                        <div class="profile-name-info">
                            <div class="doctor-name-ar">الآء عادل</div>
                            <div class="doctor-name-en">Alaa Adel</div>
                            <div class="doctor-title">أخصائية نفسية | Psychologist</div>
                        </div>
                    </div>

                    <div class="credentials">
                        <div class="cred-badge">
                            <span class="cred-ar">🎓 ماجستير في علم النفس الإكلينيكي - جامعة عمان الأهلية</span>
                            <span class="cred-en">Master in Clinical Psychology - Al-Ahliyya Amman University</span>
                        </div>
                        <div class="cred-badge">
                            <span class="cred-ar">📖 بكالوريوس الإرشاد النفسي - الجامعة الإسلامية بغزة</span>
                            <span class="cred-en">Bachelor of Psychology - Islamic University of Gaza</span>
                        </div>
                    </div>

                    <div class="stats-row">
                        <div class="stat-box">
                            <div class="stat-number">+50</div>
                            <div class="stat-label-ar">مشترك في نادي اللياقة النفسي</div>
                            <div class="stat-label-en">Member of the Mental Fitness Club</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number"><i class="fas fa-hand-holding-heart"></i> 100%</div>
                            <div class="stat-label-ar">تدريب نفسي عملي</div>
                            <div class="stat-label-en">Practical psychological training</div>
                        </div>
                    </div>

                    <div class="motivation-section">
                        <div class="quote-text">
                            @{{ currentQuote.ar }} | @{{ currentQuote.en }}
                        </div>
                        <div class="quote-author">
                            @{{ currentQuote.authorAr }} | @{{ currentQuote.authorEn }}
                        </div>
                    </div>
                </div>

                <div id="booking-section" class="form-section">
                    <div class="form-header">
                        <h2>📅املأ النموذج التالي لنفهم احتياجك أكثر ونوجّهك إلى البداية الأنسب لك داخل بيتك </h2>
                        <p>حين تضيق بك الطرق… لا تحتاج دائمًا إلى الابتعاد، بل إلى مساحة تفهمك.</p>
                    </div>

                    <form @submit.prevent="submitBooking">
                        <div class="form-grid">
                            <div class="input-group full-width">
                                <div class="bilingual-label">
                                    <span class="label-ar">الاسم الكامل <span class="required-star">*</span></span>
                                    <span class="label-en">Full Name</span>
                                </div>
                                <input type="text" v-model="form.fullName" required
                                    placeholder="أحمد محمد | Ahmed Mohammed">
                            </div>

                            <div class="input-group full-width">
                                <div class="bilingual-label">
                                    <span class="label-ar">البريد الإلكتروني <span class="required-star">*</span></span>
                                    <span class="label-en">Email Address</span>
                                </div>
                                <input type="email" v-model="form.email" required placeholder="info@example.com">
                            </div>

                            <div class="input-group full-width">
                                <div class="bilingual-label">
                                    <span class="label-ar">رقم الهاتف </span>
                                    <span class="label-en">Phone Number (Optional)</span>
                                </div>
                                <input type="tel" v-model="form.phone" placeholder="+962 7XXXXXXX">
                            </div>

                            <div class="input-group full-width">
                                <div class="bilingual-label">
                                    <span class="label-ar"> ما أكثر شيء يرهقك هذه الفترة؟<span
                                            class="required-star">*</span></span>
                                    {{-- <span class="label-en">Current challenge?</span> --}}
                                </div>
                                <textarea v-model="form.challenge" required rows="3"
                                    placeholder="شاركنا باختصار..."></textarea>
                            </div>

                            <div class="input-group full-width">
                                <div class="bilingual-label">
                                    <span class="label-ar"> ما الذي تتمنى أن تصل إليه من هذه الجلسة؟<span
                                            class="required-star">*</span></span>
                                    <span class="label-en">What do you hope to gain?</span>
                                </div>
                                <textarea v-model="form.goals" required rows="3"
                                    placeholder="أهدافك وتطلعاتك"></textarea>
                            </div>

                            <div class="input-group full-width">
                                <div class="bilingual-label">
                                    <span class="label-ar">كيف تفضل التواصل؟ <span class="required-star">*</span></span>
                                    <span class="label-en">Preferred contact method?</span>
                                </div>
                                <div class="radio-group">
                                    <label class="radio-option"><input type="radio" value="email"
                                            v-model="form.contactMethod"> <span>📧 إيميل</span></label>
                                    <label class="radio-option"><input type="radio" value="whatsapp"
                                            v-model="form.contactMethod"> <span>💬 واتساب</span></label>
                                    <label class="radio-option"><input type="radio" value="phone"
                                            v-model="form.contactMethod"> <span>📞 مكالمة</span></label>
                                    <label class="radio-option"><input type="radio" value="other"
                                            v-model="form.contactMethod"> <span>🔄 أخرى</span></label>
                                </div>
                                <div v-if="form.contactMethod === 'other'" class="other-input">
                                    <input type="text" v-model="form.otherContactMethod" placeholder="حدد طريقة أخرى">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fas fa-calendar-check"></i> احجز جلستك المجانية | Book Your Free Session
                        </button>

                        <div v-if="submittedSuccess" class="success-message">
                            ✅ تم استلام طلبك بنجاح! سنتواصل معك قريبًا.
                        </div>
                    </form>
                </div>

                <div class="testimonials-section">
                    <h3 class="testimonials-title">قالوا عن نادي بيتك | Community Voices</h3>

                    <div class="testimonials-grid">
                        <div class="testimonial-card">
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">
                                "بصراحة كانت تجربة فارقة. ما كنت متخيل إن فيه مكان بيسمعني وبيهتم بتفاصيل مرونتي النفسية
                                زي بيتك. شعرت بالأمان والمهنية العالية."
                            </p>
                            <div class="testimonial-author">سارة م.</div>
                        </div>

                        <div class="testimonial-card">
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">
                                "درّب عقلك كما تدرب جسدك.. هاي الجملة طبقتها فعلياً بالنادي. التمارين النفسية اللي
                                عملناها ساعدتني أسيطر على توتري اليومي بشكل رهيب."
                            </p>
                            <div class="testimonial-author">أحمد خ.</div>
                        </div>

                        <div class="testimonial-card">
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">
                                "كل الشكر للأخصائية الاء عادل على الأسلوب الراقي والعلمي. الجلسة التعريفية كانت كافية
                                لأعرف إني بالمكان الصح."
                            </p>
                            <div class="testimonial-author">لينا أ.</div>
                        </div>
                    </div>
                </div>

                <footer>
                    <div class="footer-content">
                        💚 بيتك | Bytak <br>
                        حين تضيق بك الطرق… لا تحتاج دائمًا إلى الابتعاد، بل إلى مساحة تفهمك.
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('site-assets/js/welcome.js') }}"></script>
</body>

</html>
