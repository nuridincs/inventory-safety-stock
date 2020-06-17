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
    redirect('dashboard1');
  }

  function logout()
  {
    redirect('auth');
  }
}
