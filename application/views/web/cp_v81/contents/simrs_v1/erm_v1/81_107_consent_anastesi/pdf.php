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
        .grey {
            background-color: #f2f2f2;
        }
        .text-justify {
            text-align: justify;
        }
    </style>
</head>
<body>
  <?php 
    if (!empty($notes)) {
      $notes = $notes[0];
      $notes_107 = $notes['json_data']['notes'];
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
                    <td colspan="3">
                        &nbsp;
                    </td>
                    <td colspan="1" class="border-left border-top">
                        Nama
                    </td>
                    <td colspan="2" class="border-right border-top">
                        : <?= nl2br($reg['nama_pasien']) ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <h2><?= $form['kode_form'] ?> - <?= $form['nama_form'] ?></h2>
                    </td>
                    <<td colspan="1" class="border-left">
                        Tgl. Lahir
                    </td>
                    <td colspan="2" class="border-right">
                        : <?= nl2br($reg['tanggal_lahir']) ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        &nbsp;
                    </td>
                    <<td colspan="1" class="border-left border-bottom">
                        No. RM
                    </td>
                    <td colspan="2" class="border-right border-bottom">
                        : <?= nl2br($reg['no_rm']) ?>
                    </td>
                </tr>
            </thead>
        </table>
        
        <table border="0" cellpadding="2" width="90%" class="table center text-justify">
            <tbody>
                
                <tr>
                    <td colspan="6">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saya, <?= nl2br($reg['nama_pasien']) ?> yang bertanda tangan di bawah ini telah mengerti penjelasan dokter bahwa saya akan menjalani tindakan operasi atau tindakan lain yang berhubungan dengan pengobatan yang memerlukan pembiusan. Dokter telah menjelaskan semua risiko dari tindakan pembiusan yang akan saya jalani dan juga telah menyarankan alternatif teknik pembiusan yang lain bilamana diperlukan, serta telah menjelaskan akibat yang akan terjadi bila tindakan ini tidak dilakukan. Saya setuju untuk dilakukan tindakan pemblusan agar tindakan operasi atau tindakan lain yang telah dijelaskan oleh dokter dapat dijalankan pada diri saya.  
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saya telah dijelaskan semua jenis teknik pembiusan yang akan dilakukan kepada saya termasuk segala risikonya, serta tidak ada jaminan maupun janji bahwa tindakan tersebut akan berhasil sesuai dengan yang diharapkan. Meskipun jarang, komplikasi tidak terduga dari pembiusan dapat terjadi seperti infeksi, perdarahan, reaksi obat, alergi, sumbatan pada pembuluh darah, hilangnya sensasi dan fungsi gerak anggota tubuh, kelumpuhan, stroke, kerusakan otak, serangan jantung dan bahkan kematian.  
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saya telah dijelaskan dan mengerti bahwa semua risiko akibat pembiusan ini dapat juga disebabkan oleh faktor-faktor lain seperti kondisi fisik, jenis tindakan operasi atau tindakan lain yang telah disetujui oleh dokter maupun pihak saya.  
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saya telah menerima penjelasan bahwa terkadang pembiusan dengan lokal anestesi dengan atau tanpa sedasi dapat gagal, sehingga diperlukan teknik pembiusan yang lain termasuk pembiusan umum.  
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" rowspan="4">
                        <input type="checkbox"> <?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "Pembiusan Umum" ? '<b>Pembiusan Umum</b>' : 'Pembiusan Umum' ): ''; ?>
                    </td>
                    <td class="border" width="10%">
                        Akibat
                    </td>
                    <td colspan="4" class="border">
                        Kesadaran menurun, penempatan pipa nafas pada saluran napas (endotracheal tube)
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Teknik
                    </td>
                    <td colspan="4" class="border">
                        Obat dimasukan dalam pembuluh darah, dihirup lewat paru, atau diberikan melalui jalur lain
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Resiko
                    </td>
                    <td colspan="4" class="border">
                        Nyeri mulut atau tenggorokan, suara serak, cedera pada mulut dan gelligi, sadar sewaktu pembiusan, cedera pada pembuluhdarah, aspirasi, pneumonia.
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Keuntungan
                    </td>
                    <td colspan="4" class="border">
                        Tidak merasa nyeri, respons stress yang menurun, proteksi jalan napasdengan pipa endotrakeal
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" rowspan="4">
                        <input type="checkbox"><?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "Spinal atau Epidurai Analgesi/Anestesi" ? '<b>Spinal atau Epidurai Analgesi/Anestesi</b>' : 'Spinal atau Epidurai Analgesi/Anestesi' ): ''; ?>  <br>
                        &nbsp;&nbsp;&nbsp;<input type="checkbox"> <?= isset($notes_107['jenis_hipnotik_pasien']) ? ($notes_107['jenis_hipnotik_pasien'] == "sedasi" ? '<b>dengan sedasi</b>' : 'dengan sedasi' ): ''; ?> <br>
                        &nbsp;&nbsp;&nbsp;<input type="checkbox"> <?= isset($notes_107['jenis_hipnotik_pasien']) ? ($notes_107['jenis_hipnotik_pasien'] == "tanpa_sedasi" ? '<b>tanpa sedasi</b>' : 'tanpa sedasi' ): ''; ?> <br>
                    </td>
                    <td class="border" width="10%">
                        Akibat
                    </td>
                    <td colspan="4" class="border">
                        penurunan sensasidan gerak pada anggota gerak bagian bawah sementara
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Teknik
                    </td>
                    <td colspan="4" class="border">
                        Obat diberikan melalui jarum atau kateter yang ditempatkan ruang spinal maupun epidural
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Resiko
                    </td>
                    <td colspan="4" class="border">
                        Nyeri kepala, punggung, telinga berdenging, kejang, infeksi, lemas yang menetap, rasa baal, nyeri yang menetap, cedera pembulih darah, total spinal
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Keuntungan
                    </td>
                    <td colspan="4" class="border">
                        Tidak merasakan nyeri, diatasi pembuluh darah perifer dengan penurunan insiden trombosis vena, menjaga nafas spontan, kesadaran tidak terganggu, dapat berkomunikasi dengan staff anestesi dan bedah
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" rowspan="4">
                        <input type="checkbox"><?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "Never Block" ? '<b>Never Block</b>' : 'Never Block' ): ''; ?>  <br> <br>
                        &nbsp;&nbsp;&nbsp;<input type="checkbox"> <?= isset($notes_107['jenis_hipnotik_pasien']) ? ($notes_107['jenis_hipnotik_pasien'] == "sedasi" ? '<b>dengan sedasi</b>' : 'dengan sedasi' ): ''; ?> <br>
                        &nbsp;&nbsp;&nbsp;<input type="checkbox"> <?= isset($notes_107['jenis_hipnotik_pasien']) ? ($notes_107['jenis_hipnotik_pasien'] == "tanpa_sedasi" ? '<b>tanpa sedasi</b>' : 'tanpa sedasi' ): ''; ?> <br>
                    </td>
                    <td class="border" width="10%">
                        Akibat
                    </td>
                    <td colspan="4" class="border">
                        Hilangnya sensasi atau kemampuan untuk menggerakan anggota gerak tubuh yang di anestesi
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Teknik
                    </td>
                    <td colspan="4" class="border">
                        Obat diinjeksi salam vena tangan atau kaki bersamaan dengan  pemasangan tourniquet
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Resiko
                    </td>
                    <td colspan="4" class="border">
                        Infeksi, kejang, lemas, rasa baal yang menetap, nyeri  berkepanjangan pada lokasi  blok, cedera pada pembuluh darah.
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Keuntungan
                    </td>
                    <td colspan="4" class="border">
                        Bangun dan sadar akan lingkungan, bernafas secara spontan, hilangnya sensasi pada lokasi yang terkena blok, dapat berkomunikasi dengan staff anestesi dan bedah
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" rowspan="4">
                        <input type="checkbox"><?= isset($notes_107['teknik_pembiusan_pasien']) ? ($notes_107['teknik_pembiusan_pasien'] == "Monitoring Anesthesia Care (MAC)" ? '<b>Monitoring Anesthesia Care (MAC)</b>' : 'Monitoring Anesthesia Care (MAC)' ): ''; ?>  <br> <br>
                    </td>
                    <td class="border" width="10%">
                        Akibat
                    </td>
                    <td colspan="4" class="border">
                        Rasa cemas dan nyeri yang berkurang, amnesia parsial atau total
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Teknik
                    </td>
                    <td colspan="4" class="border">
                        Dilakukan pembiusan hanya bila tindakan tidak dapat ditoleransi oleh pasien
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Resiko
                    </td>
                    <td colspan="4" class="border">
                        Kesadaran terjaga sehingga dapat menimbulkan rasa cemas dan tidak nyaman 
                    </td>
                </tr>
                <tr class="border">
                    <td class="border" width="10%">
                        Keuntungan
                    </td>
                    <td colspan="4" class="border">
                        Bangun dan sadar akan lingkungan, bernafas secara spontan, dapat berkomunikasi dengan staff anestesi dan bedah
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan ini, saya memberikan persetujuan atas tindakan pemblusan yang akan dilakukan kepada dokter ahli anestesi, dr. <?= isset($notes_107['dokter_anestesi_pasien']) ? $notes_107['dokter_anestesi_pasien'] : ''; ?> ataupun rekannya yang mempunyai ijin yang diakui oleh pemerintah dan rumah sakit ini. Saya juga memberikan persetujuan untuk dilakukan teknik pembiusan yang lain bila diperlukan.  
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saya menyatakan bahwa saya mengerti isi dari surat persetujuan ini. Saya telah mengetahui semua risiko, tindakan alternatif pembiusan dan hasil yang diharapkan dari tindakan pembiusan ini dan saya telah mendapat waktu yang cukup untuk mendengar dan bertanya.  
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
                    <td colspan="2" align="center"><?= $clinic['area'] ?>, <?= date('d-m-Y', strtotime($notes['created_date'])) ?></td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Tanda tangan Pasien</td>
                    <td colspan="2" align="center">Tanda tangan wakil/wali</td>
                    <td colspan="2" align="center">Tanda tangan dokter</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <img src="<?= isset($notes_107['ttd_pasien']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_107['ttd_pasien']) : ''; ?>" width="100px">                    
                    </td>
                    <td colspan="2" align="center">
                        <img src="<?= isset($notes_107['ttd_pemberi_pernyataan']) ? str_replace('[removed]', 'data:image/png;base64,', $notes_107['ttd_pemberi_pernyataan']) : ''; ?>" width="100px">                    
                    </td>
                    <td colspan="2" align="center">
                        <img src="<?= $hrd['ttd']; ?>" width="100px">                    
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <span>(<?= $reg['nama_pasien'] ?>)</span>
                    </td>
                    <td colspan="2" align="center">
                        <span>(<?= isset($notes_107['nama_pemberi_pernyataan']) ? nl2br($notes_107['nama_pemberi_pernyataan']) : ''; ?>)</span>
                    </td>
                    <td colspan="2" align="center">
                        <span>(<?= $hrd['nama']; ?>)</span>
                    </td>
                </tr>

                <tr>
                    <td colspan="6">&nbsp;</td>
                </tr>

                <?php if(count($notes_107['ttd_saksi']) !=0) { ?>
                    <tr>
                        <?php for ($i=0; $i < count($notes_107['ttd_saksi']); $i++) : ?>
                            <td colspan="2" align="center">Tanda tangan saksi <?= $i+1; ?></td>
                        <?php endfor; ?>
                    </tr>
                    <tr>
                        <?php for ($i=0; $i < count($notes_107['ttd_saksi']); $i++) : ?>
                            <td colspan="2" align="center">
                                <img src="<?= isset($notes_107['ttd_saksi'][$i]) ? str_replace('[removed]', 'data:image/png;base64,', $notes_107['ttd_saksi'][$i]) : ''; ?>" width="100px">                    
                            </td>
                        <?php endfor; ?>    
                    </tr>
                    <tr>
                        <?php for ($i=0; $i < count($notes_107['ttd_saksi']); $i++) : ?>
                            <td colspan="2" align="center"><span>(Saksi)</span> <?= $i+1; ?></td>
                        <?php endfor; ?>
                    </tr>
                <?php } ?>

                
                
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

