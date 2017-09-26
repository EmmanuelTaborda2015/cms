<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class User extends CI_Controller {

        public function __construct(){
            parent::__construct();
            
            // Load model and library
            $this->load->model('Model_User');
            $this->load->library('user_library');
            
            // Change form validation error
            $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
            $this->form_validation->set_message('no_reply', 'Existe otro registro con el mismo nombre');

	}
        
        /**
         * Display the user's index
         */
        public function index() {
            $data['content'] ='user/index';
            $data['title'] = 'Usuarios';
            $data['query'] = $this->Model_User->all();
            
            $this->load->view('template',$data);
        }
        
        public function search() {
            $data['content'] ='user/index';
            $data['title'] = 'Usuarios';
            $value = $this->input->post('search');
            $data['query'] = $this->Model_User->all_filter('user.name', $value);
            $this->load->view('template',$data);
        }
        
        /**
         * Call user library to no_reply function
         * @return type
         */
        public function no_reply() {
            return $this->user_library->no_reply($this->input->post());
        }

        /**
         * Edit the id user and load the view
         * @param type $id
         */
        public function edit($id) {
            $data['content'] ='user/edit_form';
            $data['title'] = 'Actualizar perfil';
            $data['register'] = $this->Model_User->find($id);
            $data['profile'] = $this->Model_User->get_profiles();
            
            $this->load->view('template',$data);
        }
        
        /**
         * Update user with form data
         */
        public function update() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('login', 'Login', 'required|callback_no_reply');
            $this->form_validation->set_rules('email', 'eMail', 'required|valid_email');
            if($this->form_validation->run() == FALSE) {
                $this->edit($register['id']);  // Return if validations fails
                
            } else {
                $register['updated'] = date('Y/m/d H:i');
                $this->Model_User->update($register);
                redirect('user/index');
            }
        }
        
        /**
         * Display create user view
         */
        public function create() {        
            $data['content'] ='user/create_form';
            $data['title'] = 'Crear perfil';
            $data['profile'] = $this->Model_User->get_profiles();
            $this->load->view('template',$data);
        }
        
        /**
         * Insert user on data base
         */
        public function insert() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('login', 'Login', 'required|callback_no_reply');
            $this->form_validation->set_rules('email', 'eMail', 'required|valid_email');
            if($this->form_validation->run() == FALSE) {
                $this->create();  // Display create user view
                
            } else {
                $register['password'] = md5($this->user_library->send_email($register['email']));
                $register['created'] = date('Y/m/d H:i');
                $register['updated'] = date('Y/m/d H:i');
                $register['profile_id'] = 5;  // Default user creation
                
                $this->Model_User->insert($register);
                redirect('home/register_form');
            }
        }
        
        /**
         * Delete user with the param id
         * @param type $id
         */
        public function delete($id) {
            $this->Model_User->delete($id);
            redirect('user/index');
        }
        
        public function send_email() {
            $this->user_library->send_email();
        }

    }

?>