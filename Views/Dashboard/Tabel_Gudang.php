<?php
global $modelbarang;
$databarang = $modelbarang->GetBarangAll()?->fetch_all(MYSQLI_ASSOC) ?? [];
?>


<div class="p-6">
    <button data-modal-target="#modal-tambah" class="relative px-5 py-2 text-white font-bold bg-blue-600 rounded-lg shadow-lg transition-all duration-300 transform active:translate-y-1 hover:shadow-none">
        <i class="bi bi-plus-circle"></i> Tambah
    </button>
    <h1 class=" text-2xl mb-2  font-bold ">Tabel Gudang</h1>
    <div class="overflow-x-auto rounded-[10px] mt-3">
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
                foreach ($databarang as $d) :                
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
                                <button data-modal-target="#modal-edit-<?= $d['id_barang'] ?>" class="flex relative px-5 py-2 text-white font-bold bg-blue-600 rounded-lg shadow-lg transition-all duration-300 transform active:translate-y-1 hover:shadow-none">
                                    <i class="bi bi-pencil-fill me-1"></i> Edit
                                </button>
                                <button onclick="window.location.href='index.php?page=delete_barang&target=<?= $d['id_barang'] ?>'" class=" flex relative px-5 py-2 text-white font-bold bg-red-600 rounded-lg shadow-lg transition-all duration-300 transform active:translate-y-1 hover:shadow-none">
                                    <i class="bi bi-trash  me-1"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>


                    <!------ Edit Modal -------->
                    <div id="modal-edit-<?= $d['id_barang'] ?>" class="fixed inset-0 flex items-center justify-center bg-black/25 hidden">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                            <h2 class="text-xl font-semibold mb-4">Tambah Barang</h2>
                            <form action="index.php?page=edit_barang" method="post">
                                <div class="mb-3">
                                    <input type="hidden" name="id" value="<?= $d['id_barang'] ?>">
                                    <label class="block text-sm font-medium">Nama Barang</label>
                                    <input type="text" id="nama_barang" value="<?= $d['Nama_barang'] ?>" name="nama_barang" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                                </div>
                                <div class="mb-3">
                                    <label class="block text-sm font-medium">Satuan</label>
                                    <input type="text" id="satuan" value="<?= $d['Satuan'] ?>" name="satuan" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                                </div>
                                <div class="mb-3">
                                    <label class="block text-sm font-medium">Stok</label>
                                    <input type="number" id="stok" value="<?= $d['Stok'] ?>" name="stock" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                                </div>
                                <div class="mt-4 text-right">
                                    <button type="submit" class="closeModal px-4 py-2 bg-blue-500 text-white rounded-lg">
                                        Tambah
                                    </button>
                                    <button type="button" class="closeModal px-4 py-2 bg-red-500 text-white rounded-lg" data-modal-close="#modal-edit-<?= $d['id_barang'] ?>">
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

    <!-- Modal Tambah -->
    <div id="modal-tambah" class="fixed inset-0 flex items-center justify-center bg-black/25 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Tambah Barang</h2>
            <form action="index.php?page=tambah_barang" method="post">
                <div class="mb-3">
                    <label class="block text-sm font-medium">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" require>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium">Satuan</label>
                    <input type="text" id="satuan" name="satuan" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" require>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium">Stok</label>
                    <input type="number" id="stok" name="stock" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" require>
                </div>
                <div class="mt-4 text-right">
                    <button type="submit" class="closeModal px-4 py-2 bg-blue-500 text-white rounded-lg">
                        Tambah
                    </button>
                    <button type="button" class="closeModal px-4 py-2 bg-red-500 text-white rounded-lg" data-modal-close="#modal-tambah">
                        Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>