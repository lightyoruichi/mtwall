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
 

require './include.php';

readfile_substitute($tpl_path. 'index.html', $cfg);

?>