<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
</head>
<body style="margin: 0; padding: 0; background-color: #f0fdf4; font-family: 'Segoe UI', Tahoma, sans-serif; direction: rtl;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 30px 10px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 15px; overflow: hidden; border: 1px solid #d1fae5; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">

                    <tr>
                        <td style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 30px; text-align: center; color: #ffffff;">
                            <div style="font-size: 40px; margin-bottom: 10px;">📋</div>
                            <h1 style="margin: 0; font-size: 24px; letter-spacing: 1px;">حجز موعد جديد</h1>
                            <p style="margin: 5px 0 0; opacity: 0.9; font-size: 14px;">Bytak System | نظام بيتك</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="font-size: 16px; color: #065f46; font-weight: bold; margin-bottom: 25px; border-right: 4px solid #10b981; padding-right: 10px;">
                                تفاصيل بيانات المريض:
                            </p>

                            <table width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 15px; border-bottom: 1px solid #ecfdf5; color: #6b7280; font-size: 14px;">الاسم الكامل:</td>
                                    <td style="padding: 15px; border-bottom: 1px solid #ecfdf5; font-weight: 600; color: #111827; text-align: left;">
                                        {{ $patientData['name'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; border-bottom: 1px solid #ecfdf5; color: #6b7280; font-size: 14px;">العمر:</td>
                                    <td style="padding: 15px; border-bottom: 1px solid #ecfdf5; font-weight: 600; color: #111827; text-align: left;">
                                        {{ $patientData['age'] }} سنة
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; border-bottom: 1px solid #ecfdf5; color: #6b7280; font-size: 14px;">رقم التواصل:</td>
                                    <td style="padding: 15px; border-bottom: 1px solid #ecfdf5; font-weight: 600; color: #10b981; text-align: left; direction: ltr;">
                                        {{ $patientData['phone'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; border-bottom: 1px solid #ecfdf5; color: #6b7280; font-size: 14px;">موعد التقديم:</td>
                                    <td style="padding: 15px; border-bottom: 1px solid #ecfdf5; font-weight: 600; color: #111827; text-align: left;">
                                        {{ $patientData['apply_date'] }}
                                    </td>
                                </tr>
                            </table>

                            <div style="margin-top: 40px; text-align: center;">
                                <a href="#" style="background-color: #10b981; color: #ffffff; padding: 14px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 15px; box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.4);">
                                    فتح ملف الحجز
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="background-color: #f9fafb; padding: 20px; text-align: center; font-size: 12px; color: #9ca3af; border-top: 1px solid #f3f4f6;">
                            تم إرسال هذا التقرير تلقائياً من لوحة تحكم <strong>بيتك</strong>.
                            <br> جميع الحقوق محفوظة &copy; 2026
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
