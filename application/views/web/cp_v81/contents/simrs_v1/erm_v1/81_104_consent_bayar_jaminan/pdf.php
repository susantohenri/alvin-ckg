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
      $notes_104 = $notes['json_data']['notes'];
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
                    <td colspan="6">Saya yang bertanda tangan dibawah ini:</td>
                </tr>
                <tr class="grey">
                    <td>Nama</td>
                    <td width="30px" align="center">:</td>
                    <td colspan="4"><?= isset($notes_104['nama_pemberi_pernyataan']) ? nl2br($notes_104['nama_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= isset($notes_104['alamat_pemberi_pernyataan']) ? nl2br($notes_104['alamat_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                <tr>
                    <td>No, Telp</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= isset($notes_104['telpon_pemberi_pernyataan']) ? nl2br($notes_104['telpon_pemberi_pernyataan']) : ''; ?></td>
                </tr>
                
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Hubungan dengan pasien : <b><?= isset($notes_104['telpon_pemberi_pernyataan']) ? ($notes_104['status_pemberi_pernyataan']=="Pasien"? " Diri sendiri</b>": $notes_104['status_pemberi_pernyataan'] . "</b> dari pasien ") : ''; ?> :</td>
                </tr>
                <tr class="grey">
                    <td>Nama</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['nama_pasien']) ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['alamat']) ?></td>
                </tr>
                <tr>
                    <td>No RM</td>
                    <td align="center">:</td>
                    <td colspan="4"><?= nl2br($reg['no_rm']) ?></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>  
                </tr>
                <tr>
                    <td colspan="6">Menyatakan bahwa saya setuju sebagai pasien dengan jaminan BPJS Kesehatan dengan syarat ketentuan sebagai berikut :</td>
                </tr>
                <tr>
                    <td colspan="6">
                        1. Pasien IGD dengan diagnosis akhir yang tidak masuk dalam kriteria <b>GAWAT DARURAT (<i>EMERGENCY</i>)</b> bersedia menjadi pasienAsuransi atau Umum.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        2. Penolakan rawat inap setelah sebelumnya menyatakan bersedia untuk di rawat, maka menjadi pasien Asuransi atau Umum.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        3. Nama tersebut diatas sebagai <b>PASIEN BPJS</b> dengan Nomer Kartu <?= isset($notes_104['no_bpjs_pasien']) ? nl2br($notes_104['no_bpjs_pasien']) : ''; ?>, Kelas <?= isset($notes_104['kelas_bpjs_pasien']) ? nl2br($notes_104['kelas_bpjs_pasien']) : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        4. Apabila kartu <b>JKN/KIS/BPJS TIDAK AKTIF</b> saat masuk di Rawat Inap <?= $clinic['clinic_name'] ?> <b>DIWAJIBKAN</b> untuk mengurus kartu dalam jangka <b>3x24 jam</b> atau sebelum pulang.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        5. Apabila kartu peserta dan syarat lainnya tidak dapat dipenuhi maka bersedia menjadi pasien asuransi atau umum sesuai tarif <?= $clinic['clinic_name'] ?>.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        6. Bersedia membayar selisih bayar yang tidak di tanggung / tidak dijaminkan.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        7. Untuk Bayi Baru Lahir yang kepesertaannya dari Pegawai Swasta dan PNS diwajibkan setelah lahiran untuk menggunakan BPJS bayinya dalam  3x24 jam, apabila selama waktu tersebut kartu masih belum dapat digunakan  kami bersedia melakukan pembayaran sesuai tarif umum <?= $clinic['clinic_name'] ?>.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        8. Pelayanan kesehatan untuk tujuan  estetika misalnya (ACNE, KAWAT GIGI, KELOID), tidak dijamin BPJS Kesehatan.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        9. Saya bersedia mengikuti Ketentuan dan peraturan Rumah Sakit dengan niat baik dan berjanji tidak akan mempersalahkan dikemudian hari.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        10. Apabila saya melanggar salah satu point di atas, saya bersedia dikenakan sanksi sesuai ketentuan berlaku.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat pernyataan ini telah saya setujui dan tandatangan dengan sebenar-benarnya tanpa ada paksaan dari pihak lain.
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="3" align="center"><?= $clinic['area'] ?>, <?= date('d-m-Y', strtotime($notes['created_date'])) ?></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">Petugas Rumah Sakit,</td>
                    <td colspan="3" align="center">Yang Membuat Pernyataan</td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <img src="<?= $session['ttd']; ?>" width="100px">
                    </td>
                    
                    <td colspan="3" align="center">
                        <img src="<?= isset($notes_104['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_104['ttd_pasien']) : ''; ?>" width="100px">                    
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <span>(<?= $session['nama'] ?>)</span>
                    </td>
                    <td colspan="3" align="center">
                        <span>(<?= isset($notes_104['nama_pemberi_pernyataan']) ? nl2br($notes_104['nama_pemberi_pernyataan']) : ''; ?>)</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">Addmission</td>
                    <td colspan="3" align="center">Pasien / Keluarga</td>
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

