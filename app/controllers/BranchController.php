<?php


class BranchController extends Controller
{
    public function viewBranches()
    {
        $this->viewHome("branch");
    }
    public function viewEditingBranch($id)
    {
        $this->viewHome("branch",[
            'branchId'=>$id
        ]);
    }
    public function addBranch()
    {
        session_start();
        $gym=$this->getGymData();
        $branch = $this->model("Branch");
        $branch->setCity(htmlentities($_GET['branchCity']));
        $branch->setAddress(htmlentities($_GET['branchAddress']));
        if ($branch->checkifavailable($gym->getId()) == '1') {
            $_SESSION['messege'] = "This branch already exist";
            $this->previousPage();
        } else {
            if ($gym->addBranch($branch)) {
                $_SESSION['successMessege'] = "Added Successfully";
                $this->redirect("branch/viewBranches");
            } else {
                $_SESSION['errormessege']="There was a problem while Adding  branch";
                $this->previousPage();
            }
        }
    }
    public function deleteBranch($id)
    {
        session_start();
        $gym=$this->getGymData();
        if ($gym->deleteBranch($id))
        {
            $branches=$gym->getBranchs();
            unset($branches[$id]);
            $gym->setAllBranchs($branches);
            $_SESSION['Gym'] = serialize($gym);
            if($_SESSION['branch']==$id)
            {
                session_destroy();
                $this->redirect("security/login");
            }
            else
            {
                $_SESSION['successMessege'] = "Deleted Successfully";
                $this->redirect("branch/viewBranches");            }
        }
        else
        {
            $_SESSION['errormessege'] = "can't' delete this branch right now";
            $this->previousPage();

        }
    }
    public function editBranch()
    {
        session_start();
        $gym=$this->getGymData();
        $gym->getBranchs()[$_GET['branchEditId']]->setCity(htmlentities($_GET['branchCity']));
        $gym->getBranchs()[$_GET['branchEditId']]->setAddress(htmlentities($_GET['branchAddress']));
        if ($gym->getBranchs()[$_GET['branchEditId']]->checkifavailable($gym->getId()) == '1') {
            $_SESSION['messege'] = "This branch already exist";
            $this->previousPage();
        } else {
            if ($gym->editBranch($_GET['branchEditId'])) {
                $_SESSION['successMessege'] = "Edited Successfully";

                $this->redirect("branch/viewBranches");
            } else {
                $_SESSION['errormessege']="There was a problem while Editing branch";
                $this->previousPage();
            }
        }
    }
}