<?php

require('../vendor/autoload.php');

use TapPayments\GoSell;

GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");


$authorize = GoSell\Authorize::create([
  "amount"=> 1,
  "currency"=> "KWD",
  "threeDSecure"=> true,
  "save_card"=> false,
  "description"=> "test description",
  "statement_descriptor"=> "sample",
  "metadata"=> [
    "udf1"=> "test"
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
  "auto"=> [
    "type"=> "VOID",
    "time"=> 100
  ],
  "post"=> [
    "url"=> "http://your_website.com/posturl"
  ],
  "redirect"=> [
    "url"=> "http://your_website.com/returnurl"
  ]
]);

echo '<pre>';var_dump($authorize);


$authorize_retrieved = GoSell\Authorize::retrieve($authorize->id);

var_dump($authorize_retrieved);

$authorize_updated = GoSell\Authorize::update($authorize_retrieved->id,[
  "description"=> "Test",
  "receipt"=> [
    "email"=> false,
    "sms"=> false
  ],
  "metadata"=> [
    "udf2"=> "test update"
  ]
]);

var_dump($authorize_updated);


$authorize_void = GoSell\Authorize::void($authorize_retrieved->id);

var_dump($authorize_void);

$authorize_all = GoSell\Authorize::all([
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

var_dump($authorize_all);

