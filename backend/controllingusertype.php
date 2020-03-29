<?php
include_once 'usertype.php';
include_once 'employee.php';
include_once 'pages.php';
if (isset($_GET['addtype'])) {
    $type=new usertype();
    $type->set_name($_GET['departmentname']);


    if (isset($_GET['reception'])) {
        $p1 = new pages();
        $p1->set_name('Reciption');

        if ($_GET['reception'] == 'Yes') {
            $p1->set_access('1');

        } else {
            $p1->set_access('0');

        }
        $type->get_pages()->append($p1);
        unset($p1);
    }
     if (isset($_GET['notification'])) {
        $p1 = new pages();
        $p1->set_name('Notification');

        if ($_GET['notification'] == 'Yes') {
            $p1->set_access('1');

        } else {
            $p1->set_access('0');

        }
        array_push($type->get_pages(),$p1);
        unset($p1);

    }
    if (isset($_GET['members'])) {
        $p1 = new pages();
        $p1->set_name('Members');

        if ($_GET['members'] == 'Yes') {
            $p1->set_access('1');

        } else {
            $p1->set_access('0');

        }
        $type->set_pages($p1);
        unset($p1);

    }
    if (isset($_GET['employees'])) {
        $p1 = new pages();
        $p1->set_name('Employees');

        if ($_GET['employees'] == 'Yes') {
            $p1->set_access('1');

        } else {
            $p1->set_access('0');

        }
        $type->set_pages($p1);
        unset($p1);

    }
    if (isset($_GET['contracts'])) {
        $p1 = new pages();
        $p1->set_name('Contracts');

        if ($_GET['contracts'] == 'Yes') {
            $p1->set_access('1');

        } else {
            $p1->set_access('0');

        }
        $type->set_pages($p1);
        unset($p1);

    }
    if (isset($_GET['admin'])) {
        $p1 = new pages();
        $p1->set_name('Administration');

        if ($_GET['admin'] == 'Yes') {
            $p1->set_access('1');

        } else {
            $p1->set_access('0');

        }
        $type->set_pages($p1);
        unset($p1);

    }
    if (isset($_GET['reports'])) {
        $p1 = new pages();
        $p1->set_name('Reports');

        if ($_GET['reports'] == 'Yes') {
            $p1->set_access('1');

        } else {
            $p1->set_access('0');

        }
        $type->set_pages($p1);
        unset($p1);

    }
    if(employee::addtype($type))
    {
        //echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }
    else
    {
        echo "<script> alert('Cannot add member');</script>";
    }
unset($type);
}
