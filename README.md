# CodeIgniter 4 

## Apa itu CodeIgniter4 ?

CodeIgniter adalah framework web full-stack PHP yang ringan, cepat, fleksibel dan aman.
Informasi lebih lanjut dapat ditemukan di [situs resmi](https://codeigniter.com).

# Instalasi
## Instalasi Composer
Komposer dapat digunakan dalam beberapa cara untuk menginstal CodeIgniter4 di sistem Anda.
> [!IMPORTANT]
> CodeIgniter4 memerlukan Composer 2.0.14 atau lebih baru.

Teknik pertama menjelaskan pembuatan proyek kerangka menggunakan CodeIgniter4, yang kemudian akan Anda gunakan sebagai dasar untuk aplikasi web baru. Teknik kedua yang dijelaskan di bawah ini memungkinkan Anda menambahkan CodeIgniter4 ke aplikasi web yang sudah ada,

>[!NOTE]
>Jika Anda menggunakan repositori Git untuk menyimpan kode Anda, atau untuk berkolaborasi dengan orang lain, maka folder vendor biasanya akan “git diabaikan”. Dalam kasus seperti ini, Anda perlu melakukan hal berikut saat mengkloning repositori ke sistem baru.`composer update`

1. Instalasi Pertama
   Instalasi ini digunakan untuk pemula yang baru akan membuart project dari awal
   Pada folder Root anda
   ```shell
   "composer create-project codeigniter4/appstarter project-root"
   ```
   Perintah di atas akan membuat folder root proyek .
   Jika Anda menghilangkan argumen “project-root”, perintah akan membuat folder “appstarter”, yang dapat diganti namanya sesuai kebutuhan.

> [!IMPORTANT]
   >Saat Anda menerapkan ke server produksi, jangan lupa untuk menjalankan perintah berikut:
   >```shell
   >composer install --no-dev
   >```
   >perintah di atas akan menghapus paket Composer hanya untuk pengembangan yang tidak diperlukan di lingkungan produksi. Ini akan sangat mengurangi ukuran folder vendor.

   
3. Instalasi Kedua

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> The end of life date for PHP 7.4 was November 28, 2022.
> The end of life date for PHP 8.0 was November 26, 2023.
> If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> The end of life date for PHP 8.1 will be November 25, 2024.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
