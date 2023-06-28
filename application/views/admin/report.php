<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Laporan</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Isi</th> 
        <th>Waktu Dibuat</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($news_report as $nr) { ?>
        <tr>
          <td><?= $nr->id_berita; ?></td>
          <td><?= $nr->judul; ?></td>
          <td><?= $nr->isi_berita; ?></td>
          <td><?= $nr->waktu_dibuat; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>