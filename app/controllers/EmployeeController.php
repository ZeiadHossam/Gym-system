<?php


class EmployeeController extends Controller
{
    public function showAllEmployees()
    {
        $this->viewHome("employees");

    }
    public function addEmployee()
    {
        session_start();
        $gym=$this->getGymData();
        $employee = $this->model("Employee");
        $employee->setUserName(htmlentities($_GET['username']));
        if (!$employee->checkusernameifavailable()) {
            $_SESSION['messege'] = "Username already exist";
            $this->previousPage();
        } else {

            $employee->setFirstName(htmlentities($_GET['fname']));
            $employee->setLastName(htmlentities($_GET['lname']));
            $employee->setEmail(htmlentities($_GET['email']));
            $employee->setGender(htmlentities($_GET['gender']));
            $employee->setMobilePhone(htmlentities($_GET['phonenumber']));
            $employee->setHomePhone(htmlentities($_GET['homephone']));
            $employee->setPassword(htmlentities($_GET['password']));
            $employee->setBirthday(htmlentities($_GET['birthday']));
            if (isset($_FILES['Pimage'])) {
                $img = $_FILES["Pimage"]["name"];
                move_uploaded_file($_FILES["Pimage"]["tmp_name"], "/GYM/public/img/" . $img);
            } else {
                $img = "DefaultPersonImage.png";
            }
            $employee->setImage($img);
            $employee->getUsertype()->setId(htmlentities($_GET['usertype']));
            $employee->getUsertype()->setName($gym->getUserTypes()[$_GET['usertype']]->getName());
            foreach ($gym->getUserTypes()[$_GET['usertype']]->getPages() as $page) {
                $newpage = $this->model("Page");
                $newpage->set_id($page->get_id());
                $newpage->set_name($page->get_name());
                $newpage->set_access($page->get_access());
                $employee->getUsertype()->setPages($newpage->get_id(), $newpage);
            }
            if (isset($_GET['branch'])) {
                $branch = $_GET['branch'];
            } else {
                $branch = $_SESSION['branch'];
            }
            if ($gym->getBranchs()[$branch]->addemployee($employee, $branch)) {
                $_SESSION['Gym'] = serialize($gym);
                $_SESSION['successMessege'] = "Added Successfully";
                $this->redirect("employee/showAllEmployees");

            } else {
                $_SESSION['errormessege'] = "There was a problem while Adding Employee";
                $this->previousPage();
            }
        }
    }
    public function deleteEmployee($branchId,$employeeId)
    {
        session_start();
        $gym=$this->getGymData();
        $personId = $gym->getBranchs()[$branchId]->getEmployees()[$employeeId]->getPid();
        if ($gym->getBranchs()[$branchId]->deleteEmployee($personId)) {
            $Employees = $gym->getBranchs()[$branchId]->getEmployees();
            unset($Employees[$employeeId]);
            $gym->getBranchs()[$branchId]->setAllEmployees($Employees);
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Deleted Successfully";
            $this->redirect("employee/showAllEmployees");
        } else {
            $_SESSION['errormessege'] = "can't' delete this Employee right now";
            $this->previousPage();
        }
    }
    public function viewEmployee($branchId,$employeeId)
    {
        session_start();
        $gym=$this->getGymData();
        $employee=$gym->getBranchs()[$branchId]->getEmployees()[$employeeId];
        $this->viewHome("viewemployee",[
            "branchId"=>$branchId,
            "employee"=>$employee
        ]);

    }
    public function viewEditEmployee($branchId,$employeeId)
    {
        session_start();
        $gym=$this->getGymData();
        $employee=$gym->getBranchs()[$branchId]->getEmployees()[$employeeId];
        $this->viewHome("editemployee",[
            "branchId"=>$branchId,
            "employee"=>$employee
        ]);
    }
    public function editEmployee()
    {
        session_start();
        $gym=$this->getGymData();
        if (file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])) {
            $img = $_FILES["img"]["name"];
            move_uploaded_file($_FILES["img"]["tmp_name"], "/GYM/public/img/" . $img);
        } elseif ($gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getImage() == "DefaultPersonimage.png") {
            $img = "DefaultPersonimage.png";
        } else {
            $img = $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getImage();
        }
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setFirstName(htmlentities($_POST['firstName']));
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setLastName(htmlentities($_POST['lname']));
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setEmail(htmlentities($_POST['email']));
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setGender(htmlentities($_POST['gender']));
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setMobilePhone(htmlentities($_POST['mobilePhone']));
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setHomePhone(htmlentities($_POST['homePhone']));
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setBirthday(htmlentities($_POST['birthday']));
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->setImage($img);
        $userTypeId=$_POST['usertype'];
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getUsertype()->setId($_POST['usertype']);
        $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getUsertype()->setName($gym->getUserTypes()[$userTypeId]->getName());
        for($i=1;$i<8;$i++)
        {
            $gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']]->getUsertype()->getPages()[$i]->set_access($gym->getUserTypes()[$userTypeId]->getPages()[$i]->get_access());
        }
        if (isset($_POST['branch'])) {
            $branchId = $_POST['branch'];
        }
        else
        {
            $branchId = $_POST['branchId'];
        }
        if ($gym->getBranchs()[$_POST['branchId']]->editEmployee($_POST['employeeEditId'],$branchId)) {
            if (isset($_POST['branch']))
            {
                $branchId=$_POST['branch'];
                $employee=$gym->getBranchs()[$_POST['branchId']]->getEmployees()[$_POST['employeeEditId']];
                $allEmployees=$gym->getBranchs()[$_POST['branchId']]->getEmployees();
                unset($allEmployees[$_POST['employeeEditId']]);
                $gym->getBranchs()[$_POST['branchId']]->setAllEmployees($allEmployees);
                $gym->getBranchs()[$branchId]->setEmployees($employee->getId(),$employee);
            }
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Edited Successfully";
            $this->redirect("employee/showAllEmployees");
        } else {
            $_SESSION['errormessege'] = "can't' Edit this Employee right now";
            $this->previousPage();
        }
    }
}