<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/**
 * Class to controll the menu permissions
 */

    class Menu_Library {

        public function __construct() {
            $this->CI = & get_instance();  // Access to instance
        }

        /**
         * Personalized form validations to menu, and return message
         * 
         * @param type $register
         * @return boolean
         */
        public function my_validation($register) {
            $controller = ($register['controller'] != '');
            $action = ($register['action'] != '');
            $url = ($register['url'] != '');
            
            if(!$controller AND !$action AND !$url) {
                $this->CI->form_validation->set_message('my_validation', 'Debe ingresar Controlador y Acción o una URL');
                return FALSE;
            }
            
            // If isset controller, user must write an action
            if($controller AND !$action) {
                $this->CI->form_validation->set_message('my_validation', 'Ingresó controlador, falta acción');
                return FALSE;
            }
            
            if(!$controller AND $action) {
                $this->CI->form_validation->set_message('my_validation', 'Ingresó acción, falta controlador');
                return FALSE;
            }
            
            // If source is a url, no controller controlls it
            if($url AND ($controller OR $action)) {
                $this->CI->form_validation->set_message('my_validation', 'Si ingresa URL, no debe ingresar controlador o acción');
                return FALSE;
            }
            
            return TRUE;
        }
        
        /**
         * Return assigned and not assigned profiles for user
         * 
         * @param type $menu_id
         * @return type array
         */
        public function get_profiles($menu_id) {
            $assigned = array();
            $not_assigned = array();
            
            $this->CI->load->model('Model_Profile');
            $profiles = $this->CI->Model_Profile->all();
            
            // Get the array profile
            foreach($profiles as $profile) {
                $this->CI->db->where('menu_id', $menu_id);
                $this->CI->db->where('profile_id', $profile->id);
                $query = $this->CI->db->get('menu_profile');
                
                // If query return one or more rows, profile is assigned to a menu
                if($query->num_rows() > 0) {
                    $assigned[] = array($profile->id, $profile->name, $menu_id);
                } else {
                    $not_assigned[] = array($profile->id, $profile->name, $menu_id);
                }
            }
            
            return array($not_assigned, $assigned);
        }
        
        /**
         * 
         * @param type $controller
         * @return type menu
         */
        public function find_by_controller($controller) {
            $this->CI->db->where('controller', $controller);
            return $this->CI->db->get('menu')->row();
        }

    }
        
    
?>