<?php

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mjoin');
        $this->load->model('order_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['order'] = $this->order_model->getAll();
        $this->load->view("vorder/list", $data);
    }
}
