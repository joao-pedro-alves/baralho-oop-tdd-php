<?php

namespace App\Factories;

use App\Card;

class CardFactory
{
	public function buildCardsDeck()
	{
		$cardDeck = [];

		$suits = Card::ALLOWED_SUITS;
		$values = Card::ALLOWED_VALUES;

		foreach ($suits as $suit) {
			foreach ($values as $value) {
				$cardDeck[] = new Card($value, $suit);
			}
		}

		return $cardDeck;
	}
}