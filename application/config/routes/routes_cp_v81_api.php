<?php
defined('BASEPATH') or exit('No direct access');


$route['api/81_login'] = 'cp_v81/api/auth_v1/login_v1/C_login';
$route['api/81_login/(:any)'] = 'cp_v81/api/auth_v1/login_v1/C_login/$1';

$route['api/81_home'] = 'cp_v81/api/auth_v1/home_v1/C_81_home';
$route['api/81_home/(:any)'] = 'cp_v81/api/auth_v1/home_v1/C_81_home/$1';

$route['api/81_pasien_registrasi'] = 'cp_v81/api/simrs_v1/list_pasien_v1/C_pasien_registrasi_v1';
$route['api/81_pasien_registrasi/(:any)'] = 'cp_v81/api/simrs_v1/list_pasien_v1/C_pasien_registrasi_v1/$1';

$route['api/81_3070_consent_aps'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_3070_consent_aps';
$route['api/81_3070_consent_aps/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_3070_consent_aps/$1';

$route['api/81_test_erm'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_test_erm';
$route['api/81_test_erm/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_test_erm/$1';

$route['api/81_84_surat_pernyataan_bebas_alergi_obat'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_84_surat_pernyataan_bebas_alergi_obat';
$route['api/81_84_surat_pernyataan_bebas_alergi_obat/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_84_surat_pernyataan_bebas_alergi_obat/$1';

$route['api/81_104_consent_bayar_jaminan'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_104_consent_bayar_jaminan';
$route['api/81_104_consent_bayar_jaminan/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_104_consent_bayar_jaminan/$1';

$route['api/81_107_consent_anastesi'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_107_consent_anastesi';
$route['api/81_107_consent_anastesi/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_107_consent_anastesi/$1';

$route['api/81_108_surat_kembali_ke_ppk1'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_108_surat_kembali_ke_ppk1';
$route['api/81_108_surat_kembali_ke_ppk1/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_108_surat_kembali_ke_ppk1/$1';

$route['api/81_618_pos'] = 'cp_v81/api/simrs_v1/apotek_v1/C_81_618_pos';
$route['api/81_618_pos/(:any)'] = 'cp_v81/api/simrs_v1/apotek_v1/C_81_618_pos/$1';


$route['api/81_169_consent_kuretase'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_169_consent_kuretase';
$route['api/81_169_consent_kuretase/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_169_consent_kuretase/$1';

$route['api/81_41_edukasi_sc'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_41_edukasi_sc';
$route['api/81_41_edukasi_sc/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_41_edukasi_sc/$1';

$route['api/81_134_consent_op'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_134_consent_op';
$route['api/81_134_consent_op/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_134_consent_op/$1';

$route['api/81_138_consent_bius'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_138_consent_bius';
$route['api/81_138_consent_bius/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_138_consent_bius/$1';

$route['api/81_777_tb_info_consent_tindakan'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_777_tb_info_consent_tindakan';
$route['api/81_777_tb_info_consent_tindakan/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_777_tb_info_consent_tindakan/$1';

$route['api/81_118_consent_status_jasaraharja'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_118_consent_status_jasaraharja';
$route['api/81_118_consent_status_jasaraharja/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_118_consent_status_jasaraharja/$1';

$route['api/81_11_resume'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_11_resume';
$route['api/81_11_resume/(:any)'] = 'cp_v81/api/simrs_v1/erm_v1/C_81_11_resume/$1';
