<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

<!-- SIDEBAR (SAMA DENGAN INDEX) -->
<div class="w-64 bg-gray-900 text-white p-5">
    <h2 class="text-xl font-bold mb-6">📁 Task Manager</h2>
    <ul class="space-y-4">
        <li>
            <a href="/tasks" class="flex items-center gap-2 hover:text-gray-300">
                📄 Daftar Task
            </a>
        </li>
        <li>
            <a href="/tasks/create" class="flex items-center gap-2 text-yellow-400">
                ➕ Tambah Task
            </a>
        </li>
        <li>
            <a href="/logout" class="flex items-center gap-2 text-red-400">
                🚪 Logout
            </a>
        </li>
    </ul>
</div>

<!-- CONTENT -->
<div class="flex-1 p-10">
    <h1 class="text-2xl font-bold mb-6">➕ Tambah Task</h1>

    <form method="POST" action="/tasks" class="bg-white p-6 rounded shadow max-w-md">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul Task</label>
            <input
                type="text"
                name="title"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        <div class="mb-6">
            <label class="block mb-1 font-semibold">Deadline</label>
            <input
                type="datetime-local"
                name="deadline"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Task
        </button>

        <a href="/tasks" class="ml-3 text-gray-600 hover:underline">
            Batal
        </a>
    </form>
</div>

</body>
</html>
