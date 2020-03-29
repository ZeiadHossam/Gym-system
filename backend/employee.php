<?php
include_once 'database.php';
include_once 'person.php';

class employee extends person
{
	private $usertype;
	private $username;
	private $password;
	private $dateadded;

	function __construct()
	{

		$this->usertype = new usertype();
	}




	public static function login($username,$password)
	{
		$query="SELECT id FROM employee WHERE userName='".$username."' AND password= '".$password."';";
		$db = new database();
		$row = $db->select($query);

		if ($row != NULL) {

			$_SESSION['id'] = $row['id'];
			return true;
		} else {
			return FALSE;

		}
	}

	
}
