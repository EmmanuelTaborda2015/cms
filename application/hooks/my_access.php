<?php
  
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    // Validation error control
    if ( ! function_exists('autentification')){

        // Autentificate user
        function autentification() {
            $CI = & get_instance();
            
            // Use segments as params
            $controller = $CI->uri->segment(1);
            $action = $CI->uri->segment(2);
            $url = $controller . '/' . $action;
            
            // Controllers and action free to use
            $white_list = array(
                '/',
                'home/index',
                'home/about_us',
                'home/access_denied',
                'home/closeSession',
                'home/register_form',
                'home/user_register',
                'home/login_ok',
                'home/show_user',
                'home/change_password_form',
                'home/validate_password',
                'home/change_ok',
                'user/create',
                'user/insert'
            );
        
            if(in_array($url, $white_list)) {
                echo $CI->output->get_output();
            } else {
                
                // If controller isn't on white list
                if($CI->session->userdata('user')) {
                    if(authorize()){
                        echo $CI->output->get_output();
                    } else {
                        redirect('home/access_denied');
                    }
                } else {
                    redirect('home/access_denied');
                }
            }
        }
    }
    
    // Return true or false if user is autorized to use controller
    function authorize() {
        $CI = & get_instance();
        
        $profile_id = $CI->session->userdata('profile_id');
        
        $CI->load->library('menu_library');
        $controller = $CI->uri->segment(1);  // Use segment as param
        $menu = $CI->menu_library->find_by_controller($controller);  // Find menu by controller
        
        if(!$menu) {
            return FALSE;
        }
       
        $CI->load->library('menu_profile_library');
        $menu_id = $menu->id;
        $access = $CI->menu_profile_library->find_by_menu_profile($menu_id, $profile_id);
        if(!$access) {
            return FALSE;
        }
        
        return TRUE;
                
    }

?>