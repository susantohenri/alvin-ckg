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
        .text-center {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .text-justify {
            text-align: justify;
        }
        .vertical-align-middle {
            vertical-align: middle;
        }
    </style>
</head>
<body>
  <?php 
    if (!empty($notes)) {
      $notes = $notes[0];
      $notes_134 = $notes['json_data']['notes'];
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
        
        <table border="0" cellpadding="2" width="80%" class="table center text-justify">
            <thead>
                <tr>
                    <td colspan="6">
                        <hr>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">Saya yang bertanda tangan dibawah ini:</td>
                </tr>
                <tr>
                    <td colspan="6" align="center"><?= isset($notes_134['nama_pemberi_pernyataan']) ? nl2br($notes_134['nama_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Menyetujui untuk dilakukan tindakan medis:</td>
                </tr>
                <tr>
                    <td colspan="6" align="center"><?= isset($notes_134['tindakan_medis']) ? ($notes_134['tindakan_medis'] == "invasif" ? 'Invasif' : 'Non Invasif' ): ''; ?></td>
                </tr>
                <tr>
                    <td colspan="6">Oleh Dokter yang bertandatangan dibawah ini terhadap pasien : </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $reg['nama_pasien'] == null ? '' :nl2br($reg['nama_pasien']) ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $reg['kelamin'] == null ? '' :nl2br($reg['kelamin']) ?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $reg['umur'] == null ? '' :nl2br($reg['umur']) ?></td>
                </tr>
                <tr>
                    <td>No. RM</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $reg['no_rm'] == null ? '' :nl2br($reg['no_rm']) ?></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Saya telah memahami penjelasan dokter mengenai tindakan, manfaat dan berbagai alternatif terapi serta menyetujui tindakan yang tertulis di atas dan sudah diterangkan mengenai resiko yang mungkin terjadi.</td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Catatan untuk pasien/keluarga: Tanda tangan anda dibawah ini merupakan bukti bahwa anda telah membaca dan menyetujui semua yang tersebut diatas, tindakan/ operasi medis telah dijelaskan secara adekuat (Jelas) oleh dokter anda. Anda sudah mendapatkan semua informasi yang ingin anda ketahui, anda juga telah mengetahui tatalaksana dari tindakan/operasi tersebut diatas serta memberikan ijin dan kuasa kepada dokter atau <?= $clinic['clinic_name'] ?>.</td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="3" class="text-left"><?= $clinic['area'] ?>, <?= date('d-m-Y', strtotime($notes['created_date'])) ?></td>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="1" class="text-left">Jam</td>
                    <td colspan="2" class="text-left"><?= date('H:s:i');?></td>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-left">Yang menyatakan</td>
                    <td colspan="3" class="text-left">Saksi **)</td>
                </tr>
                <tr style="vertical-align: middle;">
                    <td colspan="1" class="text-left">Tanda tangan</td>
                    <td colspan="2" class="text-left">
                        : <img style="vertical-align: middle;" src="<?= isset($notes_134['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_134['ttd_pasien']) : ''; ?>" width="100px">                    
                    </td>
                    <td colspan="1" class="text-left">Tanda tangan</td>
                    <td colspan="2" class="text-left">
                        : <img style="vertical-align: middle;" src="<?= isset($notes_134['ttd_saksi']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_134['ttd_saksi']) : ''; ?>" width="100px">                    
                    </td>
                </tr>
                <tr style="vertical-align: middle;">
                    <td colspan="1" class="text-left">Nama Lengkap</td>
                    <td colspan="2" class="text-left">
                       : <span><?= isset($notes_134['nama_pemberi_pernyataan']) ? nl2br($notes_134['nama_pemberi_pernyataan']) : ''; ?></span>
                    </td>
                    <td colspan="1" class="text-left">Nama Lengkap</td>
                    <td colspan="2" class="text-left">
                       : <span><?= isset($notes_134['nama_saksi']) ? nl2br($notes_134['nama_saksi']) : ''; ?></span>
                    </td>
                </tr>
                <tr style="vertical-align: middle;">
                    <td colspan="1" class="text-left">Telepon</td>
                    <td colspan="2" class="text-left">
                        : <span><?= isset($notes_134['telpon_pemberi_pernyataan']) ? $notes_134['telpon_pemberi_pernyataan'] : ''; ?></span>
                    </td>
                    <td colspan="3" class="text-left">
                    &nbsp;
                    </td>
                </tr>
                <tr>
                    <td align="right" colspan="6">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="text-left" colspan="6">
                        Saya menyatakan telah memberikan penjelasan perihal jenis, manfaat dan resiko tindakan medis tersebut diatas kepada pasien dan/atau penandatangan persetujuan medis Ini.
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <img src="<?= $hrd['ttd']; ?>" width="100px">                    
                    </td>
                    <td align="right" colspan="4">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <span>(<?= $hrd['nama']; ?>)</span>
                    </td>
                    <td align="right" colspan="4">
                        &nbsp;
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

