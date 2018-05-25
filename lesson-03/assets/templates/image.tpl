{include 'header.tpl'}

<div class="container">
	<div class="content">
		<h1>{$title}</h1>
		<p>Изображение просмотрели: {$conter}</p>
		<p><a href="../">Назад</a></p>
	</div>
	<div class="gallery">
		<img class="img_gallery" src="{$img_url}">
	</div>
</div>

{include 'footer.tpl'}