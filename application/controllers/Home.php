<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller {

        public function __construct(){
            parent::__construct();
            // Change form validation error
            $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
            $this->form_validation->set_message('login_ok', 'Usuario o clave incorrectos');
            $this->form_validation->set_message('matches', '%s no coincide con %s');
            $this->form_validation->set_message('change_ok', 'No se puede realizar el cambio de clave');
             
            // Load models
            $this->load->model('Model_User');
            $this->load->model('Model_Article');
            $this->load->model('Model_Comment');
            
            // Load libraries
            $this->load->library('user_library');
            $this->load->library('crop_library');
	}

        /**
         * Display all articles in the main page
         */
        public function index() {
            $data['content'] ='home/index';
            $data['title'] = 'Inicio';
            $data['articles'] = $this->Model_Article->all_ordered();
            $data['comments'] = $this->Model_Comment->all_ordered();

            $this->load->view('template',$data);
        }

        /**
         * Display about_us page
         */
        public function about_us() {
            $data['content'] ='home/about_us';
            $data['title'] = 'Sobre nosotros';
            $this->load->view('template',$data);
        }

        /**
         * Display access denied page
         */
        public function access_denied() {
            $data['content'] = 'home/access_denied';
            $data['title'] = 'Acceso denegado';
            $this->load->view('template', $data);
        }

        /**
         * Logout
         */
        public function closeSession() {
            $this->session->sess_destroy();
            redirect('home/index');
        }

        
        /**
         * Display user register form
         */
        public function register_form() {
            $data['content'] = 'home/register_form';
            $data['title'] = 'Ingreso';
            $this->load->view('template', $data);
        }

        /**
         * Get data from the form
         */
        public function user_register(){
            $login = $this->input->post('login');
            $password = $this->input->post('password');

            // User and password validation
            $this->form_validation->set_rules('login', 'Usuario', 'required|callback_login_ok');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->register_form(); // Return to user form
                
            // Change expiration time if user check remember box
            } elseif($this->input->post('remember')) {
                $cookie = array('name' => 'ci_session', 'value' => $_COOKIE['ci_session'], 'expire' => '1209600');
                $_COOKIE['ci_session'] = $cookie;
                redirect('home/index');
                
            } else {
                redirect('home/index');
            }
        }
        
        /**
         * If all was ok, register user into database
         * @return type
         */
        public function login_ok() {
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            return $this->user_library->login($login, md5($password));
        }

        /**
         * Display the form for change the password
         */
        public function change_password_form() {
            $data['content'] = 'home/change_password_form';
            $data['title'] = 'Cambiar Contraseña';
            $this->load->view('template', $data);
        }

        /**
         * Validate if current password and new password are ok
         */
        public function validate_password() {
            $this->form_validation->set_rules('current_password', 'Clave Actual', 'required|callback_change_ok');
            $this->form_validation->set_rules('new_password', 'Clave Nueva', 'required|matches[rewrite_password]');
            $this->form_validation->set_rules('rewrite_password', 'Repita Nueva', 'required');
            
            if($this->form_validation->run() == FALSE) {
                $this->change_password_form();  // If password is not ok, redirect to form again
            } else {
                redirect('home/index');
            }

        }

        /**
         * Change the password from data
         * @return type
         */
        public function change_ok() {
            $current = $this->input->post('current_password');
            $new = $this->input->post('new_password');
            return $this->user_library->change_password(md5($current), md5($new));
        }

        /**
         * Show user profile, let change the avatar image
         */
        public function show_user() {
            $data['content'] = 'home/show_user';
            $data['title'] = 'Perfil de usuario';
        
            // If user submit image
            if(isset($_POST["submit"])) {
                $source = 'fileToUpload';
                $basename = $this->session->userdata('user_id');
                $target_dir = 'img/avatar/';
                
                $new_width = '100';
                $new_height = '100';

                $this->crop_library->thumbnail($source, $basename, $target_dir, $new_width, $new_height);
            }
            
            $this->load->view('template', $data);
        }
                
    }
?>