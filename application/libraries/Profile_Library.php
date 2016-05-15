<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/**
 * Class controlls the profile user (roles)
 */

    class Profile_Library {

        public function __construct() {
            $this->CI = & get_instance();  // Access to instance
            
            // Load models
            $this->CI->load->model('Model_Profile');
        }

        /**
         * Return true or false if the name is not the same and it isn't the same field
         * 
         * @param type $register
         * @return boolean
         */
        public function no_reply($register) {
            $this->CI->db->where('name', $register['name']);
            $query = $this->CI->db->get('profile');

            if ($query->num_rows() > 0 AND (!isset($register['id']) OR ($register['id'] != $query->row('id')))) {
                return FALSE;
            } else {
                return TRUE;
            }
        }

    }
        
    
?>