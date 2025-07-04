<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location:beranda_admin.php');
}
require_once("../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>Login Administrator</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  <style>
    .red body {
      background: linear-gradient(to bottom right, #991b1b, #7f1d1d);
      color: #fef2f2;
    }
    .red .bg-white {
      background-color: #991b1b;
    }
    .red .text-blue-700,
    .red .text-blue-400 {
      color: #fecaca;
    }
    .red label {
      color: #fee2e2;
    }
    .red input {
      background-color: #7f1d1d;
      color: #fee2e2;
      border-color: #fecaca;
    }
    .red input[type="submit"] {
      background-color: #b91c1c;
    }
    .red input[type="reset"] {
      background-color: #991b1b;
    }
    .red input[type="submit"]:hover {
      background-color: #dc2626;
    }
    .red input[type="reset"]:hover {
      background-color: #b91c1c;
    }
    .red .text-gray-600 {
      color: #fee2e2;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 dark:from-gray-900 dark:to-gray-800 min-h-screen flex items-center justify-center transition-colors duration-300">

<!-- Tombol Mode -->
<div class="fixed top-4 right-4 z-50 flex space-x-2">
  <button id="toggleDark" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
    Dark Mode
  </button>
  <button id="toggleRed" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 transition">
    Red Mode
  </button>
</div>

<div class="bg-white dark:bg-gray-900 shadow-lg rounded-lg p-8 w-full max-w-md">
  <h2 class="text-2xl font-bold text-center text-blue-700 dark:text-blue-400 mb-6">Login Administrator</h2>
  <form action="cek_login.php" method="post" class="space-y-5">
    <div>
      <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
      <input type="text" name="username" id="username" required
        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
      <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
      <input type="password" name="password" id="password" required
        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="flex justify-between items-center">
      <input type="submit" name="login" value="Login"
        class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 cursor-pointer">
      <input type="reset" name="cancel" value="Cancel"
        class="bg-gray-300 dark:bg-gray-600 dark:text-white text-gray-700 px-4 py-2 rounded hover:bg-gray-400 dark:hover:bg-gray-500 cursor-pointer">
    </div>
  </form>
  <div class="text-center text-sm text-gray-600 dark:text-gray-400 mt-6">
    &copy; <?php echo date('Y'); ?> - Farhan Nugraha
  </div>
</div>

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
