<?
header('Content-Type: text/html; charset=utf-8');
class Person{
  private $name;
  private $lastname;
  private $age;
  private $mother;
  private $father;
  
  function __construct($name,$lastname,$age,$mother=null,$father=null,$mommother=null,$momfather=null,$dadmother=null,$dadfather=null){
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->mommother = $mommother;
    $this->momfather = $momfather;
    $this->dadmother = $dadmother;
    $this->dadfather = $dadfather;
  }

	public function getName(){return $this->name;}
	public function getLastname(){return $this->lastname;}
	public function getAge(){return $this->age;}
	public function getMother(){return $this->mother;}
	public function getFather(){return $this->father;}
	public function getMommother(){return $this->mommother;}
	public function getMomfather(){return $this->momfather;}
	public function getDadmother(){return $this->dadmother;}
	public function getDadfather(){return $this->dadfather;}
    public function getInfo(){
	  return "
	    Меня зовут: ".$this->name."<br>
	    Мою маму зовут: ".$this->mother->name."<br>
	    Моего папу зовут: ".$this->father->name."<br>
	    Мамину маму зовут: ".$this->mommother->name."<br>
	    Маминого папу зовут: ".$this->momfather->name."<br>
	    Папину маму зовут: ".$this->dadmother->name."<br>
	    Папиного папу зовут: ".$this->dadfather->name;
	    
	}
	
}

$maria = new Person("Мария","Петрова",null,null,null,null,null,null);
$ivan = new Person("Иван","Петров",null,null,null,null,null,null);
$svetlana = new Person("Светлана","Ильина",null,null,null,null,null,null);
$petr = new Person("Петр","Ильин",null,null,null,null,null,null);
$oleg = new Person("Олег","Петров",41,$maria,$ivan,null,null,null,null);
$olga = new Person("Ольга","Петрова",41,$svetlana,$petr,null,null,null,null);
$igor = new Person("Игорь","Петров",12,$olga,$oleg,$maria,$ivan,$svetlana,$petr);
echo $igor->getInfo();
?>