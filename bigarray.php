<?php

/**
*  
*/
class BigArray 
{
	private $myarray,$mysqli;
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '123456';
	private $db = 'age';

    public $maxsize = 100000;

	function __construct()
	{
		// initialize the db
		$this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db);

		// initialize the array
		$i=0;
		
		while($i < $this->maxsize) {
		   $this->myarray[$i] = $i;
		   $i++;
		}

		//increse the php time limit
		set_time_limit(3600);
	}

	public function save(){
		$i=0;
		
		while($i < $this->maxsize) {
		  
		  $this->saveToDb($this->maxsize[$i]);

		  $i++;
		}

		$this->mysqli->close();
	}

	private function saveToDb($value){

		$stmt = $this->mysqli->prepare("INSERT INTO Student VALUES (?)");
		$stmt->bind_param('i', $value);


		/* execute prepared statement */
		$stmt->execute();

		

		/* close statement and connection */
		$stmt->close();
	}


}
// Test
$myclass = new BigArray();
$myclass->save();
