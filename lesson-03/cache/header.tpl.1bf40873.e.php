<?php 
/** Fenom template 'header.tpl' compiled at 2018-05-26 02:52:59 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?php
/* header.tpl:5: {$title} */
 echo $var["title"]; ?></title>
	<base href="/">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body><?php
}, array(
	'options' => 128,
	'provider' => false,
	'name' => 'header.tpl',
	'base_name' => 'header.tpl',
	'time' => 1527292370,
	'depends' => array (
  0 => 
  array (
    'header.tpl' => 1527292370,
  ),
),
	'macros' => array(),

        ));
