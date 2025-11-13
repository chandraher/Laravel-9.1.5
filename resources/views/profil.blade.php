<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { theme: { extend: { colors: { brand: { DEFAULT: '#2563eb' }}}}};
  </script>
</head>
<body class="bg-gray-50 text-gray-900">
  <header class="bg-white border-b">
    <nav class="max-w-5xl mx-auto px-4 py-3 flex items-center gap-6">
      <a class="font-semibold text-gray-900 hover:text-brand" href="{{ url('/') }}">Home</a>
      <a class="font-semibold text-brand" href="{{ route('profil') }}">Profil</a>
      <a class="font-semibold text-gray-900 hover:text-brand" href="{{ route('about') }}">About</a>
    </nav>
  </header>
  <main class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-2">Profil</h1>
    <p class="text-gray-600">Ini adalah halaman profil.</p>
  </main>
</body>
</html>
