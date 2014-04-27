<?php

require("CaptCha.php");

class CaptChaSpec extends PHPUnit_Framework_TestCase {
	public $captCha;
	public $randomizer;
	
	function testGetFirstOperant(){
		$this->captCha = new CaptCha("1","1","1","1");
		$this->assertEquals("One",$this->captCha->getFirstOperant());
	}

	function testGetSecondOperant(){
		$this->captCha = new CaptCha("1","1","1","1");
		$this->assertEquals("1",$this->captCha->getSecondOperant());
	}
	
	function testGetOperator(){
		$this->captCha = new CaptCha("1","1","1","1");
		$this->assertEquals("+",$this->captCha->getOperantor());
	}

	function testPattern1GetFirstText(){
		$this->captCha = new CaptCha("1","1","1","1");
		$this->assertEquals("One",$this->captCha->getFirstOperant());
	}

	function testPattern2GetFirstNum(){
		$this->captCha = new CaptCha("2","1","1","1");
		$this->assertEquals("1",$this->captCha->getFirstOperant());
	}

	function testPattern1GetSecondNum(){
		$this->captCha = new CaptCha("1","1","1","1");
		$this->assertEquals("1",$this->captCha->getSecondOperant());
	}

	function testPattern2SecondOpIs2GetTwo(){
		$this->captCha = new CaptCha("2","1","1","2");
		$this->assertEquals("Two",$this->captCha->getSecondOperant());
	}

	function testPattern1SecondOpIs2Get2(){
		$this->captCha = new CaptCha("1","1","1","2");
		$this->assertEquals("2",$this->captCha->getSecondOperant());
	}

	function testPattern1FirstOpIs2Get2(){
		$this->captCha = new CaptCha("1","2","1","2");
		$this->assertEquals("Two",$this->captCha->getFirstOperant());
	}

	function testGetResult_1_1_1_1(){
		$this->captCha = new CaptCha("1","1","1","1");
		$this->assertEquals("2",$this->captCha->getResult());
	}

	function testGetResult_2_3_2_1(){
		$this->captCha = new CaptCha("2","3","2","2");
		$this->assertEquals("6",$this->captCha->getResult());
	}

	function testToString_2_3_2_1(){
		$this->captCha = new CaptCha("2","3","2","2");
		$this->assertEquals("3*Two = 6",$this->captCha->toString());
	}
	function testGetRandomPattern(){
		$this->randomizer = new Randomizer();
		$this->assertContains($this->randomizer->testGetRandomPattern(),[1,2]);
	}

	function testGetRandomFirstOperant(){
		$this->randomizer = new Randomizer();
		$this->assertContains($this->randomizer->getRandomFirstOperant(),[1,2,3,4,5,6,7,8,9]);
	}

	function testGetRandomSecondOperant(){
		$this->randomizer = new Randomizer();
		$this->assertContains($this->randomizer->getRandomSecondOperant(),[1,2,3,4,5,6,7,8,9]);
	}

	function testGetRandomOperantant(){
		$this->randomizer = new Randomizer();
		$this->assertContains($this->randomizer->getRandomOperantant(),[1,2,3]);
	}
	
	function testGetCaptchaSevice(){
		$this->randomizer = new Randomizer();
		$this->captCha = new CaptCha($this->testGetRandomPattern,$this->getRandomFirstOperant,$this->getRandomOperantant,$this->getRandomSecondOperant);

	}

}