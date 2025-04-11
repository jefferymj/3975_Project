
# 🌿 Plant Identifier Web App

A web-based application that allows users to upload images of plants and receive identification results powered by the [PlantNet API](https://my.plantnet.org/). Authenticated users can store their search history and view previously identified plants.

---

## 🔧 Tech Stack

- **Frontend:** React + TypeScript + Tailwind CSS + Vite
- **Backend:** Laravel 12 (PHP 8+)
- **Authentication:** Laravel Breeze
- **Database:** SQLite (dev) / MySQL/PostgreSQL (optional)
- **API Integration:** PlantNet API
- **Storage:** Laravel Storage (local/public disk)

---

## ✨ Features

-  Upload an image and get plant species information
-  Uses PlantNet API to analyze and identify plants
-  Auth system (register/login/logout)
-  Authenticated users can:
  - View saved search history (Soon)
  - Store species, genus, family, common names, and uploaded images (Soon)
-  Image uploads stored under `/storage/app/public/plantnet`
-  Responsive and modern UI with Tailwind CSS

---

## 🚀 Getting Started

### 1. Clone the Repository
```bash
git clone https://github.com/YOUR_USERNAME/plant-identifier.git
cd plant-identifier
```

### 2. Setup Backend (Laravel)
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
```

Update `.env` with your `PLANTNET_API_KEY` and `PLANTNET_API_URL`.

```env
PLANTNET_API_KEY=your-api-key
PLANTNET_API_URL=https://my-api.plantnet.org/v2/identify/all
```

### 3. Setup Frontend (Vite + React)
```bash
cd resources/js
npm install
npm run dev
```

---

## 🧪 Testing

Use Laravel Tinker to manually test database saves:
```bash
php artisan tinker
>>> \App\Models\Plant::all();
```

---

## 🗂 Folder Structure Highlights

```
├── app/
│   ├── Http/
│   │   └── Controllers/PlantNetController.php
│   └── Models/Plant.php
├── resources/
│   ├── js/
│   │   └── components/MainScreen.tsx
│   └── views/
│       └── home.blade.php
├── routes/
│   └── web.php
│   └── api.php
```
## 📁 Project Structure

> **Important**: The Laravel backend and React frontend are fully integrated in the **same folder structure**. There is no separation between backend and frontend directories.

> This means all development commands (`php artisan`, `npm run dev`, etc.) must be run from the **same project root directory**.


---

## 👥 Credits

- Developed by: Heraldo Abreu, Jarell Vicencio,Alzen Landayan, Jeffery Monachan Joseph, Daniel Wang
- Powered by: [PlantNet API](https://my.plantnet.org/)
- UI: Tailwind CSS & React
- Framework: Laravel 12
