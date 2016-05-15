<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_Article extends CI_Model {

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
        function all($field = '', $value = '') {
            $this->db->select('article.*, user.name as author');
            $this->db->from('article');
            $this->db->join('user', 'article.user_id = user.id', 'left');
            
            $query = $this->db->get();
            return $query->result();
        }
        
        /**
         * Display all article ordered by updated date
         * @return type
         */
        function all_ordered() {
            $this->db->select('article.*, user.name as author');
            $this->db->from('article');
            $this->db->join('user', 'article.user_id = user.id', 'left');
            
            // Order by updated date
            $this->db->order_by('updated', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
        
        /**
         * Filter and order by field and value
         * 
         * @param type $field
         * @param type $value
         * @return type
         */
        function all_filter($field, $value) {
            $this->db->select('article.*, user.name as author');
            $this->db->from('article');
            $this->db->join('user', 'article.user_id = user.id', 'left');
            
            // Order by updated date
            $this->db->order_by('updated', 'desc');
            $this->db->like($field, $value);
            $query = $this->db->get();
            return $query->result();
        }
        
        /**
         * Find article by id
         * 
         * @param type $id
         * @return type
         */
        function find($id) {
            $this->db->select('article.*, user.name as author');
            $this->db->from('article');
            $this->db->join('user', 'article.user_id = user.id', 'left');
            
            $this->db->where('article.id', $id);
            return $this->db->get()->row();
        }
        
        /**
         * Insert article on database
         * @param type $register
         */
        function insert($register) {
            $this->db->set($register);
            $this->db->insert('article');
        }
        
        /**
         * Update article where id = register id
         * @param type $register
         */
        function update($register) {
            $this->db->set($register);
            $this->db->where('id', $register['id']);
            $this->db->update('article');
        }
        
        /**
         * Delete article id
         * @param type $id
         */
        function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('article');
        }
        
    }

?>