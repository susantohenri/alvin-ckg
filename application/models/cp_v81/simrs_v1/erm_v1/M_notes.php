<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_notes extends CI_Model
{
  // Tambah notes baru
  public function tambah_notes($post)
  {
    if (empty($post['no_rm'])) {
      $res['status']     = 400;
      $res['message']    = "Mohon masukan NO RM.";

      return $res;
    }

    if (empty($post['id_pasien_registrasi'])) {
      $res['status']     = 400;
      $res['message']    = "Mohon masukan ID pasien registrasi.";

      return $res;
    }

    if (empty($post['id_ref_global_tipe_42'])) {
      $res['status']     = 400;
      $res['message']    = "Mohon masukan ID REF Global Tipe 42.";

      return $res;
    }

    if (!isset($post['notes'])) {
      $res['status']     = 400;
      $res['message']    = "Mohon masukan data NOTES / catatan.";

      return $res;
    }

    if (!empty($post['id_dokter_approve'])) {

      if (is_numeric($post['id_dokter_approve'])) {
        $data_dokter = $this->hrd->get_by_param(['no_rm' => $post['id_dokter_approve']])[0];
      } else {
        $data_dokter['nama'] = $post['id_dokter_approve'];
        $data_dokter['digital_signature'] = null;
      }
    } else {
      $data_dokter['nama'] = null;
      $data_dokter['digital_signature'] = null;
    }

    if (!empty($post['id_petugas_approve'])) {

      if (is_numeric($post['id_petugas_approve'])) {
        $data_perawat = $this->hrd->get_by_param(['no_rm' => $post['id_petugas_approve']]);

        if (empty($data_perawat)) {
          $data_perawat['nama'] = null;
          $data_perawat['digital_signature'] = null;
        } else {
          $data_perawat = $data_perawat[0];
        }
      } else {
        $data_perawat['nama'] = $post['id_petugas_approve'];
        $data_perawat['digital_signature'] = null;
      }
    } else {
      $data_perawat['nama'] = null;
      $data_perawat['digital_signature'] = null;
    }

    $data_input = [
      'id_petugas_approve'                        => isset($post['id_petugas_approve']) && $post['id_petugas_approve'] != null ? $post['id_petugas_approve'] : null,
      'id_dokter_approve'                         => isset($post['id_dokter_approve']) && $post['id_dokter_approve'] != null ? $post['id_dokter_approve'] : null,
      'approved_petugas'                          => $data_perawat['nama'],
      'approved_dokter'                           => $data_dokter['nama'],
      'digital_signature_approved_petugas'        => null,
      'digital_signature_approved_dokter'         => null,
      'approved_date_petugas'                     => isset($post['id_petugas_approve']) && $post['id_petugas_approve'] ? date('Y-m-d H:i:s') : null,
      'approved_date_dokter'                      => isset($post['id_dokter_approve']) && $post['id_dokter_approve'] ? date('Y-m-d H:i:s') : null,
      'created_date'                              => date('Y-m-d H:i:s'),
        //   'created_by'                             => !empty($this->data_session['nama']) ? $this->data_session['nama'] : 'SIMRS',
      'created_by'                                =>  isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS',
      'notes'                                     => $post['notes']
    ];
    array_filter($data_input);


    $data = [
      'id_pasien_registrasi'                      => $post['id_pasien_registrasi'],
      'id_pasien_visit'                           => !empty($post['id_pasien_visit']) ? $post['id_pasien_visit'] : null,
      'id_ref_global_tipe_42'                     => $post['id_ref_global_tipe_42'],
      'gizi_monitor'                              => !empty($post['gizi_monitor']) && $post['id_ref_global_tipe_42'] == 450 ? $post['gizi_monitor'] : null,
      'no_rm'                                     => $post['no_rm'], //$post['no_rm'],
      'created_date'                              => date('Y-m-d H:i:s'),
    //   'created_by'                                => !empty($this->data_session['nama']) ? $this->data_session['nama'] : 'SIMRS',
      'created_by'                                => isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS',
      'json_data'                                 => json_encode($data_input),
    ];

    $input = $this->add($data);

    if ($input) {
      $res['status']     = 200;
      $res['message']    = "Berhasil menambahkan data.";
      $res['data']       = [
        'id_notes' => $input
      ];
    } else {
      $res['status']     = 400;
      $res['message']    = "Gagal menambahkan data.";
      $res['data']       = [];
    }

    return $res;
  }

  // Edit notes
  public function edit_notes($put)
  {
    if (empty($put['id_notes'])) {
      $res['status']     = 400;
      $res['message']    = "Mohon sertakan ID Notes.";

      return $res;
    }

    if (!isset($put['notes'])) {
      $res['status']     = 400;
      $res['message']    = "Mohon masukan data NOTES / catatan.";

      return $res;
    }

    if (!empty($put['id_dokter_approve'])) {
      if (is_numeric($put['id_dokter_approve'])) {
        $data_dokter = $this->hrd->get_by_param(['no_rm' => $put['id_dokter_approve']])[0];
      } else {
        $data_dokter['nama'] = $put['id_dokter_approve'];
        $data_dokter['digital_signature'] = null;
      }
    } else {
      $data_dokter['nama'] = null;
      $data_dokter['digital_signature'] = null;
    }
    if (!empty($put['id_petugas_approve'])) {
      if (is_numeric($put['id_petugas_approve'])) {
        $data_perawat = $this->hrd->get_by_param(['no_rm' => $put['id_petugas_approve']]);

        if ($data_perawat) {
          $data_perawat = $data_perawat[0];
        } else {
          // get dari users profile
          $this->db->select('full_name nama,digital_signature');
          $this->db->from('users_profile');
          $this->db->where('no_rm', $put['id_petugas_approve']);
          $data_perawat = $this->db->get()->row_array();
        }
      } else {
        $data_perawat['nama'] = $put['id_petugas_approve'];
        $data_perawat['digital_signature'] = null;
      }
    } else {
      $data_perawat['nama'] = null;
      $data_perawat['digital_signature'] = null;
    }

    $id = $put['id_notes'];

    if (!empty($put['id_petugas_input'])) {

      if (is_numeric($put['id_petugas_input'])) {
        $data_petugas_delete = $this->hrd->get_by_param(['no_rm' => $put['id_petugas_input']]);
      } else {
        $data_petugas_delete = $put['id_petugas_input'];
      }
      // if (!$data_petugas_delete) {
      //   $res['status']     = 400;
      //   $res['message']    = "ID Petugas Input tidak dikenali.";

      //   return $res;
      // }
    }

    $data_input = [
      'id_petugas_approve'                        => !empty($put['id_petugas_approve']) ? $put['id_petugas_approve'] : null,
      'id_dokter_approve'                         => !empty($put['id_dokter_approve']) ? $put['id_dokter_approve'] : null,
      'approved_petugas'                          => $data_perawat['nama'],
      'approved_dokter'                           => $data_dokter['nama'],
      'digital_signature_approved_petugas'        => null,
      'digital_signature_approved_dokter'         => null,
      'approved_date_petugas'                     => !empty($put['id_petugas_approve']) ? date('Y-m-d H:i:s') : null,
      'approved_date_dokter'                      => !empty($put['id_dokter_approve']) ? date('Y-m-d H:i:s') : null,
      'created_date'                              => date('Y-m-d H:i:s'),
       //   'created_by'                                => empty($this->data_session['nama']) ? $this->data_session['nama'] : 'SIMRS',
      'created_by'                                => isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS',
      'notes'                                     => $put['notes'],
    ];
    $data = [
      'gizi_monitor'  => !empty($put['gizi_monitor']) ? $put['gizi_monitor'] : null,
      'json_data'     => json_encode($data_input),
    ];

    $input = $this->edit($id, $data);

    if ($input) {
      $res['status']     = 200;
      $res['message']    = "Berhasil mengubah data.";
      return $res;
    } else {
      $res['status']     = 400;
      $res['message']    = "Gagal mengubah data.";
      return $res;
    }
  }

  // Hapus notes
  public function hapus_notes($input)
  {
    $id = $input['id_notes'];
    // $this->response($input, 200);
    if (empty($input)) {
      $res = [
        'status' => '400',
        'message' => 'Mohon sertakan data untuk melanjutkan!',
      ];
      return $res;
    }


    $notes = $this->get_id($id);
    foreach ($notes as $n => $o) {
      $data = [
        'id_notes'              => $o['id'],
        'id_pasien_registrasi'  => $o['id_pasien_registrasi'],
        'id_pasien_visit'       => $o['id_pasien_visit'],
        'id_ref_global_tipe_42' => $o['id_ref_global_tipe_42'],
        'no_rm'                 => $o['no_rm'], //$post['no_rm'],
        'created_date'          => $o['created_date'],
        'json_data'             => $o['json_data'],
        // 'del_by'                => !empty($this->data_session['nama']) ? $this->data_session['nama'] : 'SIMRS',
        'del_by'                => isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS',
        'del_date'              => date("Y-m-d H:i:s")
      ];
    }

    $del = $this->edit(
      $id,
      [
        // 'del_by'    => !empty($this->data_session['nama']) ? $this->data_session['nama'] : 'SIMRS',
        'del_by'    => isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS',
        'del_date'  => date("Y-m-d H:i:s")
      ]
    );

    if ($del) {
      $res = [
        'status' => '200',
        'message' => 'Delete Data berhasil',
      ];
    } else {
      $res = [
        'status' => '205',
        'message' => 'Delete Data gagal',
      ];
    }
    return $res;
  }

  
  public function get($params)
  {
    $this->db->select('a.*, c.no_reg, b.id_dept,b.nama_dept, c.nama_pasien');
    $this->db->select("JSON_UNQUOTE(JSON_EXTRACT(JSON_EXTRACT(a.json_data, '$.notes'), '$.id_jadwal_operasi')) id_jadwal_operasi");
    $this->db->select('IF(a.id_pasien_visit IS NULL, 0, (IF(b.del_date IS NOT NULL, 1, 0)))  is_del_visit');

    $this->db->from('notes a');
    $this->db->join('pasien_visit b', 'a.id_pasien_visit = b.id', 'left');
    $this->db->join('pasien_registrasi c', 'a.id_pasien_registrasi = c.id', 'left');
    $this->db->where('c.del_date', null);

    if (!empty($params['id_visit'])) {
      $this->db->where('a.id_pasien_visit', $params['id_visit']);
    }
    if (!empty($params['id_reg'])) {
      $this->db->where('a.id_pasien_registrasi', $params['id_reg']);
    }
    if (!empty($params['no_sep'])) {
      $this->db->where('c.no_sep', $params['no_sep']);
    }
    if (!empty($params['no_rm'])) {
      $this->db->where('a.no_rm', $params['no_rm']);
    }
    if (!empty($params['id'])) {
      $this->db->where('a.id', $params['id']);
    }
    if (!empty($params['id_ref_global_tipe_42'])) {
      if (is_array($params['id_ref_global_tipe_42'])) {
        $this->db->where_in('a.id_ref_global_tipe_42', $params['id_ref_global_tipe_42']);
      } else {
        $this->db->where('a.id_ref_global_tipe_42', $params['id_ref_global_tipe_42']);
      }
    }
    $this->db->where('a.del_date', null);
    $this->db->group_by('a.id');

    $this->db->having('is_del_visit', '0');

    if (!empty($params['id_jadwal_operasi'])) {
      $this->db->having('id_jadwal_operasi', $params['id_jadwal_operasi']);
    }

    $this->db->order_by('a.id_ref_global_tipe_42', 'ASC');
    $this->db->order_by('a.id', 'DESC');
    // trace($this->db->get_compiled_select());
    $query = $this->db->get()->result_array();
    if ($query) {
      foreach ($query as $k => $v) {
        $query[$k]['json_data'] =  json_decode($v['json_data'], true);
      }
    }
    return $query;
  }

  public function add($params)
  {
    $this->db->insert('notes', $params);
    $id = $this->db->insert_id();

    $data = [
      'id_pasien_registrasi'                      => $params['id_pasien_registrasi'],
      'id_pasien_visit'                           => $params['id_pasien_visit'],
      'id_ref_global_tipe_42'                     => $params['id_ref_global_tipe_42'],
      'no_rm'                                     => $params['no_rm'], //$post['no_rm'],
      'created_date'                              => date('Y-m-d H:i:s'),
      //   'created_by'                                => !empty($this->data_session['nama']) ? $this->data_session['nama'] : 'SIMRS',
      'created_by'                                => isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS',
      'json_data'                                 => $params['json_data'],
      'id_notes'                                  => $id,
    ];
    $this->db->insert('notes_log', $data);
    return $id;
  }

  public function add_log($params)
  {
    return $this->db->insert('notes_log', $params);
  }

  public function edit($id, $data)
  {
    $this->db->where('id', $id);
    $check = $this->db->update('notes', $data);

    if ($check) {
      $result = 1;

      $data_notes = $this->db->get_where('notes', ['id' => $id])->row_array();

      unset($data_notes['id']);
      unset($data_notes['id_notes_fisio']);
      unset($data_notes['is_move']);

      $data_notes['id_notes'] = $id;
      $data_notes['created_date'] = date('Y-m-d H:i:s');
    //   $data_notes['created_by'] = $this->data_session['nama'];
      $data_notes['created_by'] = isset($this->data_session) ? $this->data_session['nama'] : 'SIMRS';
      $this->db->insert('notes_log', $data_notes);
    } else {
      $result = 0;
    }

    return $result;
  }

  public function get_id($id)
  {
    $this->db->select('*');
    $this->db->from('notes');
    if ($id != null) {
      $this->db->where('id', $id);
    }

    $query = $this->db->get()->result_array();

    return $query;
  }

}

/* End of file M_notes.php */