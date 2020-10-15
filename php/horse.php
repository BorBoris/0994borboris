<?
abstract class Animal{
    private $nick;
    function __construct($nick){
        $this->nickname = $nick;
    }
    function getNickname(){return $this->nickname;}
}

class Horse extends Animal{
    function run(){ 
        if ($this instanceof Pegasus) {
          echo("Running is so uncomfortable!");   
        }else {
          echo("Ai-ho-ho, I rode!");
        }
    }
    function fly(){
        if (!($this instanceof Pegasus)) {
          echo("Oops, horses don't fly!");   
        }
    }
}

class Pegasus extends Horse{
    function fly(){
        echo("Ai-ho-ho, I flew!");
        
    }
}

$horis = new Horse("Horis");
$porgy = new Pegasus("Porgy");
$horis->fly();

?>