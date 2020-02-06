<?php

namespace TapPayments\GoSell;
use \TapPayments\Api;
class Authorize extends Api
{
	use \TapPayments\Requests\Create;
	use \TapPayments\Requests\Retrieve;
	use \TapPayments\Requests\Update;
	use \TapPayments\Requests\Void;
	use \TapPayments\Requests\All;
    protected static $endpoint='/v2/authorize';
    private static function classUrl()
    {
        return self::$endpoint;
    }
}
