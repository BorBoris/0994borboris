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
  }

	public function getName(){return $this->name;}
	public function getLastname(){return $this->lastname;}
	public function getAge(){return $this->age;}
	public function getMother(){return $this->mother;}
	public function getFather(){return $this->father;}

    public function getInfo(){
	  return "
	    Меня зовут: ".$this->name."<br>
	    Мою маму зовут: ".$this->getMother()->getName()."<br>
	    Моего папу зовут: ".$this->getFather()->getName()."<br>
	    Мамину маму зовут: ".$this->getMother()->getMother()->getName()."<br>
	    Маминого папу зовут: ".$this->getFather()->getFather()->getName()."<br>
	    Папину маму зовут: ".$this->getMother()->getMother()->getName()."<br>
	    Папиного папу зовут: ".$this->getFather()->getFather()->getName();
	    
	}
	
}

$maria = new Person("Мария","Петрова",65);
$ivan = new Person("Иван","Петров",66);
$svetlana = new Person("Светлана","Ильина",64);
$petr = new Person("Петр","Ильин",67);
$oleg = new Person("Олег","Петров",41,$maria,$ivan);
$olga = new Person("Ольга","Петрова",41,$svetlana,$petr);
$igor = new Person("Игорь","Петров",12,$olga,$oleg,$maria,$ivan,$svetlana,$petr);
echo $igor->getInfo();
?>