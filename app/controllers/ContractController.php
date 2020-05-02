<?php


class ContractController extends Controller
{
    public function viewContracts()
    {
        $this->viewHome("contracts");
    }
    public function getContractTypes(){
        $packageId = isset($_POST['packageId']) ? $_POST['packageId'] : '';
        session_start();
        $gym=$this->getGymData();
        $options="<option class='hidden'  selected disabled>Select Type</option>";
        foreach ($gym->getPackages()[$packageId]->getPeriod() as $period){
            $options.="<option value='".$period->getId()."'>".$period->getPeriod()."</option>";
        }
        echo $options;

    }

}