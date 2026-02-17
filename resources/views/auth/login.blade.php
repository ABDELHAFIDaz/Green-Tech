<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTech - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'serif': ['Crimson Pro', 'serif'],
                        'sans': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        earth: {
                            50: '#f4f1e8',
                            100: '#e8dcc4',
                            200: '#a8b89f',
                            300: '#7a9b6f',
                            400: '#4a6741',
                            500: '#2c3e2f',
                        },
                        terracotta: {
                            500: '#c85a3f',
                            600: '#8b5a3c',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-earth-50 via-white to-earth-100 min-h-screen font-sans flex items-center justify-center p-4">
    <!-- Decorative Elements -->
    <div class="fixed top-0 right-0 w-96 h-96 bg-earth-200/20 rounded-full blur-3xl -z-10"></div>
    <div class="fixed bottom-0 left-0 w-96 h-96 bg-terracotta-500/10 rounded-full blur-3xl -z-10"></div>

    <!-- Login Container -->
    <div class="w-full max-w-md">
        <!-- Logo/Brand -->
        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center gap-3 text-earth-500 hover:text-earth-400 transition-colors">
                <div class="text-5xl animate-bounce">🌱</div>
                <span class="font-serif text-4xl font-bold">GreenTech</span>
            </a>
            <p class="text-gray-600 mt-2">Welcome back to sustainable agriculture</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-3xl shadow-2xl p-8 backdrop-blur-lg border border-earth-100">
            <h2 class="font-serif text-3xl font-bold text-earth-500 mb-2">Login</h2>
            <p class="text-gray-600 mb-8">Enter your credentials to access your account</p>

            <!-- Error Messages -->
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-lg">
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-lg">
                    <ul class="text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-earth-500 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required 
                        class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all"
                        placeholder="you@example.com"
                    >
                    <!-- @error('email')
                        <span>{{ $message }}</span>
                    @enderror -->
                </div>

                <!-- Password -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-semibold text-earth-500">Password</label>
                    </div>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all"
                        placeholder="••••••••"
                    >
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full px-6 py-4 bg-earth-400 hover:bg-earth-500 text-white rounded-xl font-semibold transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5"
                >
                    Login to Account
                </button>
            </form>

            <!-- Sign Up Link -->
            <p class="mt-8 text-center text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('signup') }}" class="text-earth-400 hover:text-earth-500 font-semibold">Sign up for free</a>
            </p>
        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-gray-500 mt-8">
            © 2024 GreenTech. All rights reserved.
        </p>
    </div>
</body>
</html>