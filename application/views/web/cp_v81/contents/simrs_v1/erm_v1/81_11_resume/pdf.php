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
                    <td class="border-left border-top"><b>Nama</b></td>
                    <td class="border-top" align="center"><b>:</b></td>
                    <td class="border-top border-right" ><b><?= isset($reg['nama_pasien']) ? $reg['nama_pasien'] : ''; ?></b></td>
                    <td class="border-top" ><b>Umur</b></td>
                    <td class="border-top"  align="center"><b>:</b></td>
                    <td class="border-right border-top" ><b><?= isset($reg['umur']) ? $reg['umur'] : ''; ?></b></td>
                </tr>
                <tr>
                    <td class="border-left border-bottom"><b>No. BPJS</b></td>
                    <td class="border-bottom"  align="center"><b>:</b></td>
                    <td class="border-bottom border-right" ><b><?= isset($reg['no_bpjs']) ? $reg['no_bpjs'] : ''; ?></b></td>
                    <td class="border-bottom" ><b>Alamat</b></td>
                    <td class="border-bottom"  align="center"><b>:</b></td>
                    <td class="border-right border-bottom"><b><?= isset($reg['alamat']) ? $reg['alamat'] : ''; ?></b></td>
                </tr>                
            </tbody>
        </table>
        <table border="0" cellpadding="2" width="80%" class="table center">
            <tbody>
            <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','obat_terapi_pulang'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['obat_terapi_pulang'] == null ?'' : nl2br($resume['obat_terapi_pulang']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','keluhan_utama'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['keluhan_utama'] == null ?'' : nl2br($resume['keluhan_utama']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','keluhan'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['keluhan'] == null ?'' : nl2br($resume['keluhan']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','informasi_medis'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['informasi_medis'] == null ?'' : nl2br($resume['informasi_medis']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','ringkasan_riwayat_penyakit_dahulu'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['ringkasan_riwayat_penyakit_dahulu'] == null ?'' : nl2br($resume['ringkasan_riwayat_penyakit_dahulu']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','ringkasan_pengobatan'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['ringkasan_pengobatan'] == null ?'' : nl2br($resume['ringkasan_pengobatan']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','terapi_tindakan'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['terapi_tindakan'] == null ?'' : nl2br($resume['terapi_tindakan']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','diagnosa_kerja'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['diagnosa_kerja'] == null ?'' : nl2br($resume['diagnosa_kerja']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','diagnosa_banding'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['diagnosa_banding'] == null ?'' : nl2br($resume['diagnosa_banding']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','diagnosis_hispatologi'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['diagnosis_hispatologi'] == null ?'' : nl2br($resume['diagnosis_hispatologi']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','differensial_diagnosis'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['differensial_diagnosis'] == null ?'' : nl2br($resume['differensial_diagnosis']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','gangguan_medis'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['gangguan_medis'] == null ?'' : nl2br($resume['gangguan_medis']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','ringkasan_riwayat_penyakit'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['ringkasan_riwayat_penyakit'] == null ?'' : nl2br($resume['ringkasan_riwayat_penyakit']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','diagnosa_akhir'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['diagnosa_akhir'] == null ?'' : nl2br($resume['diagnosa_akhir']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','diagnosa_awal'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['diagnosa_awal'] == null ?'' : nl2br($resume['diagnosa_awal']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','diagnosa_awal'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['diagnosa_awal'] == null ?'' : nl2br($resume['diagnosa_awal']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kronologis'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kronologis'] == null ?'' : nl2br($resume['kronologis']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','pengkajian_fungsi'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['pengkajian_fungsi'] == null ?'' : nl2br($resume['pengkajian_fungsi']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','riwayat_operasi'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['riwayat_operasi'] == null ?'' : nl2br($resume['riwayat_operasi']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','riwayat_penyakit_keluarga'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['riwayat_penyakit_keluarga'] == null ?'' : nl2br($resume['riwayat_penyakit_keluarga']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','pemeriksaan_penunjang'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['pemeriksaan_penunjang'] == null ?'' : nl2br($resume['pemeriksaan_penunjang']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','pemeriksaan_penunjang_dahulu'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['pemeriksaan_penunjang_dahulu'] == null ?'' : nl2br($resume['pemeriksaan_penunjang_dahulu']); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','pemeriksaan_fisik'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['pemeriksaan_fisik'] == null ?'' : nl2br($resume['pemeriksaan_fisik']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','terapi_obat'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['terapi_obat'] == null ?'' : nl2br($resume['terapi_obat']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','terapi_non_obat'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['terapi_non_obat'] == null ?'' : nl2br($resume['terapi_non_obat']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','prognosa'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['prognosa'] == null ?'' : nl2br($resume['prognosa']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','instruksi_pulang'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['instruksi_pulang'] == null ?'' : nl2br($resume['instruksi_pulang']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','hasil_dibawa_pulang'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['hasil_dibawa_pulang'] == null ?'' : nl2br($resume['hasil_dibawa_pulang']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','informasi_tambahan'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['informasi_tambahan'] == null ?'' : nl2br($resume['informasi_tambahan']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kontrol_tgl'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kontrol_tgl'] == null ?'' : nl2br($resume['kontrol_tgl']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kontrol_terapi'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kontrol_terapi'] == null ?'' : nl2br($resume['kontrol_terapi']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kontrol_alasan'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kontrol_alasan'] == null ?'' : nl2br($resume['kontrol_alasan']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kontrol_rencana'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kontrol_rencana'] == null ?'' : nl2br($resume['kontrol_rencana']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kontrol_tindak_lanjut_tgl'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kontrol_tindak_lanjut_tgl'] == null ?'' : nl2br($resume['kontrol_tindak_lanjut_tgl']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kontrol_tindak_lanjut_konsul_spesialis_lain'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kontrol_tindak_lanjut_konsul_spesialis_lain'] == null ?'' : nl2br($resume['kontrol_tindak_lanjut_konsul_spesialis_lain']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kontrol_tindak_lanjut_lain_lain'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kontrol_tindak_lanjut_lain_lain'] == null ?'' : nl2br($resume['kontrol_tindak_lanjut_lain_lain']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','sebab_dirawat'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['sebab_dirawat'] == null ?'' : nl2br($resume['sebab_dirawat']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','sejarah_imunisasi'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['sejarah_imunisasi'] == null ?'' : nl2br($resume['sejarah_imunisasi']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','pengobatan_dan_tindakan'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['pengobatan_dan_tindakan'] == null ?'' : nl2br($resume['pengobatan_dan_tindakan']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','rekonsiliasi_obat'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['rekonsiliasi_obat'] == null ?'' : nl2br($resume['rekonsiliasi_obat']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','kontrol_poli'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['kontrol_poli'] == null ?'' : nl2br($resume['kontrol_poli']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','obat_pulang'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['obat_pulang'] == null ?'' : nl2br($resume['obat_pulang']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','discharge_planning'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['discharge_planning'] == null ?'' : nl2br($resume['discharge_planning']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top"><?= ucwords(str_replace('_',' ','rekomendasi_lanjutan'));?></td>
                    <td colspan="3" class="border-top border-right text-left" > : <?= $resume['rekomendasi_lanjutan'] == null ?'' : nl2br($resume['rekomendasi_lanjutan']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-top border-bottom"><?= ucwords(str_replace('_',' ','terapi'));?></td>
                    <td colspan="3" class="border-top border-bottom border-right text-left" > : <?= $resume['terapi'] == null ?'' : nl2br($resume['terapi']); ?></td>
                </tr>             
                <tr>
                    <td colspan="3" class="border-left border-bottom"><?= ucwords(str_replace('_',' ','diagnosa_akhir'));?></td>
                    <td colspan="3" class="border-bottom border-right text-left" > : <?= $resume['diagnosa_akhir'] == null ?'' : nl2br($resume['diagnosa_akhir']); ?></td>
                </tr>             
            </tbody>
        </table>
    </div>
</body>
</html>

