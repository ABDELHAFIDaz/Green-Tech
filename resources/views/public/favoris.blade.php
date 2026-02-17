<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTech - My Favorites</title>
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
<body class="bg-earth-50 font-sans">
    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 w-72 h-screen bg-gradient-to-br from-earth-500 to-earth-400 shadow-2xl z-50 overflow-y-auto">
        <div class="p-8 border-b border-white/10">
            <a href="/" class="flex items-center gap-3 text-white hover:translate-x-1 transition-transform duration-300">
                <div class="text-4xl animate-bounce">🌱</div>
                <span class="font-serif text-2xl font-bold">GreenTech</span>
            </a>
        </div>

        <nav class="p-5">
            <div class="mb-8">
                <h3 class="text-xs font-bold text-white/50 uppercase tracking-wider px-3 mb-3">Catalog</h3>
                
                <a href="{{route('home')}}" class="flex items-center gap-3 px-4 py-3 text-white/80 rounded-xl mb-2 hover:bg-white/10 transition-all duration-300 hover:translate-x-1">
                    <span class="text-xl">🏠</span>
                    <span class="font-medium">Home</span>
                </a>

                <a href="{{route('category', ['category' => 'plants'])}}" class="flex items-center gap-3 px-4 py-3 text-white/80 rounded-xl mb-2 hover:bg-white/10 transition-all duration-300 hover:translate-x-1">
                    <span class="text-xl">🌿</span>
                    <span class="font-medium">Plants</span>
                </a>

                <a href="{{route('category', ['category' => 'grains'])}}" class="flex items-center gap-3 px-4 py-3 text-white/80 rounded-xl mb-2 hover:bg-white/10 transition-all duration-300 hover:translate-x-1">
                    <span class="text-xl">🌾</span>
                    <span class="font-medium">Grains</span>
                </a>

                <a href="{{route('category', ['category' => 'outils'])}}" class="flex items-center gap-3 px-4 py-3 text-white/80 rounded-xl mb-2 hover:bg-white/10 transition-all duration-300 hover:translate-x-1">
                    <span class="text-xl">🔧</span>
                    <span class="font-medium">Outils</span>
                </a>

                <a href="{{ route('favoris') }}" class="flex items-center gap-3 px-4 py-3 text-white bg-white/15 rounded-xl mb-2 hover:bg-white/20 transition-all duration-300 hover:translate-x-1">
                    <span class="text-xl">❤️</span>
                    <span class="font-medium">Favoris</span>
                </a>
            </div>
        </nav>

        <div class="absolute bottom-0 left-0 right-0 p-5 bg-black/20 border-t border-white/10">
            <a href="{{ route('logout') }}" class="flex items-center gap-3 px-4 py-3 bg-terracotta-500/20 hover:bg-terracotta-500/30 backdrop-blur-lg rounded-xl text-white transition-all duration-300">
                <span class="text-lg">🚪</span>
                <span class="font-medium text-sm">Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-72 p-10">
        <!-- Header -->
        <section class="mb-12">
            <div class="flex justify-between items-start flex-wrap gap-5">
                <div>
                    <h1 class="font-serif text-5xl font-bold text-earth-500 mb-3">My Favorites</h1>
                    <p class="text-lg text-gray-600">Products you've saved for later</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-white px-6 py-3 rounded-2xl shadow-sm">
                        <span class="text-sm text-gray-500">Total Items:</span>
                        <span class="ml-2 text-2xl font-serif font-bold text-earth-500">{{ $favorites->count() }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Success Messages -->
        @if(session('success'))
            <div class="mb-8 flex items-start gap-3 p-4 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-lg alert">
                <span class="text-xl">✅</span>
                <span class="flex-1">{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800 font-bold text-xl">×</button>
            </div>
        @endif

        <!-- Filters -->
        <!-- <section class="mb-8">
            <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-wrap gap-5 items-center">
                <div class="flex-1 min-w-[300px] flex gap-2 bg-earth-50 rounded-xl p-1">
                    <input type="text" placeholder="Search favorites..." id="searchInput" class="flex-1 px-4 py-3 bg-transparent border-none outline-none text-gray-700">
                    <button class="w-12 h-12 bg-earth-400 hover:bg-earth-500 text-white rounded-lg transition-colors">🔍</button>
                </div>
                
                <div class="flex gap-2">
                    <button class="px-5 py-2.5 bg-earth-400 text-white rounded-lg font-medium filter-btn active" data-category="all">All</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="plantes">Plants</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="graines">Grains</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="outils">Tools</button>
                </div>
            </div>
        </section> -->

        <!-- Favorites Grid -->
        <section class="mb-20">
            @if($favorites->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="favoritesGrid">
                    @foreach($favorites as $favorite)
                        <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col overflow-hidden favorite-card hover:-translate-y-2" data-category="{{ $favorite->category }}" data-name="{{ strtolower($favorite->name) }}">
                            <div class="relative h-60 bg-gradient-to-br from-earth-100 to-earth-200 overflow-hidden">
                                @if($favorite->image)
                                    <img src="{{ asset('storage/' . $favorite->image) }}" alt="{{ $favorite->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-7xl opacity-50">
                                        @if($favorite->category == 'plantes')
                                            🌿
                                        @elseif($favorite->category == 'graines')
                                            🌾
                                        @else
                                            🔧
                                        @endif
                                    </div>
                                @endif
                                <div class="absolute top-3 left-3 px-4 py-1.5 bg-white rounded-full text-xs font-semibold text-earth-500 uppercase shadow-md">{{ ucfirst($favorite->category) }}</div>
                                @if($favorite->stock < 10)
                                    <div class="absolute top-3 right-3 px-4 py-1.5 bg-terracotta-500 text-white rounded-full text-xs font-semibold shadow-md">Low Stock</div>
                                @endif
                                
                                <!-- Remove from Favorites -->
                                <button class="absolute bottom-3 right-3 w-12 h-12 bg-white/90 hover:bg-terracotta-500 text-terracotta-500 hover:text-white rounded-full shadow-lg transition-all duration-300 flex items-center justify-center text-xl">
                                    ❌
                                </button>
                            </div>
                            
                            <div class="p-6 flex-1 flex flex-direction-column">
                                <h3 class="font-serif text-2xl font-semibold text-earth-500 mb-2">{{ $favorite->name }}</h3>
                                <!-- <p class="text-gray-600 text-sm mb-4 flex-1">{{ Str::limit($favorite->description, 80) }}</p> -->
                                
                                <div class="flex justify-between items-center mb-4 pt-4 border-t border-earth-100">
                                    <div class="flex items-baseline gap-1">
                                        <span class="text-3xl font-serif font-bold text-earth-500">{{ number_format($favorite->price, 2) }}</span>
                                        <span class="text-sm text-gray-500 font-semibold">DH</span>
                                    </div>
                                    
                                    <!-- <button class="px-6 py-3 bg-earth-400 hover:bg-earth-500 text-white rounded-xl font-semibold transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                                        <span>🛒</span>
                                        <span>Add to Cart</span>
                                    </button> -->
                                </div>

                                <div class="space-y-2">
                                    <div class="w-full h-1.5 bg-earth-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-earth-400 to-earth-300 rounded-full transition-all duration-500" style="width: {{ min(($favorite->stock / 100) * 100, 100) }}%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500 font-medium">{{ $favorite->stock }} in stock</span>
                                </div>

                                <div class="mt-3 text-xs text-gray-400">
                                    Added {{ $favorite->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20 bg-white rounded-2xl shadow-sm">
                    <div class="text-8xl mb-6 opacity-30">❤️</div>
                    <h3 class="text-3xl font-serif font-semibold text-earth-500 mb-3">No Favorites Yet</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">Start adding products to your favorites by clicking the heart icon on any product</p>
                    <a href="/" class="inline-flex items-center gap-2 px-8 py-4 bg-earth-400 hover:bg-earth-500 text-white rounded-xl font-semibold transition-all shadow-lg hover:shadow-xl">
                        <span>🛍️</span>
                        <span>Browse Products</span>
                    </a>
                </div>
            @endif
        </section>
    </main>

    <script>
        // Remove from favorites
        function removeFavorite(favoriteId) {
            if (confirm('Remove this product from your favorites?')) {
                window.location.href = `/favorites/remove/${favoriteId}`;
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.favorite-card');
            const searchInput = document.getElementById('searchInput');
            const filterBtns = document.querySelectorAll('.filter-btn');
            
            // Intersection Observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = `all 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });

            // Search
            searchInput.addEventListener('input', () => filterCards());

            // Filter
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'bg-earth-400', 'text-white');
                        b.classList.add('border-2', 'border-earth-100', 'text-gray-600');
                    });
                    btn.classList.add('active', 'bg-earth-400', 'text-white');
                    btn.classList.remove('border-2', 'border-earth-100', 'text-gray-600');
                    filterCards();
                });
            });

            function filterCards() {
                const searchTerm = searchInput.value.toLowerCase();
                const activeCategory = document.querySelector('.filter-btn.active').dataset.category;
                
                cards.forEach(card => {
                    const cardName = card.dataset.name;
                    const cardCategory = card.dataset.category;
                    
                    const matchesSearch = cardName.includes(searchTerm);
                    const matchesCategory = activeCategory === 'all' || cardCategory === activeCategory;
                    
                    card.style.display = (matchesSearch && matchesCategory) ? 'flex' : 'none';
                });
            }

            // Auto-hide alerts
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 300ms';
                    setTimeout(() => alert.remove(), 300);
                }, 5000);
            });
        });
    </script>
</body>
</html>