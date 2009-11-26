<?php

include('./include.php');

$page = $_GET['url'];

$url = '';

if ($page == 'tweetmeme') $url = 'http://api.tweetmeme.com/url_info.json?url=' . $cfg['canonical'];
if ($page == 'delicious') $url = 'http://feeds.delicious.com/v2/json/urlinfo/' . $delicious;

if (!$url) return;

readfile($url);