<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Upload_File extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Model_Upload_File');
	}

        /**
         * Display the upload's file index
         */
        public function index() {
            $data['content'] ='upload_file/index';
            $data['title'] = 'Cargar Archivos';
            
            $type_file = $this->Model_Upload_File->get_type_files();
            $users = $this->Model_Upload_File->get_users("5");
            
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
         * Search for an article
         */
        
        function do_upload()
        {
        	
        }
        
        /**
         * Search for an article
         */
        public function search() {
            $data['content'] ='article/index';
            $data['title'] = 'Artículos';
            $value = $this->input->post('search');
            $data['query'] = $this->Model_Article->all_filter('article.title', $value);
            $this->load->view('template',$data);
        }
        
        /**
         * Call article library to no_reply function
         * @return type
         */
        public function no_reply() {
            return $this->article_library->no_reply($this->input->post());
        }

        /**
         * Edit the id article and load the view
         * @param type $id
         */
        public function edit($id) {
            $data['content'] ='article/edit_form';
            $data['title'] = 'Actualizar perfil';
            $data['register'] = $this->Model_Article->find($id);

            $this->load->view('template',$data);
        }

        /**
         * Update article with form data
         */
        public function update() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('title', 'Título', 'required');
            $this->form_validation->set_rules('body', 'Cuerpo', 'required');
            if($this->form_validation->run() == FALSE) {
                $this->edit($register['id']);  // Return if validations fails

            } else {
                $register['updated'] = date('Y/m/d H:i');
                $register['user_id'] = $this->session->userdata('user_id');
                // We don't need update the alias
                unset($register['author']);
                $this->Model_Article->update($register);
                redirect('article/index');
            }
        }

        /**
         * Display create article view
         */
        public function create() {        
            $data['content'] ='upload_file/create_form';
            $data['title'] = 'Cargar Archivo';
            $this->load->view('template',$data);
        }

        /**
         * Insert article on data base
         */
        public function insert() {
            
        	$register = $this->input->post();
            
            // Field validation
            /*$this->form_validation->set_rules('name', 'Nombre de Archivo', 'required');
            if($this->form_validation->run() == FALSE) {
            	$this->create();  // Display create article view
            	
            } else {
            	$register['user_id'] = $this->session->userdata('user_id');
            	$register['created'] = date('Y/m/d H:i');
            	$register['updated'] = date('Y/m/d H:i');
            	
            	$this->Model_Article->insert($register);
            	redirect('article/index');
            }*/
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload())
            {
            	$error = array('error' => $this->upload->display_errors());
            	
            	$this->load->view('upload_form', $error);
            }
            else
            {
            	$data = array('upload_data' => $this->upload->data());
            	
            	$this->load->view('upload_success', $data);
            }
            
           
        }
        
        /**
         * Delete article with the param id
         * @param type $id
         */
        public function delete($id) {
            $this->Model_Article->delete($id);
            redirect('article/index');
        }

    }

?>