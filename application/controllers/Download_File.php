<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Download_File extends CI_Controller {

        public function __construct(){
            parent::__construct();
            
            // Load model and library
            $this->load->model('Model_Download_File');
            $this->load->library('user_library');
            
	}
        
        /**
         * Display the download file´s index
         */
        public function index() {
            $data['content'] ='download_file/index';
            $data['title'] = 'Descargar Documentos';
            $data['query'] = $this->Model_Download_File->get_files($this->session->userdata('user_id'));
            
            $this->load->view('template',$data);
        }
        
        public function download($file) {
        	
        	$data['query'] = $this->Model_Download_File->find_file($file);
        	
        	$info_file = $data['query'] [0];
        	
        	header('Content-Type: application/pdf');
        	header('Content-Disposition: attachment; filename=' . $info_file->description . '.pdf');
        	header('Pragma: no-cache');
        	readfile($info_file->path);
        }
        
    }

?>