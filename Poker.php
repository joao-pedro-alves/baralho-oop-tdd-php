<?php
require 'vendor/autoload.php';

use App\Factories\CardFactory;
use App\Deck;

$factory = new CardFactory();
$cards = $factory->buildCardsDeck();

$deck = new Deck($cards);
$deck->shuffle();

print_r($deck->draw());
print_r($deck->draw());
print_r($deck->draw());
print_r($deck->draw());
print_r($deck->draw());
print_r($deck->count());
