<?php

namespace App;

use Exception;

class Card
{
	private $value;
	private $suit;
	
	const SUIT_HEART = 'heart';
	const SUIT_DIAMOND = 'diamond';
	const SUIT_CLUB = 'club';
	const SUIT_SPADE = 'spade';

	const VALUE_2 = 2;
	const VALUE_3 = 3;
	const VALUE_4 = 4;
	const VALUE_5 = 5;
	const VALUE_6 = 6;
	const VALUE_7 = 7;
	const VALUE_8 = 8;
	const VALUE_9 = 9;
	const VALUE_10 = 10;
	const VALUE_JACK = 11;
	const VALUE_QUEEN = 12;
	const VALUE_KING = 13;
	const VALUE_ACE = 14;

	const ALLOWED_VALUES = [
		self::VALUE_2,
		self::VALUE_3,
		self::VALUE_4,
		self::VALUE_5,
		self::VALUE_6,
		self::VALUE_7,
		self::VALUE_8,
		self::VALUE_9,
		self::VALUE_10,
		self::VALUE_JACK,
		self::VALUE_QUEEN,
		self::VALUE_KING,
		self::VALUE_ACE
	];

	const ALLOWED_SUITS = [
		self::SUIT_HEART,
		self::SUIT_DIAMOND,
		self::SUIT_CLUB,
		self::SUIT_SPADE
	];

	public function __construct($value = null, $suit = null)
	{
		if ($value) {
			$this->setSuit($suit);
		}

		if ($suit) {
			$this->setValue($value);
		}
	}

	public function setValue($value)
	{
		if (!$this->isValueAllowed($value)) {
			throw new Exception('Not valid value.');
		}

		$this->value = $value;
		return $this;
	}

	public function setSuit($suit)
	{
		if (!$this->isSuitAllowed($suit)) {
			throw new Exception('Not valid suit.');
		}

		$this->suit = $suit;
		return $this;
	}

	public function getSuit()
	{
		return $this->suit;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function isSuitAllowed($suit)
	{
		return in_array($suit, self::ALLOWED_SUITS);
	}

	public function isValueAllowed($value)
	{
		return in_array($value, self::ALLOWED_VALUES);
	}
}