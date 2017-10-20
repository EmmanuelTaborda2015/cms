<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Menu_Profile extends CI_Controller {

        public function __construct(){
            parent::__construct();
            
            // Load model and library
            $this->load->model('Model_Menu_Profile');
            $this->load->library('Menu_Profile_Library');
            
            // Change form validation error
            $this->form_validation->set_message('no_reply', 'Existe otro registro con el mismo nombre');

	}

        /**
         * Display the menu_profile's index
         */
        public function index() {
            $data['content'] ='menu_profile/index';
            $data['title'] = 'Permisos';
            $data['query'] = $this->Model_Menu_Profile->all();
            
            $this->load->view('template',$data);
        }
        
        /**
         * Search for an menu_profile
         */
        public function search() {
            $data['content'] ='menu_profile/index';
            $data['title'] = 'Permisos';
            
            $value = $this->input->post('search');
            $data['query'] = $this->Model_Menu_Profile->all_filter('profile.name', $value);
            
            $this->load->view('template',$data);
        }
        
        /**
         * Call menu_profile library to no_reply function
         * @return type
         */
        public function no_reply() {
            return $this->Menu_Profile_Library->no_reply($this->input->post());
        }

        /**
         * Edit the id menu_profile and load the view
         * @param type $id
         */
        public function edit($id) {
            $data['content'] = 'menu_profile/edit_form';
            $data['title'] = 'Actualizar permiso';
            
            $data['register'] = $this->Model_Menu_Profile->find($id);
            $data['menus'] = $this->Model_Menu_Profile->get_menus();
            $data['profiles'] = $this->Model_Menu_Profile->get_profiles();
            
            $this->load->view('template',$data);
        }
        
        /**
         * Update menu_profile with form data
         */
        public function update() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('id', 'ID', 'callback_no_reply');
            if($this->form_validation->run() == FALSE) {
                $this->edit($register['id']);  // Return if validations fails
                
            } else {
                $register['updated'] = date('Y/m/d H:i');
                $this->Model_Menu_Profile->update($register);
                redirect('menu_profile/index');
            }
        }
        
        /**
         * Display create menu_profile view
         */
        public function create() {        
            $data['content'] ='menu_profile/create_form';
            $data['title'] = 'Crear permiso';
            $data['menus'] = $this->Model_Menu_Profile->get_menus();
            $data['profiles'] = $this->Model_Menu_Profile->get_profiles();
            
            $this->load->view('template',$data);
        }
        
        /**
         * Insert menu_profile on data base
         */
        public function insert() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('id', 'ID', 'callback_no_reply');
            if($this->form_validation->run() == FALSE) {
                $this->create();  // Display create article view
                
            } else {
                $register['created'] = date('Y/m/d H:i');
                $register['updated'] = date('Y/m/d H:i');
                $this->Model_Menu_Profile->insert($register);
                
                redirect('menu_profile/index');
            }
        }
        
        /**
         * Delete menu_profile with the param id
         * @param type $id
         */
        public function delete($id) {
            $this->Model_Menu_Profile->delete($id);
            redirect('menu_profile/index');
        }

    }

?>