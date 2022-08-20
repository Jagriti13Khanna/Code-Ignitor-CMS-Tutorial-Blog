<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Tutorials extends CI_Controller 
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
        $data['heading'] = "Reading from a DB"; 
        $this->load->model('tutorial_model'); 
        $data['tutorials'] = $this->tutorial_model->get_tutorials();
        $this->load->view('includes/header'); 
        $this->load->view('tutorials/index',$data); 
       	$this->load->view('includes/footer'); 
        // echo "home";

        // echo "<pre>";
        // print_r($data); 
        // echo "</pre>";
    }
    public function write(){
    	if (!$this->ion_auth->logged_in()) 
        { 
            redirect('/auth/login/'); 
        }

        $this->form_validation->set_error_delimiters('<div class="has-text-danger mb-5">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|max_length[40]'); 
        $this->form_validation->set_rules('about', 'About', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('what_you_learn', 'What you will Learn', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step1', 'Step 1', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step2', 'Step 2', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step3', 'Step 3', 'required|min_length[20]|max_length[2000]');
        // $this->form_validation->set_rules('step1_image', 'Step 1 image', 'required');
        // $this->form_validation->set_rules('step2_image', 'Step 2 image', 'required');
        // $this->form_validation->set_rules('step3_image', 'Step 3 image', 'required');
        $this->form_validation->set_rules('step4', 'Step 4', 'min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step5', 'Step 5', 'min_length[20]|max_length[2000]');

        
        // Validation Library was loaded in the constructor.
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('includes/header'); 
	        $this->load->view('tutorials/create'); 
	       	$this->load->view('includes/footer');
        }
        else 
        { 
                $config['upload_path'] = './uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$errors = array();
				$this->load->library('upload', $config);


				if(isset($_FILES['step1_image']) && !empty($_FILES['step1_image'])){
					if(!$this->upload->do_upload('step1_image')){
						$errors = array('error' => $this->upload->display_errors());
						$step1_image = 'no-image.png';
					} else {
 						$step1_image = $this->upload->data()['file_name'];
	                    $this->create_thumbnail($step1_image);
					}
				}
				if(isset($_FILES['step2_image']) && !empty($_FILES['step2_image'])){
					if(!$this->upload->do_upload('step2_image')){
						$errors = array('error' => $this->upload->display_errors());
						$step2_image = 'no-image.png';
					} else {
 						$step2_image = $this->upload->data()['file_name'];
 					}
				}
				if(isset($_FILES['step3_image']) && !empty($_FILES['step3_image'])){
					if(!$this->upload->do_upload('step3_image')){
						$errors = array('error' => $this->upload->display_errors());
						$step3_image = 'no-image.png';
					} else {
 						$step3_image = $this->upload->data()['file_name'];
 					}
				}
				if(isset($_FILES['step4_image']) && !empty($_FILES['step4_image'])){
					if(!$this->upload->do_upload('step4_image')){
						$errors = array('error' => $this->upload->display_errors());
						$step4_image = 'no-image.png';
					} else {
 						$step4_image = $this->upload->data()['file_name'];
 					}
				}
				if(isset($_FILES['step5_image']) && !empty($_FILES['step5_image'])){
					if(!$this->upload->do_upload('step5_image')){
						$errors = array('error' => $this->upload->display_errors());
						$step5_image = 'no-image.png';
					} else {
 						$step5_image = $this->upload->data()['file_name'];
 					}
				}
				 

				//$this->post_model->create_post($post_image);
	            $data = array();   
	            // echo "SUCCESS"; 
	            // retrieve POSTED form data 
	            $data['title'] = $this->input->post('title'); 
	            $data['about']= $this->input->post('about');
	           	$data['what_you_learn'] = $this->input->post('what_you_learn');
				$data['step1'] = $this->input->post('step1');
				$data['step2'] = $this->input->post('step2');
				$data['step3'] = $this->input->post('step3');
				$data['step4'] = $this->input->post('step4');
				$data['step5'] = $this->input->post('step5');
	            $data['step1_image'] = $step1_image;
	            $data['step2_image'] = $step2_image;
	            $data['step3_image'] = $step3_image;
	            $data['step4_image'] = $step4_image;
	            $data['step5_image'] = $step5_image;
	            $data['author_id'] = $this->ion_auth->get_user_id();
	            $this->load->model('tutorial_model'); 
	            $this->tutorial_model->insert_tutorial($data);
	            // $this->session->set_flashdata('message', 'Insert Successful');
	            redirect("tutorials", 'location');
        }
 		 
         

    }
    public function delete($id_tutorial){
    	if (!$this->ion_auth->logged_in()) 
        { 
            redirect('/auth/login/'); 
        }
        $this->load->model('tutorial_model');
        if(!is_numeric($id_tutorial) || !$this->tutorial_model->is_owner($id_tutorial,$this->ion_auth->get_user_id())){
        	redirect('/tutorials');
        }
        $this->tutorial_model->delete($id_tutorial);
        redirect('/tutorials');
    }
    public function detail($id_tutorial){
    	$this->load->model('tutorial_model');
        $data = array(
        	'tutorial' => $this->tutorial_model->get_tutorial($id_tutorial),
        );
        $this->load->view('includes/header'); 
	    $this->load->view('tutorials/single-tutorial',$data); 
	    $this->load->view('includes/footer');
    }
    public function edit($id_tutorial){
    	if (!$this->ion_auth->logged_in()) 
        { 
            redirect('/auth/login/'); 
        }
        $this->load->model('tutorial_model');
        if(!is_numeric($id_tutorial) || !$this->tutorial_model->is_owner($id_tutorial,$this->ion_auth->get_user_id())){
        	redirect('/tutorials');
        }
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|max_length[40]'); 
        $this->form_validation->set_rules('about', 'About', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('what_you_learn', 'What you will Learn', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step1', 'Step 1', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step2', 'Step 2', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step3', 'Step 3', 'required|min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step4', 'Step 4', 'min_length[20]|max_length[2000]');
        $this->form_validation->set_rules('step5', 'Step 5', 'min_length[20]|max_length[2000]');
 
        // Validation Library was loaded in the constructor.
        if ($this->form_validation->run() == FALSE)
        {
        	$this->load->model('tutorial_model');
        	$data = array(
        		'tutorial' => $this->tutorial_model->get_tutorial($id_tutorial),
        	);
            $this->load->view('includes/header'); 
	        $this->load->view('tutorials/edit',$data); 
	       	$this->load->view('includes/footer');
        }
        else 
        { 
                $config['upload_path'] = './uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$errors = array();
				$this->load->library('upload', $config);
				// echo '<pre>';
				// print_r($_FILES);
				// exit();

				if(isset($_FILES['step1_image']) && !empty($_FILES['step1_image']['name'])){
					if(!$this->upload->do_upload('step1_image')){
 						$step1_image = 'no-image.png';
					} else {
 						$step1_image = $this->upload->data()['file_name'];
	                    $this->create_thumbnail($step1_image);
					}
				}
				if(isset($_FILES['step2_image']) && !empty($_FILES['step2_image']['name'])){
					if(!$this->upload->do_upload('step2_image')){
 						$step2_image = 'no-image.png';
					} else {
 						$step2_image = $this->upload->data()['file_name'];
 					}
				}
				if(isset($_FILES['step3_image']) && !empty($_FILES['step3_image']['name'])){
					if(!$this->upload->do_upload('step3_image')){
 						$step3_image = 'no-image.png';
					} else {
 						$step3_image = $this->upload->data()['file_name'];
 					}
				}
				if(isset($_FILES['step4_image']) && !empty($_FILES['step4_image']['name'])){
					if(!$this->upload->do_upload('step4_image')){
 						$step4_image = 'no-image.png';
					} else {
 						$step4_image = $this->upload->data()['file_name'];
 					}
				}
				if(isset($_FILES['step5_image']) && !empty($_FILES['step5_image']['name'])){
					if(!$this->upload->do_upload('step5_image')){
 						$step5_image = 'no-image.png';
					} else {
 						$step5_image = $this->upload->data()['file_name'];
 					}
				}
				 

				//$this->post_model->create_post($post_image);
	            $data = array();   
	            // echo "SUCCESS"; 
	            // retrieve POSTED form data 
	            $data['title'] = $this->input->post('title'); 
	            $data['about']= $this->input->post('about');
	           	$data['what_you_learn'] = $this->input->post('what_you_learn');
				$data['step1'] = $this->input->post('step1');
				$data['step2'] = $this->input->post('step2');
				$data['step3'] = $this->input->post('step3');
				$data['step4'] = $this->input->post('step4');
				$data['step5'] = $this->input->post('step5');
				if(!empty($step1_image)){
	            	$data['step1_image'] = $step1_image;	
				}
				if(!empty($step2_image)){
	            	$data['step2_image'] = $step2_image;	
				}
				if(!empty($step3_image)){
	            	$data['step3_image'] = $step3_image;	
				}
				if(!empty($step4_image)){
	            	$data['step4_image'] = $step4_image;
				}
				if(!empty($step5_image)){
	            	$data['step5_image'] = $step5_image;
				}
	            $data['author_id'] = $this->ion_auth->get_user_id();
	            $this->load->model('tutorial_model'); 
	            $this->tutorial_model->update_tutorial($id_tutorial,$data);
	            // $this->session->set_flashdata('message', 'Insert Successful');
	            redirect("tutorials", 'location');
        }
    }
     public function create_thumbnail($image){

        if(!empty($image) && file_exists(FCPATH .'/uploads/' . $image)){
            $source_path = FCPATH . '/uploads/' . $image;
            $target_path = FCPATH . '/uploads/thumbnail/';
            $config_manip = array(
                  'image_library' => 'gd2',
                  'source_image' => $source_path,
                  'new_image' => $target_path,
                  'maintain_ratio' => TRUE,
                  //'create_thumb' => false,
                  'thumb_marker' => '_thumb',
                  'width' => 600,
                  'height' => 350
            );
            $this->load->library('image_lib', $config_manip);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }
            $this->image_lib->clear();
        }
    }

}