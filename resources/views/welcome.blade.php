<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Task Manager - Welcome</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>body { font-family: 'Nunito', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-indigo-600 to-purple-600 text-white min-h-screen flex flex-col">

  <!-- Navbar -->
  <header class="container mx-auto px-6 py-8 flex justify-between items-center">
    <h1 class="text-3xl font-extrabold">TaskManager</h1>
    <nav class="space-x-4">
      <a href="{{ route('login') }}" class="px-4 py-2 bg-white bg-opacity-20 rounded hover:bg-opacity-30 transition">Log In</a>
      @if (Route::has('register'))
        <a href="{{ route('register') }}" class="px-4 py-2 bg-white bg-opacity-20 rounded hover:bg-opacity-30 transition">Register</a>
      @endif
    </nav>
  </header>

  <!-- Hero -->
  <section class="flex-grow flex items-center justify-center">
    <div class="text-center max-w-xl px-6">
      <h2 class="text-5xl font-extrabold mb-4">Organize Your Tasks Effortlessly</h2>
      <p class="mb-8 text-lg opacity-90">Stay on top of your day with our intuitive task manager. Plan, track, and complete tasks with ease.</p>
      <div class="space-x-4">
        <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg hover:bg-gray-100 transition">Get Started</a>
        <a href="{{ route('login') }}" class="px-6 py-3 border-2 border-white font-semibold rounded-lg hover:bg-white hover:text-indigo-600 transition">Log In</a>
      </div>
    </div>
  </section>

  <!-- Features -->
  <footer class="bg-white bg-opacity-10 py-12">
    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
      <div>
        <h3 class="text-2xl font-bold mb-2">Easy to Use</h3>
        <p class="opacity-90">Create and manage tasks in seconds with our user-friendly interface.</p>
      </div>
      <div>
        <h3 class="text-2xl font-bold mb-2">Track Progress</h3>
        <p class="opacity-90">Visualize your task completion and stay motivated.</p>
      </div>
      <div>
        <h3 class="text-2xl font-bold mb-2">Stay Organized</h3>
        <p class="opacity-90">Categorize and prioritize tasks to focus on what matters.</p>
      </div>
    </div>
  </footer>

</body>
</html>

