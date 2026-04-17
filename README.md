
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# PuckLogic - Local Development Setup

PuckLogic is a Laravel-based web application for advanced hockey analytics, team management, and player clustering. This guide will help you set up and run the project locally on your own device.

---

## Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js (v16+ recommended) & npm
- SQLite (default) or MySQL/Postgres if you wish to use another DB

---

## 1. Clone the Repository
```
git clone <your-repo-url>
cd laravel_new
```

## 2. Install PHP Dependencies
```
composer install
```

## 3. Install Node.js Dependencies
```
npm install
```

## 4. Environment Setup
- Copy the example environment file:
	```
	cp .env.example .env
	```
- Edit `.env` as needed (set `APP_URL`, database settings, etc.)
- Generate an application key:
	```
	php artisan key:generate
	```

## 5. Database Setup
- By default, SQLite is used. To use it:
	- Create a file: `touch database/database.sqlite`
	- In `.env`, set:
		```
		DB_CONNECTION=sqlite
		DB_DATABASE=/absolute/path/to/laravel_new/database/database.sqlite
		```
- For MySQL/Postgres, update `.env` accordingly and create the database.

- Run migrations and seeders:
	```
	php artisan migrate --seed
	```

## 6. Build Frontend Assets
- For development (auto-reloads):
	```
	npm run dev
	```
- For production build:
	```
	npm run build
	```

## 7. Start the Laravel Server
```
php artisan serve
```
Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## Default Accounts
- **Commissioner:**
	- Email: commissioner@pucklogic.com
	- Password: password
- **Coach:**
	- Email: coach@pucklogic.com
	- Password: password

---

## Features
- Multi-auth for Commissioner, Coach, and Player
- Team, player, and league management
- Stat entry and analytics
- Player clustering (ML integration)
- Modern, responsive UI (Tailwind, Bootstrap, Chart.js, D3)

---

## Troubleshooting
- Ensure Vite (`npm run dev`) is running for CSS/JS hot reload
- If styles look broken, rebuild assets: `npm run build`
- For database errors, check `.env` DB settings and rerun migrations

---

## License
MIT

## Credits & Acknowledgments

This project uses the following open-source library for NHL data access:

- [nhl-api-py](https://github.com/coreyjs/nhl-api-py) by coreyjs and contributors
	- Licensed under the [Apache-2.0 License](https://www.apache.org/licenses/LICENSE-2.0)

Special thanks to the nhl-api-py project for providing a robust and up-to-date Python interface to the NHL API, enabling advanced analytics and machine learning workflows.
