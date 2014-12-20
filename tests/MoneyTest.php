<?php
use src\Libraries\Money;

class MoneyTest extends PHPUnit_Framework_TestCase
{

    public function testCanBeNegated()
    {
        // Arrange
        $a = new Money(1);

        // Act
        $b = $a->negate();

        // Assert
        $this->assertEquals(-1, $b->getAmount());
    }

    public function testInvestment()
    {
        $a = new Money(1);

        $a->invest(9);

        $this->assertEquals(10, $a->getAmount());
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfInvestingNegativeAmount()
    {
        $a = new Money(1);

        $a->invest(-9);
    }


    public function testWithDrawl()
    {
        $a = new Money(100);

        $a->atmWithDrawl(80);

        $this->assertEquals(15, $a->getAmount());
    }


    public function inputNumbers()
    {
        return [
            [10, 20, 30],
            [100, 20, 120]
        ];
    }


    /**
     *
     * @dataProvider inputNumbers
     */
    public function testInvestMoney($x, $y, $sum)
    {
        $account = new Money($x);

        $account->invest($y);
        
        $this->assertEquals($sum, $account->getAmount());

    }





}