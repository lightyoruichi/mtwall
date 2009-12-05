<?php
/**
 * Mechatweet wall
 *
 * Copyright (c) 2009 Martin Maly (http://maly.cz)
 *
 * This source file is subject to the "BSD New license" that is bundled
 * with this package in the file license.txt.
 *
 * For more information please see http://www.mechatweet.com
 *
 * @copyright  Copyright (c) 2009 Martin Maly (http://maly.cz)
 * @license    http://www.mechatweet.com/license  BSD license
 * @link       http://www.mechatweet.com
 * @category   Mechatweet
 * @package    Wall
 */

// Select template
$template = 'wall';

//Enter search phrase 
// $phrase = '#listopad OR #89 OR #1989';
// $phrase = '#20 OR #1989 OR #1711 OR listopad OR listopadu OR #velvetrevolution OR "velvet revolution" -clinic';
// $phrase = 'vanoce';
$phrase = '#xmas';

//Enter Delicious hashtag
$delicious = 'e50114805d262774e798ede43d061c26';

//Enter default language
$language = ''; //default is :cz:

$cfg = array(
	'retweeturl' => 'http://www.mechatweet.com/wall/vanoce',
	'canonical' => 'http://www.mechatweet.com/wall/vanoce',
	'title' => 'Vánoce 09 na Twitteru',
	'theme' => 'Vánoce 09'
	);

?>