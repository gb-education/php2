<?

class Article
{
	public $id;
	public $title;
	public $text;

	function view($title,$text) {
		echo "<h1>$this->title</h1>\n<p>$this->text</p>\n";
	}
	
}

class Gallery extends Article
{
	public $images;

	function __construct($title,$text,$images = '') {

		$this->title = $title;
		$this->text = $text;
		$this->images = $images;

		$this->view($title,$text);
		if ($this->images) {
			echo "<div>$this->images</div>\n";
		}

	}
	
}


$title = 'Заголовок статьи';
$text = 'Содержимое статьи. Текст текстовый.';
$images = 'Блок изображений';

$article_01 = new Gallery($title,$text);
$gallery_01 = new Gallery($title,$text,$images);


echo "<br>";

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

echo "<br>Вся магия видимо из-за статической переменной Х. При запуске одного и того же класса инкремент происходит при каждом вызове.<br><br>";

class C {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends C {
}
$a1 = new C();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();

echo "<br>Тут инкремента в наследнике нет. Поэтому инкремент происходит только в родителе.<br>Сходу сообразить при просомтре листинга результат понять не удалось...";
