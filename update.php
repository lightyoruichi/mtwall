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

$last = isset($_POST['timestamp'])?intval($_POST['timestamp']):0;
$time = time();
require './include.php';
if (!file_exists('./data/stamp'))
	$stamp = 0;
else
	$stamp = file_get_contents('./data/stamp');

if ($time > ($stamp + 30)) {
	 $f = file_get_contents('http://search.twitter.com/search.json?q=' . urlencode($phrase));
	 file_put_contents('./data/search.json', $f);
	$f = file_get_contents('./data/search.json');

	$e = json_decode($f, true);
	//print_r($e['results']);

	if (!file_exists('./data/elements')) {$el = array();}
	else {$el = unserialize(file_get_contents('./data/elements'));}

	//print_r($el);

	//$el = array();

	foreach ($e['results'] as $x) {
		$id = $x['id'];
		//	print_r($x);
		if (!isset($el[$id])) {
			$el[$id] = $x;
			$el[$id]['stamp'] = $time;
		}
		//	print_r($el); die();
	}

	while (count($el)>50) array_shift($el);
	
	file_put_contents('./data/elements', serialize($el));
	file_put_contents('./data/stamp', $time);

}
//print_r($el);
$el = array_reverse(unserialize(file_get_contents('./data/elements')));

echo '<!-- '.$time.' -->'."\n";


foreach ($el as $id=>$e) {
	$stamp = intval($e['stamp']);
	if ($stamp <= $last) continue;
	//continue;
	
	$e['retweet'] = urlencode('RT @'.$e['from_user'].' '.$e['text']);
	
	$e['cas'] = date('G:i', $stamp+8*3600);	
	$e['den'] = date('j.n.', $stamp+8*3600);	
	
	$text = $e['text'];
	
	$text = preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\-.]*(\?\S+)?)?)?)@', '<a href="$1">$1</a>', $text);
	$text = preg_replace('/\#([a-zA-Z0-9]+)/is', '<a href="http://search.twitter.com/search?q=%23${1}">#${1}</a>', $text);
	//$text = preg_replace('/\#([a-zA-Z0-9]+)/is', 'drek', $text);
	$e['text'] = $text;
	
	readfile_substitute($tpl_path. 'tweet.html', $e);

}
