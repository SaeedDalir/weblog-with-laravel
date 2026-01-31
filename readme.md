# Weblog with Laravel

Full-stack **weblog (blog)** application built with **Laravel 5.8**. Includes public blog, admin panel (posts, categories, users, comments, photos, messages), RTL support (e.g. Persian), CKEditor, Dropzone, and Laravel Collective HTML.

## What it does

**Public**

- Homepage — List posts
- Post detail — Single post by slug, with comments
- Search — Search posts by title
- Categories — Posts per category
- Contact — Contact form and message storage
- Comments — Add and reply to comments

**Admin** (middleware: `admin`)

- Dashboard
- Users — CRUD
- Posts — CRUD, bulk delete
- Categories — CRUD
- Photos / media — Upload, list, bulk delete
- Comments — List, actions, bulk delete
- Messages — Inbox, bulk delete

## Tech stack

- **Laravel** 5.8
- **PHP** ^7.1.3
- **hekmatinasser/verta** — Jalali (Persian) date
- **laravelcollective/html** — Form & HTML helpers
- **CKEditor** — Rich text (in `public/ckeditor/`)
- **Dropzone** — File upload (dropzone.js)
- **Bootstrap** — RTL layout, IranSans, Sahel, Font Awesome

## Requirements

- PHP >= 7.1.3
- Composer
- Node/npm (for Laravel Mix; see `webpack.mix.js`)
- Database (MySQL/PostgreSQL/SQLite)

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
# Set DB_* in .env
php artisan migrate
npm install
npm run dev
php artisan serve
```

## Main routes

**Public**

- `/` — Home
- `/posts/{slug}` — Post show
- `/search` — Search posts
- `/categories/{slug}/posts` — Category posts
- `/contact` — Contact form
- `/comments/{postId}` — Store comment (POST)
- `/comments` — Reply (POST)

**Admin** (prefix `admin/`, middleware `admin`)

- `admin/dashboard` — Dashboard
- `admin/users` — User resource
- `admin/posts` — Post resource (+ delete all)
- `admin/categories` — Category resource
- `admin/photos` — Photo resource (+ delete all)
- `admin/comments` — Comment management (+ actions, delete all)
- `admin/messages` — Messages (+ delete all)

## Project structure (high level)

- `app/Http/Controllers/Frontend/` — Main, Post, Comment
- `app/Http/Controllers/Admin/` — Dashboard, User, Post, Category, Photo, Comment, Message
- `app/Http/Middleware/` — `admin` middleware
- `app/Role.php`, `app/User.php` — Roles and users
- `database/migrations/` — Users, roles, posts, categories, photos, comments, messages

## License

MIT
