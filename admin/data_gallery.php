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
  <title>Kelola Gallery</title>
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
    .red .bg-blue-600,
    .red .bg-blue-700,
    .red .bg-blue-800,
    .red .bg-blue-900,
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
  <h1 class="text-3xl font-bold">Kelola Gallery</h1>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-4">
    <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-400 mb-4 text-center">MENU</h2>
    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
      <li><a href="beranda_admin.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
      <li><a href="data_artikel.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="block font-semibold text-blue-800 dark:text-blue-300">Kelola Gallery</a></li>
      <li><a href="about.php" class="block hover:text-blue-600 dark:hover:text-blue-400">About</a></li>
      <li>
        <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
           class="block text-red-600 dark:text-red-400 hover:underline font-medium">Logout</a>
      </li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold text-gray-800 dark:text-white">Daftar Gallery</h2>
      <a href="add_gallery.php"
         class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Tambah Gambar</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php
      $sql = "SELECT * FROM tbl_gallery";
      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<div class='bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded shadow overflow-hidden'>";
        echo "<img src='../images/{$data['foto']}' class='w-full h-48 object-cover'>";
        echo "<div class='p-4'>";
        echo "<p class='font-semibold text-gray-800 dark:text-white mb-2'>" . htmlspecialchars($data['judul']) . "</p>";
        echo "<div class='flex justify-between text-sm'>";
        echo "<a href='edit_gallery.php?id_gallery={$data['id_gallery']}' class='text-blue-600 dark:text-blue-400 hover:underline'>Edit</a>";
        echo "<a href='delete_gallery.php?id_gallery={$data['id_gallery']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 dark:text-red-400 hover:underline'>Hapus</a>";
        echo "</div>";
        echo "</div></div>";
      }
      ?>
    </div>
  </main>
</div>

<!-- Footer -->
<footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-10">
  &copy; <?php echo date('Y'); ?> | Dibuat oleh Farhan Nugraha
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
