<?= $this->extend('landing/component/dashboard/template'); ?>
<?= $this->section('content'); ?>
<section class="mt-4 w-full overflow-auto h-[500px] border-2 border-black">
    <table class="table-auto border-collapse w-screen  text-center">
        <thead class="">
            <tr class="bg-slate-300">
                <th class="p-2 border border-slate-800">Nama Tim</th>
                <th class="p-2 border border-slate-800">Institusi / Sekolah</th>
                <th class="p-2 border border-slate-800">Nama Ketua</th>
                <th class="p-2 border border-slate-800">No Telp</th>
                <th class="p-2 border border-slate-800">Email</th>
                <th class="p-2 border border-slate-800">Surket Ketua</th>
                <th class="p-2 border border-slate-800">Ig ARA Ketua</th>
                <th class="p-2 border border-slate-800">Tiktok Ketua</th>
                <th class="p-2 border border-slate-800">Nama Anggota</th>
                <th class="p-2 border border-slate-800">Surket Anggota</th>
                <th class="p-2 border border-slate-800">Ig ARA Anggota</th>
                <th class="p-2 border border-slate-800">Tiktok Anggota</th>
                <th class="p-2 border border-slate-800">Coupon</th>
                <th class="p-2 border border-slate-800">Bukti Bayar</th>
                <th class="p-2 px-4 border border-slate-800">Konfirmasi</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 30; $i++) : ?>
                <tr>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">Lorem</td>
                    <td class="p-2 border border-slate-300">
                        <button class="p-2 border border-black rounded-sm bg-green-500 mr-px">Ya</button>

                        <button class="ml-px p-2 border border-black rounded-sm bg-red-500">Tidak</button>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</section>
<?= $this->endSection('content'); ?>