<?php defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
use chriskacerguis\RestServer\RestController;

class M_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function do_login($params)
  {
    // Cari username nya ada ato tidak
    $this->db->select('
      a.*,
      b.full_name nama,
      "Asia/Jakarta" timezone,
      "D" role,
    ');
    $this->db->from('hr a');
    $this->db->join('users_profile b', 'a.no_rm = b.no_rm');
    $this->db->where('a.username', $params['username']);
    $user = $this->db->get()->row_array();

    // jika tidak ada, tolak saja loginnya
    if (empty($user)) {
      $response['status'] = 400;
      $response['message'] = 'Username / password tidak cocok!';
      return $response;
    }

    // jika ada usernya check apakah password cocok ato tidak
    if (!password_verify($params['password'], $user['pin'])) {
      $response['status'] = 400;
      $response['message'] = 'Username / password tidak cocok!';
      return $response;
    }

    // jika ada baru kasih akses
    $date      = new DateTime();
    $timetamp  = $date->getTimestamp();
    $jti       = $user['no_rm'] . '-' . $timetamp;
    $date->setTimestamp($timetamp);
    $login     = $date->format("Y-m-d H:i:s");
    $landing_page = "dashboard";

    $res['status']  = 200;
    $res['message']  = 'Berhasil login';

    $exp = empty($params['session_timeout']) ? $timetamp + (60 * 60 * 4) : $timetamp + ($params['session_timeout'] * 60);
    $duration = empty($params['session_timeout']) ? (60 * 60 * 4) : ($params['session_timeout'] * 60);
    $data_token = [
      'nama'                  => $user['nama'],
      'rm_number'             => $user['no_rm'],
      "ip_address"            => getHostByName(getHostName()),
      "access"                => "user",
      "timezone"              => $user['timezone'],
      "role"                  => $user['role'],
      "landing_page"          => $landing_page,
      "iat"                   => $timetamp,
      "exp"                   => $exp,
      "jti"                   => $jti,
    ];

    $res['data']['data_token'] = $data_token;
    $res['data']['token'] = JWT::encode($data_token, $this->config->item('encryption_key_jwt'), 'HS256');
    $res['data']['rs'] = [
      'rs_name'   => 'SIMRS DEMO',
      "timezone"  => $user['timezone'],
    ];
    $res['data']['data_session'] = [
      'nama'                  => $user['nama'],
      'rm_number'             => $user['no_rm'],
      "timezone"              => $user['timezone'],
      "role"                  => $user['role'],
      "exp"                   => $exp,
      "duration"              => $duration,
      "is_ranap"              => true,
      "is_rajal"              => true,
      "redirect"  => str_replace('cp_v', '', $params['username']) . '_home',
    ];

    $res['data']['data_session']['list_dept'] = [
      'rajal' => [
        [
          'id_dept' => 130,
          'nama_dept' => 'Poli Penyakit Dalam',
          'prefix_dept_group' => 'A'
        ],
        [
          'id_dept' => 131,
          'nama_dept' => 'Poli Mata',
          'prefix_dept_group' => 'A'
        ]
      ],
      'ranap' => [
        [
          'id_dept' => 211,
          'nama_dept' => 'Ruang Rawat Mawar Kelas 3',
          'prefix_dept_group' => 'B'
        ],
      ],
    ];
    return $res;
  }

  public function check_token($token = null)
  {
    try {
      JWT::$leeway = 0;
      $decode = JWT::decode($token, new Key($this->config->item('encryption_key_jwt'), 'HS256'));
      $res = array(
        'status'  => 202,
        'message' => 'Token masih berlaku',
        'data'    => (array) $decode
      );
      return $res;
    } catch (\Exception  $e) {
      $res = array(
        'status'  => 401,
        'message' => 'Token tidak berlaku, Silahkan login'
      );
      return $res;
    }
  }
}
