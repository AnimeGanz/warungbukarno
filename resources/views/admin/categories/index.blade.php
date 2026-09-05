@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-xl font-semibold text-white">Kategori Produk</h3>
            <p class="text-sm text-gray-500">Kelola kategori menu makanan</p>
        </div>
        <button onclick="openModal('createModal')"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition">
            + Tambah Kategori
        </button>
    </div>

    @if (session('error'))
        <div class="mb-4 bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-lg text-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse ($categories as $category)
            <div class="bg-[#161922] border border-white/5 rounded-2xl p-5">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h4 class="text-white font-medium">{{ $category->name }}</h4>
                        <p class="text-xs text-gray-500">{{ $category->slug }}</p>
                    </div>
                    <span class="bg-orange-500/10 text-orange-400 text-xs px-2 py-1 rounded-full">
                        {{ $category->products_count }} produk
                    </span>
                </div>
                <div class="flex gap-4 pt-3 border-t border-white/5">
                    <button onclick="openEditModal({{ $category->id }}, '{{ $category->name }}')"
                            class="text-orange-400 hover:text-orange-300 text-sm">
                        Edit
                    </button>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                          onsubmit="return confirm('Yakin mau hapus kategori {{ $category->name }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-[#161922] border border-white/5 rounded-2xl p-10 text-center text-gray-500">
                Belum ada kategori. Yuk tambah kategori pertama!
            </div>
        @endforelse
    </div>

    {{-- Modal Tambah Kategori --}}
    <div id="createModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 px-4">
        <div class="bg-[#161922] border border-white/10 rounded-2xl p-6 w-full max-w-md">
            <h4 class="text-white font-medium mb-4">Tambah Kategori</h4>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <label class="block text-sm font-medium text-gray-300 mb-1">Nama Kategori</label>
                <input type="text" name="name" placeholder="Contoh: Minuman"
                       class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-400 mb-4">
                <div class="flex gap-3">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">
                        Simpan
                    </button>
                    <button type="button" onclick="closeModal('createModal')"
                            class="border border-white/10 px-5 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-white/5 transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit Kategori --}}
    <div id="editModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 px-4">
        <div class="bg-[#161922] border border-white/10 rounded-2xl p-6 w-full max-w-md">
            <h4 class="text-white font-medium mb-4">Edit Kategori</h4>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <label class="block text-sm font-medium text-gray-300 mb-1">Nama Kategori</label>
                <input type="text" name="name" id="editName"
                       class="w-full bg-white/[0.02] border border-white/10 rounded-lg px-3 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-orange-400 mb-4">
                <div class="flex gap-3">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">
                        Simpan
                    </button>
                    <button type="button" onclick="closeModal('editModal')"
                            class="border border-white/10 px-5 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-white/5 transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function openEditModal(id, name) {
            document.getElementById('editForm').action = `/admin/categories/${id}`;
            document.getElementById('editName').value = name;
            openModal('editModal');
        }
    </script>

@endsection