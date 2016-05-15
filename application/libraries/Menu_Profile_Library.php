<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/**
 * Class controlls the menu-profile assignation
 */

    class Menu_Profile_Library {

        public function __construct() {
            $this->CI = & get_instance();  // Access to instance
            
            // Load models
            $this->CI->load->model('Model_Menu_Profile');
        }

        /**
         * Return true or false if the name is not the same and it isn't the same field
         * 
         * @param type $register
         * @return boolean
         */
        public function no_reply($register) {
            $this->CI->db->where('menu_id', $register['menu_id']);
            $this->CI->db->where('profile_id', $register['profile_id']);
            $query = $this->CI->db->get('menu_profile');
            
            if ($query->num_rows() > 0 AND (!isset($register['id']) OR ($register['id'] != $query->row('id')))) {
                return FALSE;
            } else {
                return TRUE;
            }
        }

        /**
         * Set profile access to menu
         * 
         * @param type $profile_id
         * @param type $menu_id
         */
        public function set_access($profile_id, $menu_id) {
            $register = array();
            $register['profile_id'] = $profile_id;
            $register['menu_id'] = $menu_id;
            $register['created'] = date('Y/m/d H:i');
            $register['updated'] = date('Y/m/d H:i');
            $this->CI->Model_Menu_Profile->insert($register);
        }

        /**
         * Deny profile access to menu
         * 
         * @param type $profile_id
         * @param type $menu_id
         */
        public function deny_access($profile_id, $menu_id) {
            $this->CI->db->where('profile_id', $profile_id);
            $this->CI->db->where('menu_id', $menu_id);
            $this->CI->db->delete('menu_profile');
        }

        /**
         * Query in menu_profile table
         * 
         * @param type $menu_id
         * @param type $profile_id
         * @return type db row
         */
        public function find_by_menu_profile($menu_id, $profile_id) {
            $this->CI->db->where('menu_id', $menu_id);
            $this->CI->db->where('profile_id', $profile_id);
            return $this->CI->db->get('menu_profile')->row();
        }

    }
        
    
?>