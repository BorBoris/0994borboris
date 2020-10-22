<?
class Cat {
    public $age;
    public $weight;
    public $strength;

    function __construct() {
    }

    function fight($anotherCat) {

            $ageMin = ($this->age == $anotherCat->age ? 1 : 0);
            $weightMin = ($this->weight == $anotherCat->weight ? 1 : 0);
            $strengthMin = ($this->strength == $anotherCat->strength ? 1 : 0);
            $countMin = $ageMin + $weightMin + $strengthMin;
            

            $agePlus = ($this->age > $anotherCat->age ? 1 : 0);
            $weightPlus = ($this->weight > $anotherCat->weight ? 1 : 0);
            $strengthPlus = ($this->strength > $anotherCat->strength ? 1 : 0);
            $count = $agePlus + $weightPlus + $strengthPlus;
            
            if ($countMin == 3){
                $result = "C1 true, C2 false!";
            }else {$result = ($count>=2 ? ($this->name . "won!") :$this->name . "lost!");}
            return $result;
    }
}

$Cat1 = new Cat();
$Cat1->name = "C1";
$Cat1->age=3;
$Cat1->weight=6;
$Cat1->strength=10;
$Cat2 = new Cat();
$Cat2->name="C2"; 
$Cat2->age=4;
$Cat2->weight=7;
$Cat2->strength=10;
$result=$Cat2->fight($Cat1);
echo $result;
?>
