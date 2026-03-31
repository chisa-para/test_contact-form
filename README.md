# test_contact-form

```markdown
# COACHTECHお問い合わせフォーム

## 1. 概要

Laravelを使用した、お問い合わせ・管理システムのアプリケーションです。

## 2. 環境構築の手順

Dockerビルド
1. `git clone git@github.com:chisa-para/test_contact-form.git`
2. `docker-compose up -d --build`

Laravel環境構築
1.`cp src/.env.example src/.env`
　.env内の各項目の値を下記のように変更
　・DB_HOST=mysql
　・DB_DATABASE=laravel_db
　・DB_USERNAME=laravel_user
　・DB_PASSWORD=laravel_pass

2. `docker-compose exec php bash`
3. `composer install` 
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`

## 3. 開発環境

お問い合わせ画面:http://localhost/
ユーザー登録:http://localhost/register
phpMyAdmin:http://localhost:8080/

## 4. 使用技術（実行環境）

- PHP 8.1.34
- Laravel 8.83.8
- MySQL 8.0.26
- nginx 1.21.1
- jquery 3.7.1.min.js
```

ER図
<img width="1662" height="785" alt="スクリーンショット 2026-03-31 154711" src="https://github.com/user-attachments/assets/13fddfaa-0271-41a3-9cb3-bab1147c1e52" />
