<?php


class Controller
{
    public function model($model){
        require_once '../app/models/'.$model.'.php';
        return new $model;
    }

    public function modelWithConst($model,$constParam){
        require_once '../app/models/'.$model.'.php';
        return new $model($constParam);
    }

    public function view($view, $data = []){
        require_once '../app/views/'.$view.'.php';
    }
    public function viewHome($view, $data = []){
        if(!isset($_SESSION))
        {
        session_start();
         }
        if(!isset($_SESSION['id']))
        {
            $this->redirect("security/login");
        }
        else
        {
        $gym=$this->getGymData();
        if ($_SESSION['branch']==NULL)
        {
            $loggedemployee=$gym->getOwner();
            $branchName="";
        }
        else
        {
            $loggedemployee=$gym->getBranchs()[$_SESSION['branch']]->getEmployees()[$_SESSION['id']];
            $branchName=$gym->getBranchs()[$_SESSION['branch']]->getCity();

        }
        $pages=$loggedemployee->getUsertype()->getPages();
        require_once '../app/views/shared/main.php';
        require_once '../app/views/'.$view.'.php';
        require_once '../app/views/shared/footer.php';
    }}
    public function redirect($url){
        echo "<script> window.location.href='/GYM/".$url."';</script>";
    }
    public function getGymData()
    {
        $gym=$this->model("Gym");
        $gym=unserialize($_SESSION['Gym']);
        return $gym;
    }
    public function previousPage()
    {
        echo "<script> window.location.href='javascript:history.go(-1)';</script>";

    }
}