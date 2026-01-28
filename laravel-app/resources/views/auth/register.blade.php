<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow w-full max-w-sm">
    <h1 class="text-2xl font-bold mb-6 text-center">📝 Register</h1>

    <form method="POST" action="/register">
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

        <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
            Register
        </button>
    </form>

    <p class="text-center text-sm mt-4">
        Sudah punya akun?
        <a href="/login" class="text-blue-600 hover:underline">Login</a>
    </p>
</div>

</body>
</html>
