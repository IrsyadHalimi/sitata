<h2>Laporan Berita Website Portal Berita Desa Cilandak</h2><br>
<h4>Berita</h4>
<table style="border-collapse: collapse;">
  <tr>
    <th style="border: 1px solid black; padding: 8px;">No</th>
    <th style="border: 1px solid black; padding: 8px;">Id Berita</th>
    <th style="border: 1px solid black; padding: 8px;">Judul Berita</th>
    <th style="border: 1px solid black; padding: 8px;">Waktu Dibuat</th>
    <th style="border: 1px solid black; padding: 8px;">Dilihat</th>
    <th style="border: 1px solid black; padding: 8px;">Kategori Berita</th>
  </tr>
  <?php 
  $no = 1;
  foreach ($news_report as $nr) {
    ?> 
  <tr>
    <td style="border: 1px solid black; padding: 8px;"><?= $no++; ?></td>
    <td style="border: 1px solid black; padding: 8px;"><?= $nr->id_berita; ?></td>
    <td style="border: 1px solid black; padding: 8px;"><?= $nr->judul; ?></td>
    <td style="border: 1px solid black; padding: 8px;"><?= $nr->waktu_dibuat; ?></td>
    <td style="border: 1px solid black; padding: 8px;"><?= $nr->dilihat; ?></td> 
    <td style="border: 1px solid black; padding: 8px;"><?= $nr->kategori; ?></td> 
  </tr>
  <?php } ?>
</table>
<br>
<h4>Komentar</h4>
<table style="border-collapse: collapse;">
  <tr>
    <th style="border: 1px solid black; padding: 8px;">No</th>
    <th style="border: 1px solid black; padding: 8px;">Id Komentar</th>
    <th style="border: 1px solid black; padding: 8px;">Nama Anggota</th>
    <th style="border: 1px solid black; padding: 8px;">Isi Komentar</th>
    <th style="border: 1px solid black; padding: 8px;">Waktu Dibuat</th>
  </tr>
  <?php 
  $no = 1;
  foreach ($comment_report as $cr) {
    ?> 
  <tr>
    <td style="border: 1px solid black; padding: 8px;"><?= $no++; ?></td>
    <td style="border: 1px solid black; padding: 8px;"><?= $cr->id_komentar; ?></td>
    <td style="border: 1px solid black; padding: 8px;"><?= $cr->nama; ?></td>
    <td style="border: 1px solid black; padding: 8px;"><?= $cr->isi_komentar; ?></td> 
    <td style="border: 1px solid black; padding: 8px;"><?= $cr->waktu_dibuat_komentar; ?></td> 
  </tr>
  <?php } ?>
</table>
<p>Dicetak Pada:  <?php date_default_timezone_set("Asia/Jakarta"); echo Date('Y-m-d H:i:s');?></p>
