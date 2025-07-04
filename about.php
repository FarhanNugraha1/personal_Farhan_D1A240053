<?php include "koneksi.php"; ?> 
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>About | Personal Web</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  <style>
    /* Custom Red Mode */
    .red body {
      background-color: #7f1d1d;
      color: #fef2f2;
    }
    .red header,
    .red footer,
    .red nav {
      background-color: #b91c1c;
    }
    .red nav a:hover {
      text-decoration: underline;
    }
    .red .bg-white {
      background-color: #991b1b;
    }
    .red .text-blue-700,
    .red .text-blue-400 {
      color: #fecaca;
    }
    .red .text-gray-700 {
      color: #fee2e2;
    }
    .red .text-gray-300 {
      color: #fee2e2;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 font-sans transition-colors duration-300">

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
<header class="bg-blue-900 dark:bg-blue-950 text-white text-center p-6 text-2xl font-bold">
  About Me | Farhan Nugraha
</header>

<!-- Navigation -->
<nav class="bg-blue-700 dark:bg-blue-800 text-white py-3">
  <ul class="flex justify-center space-x-10 font-medium text-lg">
    <li><a href="index.php" class="hover:underline">Artikel</a></li>
    <li><a href="gallery.php" class="hover:underline">Gallery</a></li>
    <li><a href="about.php" class="hover:underline">About</a></li>
    <li><a href="admin/login.php" class="hover:underline">Login</a></li>
  </ul>
</nav>

<!-- About Content -->
<main class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow mt-8">
  <h2 class="text-xl font-bold mb-4 text-blue-700 dark:text-blue-400">Tentang Saya</h2>
  <div class="space-y-6 mb-10">
    <?php
    $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC";
    $query = mysqli_query($db, $sql);
    while ($data = mysqli_fetch_array($query)) {
      echo "<div>";
      echo "<p class='text-gray-700 dark:text-gray-300'>" . htmlspecialchars($data['about']) . "</p>";
      echo "</div>";
    }
    ?>
  </div>

<!-- Embed Google Maps: Lokasi Kota Subang -->
<h2 class="text-xl font-bold mb-4 text-blue-700 dark:text-blue-400">Lokasi Saya</h2>
<div class="rounded overflow-hidden shadow">
  <iframe
    class="w-full h-80"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d33243.123456789!2d107.7587!3d-6.569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b1f8f4693af3%3A0xc7c8a52c57d20593!2sSubang%2C%20West%20Java%2C%20Indonesia!5e0!3m2!1sid!2sid!4v1719999999999!5m2!1sid!2sid"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>



<!-- Footer -->
<footer class="bg-blue-800 dark:bg-blue-900 text-white text-center py-4 mt-10">
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

  // Cek localStorage
  const theme = localStorage.getItem('theme');
  if (theme === 'dark') {
    htmlElement.classList.add('dark');
  } else if (theme === 'red') {
    htmlElement.classList.add('red');
  }
</script>

</body>
</html>
