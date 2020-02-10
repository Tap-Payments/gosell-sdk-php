<?php
use PHPUnit\Framework\TestCase;
use TapPayments\GoSell;
use \TapPayments\Requests\Common;
class GoSellTest extends TestCase{
	public function testSetPrivateKey(){
		GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");
		
		$this->assertEquals(
            GoSell::$privateKey,
            "sk_test_XKokBfNWv6FIYuTMg5sLPjhJ"
        );
	}

	public function testCommon(){
		Common::testingTrait();
	}
}