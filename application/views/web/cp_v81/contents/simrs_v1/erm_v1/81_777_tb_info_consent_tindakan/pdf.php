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
      $notes_777 = $notes['json_data']['notes'];
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
                    <td class="border" colspan="3" ><?= $hrd['nama']; ?></td>  
                </tr>
                <tr>
                    <td class="border" colspan="3" width="200px">Pemberi Informasi</td>  
                    <td class="border" colspan="3" ><?= $hrd['nama']; ?></td>  
                </tr>
                <tr>
                    <td class="border" colspan="3" width="200px">Penerima Informasi / Pemberi Persetujuan</td>  
                    <td class="border" colspan="3" ><?= isset($notes_777['nama_pemberi_pernyataan']) ? $notes_777['nama_pemberi_pernyataan'] : ''; ?></td>  
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
              <td class="border" colspan="2">Diagnosa</td>
              <td class="border" colspan="2">TB Paru <b>Anak / Dewasa, Terkonfirmasi Bakteriologis / Klinis / TB Ekstra paru *</b></td>
              <td class="border text-center"><?= isset($notes_777['paraf_diagnosis']) ? ($notes_777['paraf_diagnosis'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center" width="30px center">2. </td>
                <td class="border" colspan="2">Dasar Diagnosa</td>
                <td class="border" colspan="2">Anamnesa, Pemeriksaan Klinis, Penunjang (BTA/TCM/Rontgen/PA)</td>
                <td class="border text-center"><?= isset($notes_777['paraf_dasar_diagnosis']) ? ($notes_777['paraf_dasar_diagnosis'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center" width="30px center">3. </td>
                <td class="border" colspan="2">Tindakan Kedokteran</td>
                <td class="border" colspan="2">Pemberian OAT <b>Kategori Anak / Kat. 1/ Kat. 2*</b></td>
                <td class="border text-center"><?= isset($notes_777['paraf_tindakan_kedokteran']) ? ($notes_777['paraf_tindakan_kedokteran'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center" width="30px center">4. </td>
                <td class="border" colspan="2">Indikasi Tindakan</td>
                <td class="border" colspan="2">Pemotongan saluran Indung telur</td>
                <td class="border text-center"><?= isset($notes_777['paraf_indikasi_tindakan']) ? ($notes_777['paraf_indikasi_tindakan'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center" width="30px center">5. </td>
                <td class="border" colspan="2">Tata Cara</td>
                <td class="border" colspan="2">Sesuai SOP Pengobatan Tuberkolosis Anak/Dewasa</td>
                <td class="border text-center"><?= isset($notes_777['paraf_tatacara']) ? ($notes_777['paraf_tatacara'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center" width="30px center">6. </td>
                <td class="border" colspan="2">Tujuan</td>
                <td class="border" colspan="2">
                    <ul>
                    <li>Menyembuhkan, mengembalikan kualitas hidup dan produktivitas pasien</li>
                    <li>Mencegah kematian akibat TBC</li>
                    <li>Mencegah kekambuhan TB</li>
                    <li>Mengurangi penularan TB kepada orang lain</li>
                    <li>Mencegah terjadinya resistensi obat dan penularan</li>
                    </ul>
                </td>
                <td class="border text-center"><?= isset($notes_777['paraf_tujuan']) ? ($notes_777['paraf_tujuan'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center" width="30px center">7. </td>
                <td class="border" colspan="2">Resiko</td>
                <td class="border" colspan="2">Kuman kebal obat jika pasien tidak patuh minum obat</td>
                <td class="border text-center"><?= isset($notes_777['paraf_resiko']) ? ($notes_777['paraf_resiko'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center">8. </td>
                <td class="border" colspan="2">Komplikasi</td>
                <td class="border" colspan="2">
                    Efek samping obat yang bisa terjadi seperti : mual, muntah, nyeri sendi, gatal-gatal, warna kemerahan pada air kencing, gangguan pencernaan, pusing.
                </td>
                <td class="border text-center"><?= isset($notes_777['paraf_komplikasi']) ? ($notes_777['paraf_komplikasi'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center">9. </td>
                <td class="border" colspan="2">Prognosis</td>
                <td class="border" colspan="2"><b>Bahan / Dubia ad bonam / Dubia ad malam*</b></td>
                <td class="border text-center"><?= isset($notes_777['paraf_resiko_prognosis']) ? ($notes_777['paraf_resiko_prognosis'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center">10. </td>
                <td class="border" colspan="2">Alternatif dan Resiko</td>
                <td class="border" colspan="2">
                    Bila tidak diobati prognosis makin memburuk dan dapat menularkan ke orang lain 
                </td>
                <td class="border text-center"><?= isset($notes_777['paraf_alternatif']) ? ($notes_777['paraf_alternatif'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border text-center">11. </td>
                <td class="border" colspan="2">Lain-lain</td>
                <td class="border" colspan="2">
                    <ul>
                    <li>Investigasi kontak akan dilakukan oleh petugas puskesmas atau kader TB wilayah setempat</li>
                    <li>Bila tidak mengembil obat dalam 2x24 jam bersedia untuk dilakukan kunjungan rumah / pelacakan</li>
                    </ul>
                </td>
                <td class="border text-center"><?= isset($notes_777['paraf_lain_lain']) ? ($notes_777['paraf_lain_lain'] == 'on' ? '<b>V</b>' : '') : ''; ?></td>
            </tr>
            <tr>
                <td class="border" colspan="5">Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jujur dan memberikan kesempatan untuk bertanya dan/berdiskusi</td>
                <td class="border" colspan="1"><img src="<?= $hrd['ttd']; ?>" width="100px"> </td>
            </tr>
            <tr>
                <td class="border" colspan="5">Dengan ini saya menyatakan bahwa saya telah menerima informasi sebagai mana di atas yang saya beri tanda/paraf kolom kanannya, dan telah memahaminya</td>
                <td class="border" colspan="1"><img src="<?= isset($notes_777['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_777['ttd_pasien']) : ''; ?>" width="100px"> </td>
            </tr>
            <tr>
                <td class="border" colspan="6">*Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali atau keluarga terdekat</td>
            </tr>
        </table>
        
        <table border="0" cellpadding="2" width="80%" class="table center">
            <tr>
                <td class="border text-center" colspan="6"><b>PERSETUJUAN TINDAKAN DOKTER</b></td>
            </tr>
            <tr>
                <td class="text-left border-left border-right" colspan="6">Yang bertandatangan dibawah ini:</td>
            </tr>
            <tr>
                <td class="text-left border-left border-right" colspan="6"> &nbsp;</td>
            </tr>
            <tr>
                <td class="border-left" width="100px">Nama</td>
                <td align="center" width="30px">:</td>
                <td class=""><?= isset($notes_777['nama_pemberi_pernyataan']) ? $notes_777['nama_pemberi_pernyataan'] : ''; ?></td>
                <td class="" width="100px">Umur</td>
                <td class="" align="center" width="30px">:</td>
                <td class="border-right"><?= isset($notes_777['umur_pemberi_pernyataan']) ? $notes_777['umur_pemberi_pernyataan'] : ''; ?></td>
            </tr>
            <tr>
                <td class="border-left" width="100px">Alamat</td>
                <td align="center" width="30px">:</td>
                <td class=""><?= isset($notes_777['alamat_pemberi_pernyataan']) ? ($notes_777['alamat_pemberi_pernyataan']) : ''; ?></td>
                <td class="" width="100px">No. Telpon</td>
                <td class="" align="center" width="30px">:</td>
                <td class="border-right"><?= isset($notes_777['telpon_pemberi_pernyataan']) ? $notes_777['telpon_pemberi_pernyataan'] : ''; ?></td>
            </tr>
            <tr>
                <td class="text-left border-left border-right" colspan="6"> &nbsp;</td>
            </tr>
            <tr>
                <td class="text-left border-left border-right" colspan="6">Dengan ini menyatakan persetujuan untuk dilakukannya tindakan pengobatan Tuberkulosis secara teratur sampai tuntas, terhadap <b><?= isset($notes_777['status_pemberi_pernyataan']) ? ($notes_777['status_pemberi_pernyataan']=="Pasien"? " diri saya sendiri</b>": $notes_777['status_pemberi_pernyataan'] . "</b> dari") : ''; ?></b> :</td>
            </tr>
            <tr>
                <td class="text-left border-left border-right" colspan="6"> &nbsp;</td>
            </tr>
            <tr>
                <td class="border-left" width="100px">Nama</td>
                <td align="center" width="30px">:</td>
                <td class=""><?= $reg['nama_pasien'] == null ? '' : nl2br($reg['nama_pasien']) ?></td>
                <td class="" width="100px">Umur</td>
                <td class="" align="center" width="30px">:</td>
                <td class="border-right"><?= $reg['umur'] == null ? '' : nl2br($reg['umur']) ?></td>
            </tr>
            <tr>
                <td class="border-left" width="100px">Alamat</td>
                <td align="center" width="30px">:</td>
                <td class=""><?= $reg['alamat'] == null ? '' : nl2br($reg['alamat']) ?></td>
                <td class="" width="100px">No. Telpon</td>
                <td class="" align="center" width="30px">:</td>
                <td class="border-right"><?= $reg['mobile_phone'] == null ? '' : nl2br($reg['mobile_phone']) ?></td>
            </tr>
            <tr>
                <td class="text-left border-left border-right" colspan="6"> &nbsp;</td>
            </tr>
            <tr>
                <td class="text-left border-left border-right border-bottom" colspan="6">
                Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan diatas kepada saya, termasuk risiko dan komplikasi yang mungkin timbul. Saya juga menyadari bahwa oleh karena Ilmu Kedokteran adalah bukan ilmu yang pasti, maka keberhasilan tindakan kedokteran adalah bukan keniscayaan, melainkan sangat bergantung kepada izin Tuhan Yang Maha Esa
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-left border-left" ><?= $clinic['area'] ?>, <?= date('d-m-Y', strtotime($notes['created_date'])) ?> Jam <?= date('H:s:i') ?></td>
                <td colspan="3" class="border-right">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" class="border-left" align="center">Yang menyatakan</td>
                <td colspan="2"  align="center">Saksi</td>
                <td colspan="2" class="border-right" align="center">DPJP</td>
            </tr>
            <tr>
                <td colspan="2" class="border-left" align="center">
                    <img src="<?= isset($notes_777['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_777['ttd_pasien']) : ''; ?>" width="100px">                    
                </td>
                <td colspan="2" align="center">
                    <img src="<?= isset($notes_777['ttd_saksi']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_777['ttd_saksi']) : ''; ?>" width="100px">                    
                </td>
                <td colspan="2" class="border-right" align="center">
                    <img src="<?= $hrd['ttd']; ?>" width="100px">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border-left border-bottom" align="center">
                    <span>(<?= isset($notes_777['nama_pemberi_pernyataan']) ? nl2br($notes_777['nama_pemberi_pernyataan']) : ''; ?>)</span>
                </td>
                <td colspan="2" class="border-bottom" align="center">
                    <span>(<?= isset($notes_777['nama_saksi']) ? nl2br($notes_777['nama_saksi']) : ''; ?>)</span>
                </td>
                <td colspan="2" class="border-right border-bottom" align="center">
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
        </table>

    </div>
</body>
</html>

