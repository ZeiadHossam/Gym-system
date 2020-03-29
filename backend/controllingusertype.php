<?php
include_once 'usertype.php';
include_once 'employee.php';
include_once 'pages.php';
if (isset($_GET['addtype'])) {
    $type=new usertype();
    $type->set_name($_GET['departmentname']);

	//
    if (isset($_GET['reception'])) {
        $p1 = new pages();
		$p1->set_name('Reciption');
		$p1->set_access('1');
        $type->set_pages($p1);
        unset($p1);
    }
	else {
		$p1 = new pages();
		$p1->set_name('Reciption');
		$p1->set_access('0');
		$type->set_pages($p1);
		unset($p1);
	}
	//
	if (isset($_GET['notification'])) {
        $p2 = new pages();
		$p2->set_name('Notifications');
		$p2->set_access('1');
		$type->set_pages($p2);
        unset($p2);

    }
	else {
		$p2 = new pages();
		$p2->set_name('Notifications');
		$p2->set_access('0');
		$type->set_pages($p2);
		unset($p2);
	}
    if (isset($_GET['members'])) {
        $p3 = new pages();
        $p3->set_name('Members');
		$p3->set_access('1');
        $type->set_pages($p3);
        unset($p3);

    }
	else {
		$p3 = new pages();
		$p3->set_name('Members');
		$p3->set_access('0');
		$type->set_pages($p3);
		unset($p3);
	}
    if (isset($_GET['employees'])) {
        $p4 = new pages();
        $p4->set_name('Employees');
		$p4->set_access('1');
        $type->set_pages($p4);
        unset($p4);

    }
	else {
		$p4 = new pages();
		$p4->set_name('Employees');
		$p4->set_access('0');
		$type->set_pages($p4);
		unset($p4);
	}
    if (isset($_GET['contracts'])) {
        $p5 = new pages();
        $p5->set_name('Contracts');
            $p5->set_access('1');

        $type->set_pages($p5);
        unset($p5);

    }
	else {
		$p5 = new pages();
		$p5->set_name('Contracts');
		$p5->set_access('0');
		$type->set_pages($p5);
		unset($p5);
	}
    if (isset($_GET['admin'])) {
        $p6 = new pages();
        $p6->set_name('Administration');

            $p6->set_access('1');

        
        $type->set_pages($p6);
        unset($p6);

    }
	else {
		$p6 = new pages();
		$p6->set_name('Administration');
		$p6->set_access('0');
		$type->set_pages($p6);
		unset($p6);
	}
    if (isset($_GET['reports'])) {
        $p7 = new pages();
        $p7->set_name('Reports');

        $p7->set_access('1');

        $type->set_pages($p7);
        unset($p7);

    }
	else 
	{
		$p7 = new pages();
		$p7->set_name('Reports');
		$p7->set_access('0');
		$type->set_pages($p7);
		unset($p7);
	}
    if(employee::addtype($type))
    {
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else
    {
        echo "<script> alert('Cannot add User Type');</script>";
    }
unset($type);
}
