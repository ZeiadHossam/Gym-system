<?php


class ProfileController extends Controller
{
    public  function changeUsernameAndPassword()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $employee=$this->model("Employee");
        $userAndPass=$employee->getUsernameAndPassword($_SESSION['id']);
        $newUserName=htmlentities($_POST['userName']);
        $oldPassword=htmlentities($_POST['oldPassword']);
        $newPassword=htmlentities($_POST['newPassword']);
        if (md5($oldPassword)!=$userAndPass['password'])
        {
            $_SESSION['messege'] = "The entered password is not correct";
            $this->redirect("home/showprofile");
        }
        else
        {
            if ($employee->changeUsernameAndPassword($_SESSION['id'],$newUserName,$newPassword))
            {
                $_SESSION['successMessege'] = "Edited Successfully";
                $this->redirect("home/showprofile");
            }
            else
            {
                $_SESSION['errormessege'] = "There was an error during changing username and password";
               // $this->redirect("home/showprofile");
            }
        }
    }

}