<?php
class Database
{
	public $host='localhost';
	public $username='root';
	public $password='1234';
	public $name='gym';
	public static function insert($sql)
	{
		if (mysqli_query($mysqli, $sql)) {
			return true;
		}
		else 
		{
			return false;
		}
	}
}
?>