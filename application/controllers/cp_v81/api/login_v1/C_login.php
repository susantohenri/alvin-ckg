<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class C_login extends RestController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('cp_v81/global_v1/M_login', 'login');
  }

  public function index_get()
  {
    $response['status'] = RestController::HTTP_OK;
    $response['message'] = 'Connection OK!';
    $response['data'] = [
      'version' => '1.0.0'
    ];
    $this->response($response, $response['status']);
  }

  public function index_post()
  {
    $post = $this->post();

    if (empty($post['username'])) {
      $response['status'] = RestController::HTTP_BAD_REQUEST;
      $response['message'] = 'Parameter username dibutuhkan';
      $this->response($response, $response['status']);
    }

    if (empty($post['password'])) {
      $response['status'] = RestController::HTTP_BAD_REQUEST;
      $response['message'] = 'Parameter password dibutuhkan';
      $this->response($response, $response['status']);
    }

    try {
      $response = $this->login->do_login($post);
      $this->response($response, $response['status']);
    } catch (Exception $exception) {
      $response['status'] = RestController::HTTP_INTERNAL_ERROR;
      $response['message'] = $exception->getMessage();
      $this->response($response, $response['status']);
    }
  }
}
