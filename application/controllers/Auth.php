<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->load->view('login');
  }

  function login()
  {
    redirect('general');
  }

  function logout()
  {
    redirect('auth');
  }
}
