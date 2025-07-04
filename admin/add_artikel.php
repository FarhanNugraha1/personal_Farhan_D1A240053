<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>Tambah Artikel</title>
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
    .red strong {
      color: #fecaca;
    }
    .red a {
      color: #fee2e2;
    }
    .red a:hover {
      text-decoration: underline;
    }
    .red .bg-blue-700,
    .red .bg-blue-800,
    .red .bg-blue-900,
    .red .bg-blue-600,
    .red .hover\:bg-blue-700:hover,
    .red .hover\:bg-blue-800:hover {
      background-color: #b91c1c !important;
    }
    .red .text-blue-700,
    .red .text-blue-800,
    .red .text-blue-900 {
      color: #fecaca !important;
    }
    .red .hover\:text-blue-600:hover {
      color: #fee2e2 !important;
    }
    .red .font-semibold {
      color: #fecaca !important;
    }
  </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white min-h-screen transition-colors duration-300">

<!-- Toggle Mode Buttons -->
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
  <h1 class="text-3xl font-bold">Tambah Artikel Baru</h1>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-4">
    <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-400 mb-4 text-center">MENU</h2>
    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
      <li><a href="beranda_admin.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
      <li><a href="data_artikel.php" class="block font-semibold text-blue-800 dark:text-blue-300">Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Gallery</a></li>
      <li><a href="about.php" class="block hover:text-blue-600 dark:hover:text-blue-400">About</a></li>
      <li>
        <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
           class="block text-red-600 dark:text-red-400 hover:underline font-medium">Logout</a>
      </li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
    <form action="proses_add_artikel.php" method="post" class="space-y-6">
      <div>
        <label for="nama_artikel" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Judul Artikel</label>
        <input type="text" id="nama_artikel" name="nama_artikel" required
               class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>
      <div>
        <label for="isi_artikel" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Isi Artikel</label>
        <textarea id="isi_artikel" name="isi_artikel" rows="5" required
                  class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
      </div>
      <div class="flex justify-end space-x-4">
        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">Simpan</button>
        <a href="data_artikel.php" class="bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white px-4 py-2 rounded hover:bg-gray-400 dark:hover:bg-gray-500 transition">Batal</a>
      </div>
    </form>
  </main>
</div>

<!-- Footer -->
<footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-10">
  &copy; <?php echo date('Y'); ?> | Created by NamaSendiri
</footer>

<!-- Script Toggle Mode -->
<script>
  const toggleDark = document.getElementById('toggleDark');
  const toggleRed = document.getElementById('toggleRed');
  const htmlElement = document.documentElement;

  toggleDark.addEventListener('click', () => {
    htmlElement.classList.toggle('dark');
    htmlElement.classList.remove('red');
    localStorage.setItem('theme', htmlElement.classList.contains('dark') ? 'dark' : 'light');
  });

  toggleRed.addEventListener('click', () => {
    htmlElement.classList.toggle('red');
    htmlElement.classList.remove('dark');
    localStorage.setItem('theme', htmlElement.classList.contains('red') ? 'red' : 'light');
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
