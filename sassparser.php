<?php
/**
 * @author           Suat Secmen (https://su.at)
 * @copyright        2017 Suat Secmen
 * @license          MIT License <https://su.at/mit>
 */

header('content-type:text/css');

if (!isset($_GET['pw']) || $_GET['pw'] !== 'my-password') die('*{display:none!important}');

$scssPath = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];

if (strpos($scssPath, '?') !== false) {
	list($scssPath) = explode('?', $scssPath, 2);
}

$scssDir = dirname($scssPath);
if (substr($scssDir, -9) == '/css/scss') {
	// css dir is the parent dir
	$scssBasename = basename($scssPath);
	$cssPath = substr($scssDir, 0, -4).substr($scssBasename, 0, -4).'css';
} else {
	// css dir is the same dir
	$cssPath = substr($scssPath, 0, -4).'css';
}

$cssTime = @filemtime($cssPath); // supress warning for if the file doesn't exist yet
$scssTime = filemtime($scssPath);

if ($cssTime < $scssTime) {
	// http://leafo.net/scssphp/
	require 'scssphp/scss.inc.php';
	$scssSrc = file_get_contents($scssPath);
	$start = microtime(true);
	$scss = new scssc();
	$cssSrc = $scss->compile($scssSrc);
	file_put_contents($cssPath, $cssSrc);
	$header = '/* generated in '.(microtime(true) - $start).' s */';
} else {
	$header = '/* cached version from '.date('Y-m-d H:i (s)', $scssTime).' */';
	$cssSrc = file_get_contents($cssPath);
}

echo $header.PHP_EOL.$cssSrc;
