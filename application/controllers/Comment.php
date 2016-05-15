<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Comment extends CI_Controller {

        public function __construct(){
            parent::__construct();
            
            // Load model
            $this->load->model('Model_Comment');
            $this->load->model('Model_Article');

	}

        /**
         * Display the comments's index
         */
        public function index() {
            $data['content'] ='comment/index';
            $data['title'] = 'Artículos';
            $data['query'] = $this->Model_Comment->all_ordered();
            $this->load->view('template',$data);
        }

        /**
         * Search for a comment
         */
        public function search() {
            $data['content'] ='comment/index';
            $data['title'] = 'Comentarios';
            $value = $this->input->post('search');
            $data['query'] = $this->Model_Comment->all_filter('title', $value);
            $this->load->view('template',$data);
        }

        /**
         * Call comment library to no_reply function
         * @return type
         */
        public function no_reply() {
            return $this->comment_library->no_reply($this->input->post());
        }

        /**
         * Edit the id comment and load the view
         * @param type $id
         */
        public function edit($id) {           
            $data['content'] ='comment/edit_form';
            $data['title'] = 'Actualizar vomentario';
            $data['register'] = $this->Model_Comment->find($id);

            $this->load->view('template',$data);
        }

        /**
         * Update comment with form data
         */
        public function update() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('content', 'Contenido', 'required');
            if($this->form_validation->run() == FALSE) {
                $this->edit($register['id']);

            } else {
                $register['updated'] = date('Y/m/d H:i');
                $register['user_id'] = $this->session->userdata('user_id');
                // We don't need update the alias
                unset($register['author']);
                unset($register['title']);
                $this->Model_Comment->update($register);
                redirect('comment/index');
            }
        }

        /**
         * Display create comment view
         */
        public function create() {        
            $data['content'] ='comment/create_form';
            $data['title'] = 'Crear comentario';
            $data['articles'] = $this->Model_Comment->get_articles();
            $this->load->view('template',$data);
        }

        /**
         * Insert comment on data base
         */
        public function insert() {
            $register = $this->input->post();
            
            // Field validation
            $this->form_validation->set_rules('content', 'Contenido', 'required');
            if($this->form_validation->run() == FALSE) {
                $this->create();  // Display create comment view

            } else {
                $register['user_id'] = $this->session->userdata('user_id');
                $register['created'] = date('Y/m/d H:i');
                $register['updated'] = date('Y/m/d H:i');
                $this->Model_Comment->insert($register);

                redirect('comment/index');
            }
        }

        /**
         * Create comment for specific article
         * @param type $id
         */
        public function direct_create($id) {        
            $data['content'] ='comment/create_form';
            $data['title'] = 'Crear comentario';
            $data['articles'] = $this->Model_Comment->get_articles();
            $this->load->view('template',$data);
        }

        /**
         * Delete article with the param id
         * @param type $id
         */
        public function delete($id) {
            $this->Model_Comment->delete($id);
            redirect('comment/index');
        }

    }

?>