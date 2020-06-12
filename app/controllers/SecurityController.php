<?php

class SecurityController extends Controller
{
    public function login()
    {
        $this->view("login");
    }
    public function logout()
    {
        session_start();
        session_destroy();
        $this->redirect("security/login");
    }

    public function auth()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        if($username=="system"&&$password=="system")
        {

            session_start();
            $_SESSION['id']=-1;
            $this->redirect("register/register");

        }
        else {
            session_start();
            $employee=$this->model("Employee");
            $loggedInInfo = $employee->login($username, md5($password));
            if ($loggedInInfo != NULL) {
                $system=$this->model("System");
                if($system->checkGymActivity($loggedInInfo['branchId'],$loggedInInfo['id']))
                {

                    $gym=$system->getGymdata($loggedInInfo);
                    $_SESSION['id'] = $loggedInInfo['id'];
                    $_SESSION['branch'] = $loggedInInfo['branchId'];
                    $_SESSION['Gym'] = serialize($gym);
                    $this->redirect("home/index");
                }
                else
                {

                    $_SESSION['messege']="Gym is not Active";
                    $this->redirect("security/login");

                }
            } else {

                $_SESSION['messege']="Invalid UserName or Password";
                $this->redirect("security/login");

            }
        }
    }
}