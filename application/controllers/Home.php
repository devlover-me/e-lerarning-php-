<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function index(){

        $this->load->view('home/header');
        $this->load->view('home/home');
        $this->load->view('home/footer');
        $this->load->view('home/scripts');
    }

    public function aboutus(){

        $this->load->view('home/header');
        $this->load->view('home/aboutus');
        $this->load->view('home/footer');
        $this->load->view('home/scripts');
    }


    public function contactus(){

        $this->load->view('home/header');
        $this->load->view('home/contactus');
        $this->load->view('home/footer');
        $this->load->view('home/scripts');
    }





}