<!DOCTYPE html>
<html lang="en">
  <style>
    @media print {
    @page {
        size: auto;   /* Let the browser determine the size */
        margin: 0;     /* No margin on the printed page */
    }

    body {
        margin: 1.6cm; /* Adjust as needed */
    }
}

  </style>
  <header>
    <div style="text-align: center;" class="icon-wrap"><img src="<?= base_url('assets/pictures/logo_kop_surat.png'); ?>" alt="SMKN 10 MAKASSAR Logo"></div>
    <h3 style="text-align: center;">PEMERINTAH PROVINSI SULAWESI SELATAN</h3>
    <p style="text-align: center;"><strong>UPT SMK NEGERI 10 MAKASSAR</strong></p>
    <p style="text-align: center;">Alamat : Jl. Bontomanai No. 14 Gunungsari Baru Makassar &ndash; 90222</p>
    <p style="text-align: center;">Telp. (0411) 873245, (0411) 836113 Faks. (0411) 836113</p>
    <p style="text-align: center;">E-Mail: <u><a href="mailto:smknegeri10mks@gmail.com">smknegeri10mks@gmail.com</a></u></p>
  </header>
  
  <hr style="border: 1px solid #000;" />
  <hr style="border: 1px solid #000;" />

  <p>Nomor : /BK/UPT.SMKN10.MKS/</p>
  <p>Lamp : Penyampaian / Konsultasi</p>
  <p>Sifat : <strong>PENTING</strong></p>
  <p>Melalui surat ini, kami sampaikan bahwa peserta didik yang tertera namanya di bawah ini:</p>

  <table style="width: 533px; margin: auto;">
      <tbody>
      <?php foreach ($jadwal as $jwd): ?>
          <tr>
              <td style="width: 323px;"><p><strong><?= $jwd['user_fullName'] ?></strong></p></td>
              <td style="width: 142px;"><p><strong><?= $jwd['kls'] ?></strong></p></td>
          </tr>
      <?php endforeach; ?>
      </tbody>
  </table>

  <p>Agar kiranya memenuhi pemanggilan oleh Bimbingan Konseling SMK Negeri 10 Makassar atas koordinasi guru BK dengan wali kelasnya, guna kepentingan pendidikan anak kita. Untuk itu kami sangat mengharapkan kedatangan bapak/ibu orang tua/wali bersama dengan peserta didik untuk membicarakan kepentingan tersebut, yang insyah allah pada:</p>

  <?php foreach ($jadwal as $jwd): ?>
    <?php setlocale(LC_TIME, 'id_ID'); ?>
    <p>Hari/Tanggal : <?= strftime('%d %B %Y', strtotime($jwd['jadwal'])); ?></p>
    <p>Jam          : <?= date('H:i', strtotime($jwd['waktu'])); ?></p>
    <p>Tempat       : SMKN 10 Makassar</p>
  <?php endforeach; ?>

  <p>Atas perhatian dan kerjasamanya yang baik dari bapak/ibu kami ucapkan terima kasih.</p>

  <p style="text-align: right;">Makassar,</p>
  <p style="text-align: right;">Guru Bimbingan Konseling</p>

</html>
