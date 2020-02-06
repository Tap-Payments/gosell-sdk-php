<?php
/**GoSell Base Class*/
namespace TapPayments;

class GoSell
{
	
    public static $privateKey;
    public static function setPrivateKey($key)
    {
        self::$privateKey = $key;
    }
}
