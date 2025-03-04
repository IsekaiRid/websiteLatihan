<div class="h-screen flex items-center justify-center relative overflow-hidden bg-[url('https://i.pinimg.com/736x/be/d7/c0/bed7c0b0040faf7a87eb360aa5078855.jpg')] bg-cover bg-center bg-no-repeat">
    <div id="alert-respon" class="absolute"></div>
    <div class="relative bg-white/10 backdrop-blur-md shadow-lg p-8 rounded-xl w-96 border border-white/20">
        <div class="flex justify-center mb-4">
            <img src="https://cdn-icons-png.flaticon.com/256/18251/18251709.png" alt="Gudang Logo" class="w-16 h-16">
        </div>

        <h2 class="text-white text-2xl font-semibold text-center">Login Gudang</h2>
        <p class="text-gray-300 text-center text-sm mb-6">Masukkan email dan password Anda</p>

        <form action="Auth.php?page=proseslogin" method="post">
            <div class="mb-4">
                <label class="block text-gray-200 text-sm mb-1">Email</label>
                <input type="email" name="email" placeholder="admin@gudang.com" class="w-full px-4 py-2 bg-white/20 text-white border border-gray-300/20 rounded-lg outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div class="mb-4">
                <label class="block text-gray-200 text-sm mb-1">Password</label>
                <input type="password" name="password" placeholder="••••••••" class="w-full px-4 py-2 bg-white/20 text-white border border-gray-300/20 rounded-lg outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg font-semibold transition">
                Login
            </button>
        </form>

        <p class="text-gray-300 text-sm text-center mt-4">Belum punya akun?
            <a href="Auth.php?page=register" class="text-green-400 hover:underline">Daftar</a>
        </p>
    </div>
</div>

