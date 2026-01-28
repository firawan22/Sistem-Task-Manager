<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

<!-- SIDEBAR -->
<div class="w-64 bg-gray-900 text-white p-5">
    <h2 class="text-xl font-bold mb-6">📁 Task Manager</h2>
    <ul class="space-y-4">
        <li>
            <a href="/tasks" class="flex items-center gap-2 text-yellow-400">
                📄 Daftar Task
            </a>
        </li>
        <li>
            <a href="/tasks/create" class="flex items-center gap-2 hover:text-gray-300">
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
    <h1 class="text-2xl font-bold mb-6">📋 Daftar Task</h1>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">Judul</th>
                    <th class="p-3 text-left">Deadline</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                @php
                    $deadline = isset($task['deadline'])
                        ? \Carbon\Carbon::parse($task['deadline'])
                        : null;

                    $now = \Carbon\Carbon::now();

                    if ($deadline) {
                        if ($deadline->isPast()) {
                            $label = '🔴 Terlambat';
                            $class = 'bg-red-100 text-red-700';
                        } elseif ($deadline->diffInHours($now) <= 24) {
                            $label = '⏰ Hampir Deadline';
                            $class = 'bg-yellow-100 text-yellow-700';
                        } else {
                            $label = '✅ Aman';
                            $class = 'bg-green-100 text-green-700';
                        }
                    } else {
                        $label = '-';
                        $class = '';
                    }
                @endphp

                <tr class="border-t">
                    <td class="p-3">{{ $task['title'] }}</td>

                    <td class="p-3">
                        {{ $deadline ? $deadline->translatedFormat('d F Y, H:i') : '-' }}
                    </td>

                    <td class="p-3">
                        <span class="px-3 py-1 rounded text-sm font-semibold {{ $class }}">
                            {{ $label }}
                        </span>
                    </td>

                    <td class="p-3">
                        <form method="POST" action="/tasks/{{ $task['id'] }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
