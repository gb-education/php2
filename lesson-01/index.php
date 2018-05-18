<?

/**
* 
*/
class Article2
{
	public $id;
	public $title;
	public $content;
	
	function __construct($id,$title,$content)
	{
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
	}

	public function view() {
		echo "<h1>$this->title</h1> <p>$this->content</p>";
	}
}


$page = new Article2(2,"title","content");

$page->view();


class A {
	public function foo () {
		static $x = 0;
		echo ++ $x;
	}
}
$a1 = new A ();
$a2 = new A ();
$a1 -> foo ();
$a2 -> foo ();
$a1 -> foo ();
$a2 -> foo ();$a2 -> foo ();

?>