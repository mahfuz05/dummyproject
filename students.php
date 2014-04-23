<?php

/**
* 
*/
class Student 
{
	private $mysqli;
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '123456';
	private $db = 'students';
	

	function __construct()
	{
		$this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db);
	}

	public function getStudentGrade()
	{

		$query = "SELECT  student.id,student.name,grades.grade FROM student LEFT JOIN student ON student.id=grades.id";
		 $result = $this->mysqli->query($query);
		 if($result){

		   return $result->fetch_assoc();
		}

		return false;

	}
}

//implementation
$student = new Student();
$result = $student->getStudentGrade();
echo json_encode($result);


?>