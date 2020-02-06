<?php

use PHPUnit\Framework\TestCase;
use TapPayments\GoSell;
class ChargesTest extends TestCase{
	public static $id=null;
	public function __construct(){
		GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");
	}
	public function testCreate()
    {
    	
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
		self::$id = $charge_created->id;
        $this->assertEquals(
            $charge_created->object,
            'charge'
        );
    }

    public function testRetrieve()
    {
    	$charge_retrieved = GoSell\Charges::retrieve(self::$id);
        $this->assertEquals(
            $charge_retrieved->id,
            self::$id
        );
    }

    public function testUpdate(){
    	$updated_charge = GoSell\Charges::update(self::$id,[
          "description"=> "test description",
          "receipt"=> [
            "email"=> false,
            "sms"=> true
          ],
          "metadata"=> [
            "udf2"=> "testing update"
          ]
        ]);
    	$this->assertEquals(
            $updated_charge->metadata->udf2,
            "testing update"
        );

        $this->assertEquals(
            $updated_charge->description,
            "test description"
        );

    }

    
}