<?php


class DepartmentController extends Controller
{
    public function viewDepartments()
    {
        $this->viewHome("departments");
    }
    public function viewEditingDepartment($id)
    {
        $this->viewHome("departments",[
            'departmentId'=>$id
        ]);
    }
    public function addDepartment()
    {
        session_start();
        $gym=$this->getGymData();
        $department = $this->model("UserType");
        $department->setName(htmlentities($_GET['depName']));
        if ($department->checkifavailable($gym->getId())=='1') {
            $_SESSION['messege'] = "This branch already exist";
            $this->previousPage();


        } else {
            //reception
            $receptionPage = $this->model("Page");
            $receptionPage->set_id(1);
            $receptionPage->set_name("Reciption");
            $receptionPage->set_access(isset($_GET['receptionCheck']) ? 1 : 0);
            $department->setPages($receptionPage->get_id(), $receptionPage);

            //notifications
            $notificationPage = $this->model("Page");
            $notificationPage->set_id(2);
            $notificationPage->set_name("Notifications");
            $notificationPage->set_access(isset($_GET['notificationCheck']) ? 1 : 0);
            $department->setPages($notificationPage->get_id(), $notificationPage);

            //Members
            $memberPage = $this->model("Page");
            $memberPage->set_id(3);
            $memberPage->set_name("Members");
            $memberPage->set_access(isset($_GET['membersCheck']) ? 1 : 0);
            $department->setPages($memberPage->get_id(), $memberPage);

            //Emlpoyees
            $EmlpoyeesPage = $this->model("Page");
            $EmlpoyeesPage->set_id(4);
            $EmlpoyeesPage->set_name("Emlpoyees");
            $EmlpoyeesPage->set_access(isset($_GET['employeesCheck']) ? 1 : 0);
            $department->setPages($EmlpoyeesPage->get_id(), $EmlpoyeesPage);

            //Contracts
            $ContractsPage = $this->model("Page");
            $ContractsPage->set_id(5);
            $ContractsPage->set_name("Contracts");
            $ContractsPage->set_access(isset($_GET['contractsCheck']) ? 1 : 0);
            $department->setPages($ContractsPage->get_id(), $ContractsPage);

            //Administration
            $AdministrationPage = $this->model("Page");
            $AdministrationPage->set_id(6);
            $AdministrationPage->set_name("Administration");
            $AdministrationPage->set_access(isset($_GET['adminCheck']) ? 1 : 0);
            $department->setPages($AdministrationPage->get_id(), $AdministrationPage);

            //Reports
            $ReportsPage = $this->model("Page");
            $ReportsPage->set_id(7);
            $ReportsPage->set_name("Reports");
            $ReportsPage->set_access(isset($_GET['reportsCheck']) ? 1 : 0);
            $department->setPages($ReportsPage->get_id(), $ReportsPage);
            if ($gym->addDepartment($department)) {
                $_SESSION['successMessege'] = "Added successfully";

                $this->redirect("department/viewDepartments");


            } else {
                $_SESSION['errormessege'] = "can't' add this department right now";

                $this->previousPage();
            }
        }
    }
    public function editDepartment()
    {
        session_start();
        $gym=$this->getGymData();
        $gym->getUserTypes()[$_GET['depEditId']]->setName(htmlentities($_GET['depName']));
        if ($gym->getUserTypes()[$_GET['depEditId']]->checkifavailable($gym->getId()) == '1') {
            $_SESSION['messege'] = "This branch already exist";
            $this->previousPage();

        } else {
            $gym->getUserTypes()[$_GET['depEditId']]->getPages()[1]->set_access(isset($_GET['receptionCheck']) ? 1 : 0);
            $gym->getUserTypes()[$_GET['depEditId']]->getPages()[2]->set_access(isset($_GET['notificationCheck']) ? 1 : 0);
            $gym->getUserTypes()[$_GET['depEditId']]->getPages()[3]->set_access(isset($_GET['membersCheck']) ? 1 : 0);
            $gym->getUserTypes()[$_GET['depEditId']]->getPages()[4]->set_access(isset($_GET['employeesCheck']) ? 1 : 0);
            $gym->getUserTypes()[$_GET['depEditId']]->getPages()[5]->set_access(isset($_GET['contractsCheck']) ? 1 : 0);
            $gym->getUserTypes()[$_GET['depEditId']]->getPages()[6]->set_access(isset($_GET['adminCheck']) ? 1 : 0);
            $gym->getUserTypes()[$_GET['depEditId']]->getPages()[7]->set_access(isset($_GET['reportsCheck']) ? 1 : 0);
            if ($gym->editDepartment($_GET['depEditId'])) {
                $_SESSION['successMessege'] = "Edited Successfully";

                $this->redirect("department/viewDepartments");

            } else {
                $_SESSION['errormessege'] = "can't' Edit this department right now";

                $this->previousPage();
            }
        }
    }
    public function deleteDepartment($id)
    {
        session_start();
        $gym=$this->getGymData();
        if ($gym->deleteDepartment($id))
        {



            if($_SESSION['branch']!=NULL && $gym->getBranchs()[$_SESSION['branch']]->getEmployees()[$_SESSION['id']]->getUsertype()->getId()==$id)
            {
                session_destroy();
                $this->redirect("security/login");
            }
            else
            {
                $branches=$gym->getBranchs();
                foreach ($branches as $branch)
                {
                    $employees=$branch->getEmployees();
                    foreach ($employees as $employee)
                    {
                        if ($employee->getUsertype()->getId()==$id)
                        {
                            unset($employees[$employee->getId()]);
                        }
                    }
                    $branch->setAllEmployees($employees);
                }
                $gym->setAllBranchs($branches);
                $departments=$gym->getUserTypes();
                unset($departments[$id]);
                $gym->setAlldepartments($departments);
                $_SESSION['Gym'] = serialize($gym);
                $_SESSION['successMessege'] = "Deleted Successfully";
                $this->redirect("department/viewDepartments");
            }


        }
        else
        {
            $_SESSION['errormessege'] = "can't' delete this department right now";
            echo "<script> window.location.href='javascript:history.go(-1)';</script>";

        }
    }
}