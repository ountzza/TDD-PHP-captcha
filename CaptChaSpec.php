<?php

require("CaptCha.php");

class CaptChaSpec extends PHPUnit_Framework_TestCase {
	public $captCha;

	function testGetFirstOperant(){
		$this->captCha = new CaptCha();
		$this->assertEquals("1",$this->captCha->getFirstOperant("1"));
	}

		function testGetSecondOperant(){
		$this->captCha = new CaptCha();
		$this->assertEquals("1",$this->captCha->getSecondOperant("1"));
	}
}