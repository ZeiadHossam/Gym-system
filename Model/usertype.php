<?php

include_once 'database.php';
include_once 'pages.php';
class usertype
{
    private $id;
    private $name;
    private $pages;
    function __construct() {
        $this->pages = array();
    }
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
    function set_pages($page) {
    $this->pages[] = $page;
}
    function get_pages() {
        return $this->pages;
    }
    function set_id($id) {
        $this->id = $id;
    }
    function get_id() {
        return $this->id;
    }
	public function addtype()
	{
		session_start();
		$db = new database();
		$pid="SELECT personId FROM employee WHERE id=".$_SESSION['id'];
		$gymId="SELECT gymId FROM person INNER JOIN branch ON person.branchId = branch.id WHERE person.id=($pid)";
		$sql = "INSERT INTO type(name,gymId) VALUES('".$this->name."',($gymId));";
		$sql2="";
		$typeid = "SELECT id FROM type WHERE name='".$this->name."'";
		foreach ($this->pages as $page) {
			$pid = "SELECT id FROM pages WHERE pageName='".$page->get_name()."'";
			$sql2 .= "INSERT INTO privilege(typeId,pageId,hasAccess) VALUES(($typeid),($pid),'".$page->get_access()."');";

		}
		if ($db->insert($sql)) {
			if ($db->multiinsert($sql2)) {
				return true;
			}
		} else {

			return false;
		}
	}
}