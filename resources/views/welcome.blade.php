<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | PuckLogic</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <body class="bg-gradient-to-br from-indigo-100 via-white to-blue-100 min-h-screen flex flex-col">
    <header class="bg-white shadow py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
            <div class="flex items-center gap-2">
                <img src="/logo.svg" alt="PuckLogic Logo" class="h-8 w-8">
                <span class="font-bold text-xl text-indigo-700">PuckLogic</span>
            </div>
            <nav class="space-x-6">
                <a href="/login" class="text-indigo-700 hover:underline font-medium">Login</a>
                <a href="/register" class="text-gray-700 hover:underline font-medium">Register</a>
            </nav>
        </div>
    </header>
    <main class="flex-1 flex flex-col items-center justify-center text-center px-4">
        <h1 class="text-4xl md:text-6xl font-extrabold text-indigo-800 mb-4">Welcome to PuckLogic</h1>
        <p class="text-lg md:text-2xl text-gray-700 mb-8 max-w-2xl">Your all-in-one platform for managing hockey leagues, teams, players, stats, and analytics. Get started by logging in or registering below.</p>
        <div class="space-x-4">
            <a href="/login" class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 font-semibold transition">Login</a>
            <a href="/register" class="px-6 py-3 bg-white border border-indigo-600 text-indigo-700 rounded-lg shadow hover:bg-indigo-50 font-semibold transition">Register</a>
        </div>
    </main>
    <footer class="bg-white shadow py-4 mt-8">
        <div class="container mx-auto text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} PuckLogic. All rights reserved.
        </div>
    </footer>
</body>
</html>
