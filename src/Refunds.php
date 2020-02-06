<?php

namespace TapPayments\GoSell;
use \TapPayments\Api;
class Refunds extends Api
{
	use \TapPayments\Requests\Create;
	use \TapPayments\Requests\Retrieve;
	use \TapPayments\Requests\Update;
	use \TapPayments\Requests\All;
    protected static $endpoint='/v2/refunds';
    private static function classUrl()
    {
        return self::$endpoint;
    }
}
