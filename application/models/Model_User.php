<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_User extends CI_Model {

        function __construct() {
            parent::__construct();
        }

        /**
         * Display all users from table
         * @return type
         */
        function all() {
            // Get profile name from profile table
            $this->db->select('user.*, profile.name as profile_name');
            $this->db->from('user');
            $this->db->join('profile', 'user.profile_id = profile.id', 'left');
            
            $query = $this->db->get();
            return $query->result();
        }
        
        /**
         * Find all users filter by field and value
         * 
         * @param type $field
         * @param type $value
         * @return type
         */
        function all_filter($field, $value) {
            // Get profile name from profile table
            $this->db->select('user.*, profile.name as profile_name');
            $this->db->from('user');
            $this->db->join('profile', 'user.profile_id = profile.id', 'left');
            $this->db->like($field, $value);
            
            $query = $this->db->get();
            return $query->result();
        }
        
        /**
         * Find user by id
         * 
         * @param type $id
         * @return type
         */
        function find($id) {
            $this->db->where('id', $id);
            return $this->db->get('user')->row();
        }
        
        /**
         * Insert user in database
         * @param type $register
         */
        function insert($register) {
            $this->db->set($register);
            $this->db->insert('user');
        }
        
        /**
         * Update user row by id
         * @param type $register
         */
        function update($register) {
            $this->db->set($register);
            $this->db->where('id', $register['id']);
            $this->db->update('user');
        }
        
        /**
         * Delete user row
         * @param type $id
         */
        function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('user');
        }
        
        /**
         * Get user by login and password
         * 
         * @param type $user
         * @param type $password
         * @return type
         */
        function get_login($user, $password) {
            $this->db->where('login', $user);
            $this->db->where('password', $password);
            return $this->db->get('user');
        }
        
        /**
         * Get profile list
         * @return type
         */
        function get_profiles() {
            $profile_list = array();
            $this->load->model('Model_Profile');
        
            // Get all profiles
            $registers = $this->Model_Profile->all();
            foreach ($registers as $register) {
                $profile_list[$register->id] =$register->name;
            }
            return $profile_list;
        }

    }

?>