<?php
include_once 'database.php';
include_once 'person.php';
include_once 'usertype.php';
include_once 'pages.php';

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


	public static function addmember($member)
	{
		$db = new database();
		$sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,branchId)
		VALUES ('$member->firstName','$member->lastName','$member->birthDay','$member->image','$member->mobilePhone','$member->homePhone','$member->gender','$member->email','1');";


		$personID = "SELECT id FROM person WHERE firstName='$member->firstName' AND lastName='$member->lastName' AND mobilePhone='$member->mobilePhone'";
		$sql .= "INSERT INTO member (personId,address,marriedStatus,emergencyNumber,company,workPhone,faxNumber,companyAddress,addedBy)
                    VALUES (($personID),'$member->address','$member->marriedStatus','$member->emergencyNumber','$member->company','$member->workPhone','$member->faxNumber','$member->companyAddress',1);";

		if ($db->multiinsert($sql)) {
			return true;
		} else {

			return false;
		}
	}

	public static function login($query)
	{
		$db = new database();
		$row = $db->select($query);

		if ($row != NULL) {

			$_SESSION['id'] = $row['id'];
			return true;
		} else {
			return FALSE;

		}
	}

	public static function addtype($type)
	{
		$db = new database();
		$sql = "INSERT INTO type(name,gymId) VALUES('".$type->get_name()."','1');";
		$sql2="";
		$typeid = "SELECT id FROM type WHERE name='".$type->get_name()."'";
		foreach ($type->get_pages() as $page) {
		$pid = "SELECT id FROM pages WHERE pageName='".$page->get_name()."'";
		$sql2 .= "INSERT INTO privilege(typeId,pageId,hasAccess) VALUES(($typeid),($pid),'".$page->get_access()."');";
		
		}
		if ($db->insert($sql)) {
			if ($db->multiinsert($sql2)) {
				return true;
			}
			   } 
			   else {

            return false;
		}
    }
}
