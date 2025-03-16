# Laravel Translation Management API

This project is a Translation Management Service built with Laravel. It provides API endpoints for managing translations and includes Swagger documentation for easy integration.

## 🚀 Features
- CRUD operations for translations (`/api/translations`)
- Role-based access control with Laravel Sanctum
- API documentation with Swagger
- Frontend UI for translation management
- Caching for optimized performance

## 🔧 Installation

### Prerequisites
- PHP 8.2+
- Composer
- MySQL or SQLite
- Node.js & NPM (for frontend)

### Setup Instructions
```bash
# Clone the repository
git clone https://github.com/Faizan14289/laravel-translation-api.git
cd laravel-translation-api

# Install dependencies
composer install
npm install && npm run build

# Set up environment variables
cp .env.example .env
php artisan key:generate

# Set up database
php artisan migrate --seed

# Run the development server
php artisan serve
```

## 🛠 API Endpoints
| Method | Endpoint | Description |
|--------|---------|-------------|
| GET | `/api/translations` | Fetch all translations |
| POST | `/api/translations` | Create a new translation |
| PUT | `/api/translations/{id}` | Update a translation |
| DELETE | `/api/translations/{id}` | Delete a translation |

## 📝 Swagger Documentation
The API documentation is available at:
```
http://localhost/api/documentation
```

## 🏗 Design Choices
- **Laravel Sanctum**: Used for authentication.
- **Cache Layer**: Implemented for improved API performance.
- **Vue.js Frontend**: Simple UI for managing translations.
- **Swagger (L5-Swagger)**: Provides API documentation.

## ✅ Running Tests
```bash
php artisan test
```

## 📜 License
This project is licensed under the Faizan Corps.

