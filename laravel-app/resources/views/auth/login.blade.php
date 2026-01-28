<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow w-full max-w-sm">
    <h1 class="text-2xl font-bold mb-6 text-center">🔐 Login</h1>

    <form method="POST" action="/login">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div class="mb-6">
            <label class="block mb-1">Password</label>
            <input type="password" name="password"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Login
        </button>
    </form>

    <p class="text-center text-sm mt-4">
        Belum punya akun?
        <a href="/register" class="text-green-600 hover:underline">
            Register
        </a>
    </p>
</div>

</body>
</html>
