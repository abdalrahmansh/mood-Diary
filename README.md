# Mood Diary API

Simple Docker-based setup for the Mood Diary backend API.

## Requirements

- [x] Docker
- [x] Docker Compose

## Installation

Follow these steps to run the project locally.

### 1) Clone the repository

```bash
git clone https://github.com/yourname/mood-diary-api.git
```

### 2) Enter the project directory

```bash
cd mood-diary-api
```

### 3) Copy environment file

```bash
cp .env.example .env
```

Ensure the database settings match Docker defaults:

```env
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=mood_diary
DB_USERNAME=postgres
DB_PASSWORD=secret
```

### 4) Build and start containers

```bash
docker compose up -d --build
```

### 5) Install dependencies

```bash
docker compose exec app composer install
```

### 6) Generate application key

```bash
docker compose exec app php artisan key:generate
```

### 7) Run migrations

```bash
docker compose exec app php artisan migrate
```

## API Documentation

Swagger UI is available at:

- [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
