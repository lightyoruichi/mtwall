<?php


function _test_echo($text, $r, $break) {
	global $ok;
	
	echo '<tr><td>'.$text.'</td><td>';
	if ($r && $ok) echo 'OK';
	if (!$r && $ok && $break) echo 'Fail. Exit.';
	if (!$r && $ok && !$break) echo 'Fail, continue...';
	if (!$ok) echo 'Not passed';
	
	echo '</td></tr>';
}


function _test_result($text, $r, $break) {
	global $ok;
	
	if ($text) _test_echo($text, $r, $break);

	if (!$r && $break) $ok = false;
}

function test_dir_exists($subdir, $break = true, $try = true) {
	global $ok;
	if ($ok) {
		$r = is_dir($subdir);
		_test_echo("Directory '$subdir' exists?", $r, false);
	}
	if (!$r && $try) {
		$r = mkdir($subdir);
		_test_echo("Creating directory '$subdir'", $r, $break);
	}
	_test_result(false, $r, $break);
}

function test_dir_write($subdir, $break = true) {
	global $ok;
	if ($ok) {
		$r = true;
		$f = fopen($subdir.'/temptemp.tmp','w');
		if (!$f) $r = false;
		else {fclose($f); unlink($subdir.'/temptemp.tmp');}
	}
	_test_result("Is directory '$subdir' writable?", $r, $break);
}

function test_fn($fn, $break = true) {
	global $ok;
}

function test_ini($ini, $break = true) {
	global $ok;
	if ($ok) {
		$r = ini_get($ini) ? true:false;
	}
	_test_result("Is '$ini' allowed?", $r, $break);	
}

$ok = true;

echo '<table border="1">';

test_dir_exists('./data');
test_dir_write('./data');
test_ini('allow_url_fopen');
echo '</table>';