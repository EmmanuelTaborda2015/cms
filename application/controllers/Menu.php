<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Menu extends CI_Controller {

        public function __construct(){
            parent::__construct();

            // Load model and library
            $this->load->model('Model_Menu');
            $this->load->library('Menu_Library');
            
            // Change form validation error
            $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
            $this->form_validation->set_message('numeric', '%s debe ser un número');
            $this->form_validation->set_message('is_natural', '%s debe ser un número mayor que cero');

	}

        /**
         * Display the menu's index
         */
        public function index() {
            $data['content'] ='menu/index';
            $data['title'] = 'Menu';
            $data['query'] = $this->Model_Menu->all();
            
            $this->load->view('template',$data);
        }
        
        /**
         * Search for a menu
         */
        public function search() {
            $data['content'] ='menu/index';
            $data['title'] = 'Menu';
            $value = $this->input->post('search');
            
            // Query menu and load view
            $data['query'] = $this->Model_Menu->all_filter('name', $value);
            $this->load->view('template',$data);
        }
        
        /**
         * Validate the menu
         * @return type
         */
        public function my_validation() {
            return $this->Menu_Library->my_validation($this->input->post());
        }

        /**
         * Edit the id article and load the view
         * @param type $id
         */
        public function edit($id) {          
            $data['content'] ='menu/edit_form';
            $data['title'] = 'Actualizar menú';
            
            // Find menu by id from database and display view
            $data['register'] = $this->Model_Menu->find($id);
            $this->load->view('template',$data);
        }
        
        /**
         * Update menu with form data
         */
        public function update() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('name', 'Nombre', 'required|callback_my_validation');
            $this->form_validation->set_rules('menu_order', 'Orden', 'numeric|is_natural');
            if($this->form_validation->run() == FALSE) {
                $this->edit($register['id']);  // Return if validations fails

            } else {
                $register['updated'] = date('Y/m/d H:i');
                $this->Model_Menu->update($register);
                
                redirect('menu/index');
            }
        }
        
        /**
         * Display create menu view
         */
        public function create() {        
            $data['content'] ='menu/create_form';
            $data['title'] = 'Crear menú';
            $this->load->view('template',$data);
        }

        /**
         * Insert menu on data base
         */
        public function insert() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('name', 'Nombre', 'required|callback_my_validation');
            $this->form_validation->set_rules('menu_order', 'Orden', 'numeric|is_natural');
            if($this->form_validation->run() == FALSE) {
                $this->create();  // Display create article view
                
            } else {
                $register['created'] = date('Y/m/d H:i');
                $register['updated'] = date('Y/m/d H:i');
                $this->Model_Menu->insert($register);
                
                redirect('menu/index');
            }
        }
        
        /**
         * Delete menu with the param id
         * @param type $id
         */
        public function delete($id) {
            $this->Model_Menu->delete($id);
            redirect('menu/index');
        }

        /**
         * Set the access to menu
         * @param type $menu_id
         */
        public function menu_profile($menu_id) {
            $data['content'] ='menu/menu_profile';
            $data['title'] = 'Accesos de ' . $this->Model_Menu->find($menu_id)->name;
            
            // Get assigned and not assigned profiles for user
            $profiles = $this->Menu_Library->get_profiles($menu_id);
            $data['query_left'] = $profiles[0];
            $data['query_right'] = $profiles[1];
            
            $this->load->view('template',$data);
        }

        /**
         * Assign menu access to profrile
         */
        public function assign() {
            // Use url segment as parameter
            $profile_id = $this->uri->segment(3);
            $menu_id = $this->uri->segment(4);
            
            $this->load->library('Menu_Profile_Library');
            $this->Menu_Profile_Library->set_access($profile_id, $menu_id);
            redirect('menu/menu_profile/' . $menu_id);
            
        }
        /**
         * Deni access to menu
         */
        public function deny() {
            // Use url segment as parameter
            $profile_id = $this->uri->segment(3);
            $menu_id = $this->uri->segment(4);
                        
            $this->load->library('Menu_Profile_Library');
            $this->Menu_Profile_Library->deny_access($profile_id, $menu_id);
            redirect('menu/menu_profile/' . $menu_id);
        }
        
    }

?>