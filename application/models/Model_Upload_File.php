<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_Upload_File extends CI_Model {

        function __construct() {
            parent::__construct();
        }

        /**
         * Display all articles (an author) on database
         * 
         * @param type $field
         * @param type $value
         * @return type query result
         */
        function get_type_files() {
        	$this->db->select('type_file.id_type_file, type_file.description');
        	$this->db->from('type_file');
        	$query = $this->db->get();
        	return $query->result();
        }
        
        
        function get_users($profile) {
        	$this->db->select('user.id, user.name');
        	$this->db->from('user');
        	$this->db->where('user.profile_id', $profile);
        	$query = $this->db->get();
        	return $query->result();
        }
        
        function exist_file($data) {
        	$this->db->select('file.*');
        	$this->db->from('file');
        	$data = array("file.owner"=>$data['owner'],"type_file"=>$data['type_file']);
        	$this->db->where($data);
        	$query = $this->db->get();
        	return $query->result();
        }
        
        /**
         * Display all files of user from table
         * @return files
         */
        function get_all_files() {
        	$this->db->select('file.*, type_file.description, type_file.total, creator.name as creator, owner.name as owner');
        	$this->db->from('file');
        	$this->db->join('type_file', 'type_file.id_type_file = file.type_file', '');
        	$this->db->join('user as owner', 'owner.id = file.owner', '');
        	$this->db->join('user as creator', 'creator.id = file.creator', '');
        	//$this->db->where('file.owner', $user);
        	$this->db->order_by('type_file.id_type_file', 'asc');
        	$query = $this->db->get();
        	return $query->result();
        }
        
        /**
         * Insert File on database
         * @param type $register
         */
        function insert($register) {
        	$this->db->set($register);
        	$this->db->insert('file');
        }
        
        function find($id) {
        	$this->db->select('file.*, type_file.description, type_file.total');
        	$this->db->from('file');
        	$this->db->join('type_file', 'type_file.id_type_file = file.type_file', '');
        	$this->db->where('file.id_file', $id);
        	$query = $this->db->get();
        	return $query->result();
        }
        
        /**
         * Update file row by id
         * @param type $register
         */
        function update($register) {
        	$this->db->set($register);
        	$this->db->where('id_file', $register['id_file']);
        	$this->db->update('file');
        }
    }

?>