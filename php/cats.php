<?
class Cat {
    public $age;
    public $weight;
    public $strength;

    function __construct() {
    }

    function fight($anotherCat) {
        
        global $result;
        
            $ageMin = ($this->age = $anotherCat->age ? 1 : 0);
            $weightMin = ($this->weight = $anotherCat->weight ? 1 : 0);
            $strengthMin = ($this->strength = $anotherCat->strength ? 1 : 0);
            $countMin = $ageMin + $weightMin + $strengthMin;

            $agePlus = ($this->age > $anotherCat->age ? 1 : 0);
            $weightPlus = ($this->weight > $anotherCat->weight ? 1 : 0);
            $strengthPlus = ($this->strength > $anotherCat->strength ? 1 : 0);
            $count = $agePlus + $weightPlus + $strengthPlus;
            $res = ($count>=2 ? 1 : 0);
            
            if ($countMin = 3){
                $result = "Paritet!";
            }else {$result = ($res ? "Cat1 win!":"Cat2 win!");}
        
    }
}

$Cat1 = new Cat();
$Cat1->age=3;
$Cat1->weight=6;
$Cat1->strength=10;
$Cat2 = new Cat();
$Cat2->age=3;
$Cat2->weight=6;
$Cat2->strength=10;
$Cat1->fight($Cat2);
$ren = $Cat1->fight($Cat2);
echo $result;
?>
