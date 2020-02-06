<?php
require('vendor/autoload.php');
use TapPayments\GoSell;
//$goSell = new GoSell\GoSell();

GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");

//echo GoSell::$privateKey;

//echo GoSell::$baseUrl;

// $charge = GoSell\Charges::create([
//   "amount"=> 1,
//   "currency"=> "KWD",
//   "threeDSecure"=> true,
//   "save_card"=> false,
//   "description"=> "Test Description",
//   "statement_descriptor"=> "Sample",
//   "metadata"=> [
//     "udf1"=> "test 1",
//     "udf2"=> "test 2"
//   ],
//   "reference"=> [
//     "transaction"=> "txn_0001",
//     "order"=> "ord_0001"
//   ],
//   "receipt"=> [
//     "email"=> false,
//     "sms"=> true
//   ],
//   "customer"=> [
//     "first_name"=> "test",
//     "middle_name"=> "test",
//     "last_name"=> "test",
//     "email"=> "test@test.com",
//     "phone"=> [
//       "country_code"=> "965",
//       "number"=> "50000000"
//     ]
//   ],
//   "source"=> [
//     "id"=> "src_kw.knet"
//   ],
//   "post"=> [
//     "url"=> "http://your_website.com/post_url"
//   ],
//   "redirect"=> [
//     "url"=> "http://your_website.com/redirect_url"
//   ]
// ]);
//$charge = GoSell\Charges::retrieve('chg_l4R44320201359t9QK0302251');
$customer = GoSell\Customers::create([
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
echo '<pre>';var_dump($customer);
$delete_customer = GoSell\Customers::delete($customer->id);
echo '<pre>';var_dump($delete_customer);

// $charge = GoSell\Charges::update(
//   'chg_l4R44320201359t9QK0302251',
//   ['metadata' => ['order_id' => '6735']]);

// $charge = GoSell\Charges::all([
//   "period"=> [
//     "date"=> [
//       "from"=> 1516315144000,
//       "to"=> 1545172744000
//     ]
//   ],
//   "status"=> "",
//   "starting_after"=> "",
//   "limit"=> 25
// ]);
//echo '<pre>';var_dump($charge);exit;

// GoSell\Charges::update();

// GoSell\Charges::retrieve();

// GoSell\Charges::delete();

// GoSell\Charges::all();