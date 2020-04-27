<?php
include_once '../Model/system.php';
include_once '../Model/employee.php';
include_once '../Model/usertype.php';
include_once '../Model/page.php';
if (isset($_POST['addowner'])) {
    session_start();
    $system = new system();
    $gymName = htmlentities($_POST['gymname']);

    $branch = new branch();
    $branch->setCity('Main Branch');
    $branch->setAddress(htmlentities($_POST['branchaddress']));
    $employee = new employee();
    $employee->setEmail(htmlentities($_POST['email']));
    $employee->setusername(htmlentities($_POST['username']));
    $employee->setMobilePhone(htmlentities($_POST['mobilephone']));
    if (!$system->checkGymAvailability($gymName)) {
        $_SESSION['messege'] = "Gym name already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    } elseif (!$employee->checkusernameifavailable()) {
        $_SESSION['messege'] = "Username already exist";
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";
    }  else {
        $employee->setFirstName(htmlentities($_POST['fname']));
        $employee->setLastName(htmlentities($_POST['lname']));
        $employee->setHomePhone(htmlentities($_POST['homephone']));
        $employee->setpassword(htmlentities($_POST['password']));
        $employee->setBirthDay($_POST['birthday']);

        $employee->setGender($_POST['gender']);
        $employee->getUsertype()->setName("Owner");
        $employee->getUsertype()->setAllpages(addOwnerType());
        if (file_exists($_FILES['gymimage']['tmp_name']) || is_uploaded_file($_FILES['gymimage']['tmp_name'])) {
            $gymimg = $_FILES["gymimage"]["name"];
            move_uploaded_file($_FILES["gymimage"]["tmp_name"], "../public/img/" . $gymimg);
        }
        else
        {
            $gymimg="DefaultGymLogo.png";
        }
        if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
            $img = $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], "../public/img/" . $img);
        }
        else
        {
            $img="DefaultPersonimage.png";
        }

        $employee->setImage($img);

        if ($system->addgym($employee, $gymName, $branch, $gymimg)) {
            session_destroy();
            echo "<script> window.location.href='../views/login.php';</script>";
        } else {
            //$_SESSION['errormessege'] = "There was a problem while Adding your system";
           // echo "<script> window.location.href='javascript:history.go(-1)';</script>";
        }
    }
}

function addOwnerType()
{
    $pages=array();
    $receptionPage = new page();
    $receptionPage->set_id(1);
    $receptionPage->set_name("Reciption");
    $receptionPage->set_access( 1);
    $pages[1]=$receptionPage;
    //notifications
    $notificationPage = new page();
    $notificationPage->set_id(2);
    $notificationPage->set_name("Notifications");
    $notificationPage->set_access(1);
    $pages[2]= $notificationPage;

    //Members
    $memberPage = new page();
    $memberPage->set_id(3);
    $memberPage->set_name("Members");
    $memberPage->set_access(1);
    $pages[3]=$memberPage;

    //Emlpoyees
    $EmlpoyeesPage = new page();
    $EmlpoyeesPage->set_id(4);
    $EmlpoyeesPage->set_name("Emlpoyees");
    $EmlpoyeesPage->set_access(1);
    $pages[4]=$EmlpoyeesPage;

    //Contracts
    $ContractsPage = new page();
    $ContractsPage->set_id(5);
    $ContractsPage->set_name("Contracts");
    $ContractsPage->set_access(1);
    $pages[5]=$ContractsPage;

    //Administration
    $AdministrationPage = new page();
    $AdministrationPage->set_id(6);
    $AdministrationPage->set_name("Administration");
    $AdministrationPage->set_access(1);
    $pages[6]= $AdministrationPage;

    //Reports
    $ReportsPage = new page();
    $ReportsPage->set_id(7);
    $ReportsPage->set_name("Reports");
    $ReportsPage->set_access(1);
    $pages[7]=$ReportsPage;
    return $pages;
}