<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        var_dump($this->session->userdata('logged_user'));
    }
}