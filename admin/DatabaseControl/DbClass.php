<?php
class Database{
	private $db;
	public function connection(){
		$this->db=mysqli_connect("localhost","root","","ovp_portal");
		if (mysqli_connect_errno()) {
			return "Failed to connect";
			exit();
		}
		else{
			return $this->db;
		}
	}	
}
?>