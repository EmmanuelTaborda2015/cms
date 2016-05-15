<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_Profile extends CI_Model {

        function __construct() {
            parent::__construct();
        }

        /**
         * Display all profiles
         * 
         * @param type $field
         * @param type $value
         * @return type query result
         */
        function all($field = '', $value = '') {
            $query = $this->db->get('profile');
            return $query->result();
        }
        
        /**
         * Filter by field and value
         * 
         * @param type $field
         * @param type $value
         * @return type
         */
        function all_filter($field, $value) {
            $this->db->like($field, $value);
            $query = $this->db->get('profile');
            return $query->result();
        }
        
        /**
         * Find profile by id
         * 
         * @param type $id
         * @return type
         */
        function find($id) {
            $this->db->where('id', $id);
            return $this->db->get('profile')->row();
        }
        
        /**
         * Insert profile on database
         * @param type $register
         */
        function insert($register) {
            $this->db->set($register);
            $this->db->insert('profile');
        }
        
        /**
         * Update profile where id = register id
         * @param type $register
         */
        function update($register) {
            $this->db->set($register);
            $this->db->where('id', $register['id']);
            $this->db->update('profile');
        }
        
        /**
         * Delete profile
         * @param type $id
         */
        function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('profile');
        }
        
    }

?>