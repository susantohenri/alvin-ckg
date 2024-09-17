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
      $notes_108 = $notes['json_data']['notes'];
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
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $reg['nama_pasien'] == null ? '' : nl2br($reg['nama_pasien']) ?></td>
                </tr>
                <tr>
                    <td>No Kartu</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $reg['no_bpjs'] == null ? '' : nl2br($reg['no_bpjs']) ?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $reg['umur'] == null ? '' : nl2br($reg['umur']) ?></td>
                </tr>
                <tr>
                    <td>Diagnosa Akhir</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $resume['diagnosa_akhir'] == null ? '' : nl2br($resume['diagnosa_akhir']) ?></td>
                </tr>
                <tr>
                    <td>Obat Pulang</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $resume['obat_terapi_pulang'] == null ? '' : nl2br($resume['obat_terapi_pulang']) ?></td>
                </tr>
                <tr>
                    <td>Evaluasi Terapi</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= $resume['terapi'] == null ? '' : nl2br($resume['terapi']) ?></td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                            <b><i>Pasien bisa kontrol ke puskesmas/ dokter keluarga</i></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="3" align="center"><?= $clinic['area'] ?>, <?= date('d-m-Y', strtotime($notes['created_date'])) ?></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="3" align="center">
                        <img src="<?= $hrd['ttd']; ?>" width="100px">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="3" align="center">
                        <span>(<?= $hrd['nama'] ?>)</span>
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

