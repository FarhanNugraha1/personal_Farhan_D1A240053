<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>Gallery | Personal Web</title>
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
    .red .border-gray-200 {
      border-color: #fecaca;
    }
    .red .border-gray-700 {
      border-color: #fecaca;
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
  Gallery | Farhan Nugraha
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

<!-- Gallery Grid -->
<main class="max-w-6xl mx-auto p-6">
  <h2 class="text-xl font-bold mb-6 text-center">Galeri Foto</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php
    $sql = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
    $query = mysqli_query($db, $sql);
    while ($data = mysqli_fetch_array($query)) {
      echo "<div class='bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded shadow overflow-hidden'>";
      echo "<img src='images/{$data['foto']}' class='w-full h-48 object-cover' alt='Gambar'>";
      echo "<div class='p-4'>";
      echo "<h3 class='text-lg font-semibold text-blue-700 dark:text-blue-400'>" . htmlspecialchars($data['judul']) . "</h3>";
      echo "</div></div>";
    }
    ?>
  </div>
</main>

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

  const theme = localStorage.getItem('theme');
  if (theme === 'dark') {
    htmlElement.classList.add('dark');
  } else if (theme === 'red') {
    htmlElement.classList.add('red');
  }
</script>

</body>
</html>
