:

🏥 Bytak System

A modern Booking & Management System built with Laravel (Backend) and Vue.js (Frontend) to efficiently manage client bookings, track status, and visualize analytics.

🚀 Features
📋 Bookings Management
View all bookings in a structured dashboard
Pagination support
Filtering by status
🔄 Status Control
Mark bookings as:
Pending
Contacted
Completed
📊 Analytics Dashboard
Total bookings
Unique clients
Contact rate
Pending rate
Weekly booking statistics (Chart.js)
📱 Smart Contact Integration
Clickable Email (mailto:)
WhatsApp redirection (wa.me)
Clean and responsive contact UI
⚡ Real-time UI
Loading states for updates
Smooth UX interactions
🧱 Tech Stack
Backend: Laravel
Frontend: Vue.js (Composition API)
HTTP Client: Axios
Charts: Chart.js
Styling: Bootstrap / Custom CSS
📁 Project Structure
/backend (Laravel)
 ├── app/
 ├── routes/
 ├── app/Http/Controllers/
 └── database/

/frontend (Vue)
 ├── main.js
 ├── components/
 └── assets/
⚙️ Installation
1️⃣ Clone the project
git clone https://github.com/your-username/bytak-system.git
cd bytak-system
2️⃣ Backend Setup (Laravel)
cd backend

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
3️⃣ Frontend Setup (Vue)
cd frontend

npm install

npm run dev
🔗 API Endpoints
Method	Endpoint	Description
GET	/api/bookings	Get all bookings
PATCH	/api/bookings/{id}/status	Update booking status
GET	/api/weekly-stats	Get weekly analytics
📊 Dashboard Overview

The dashboard provides:

📈 Weekly booking trends
📊 Contact method distribution
📌 Status tracking
📋 Full booking list with actions
📱 Contact Integration
Email:
<a href="mailto:user@example.com">Send Email</a>
WhatsApp:
<a href="https://wa.me/201234567890" target="_blank">
  Chat on WhatsApp
</a>
🛠️ Environment Variables

Example .env:

APP_NAME=Bytak
APP_URL=http://127.0.0.1:8000

DB_DATABASE=bytak
DB_USERNAME=root
DB_PASSWORD=
📸 Screenshots

(Add screenshots here from your dashboard for better presentation)

✨ Future Improvements
🔔 Notifications system
📧 Email automation
📱 WhatsApp API integration
🔐 Authentication & roles
🌍 Multi-language support
🤝 Contributing

Contributions are welcome!

Fork the repo
Create a new branch
Make your changes
Submit a pull request
📄 License

This project is licensed under the MIT License.

👨‍💻 Author

Fayez Emad

💼 Backend Developer (PHP / Laravel)
🌐 Passionate about building scalable systems
🚀 Always learning and improving
⭐ Support

If you like this project, please give it a ⭐ on GitHub!
