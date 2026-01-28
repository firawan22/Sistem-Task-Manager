<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col">
        <div class="px-6 py-4 text-2xl font-bold border-b border-slate-700">
            📂 Task Manager
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="/tasks" class="block px-4 py-2 rounded hover:bg-slate-700">
                📋 Daftar Task
            </a>
            <a href="/tasks/create" class="block px-4 py-2 rounded hover:bg-slate-700">
                ➕ Tambah Task
            </a>
        </nav>

        <div class="px-4 py-3 text-sm text-slate-400 border-t border-slate-700">
            UAS Backend
        </div>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</div>

</body>
</html>
