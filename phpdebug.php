<?php
	require_once('phpconsole.php');

	$consolePHP = new PHPConsole();

	$stringinput = "hewllo world 10";

	$numeric = 11;

	$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");

	$os=array("OS","Linux","Windows");

	$consolePHP->console($stringinput,"warning");
	$consolePHP->console("hel\"lo","log","hello");
	$consolePHP->console("nothing here","log");

	$consolePHP->clear();
	

	$consolePHP->console($stringinput,"warning");
	$consolePHP->console("hel\"lo","log","hello",true);
	$consolePHP->console("nothing here","log");
	$consolePHP->console($numeric,"info");
	$consolePHP->console($stringinput,"error");
	$consolePHP->console($age,"log","Array 1",true);
	$consolePHP->console($os,"log");



	$cart = new MyClass;
	$consolePHP->console($cart,"log");


	class MyClass  {  
    public $prop1 = "I'm a class property!";  
  
    public function setProperty($newval)       {  
        $this->prop1 = $newval;  
    }  
  
    public function getProperty()      {  
        return $this->prop1 . "<br />";  
    }  
}



