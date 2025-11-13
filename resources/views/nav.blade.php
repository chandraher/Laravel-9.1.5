<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Static Navigation</title>
  <!-- Tailwind via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
<!-- Tambahkan konfigurasi Tailwind SEBELUM CDN agar terbaca -->
<script>
  // Menambah warna kustom bernama 'brand' ke theme Tailwind
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          brand: { DEFAULT: '#2563eb' }
        }
      }
    }
  };
</script>
<!-- Efek hover untuk elemen dengan class 'card': sedikit naik 2px -->
<style>
  .card:hover { transform: translateY(-2px); }
</style>
  </head>
<body class="bg-gray-50 text-gray-900">
  <header class="bg-white border-b">
    <nav class="max-w-5xl mx-auto px-4 py-3 flex items-center gap-6">
      <a class="font-semibold text-brand" href="{{ url('/') }}">Home</a>
      <a class="font-semibold text-gray-900 hover:text-brand" href="{{ route('profil') }}">Profil</a>
      <a class="font-semibold text-gray-900 hover:text-brand" href="{{ route('about') }}">About</a>
    </nav>
  </header>
  <main class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-2">Menu Navigasi</h1>
    <p class="text-gray-600">Pilih menu di header: Home, Profil, atau About.</p>
  </main>
</body>
</html>
