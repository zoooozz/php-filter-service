<?php

/**
 * 	@var 统一错误码集合
 * 	功能:
 * 	错误码提供
 */

namespace app\Foundation;

class Response
{

	public static function _end($params,$code)
	{
		$params['code'] = $code;
        return json_encode($params);
	}

}