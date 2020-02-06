<?php

require('../vendor/autoload.php');

use TapPayments\GoSell;

GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");

$charge_created = GoSell\Charges::create([
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
]);

echo '<pre>';var_dump($charge_created);

$retrieved_charge = GoSell\Charges::retrieve($charge_created->id);

var_dump($retrieved_charge);


$updated_charge = GoSell\Charges::update($retrieved_charge->id,[
  "description"=> "test",
  "receipt"=> [
    "email"=> false,
    "sms"=> true
  ],
  "metadata"=> [
    "udf2"=> "testing update"
  ]
]);

echo '<pre>';var_dump($updated_charge);

$charges_all = GoSell\Charges::all([
  "period"=> [
    "date"=> [
      "from"=> time() - (30 * 24 * 60 * 60),//last 30 days
      "to"=> time() + (30 * 24 * 60 * 60)//next 30 days
    ]
  ],
  "status"=> "",
  "starting_after"=> "",
  "limit"=> 25
]);

var_dump($charges_all);
