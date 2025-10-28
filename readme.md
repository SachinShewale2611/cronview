# 🕒 CronView Dashboard

A modern, open-source **Laravel + Inertia + Vue 3** dashboard to visualize all your scheduled tasks (cron jobs) defined in Laravel.  
It helps developers **see**, **understand**, and **debug** their application's scheduled tasks easily — all in one clean UI.

---

## 🚀 Features

- 📋 Auto-detects all Laravel scheduled tasks (`routes/console.php`)
- 🧠 Displays human-readable cron frequencies (e.g., “Every minute”, “Every Monday at 08:00”)
- 🕑 Shows next and previous run times
- 💬 Displays command description and artisan command details
- 🎨 Built using Laravel 12, Inertia, and Vue 3 with TailwindCSS
- ⚙️ Extensible to show real-time scheduler logs or add new tasks dynamically

---

## 📦 Tech Stack

| Component | Technology |
|------------|-------------|
| Backend | Laravel 12 |
| Frontend | Inertia.js + Vue 3 |
| UI | TailwindCSS |
| Cron Parsing | `dragonmantank/cron-expression` |
| Human-readable Cron | `lorisleiva/cron-translator` |

---

## 🧰 Installation

### 1️⃣ Clone & Install

```bash
git clone https://github.com/SachinShewale2611/cronview.git
cd cronview
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
```

---

### 2️⃣ Configure Laravel Scheduler

Ensure you have at least one scheduled task in your `routes/console.php` file:

```php
use Illuminate\Support\Facades\Schedule;

Schedule::command('inspire')
    ->everyMinute()
    ->description('Display a random inspirational quote');
```

---

### 3️⃣ Run Scheduler Manually

```bash
php artisan schedule:run
```

Or to keep it running continuously:

```bash
php artisan schedule:work
```

---

### 4️⃣ View CronView Dashboard

Start the local server:

```bash
php artisan serve
```

Then visit:

👉 [http://localhost:8000/cronview](http://localhost:8000/cronview)

You’ll see a beautiful dashboard like this:

| Command | Cron | Readable | Next Run | Prev Run | Description |
|----------|-------|-----------|------------|------------|--------------|
| `php artisan inspire` | `* * * * *` | Every minute | 2025-10-28 18:35 | 2025-10-28 18:34 | Display a random quote |

---

## 🕑 Sub-minute Tasks (e.g., Every 15 Seconds)

By default, Laravel’s scheduler is **minute-based** only.  
If you need tasks to run every 15 seconds, you have two options:

---

### 🔧 Option 1: System Cron (Recommended)

Run Laravel’s scheduler multiple times per minute via your system cron.

#### Linux crontab:

```bash
* * * * * php /path/to/artisan schedule:run
* * * * * sleep 15; php /path/to/artisan schedule:run
* * * * * sleep 30; php /path/to/artisan schedule:run
* * * * * sleep 45; php /path/to/artisan schedule:run
```

#### Windows (Task Scheduler):

Create a task to run:

```bash
php "C:\xampp\htdocs\yourproject\artisan" schedule:run
```

Set the **trigger** to repeat every **15 seconds**.

---

### 🔁 Option 2: Continuous Job Loop

If you need a true 15-second loop inside Laravel:

```php
dispatch(function () {
    // your logic here
    MyJob::dispatch()->delay(15);
});
```

This approach uses Laravel's queue system to self-dispatch periodically.

---

## 🧱 Project Structure

```
app/
 ├── Services/
 │   └── CronScanner.php     ← main logic
resources/
 ├── js/Pages/CronView/
 │   └── Index.vue           ← dashboard UI
routes/
 ├── console.php             ← where you define tasks
 └── web.php                 ← routes for CronView
```

---

## 💻 Contributing

Pull requests are welcome!  
If you have ideas for features or improvements, feel free to open an issue or PR.

### Steps to Contribute

1. Fork this repo  
2. Create a feature branch  
   ```bash
   git checkout -b feature/your-feature
   ```
3. Commit your changes  
   ```bash
   git commit -m "Add new feature"
   ```
4. Push your branch  
   ```bash
   git push origin feature/your-feature
   ```
5. Submit a PR 🚀

---
