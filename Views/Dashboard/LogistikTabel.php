<?php
global $modelbarang;
$dataBarang = $modelbarang->GetbarangAll();
?>

<main>
    <div class="shadow-sm border border-slate-200 rounded-sm max-w-auto mx-5 px-4 py-6 sm:px-6 lg:px-8 mb-20">
        <div id="tabel">
            <h1 class=" font-bold text-lg">Tabel Logistik</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-1.5">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Barang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataBarang as $barang): ?>
                            <tr class="border-b border-gray-300">
                                <td scope="col" class="px-6 py-3">
                                    <?= $barang['id_barang']; ?>
                                </td>
                                <td scope="col" class="px-6 py-3">
                                    <?= $barang['nama_barang']; ?>
                                </td>
                                <td scope="col" class="px-6 py-3">
                                    <?= $barang['jenis']; ?>
                                </td>
                                <td scope="col" class=" w-52 py-3">
                                    <button class="cursor-pointer transition-all bg-blue-500 text-white px-6 py-2 rounded-lg border-blue-600 border-b-[4px] hover:brightness-110 hover:shadow-md active:scale-95 active:shadow-sm">
                                        edit
                                    </button>
                                    <button class="cursor-pointer transition-all bg-red-500 text-white px-6 py-2 rounded-lg border-red-600 border-b-[4px] hover:brightness-110 hover:shadow-md active:scale-95 active:shadow-sm">
                                        delete
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>