<?php
	function get_db_config()
	{
		if(getenv('IS_IN_HEROKU')){
			$url = parse_url(getenv("DATEBASE_URL"));
			
			return $db_config = [ 
				'connection' => 'pgsql',
				'host' => $url["host"],
				'datebase' => substr($url["path"],1),
				'username' =>$url["user"],
				'password' => $url["pass"],
			];
		}else{
			return $db_config = [
				'connection' => env('DB_CONNECTION','mysql'),
				'host' => env('DB_HOST','localhost'),
				'datebase' => env('DB_DATEBASE','forge'),
				'username' => env('DB_USERNAME','forge'),
				'password' => env('DB_PASSWORD',''),
			];
		}
	}