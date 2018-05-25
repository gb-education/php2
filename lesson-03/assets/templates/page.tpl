{include 'header.tpl'}

<div class="container">
	<div class="content">
		<h1>{$title}</h1>
		{$text}
	</div>
	<div class="gallery">
		
		{foreach $gallery as $image}
			<a href="{$image->id}/">
				<img src="{$image->url_img_cropped}">
			</a>
		{/foreach}
	</div>
	<div class="upload">
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="file" name="userfile[]" multiple><br><br>
			<input type="submit" name="upload" value="Загрузить">
		</form>
	</div>
</div>

{include 'footer.tpl'}