<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('web/requires/header');

$this->load->view($subview);

$this->load->view('web/requires/footer');

?>