<?php
// helper to log user's activity to redis

defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('logger'))
{
	
	function logger()
	{
		
		$ci =& get_instance();
		$class_name = $ci->router->fetch_class();
		$method_name = $ci->router->fetch_method(); 
		
		$ip_address = $ci->input->ip_address();
		$user_agent = $ci->input->user_agent();
		
		//update the list to include other actions
		$monitored_actions = array(
			'register', 
			'login',
			'logout'
		);
		
		
		if(in_array($method_name, $monitored_actions)){
		
			$arr_data = array(		
				'ip_address' => $ip_address,
				//'user_agent' => $user_agent,
				'class_name' => $class_name,
				'method_name' => $method_name,
				'time' => date('Y-m-d H:i:s')
			);
			
			$ci->redis->rpush($ip_address, json_encode($arr_data));
			
/* 			echo '<pre>';
			print_r($arr_data);
			echo '</pre>';	 */
		}
		

	}

}

