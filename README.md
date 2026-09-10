# AL FAHIM INTERNATIONAL &bull; Overseas Manpower & Visa Processing Portal

<p align="center">
  <img src="public/images/favicon/android-chrome-192x192.png" width="96" alt="Al Fahim International Logo" />
</p>

<p align="center">
  <strong>Government-Approved Overseas Manpower Recruitment Agency & Visa Processing Management Portal</strong>
</p>

---

## 📌 Project Overview

**AL FAHIM INTERNATIONAL** is a full-featured, modern web portal and enterprise back-office management system designed for a government-authorized overseas manpower recruitment agency headquartered in Dhaka, Bangladesh.

The platform streamlines candidate recruitment, digital job applications, online passport application status tracking, country visa directories, team profiles, news blogs, dynamic website content customization, and administrative workflow management with role-based access control.

---

## 🌟 Key Features

### 🌐 Public Frontend Portal
- **Hero & Services Showcase:** Interactive country visa circulars, job category spotlights, overseas process timelines, and live statistics counter.
- **Online Job Application & Passport Tracking:** Real-time online application submission and instant passport status verification modal (`/apply`).
- **Interactive Office Tour Modal:** Step-by-step visual office tour with road-to-floor guidance (Lift 14, Tower A, Banani, Dhaka).
- **Executive Leadership & Team Directory:** Dedicated profile pages with direct phone, email, and social connectivity (`/ourTeam`).
- **Destination Countries Directory:** In-depth guides for Saudi Arabia, UAE, Malaysia, Maldives, and Romania (`/country/{id}`).
- **News & Visa Circulars:** Category-filtered overseas job circulars and immigration articles (`/blog_list`).
- **Contact & Inquiry System:** Interactive Google Maps embed and instant lead inquiry capture (`/contact`).
- **SEO & Social Share Ready:** Dynamic OpenGraph tags, automated page-level metadata, and multi-device favicon setup.

### ⚙️ Admin Back-Office Management
- **Role-Based Access Control (RBAC):** Powered by Spatie Laravel-Permission with custom granular privileges.
- **Candidate Applications Management:** Server-side DataTables tracking walk-in and online candidates with status lifecycle updates.
- **Dynamic Website Content CMS:** Complete control over home sliders, section headings, about details, and media assets.
- **Team & Staff Management:** Full CRUD with circular thumbnail preview, biography rich-text editor, and contact details.
- **Theme & Brand Colors:** Dynamic primary/secondary color and branding palette manager.
- **Countries & Visa Types:** Multi-country visa category catalog and requirements manager.
- **Lead Message Inbox:** View and manage visitor inquiries submitted through the contact forms.

---

## 🛠️ Technology Stack

- **Backend Framework:** [Laravel 10.x](https://laravel.com/) (PHP 8.1+)
- **Database:** MySQL 8.0+ / MariaDB
- **Frontend Assets & Bundler:** [Vite](https://vitejs.dev/) + Sass (SCSS) + Vanilla JavaScript
- **Admin Template & UI:** Bootstrap 5, Remix Icon, Semantic UI, FontAwesome 6, DataTables (Server-side)
- **Role & Permission:** `spatie/laravel-permission`
- **Rich Text Editor:** CKEditor 4

---

## 🚀 Installation & Local Setup

### 1. Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL Server

### 2. Clone and Setup Environment
```bash
# Clone the repository
git clone <repository-url>
cd visa-processing

# Install PHP dependencies
composer install

# Install Frontend dependencies
npm install

# Setup Environment File
cp .env.example .env

# Generate Application Key
php artisan key:generate
```

### 3. Database Configuration
Open `.env` and set your MySQL database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vdocglobal
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Run Migrations & Database Seeders
```bash
# Run database schema migrations
php artisan migrate

# Seed all initial dataset (Roles, Admin, Website Content, Countries, Visas, Blogs, Team Members)
php artisan db:seed
```

### 5. Compile Frontend Assets & Start Server
```bash
# In Terminal 1 (Vite Dev Server)
npm run dev

# In Terminal 2 (Laravel Server)
php artisan serve
```
The application will be accessible at: `http://localhost:8000`

---

## 🔑 Default Admin Credentials

- **Admin Login URL:** `http://localhost:8000/login`
- **Email:** `admin@gmail.com`
- **Password:** `12345678`

---

## ⚡ Production Deployment & Optimization

When deploying to a live production environment, execute the following optimization commands:

```bash
# Build optimized frontend assets
npm run build

# Cache configuration, routes, and views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize Composer autoloader
composer install --optimize-autoloader --no-dev
```

---

## 📄 License & Ownership

Developed for **AL FAHIM INTERNATIONAL**. All rights reserved &copy; 2026.
