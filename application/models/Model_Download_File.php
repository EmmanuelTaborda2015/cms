<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_Download_File extends CI_Model {

        function __construct() {
            parent::__construct();
        }

        /**
         * Display all files of user from table
         * @return files
         */
        function get_files($user) {
        	$this->db->order_by('type_file.id_type_file', 'asc');
            $this->db->select('file.*, type_file.description');
            $this->db->from('file');
            $this->db->join('type_file', 'type_file.id_type_file = file.type_file', '');
            $this->db->where("file.registration_status","AC");
            $where = "(file.owner = '$user' or file.owner = '2')";
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }
        
        function find_file($id) {
        	$this->db->select('file.*, type_file.description');
        	$this->db->from('file');
        	$this->db->join('type_file', 'type_file.id_type_file = file.type_file', '');
        	$this->db->where('file.id_file', $id);
        	$query = $this->db->get();
        	return $query->result();
        }
        
    }

?>