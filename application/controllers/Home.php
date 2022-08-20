<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Home extends CI_Controller 
{ 
    function __construct() 
    { 
        parent::__construct(); 
        $this->load->helper('form'); // loading this for the entire class/controller 
        $this->load->library('form_validation'); // loading this for the entire class/controller 
        $this->load->database(); // ummm…ditto 
    } 
    public function index() 
    { 
        $this->load->view('includes/header'); 
        $this->load->view('home/index'); 
        $this->load->view('includes/footer'); 
    }   
}