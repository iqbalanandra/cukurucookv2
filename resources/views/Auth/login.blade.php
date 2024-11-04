<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">Cukurucook</h2>
        <p class="text-center text-gray-500 mb-6">Silahkan Login</p>

        <!-- Error Message -->
        @if($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" name="username" id="username" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>
            <div class="flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-gray-500">
                    <span class="ml-2 text-gray-600">Remember Me</span>
                </label>
            </div>
            <button type="submit" class="w-full bg-orange-400 text-white py-2 rounded hover:bg-orange-600 transition duration-200">
                Login
            </button>
        </form>

        <div class="text-center mt-4">
            <span class="text-gray-600">Tidak punya akun?</span>
            <a href="{{ route('register') }}" class="text-gray-800 hover:underline">Daftar disini!</a>
        </div>
    </div>
</body>
</html>
