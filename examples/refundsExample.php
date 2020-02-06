<?php

require('../vendor/autoload.php');

use TapPayments\GoSell;

GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");

// $refund_created = GoSell\Refunds::create([
//   "first_name"=> "test",
//   "middle_name"=> "test",
//   "last_name"=> "test",
//   "email"=> "test@test.com",
//   "phone"=> [
//     "country_code"=> "965",
//     "number"=> "00000000"
//   ],
//   "description"=> "test",
//   "metadata"=> [
//     "udf1"=> "test"
//   ],
//   "currency"=> "KWD"
// ]);

// echo '<pre>';var_dump($refund_created);
echo '<pre>';
$retrieved_refund = GoSell\Refunds::retrieve('re_g4RZ2920201036p9X50502366');

var_dump($retrieved_refund);

$updated_refund = GoSell\Refunds::update($retrieved_refund->id,[
  "metadata"=> [
    "Order Number"=> "test update"
  ]
]);

var_dump($updated_refund);

$all_Refunds = GoSell\Refunds::all([
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

var_dump($all_Refunds);


