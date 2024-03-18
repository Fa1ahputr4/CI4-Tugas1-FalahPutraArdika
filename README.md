# CodeIgniter 4 

## Apa itu CodeIgniter4 ?

CodeIgniter adalah framework web full-stack PHP yang ringan, cepat, fleksibel dan aman.
Informasi lebih lanjut dapat ditemukan di [situs resmi](https://codeigniter.com).

# > Instalasi
## 1. Instalasi Composer
Komposer dapat digunakan dalam beberapa cara untuk menginstal CodeIgniter4 di sistem Anda.
> [!IMPORTANT]
> CodeIgniter4 memerlukan Composer 2.0.14 atau lebih baru.

Teknik pertama menjelaskan pembuatan proyek kerangka menggunakan CodeIgniter4, yang kemudian akan Anda gunakan sebagai dasar untuk aplikasi web baru. Teknik kedua yang dijelaskan di bawah ini memungkinkan Anda menambahkan CodeIgniter4 ke aplikasi web yang sudah ada,

>[!NOTE]
>Jika Anda menggunakan repositori Git untuk menyimpan kode Anda, atau untuk berkolaborasi dengan orang lain, maka folder vendor biasanya akan “git diabaikan”. Dalam kasus seperti ini, Anda perlu melakukan hal berikut saat mengkloning repositori ke sistem baru.`composer update`

### Buat Project Baru
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

   
### Menambahkan CodeIgniter4 ke project yang ada
Di root project anda ketikan sebagai berikut :
```shell
composer require codeigniter4/framework
```

# > Bangun Aplikasi Pertama Anda
## 2. Halaman Statis
Hal pertama yang akan Anda lakukan adalah menyiapkan aturan perutean untuk menangani halaman statis.

Perutean mengaitkan URI dengan metode pengontrol. Pengontrol hanyalah sebuah kelas yang membantu mendelegasikan pekerjaan. Kami akan membuat pengontrol nanti.
Mari kita siapkan aturan perutean. Buka file rute yang terletak di app/Config/Routes.php .
Satu-satunya petunjuk rute untuk memulai adalah:

```shell
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
```
Arahan ini mengatakan bahwa setiap permintaan masuk tanpa konten apa pun yang ditentukan harus ditangani oleh index()metode di dalam Homepengontrol.

### Buat Pengontrol Halaman
Buat file di app/Controllers/Pages.php dengan kode berikut.

```shell
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        // ...
    }
}
```
Anda telah membuat kelas bernama Pages, dengan view()metode yang menerima satu argumen bernama $page. Ia juga memiliki index()metode, sama dengan pengontrol default yang ditemukan di app/Controllers/Home.php ; metode itu menampilkan halaman selamat datang CodeIgniter.

### Buat Tampilan
Buat header di app/Views/templates/header.php dan tambahkan kode berikut:
```shell
        <!doctype html>
    <html>
    <head>
        <title>Falah Putra Ardika</title>
    </head>
    <body>

        <h1><?= esc($title) ?></h1>
        <h2>FPA</h2>
        <h3>84</h3>
        <h4>ti2d</h4>
```
Header berisi kode HTML dasar yang ingin Anda tampilkan sebelum memuat tampilan utama, bersama dengan judul. Ini juga akan menampilkan $titlevariabel, yang akan kita definisikan nanti di pengontrol. Sekarang, buat footer di app/Views/templates/footer.php yang menyertakan kode berikut:
```shell
<em>&copy; 2024</em>
</body>

</html>
```

### Menambahkan Logika ke Kontroler
Untuk memuat halaman tersebut, Anda harus memeriksa apakah halaman yang diminta benar-benar ada. Ini akan menjadi isi metode view()pada Pagespengontrol yang dibuat di atas:
```shell
<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // Add this line

class Pages extends BaseController
{
    // ...

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Halaman tidak ada
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Gunakan Huruf Kapital pada abjad pertama

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}
```
Hasilnya sebagai berikut :
![image](https://github.com/Fa1ahputr4/Tugas1/assets/134368686/9119faec-e884-473e-b17d-ebe9b1b2eb7c)

## 3. Struktur Aplikasi
Untuk mendapatkan hasil maksimal dari CodeIgniter, Anda perlu memahami bagaimana struktur aplikasi, secara default, dan apa yang dapat Anda ubah untuk memenuhi kebutuhan aplikasi Anda.

### Aplikasi
aplikasi Direktori adalah tempat semua kode aplikasi Anda berada. Ini hadir dengan struktur direktori default yang berfungsi dengan baik untuk banyak aplikasi. Folder berikut membentuk konten dasar. Karena appdirektori sudah diberi namespace, Anda bebas memodifikasi struktur direktori ini agar sesuai dengan kebutuhan aplikasi Anda. Misalnya, Anda mungkin memutuskan untuk mulai menggunakan pola Repositori dan Model Entitas untuk bekerja dengan data Anda. Dalam hal ini, Anda dapat mengganti nama Modelsdirektori menjadi Repositories, dan menambahkan direktori baru Entities.Semua file dalam direktori ini berada di bawah Appnamespace, meskipun Anda bebas mengubahnya di app/Config/Constants.php .

### System
Direktori ini menyimpan file-file yang membentuk kerangka itu sendiri. Meskipun Anda memiliki banyak fleksibilitas dalam cara menggunakan direktori aplikasi, file dalam direktori sistem tidak boleh diubah. Sebaliknya, Anda harus memperluas kelas, atau membuat kelas baru, untuk menyediakan fungsionalitas yang diinginkan.Semua file dalam direktori ini berada di bawah CodeIgniternamespace.

### Publik
Folder publik menampung bagian aplikasi web Anda yang dapat diakses browser, mencegah akses langsung ke kode sumber Anda. Ini berisi file .htaccess utama , index.php , dan aset aplikasi apa pun yang Anda tambahkan, seperti CSS, javascript, atau gambar.Folder ini dimaksudkan sebagai “root web” situs Anda, dan server web Anda akan dikonfigurasi untuk mengarah ke folder tersebut.

### Writeble
Direktori ini menampung semua direktori yang mungkin perlu ditulisi selama masa pakai aplikasi. Ini termasuk direktori untuk menyimpan file cache, log, dan unggahan apa pun yang mungkin dikirim pengguna. Anda harus menambahkan direktori lain tempat aplikasi Anda perlu menulis di sini. Hal ini memungkinkan Anda untuk menjaga direktori utama lainnya tidak dapat ditulisi sebagai langkah keamanan tambahan.

### Test
Direktori ini disiapkan untuk menyimpan file pengujian Anda. Direktori ini _supportmenampung berbagai kelas tiruan dan utilitas lain yang dapat Anda gunakan saat menulis pengujian Anda. Direktori ini tidak perlu ditransfer ke server produksi Anda.

## 4. Mode;, View, dan Controller
### Apa itu MVC?
Setiap kali Anda membuat aplikasi, Anda harus menemukan cara untuk mengatur kode agar mudah menemukan file yang tepat dan memudahkan pemeliharaan. Seperti kebanyakan kerangka web, CodeIgniter menggunakan pola Model, View, Controller (MVC) untuk mengatur file. Hal ini menjaga data, presentasi, dan aliran melalui aplikasi sebagai bagian yang terpisah.

