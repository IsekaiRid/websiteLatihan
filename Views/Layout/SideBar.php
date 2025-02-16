<div id="sidebar"
    class="fixed top-0 bottom-0 left-0 p-2 w-[200px] lg:w-[250px] overflow-y-auto text-center bg-gray-900 transition-transform duration-300 -translate-x-full z-10">

    <div class="text-gray-100 text-lg">
        <div class="p-2.5 mt-1 flex items-center">
            <i class="bi bi-app-indicator px-2 py-1 rounded-md bg-blue-600 text-sm"></i>
            <h1 class="font-bold text-gray-200 text-[14px] ml-3">DashBoard</h1>
        </div>
        <div class="my-2 h-[1px] bg-gray-600"></div>
    </div>
    <a href="index.php?page=welcome" class="block">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-3 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-house-door-fill text-sm"></i>
            <span class="text-[14px] ml-3 text-gray-200 font-semibold">Home</span>
        </div>
    </a>

    <a href="index.php?page=logistik" class="block">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-3 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-seam text-sm"></i>
            <span class="text-[14px] ml-3 text-gray-200 font-semibold">Barang Logistik</span>
        </div>
    </a>

    <a href="index.php?page=gudang" class="block">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-3 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-boxes"></i>
            <span class="text-[14px] ml-3 text-gray-200 font-semibold">gudang</span>
        </div>
    </a>

    <div class="p-2.5 mt-3 flex items-center rounded-md px-3 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <i class="bi bi-box-arrow-in-right text-sm"></i>
        <span class="text-[14px] ml-3 text-gray-200 font-semibold">Logout</span>
    </div>
</div>

<!-- Toggle Button -->
<button id="toggleBtn"
    class="fixed bottom-5 right-5 bg-blue-600 text-white p-3 rounded-full w-13 h-13 shadow-lg transition-all duration-300 z-10 cursor-pointer">
    ☰
</button>

<!-- JavaScript -->
<script>
    document.getElementById("toggleBtn").addEventListener("click", function() {
        document.getElementById("sidebar").classList.toggle("-translate-x-full");
    });
</script>