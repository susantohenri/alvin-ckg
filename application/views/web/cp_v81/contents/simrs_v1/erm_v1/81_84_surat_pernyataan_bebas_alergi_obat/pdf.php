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
        .grey {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
  <?php 
    if (!empty($notes)) {
      $notes = $notes[0];
      $notes_84 = $notes['json_data']['notes'];
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
                    <td colspan="6">Saya yang bertanda tangan dibawah ini:</td>
                </tr>
                <tr class="grey">
                    <td>Nama</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['nama_pasien']) ?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['umur']) ?></td>
                </tr>
                <tr class="grey">
                    <td>Alamat</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['alamat']) ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['pekerjaan']) ?></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Menyatakan dengan benar bahwa saya tidak pernah mengalami alergi obat apapun, baik antibiotik maupun obat lainya.</td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Saya yang bertandatangan dibawah ini sebagai saksi :</td>
                </tr>
                <tr class="grey">
                    <td>Nama</td>
                    <td width="30px" align="center">:</td>
                    <td colspan="4"><?= isset($notes_84['nama_pemberi_pernyataan']) ? nl2br($notes_84['nama_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= isset($notes_84['umur_pemberi_pernyataan']) ? nl2br($notes_84['umur_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr class="grey">
                    <td>Alamat</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= isset($notes_84['alamat_pemberi_pernyataan']) ? nl2br($notes_84['alamat_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= isset($notes_84['pekerjaan_pemberi_pernyataan']) ? nl2br($notes_84['pekerjaan_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Menyatakan dengan benar sebagai saksi bahwa pasien mengaku tidak pernah mengalami alergi obat apapun baik antibiotik maupun obat lainya.</td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Demikian Surat Pernyataan ini saya buat tanpa paksaan dan dengan penjelasan dokter yang merawat.</td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
               
                <tr>
                    <td colspan="3" align="center">Tanda Tangan Dokter</td>
                    <td colspan="3" align="center">Tanda Tangan Pasien</td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <img src="<?= $hrd['ttd']; ?>" width="100px">
                    </td>
                    <td colspan="3" align="center">
                        <img src="<?= isset($notes_84['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_84['ttd_pasien']) : ''; ?>" width="100px">                    
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <span>(<?= $hrd['nama'] ?>)</span>
                    </td>
                    <td colspan="3" align="center">
                        <span>(<?= $reg['nama_pasien']; ?>)</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
               
                <tr>
                    <td colspan="3" align="center">Tanda Tangan Perawat</td>
                    <td colspan="3" align="center">Tanda Tangan Saksi</td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <img src="<?= $session['ttd']; ?>" width="100px">
                    </td>
                    <td colspan="3" align="center">
                        <?= 
                        $ttd_saksi = '';
                            if($notes_84['status_pemberi_pernyataan'] == "Pasien"){
                                $ttd_saksi = isset($notes_84['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_84['ttd_pasien']) : '';
                            } else {
                                $ttd_saksi = isset($notes_84['ttd_saksi']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_84['ttd_saksi']) : '';
                            }
                        ?>
                        <img src="<?= $ttd_saksi; ?>" width="100px">                    
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <span>(<?= $session['nama'] ?>)</span>
                    </td>
                    <td colspan="3" align="center">
                    <?= 
                        $nama_pemberi_pernyataan = '';
                            if($notes_84['status_pemberi_pernyataan'] == "Pasien"){
                                $nama_pemberi_pernyataan = $reg['nama_pasien'];
                            } else {
                                $nama_pemberi_pernyataan = isset($notes_84['nama_pemberi_pernyataan']) ? nl2br($notes_84['nama_pemberi_pernyataan']) : '';
                            }
                        ?>

                        <span>(<?= $nama_pemberi_pernyataan; ?>)</span>
                    </td>
                </tr>
                <tr>
                    <td align="right" colspan="6">
                        &nbsp;
                    </td>
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
            </tbody>
        </table>
    </div>
</body>
</html>

