<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Products</title>
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
    <!-- Admin Sidebar -->
    <aside class="fixed left-0 top-0 w-72 h-screen bg-gradient-to-br from-gray-900 to-gray-800 shadow-2xl z-50 overflow-y-auto">
        <div class="p-8 border-b border-white/10">
            <a href="{{route('admin')}}" class="flex items-center gap-3 text-white hover:translate-x-1 transition-transform duration-300">
                <div class="text-4xl">⚙️</div>
                <span class="font-serif text-2xl font-bold">Admin Panel</span>
            </a>
        </div>

        <nav class="p-5">
            <div class="mb-8">
                <h3 class="text-xs font-bold text-white/50 uppercase tracking-wider px-3 mb-3">Admin</h3>

                <a href="{{route('admin')}}" class="flex items-center gap-3 px-4 py-3 text-white bg-white/15 rounded-xl mb-2 hover:bg-white/20 transition-all duration-300 hover:translate-x-1">
                    <span class="text-xl">📦</span>
                    <span class="font-medium">Manage Products</span>
                </a>
            </div>

            <div class="mb-8">
                <h3 class="text-xs font-bold text-white/50 uppercase tracking-wider px-3 mb-3">Public</h3>

                <a href="{{route('home')}}" class="flex items-center gap-3 px-4 py-3 text-white/80 rounded-xl mb-2 hover:bg-white/10 transition-all duration-300 hover:translate-x-1">
                    <span class="text-xl">🏠</span>
                    <span class="font-medium">Back to Store</span>
                </a>
            </div>
        </nav>

        <div class="absolute bottom-0 left-0 right-0 p-5 bg-black/20 border-t border-white/10">
            <div class="flex items-center gap-3 px-4 py-3 bg-white/10 backdrop-blur-lg rounded-xl">
                <div class="w-10 h-10 bg-gradient-to-br from-terracotta-500 to-terracotta-600 rounded-full flex items-center justify-center text-white font-bold">A</div>
                <div class="flex-1">
                    <div class="text-white font-semibold text-sm">Admin</div>
                    <div class="text-white/60 text-xs">Administrator</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-72 p-10">
        <!-- Header -->
        <section class="mb-8 flex justify-between items-start flex-wrap gap-5">
            <div>
                <h1 class="font-serif text-4xl font-bold text-earth-500 mb-2">Manage Products</h1>
                <p class="text-gray-600">Add, edit, or remove products from your catalog</p>
            </div>
            <button onclick="openAddModal()" class="flex items-center gap-2 px-6 py-3 bg-earth-400 hover:bg-earth-500 text-white rounded-xl font-semibold transition-all hover:-translate-y-0.5 shadow-md hover:shadow-lg">
                <span>➕</span>
                <span>Add Product</span>
            </button>
        </section>

        <!-- Alerts -->
        @if(session('success'))
        <div class="mb-6 flex items-start gap-3 p-4 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-lg alert">
            <span class="text-xl">✅</span>
            <span class="flex-1">{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800 font-bold text-xl">×</button>
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 flex items-start gap-3 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-lg alert">
            <span class="text-xl">❌</span>
            <span class="flex-1">{{ session('error') }}</span>
            <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 font-bold text-xl">×</button>
        </div>
        @endif

        @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-lg alert">
            <div class="flex items-start gap-3">
                <span class="text-xl">❌</span>
                <div class="flex-1">
                    <strong class="font-semibold">Please fix the following errors:</strong>
                    <ul class="mt-2 ml-5 list-disc">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="text-red-600 hover:text-red-800 font-bold text-xl">×</button>
            </div>
        </div>
        @endif

        <!-- Stats Cards -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                <div class="w-14 h-14 bg-earth-50 rounded-xl flex items-center justify-center text-3xl">📦</div>
                <div>
                    <div class="text-3xl font-serif font-bold text-earth-500">{{ $products->count() }}</div>
                    <div class="text-sm text-gray-500 font-medium">Total Products</div>
                </div>
            </div>
            <!-- <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                <div class="w-14 h-14 bg-earth-50 rounded-xl flex items-center justify-center text-3xl">🌿</div>
                <div>
                    <div class="text-3xl font-serif font-bold text-earth-500">{{ $products->where('category', 'plantes')->count() }}</div>
                    <div class="text-sm text-gray-500 font-medium">Plants</div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                <div class="w-14 h-14 bg-earth-50 rounded-xl flex items-center justify-center text-3xl">🌾</div>
                <div>
                    <div class="text-3xl font-serif font-bold text-earth-500">{{ $products->where('category', 'graines')->count() }}</div>
                    <div class="text-sm text-gray-500 font-medium">Grains</div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                <div class="w-14 h-14 bg-earth-50 rounded-xl flex items-center justify-center text-3xl">🔧</div>
                <div>
                    <div class="text-3xl font-serif font-bold text-earth-500">{{ $products->where('category', 'outils')->count() }}</div>
                    <div class="text-sm text-gray-500 font-medium">Tools</div>
                </div>
            </div> -->
        </section>

        <!-- Filters -->
        <section class="mb-8">
            <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-wrap gap-5 items-center">
                <div class="flex-1 min-w-[300px] flex gap-2 bg-earth-50 rounded-xl p-1">
                    <form action="{{route('productSearch', ['user' => 'admin'])}}" method="GET" class="flex-1 min-w-[300px] flex gap-2 bg-earth-50 rounded-xl p-1">
                        <input name="searchValue" type="text" placeholder="Search for a product..." id="searchInput" class="flex-1 px-4 py-3 bg-transparent border-none outline-none text-gray-700">
                        <button type="submit" class="w-12 h-12 bg-earth-400 hover:bg-earth-500 text-white rounded-lg transition-colors">🔍</button>
                    </form>>
                </div>

                <!-- <div class="flex gap-2">
                    <button class="px-5 py-2.5 bg-earth-400 text-white rounded-lg font-medium filter-btn active" data-category="all">All</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="plantes">Plants</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="graines">Grains</button>
                    <button class="px-5 py-2.5 border-2 border-earth-100 text-gray-600 hover:border-earth-300 rounded-lg font-medium filter-btn transition-colors" data-category="outils">Tools</button>
                </div> -->
            </div>
        </section>

        <!-- Products Table -->
        <section class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-earth-50 border-b-2 border-earth-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-earth-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-earth-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-earth-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-earth-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-earth-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-earth-500 uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-earth-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productsTableBody" class="divide-y divide-earth-100">
                        @forelse($products as $product)
                        <tr class="hover:bg-earth-50 transition-colors product-row" data-category="{{ $product->category }}" data-name="{{ strtolower($product->name) }}">
                            <td class="px-6 py-4">
                                <div class="w-16 h-16 rounded-lg overflow-hidden bg-earth-100 flex items-center justify-center">
                                    @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                    @else
                                    <span class="text-2xl">
                                        @if($product->category == 'plantes')
                                        🌿
                                        @elseif($product->category == 'graines')
                                        🌾
                                        @else
                                        🔧
                                        @endif
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-earth-500">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($product->description, 50) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                        @if($product->category == 'plantes') bg-green-100 text-green-800
                                        @elseif($product->category == 'graines') bg-yellow-100 text-yellow-800
                                        @else bg-blue-100 text-blue-800
                                        @endif">
                                    {{ ucfirst($product->category) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold text-earth-400">{{ number_format($product->price, 2) }} DH</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->stock < 10 ? 'bg-red-100 text-red-800' : 'bg-earth-200 text-white' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button onclick='openEditModal(@json($product))' class="w-9 h-9 flex items-center justify-center bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors text-lg" title="Edit">✏️</button>
                                    <a href="{{route('removeProduct', ['id'=>$product->id])}}" onclick="return confirm('Are you sure you want to delete this product?')" class="w-9 h-9 flex items-center justify-center bg-red-50 hover:bg-red-100 rounded-lg transition-colors text-lg" title="Delete">🗑️</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-20 text-center">
                                <div class="text-6xl mb-4 opacity-30">📦</div>
                                <p class="text-gray-500 mb-4">No products available</p>
                                <button onclick="openAddModal()" class="inline-flex items-center gap-2 px-6 py-3 bg-earth-400 hover:bg-earth-500 text-white rounded-xl font-semibold transition-colors">Add Your First Product</button>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Add Product Modal -->
    <div id="addModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-earth-100 px-8 py-6 rounded-t-3xl">
                <div class="flex justify-between items-center">
                    <h2 class="font-serif text-3xl font-bold text-earth-500">Add New Product</h2>
                    <button onclick="closeAddModal()" class="w-10 h-10 flex items-center justify-center bg-earth-50 hover:bg-earth-100 rounded-full transition-colors text-2xl text-gray-600">×</button>
                </div>
            </div>

            <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-earth-500 mb-2">Product Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all" placeholder="e.g., Organic Tomato">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-earth-500 mb-2">Description *</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all resize-none" placeholder="Detailed product description">{{ old('description') }}</textarea>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-semibold text-earth-500 mb-2">Category *</label>
                        <select name="category" required class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all">
                            <option value="">Select a category</option>
                            <option value="plants" {{ old('category') == 'plantes' ? 'selected' : '' }}>Plants</option>
                            <option value="grains" {{ old('category') == 'graines' ? 'selected' : '' }}>Grains</option>
                            <option value="outils" {{ old('category') == 'outils' ? 'selected' : '' }}>Tools</option>
                        </select>
                    </div>

                    <!-- Price and Stock -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-earth-500 mb-2">Price (DH) *</label>
                            <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" required class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all" placeholder="0.00">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-earth-500 mb-2">Stock *</label>
                            <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all" placeholder="0">
                        </div>
                    </div>


                </div>

                <!-- Actions -->
                <div class="flex gap-4 mt-8 pt-6 border-t border-earth-100">
                    <button type="button" onclick="closeAddModal()" class="flex-1 px-6 py-3 border-2 border-earth-100 text-gray-600 rounded-xl font-semibold hover:bg-earth-50 transition-colors">Cancel</button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-earth-400 hover:bg-earth-500 text-white rounded-xl font-semibold transition-colors shadow-lg hover:shadow-xl">Add Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-earth-100 px-8 py-6 rounded-t-3xl">
                <div class="flex justify-between items-center">
                    <h2 class="font-serif text-3xl font-bold text-earth-500">Edit Product</h2>
                    <button onclick="closeEditModal()" class="w-10 h-10 flex items-center justify-center bg-earth-50 hover:bg-earth-100 rounded-full transition-colors text-2xl text-gray-600">×</button>
                </div>
            </div>

            <form id="editForm" action="{{route('editProduct')}}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                <!-- @method('PUT') -->

                <!-- Id -->
                <input name="id" type="hidden" id="product_id">

                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-earth-500 mb-2">Product Name *</label>
                        <input type="text" id="edit_name" name="name" required class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-earth-500 mb-2">Description *</label>
                        <textarea id="edit_description" name="description" rows="4" class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all resize-none"></textarea>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-semibold text-earth-500 mb-2">Category *</label>
                        <select id="edit_category" name="category" required class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all">
                            <option value="">Select a category</option>
                            <option value="plants">Plants</option>
                            <option value="grains">Grains</option>
                            <option value="outils">Tools</option>
                        </select>
                    </div>

                    <!-- Price and Stock -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-earth-500 mb-2">Price (DH) *</label>
                            <input type="number" id="edit_price" name="price" step="0.01" min="0" required class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-earth-500 mb-2">Stock *</label>
                            <input type="number" id="edit_stock" name="stock" min="0" required class="w-full px-4 py-3 border-2 border-earth-100 rounded-xl focus:border-earth-400 focus:ring-4 focus:ring-earth-400/10 outline-none transition-all">
                        </div>
                    </div>


                </div>

                <!-- Actions -->
                <div class="flex gap-4 mt-8 pt-6 border-t border-earth-100">
                    <button type="button" onclick="closeEditModal()" class="flex-1 px-6 py-3 border-2 border-earth-100 text-gray-600 rounded-xl font-semibold hover:bg-earth-50 transition-colors">Cancel</button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-earth-400 hover:bg-earth-500 text-white rounded-xl font-semibold transition-colors shadow-lg hover:shadow-xl">Update Product</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal Functions
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
            document.getElementById('addModal').classList.add('flex');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
            document.getElementById('addModal').classList.remove('flex');
        }

        function openEditModal(product) {
            document.getElementById('product_id').value = product.id;
            document.getElementById('edit_name').value = product.name;
            document.getElementById('edit_description').value = product.description;
            document.getElementById('edit_category').value = product.category;
            document.getElementById('edit_price').value = product.price;
            document.getElementById('edit_stock').value = product.stock;

            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

        // Close modals on outside click
        document.getElementById('addModal').addEventListener('click', function(e) {
            if (e.target === this) closeAddModal();
        });

        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) closeEditModal();
        });

        // Close modals on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddModal();
                closeEditModal();
            }
        });

        // Table filtering
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const rows = document.querySelectorAll('.product-row');

            searchInput.addEventListener('input', () => filterRows());

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'bg-earth-400', 'text-white');
                        b.classList.add('border-2', 'border-earth-100', 'text-gray-600');
                    });
                    btn.classList.add('active', 'bg-earth-400', 'text-white');
                    btn.classList.remove('border-2', 'border-earth-100', 'text-gray-600');
                    filterRows();
                });
            });

            function filterRows() {
                const searchTerm = searchInput.value.toLowerCase();
                const activeCategory = document.querySelector('.filter-btn.active').dataset.category;

                rows.forEach(row => {
                    const rowName = row.dataset.name;
                    const rowCategory = row.dataset.category;

                    const matchesSearch = rowName.includes(searchTerm);
                    const matchesCategory = activeCategory === 'all' || rowCategory === activeCategory;

                    row.style.display = (matchesSearch && matchesCategory) ? '' : 'none';
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