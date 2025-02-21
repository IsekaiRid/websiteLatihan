<?php global $modellog;
$datalog = $modellog->GetLog()?->fetch_all(MYSQLI_ASSOC) ?? [];

?>
<div class="px-6">
    <div class="overflow-x-auto rounded-[10px] mt-3">
        <h1 class=" text-2xl mb-2  font-bold ">Log Data</h1>
        <table class="min-w-full bg-white border border-gray-300 rounded-[10px] shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="p-2 text-center">No</th>
                    <th class="p-2 text-center">Nama Gudang</th>
                    <th class="p-2 text-center">Staff</th>
                    <th class="p-2 text-center">Barang</th>
                    <th class="p-2 text-center">Satuan</th>
                    <th class="p-2 text-center">Jumlah</th>
                    <th class="p-2 text-center">Tanggal Masuk</th>
                    <th class="p-2 text-center">Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($datalog as $d): ?>
                    <tr class='text-sm'>
                        <td class="text-center"><?= $i++ ?></td>
                        <td class="p-2 font-bold text-center"><?= $d['Nama_Gudang'] ?></td>
                        <td class="p-2 font-bold text-center"><?= $d['username'] ?></td>
                        <td class="p-2 font-bold text-center"><?= $d['Nama_barang'] ?></td>
                        <td class="p-2 font-bold text-center"><?= $d['Satuan'] ?></td>
                        <td class="p-2 font-bold text-center"><?= $d['Jumlah'] ?></td>
                        <td class="p-2 font-bold text-center"><?= $d['Tanggal_masuk'] ? $d['Tanggal_masuk'] : 'none' ?></td>
                        <td class="p-2 font-bold text-center"><?= $d['Tanggal_keluar'] ? $d['Tanggal_keluar'] : 'none' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>