<?php

require('../vendor/autoload.php');

use TapPayments\GoSell;

GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");

$customer_created = GoSell\Customers::create([
  "first_name"=> "test",
  "middle_name"=> "test",
  "last_name"=> "test",
  "email"=> "test@test.com",
  "phone"=> [
    "country_code"=> "965",
    "number"=> "00000000"
  ],
  "description"=> "test",
  "metadata"=> [
    "udf1"=> "test"
  ],
  "currency"=> "KWD"
]);

echo '<pre>';var_dump($customer_created);

$retrieved_customer = GoSell\Customers::retrieve($customer_created->id);

var_dump($retrieved_customer);

$updated_customer = GoSell\Customers::update($retrieved_customer->id,[
  "first_name"=> "test",
  "middle_name"=> "test",
  "last_name"=> "test",
  "email"=> "test@test.com",
  "phone"=> [
    "country_code"=> "965",
    "number"=> "00000000"
  ],
  "description"=> "test",
  "metadata"=> [
    "udf1"=> "test update"
  ],
  "currency"=> "KWD"
]);

var_dump($updated_customer);

$deleted_customer = GoSell\Customers::delete($updated_customer->id);

var_dump($deleted_customer);

$all_customers = GoSell\Customers::all([
  "period"=> [
    "date"=> [
      "from"=> time() - (30 * 24 * 60 * 60),//last 30 days
      "to"=> time()//today
    ]
  ],
  "status"=> "",
  "starting_after"=> "",
  "limit"=> 25
]);

var_dump($all_customers);


