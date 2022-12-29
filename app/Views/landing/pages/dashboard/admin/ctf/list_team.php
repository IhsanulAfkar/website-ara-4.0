<?= $this->extend('landing/component/dashboard/template_ctf'); ?>
<?= $this->section('content'); ?>
<section class="mt-4 w-full overflow-auto h-[500px] border-2 border-black">
    <!--  -->
    <table class="table-auto border-collapse w-screen  text-center">
        <thead class="">
            <tr class="bg-slate-300">
                <th class="p-2 border border-slate-800">Id Tim</th>
                <th class="p-2 border border-slate-800">Nama Tim</th>
                <th class="p-2 border border-slate-800">Institusi / Sekolah</th>
                <th class="p-2 border border-slate-800">Nama Ketua</th>
                <th class="p-2 border border-slate-800">No Telp Ketua</th>
                <th class="p-2 border border-slate-800">Email Ketua</th>
                <th class="p-2 border border-slate-800">Nama Anggota 1</th>
                <th class="p-2 border border-slate-800">Nama Anggota 2</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($team_list as $team) : ?>
                <tr>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_tim_id']; ?></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_tim_nama']; ?></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_asal_institusi']; ?></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_nama_ketua']; ?></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_phone_ketua']; ?></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_email_ketua']; ?></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_nama_anggota_1']; ?></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_nama_anggota_2']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= $this->endSection('content'); ?>