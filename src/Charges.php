<?php

namespace TapPayments\GoSell;
use \TapPayments\Api;
class Charges extends Api
{
	use \TapPayments\Requests\Create;
	use \TapPayments\Requests\Retrieve;
	use \TapPayments\Requests\Update;
	use \TapPayments\Requests\All;
    protected static $endpoint='/v2/charges';
    private static function classUrl()
    {
        return self::$endpoint;
    }
}
