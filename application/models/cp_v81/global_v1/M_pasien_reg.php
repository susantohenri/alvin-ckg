<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pasien_reg extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function get($params = null)
  {
    $this->db->select('
      a.no_rm,
      a.id id_reg,
      a.no_reg,
      a.nama_pasien,
      a.no_rm_dpjp no_rm_dpjp,
      c.full_name nama_dpjp,
      IF(b.gender = 1, "Laki-laki", "Perempuan") kelamin,
      a.umur,
      b.dob tanggal_lahir,
      b.pob tempat_lahir,
      a.umur,
      a.alamat,
      a.alamat2,
      a.mobile_phone,
      a.ruang_rawat,
      b.bpjs_id no_bpjs,
      b.number_id no_ktp,
      b.honorifics,
      b.blood_type golongan_darah,
      b.occupation pekerjaan,
      a.checkin_time tanggal_checkin,
      a.checkout_time tanggal_checkout,
    ');

    $this->db->from('pasien_registrasi a');
    $this->db->join('users_profile b', 'a.no_rm = b.no_rm');
    $this->db->join('users_profile c', 'a.no_rm_dpjp = c.no_rm');
    // $this->db->join('pasien_visit c', 'a.id = c.id_pasien_registrasi');

    $this->db->where('a.del_date', null);

    if (!empty($params['id_reg'])) {
      $this->db->where('a.id', $params['id_reg']);
    }

    if (!empty($params['no_rm'])) {
      $this->db->where('a.no_rm', $params['no_rm']);
    }

    if (!isset($params['offset'])) {
      $params['offset'] = '0';
    }

    if (!empty($params['limit'])) {
      $this->db->limit($params['limit'], $params['offset']);
    }

    if (!empty($params['column_order'])) {
      $this->_get_datatables_query($params);
    }

    return $this->db->get()->result_array();
  }

  public function get_all()
  {
    $this->db->select('
      a.no_rm,
      a.id id_reg,
      a.no_reg,
      a.nama_pasien,
      a.no_rm_dpjp no_rm_dpjp,
      c.full_name nama_dpjp,
      IF(b.gender = 1, "Laki-laki", "Perempuan") kelamin,
      a.umur,
      b.dob tanggal_lahir,
      b.pob tempat_lahir,
      a.umur,
      a.alamat,
      a.alamat2,
      a.mobile_phone,
      b.bpjs_id no_bpjs,
      b.number_id no_ktp,
      b.honorifics,
      b.blood_type golongan_darah,
      b.occupation pekerjaan,
      a.checkin_time tanggal_checkin,
      a.checkout_time tanggal_checkout,
    ');

    $this->db->from('pasien_registrasi a');
    $this->db->join('users_profile b', 'a.no_rm = b.no_rm');
    $this->db->join('users_profile c', 'a.no_rm_dpjp = c.no_rm');

    return $this->db->get()->result_array();
  }

  public function get_serverside($params)
  {
    if (empty($params['column_search'])) {
      $params['column_search'] = [
        'a.nama_pasien',
        'b.no_rm',
        'a.no_reg',
        'a.ruang_rawat',
        'a.nama_penjamin',
        'a.no_sep',
        'a.nama_dpjp_dokter',
        'a.jenis_rawat',
        'a.umur',
        'b.dob',
        'a.checkin_time',
        'a.checkin_petugas',
        'a.checkout_time',
        'a.checkout_petugas',
        'a.alamat',
        'a.alamat2',
      ];
    }

    if (empty($params['column_order'])) {
      $params['column_order'] = [
        'nama_pasien',
        'no_rm',
        'no_reg',
        'ruang_rawat',
        'nama_penjamin',
        'no_sep',
        'nama_dpjp',
        'pasien_lama_baru',
        'jenis_rawat',
        'kelamin',
        'umur',
        'tanggal_lahir',
        'tanggal_checkin',
        'nama_petugas_checkin',
        'tanggal_checkout',
        'nama_petugas_checkout',
        'alamat1',
        'alamat2',
        'durasi_kunjungan',
      ];
    }

    $params['order'] = array('a.checkin_time' => 'ASC');

    $result = $this->get($params);

    return [
      'result'        => $result,
      'record_total'  => $this->_get_total($params),
      'record_filter' => $this->_get_filter($params),
    ];
  }

  private function _get_datatables_query($filter)
  {
    $i = 0;

    if (!empty($filter['search'])) {
      $this->db->group_start();
      foreach ($filter['column_search'] as $item) {
        if (!empty($item)) {
          if ($i == 0) {
            $this->db->like($item, $filter['search']);
          } else {
            $this->db->or_like($item, $filter['search']);
          }
        }
        $i++;
      }
      $this->db->group_end();
    }

    if (isset($filter['order_column'])) {
      if ($filter['order_column'] == 0) {
        $column_order_ui = 0;
      } else {
        $column_order_ui = $filter['order_column'];
      }
    }

    if (isset($filter['order_column']) && !empty($filter['column_order'])) {
      $this->db->order_by($filter['column_order'][$column_order_ui], $filter['order_dir']);
    } else {
      $this->db->order_by(key($filter['order']), $filter['order'][key($filter['order'])]);
    }
  }

  private function _get_total($params = null)
  {
    $this->db->select('a.id');
    $this->db->from('pasien_registrasi a');
    $this->db->join('users_profile b', 'a.no_rm = b.no_rm');
    
    $this->db->where('a.del_date', null);

    if (!empty($params['id_reg'])) {
      $this->db->where('a.id', $params['id_reg']);
    }

    if (!empty($params['no_rm'])) {
      $this->db->where('a.no_rm', $params['no_rm']);
    }

    $this->db->group_by('a.id');

    return $this->db->get()->num_rows();
  }

  private function _get_filter($params = null)
  {
    $this->db->select('a.id');
    $this->db->from('pasien_registrasi a');
    $this->db->join('users_profile b', 'a.no_rm = b.no_rm');
    
    $this->db->where('a.del_date', null);

    if (!empty($params['id_reg'])) {
      $this->db->where('a.id', $params['id_reg']);
    }

    if (!empty($params['no_rm'])) {
      $this->db->where('a.no_rm', $params['no_rm']);
    }
    
    $this->db->group_by('a.id');

    unset($params['column_order']);
    $this->_get_datatables_query($params);

    return $this->db->get()->num_rows();
  }
}

/* End of file M_pasien_reg.php */
