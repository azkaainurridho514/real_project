<?php

Class Template{
     var $templet_data = [];

     function set($name, $value)
     {
       $this->template_data[$name] = $value;
     }
     function load($template = '', $view = '', $view_data = [], $return = FALSE)
     {
       $this->CI =& get_instance();
       $this->set('content', $this->CI->load->view($view, $view_data, TRUE));
       return $this->CI->load->view($template, $this->template_data, $return); 
     }
}