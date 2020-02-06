<?php

namespace TapPayments\Requests;

/**
 * Trait for updateable resources. Adds a `update()` static method to the class.
 *
 * This trait should only be applied to classes that derive from GoSellObjects.
 */
trait All
{
    
    public static function all( $params = null, $options = null)
    {
        self::_validateKey();
        self::_validateParams('POST',$params);
        
        $url = static::baseUrl().static::classUrl().'/list';

        $response = static::_staticRequest('POST', $url, $params, $options);

        return $response;
    }

}
