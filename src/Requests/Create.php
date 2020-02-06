<?php

namespace TapPayments\Requests;

/**
 * Trait for creatable resources. Adds a `create()` static method to the class.
 *
 * This trait should only be applied to classes that derive from GoSellObjects.
 */
trait Create
{
    
    public static function create($params = null, $options = null)
    {
        self::_validateKey();
        self::_validateParams('POST',$params);
        $url = static::baseUrl().static::classUrl();

        $response = static::_staticRequest('POST', $url, $params, $options);

        return $response;
    }

}
