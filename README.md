🚀 Baytak

Bytak is a modern web-based booking system designed to efficiently manage client reservations through a clean dashboard, real-time analytics, and smart communication tools.

Built with Laravel (Backend) and Vue.js (Frontend), the system focuses on simplicity, performance, and a smooth user experience.

✨ Overview
📋 Centralized booking management system
📊 Real-time analytics dashboard
🔄 Instant booking status updates
📧 One-click email communication
📱 WhatsApp integration ready
⚡ Fast & responsive UI
🧠 Project Goal

The goal of Bytak is to simplify booking management for service-based businesses by providing:

A unified dashboard for all bookings
Easy client communication
Data-driven insights for better decisions
🧩 Features
📋 Booking Management
View all bookings in a structured table
Pagination support
Clean and user-friendly interface
🔄 Status System

Each booking can be updated in real-time:

⏳ Pending
📞 Contacted
✅ Completed
📊 Analytics Dashboard
Total bookings
Unique clients
Contact rate (%)
Pending rate (%)
Weekly booking trends
Contact method distribution
📞 Smart Communication
Click-to-email functionality
WhatsApp-ready integration
🧱 Tech Stack
Layer	Technology
Backend	Laravel
Frontend	Vue.js (Composition API)
HTTP	Axios
Charts	Chart.js
UI	Bootstrap
📁 Project Structure
Bytak/
│
├── backend (Laravel API)
│   ├── Controllers
│   ├── Routes
│   └── Database
│
├── frontend (Vue Dashboard)
│   ├── components
│   ├── assets
│   └── main.js
⚙️ Setup Instructions
1️⃣ Clone Repository
git clone https://github.com/your-username/bytak.git
cd bytak
2️⃣ Backend (Laravel)
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
3️⃣ Frontend (Vue)
cd frontend
npm install
npm run dev
🔗 API Endpoints
Method	Endpoint	Description
GET	/api/bookings	Fetch all bookings
PATCH	/api/bookings/{id}/status	Update booking status
GET	/api/weekly-stats	Fetch analytics data
📸 Screenshots
### 🔐 Login Page
Secure authentication system for users and admins.

<img width="466" height="794" width="600"  alt="Screenshot 2026-05-04 195648" src="https://github.com/user-attachments/assets/ac91bfb0-178f-4b8c-9257-2d5fb8143422" />


### 🏠 Home Page
Landing page showcasing the main features of Bytak platform.

<img width="804" height="716"  width="600" alt="Screenshot 2026-05-04 195558" src="https://github.com/user-attachments/assets/c4943926-455f-4705-8a1a-12e3dfe8fb01" />


<img width="793" height="617" width="600" alt="Screenshot 2026-05-04 195609" src="https://github.com/user-attachments/assets/941424e9-f4eb-422e-8083-8dab1ddba325" />

### 📊 Admin Dashboard
Central dashboard for managing bookings, users, and analytics in real-time.
<img width="1402" height="825"  width="600" alt="Screenshot 2026-05-04 195733" src="https://github.com/user-attachments/assets/a1d0a62b-080a-442e-8a5b-5f060cfa34a0" />

<img width="1377" height="517" alt="Screenshot 2026-05-04 202305" src="https://github.com/user-attachments/assets/73ed541b-201f-4d37-a7b5-048de8865f50" />

<img width="535" height="284"  width="600" alt="Screenshot 2026-05-04 195912" src="https://github.com/user-attachments/assets/e98e43bb-ffe1-4126-adc4-c956bdeeb055" />



🔮 Future Improvements
🔐 Authentication & role-based access
📧 Email notification system
📱 WhatsApp API automation
🧑‍💼 Multi-role system (Admin / Staff)
👨‍💻 Author

Fayez Emad
Backend Developer (Laravel / PHP)

⭐ Support

If you like this project, consider giving it a ⭐ on GitHub.
