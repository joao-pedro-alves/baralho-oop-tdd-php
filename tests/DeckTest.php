<?php

use PHPUnit\Framework\TestCase;

Use App\Deck;
Use App\Card;

class DeckTest extends TestCase
{
	public function test_should_set_and_get_cards()
	{
		$deck = new Deck;
		$this->assertEquals([], $deck->getCards());

		$card = new Card(Card::VALUE_2, Card::SUIT_CLUB);
		$deck->setCards($card);
		$this->assertEquals([$card], $deck->getCards());
	}

	public function test_should_shuffle_deck()
	{
		$deck = new Deck;
		$cards = [
			new Card(Card::VALUE_2, Card::SUIT_CLUB),
			new Card(Card::VALUE_3, Card::SUIT_CLUB),
			new Card(Card::VALUE_4, Card::SUIT_CLUB),
			new Card(Card::VALUE_5, Card::SUIT_CLUB),
			new Card(Card::VALUE_6, Card::SUIT_CLUB)
		];
		$deck->setCards($cards);

		$this->assertEquals($cards, $deck->getCards());
		$deck->shuffle();
		$this->assertFalse($cards == $deck->getCards());

		$cardsDiff = array_udiff($cards, $deck->getCards(), function($a, $b) {
			return $a->getSuit() == $b->getSuit() && $a->getValue() == $b->getValue();
		});

		$this->assertTrue(empty($cardsDiff));
	}

	public function test_should_draw_card_deck()
	{
		$deck = new Deck;
		$cards = [
			new Card(Card::VALUE_2, Card::SUIT_CLUB),
			new Card(Card::VALUE_3, Card::SUIT_CLUB),
			new Card(Card::VALUE_4, Card::SUIT_CLUB),
			new Card(Card::VALUE_5, Card::SUIT_CLUB),
			new Card(Card::VALUE_6, Card::SUIT_CLUB)
		];
		$deck->setCards($cards);

		$this->assertEquals($deck->draw()[0], $cards[4]);

		array_pop($cards);
		$this->assertEquals($cards, $deck->getCards());
	}
}