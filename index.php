<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>Personal Web | Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {}
      }
    }
  </script>
  <style>
    /* Custom Red Mode */
    .red body {
      background-color: #7f1d1d; /* dark red */
      color: #fef2f2; /* light text */
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
      background-color: #991b1b; /* content bg */
    }
    .red .text-blue-700,
    .red .text-blue-400 {
      color: #fecaca; /* pink-ish text */
    }
    .red .border-gray-300 {
      border-color: #fecaca;
    }
    .red .border-gray-700 {
      border-color: #fecaca;
    }
    .red ul li {
      color: #fee2e2;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 font-sans transition-colors duration-300">

<!-- Tombol Toggle Mode -->
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
  Personal Web | Farhan Nugraha 
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

<!-- Main Content -->
<main class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
  <!-- Artikel Utama -->
  <section class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Artikel Terbaru</h2>
    <div class="space-y-4">
      <?php
      $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<div class='border-b pb-4 border-gray-300 dark:border-gray-700'>";
        echo "<h3 class='text-lg font-semibold text-blue-700 dark:text-blue-400'>" .
          htmlspecialchars($data['nama_artikel']) . "</h3>";
        echo "<p>" . htmlspecialchars($data['isi_artikel']) . "</p>";
        echo "</div>";
      }
      ?>
    </div>
  </section>

  <!-- Sidebar -->
  <aside class="bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h2 class="text-lg font-bold mb-4">Daftar Artikel</h2>
    <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
      <?php
      $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<li>" . htmlspecialchars($data['nama_artikel']) . "</li>";
      }
      ?>
    </ul>
  </aside>
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

  // Saat halaman dimuat
  const theme = localStorage.getItem('theme');
  if (theme === 'dark') {
    htmlElement.classList.add('dark');
  } else if (theme === 'red') {
    htmlElement.classList.add('red');
  }
</script>

</body>
</html>
