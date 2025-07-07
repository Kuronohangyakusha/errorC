<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'alchimiste du code - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-green': '#0a0f0a',
                        'green-accent': '#22c55e',
                        'dark-gray': '#1a1a1a',
                        'light-gray': '#2a2a2a',
                        'accent-green': '#16a34a'
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slideIn': 'slideIn 0.5s ease-out'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        glow: {
                            'from': { boxShadow: '0 0 5px #22c55e' },
                            'to': { boxShadow: '0 0 20px #22c55e, 0 0 30px #22c55e' }
                        },
                        slideIn: {
                            'from': { opacity: '0', transform: 'translateY(20px)' },
                            'to': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-dark-green text-white min-h-screen relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-40 h-40 border-2 border-green-accent rounded-full animate-float"></div>
        <div class="absolute top-32 right-20 w-32 h-32 border border-green-accent rounded-full animate-float" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-40 left-32 w-24 h-24 border border-green-accent rounded-full animate-float" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-20 right-32 w-36 h-36 border-2 border-green-accent rounded-full animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/4 w-20 h-20 border border-green-accent rounded-full animate-float" style="animation-delay: -1s;"></div>
        <div class="absolute top-1/3 right-1/3 w-28 h-28 border border-green-accent rounded-full animate-float" style="animation-delay: -5s;"></div>
    </div>

    <!-- Main Container -->
    <div class="flex items-center justify-center min-h-screen p-6">
        <div class="w-full max-w-lg animate-slideIn">
            <!-- Header Section -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-accent to-accent-green rounded-2xl mb-6 animate-glow">
                    <span class="text-3xl font-bold text-black">⚗</span>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent mb-3">
                    L'alchimiste du code
                </h1>
                <p class="text-gray-400 text-lg">
                    Accédez à votre espace professionnel
                </p>
            </div>

            <!-- Login Card -->
            <div class="bg-gradient-to-br from-light-gray to-dark-gray rounded-3xl p-8 shadow-2xl border border-gray-700/50 backdrop-blur-sm">
                <?php if (isset($errors) && !empty($errors)): ?>
                    <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-xl text-sm mb-4">
                        <?php foreach ($errors as $error): ?>
                            <p><?= htmlspecialchars($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <form class="space-y-6" method="post" action="">
                    <!-- Login Field -->
                    <div class="space-y-2">
                        <label for="login" class="block text-sm font-semibold text-gray-300 tracking-wide">
                            Login
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                id="login" 
                                name="login" 
                                required
                                autocomplete="username"
                                value="<?= htmlspecialchars($_POST['login'] ?? '') ?>"
                                class="w-full bg-dark-gray/80 border-2 border-gray-600 rounded-xl pl-4 pr-4 py-4 text-white placeholder-gray-400 focus:outline-none focus:border-green-accent focus:ring-2 focus:ring-green-accent/20 transition-all duration-300 hover:border-gray-500"
                                placeholder="Votre login"
                            >
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-gray-300 tracking-wide">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required
                                autocomplete="current-password"
                                class="w-full bg-dark-gray/80 border-2 border-gray-600 rounded-xl pl-4 pr-4 py-4 text-white placeholder-gray-400 focus:outline-none focus:border-green-accent focus:ring-2 focus:ring-green-accent/20 transition-all duration-300 hover:border-gray-500"
                                placeholder="••••••••••••"
                            >
                        </div>
                    </div>

                    <!-- Options Row -->
                    <div class="flex items-center justify-between pt-2">
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                id="remember" 
                                name="remember"
                                class="w-4 h-4 text-green-accent bg-dark-gray border-2 border-gray-600 rounded focus:ring-green-accent focus:ring-2 focus:ring-offset-0"
                            >
                            <label for="remember" class="ml-3 text-sm text-gray-300 font-medium">
                                Se souvenir de moi
                            </label>
                        </div>
                        <a href="#" class="text-sm text-green-accent hover:text-green-400 font-semibold transition-colors">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-green-accent to-accent-green text-black py-4 rounded-xl font-bold text-lg hover:from-accent-green hover:to-green-600 focus:outline-none focus:ring-4 focus:ring-green-accent/30 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-green-accent/25"
                    >
                        Se connecter
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-600"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-gradient-to-r from-light-gray to-dark-gray text-gray-400 font-medium">
                            ou continuer avec
                        </span>
                    </div>
                </div>

                <!-- Social Login -->
                <div class="grid grid-cols-2 gap-4">
                    <button 
                        type="button" 
                        class="flex items-center justify-center px-4 py-3 bg-dark-gray/80 border-2 border-gray-600 rounded-xl text-white font-semibold hover:bg-gray-700 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-300 transform hover:scale-105"
                    >
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Google
                    </button>
                    <button 
                        type="button" 
                        class="flex items-center justify-center px-4 py-3 bg-dark-gray/80 border-2 border-gray-600 rounded-xl text-white font-semibold hover:bg-gray-700 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-300 transform hover:scale-105"
                    >
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.74.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.125-2.6 7.44-6.218 7.44-1.214 0-2.357-.629-2.759-1.378l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.624 0 11.99-5.367 11.99-11.99C24.007 5.367 18.641.001 12.017.001z"/>
                        </svg>
                        Microsoft
                    </button>
                </div>
            </div>

            <!-- Footer Links -->
            <div class="text-center mt-8 space-y-4">
                <p class="text-gray-400">
                    Nouveau sur notre plateforme ? 
                    <a href="#" class="text-green-accent hover:text-green-400 font-semibold transition-colors ml-1">
                        Créer un compte
                    </a>
                </p>
                <div class="flex justify-center space-x-6 text-sm text-gray-500">
                    <a href="#" class="hover:text-gray-400 transition-colors">Conditions d'utilisation</a>
                    <a href="#" class="hover:text-gray-400 transition-colors">Politique de confidentialité</a>
                    <a href="#" class="hover:text-gray-400 transition-colors">Support</a>
                </div>
                <p class="text-gray-500 text-sm">
                    &copy; 2024 L'alchimiste du code. Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</body>
</html>