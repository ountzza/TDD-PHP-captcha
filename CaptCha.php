<?php

class Randomizer {
	function getRandomPattern() {
		return rand(1,2);
	}
	function getRandomFirstOperant() {
		return rand(1,9);
	}
	function getRandomSecondOperant() {
		return rand(1,9);
	}
	function getRandomOperantant() {
		return rand(1,3);
	}
}
class CaptChaService {
	public $randomizer;

	function setRandomizer($randomizerStub){
		$this->randomizer = $randomizerStub;
	}
	function getCaptcha(){
		return new CaptCha($this->randomizer->getRandomPattern()
			,$this->randomizer->getRandomFirstOperant()
			,$this->randomizer->getRandomOperantant()
			,$this->randomizer->getRandomSecondOperant());
	}
}

class CaptCha {
	private $pattern;
	private $firstOperant;
	private $secondOperant;
	private $operantor;

	private $wordArray= ["Zero","One","Two","Three"];

	function __construct($pattern,$firstOperant,$operantor,$secondOperant) {
		$this->pattern = $pattern;
		$this->firstOperant = $firstOperant;
		$this->operantor = $operantor;
		$this->secondOperant = $secondOperant;
	}

	function getFirstOperant(){
		if($this->pattern==1){
			return $this->wordArray[$this->firstOperant];
		} else {
			return $this->firstOperant;
		}
	}

	function getSecondOperant(){
		if($this->pattern==1){
			return $this->secondOperant;
		} else {
			return $this->wordArray[$this->secondOperant];
		}
	}

	function getOperantor(){
		if($this->operantor == "1"){
			return "+";
		}
		if($this->operantor == "2"){
			return "*";
		}
		if($this->operantor == "3"){
			return "-";
		}
	}

	function getResult(){
		if($this->getOperantor()=="+"){
			return ($this->firstOperant)+($this->secondOperant);
		} 
		if($this->getOperantor()=="*"){
			return ($this->firstOperant)*($this->secondOperant);
		} 
		if($this->getOperantor()=="-"){
			return ($this->firstOperant)-($this->secondOperant);
		} 
	}

	function toString(){
		return $this->getFirstOperant() . $this->getOperantor() . $this->getSecondOperant() . " = " . $this->getResult();
	}

}


