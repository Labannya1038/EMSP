@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Task Manager</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>body { font-family: 'Nunito', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-indigo-600 to-purple-600 text-white min-h-screen flex flex-col">

  <!-- Transparent Navbar -->
  <header class="container mx-auto px-6 py-6 flex justify-between items-center">
    <h1 class="text-3xl font-extrabold">TaskManager</h1>
    <nav class="space-x-4">
      <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-white text-black bg-opacity-20 rounded hover:bg-opacity-30 transition">Dashboard</a>
      <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="px-4 py-2 bg-white text-black bg-opacity-20 rounded hover:bg-opacity-30 transition">Logout</button>
      </form>
    </nav>
  </header>

  <!-- Hero Section -->
  <main class="flex-grow container mx-auto px-6 py-12 text-center">
    <h2 class="text-4xl font-extrabold mb-4">Welcome, {{ Auth::user()->name }}!</h2>
    <p class="mb-8 text-lg opacity-90">Here’s what’s coming up in your tasks.</p>
  </main>

  <!-- Tasks List Container -->
  <section class="container mx-auto px-6 py-8 bg-white bg-opacity-10 rounded-lg shadow-lg backdrop-blur-sm">
    <div class="text-left mb-6">
      <h3 class="text-2xl font-semibold text-white">Your Upcoming Tasks</h3>
    </div>
    <ul class="space-y-4">
      @foreach ($tasks as $task)
        <li class="flex justify-between items-center p-4 bg-white bg-opacity-20 rounded-lg hover:bg-opacity-30 transition">
          <div>
            <h4 class="font-medium text-black">{{ $task->title }}</h4>
            <p class="text-sm opacity-80 text-black">Due by: {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</p>
          </div>
        </li>
      @endforeach
      @if($tasks->isEmpty())
        <p class="text-center opacity-80 py-4">No upcoming tasks. Enjoy your free time!</p>
      @endif
    </ul>
  </section>

  <!-- Footer Feature Highlights -->
  <footer class="mt-auto py-12">
    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-3 gap-8 text-center text-white">
      <div>
        <h4 class="text-xl font-bold mb-2">Easy to Use</h4>
        <p class="opacity-80">Quickly add and manage tasks with our intuitive interface.</p>
      </div>
      <div>
        <h4 class="text-xl font-bold mb-2">Track Progress</h4>
        <p class="opacity-80">Stay on top with clear due dates and status badges.</p>
      </div>
      <div>
        <h4 class="text-xl font-bold mb-2">Stay Organized</h4>
        <p class="opacity-80">Prioritize tasks to focus on what matters most.</p>
      </div>
    </div>
  </footer>

</body>
</html>
@endsection







