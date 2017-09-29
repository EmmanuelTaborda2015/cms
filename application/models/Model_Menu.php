<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_Menu extends CI_Model {

        function __construct() {
            parent::__construct();
        }

        /**
         * Display all menu on database
         * 
         * @param type $field
         * @param type $value
         * @return type query result
         */
        function all($field = '', $value = '') {
            $query = $this->db->get('menu');
            return $query->result();
        }
        
        /**
         * Display menu filtered by field and value
         * 
         * @param type $field
         * @param type $value
         * @return type
         */
        function all_filter($field, $value) {
            $this->db->like($field, $value);
            $query = $this->db->get('menu');
            return $query->result();
        }
        
        /**
         * Find all menu ordered by the customize order field
         * @return type
         */
        function all_ordered() {
            $this->db->order_by('menu_order', 'asc');
            $query = $this->db->get('menu');
            return $query->result();
        }
        
        /**
         * Find all menu ordered by the customize order field
         * @return type
         */
        function all_profile($user) {
        	$this->db->select('menu.*');
        	$this->db->from('menu');
        	$this->db->join('menu_profile', 'menu.id = menu_profile.menu_id', '');
        	$this->db->join('user', 'user.profile_id = menu_profile.profile_id', '');
        	$this->db->where("user.id", $user);
        	$query = $this->db->get();
        	return $query->result();
        }
        
        /**
         * Find menu by id
         * 
         * @param type $id
         * @return type
         */
        function find($id) {
            $this->db->where('id', $id);
            return $this->db->get('menu')->row();
        }
        
        /**
         * Insert menu on database
         * @param type $register
         */
        function insert($register) {
            $this->db->set($register);
            $this->db->insert('menu');
        }
        
        /**
         * Update menu table with register data
         * @param type $register
         */
        function update($register) {
            $this->db->set($register);
            $this->db->where('id', $register['id']);
            $this->db->update('menu');
        }
        
        /**
         * Delete menu row
         * @param type $id
         */
        function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('menu');
        }
        
    }

?>