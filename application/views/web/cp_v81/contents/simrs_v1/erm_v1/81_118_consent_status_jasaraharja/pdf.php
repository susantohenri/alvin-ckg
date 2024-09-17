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
      $notes_118 = $notes['json_data']['notes'];
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
                    <td colspan="6">Yang bertanda tangan dibawah ini:</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="30px" align="center">:</td>
                    <td colspan="4"><?= isset($notes_118['nama_pemberi_pernyataan']) ? nl2br($notes_118['nama_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="30px" align="center">:</td>
                    <td colspan="4"><?= isset($notes_118['alamat_pemberi_pernyataan']) ? nl2br($notes_118['alamat_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td>No. Tlp</td>
                    <td width="30px" align="center">:</td>
                    <td colspan="4"><?= isset($notes_118['telpon_pemberi_pernyataan']) ? nl2br($notes_118['telpon_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td>No. KTP</td>
                    <td width="30px" align="center">:</td>
                    <td colspan="4"><?= isset($notes_118['no_ktp_pemberi_pernyataan']) ? nl2br($notes_118['no_ktp_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                
                
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Selaku PENANGGUNG JAWAB PENUH terhadap PASIEN atas nama :
                </tr>
                <tr>
                    <td>Nama</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['nama_pasien']) ?></td>
                </tr>
                <tr>
                    <td align="left">
                        Alamat
                    </td>
                    <td align="center">:</td>
                    <td align="left">
                        <?= $reg['alamat']; ?>
                    </td>
                </tr>
                <tr>
                    <td>No. Tlp</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['mobile_phone']) ?></td>
                </tr>
                <tr>
                    <td>No. KTP</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['no_ktp']) ?></td>
                </tr>
                <tr>
                    <td>Dirawat di Kelas</td>
                    <td align="center">:</td>
                    <td><?= isset($reg['ruang_rawat']) ? $reg['ruang_rawat'] : ''; ?></td>
                    <td>No. MR</td>
                    <td align="center">:</td>
                    <td><?= nl2br($reg['no_rm']) ?></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Dengan ini menyatakan bahwa :</td>
                </tr>
                <tr>
                    <td colspan="6">
                        1. Nama tersebut di atas sebagai PASIEN JASA RAHARJA Kelas <?= isset($notes_118['ruang_rawat']) ? $notes_118['ruang_rawat'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        2. Apabila saat masak di Rawat Inap RS Karang Tengah Medika DIWAIBKAN untuk mengurus JASA RAHARIA dalam jangka waktu maksimal 2x24 jam
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        3. Apabila Poin nomor 2 kartu belum dapat digunakan, maka saya bersedia dan Bertanggung Jawab Penuh terhadap pasien tersebut sebagai PASIEN UMUM dan wajib saya melakukan pembayaran secara Tunai sesuai dengan tarif Umum di RS. Karang Tengah Medika sebelum pasien pulang
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        4. Saya bersedia mengikuti ketentuan dan peraturan Rumah sakit dengan niat baik dan berjanji tidak akan mempermasalahkan dikemudian hari
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        5. Apabila saya melanggar Poin 1 diatas, saya bersedia dikenakan sangsi sesuai ketentuan yang berlaku
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        Demikian Surat Pernyataan ini saya baca sejelas jelasnya tanpa ada unsur paksaan dari Pihak manapun juga pada saat saya menandatangani Surat Pernyataan ini. Atas Perhatianya saya ucapkan terima kasih
                    </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2" align="center"><?= $clinic['area'] ?>, <?= date('d-m-Y', strtotime($notes['created_date'])) ?></td>
                </tr>
            
                <tr>
                    <td colspan="4" align="center">
                        &nbsp;
                    </td>
                    
                    <td colspan="2" align="center">
                        <img src="<?= isset($notes_118['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_118['ttd_pasien']) : ''; ?>" width="100px">                    
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="center">
                    &nbsp;
                    </td>
                    <td colspan="2" align="center">
                        <span>(<?= isset($notes_118['nama_pemberi_pernyataan']) ? nl2br($notes_118['nama_pemberi_pernyataan']) : ''; ?>)</span>
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

