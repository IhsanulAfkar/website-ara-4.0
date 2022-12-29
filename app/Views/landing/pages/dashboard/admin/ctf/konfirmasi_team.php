<?= $this->extend('landing/component/dashboard/template_ctf'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('msg')) : ?>
    <div class="bg-blue-500 w-full border-[1px] rounded-xl p-2 my-2 text-xl text-center text-white font-bold">
        <?= session()->getFlashdata('msg'); ?>
    </div>
<?php endif; ?>
<section class="mt-4 w-full overflow-auto h-[500px] border-2 border-black">
    <table class="table-auto border-collapse w-screen  text-center">
        <thead class="">
            <tr class="bg-slate-300">
                <th class="p-2 border border-slate-800">Id Tim</th>
                <th class="p-2 border border-slate-800">Nama Tim</th>
                <th class="p-2 border border-slate-800">Institusi / Sekolah</th>
                <th class="p-2 border border-slate-800">Nama Ketua</th>
                <th class="p-2 border border-slate-800">No Telp Ketua</th>
                <th class="p-2 border border-slate-800">Email Ketua</th>
                <th class="p-2 border border-slate-800">Surket Ketua</th>
                <th class="p-2 border border-slate-800">Ig ARA Ketua</th>
                <th class="p-2 border border-slate-800">Tiktok Ketua</th>
                <th class="p-2 border border-slate-800">Nama Anggota 1</th>
                <th class="p-2 border border-slate-800">Surket Anggota 1</th>
                <th class="p-2 border border-slate-800">Ig ARA Anggota 1</th>
                <th class="p-2 border border-slate-800">Tiktok Anggota 1</th>
                <th class="p-2 border border-slate-800">Nama Anggota 2</th>
                <th class="p-2 border border-slate-800">Surket Anggota 2</th>
                <th class="p-2 border border-slate-800">Ig ARA Anggota 2</th>
                <th class="p-2 border border-slate-800">Tiktok Anggota 2</th>
                <th class="p-2 border border-slate-800">Coupon</th>
                <th class="p-2 border border-slate-800">Bukti Bayar</th>
                <th class="p-2 px-4 border border-slate-800">Konfirmasi</th>
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
                    <td class="underline text-blue-600 border p-2 border-slate-300"><a href="<?= base_url('uploads/ctf/suket/' . $team['ctf_kp_surket_ketua']); ?>" target="_blank">Lihat</a></td>
                    <td class="underline text-blue-600 border p-2 border-slate-300"><a href="<?= base_url('uploads/ctf/ig_ara/' . $team['ctf_ig_ara_ketua']); ?>" target="_blank">Lihat</a></td>
                    <td class="underline text-blue-600 border p-2 border-slate-300"><a href="<?= base_url('uploads/ctf/tiktok/' . $team['ctf_tiktok_ketua']); ?>" target="_blank">Lihat</a></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_nama_anggota_1']; ?></td>
                    <td class="underline text-blue-600 p-2 border border-slate-300"><a href="<?= base_url('uploads/ctf/suket/' . $team['ctf_kp_surket_anggota_1']); ?>" target="_blank">Lihat</a></td>
                    <td class="underline text-blue-600 border p-2 border-slate-300"><a href="<?= base_url('uploads/ctf/ig_ara/' . $team['ctf_ig_ara_anggota_1']); ?>" target="_blank">Lihat</a></td>
                    <td class="underline text-blue-600 border p-2 border-slate-300"><a href="<?= base_url('uploads/ctf/tiktok/' . $team['ctf_tiktok_anggota_1']); ?>" target="_blank">Lihat</a></td>
                    <td class="p-2 border border-slate-300"><?= $team['ctf_nama_anggota_2']; ?></td>
                    <td class="underline text-blue-600 p-2 border border-slate-300"><a href="<?= base_url('uploads/ctf/suket/' . $team['ctf_kp_surket_anggota_2']); ?>" target="_blank">Lihat</a></td>
                    <td class="underline text-blue-600 border p-2 border-slate-300"><a href="<?= base_url('uploads/ctf/ig_ara/' . $team['ctf_ig_ara_anggota_2']); ?>" target="_blank">Lihat</a></td>
                    <td class="underline text-blue-600 border p-2 border-slate-300"><a href="<?= base_url('uploads/ctf/tiktok/' . $team['ctf_tiktok_anggota_2']); ?>" target="_blank">Lihat</a></td>
                    <?php if ($team['coupon']) : ?>
                        <td class="p-2 border border-slate-300"><?= $team['coupon']; ?></td>
                    <?php else : ?>
                        <td class="p-2 border border-slate-300">-</td>
                    <?php endif; ?>
                    <td class="underline text-blue-600 border p-2 border-slate-300"><a href="<?= base_url('uploads/ctf/bukti_bayar/' . $team['ctf_bukti_bayar']); ?>" target="_blank">Lihat</a></td>
                    <td class="p-2 border border-slate-300">
                        <button onclick="return confirm('Terima Tim <?= $team['ctf_tim_nama']; ?>?')"><a class="p-2 border border-black rounded-sm bg-green-500 mr-px" href="<?= base_url() ?>/dashboard/admin-ctf/verify-konfirmasi-team/<?= $team['ctf_tim_id'] ?>/1">Ya</a></button>

                        <button onclick="return confirm('Tolak Tim <?= $team['ctf_tim_nama']; ?>?')"><a class="ml-px p-2 border border-black rounded-sm bg-red-500" href="<?= base_url() ?>/dashboard/admin-ctf/verify-konfirmasi-team/<?= $team['ctf_tim_id'] ?>/0">Tidak</a></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= $this->endSection('content'); ?>