<?php

namespace App;

class Deck
{
	private $cards = [];

	public function __construct($cards = [])
	{
		$this->setCards($cards);
	}

	public function setCards($cards)
	{
		if (!is_array($cards)) {
			$cards = [$cards];
		}

		$this->cards = $cards;
	}

	public function getCards()
	{
		return $this->cards;
	}

	public function shuffle()
	{
		shuffle($this->cards);
	}

	public function draw($quantity = 1)
	{
		$cards = [];

		for ($i = 0; $i < $quantity; $i++) {
			$cards[] = array_pop($this->cards);
		}

		return $cards;
	}

	public function count()
	{
		return count($this->getCards());
	}
}