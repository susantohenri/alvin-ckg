<?php
defined('BASEPATH') or exit('No direct access');

$route['81_login'] = 'cp_v81/mvc/auth_v1/login_v1/C_login_v1';
$route['81_login/(:any)'] = 'cp_v81/mvc/auth_v1/login_v1/C_login_v1/$1';
$route['81_login/(:any)/(:any)'] = 'cp_v81/mvc/auth_v1/login_v1/C_login_v1/$1/$2';

$route['81_home'] = 'cp_v81/mvc/auth_v1/home_v1/C_81_home';
$route['81_home/(:any)'] = 'cp_v81/mvc/auth_v1/home_v1/C_81_home/$1';
$route['81_home/(:any)/(:any)'] = 'cp_v81/mvc/auth_v1/home_v1/C_81_home/$1/$2';

$route['81_list_pasien_reg'] = 'cp_v81/mvc/simrs_v1/list_pasien_v1/C_pasien_registrasi_v1';
$route['81_list_pasien_reg/(:any)'] = 'cp_v81/mvc/simrs_v1/list_pasien_v1/C_pasien_registrasi_v1/$1';
$route['81_list_pasien_reg/(:any)/(:any)'] = 'cp_v81/mvc/simrs_v1/list_pasien_v1/C_pasien_registrasi_v1/$1/$2';

$route['81_erm_list'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_erm_list_v1';
$route['81_erm_list/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_erm_list_v1/index/$1';
$route['81_erm_list/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_erm_list_v1/$1/$2';

$route['81_3070_consent_aps'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_3070_consent_aps';
$route['81_3070_consent_aps/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_3070_consent_aps/index/$1';
$route['81_3070_consent_aps/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_3070_consent_aps/$1/$2';

$route['81_test_erm'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_test_erm';
$route['81_test_erm/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_test_erm/index/$1';
$route['81_test_erm/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_test_erm/$1/$2';

$route['81_84_surat_pernyataan_bebas_alergi_obat'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_84_surat_pernyataan_bebas_alergi_obat';
$route['81_84_surat_pernyataan_bebas_alergi_obat/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_84_surat_pernyataan_bebas_alergi_obat/index/$1';
$route['81_84_surat_pernyataan_bebas_alergi_obat/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_84_surat_pernyataan_bebas_alergi_obat/$1/$2';

$route['81_104_consent_bayar_jaminan'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_104_consent_bayar_jaminan';
$route['81_104_consent_bayar_jaminan/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_104_consent_bayar_jaminan/index/$1';
$route['81_104_consent_bayar_jaminan/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_104_consent_bayar_jaminan/$1/$2';

$route['81_107_consent_anastesi'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_107_consent_anastesi';
$route['81_107_consent_anastesi/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_107_consent_anastesi/index/$1';
$route['81_107_consent_anastesi/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_107_consent_anastesi/$1/$2';

$route['81_108_surat_kembali_ke_ppk1'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_108_surat_kembali_ke_ppk1';
$route['81_108_surat_kembali_ke_ppk1/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_108_surat_kembali_ke_ppk1/index/$1';
$route['81_108_surat_kembali_ke_ppk1/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_108_surat_kembali_ke_ppk1/$1/$2';

$route['81_618_pos'] = 'cp_v81/mvc/simrs_v1/apotek_v1/C_81_618_pos';
$route['81_618_pos/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/apotek_v1/C_81_618_pos/index/$1';
$route['81_618_pos/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/apotek_v1/C_81_618_pos/$1/$2';

$route['81_169_consent_kuretase'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_169_consent_kuretase';
$route['81_169_consent_kuretase/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_169_consent_kuretase/index/$1';
$route['81_169_consent_kuretase/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_169_consent_kuretase/$1/$2';

$route['81_41_edukasi_sc'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_41_edukasi_sc';
$route['81_41_edukasi_sc/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_41_edukasi_sc/index/$1';
$route['81_41_edukasi_sc/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_41_edukasi_sc/$1/$2';

$route['81_134_consent_op'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_134_consent_op';
$route['81_134_consent_op/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_134_consent_op/index/$1';
$route['81_134_consent_op/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_134_consent_op/$1/$2';

$route['81_138_consent_bius'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_138_consent_bius';
$route['81_138_consent_bius/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_138_consent_bius/index/$1';
$route['81_138_consent_bius/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_138_consent_bius/$1/$2';

$route['81_777_tb_info_consent_tindakan'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_777_tb_info_consent_tindakan';
$route['81_777_tb_info_consent_tindakan/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_777_tb_info_consent_tindakan/index/$1';
$route['81_777_tb_info_consent_tindakan/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_777_tb_info_consent_tindakan/$1/$2';

$route['81_118_consent_status_jasaraharja'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_118_consent_status_jasaraharja';
$route['81_118_consent_status_jasaraharja/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_118_consent_status_jasaraharja/index/$1';
$route['81_118_consent_status_jasaraharja/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_118_consent_status_jasaraharja/$1/$2';

$route['81_11_resume'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_11_resume';
$route['81_11_resume/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_11_resume/index/$1';
$route['81_11_resume/(.*)/([0-9A-Fa-f]{108,})'] = 'cp_v81/mvc/simrs_v1/erm_v1/C_81_11_resume/$1/$2';
