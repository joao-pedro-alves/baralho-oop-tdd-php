<?php

use PHPUnit\Framework\TestCase;

Use App\Factories\CardFactory;
Use App\Card;

class CardFactoryTest extends TestCase
{
	const DECK_CARDS_COUNT = 52;

	public function test_should_have_only_the_allowed_suits()
	{
		$deckSuits = [];

		$deckCards = (new CardFactory)->buildCardsDeck();

		foreach ($deckCards as $card) {
			$deckSuits[] = $card->getSuit();
		}

		$deckSuits = array_unique($deckSuits);

		$this->assertTrue(empty(array_diff(Card::ALLOWED_SUITS, $deckSuits)));
	}

	public function test_should_have_only_the_allowed_values()
	{
		$deckValues = [];

		$deckCards = (new CardFactory)->buildCardsDeck();

		foreach ($deckCards as $card) {
			$deckValues[] = $card->getValue();
		}

		$deckValues = array_unique($deckValues);

		$this->assertTrue(empty(array_diff(Card::ALLOWED_VALUES, $deckValues)));
	}

	public function test_should_have_correct_deck_cards_count()
	{
		$deckCards = (new CardFactory)->buildCardsDeck();

		$this->assertEquals(self::DECK_CARDS_COUNT, count($deckCards));
	}
}