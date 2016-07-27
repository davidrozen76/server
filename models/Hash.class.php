<?php

class Hash extends AbstractModel {
	private $modelName = "Hash";
	
	// Modelvariables
	private $hashId;
	private $hashlistId;
	private $hash;
	private $salt;
	private $plaintext;
	private $time;
	private $chunk;
	
	
	function __construct($hashId, $hashlistId, $hash, $salt, $plaintext, $time, $chunk) {
		$this->hashId = $hashId;
		$this->hashlistId = $hashlistId;
		$this->hash = $hash;
		$this->salt = $salt;
		$this->plaintext = $plaintext;
		$this->time = $time;
		$this->chunk = $chunk;

	}
	
	function getKeyValueDict() {
		$dict = array ();
		$dict['hashId'] = $this->hashId;
		$dict['hashlistId'] = $this->hashlistId;
		$dict['hash'] = $this->hash;
		$dict['salt'] = $this->salt;
		$dict['plaintext'] = $this->plaintext;
		$dict['time'] = $this->time;
		$dict['chunk'] = $this->chunk;
		
		return $dict;
	}
	
	function getPrimaryKey() {
		return "hashId";
	}
	
	function getPrimaryKeyValue() {
		return $this->hashId;
	}
	
	function getId() {
		return $this->hashId;
	}
	
	function setId($id) {
		$this->hashId = $id;
	}

	function getHashlistId(){
		return $this->hashlistId;
	}

	function setHashlistId($hashlistId){
		$this->hashlistId = $hashlistId;
	}

	function getHash(){
		return $this->hash;
	}

	function setHash($hash){
		$this->hash = $hash;
	}

	function getSalt(){
		return $this->salt;
	}

	function setSalt($salt){
		$this->salt = $salt;
	}

	function getPlaintext(){
		return $this->plaintext;
	}

	function setPlaintext($plaintext){
		$this->plaintext = $plaintext;
	}

	function getTime(){
		return $this->time;
	}

	function setTime($time){
		$this->time = $time;
	}

	function getChunk(){
		return $this->chunk;
	}

	function setChunk($chunk){
		$this->chunk = $chunk;
	}
}
