<?php

namespace TapPayments\GoSell;
use \TapPayments\Api;
class Customers extends Api
{
	use \TapPayments\Requests\Create;
	use \TapPayments\Requests\Retrieve;
	use \TapPayments\Requests\Update;
	use \TapPayments\Requests\Delete;
	use \TapPayments\Requests\All;
    protected static $endpoint='/v2/customers';
    private static function classUrl()
    {
        return self::$endpoint;
    }
}
