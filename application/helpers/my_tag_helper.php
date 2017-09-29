<?php
  
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    #validation error control
    if ( ! function_exists('my_validation_errors')){

        function my_validation_errors($errors) {
            #Message for error alerts
            $exitAlert = '';

            if ($errors) {
                $exitAlert = '<div class="alert alert-error">';
                $exitAlert = $exitAlert.'<button type="button" class="close" data-dismiss="alert"> × </button>';
                $exitAlert = $exitAlert.'<h4> Mensajes Validaci&oacute;n </h4></br>';
                $exitAlert = $exitAlert.'<small>'.$errors.'</small>';
                $exitAlert = $exitAlert.'</div>';
            }

            return $exitAlert;
        }
    }

    if ( ! function_exists('my_menu_ppal')) {

        function my_menu_ppal() {
            $options = '<li>'.anchor('home/index', "<i class='icon-home icon-white'></i>").'</li>';

            if (get_instance()->session->userdata('user')) {
                $options = $options.'<li>'.anchor('home/show_user', "<i class='icon-user icon-white'></i>").'</li>';
                $options = $options.'<li>'.anchor('home/closeSession', "<i class='icon-off icon-white'></i>").'</li>';
            } else {
                $options = $options.'<li>'.anchor('home/register_form', "<i class='icon-user icon-white'></i>").'</li>';
            }

            return $options;
        }
    }
    
    if ( ! function_exists('my_menu_app')) {

        function my_menu_app() {
            $options = NULL;

            if (get_instance()->session->userdata('user')) {
                get_instance()->load->model('Model_Menu');
                $options = '';
                $query = get_instance()->Model_Menu->all_profile(get_instance()->session->userdata('user_id'));
                foreach ($query as $option) {
                    if ($option->url !='') {
                        $link = $option->url;
                    } else {
                        $link = $option->controller . '/' . $option->action;
                    }
                    $options = $options . '<li>' . anchor($link, $option->name) . '<li>';
                }
                
            } else {
                $options = $options.'<li>'.anchor('home/register_form', 'Ingreso').'</li>';
            }

            return $options;
        }
    }
    
    if ( ! function_exists('my_validation_success')){
    	
    	function my_validation_success($message) {
    		#Message for error alerts
    		$exitAlert = '';
    		
    		if ($message != "") {
    			$exitAlert = '<div class="alert alert-success">';
    			$exitAlert = $exitAlert.'<button type="button" class="close" data-dismiss="alert"> × </button>';
    			$exitAlert = $exitAlert.'<h4> Registro Exitoso </h4>';
    			$exitAlert = $exitAlert.'<small>'.$message.'</small>';
    			$exitAlert = $exitAlert.'</div>';
    			
    		}
    		
    		return $exitAlert;
    	}
    }
    
    if ( ! function_exists('my_validation_alert')){
    	
    	function my_validation_alert($message) {
    		#Message for error alerts
    		$exitAlert = '';
    		
    		if ($message != "") {
    			$exitAlert = '<div class="alert alert-error">';
    			$exitAlert = $exitAlert.'<button type="button" class="close" data-dismiss="alert"> × </button>';
    			$exitAlert = $exitAlert.'<h4> Error </h4>';
    			$exitAlert = $exitAlert.'<small>'.$message.'</small>';
    			$exitAlert = $exitAlert.'</div>';
    		}
    		
    		return $exitAlert;
    	}
    }

?>