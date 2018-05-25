<?php 
/** Fenom template 'image.tpl' compiled at 2018-05-26 02:51:51 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><?php
/* image.tpl:1: {include 'header.tpl'} */
 $tpl->getStorage()->getTemplate('header.tpl')->display($var); ?>

<div class="container">
	<div class="content">
		<h1><?php
/* image.tpl:5: {$title} */
 echo $var["title"]; ?></h1>
		<p>Изображение просмотрели: <?php
/* image.tpl:6: {$conter} */
 echo $var["conter"]; ?></p>
		<p><a href="../">Назад</a></p>
	</div>
	<div class="gallery">
		<img src="../<?php
/* image.tpl:10: {$img_url} */
 echo $var["img_url"]; ?>">
	</div>
</div>

<?php
/* image.tpl:14: {include 'footer.tpl'} */
 $tpl->getStorage()->getTemplate('footer.tpl')->display($var); ?><?php
}, array(
	'options' => 128,
	'provider' => false,
	'name' => 'image.tpl',
	'base_name' => 'image.tpl',
	'time' => 1527292310,
	'depends' => array (
  0 => 
  array (
    'image.tpl' => 1527292310,
  ),
),
	'macros' => array(),

        ));
