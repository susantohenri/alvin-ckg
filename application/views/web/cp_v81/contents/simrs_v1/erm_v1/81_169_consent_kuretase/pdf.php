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
      $notes_169 = $notes['json_data']['notes'];
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
                    <td  class="border-left border-top" width="100px">No. Rekam Medis</td>
                    <td  class="border-top" align="center" width="30px">:</td>
                    <td  class="border-top border-right" colspan="4"><?= $reg['no_rm'] == null ? '' : nl2br($reg['no_rm']) ?></td>
                </tr>
                <tr>
                    <td class="border-left" width="100px">Nama Pasien</td>
                    <td align="center" width="30px">:</td>
                    <td class="border-right" colspan="4"><?= $reg['nama_pasien'] == null ? '' : nl2br($reg['nama_pasien']) ?></td>
                </tr>
                <tr>
                    <td class="border-left" width="100px">Jenis Kelamin</td>
                    <td align="center" width="30px">:</td>
                    <td class="border-right" colspan="4"><?= $reg['kelamin'] == null ? '' : nl2br($reg['kelamin']) ?></td>
                </tr>
                <tr>
                    <td class="border-left" width="100px">Tanggal Lahir</td>
                    <td align="center" width="30px">:</td>
                    <td class="border-right" colspan="4"><?= $reg['tanggal_lahir'] == null ? '' : nl2br($reg['tanggal_lahir']) ?></td>
                </tr>
                <tr>
                    <td class="border-left border-bottom" width="100px">Umur</td>
                    <td class="border-bottom" align="center" width="30px">:</td>
                    <td class="border-bottom border-right"colspan="4"><?= $reg['umur'] == null ? '' : nl2br($reg['umur']) ?></td>
                </tr>
                <tr>
                    <td class="border" colspan="3" width="200px">Dokter Pelaksana Tindakan</td>  
                    <td class="border" colspan="3" ><?= $hrd['nama']; ?></td>  
                </tr>
                <tr>
                    <td class="border" colspan="3" width="200px">Pemberi Informasi</td>  
                    <td class="border" colspan="3" ><?= $hrd['nama']; ?></td>  
                </tr>
                <tr>
                    <td class="border" colspan="3" width="200px">Penerima Informasi / Pemberi Persetujuan</td>  
                    <td class="border" colspan="3" ><?= isset($notes_169['nama_pemberi_pernyataan']) ? $notes_169['nama_pemberi_pernyataan'] : ''; ?></td>  
                </tr>
            </tbody>
        </table>
        
        <table border="0" cellpadding="2" width="80%" class="table center">
            <tr>
              <th class="border" width="30px">NO</th>
              <th class="border" colspan="2" width="70px">JENIS INFORMARI</th>
              <th class="border" colspan="2">ISI INFORMASI</th>
              <th class="border">PARAF</th>
            </tr>
            
            <tr>
              <td class="border text-center" width="30px center">1. </td>
              <td class="border" colspan="2">Diagnosis (WD dan DD) *</td>
              <td class="border" colspan="2"><?= isset($notes_169['diagnosis']) ? $notes_169['diagnosis'] : ''; ?></td>
              <td class="border text-center"><?= isset($notes_169['paraf_diagnosis']) ? ($notes_169['paraf_diagnosis'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">2. </td>
              <td class="border" colspan="2">Dasar Diagnosis*</td>
              <td class="border" colspan="2">Anamnesa, Pemeriksaan fisik, USG</td>
              <td class="border text-center"><?= isset($notes_169['paraf_dasar_diagnosis']) ? ($notes_169['paraf_dasar_diagnosis'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">3. </td>
              <td class="border" colspan="2">Tindakan Kedokteran*</td>
              <td class="border" colspan="2">Kuretase</td>
              <td class="border text-center"><?= isset($notes_169['paraf_tindakan_kedokteran']) ? ($notes_169['paraf_tindakan_kedokteran'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">4. </td>
              <td class="border" colspan="2">Indikasi Tindakan*</td>
              <td class="border" colspan="2">Pemotongan saluran Indung telur</td>
              <td class="border text-center"><?= isset($notes_169['paraf_indikasi_tindakan']) ? ($notes_169['paraf_indikasi_tindakan'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">5. </td>
              <td class="border" colspan="2">Tata Cara*</td>
              <td class="border" colspan="2">
                <ul>
                  <li>Bius : diberi obat sedative (obat penenang)</li>
                  <li>Posisi : litotomi</li>
                  <li>Pembukaan vagina dengan menggunakan speculum</li>
                  <li>Dilatasi : proses pelebaran leher rahim</li>
                  <li>Kuretase</li>
                </ul>
              </td>
              <td class="border text-center"><?= isset($notes_169['paraf_tatacara']) ? ($notes_169['paraf_tatacara'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">6. </td>
              <td class="border" colspan="2">Tujuan*</td>
              <td class="border" colspan="2">Membuang jaringan abnormal yaitu sisa jaringan plasenta dan jaringan yang sudah mengalami keguguran</td>
              <td class="border text-center"><?= isset($notes_169['paraf_tujuan']) ? ($notes_169['paraf_tujuan'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">7. </td>
              <td class="border" colspan="2">Resiko*/ Komplikasi</td>
              <td class="border" colspan="2">
                <ul>
                  <li>Pendarahan</li>
                  <li>Infeksi</li>
                  <li>Kram perut pada bagian bawah</li>
                  <li>Kelainan posisi rahim</li>
                </ul>
              </td>
              <td class="border text-center"><?= isset($notes_169['paraf_resiko']) ? ($notes_169['paraf_resiko'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">8. </td>
              <td class="border" colspan="2">Prognosis*</td>
              <td class="border" colspan="2">Baik</td>
              <td class="border text-center"><?= isset($notes_169['paraf_resiko_komplikasi']) ? ($notes_169['paraf_resiko_komplikasi'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">9. </td>
              <td class="border" colspan="2">Alternatif*</td>
              <td class="border" colspan="2"><?= isset($notes_169['alternatif']) ? $notes_169['alternatif'] : ''; ?></td>
              <td class="border text-center"><?= isset($notes_169['paraf_alternatif']) ? ($notes_169['paraf_alternatif'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
              <td class="border text-center">10. </td>
              <td class="border" colspan="2">Lain-lain*</td>
              <td class="border" colspan="2"><?= isset($notes_169['lain_lain']) ? $notes_169['lain_lain'] : ''; ?></td>
              <td class="border text-center"><?= isset($notes_169['paraf_lain_lain']) ? ($notes_169['paraf_lain_lain'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border" colspan="5">Dengan ini menyatakan bahwa saya Dokter <?= $hrd['nama']; ?> telah menerangkan hal-hal di atas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan /  atau berdiskusi.</td>
                <td class="border" colspan="1"><img src="<?= $hrd['ttd']; ?>" width="100px"> </td>
            </tr>
            <tr>
                <td class="border" colspan="5">Dengan ini menyatakan bahwa saya/ keluarga pasien <b><?= isset($notes_169['nama_pemberi_pernyataan']) ? nl2br($notes_169['nama_pemberi_pernyataan']) : ''; ?></b> menerima informasi sebagai mana yang di atas saya beri tanda / paraf di kolom kanannya serta diberi kesempatan untuk bertanya/ berdiskusi, dan telah memahaminya.</td>
                <td class="border" colspan="1"><img src="<?= isset($notes_169['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_169['ttd_pasien']) : ''; ?>" width="100px"> </td>
            </tr>
            <tr>
                <td class="border" colspan="6">Keterangan : Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali atau keluarganya</td>
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

