<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Profile extends CI_Controller {

        public function __construct(){
            parent::__construct();
            
            // Load model and library
            $this->load->model('Model_Profile');
            $this->load->library('Profile_Library');
            
            // Change form validation error
            $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
            $this->form_validation->set_message('no_reply', 'Existe otro registro con el mismo nombre');

	}
        
        /**
         * Display the profile's index
         */
        public function index() {
            $data['content'] ='profile/index';
            $data['title'] = 'Profiles';
            $data['query'] = $this->Model_Profile->all();
            $this->load->view('template',$data);
        }
        
        /**
         * Search for a profile
         */
        public function search() {
            $data['content'] ='profile/index';
            $data['title'] = 'Profiles';
            $value = $this->input->post('search');
            $data['query'] = $this->Model_Profile->all_filter('name', $value);
            
            $this->load->view('template',$data);
        }
        
        /**
         * Call article library to profile function
         * @return type
         */
        public function no_reply() {
            return $this->Profile_Library->no_reply($this->input->post());
        }

        /**
         * Edit the id profile and load the view
         * @param type $id
         */
        public function edit($id) {        
            $data['content'] ='profile/edit_form';
            $data['title'] = 'Actualizar perfil';
            $data['register'] = $this->Model_Profile->find($id);
            
            $this->load->view('template',$data);
        }
        
        /**
         * Update profile with form data
         */
        public function update() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('name', 'Nombre', 'required|callback_no_reply');
            if($this->form_validation->run() == FALSE) {
                $this->edit($register['id']);  // Return if validations fails
                
            } else {
                $register['updated'] = date('Y/m/d H:i');
                $this->Model_Profile->update($register);
                redirect('profile/index');
            }
        }
        
        /**
         * Display create profile view
         */
        public function create() {        
            $data['content'] ='profile/create_form';
            $data['title'] = 'Crear perfil';
            $this->load->view('template',$data);
        }
        
        /**
         * Insert profile on data base
         */
        public function insert() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('name', 'Nombre', 'required|callback_no_reply');
            if($this->form_validation->run() == FALSE) {
                $this->create();  // Display create article view
                
            } else {
                $register['created'] = date('Y/m/d H:i');
                $register['updated'] = date('Y/m/d H:i');
                
                $this->Model_Profile->insert($register);
                redirect('profile/index');
            }
        }
        
        /**
         * Delete profile with the param id
         * @param type $id
         */
        public function delete($id) {
            $this->Model_Profile->delete($id);
            redirect('profile/index');
        }

    }

?>