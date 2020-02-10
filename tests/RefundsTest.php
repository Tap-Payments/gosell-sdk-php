<?php

use PHPUnit\Framework\TestCase;
use TapPayments\GoSell;

class RefundsTest extends TestCase{
	public static $id=null;
	public function __construct(){
		GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");
	}
	public function testCreate()
    {
    	
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
		
        $this->assertEquals(
            $refund_created->errors[0]->description,
            'Charge not found'
        );
    }

    public function testRetrieve()
    {
    	$retrieved_refund = GoSell\Refunds::retrieve('re_g4RZ2920201036p9X50502366');
        self::$id = $retrieved_refund->id;
        $this->assertEquals(
            $retrieved_refund->id,
            're_g4RZ2920201036p9X50502366'
        );
    }

    public function testUpdate(){
    	$updated_refund = GoSell\Refunds::update(self::$id,[
          "metadata"=> [
            "OrderNumber"=> "test update"
          ]
        ]);
    	$this->assertEquals(
            $updated_refund->metadata->OrderNumber,
            "test update"
        );

    }

    public function testAll(){
        $all_refund = GoSell\Refunds::all(new stdClass());
        $this->assertEquals(
            $all_refund->object,
            "list"
        );

    }

    
}