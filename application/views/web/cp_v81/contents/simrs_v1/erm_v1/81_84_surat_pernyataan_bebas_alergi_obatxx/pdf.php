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
                        <h2><?= $form['kode_form'] ?> - <?= $form['nama_form'] ?></h2>
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
            <!-- <thead>
                <tr>
                    <td colspan="6">Saya yang bertanda tangan dibawah ini:</td>
                </tr>
                <tr class="grey">
                    <td align="left" width="90px">
                        No Registrasi
                    </td>
                    <td width="10px" align="center">:</td>
                    <td align="left">
                        <?= $reg['no_reg'] ? $reg['no_reg'] : '-' ?>
                    </td>
                    <td align="left" width="90px">
                        No BPJS
                    </td>
                    <td width="10px">:</td>
                    <td align="left">
                        <?= $reg['no_bpjs'] ? $reg['no_bpjs'] : '-' ?>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        Nama
                    </td>
                    <td align="center">:</td>
                    <td align="left">
                        <?= $reg['honorifics'] . ' ' . $reg['nama_pasien'] ?>
                    </td>
                    <td align="left">
                        No KTP
                    </td>
                    <td align="center">:</td>
                    <td align="left">
                        <?= $reg['no_ktp'] ? $reg['no_ktp'] : '-' ?>
                    </td>
                </tr>
                <tr class="grey">
                    <td align="left">No RM:</td>
                    <td align="center">:</td>
                    <td align="left">
                        <?= $reg['no_rm'] ? $reg['no_rm'] : '-' ?>
                    </td>
                    <td align="left">
                        Data Lahir
                    </td>
                    <td align="center">:</td>
                    <td align="left">
                        <?= $reg['tanggal_lahir'] ? $reg['tempat_lahir'] . ', ' . date('d F Y', strtotime($reg['tanggal_lahir'])) : '-' ?>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        Jenis Kelamin
                    </td>
                    <td align="center">:</td>
                    <td align="left">
                        <?= $reg['kelamin']; ?>
                    </td>
                    <td align="left">
                        Golongan Darah
                    </td>
                    <td align="center">:</td>
                    <td align="left">
                        <?= $reg['golongan_darah'] ? $reg['golongan_darah'] : '-' ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <hr>
                    </td>
                </tr>
            </thead> -->
            <tbody>
                
                <tr>
                    <td colspan="6">Saya yang bertanda tangan dibawah ini:</td>
                </tr>
                <tr class="grey">
                    <td>Nama</td>
                    <td width="30px" align="center">:</td>
                    <td colspan="4"><?= isset($notes_84['nama_pemberi_pernyataan']) ? nl2br($notes_84['nama_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td>Umur/Tgl Lahir</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= isset($notes_84['umur_pemberi_pernyataan']) ? nl2br($notes_84['umur_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Selaku <b><?= isset($notes_84['telpon_pemberi_pernyataan']) ? ($notes_84['status_pemberi_pernyataan']=="Pasien"? " Sendiri</b>": $notes_84['status_pemberi_pernyataan'] . "</b> dari pasien ") : ''; ?> :</td>
                </tr>
                <tr class="grey">
                    <td>Nama</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['nama_pasien']) ?></td>
                </tr>
                <tr>
                    <td align="left">
                        Jenis Kelamin
                    </td>
                    <td align="center">:</td>
                    <td align="left">
                        <?= $reg['kelamin']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Umur/Tgl Lahir</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['umur']) ?></td>
                </tr>
                <tr>
                    <td>No RM</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['no_rm_dpjp']) ?></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Dengan ini menyatakan bahwa :</td>
                </tr>
                <tr>
                    <td colspan="6">
                        1. Dengan sadar tanpa paksaandari pihak manapun meminta kepada pihak <?= $clinic['clinic_name'] ?> untuk <b>Pulang Atas Permintaan Sendiri</b> yang merupakan hak saya / pasiesn dengan alasan:
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                       <b> <i><?= $resume['prognosa'] ?></i></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        2. saya telah memahami sepenuhnya penjelasan yang diberikan dari pihak <?= $clinic['clinic_name'] ?> mengenai penyakit dan kemungkinan / konsekuensi terbaik sampai terburuk atas keputusan yang saya ambil. Serta tanggung jawab saya dalam mengambil keputusan ini. 
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        3. Apabila terjadi sesuatu hal berkaitan dengan putusan yang telah di ambil, maka hal tersebut adalah menjadi tanggung jawab pasien / keluarga sepenuhnya dan tidak akan manyangkut pautkan / meuntut Rumah Sakit ini. 
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        4. Atas keputusan saya ini, rumah sakit telah memberikan penjelasan mengenai alternatif pengobatan selanjutnya yaitu (<b><i><?= $resume['instruksi_pulang'] ?></i></b>).
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian pernyataan ini saya buat dengan sesungguhnya untuk diketahui dan digunakan sebagaimana perlunya.
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2" align="center"><?= $clinic['area'] ?>, <?= date('d-m-Y', strtotime($notes['created_date'])) ?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Saksi 1</td>
                    <td colspan="2" align="center">Saksi 2</td>
                    <td colspan="2" align="center">Pembuat pernyataan</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">(Pihak Rumah Sakit)</td>
                    <td colspan="2" align="center">(Keluarga Pasien)</td>
                    <td colspan="2" align="center">(Pasien / Keluarga Pasien)</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <img src="<?= $hrd['ttd']; ?>" width="100px">
                    </td>
                    <td colspan="2" align="center">
                        <img src="<?= isset($notes_84['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_84['ttd_pasien']) : ''; ?>" width="100px">                    
                    </td>
                    <td colspan="2" align="center">
                        <img src="<?= isset($notes_84['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_84['ttd_pasien']) : ''; ?>" width="100px">                    
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <span>(<?= $hrd['nama'] ?>)</span>
                    </td>
                    <td colspan="2" align="center">
                        <span>(<?= isset($notes_84['nama_pemberi_pernyataan']) ? nl2br($notes_84['nama_pemberi_pernyataan']) : ''; ?>)</span>
                    </td>
                    <td colspan="2" align="center">
                        <span>(<?= isset($notes_84['nama_pemberi_pernyataan']) ? nl2br($notes_84['nama_pemberi_pernyataan']) : ''; ?>)</span>
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

