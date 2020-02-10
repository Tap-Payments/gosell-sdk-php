<?php

require('../vendor/autoload.php');

use TapPayments\GoSell;

GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");

$refund_created = GoSell\Refunds::create([
  "charge_id"=> "chg_86dfjghadfuda7ft",
  "amount"=> 2,
  "currency"=> "KWD",
  "description"=> "Test Description",
  "reason"=> "requested_by_customer",
  "reference"=> [
    "merchant"=> "txn_0001"
  ],
  "metadata"=> [
    "udf1"=> "test1",
    "udf2"=> "test2"
  ],
  "post"=> [
    "url"=> "http://your_url.com/post"
  ]
]);

echo '<pre>';var_dump($refund_created);
echo '<pre>';
$retrieved_refund = GoSell\Refunds::retrieve('re_g4RZ2920201036p9X50502366');

var_dump($retrieved_refund);

$updated_refund = GoSell\Refunds::update($retrieved_refund->id,[
  "metadata"=> [
    "OrderNumber"=> "test update"
  ]
]);

var_dump($updated_refund->metadata->OrderNumber);

$all_Refunds = GoSell\Refunds::all(new stdClass());

var_dump($all_Refunds);


