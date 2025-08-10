# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Eventify is a Laravel 12 application using **Laravel Breeze (Livewire stack)** for authentication, **Livewire** for interactive components, **TailwindCSS** for styling, and **Alpine.js** for lightweight frontend interactions. The project uses **Laravel Sail** for a Docker-based development environment with a **MySQL** database.

## Development Environment

This project uses Docker via Laravel Sail. The main services are:
- `laravel.test`: Main Laravel application (PHP 8.4)
- `mysql`: MySQL 8.0 database server

### Database Configuration
- Database name: `db_eventify`
- Username: `sail`
- Password: `password`
- Host: `mysql` (within Docker network)

## Essential Commands

### Docker/Sail Commands
```bash
# Start all services
./vendor/bin/sail up -d

# Stop all services
./vendor/bin/sail down

# Open a shell in the app container
./vendor/bin/sail bash

# Access MySQL shell
./vendor/bin/sail mysql -u sail -ppassword db_eventify
```

### Laravel Artisan Commands
```bash
# All artisan commands must be run via Sail
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail artisan config:clear
./vendor/bin/sail artisan cache:clear
./vendor/bin/sail artisan route:list
```

### Testing
No automated tests are required in this project. **Do not** create or update test files. Perform manual QA as described in the Development Workflow.

### Code Quality
```bash
# Laravel Pint (code formatting)
./vendor/bin/pint

# Check formatting without fixing
./vendor/bin/pint --test
```
- All code must follow Laravel, Livewire, and Tailwind best practices and conventions.
- Every function must include a short docblock description explaining its purpose.
- Keep code clean and well-structured; prefer readability and conventional patterns.

### Frontend Development
```bash
# Install npm dependencies
npm ci

# Development build with watch / HMR
npm run dev

# Production build
npm run build
```

### Integrated Development
```bash
# Run all services concurrently (server, queue, logs, vite) if a script is available
composer dev
```

## Architecture

### Authentication System
Uses **Laravel Breeze (Livewire stack)**. Key components:
- Livewire auth-related components in `app/Livewire/Auth/`
- Profile management via Livewire in `app/Livewire/Profile/`
- Blade views in `resources/views/`
- Middleware-protected routes for authenticated users in `routes/web.php`

### Frontend Stack
- **TailwindCSS**: Utility-first CSS framework
- **Livewire**: Server-driven UI components
- **Alpine.js**: Lightweight JS for simple interactivity
- **Vite**: Asset bundling and hot module replacement
- **Blade Components**: Reusable UI in `resources/views/components/`
- **Design system**: Use only these colors `#d3ad57`, `#313244`, `#ffffff`; the UI must be modern, fully responsive, and **dark-mode optimized**.

### Key Directories
- `app/Livewire/`: Livewire components (pages and UI)
- `app/Models/`: Eloquent models
- `app/Services/`: Application/service-layer classes
- `app/Providers/`: Service providers
- `resources/views/`: Blade templates
- `resources/css/` and `resources/js/`: Frontend assets
- `database/migrations/`: Database schema files
- `routes/web.php`: Web routes definition

> Always verify the existing folder structure **before** creating new files or directories. Follow PSR-4 and Laravel conventions. If a new module requires new directories, propose the structure first.

### Database
Standard Laravel setup with:
- Users table with email verification
- Cache table for database-driven cache
- Jobs table for queue processing
- Sessions stored in database

**For detailed database structure and table documentation, see [readme_database.md](readme_database.md).**  
**Important:** Any database change (migrations/seeds) must be logged in `readme_database.md` with date, migration name, purpose, and a short rationale.

## Development Workflow

1. **Clarify Requirements First**: If a prompt/task is not at least **95% understood**, ask targeted questions until it is clear. Do **not** start coding before this is achieved.
2. **Environment Setup**: Ensure `.env` is configured with correct database settings and Sail is running.
3. **Folder Structure Check**: Confirm the existing folder structure is correct; avoid unnecessary new folders/files.
4. **Database Changes**: Create migrations for schema changes and run them with Sail; **document every change** in `readme_database.md`.
5. **Frontend**: Use `npm run dev` during development for hot reloading; ensure responsive design and dark-mode support across the app; use only `#d3ad57`, `#313244`, `#ffffff`.
6. **Manual QA (No Tests)**: Manually verify features across major breakpoints (mobile, tablet, desktop) and core flows (auth, navigation, forms). Fix any UI/UX issues before committing.
7. **Compliance & Security**: Ensure GDPR compliance for EU users (data minimization, consent/cookies where applicable, user data export/delete, privacy policy references, secure storage). Keep secrets out of VCS and avoid logging sensitive personal data.

## Important Notes

- The project name in environment may be "Laravel" but the actual project is "Eventify".
- Database connection uses `mysql` as host (Docker service name).
- Sessions and cache are database-driven.
- Queue system is configured to use the database driver.
- Email is set to log driver for development.
- **All artisan commands must be executed via `./vendor/bin/sail artisan ...` (never `php artisan`).**
- **No tests should be written.** Code must adhere to Laravel, Livewire, and Tailwind best practices; each function includes a short description.
- The UI must use colors `#d3ad57`, `#313244`, `#ffffff`, be responsive on all device sizes, and be dark-mode optimized.
- The app must follow GDPR and relevant European compliance requirements at all times.
