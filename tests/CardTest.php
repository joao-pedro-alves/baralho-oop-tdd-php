<?php

use PHPUnit\Framework\TestCase;

Use App\Card;

class CardTest extends TestCase
{
	private $card;

	public function setUp()
	{
		$this->card = new Card;
	}

	public function test_should_get_card_value()
	{
		$this->card
			->setValue(Card::VALUE_2)
			->setSuit(Card::SUIT_CLUB);

		$this->assertEquals(Card::VALUE_2, $this->card->getValue());
	}

	public function test_should_get_card_suit()
	{
		$this->card
			->setValue(Card::VALUE_2)
			->setSuit(Card::SUIT_CLUB);

		$this->assertEquals(Card::SUIT_CLUB, $this->card->getSuit());
	}

	/**
	 * @expectedException Exception
	 **/
	public function test_should_thrown_error_for_set_invalid_value()
	{
		$this->card->setValue('invalid_value');
	}

	/**
	 * @expectedException Exception
	 **/
	public function test_should_thrown_error_for_set_invalid_suit()
	{
		$this->card->setSuit('invalid_suit');
	}

	public function test_should_check_value_is_allowed()
	{
		$this->assertFalse($this->card->isValueAllowed('invalid_value'));
		$this->assertTrue($this->card->isValueAllowed(Card::VALUE_2));
	}

	public function test_should_check_suit_is_allowed()
	{
		$this->assertFalse($this->card->isSuitAllowed('invalid_value'));
		$this->assertTrue($this->card->isSuitAllowed(Card::SUIT_CLUB));
	}
}