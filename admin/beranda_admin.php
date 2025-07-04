<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}
require_once("../koneksi.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);

// Hitung total artikel dan gallery
$jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
$jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));
?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  <style>
    .red body {
      background-color: #7f1d1d;
      color: #fef2f2;
    }
    .red header,
    .red footer {
      background-color: #b91c1c;
    }
    .red aside {
      background-color: #991b1b;
      color: #fee2e2;
    }
    .red main {
      background-color: #991b1b;
    }
    .red h1,
    .red h2,
    .red h3,
    .red strong {
      color: #fecaca;
    }
    .red a {
      color: #fee2e2;
    }
    .red a:hover {
      text-decoration: underline;
    }
    .red .border-t-4 {
      border-color: #fecaca;
    }
  </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white min-h-screen transition-colors duration-300">

<!-- Tombol Mode -->
<div class="fixed top-4 right-4 z-50 flex space-x-2">
  <button id="toggleDark" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
    Dark Mode
  </button>
  <button id="toggleRed" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 transition">
    Red Mode
  </button>
</div>

<!-- Header -->
<header class="bg-blue-900 dark:bg-gray-800 text-white text-center py-6 shadow">
  <h1 class="text-3xl font-bold">Halaman Administrator</h1>
</header>

<!-- Container -->
<div class="flex max-w-7xl mx-auto mt-8 px-4">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-white dark:bg-gray-800 dark:text-white rounded shadow p-4">
    <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-400 mb-4 text-center">MENU</h2>
    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
      <li><a href="beranda_admin.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
      <li><a href="data_artikel.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Gallery</a></li>
      
      <li><a href="about.php" class="block hover:text-blue-600 dark:hover:text-blue-400">About</a></li>
      <li>
        <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
          class="block text-red-600 hover:underline font-medium">Logout</a>
      </li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="w-3/4 bg-white dark:bg-gray-800 dark:text-white rounded shadow p-6 ml-6">
    <div class="text-lg text-gray-800 dark:text-gray-200 mb-4">
      Halo, <strong class="text-blue-700 dark:text-blue-400"><?php echo $_SESSION['username']; ?></strong>! Apa kabar? 😊
    </div>
    <p class="text-sm text-gray-500 dark:text-gray-400">Silakan gunakan menu di samping untuk mengelola data.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
      <div class="bg-white dark:bg-gray-700 shadow rounded p-4 text-center border-t-4 border-blue-600 dark:border-blue-400">
        <h3 class="text-xl font-semibold text-blue-700 dark:text-blue-400">Artikel</h3>
        <p class="text-3xl font-bold text-gray-800 dark:text-white"><?php echo $jumlah_artikel; ?></p>
      </div>

      <div class="bg-white dark:bg-gray-700 shadow rounded p-4 text-center border-t-4 border-green-600 dark:border-green-400">
        <h3 class="text-xl font-semibold text-green-700 dark:text-green-300">Gallery</h3>
        <p class="text-3xl font-bold text-gray-800 dark:text-white"><?php echo $jumlah_gallery; ?></p>
      </div>
    </div>
  </main>
</div>

<!-- Footer -->
<footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-10">
  &copy; <?php echo date('Y'); ?> | Dibuat oleh Farhan Nugraha
</footer>

<!-- Script Mode -->
<script>
  const toggleDark = document.getElementById('toggleDark');
  const toggleRed = document.getElementById('toggleRed');
  const htmlElement = document.documentElement;

  toggleDark.addEventListener('click', () => {
    htmlElement.classList.toggle('dark');
    htmlElement.classList.remove('red');
    if (htmlElement.classList.contains('dark')) {
      localStorage.setItem('theme', 'dark');
    } else {
      localStorage.setItem('theme', 'light');
    }
  });

  toggleRed.addEventListener('click', () => {
    htmlElement.classList.toggle('red');
    htmlElement.classList.remove('dark');
    if (htmlElement.classList.contains('red')) {
      localStorage.setItem('theme', 'red');
    } else {
      localStorage.setItem('theme', 'light');
    }
  });

  const theme = localStorage.getItem('theme');
  if (theme === 'dark') {
    htmlElement.classList.add('dark');
  } else if (theme === 'red') {
    htmlElement.classList.add('red');
  }
</script>

</body>
</html>
