<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?= $title; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            border-collapse: collapse;
        }
        .center {
            display: block;
            margin: 0 auto;
        }
        .border {
            border: 1px solid #000;
        }
        .border-top {
            border-top: 1px solid #000;
        }
        .border-right {
            border-right: 1px solid #000;
        }
        .border-bottom {
            border-bottom: 1px solid #000;
        }
        .border-left {
            border-left: 1px solid #000;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
  <?php 
    if (!empty($notes)) {
      $notes = $notes[0];
      $notes_41 = $notes['json_data']['notes'];
    }
  ?>
    <div>
        
        <table border="0" cellpadding="2" width="100%">
            <thead>
                <tr>
                    <td colspan="2" rowspan="3">
                        <?php if($clinic['logo1']) { ?>
                            <img width="50px" src="<?= $clinic['logo1'] ?>" alt="">
                        <?php } ?>
                    </td>
                    <td align="left" colspan="2">
                        <h3><?= $clinic['clinic_name'] ?></h3>   
                    </td>
                    <td colspan="2" rowspan="2" align="right">
                        <h1 class="border">
                            &nbsp;&nbsp;<?= $form['id'] ?>&nbsp;&nbsp;
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="4">
                        <?= $clinic['address'] ?>, <?= $clinic['zip_code'] ?>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="4">
                        <?= $clinic['phone'] ?> | <?= $clinic['email'] ?> | <?= $clinic['website'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        &nbsp;
                    </td>
                </tr>
            </thead>
        </table>
        
        <table border="0" cellpadding="2" width="80%" class="center">
            <thead>
                <tr>
                    <td colspan="6" align="center">
                        <h2><?= $form['nama_form'] ?></h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        &nbsp;
                    </td>
                </tr>
            </thead>
        </table>
        
        <table border="0" cellpadding="2" width="80%" class="table center">
            <tbody>
                <tr>
                    <td class="border" colspan="3" width="200px">Dokter Pelaksana Tindakan</td>  
                    <td class="border" colspan="3" ><?= isset($hrd['nama']) ? $hrd['nama'] : ''; ?></td>  
                </tr>
                <tr>
                    <td class="border" colspan="3" width="200px">Penerima Informasi / Pemberi Persetujuan</td>  
                    <td class="border" colspan="3" ><?= isset($notes_41['nama_pemberi_pernyataan']) ? nl2br($notes_41['nama_pemberi_pernyataan']) : ''; ?></td>  
                </tr>
                <tr>
                    <td class="border" colspan="3" width="200px">Tanggal</td>  
                    <td class="border" colspan="3" ><?= isset($notes_41['tanggal_pernyataan']) ? nl2br($notes_41['tanggal_pernyataan']) : ''; ?></td>  
                </tr>
            </tbody>
        </table>
        
        <table border="1" cellpadding="2" width="80%" class="table center">
            <tr>
              <th width="30px">NO</th>
              <th colspan="4" width="70px">JENIS INFORMARI</th>
              <th>ISI INFORMASI</th>
            </tr>
            <tr>
              <td class="text-center">1. </td>
              <td colspan="4">Diagnosis (WD dan DD) *</td>
              <td>Gawat janin panggul sempit, tumor jalan lahir, plasenta previa, preeklamasi, riwayat SC</td>
            </tr>
            <tr>
              <td class="text-center">2. </td>
              <td colspan="4">Dasar Diagnosis*</td>
              <td>Anamnesa, Pemeriksaan fisik, USG</td>
            </tr>
            <tr>
              <td class="text-center">3. </td>
              <td colspan="4">Tindakan Kedokteran*</td>
              <td>Sectio Caesaria</td>
            </tr>
            <tr>
              <td class="text-center">4. </td>
              <td colspan="4">Indikasi Tindakan*</td>
              <td>Indikasi Ibu : Panggul sempit, partus lama, riwayat SC sebelumnya, pendarahan anterpartum, tumor jalan lahir, preeklamasi, eklampsi. <br> Indikasi Janin : Gawat janin, malpresentasi, kembar
            </td>
            </tr>
            <tr>
              <td class="text-center">5. </td>
              <td colspan="4">Tata Cara*</td>
              <td>Insisi perut (Sectio Caesaria) sampai cavum uteri, lahirkan bayi, jahit luka operasi</td>
            </tr>
            <tr>
              <td class="text-center">6. </td>
              <td colspan="4">Tujuan*</td>
              <td>mengeluarkan janin dengan cara insisi perut</td>
            </tr>
            <tr>
              <td class="text-center">7. </td>
              <td colspan="4">Resiko*/ Komplikasi</td>
              <td>
                <ul>
                  <li>Robekan rahim</li>
                  <li>Kehilangan darah lebih banyak</li>
                  <li>Cedera kandung kemih dan usus</li>
                  <li>Angkat rahim</li>
                  <li>Perawatan ICU</li>
                  <li>Kematian ibu</li>
                  <li>Infeksi luka operasi</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td class="text-center">8. </td>
              <td colspan="4">Prognosis*</td>
              <td>Baik</td>
            </tr>
            <tr>
              <td class="text-center">9. </td>
              <td colspan="4">Alternatif*</td>
              <td>-</td>
            </tr>
            <tr>
              <td class="text-center">10. </td>
              <td colspan="4">Lain-lain*</td>
              <td>-</td>
            </tr>
            <tr>
                <td class="border" colspan="5">Dengan ini menyatakan bahwa saya Dokter <?= $hrd['nama']; ?> Telah menerangkan hal-hal di atas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan /  atau berdiskusi.</td>
                <td class="border" colspan="1"><img src="<?= $hrd['ttd']; ?>" width="100px"> </td>
            </tr>
            <tr>
                <td class="border" colspan="5">Dengan ini menyatakan bahwa <?= isset($notes_41['status_pemberi_pernyataan']) ? ($notes_41['status_pemberi_pernyataan'] == "Pasien" ? 'saya': 'saya '.$notes_41['status_pemberi_pernyataan'] .' pasien') : ''; ?> <?= isset($notes_41['nama_pemberi_pernyataan']) ? nl2br($notes_41['nama_pemberi_pernyataan']) : ''; ?> telah menerima informasi sebagaimana dijelaskan di atas serta telah diberikesempatan  untuk bertanya atau berdiskusi, dan telah memahaminya. Untuk itu saya menyatakan <b><?= isset($notes_41['pernyataan']) ? ($notes_41['pernyataan'] == 'menyetujui' ? 'Menyetujui':'Menolak') : ''; ?></b> untuk dilakukan tindakan Sectio Caesaria.</td>
                <td class="border" colspan="1"><img src="<?= isset($notes_41['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_41['ttd_pasien']) : ''; ?>" width="100px"> </td>
            </tr>
            <tr>
                <td class="border" colspan="6">Keterangan : Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali atau keluarga terdekat</td>
            </tr>
            <tr>
                <td colspan="6">
                    <small style="font-size: 7px;">
                        <i>
                            <?php if($cetakan) { ?>
                                Cetakan Ke: <?= $cetakan['no_cetak'] ?> // Tanggal Cetak :  <span><?= $cetakan['created_date'] ?></span> // Created Date : <span><?= $notes['created_date'] ?></span> //  Created By : <span><?= $cetakan['created_by'] ?></span>
                            <?php } else { ?>
                                Tanggal Cetak :  <span><?= date('d-m-Y H:i:s') ?></span> // Created Date : <span><?= $notes['created_date'] ?></span> //  Created By : <span><?= $notes['created_by'] ?></span>
                            <?php } ?>
                        </i>
                    </small>
                </td>
            </tr>
        </table>

    </div>
</body>
</html>

