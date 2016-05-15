<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_Comment extends CI_Model {

        function __construct() {
            parent::__construct();
        }

        /**
         * Display all articles (an author) on database
         * 
         * @param type $field
         * @param type $value
         * @return type
         */
        function all($field = '', $value = '') {
            $this->db->select('comment.*, user.name as author');
            $this->db->from('comment');
            $this->db->join('user', 'comment.user_id = user.id', 'left');
            
            $query = $this->db->get();
            return $query->result();
        }

        /**
         * Display all comment ordered by updated date
         * @return type
         */
        function all_ordered() {
            $this->db->select('comment.*, user.name as author, article.title as title');
            $this->db->from('comment');
            $this->db->join('user', 'comment.user_id = user.id', 'left');
            $this->db->join('article', 'comment.article_id = article.id', 'left');
            
            // Order by updated date
            $this->db->order_by('created', 'asc');
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
            $this->db->select('comment.*, user.name as author, article.title as title');
            $this->db->from('comment');
            $this->db->join('user', 'comment.user_id = user.id', 'left');
            $this->db->join('article', 'comment.article_id = article.id', 'left');
            
            // Order by updated date
            $this->db->order_by('created', 'asc');
            $this->db->like($field, $value);
            $query = $this->db->get();
            return $query->result();
        }
         
        /**
         * Find comment by id. Display author and title
         * 
         * @param type $id
         * @return type
         */
        function find($id) {
            $this->db->select('comment.*, user.name as author, article.title as title');
            $this->db->from('comment');
            $this->db->join('user', 'comment.user_id = user.id', 'left');
            $this->db->join('article', 'comment.article_id = article.id', 'left');
            
            $this->db->where('comment.id', $id);
            return $this->db->get()->row();
        }
        
        /**
         * Insert comment on database
         * @param type $register
         */
        function insert($register) {
            $this->db->set($register);
            $this->db->insert('comment');
        }
        
        /**
         * Update comment where id = register id
         * @param type $register
         */
        function update($register) {
            $this->db->set($register);
            $this->db->where('id', $register['id']);
            $this->db->update('comment');
        }
        
        /**
         * Delete comment by id
         * @param type $id
         */
        function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('comment');
        }
        
        /**
         * Return article list
         * @return type
         */
        function get_articles() {
            $article_list = array();
            $this->load->model('Model_Article');
            
            $registers = $this->Model_Article->all();
            foreach ($registers as $register) {
                $article_list[$register->id] =$register->title;
            }
            return $article_list;
        }
        
    }

?>