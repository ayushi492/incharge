<?php
class Database{
	private $db;
	public function connection(){
		$this->db=mysqli_connect("database-1-instance-1.cq612gkfzj3y.us-east-1.rds.amazonaws.com","incdbadmin","LifeCycle12","incfront");
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