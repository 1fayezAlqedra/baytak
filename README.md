🧠 Baytak – Mental Health Platform
📌 Overview

Baytak is a full-stack Mental Health Support Platform designed to provide a safe, modern, and user-friendly environment for users to explore mental well-being, manage appointments, and connect with healthcare services.

The platform focuses on improving accessibility to mental health resources while maintaining clean architecture and scalable development practices.

🚀 Features
🔐 Secure Authentication (Login / Register)
👤 Role-based Access (Admin / User / Doctor)
📅 Appointment Booking System
🧑‍⚕️ Doctor & Patient Management
📊 Admin Dashboard with full control
💬 Clean and responsive UI/UX
🌐 API-ready architecture
🏗️ System Architecture
Backend: Laravel (MVC Architecture)
Frontend: Vue.js
Styling: Tailwind CSS
Database: MySQL
Auth: Laravel Authentication
🛠️ Technologies Used
Laravel
Vue.js
Tailwind CSS
MySQL
⚙️ Installation & Setup

1. Clone the repository
   git clone https://github.com/1fayezAlqedra/baytak.git
   cd baytak
2. Install dependencies
   composer install
   npm install
3. Environment setup
   cp .env.example .env
   php artisan key:generate
4. Configure database

Update .env:

DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD= 5. Run migrations
php artisan migrate 6. Run the application
php artisan serve
npm run dev
🧪 Usage
Register as a new user
Login to the system
Book appointments
Access dashboard based on role
📸 Screenshots

![Login](images/login.png)
![Dashboard](images/dashboard.png)
![Booking](images/booking.png)
🔐 Security Features
Password hashing
CSRF protection
Middleware-based route protection
Role-based authorization
📈 Future Improvements
Real-time notifications
Chat between users and doctors
Advanced analytics dashboard
Mobile application support
👨‍💻 Author

Fayez Emad
GitHub: 1fayezAlqedra

📄 License

This project is for educational and portfolio purposes.
