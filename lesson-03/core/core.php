<?
require_once ('core/config.php');
require_once ('assets/fenom/Fenom.php');


function PageBuilder($get_url_param) {

	/*
	* Подключаемся к БД
	*/
	try {
		$dbh = new PDO("mysql:dbname=".DB_NAME.";host=".DB_SERVER, DB_USER, DB_PASS);
	} catch (PDOException $e) {
	  echo "Error: Could not connect. " . $e->getMessage();
	}
	// установка error режима
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	/*
	* Подключаемся к шаблонизатору
	*/
	Fenom::registerAutoload();
	$fenom = new Fenom(new Fenom\Provider('assets/templates'));
	$fenom->setCompileDir('cache');
	$fenom->setOptions(array(
		'auto_reload' => true,
	));


	/*
	* Получаем и разбираем URL
	*/
	foreach ($get_url_param as $key => $value) {
		$str = trim($value);
		$str = stripslashes($str);
		$str = htmlspecialchars($str);
		$get_url_param[$key] = $str;
	}
	$get_url_param = explode("/", $get_url_param['path']);


	/*
	* Передаем параметры на обработку и возвращаем нужную страницу с параметрами или без
	*/
	if (count($get_url_param) == 1) {
		//собрали и вывели главную страницу
		$gallery = add_images($dbh);
		$template = 'page.tpl';
		$page_array = array(
			'title' => 'Моя галерея',
			'text' => 'Описание галереи.',
			'gallery' => $gallery
		);
		echo $fenom->fetch($template, $page_array);
	}
	else if (count($get_url_param) == 2) {
		//собрали и вывели страницу с изображением
		$id = $get_url_param[0];
		$img = show_img($id,$dbh);
		$template = 'image.tpl';
		$page_array = array(
			'title' => 'Моя галерея - изображение - '.$img->name,
			'img_url' => $img->url_img,
			'text' => 'Описание для изображения.',
			'conter' => $img->view_count
		);
		echo $fenom->fetch($template, $page_array);

	}
	else {
		echo '404 page error';
	}


}



//выводим изображение
function show_img($id,$dbh) {
	$sql = "SELECT * FROM `images` WHERE `id` = '".$id."';";
	$sth = $dbh->query($sql);
	$data = $sth->fetchObject();

	$sql = "UPDATE images SET view_count = view_count + 1  WHERE `id` = '".$id."';";
	$sth = $dbh->query($sql);

	return $data;
}


// функция проверки существования папки и ее создания
function chkdir($folder) {
	if (!file_exists($folder)) {
		mkdir ($folder, 0755);
	}
}


//функция проверки записи в БД о новом загружаемом файле
function check_file_in_db($file_name,$dbh) {
	$sql = "SELECT * FROM images WHERE name IN ('".$file_name."')";
	$sth = $dbh->query($sql);
	$data = $sth->fetchObject();
	if (($data->name) != $file_name) {
		return true;
	}
}


// загрузка изображений с занесением записей в БД
function add_images($dbh) {
	if((isset($_POST['upload'])) && ($_FILES[userfile][name][0]) != "") {

		$dir = galley_dir;
		$dir_tmp = galley_tmp;

		chkdir($dir);
		chkdir($dir_tmp);

		foreach ($_FILES[userfile][name] as $key => $fname) {
			echo $info = pathinfo($fname)['extension'];

			$tmp_file_name = $_FILES[userfile][tmp_name][$key];
			$file_name = $_FILES[userfile][name][$key];
			$cropped_file_url = $dir_tmp."resize_".$file_name;

			if ((mb_strpos(upload_file_type,$info) > -1) && (filesize($tmp_file_name) <= max_file_upload)) {
				if (check_file_in_db($file_name,$dbh) === true)
				{

					if (copy($tmp_file_name,$dir.$file_name)) {
						exec("convert ".$dir.$file_name." -resize x". crop_img_width * 2 ." -resize \"". crop_img_height * 2 . "x<\" -resize 50% -gravity center -crop ".crop_img_height. "x".crop_img_height."+0+0 +repage ".$cropped_file_url);
						
						$sql = "INSERT INTO `images`(`name`, `url_img`, `url_img_cropped`) VALUES ('".$file_name."','".$dir.$file_name."','".$cropped_file_url."');";
						$sth = $dbh->query($sql);
					}

	 			}
				else
				{
					echo "Файл уже существует";
				}
			}
		}
	}

	$sql = "SELECT * FROM `images`;";

	$sth = $dbh->query($sql);
	while ($row = $sth->fetchObject()) {
		$data[] = $row;
	}

	return $data;

}