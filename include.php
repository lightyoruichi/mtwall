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


require_once 'config.php';

$tpl_path = './templates/'.$template.'/';

$cfg['tpl_path'] = $tpl_path;
$cfg['canonicalURL'] = urlencode($cfg['canonical']);

if ($language) $tpl_path.=$language.'-';

function readfile_substitute($file, $data) {
	$t = file_get_contents($file);
	foreach ($data as $key=>$value) {
		$t = str_replace('{{'.$key.'}}', $value, $t);
	}
	echo $t;
}

?>