# 環境構築

## Docker

```bash
git clone git@github.com:Naruyama628/Contact_form.git
cd Contact_form
docker-compose up -d --build
Laravel
docker-compose exec php bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
※ .env のDB設定は docker-compose.yml に合わせてください。
```

使用技術
PHP 8.2.11

Laravel 8.83

MySQL 8.0.26

nginx 1.21.1

phpMyAdmin

Docker / Docker Compose

ER図
[text](README.md)

URL
お問い合わせ画面: http://localhost/

ユーザー登録: http://localhost/register

phpMyAdmin: http://localhost:8080
