<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/**
 * Class controlls users
 */

    class User_Library {

        public function __construct() {
            $this->CI = & get_instance();  // Access to instance
            
            // Load models
            $this->CI->load->model('Model_User');
            $this->CI->load->model('Model_Profile');
        }

        /**
         * Return if the login is correct
         * 
         * @param type $user
         * @param type $password
         * @return boolean
         */
        public function login($user, $password) {
            $query = $this->CI->Model_User->get_login($user, $password);

            // If query return some row
            if($query->num_rows() > 0) {
                $user = $query->row();
                $profile = $this->CI->Model_Profile->find($user->profile_id);  // Search user
                $session_data = array('user' => $user->name,
                                    'user_id' => $user->id,
                                    'profile_id' => $user->profile_id,
                                    'profile_name' => $profile->name);
            $this->CI->session->set_userdata($session_data);
            return TRUE;
            } else {
                $this->CI->session->sess_destroy();
                return FALSE;
            }
        }

        /**
         * Allows user to change his password
         * 
         * @param type $current
         * @param type $new
         * @return boolean
         */
        public function change_password($current, $new) {

            // Check if user is already loged
            if($this->CI->session->userdata('user_id') == null) {
                return FALSE;
            }

            $id = $this->CI->session->userdata('user_id');
            $user = $this->CI->Model_User->find($id);

            // Check current password
            if($user->password == $current) {
                $data = array('id' => $id,
                            'password' => $new);
                $this->CI->Model_User->update($data);
            } else {
                return FALSE;
            }
        }

        /**
         * Return true or false if the name is not the same and it isn't the same field
         * 
         * @param type $register
         * @return boolean
         */
        public function no_reply($register) {
            $this->CI->db->where('login', $register['login']);
            $query = $this->CI->db->get('user');
            
            if ($query->num_rows() > 0 AND (!isset($register['id']) OR ($register['id'] != $query->row('id')))) {
                return FALSE;
            } else {
                return TRUE;
            }
        }
        
        /**
         * Generate a random string to use as password
         * @param type $length
         * @return type
         */
        public function random_string($length = 8) {
            $characters = range('a', 'z');
            array_push($characters, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
            $alpha_lengh = count($characters) - 1;
            $random_string = '';
            for ($i = 0; $i < $length; $i++) {
                $random_string .= $characters[rand(0, $alpha_lengh)];
            }
            
            return $random_string;
        }
        
        /**
         * Send email that contain user password
         * @param type $adressee
         * @return type
         */
        public function send_email($adressee = 'dawwman@gmail.com') {
            $user_password = $this->random_string(8);
            $title = "Autentificación myWeb";
            $message = "<html><body>"
                    . "Muchas gracias por registrarse en miWeb.<br>"
                    . "La autentificacion para su acceso es <b>$user_password</b>. "
                    . "Puede modificarlo en cualquier momento desde el panel de control.<br>"
                    . "Un coordial saludo.<br>"
                    . "<br>"
                    . "<i>Este mensaje es autogenerado, no responda a este correo</i>"
                    . "</body></html>";
            $header  = 'MIME-Version: 1.0' . "\r\n"
                    . 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            mail($adressee, $title, $message, $header);
            
            return $user_password;
        }
        
    }
        
    
?>