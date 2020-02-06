<?php

namespace TapPayments\Requests;

/**
 * Trait for Retrieveable resources. Adds a `Retrieve()` static method to the class.
 *
 * This trait should only be applied to classes that derive from GoSellObjects.
 */
trait Retrieve
{
	public static function retrieve($id = null, $options = null)
    {
        self::_validateKey();
        self::_validateQueryString($id);
        $url = static::baseUrl().static::classUrl().'/'.$id;

        $response = static::_staticRequest('GET', $url, null, $options);

        return $response;
    }
}