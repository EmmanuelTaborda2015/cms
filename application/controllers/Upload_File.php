<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Upload_File extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Model_Upload_File');
            
            // Change form validation error
            $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
            $this->form_validation->set_message('error', 'Se ha presentado un error cargando el archivo');
	}

         /**
         * Display the upload's file index
         */
        public function index() {
            $data['content'] ='upload_file/index';
            $data['title'] = 'Todos Archivos';
            $data['query'] = $this->Model_Upload_File->get_all_files();
            $this->load->view('template',$data);
        }
        
        /**
         * Display create File view
         */
        public function create() {
        	
        	$data['content'] ='upload_file/create_form';
        	$data['title'] = 'Cargar Archivo';

        	$type_file = $this->Model_Upload_File->get_type_files();
        	$users = $this->Model_Upload_File->get_users("7"); //Aqui va el tipo de usuario al que se le van a cargar los archivos.
        	
        	$type_file_list = array();
        	
        	foreach ($type_file as $type) {
        		$type_file_list[$type->id_type_file] =$type->description;
        	}
        	
        	$data['type_file'] = $type_file_list;
        	
        	$user_list = array();
        	
        	foreach ($users as $user) {
        		$user_list[$user->id] =$user->name;
        	}
        	
        	$data['user'] = $user_list;
        	
        	$this->load->view('template',$data);
        }
        
        /**
         * Call article library to no_reply function
         * @return type
         */
        public function error() {
            return false;
        }

        /**
         * Insert article on data base
         */
        public function insert() {
            
        	$register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('name', 'Nombre de Archivo', 'required');
            $this->form_validation->set_rules('user', 'Usuario', 'required');
            
            if (empty($_FILES['file']['name']))
            {
            	$this->form_validation->set_rules('file', 'Archivo', 'required');
            }
            
            if($this->form_validation->run() == FALSE) {
            	$this->create(); 
            	
            } else {
            	
            	$config['upload_path'] = './uploads/';
            	$config['allowed_types'] = 'pdf';
            	$config['max_size']	= '100000';
            	
            	$this->load->library('upload', $config);
            	
            	$name_field = "file";
            	
            	if ( ! $this->upload->do_upload($name_field))
            	{
            		$this->session->set_flashdata('alert', $this->upload->display_errors());
            		$this->create(); 
            	}
            	else
            	{
            		$data['creator'] = $this->session->userdata('user_id');
            		$data['owner'] = $register['user'];
            		$data['type_file'] =  $register['name'];
            		$data['path'] =  $fullPath = base_url() .'uploads/'. $this->upload->data()['file_name'];
            		//$data['path'] =  $this->upload->data()["full_path"];
            		
            		$validate = $this->Model_Upload_File->exist_file($data);
            		
            		if(count($validate) > 0){
            			
            			$this->session->set_flashdata('alert', 'Este Archivo ya existe para este usuario, Seleccione la opci&oacute;n actualizar para subir una nueva versi&oacute;n del documento.');
            			
            			redirect('upload_file/index/');
            		}else{
            			$this->Model_Upload_File->insert($data);
            			
            			$this->session->set_flashdata('message', 'Ha sido cargado correctamente el archivo.');
            			
            			redirect('upload_file/index/');
            		}
            		
            	}
            }
            
        }
        
        public function edit($id) {
        	$data['content'] ='upload_file/edit_form';
        	$data['title'] = 'Actualizar Archivo';
        	$data['register'] = $this->Model_Upload_File->find($id)[0];

        	if($data['register']->count < $data['register']->total){
	        	
        		$type_file = $this->Model_Upload_File->get_type_files();
	        	$users = $this->Model_Upload_File->get_users("7"); //Aqui va el tipo de usuario al que se le van a cargar los archivos.
	        	
	        	$type_file_list = array();
	        	
	        	foreach ($type_file as $type) {
	        		$type_file_list[$type->id_type_file] =$type->description;
	        	}
	        	
	        	$data['type_file'] = $type_file_list;
	        	
	        	$user_list = array();
	        	
	        	foreach ($users as $user) {
	        		$user_list[$user->id] =$user->name;
	        	}
	        	
	        	$data['user'] = $user_list;
	        	
	        	$this->load->view('template',$data);
        	}else{
        		$this->session->set_flashdata('alert', 'Ya ha sido cargado el total de archivos de ' . $data['register']->description . ', para este usuario.');
        		redirect('upload_file/index/');
        	}
        }
        
        /**
         * Update file with form data
         */
        public function update() {
        	$register = $this->input->post();
        	
        	// Field validation
        	$this->form_validation->set_rules('name', 'Nombre de Archivo', 'required');
        	$this->form_validation->set_rules('user', 'Usuario', 'required');
        	
        	if (empty($_FILES['file']['name']))
        	{
        		$this->form_validation->set_rules('file', 'Archivo', 'required');
        	}
        	
        	if($this->form_validation->run() == FALSE) {
        		$this->edit($register['id_file']); 
        	} else {
        		
        		$config['upload_path'] = './uploads/';
        		$config['allowed_types'] = 'pdf';
        		$config['max_size']	= '100000';
        		
        		$this->load->library('upload', $config);
        		
        		$name_field = "file";
        		
        		if ( ! $this->upload->do_upload($name_field))
        		{
        			$this->session->set_flashdata('alert', $this->upload->display_errors());
        			$this->edit($register['id_file']); 
        		}
        		else
        		{
        			$data['id_file'] = $register['id_file'];
        			$data['creator'] = $this->session->userdata('user_id');
        			$data['owner'] = $register['user'];
        			$data['type_file'] =  $register['name'];
        			$data['count'] =  $register['count'] + 1;
        			$data['path'] =  $this->upload->data()["full_path"];
        			$data['update_date'] = date('Y/m/d H:i');
        			
        			$this->Model_Upload_File->update($data);
        			
        			$this->session->set_flashdata('message', 'Ha sido actualizado correctamente el archivo.');
        			
        			redirect('upload_file/index/');
        		}
        	}
        	
        }
    }

?>