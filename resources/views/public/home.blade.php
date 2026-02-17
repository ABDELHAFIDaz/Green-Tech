<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTech - All Products</title>
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

                <a href="{{route('home')}}" class="flex items-center gap-3 px-4 py-3 text-white bg-white/15 rounded-xl mb-2 hover:bg-white/20 transition-all duration-300 hover:translate-x-1">
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

                <a href="{{ route('favoris') }}" class="flex items-center gap-3 px-4 py-3 text-white/80 rounded-xl mb-2 hover:bg-white/10 transition-all duration-300 hover:translate-x-1">
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
        <!-- Hero Section -->
        <!-- <section class="mb-16 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h1 class="font-serif">
                    <span class="block text-6xl font-bold text-earth-500 mb-2">Agricultural Products</span>
                    <span class="block text-3xl text-earth-300">Organic & Sustainable</span>
                </h1>
                <p class="text-lg text-gray-600 leading-relaxed max-w-lg">
                    Discover our selection of plants, grains, and tools for environmentally friendly agriculture
                </p>
                <div class="grid grid-cols-3 gap-6 max-w-lg">
                    <div class="text-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-3xl font-serif font-bold text-earth-400">{{ $products->count() }}+</div>
                        <div class="text-sm text-gray-500 font-medium">Products</div>
                    </div>
                    <div class="text-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-3xl font-serif font-bold text-earth-400">100%</div>
                        <div class="text-sm text-gray-500 font-medium">Organic</div>
                    </div>
                    <div class="text-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-3xl font-serif font-bold text-earth-400">24h</div>
                        <div class="text-sm text-gray-500 font-medium">Delivery</div>
                    </div>
                </div>
            </div>
            <div class="relative h-96 hidden lg:block">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-gradient-to-br from-earth-300 to-earth-200 rounded-full opacity-20 animate-pulse"></div>
            </div>
        </section> -->

        <!-- Filters -->
        <section class="mb-10">
            <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-wrap gap-5 items-center">
                <div class="flex-1 min-w-[300px] flex gap-2 bg-earth-50 rounded-xl p-1">
                    <form action="{{route('productSearch', ['user' => 'clien'])}}" method="GET" class="flex-1 min-w-[300px] flex gap-2 bg-earth-50 rounded-xl p-1">
                        <input name="searchValue" type="text" placeholder="Search for a product..." id="searchInput" class="flex-1 px-4 py-3 bg-transparent border-none outline-none text-gray-700">
                        <button type="submit" class="w-12 h-12 bg-earth-400 hover:bg-earth-500 text-white rounded-lg transition-colors">🔍</button>
                    </form>
                </div>

                <!-- <div class="flex gap-2">
                    <button class="px-5 py-2.5 bg-earth-400 text-white rounded-lg font-medium filter-btn active" data-category="all">All</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="plantes">Plants</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="graines">Grains</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="outils">Tools</button>
                </div>

                <select id="sortSelect" class="px-4 py-2.5 border-2 border-earth-100 rounded-lg font-medium text-gray-700 focus:border-earth-400 outline-none">
                    <option value="name-asc">Name: A-Z</option>
                    <option value="name-desc">Name: Z-A</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                    <option value="stock-desc">Stock: Highest</option>
                </select> -->
            </div>
        </section>

        <!-- Products Grid -->
        <section class="mb-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="productsGrid">
                @forelse($products as $product)
                <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col overflow-hidden product-card hover:-translate-y-2" data-category="{{ $product->category }}" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}">
                    <div class="relative h-60 bg-gradient-to-br from-earth-100 to-earth-200 overflow-hidden">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-7xl opacity-50">
                            @if($product->category == 'plantes')
                            🌿
                            @elseif($product->category == 'graines')
                            🌾
                            @else
                            🔧
                            @endif
                        </div>
                        @endif
                        <div class="absolute top-3 left-3 px-4 py-1.5 bg-white rounded-full text-xs font-semibold text-earth-500 uppercase shadow-md">{{ ucfirst($product->category) }}</div>
                        @if($product->stock < 10)
                            <div class="absolute top-3 right-3 px-4 py-1.5 bg-terracotta-500 text-white rounded-full text-xs font-semibold shadow-md">Low Stock
                    </div>
                    @endif
            </div>

            <div class="p-6 flex-1 flex flex-direction-column">
                <h3 class="font-serif text-2xl font-semibold text-earth-500 mb-2">{{ $product->name }}</h3>
                <!-- <p class="text-gray-600 text-sm mb-4 flex-1">{{ Str::limit($product->description, 80) }}</p> -->

                <div class="flex justify-between items-center mb-4 pt-4 border-t border-earth-100">
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-serif font-bold text-earth-500">{{ number_format($product->price, 2) }}</span>
                        <span class="text-sm text-gray-500 font-semibold">DH</span>
                    </div>

                    <div class="flex gap-2">
                        <button class="w-10 h-10 flex items-center justify-center bg-earth-50 hover:bg-terracotta-500 hover:text-white rounded-lg transition-colors text-lg">❤️</button>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="w-full h-1.5 bg-earth-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-earth-400 to-earth-300 rounded-full transition-all duration-500" style="width: {{ min(($product->stock / 100) * 100, 100) }}%"></div>
                    </div>
                    <span class="text-xs text-gray-500 font-medium">{{ $product->stock }} in stock</span>
                </div>
            </div>
            </article>
            @empty
            <div class="col-span-full text-center py-20">
                <div class="text-8xl mb-4 opacity-30">📦</div>
                <h3 class="text-2xl font-serif font-semibold text-earth-500 mb-2">No products available</h3>
                <p class="text-gray-500">Check back soon for new products</p>
            </div>
            @endforelse
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.product-card');
            const searchInput = document.getElementById('searchInput');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const sortSelect = document.getElementById('sortSelect');

            // Intersection Observer for scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = `all 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });

            // Search
            searchInput.addEventListener('input', () => filterProducts());

            // Filter
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'bg-earth-400', 'text-white');
                        b.classList.add('border-2', 'border-earth-100', 'text-gray-600');
                    });
                    btn.classList.add('active', 'bg-earth-400', 'text-white');
                    btn.classList.remove('border-2', 'border-earth-100', 'text-gray-600');
                    filterProducts();
                });
            });

            // Sort
            sortSelect.addEventListener('change', () => sortProducts());

            function filterProducts() {
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

            function sortProducts() {
                const sortValue = sortSelect.value;
                const grid = document.getElementById('productsGrid');
                const cardsArray = Array.from(cards);

                cardsArray.sort((a, b) => {
                    switch (sortValue) {
                        case 'name-asc':
                            return a.dataset.name.localeCompare(b.dataset.name);
                        case 'name-desc':
                            return b.dataset.name.localeCompare(a.dataset.name);
                        case 'price-asc':
                            return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                        case 'price-desc':
                            return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                        case 'stock-desc':
                            return parseInt(b.dataset.stock) - parseInt(a.dataset.stock);
                        default:
                            return 0;
                    }
                });

                cardsArray.forEach(card => grid.appendChild(card));
            }
        });
    </script>
</body>

</html>