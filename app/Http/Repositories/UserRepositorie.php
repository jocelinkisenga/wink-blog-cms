<?php

namespace App\Http\Repositories;
use Wink\WinkAuthor;

class UserRepositorie {

	public static function user_posts($data){

		foreach($data as $data){
			$user_id = $data->author_id;
			return $user_id;
		}

	}

	public static function user_name($data){
			$user_name = WinkAuthor::where('id', self::user_posts($data))->first();
			return $user_name;
	}
}