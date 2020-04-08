
![PHP from Packagist (specify version)](https://img.shields.io/packagist/php-v/tappayments/gosell)
[![Latest Stable Version](https://poser.pugx.org/tappayments/gosell/v/stable)](https://packagist.org/packages/tappayments/gosell)
[![Build Status](https://travis-ci.com/tappayments/gosell.svg?branch=master)](https://travis-ci.com/tappayments/gosell)
[![Total Downloads](https://poser.pugx.org/tappayments/gosell/downloads)](https://packagist.org/packages/tappayments/gosell)
[![License](https://poser.pugx.org/tappayments/gosell/license)](https://packagist.org/packages/tappayments/gosell)
[![Coverage Status](https://coveralls.io/repos/github/tappayments/gosell/badge.svg?branch=master)](https://coveralls.io/github/tappayments/gosell?branch=master)


# GoSell PHP SDK
Official bindings to GoSell API.

__Note: Detailed REST API request and response schema can be found at [API Documentation](https://tap.company/developers)__

## Requirements
This library supports PHP 5.6 and later.

## Installation
The recommended way to install GoSell PHP SDK is through [Composer](https://getcomposer.org):

```composer require tappayments/gosell```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```require_once('vendor/autoload.php');```

## Manual Installation
If you do not wish to use Composer, you can download the latest release. Then, to use the bindings, include the vendor.php file.

```require_once('/pathto/Tap-Payments/gosell-sdk-php/vendor/autoload.php');```

## Getting Started

```
use TapPayments\GoSell;

  
//set yout secret key here
GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");

  

$charge = GoSell\Charges::create(
	[
      "amount"=> 1,
      "currency"=> "KWD",
      "threeDSecure"=> true,
      "save_card"=> false,
      "description"=> "Test Description",
      "statement_descriptor"=> "Sample",
      "metadata"=> [
        "udf1"=> "test 1",
        "udf2"=> "test 2"
      ],
      "reference"=> [
        "transaction"=> "txn_0001",
        "order"=> "ord_0001"
      ],
      "receipt"=> [
        "email"=> false,
        "sms"=> true
      ],
      "customer"=> [
        "first_name"=> "test",
        "middle_name"=> "test",
        "last_name"=> "test",
        "email"=> "test@test.com",
        "phone"=> [
          "country_code"=> "965",
          "number"=> "50000000"
        ]
      ],
      "source"=> [
        "id"=> "src_all"
      ],
      "post"=> [
        "url"=> "http://your_website.com/post_url"
      ],
      "redirect"=> [
        "url"=> "http://your_website.com/redirect_url"
      ]
    ]
);

  

echo '<pre>';
var_dump($charge); //will give charge response as PHP object

```

## Code samples
* [ Customers ](./examples/customersExample.php)
* [ Charges ](./examples/chargesExample.php)
* [ Authorize ](./examples/authorizeExample.php)
* [ Refunds ](./examples/refundsExample.php)

## More Help
* [API Documentation](https://tap.company/developers)
* [Charges](https://github.com/Tap-Payments/gosell-sdk-php/wiki/Charges)
* [Authorize](https://github.com/Tap-Payments/gosell-sdk-php/wiki/Authorize)
* [Customers](https://github.com/Tap-Payments/gosell-sdk-php/wiki/Customers)
* [Refunds](https://github.com/Tap-Payments/gosell-sdk-php/wiki/Refunds)