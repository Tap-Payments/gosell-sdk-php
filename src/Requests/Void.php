<?php

namespace TapPayments\Requests;

/**
 * Trait for updateable resources. Adds a `update()` static method to the class.
 *
 * This trait should only be applied to classes that derive from GoSellObjects.
 */
trait Void
{
    
    public static function void( $id = null, $options = null)
    {
        self::_validateKey();
        $params=[];
        self::_validateQueryString($id);
        $url = static::baseUrl().static::classUrl().'/'.$id .'/void';
        
        $response = static::_staticRequest('POST', $url, $params, $options);

        return $response;
    }

}
