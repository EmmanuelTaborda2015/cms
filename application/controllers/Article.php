<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Article extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Model_Article');
	}

        /**
         * Display the article's index
         */
        public function index() {
            $data['content'] ='article/index';
            $data['title'] = 'Artículos';
            $data['query'] = $this->Model_Article->all_ordered();
            $this->load->view('template',$data);
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
            return $this->Article_Library->no_reply($this->input->post());
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
            $data['content'] ='article/create_form';
            $data['title'] = 'Crear artículo';
            $this->load->view('template',$data);
        }

        /**
         * Insert article on data base
         */
        public function insert() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('title', 'Título', 'required');
            if($this->form_validation->run() == FALSE) {
                $this->create();  // Display create article view

            } else {
                $register['user_id'] = $this->session->userdata('user_id');
                $register['created'] = date('Y/m/d H:i');
                $register['updated'] = date('Y/m/d H:i');
                
                $this->Model_Article->insert($register);
                redirect('article/index');
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