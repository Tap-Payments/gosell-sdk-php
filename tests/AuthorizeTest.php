<?php

use PHPUnit\Framework\TestCase;
use TapPayments\GoSell;
class AuthorizeTest extends TestCase{
	public static $id=null;
	public function __construct(){
		GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");
	}
	public function testCreate()
    {
    	
    	$authorize_created = GoSell\Authorize::create([
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
	    self::$id = $authorize_created->id;
      $this->assertEquals(
          $authorize_created->object,
          'authorize'
      );
    }

    public function testRetrieve()
    {
    	$authorize_retrieved = GoSell\Authorize::retrieve(self::$id);
        $this->assertEquals(
            $authorize_retrieved->id,
            self::$id
        );
    }
    public function testVoid(){
      GoSell\Authorize::void(self::$id);
    }
    public function testUpdate(){
    	$updated_authorize = GoSell\Authorize::update(self::$id,[
        "description"=> "test description",
        "receipt"=> [
          "email"=> false,
          "sms"=> false
        ],
        "metadata"=> [
          "udf2"=> "test update"
        ]
      ]);
    	$this->assertEquals(
            $updated_authorize->metadata->udf2,
            "test update"
        );

      $this->assertEquals(
          $updated_authorize->description,
          "test description"
      );

    }

    
}