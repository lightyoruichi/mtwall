<?php
/**
 * New file
 *
 * @version 1.0
 * @author martin
 * @copyright (C) 2009 martin
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