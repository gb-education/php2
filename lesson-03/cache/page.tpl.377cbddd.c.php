<?php 
/** Fenom template 'page.tpl' compiled at 2018-05-26 02:07:27 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><?php
/* page.tpl:1: {include 'header.tpl'} */
 $tpl->getStorage()->getTemplate('header.tpl')->display($var); ?>

<div class="container">
	<div class="content">
		<h1><?php
/* page.tpl:5: {$title} */
 echo $var["title"]; ?></h1>
		<?php
/* page.tpl:6: {$text} */
 echo $var["text"]; ?>
	</div>
	<div class="gallery">
		
		<?php  if(!empty($var["gallery"]) && (is_array($var["gallery"]) || $var["gallery"] instanceof \Traversable)) {
  foreach($var["gallery"] as $var["image"]) { ?>
			<a href="<?php
/* page.tpl:11: {$image->id} */
 echo $var["image"]->id; ?>/">
				<img src="<?php
/* page.tpl:12: {$image->url_img_cropped} */
 echo $var["image"]->url_img_cropped; ?>">
			</a>
		<?php
/* page.tpl:14: {/foreach} */
   } } ?>
	</div>
	<div class="upload">
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="file" name="userfile[]" multiple><br><br>
			<input type="submit" name="upload" value="Загрузить">
		</form>
	</div>
</div>

<?php
/* page.tpl:24: {include 'footer.tpl'} */
 $tpl->getStorage()->getTemplate('footer.tpl')->display($var); ?><?php
}, array(
	'options' => 128,
	'provider' => false,
	'name' => 'page.tpl',
	'base_name' => 'page.tpl',
	'time' => 1527289646,
	'depends' => array (
  0 => 
  array (
    'page.tpl' => 1527289646,
  ),
),
	'macros' => array(),

        ));
