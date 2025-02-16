<div class="h-screen flex items-center justify-center relative overflow-hidden bg-[url('https://i.pinimg.com/736x/be/d7/c0/bed7c0b0040faf7a87eb360aa5078855.jpg')] bg-cover bg-center bg-no-repeat">
    <div id="alert-respon" class="absolute"></div>
    <div class="relative bg-white/10 backdrop-blur-md shadow-lg p-8 rounded-xl w-96 border border-white/20">
        <div class="flex justify-center mb-4">
            <img src="https://cdn-icons-png.flaticon.com/256/18251/18251709.png" alt="Gudang Logo" class="w-16 h-16">
        </div>

        <h2 class="text-white text-2xl font-semibold text-center">Register Gudang</h2>
        <p class="text-gray-300 text-center text-sm mb-6">Silakan isi data untuk mendaftar</p>

        <form action="Auth.php?page=regisproses" method="post">
            <div class="mb-4">
                <label class="block text-gray-200 text-sm mb-1">Nama</label>
                <input type="text" placeholder="John Doe" name="username" class="w-full px-4 py-2 bg-white/20 text-white border border-gray-300/20 rounded-lg outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div class="mb-4">
                <label class="block text-gray-200 text-sm mb-1">Email</label>
                <input type="email" placeholder="admin@gudang.com" name="email" class="w-full px-4 py-2 bg-white/20 text-white border border-gray-300/20 rounded-lg outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div class="mb-4">
                <label class="block text-gray-200 text-sm mb-1">Password</label>
                <input type="password" placeholder="••••••••" name="password" class="w-full px-4 py-2 bg-white/20 text-white border border-gray-300/20 rounded-lg outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg font-semibold transition">
                Register
            </button>
        </form>

        <p class="text-gray-300 text-sm text-center mt-4">Sudah punya akun?
            <a href="Auth.php?page=login" class="text-green-400 hover:underline">Login</a>
        </p>
    </div>
</div>

<?php
session_start();
if (isset($_SESSION['Status_Alert']) && isset($_SESSION['Type_Alert'])) {
    $alertColor = $_SESSION['Type_Alert'] === 'error' ? 'bg-red-500' : 'bg-green-500';

    echo "<script>
    document.addEventListener('DOMContentLoaded', function () {
        let alertBox = document.createElement('div');
        alertBox.className = 'animate-fade-in $alertColor fixed top-5 right-5 text-white px-4 py-2 rounded-lg shadow-md flex items-center gap-2 transition-opacity duration-500';
        alertBox.innerHTML = `
            <span>{$_SESSION['Status_Alert']}</span>
            <button onclick=\"this.parentElement.style.display='none'\" class=\"text-white font-bold\">&times;</button>
        `;
        document.getElementById('alert-respon').appendChild(alertBox);
        setTimeout(() => {
            alertBox.classList.add('quit-animation');
            setTimeout(() => alertBox.remove(), 500);
        }, 3000);
    });</script>";

    unset($_SESSION['Status_Alert']);
    unset($_SESSION['Type_Alert']);
}
?>