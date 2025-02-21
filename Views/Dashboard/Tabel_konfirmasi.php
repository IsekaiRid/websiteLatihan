<?php
global $modelbarang;
$databarang = $modelbarang->GetBarangAll()?->fetch_all(MYSQLI_ASSOC) ?? [];
$filterdata = array_filter($databarang, function ($d) {
    return $d['Status'] === "belum di konfirmasi";
})
?>


<div class="p-6">
    <!-- <button data-modal-target="#modal-tambah" class="relative px-5 py-2 text-white font-bold bg-blue-600 rounded-lg shadow-lg transition-all duration-300 transform active:translate-y-1 hover:shadow-none">
        <i class="bi bi-plus-circle"></i> Tambah
    </button> -->
    <div class="overflow-x-auto rounded-[10px] mt-3">
    <h1 class=" text-2xl mb-2  font-bold ">Tabel Konfirmasi</h1>
        <table class="min-w-full bg-white border border-gray-300 rounded-[10px] shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-center">No</th>
                    <th class="py-3 px-6 text-center">Nama Barang</th>
                    <th class="py-3 px-6 text-center">Satuan</th>
                    <th class="py-3 px-6 text-center">Stok</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light h-12">
                <?php $i = 1;
                foreach ($filterdata as $d) :
                    switch ($d['Status']) {
                        case "ada di gudang":
                            $color = "text-green-500"; // Hijau
                            break;
                        case "belum di konfirmasi":
                            $color = "text-yellow-500"; // Kuning
                            break;
                        case "tidak di gudang":
                            $color = "text-red-500"; // Merah
                            break;
                        case "barang sudah keluar gudang":
                            $color = "text-orange-300"; // Abu-abu
                            break;
                        default:
                            $color = "text-black";
                    }
                ?>

                    <tr class=" text-sm">
                        <td class="p-2  text-center font-bold "><?= $i++ ?></td>
                        <td class="p-2  text-center font-bold"><?= $d['Nama_barang'] ?></td>
                        <td class="p-2  text-center font-bold"><?= $d['Satuan'] ?></td>
                        <td class="p-2  text-center font-bold"><?= $d['Stok'] ?></td>
                        <td class="p-2 text-center font-bold <?= $color; ?>">
                            <?= $d['Status'] ?>
                        </td>
                        <td class="p-2">
                            <div class="flex justify-center space-x-2">
                                <button data-modal-target="#modal-konfirmasi-<?= $d['id_barang'] ?>" class="flex relative px-5 py-2 text-white font-bold bg-yellow-500 rounded-lg shadow-lg transition-all duration-300 transform active:translate-y-1 hover:shadow-none">
                                    <i class="bi bi-pencil-fill me-1"></i> Konfirmasi
                                </button>
                                <!-- <button onclick="window.location.href='index.php?page=delete_barang&target=<?= $d['id_barang'] ?>'" class=" flex relative px-5 py-2 text-white font-bold bg-red-600 rounded-lg shadow-lg transition-all duration-300 transform active:translate-y-1 hover:shadow-none">
                                    <i class="bi bi-trash  me-1"></i> Delete
                                </button> -->
                            </div>
                        </td>
                    </tr>


                    <!------ Edit Modal -------->
                    <div id="modal-konfirmasi-<?= $d['id_barang'] ?>" class="fixed inset-0 flex items-center justify-center bg-black/25 hidden">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                            <h2 class="text-xl font-semibold mb-4">Tambah Barang</h2>
                            <form action="index.php?page=konfirmasiproses" method="post">
                                <div class="mb-3">
                                    <input type="hidden" name="id" value="<?= $d['id_barang'] ?>">
                                    <div class="mb-3">
                                        <label for="status">Status Barang:</label>
                                        <select id="status" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" name="status">
                                            <option value="">Pilih Status</option>
                                            <option value="ada di gudang">Ada di Gudang</option>
                                            <option value="belum di konfirmasi">Belum di Konfirmasi</option>
                                            <option value="tidak di gudang">Tidak di Gudang</option>
                                            <option value="barang sudah keluar gudang">Barang Sudah Keluar Gudang</option>
                                        </select>
                                    </div>
                                    <div id="tanggalKeluarContainer" class="mb-3 hidden">
                                        <label for="tanggalKeluar">Tanggal Keluar:</label>
                                        <input type="date" id="tanggalKeluar" name="tanggalKeluar"
                                            class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                                    </div>
                                    <div id="tanggalMasukContainer" class="mb-3 hidden">
                                        <label for="tanggalMasuk">Tanggal Masuk:</label>
                                        <input type="date" id="tanggalMasuk" name="tanggalMasuk"
                                            class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                                    </div>
                                    <div class="mt-4 text-right">
                                        <button type="submit" class="closeModal px-4 py-2 bg-blue-500 text-white rounded-lg">
                                            Ubah
                                        </button>
                                        <button type="button" class="closeModal px-4 py-2 bg-red-500 text-white rounded-lg" data-modal-close="#modal-konfirmasi-<?= $d['id_barang'] ?>">
                                            Tutup
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!--------------------- --------------------->


                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $("#status").change(function() {
                if ($(this).val() === "barang sudah keluar gudang") {
                    $("#tanggalMasukContainer").hide();
                    $("#tanggalKeluarContainer").fadeIn();
                } else if ($(this).val() === "ada di gudang") {
                    $("#tanggalKeluarContainer").hide();
                    $("#tanggalMasukContainer").fadeIn();
                } else {
                    $("#tanggalMasukContainer").fadeOut();
                    $("#tanggalKeluarContainer").fadeOut();
                }
            });
        });
    </script>