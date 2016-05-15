<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_Menu_Profile extends CI_Model {

        function __construct() {
            parent::__construct();
        }

        /**
         * Display all menu_pro on database
         * 
         * @param type $field
         * @param type $value
         * @return type query result
         */
        function all($field = '', $value = '') {
            $this->db->select('menu_profile.*, menu.name as menu_name, profile.name as profile_name');
            $this->db->from('menu_profile');
            $this->db->join('menu', 'menu_profile.menu_id = menu.id', 'left');
            $this->db->join('profile', 'menu_profile.profile_id = profile.id', 'left');
            
            $query = $this->db->get();
            return $query->result();
        }
        
        /**
         * Display all menu_profile filtered by field and value
         * @return type
         */
        function all_filter($field, $value) {
            $this->db->select('menu_profile.*, menu.name as menu_name, profile.name as profile_name');
            $this->db->from('menu_profile');
            $this->db->join('menu', 'menu_profile.menu_id = menu.id', 'left');
            $this->db->join('profile', 'menu_profile.profile_id = profile.id', 'left');
            $this->db->like($field, $value);
            
            $query = $this->db->get();
            return $query->result();
        }
        
        /**
         * Find menu_profile by id
         * @param type $id
         * @return type
         */
        function find($id) {
            $this->db->where('id', $id);
            return $this->db->get('menu_profile')->row();
        }
        
        /**
         * Indert menu_profile relation
         * @param type $register
         */
        function insert($register) {
            $this->db->set($register);
            $this->db->insert('menu_profile');
        }
        
        /**
         * Update menu_profile row with 
         * @param type $register
         */
        function update($register) {
            $this->db->set($register);
            $this->db->where('id', $register['id']);
            $this->db->update('menu_profile');
        }
        
        /**
         * Delete menu_profile relation
         * @param type $id
         */
        function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('menu_profile');
        }
        
        /**
         * Get list of all menu
         * @return type
         */
        function get_menus() {
            $menu_list = array();
            $this->load->model('Model_Menu');
            
            $registers = $this->Model_Menu->all();
            foreach ($registers as $register) {
                $menu_list[$register->id] =$register->name;
            }
            return $menu_list;
        }
        
        /**
         * Get list of all profile
         * @return type
         */
        function get_profiles() {
            $profile_list = array();
            $this->load->model('Model_Profile');
            
            $registers = $this->Model_Profile->all();
            foreach ($registers as $register) {
                $profile_list[$register->id] =$register->name;
            }
            return $profile_list;
        }
        
    }

?>