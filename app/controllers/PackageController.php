<?php


class PackageController extends Controller
{
    public function viewPackages()
    {
        $this->viewHome("package");
    }
    public function viewEditingPackage($id)
    {
        $this->viewHome("package",[
            'packageId'=>$id
        ]);
    }
    public function addPackage()
    {
        session_start();
        $gym=$this->getGymData();
        $package=$this->modelWithConst("Package","array");
        $package->setName($_GET['packageName']);
        $package->setPeriodType($_GET['periodType']);
        $id=0;
        foreach ($_GET['contractTypes'] as $type) {
            if ($type=='0')
            {
                $_SESSION['messege'] = "contract Type cannot have 0 value";

                $this->previousPage();
                return;
            }
            $packageperiod=$this->model("PackagePeriod");
            $packageperiod->setPeriod($type);
            $id=$id+1;
            $package->setPeriodArray($id,$packageperiod);
        }

        if ($package->checkifavailable(($gym->getId())) == '1') {
            $_SESSION['messege'] = "This package already exist";

            $this->previousPage();
        } else {
            if ($gym->addPackage($package)) {
                $_SESSION['successMessege'] = "Added successfully";
                $this->redirect("package/viewPackages");
            } else {
                $_SESSION['errormessege'] = "There was a problem while Adding your package";
                $this->previousPage();
            }
        }
    }
    public function deletePackage($id)
    {
        session_start();
        $gym=$this->getGymData();
        if ($gym->deletePackage($id))
        {
            $packages=$gym->getPackages();
            unset($packages[$id]);
            $gym->setAllPackages($packages);
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Deleted Successfully";
            $this->redirect("package/viewPackages");
        }
        else
        {
            $_SESSION['errormessege'] = "can't' delete this Package right now";
            $this->previousPage();

        }
    }

    public function editPackage()
    {
        session_start();
        $gym=$this->getGymData();
        $gym->getPackages()[$_GET['packageEditId']]->setName(htmlentities($_GET['packageName']));
        $gym->getPackages()[$_GET['packageEditId']]->setPeriodType(htmlentities($_GET['periodType']));
        $id=0;
        $isContractConnected=false;
        foreach($gym->getBranchs() as $branch)
        {
            foreach ($branch->getMembers() as $member)
            {
                foreach($member->getContracts() as  $contract)
                {
                    if ($contract->getPackage()->getId()==$_GET['packageEditId']&&$contract->getStatus()!=4)
                    {
                        $isContractConnected=true;
                    }
                }
            }
        }
        if ($gym->getPackages()[$_GET['packageEditId']]->checkifavailable(($gym->getId())) == '1') {
            $_SESSION['messege'] = "This package already exist";

            $this->previousPage();
        }
        elseif($isContractConnected)
        {
            $_SESSION['messege'] = "This package Cannot be Edited as there are contracts with this package";
            $this->previousPage();
        }
        else{
            if ($gym->getPackages()[$_GET['packageEditId']]->deleteAllPeriods()) {
                foreach ($_GET['contractTypes'] as $type) {
                    $packageperiod = $this->model("PackagePeriod");
                    $packageperiod->setPeriod($type);
                    $id = $id + 1;
                    $gym->getPackages()[$_GET['packageEditId']]->setPeriodArray($id, $packageperiod);
                }
                if ($gym->getPackages()[$_GET['packageEditId']]->addPeriods()) {
                    if ($gym->editPackage($_GET['packageEditId'])) {
                        $_SESSION['successMessege'] = "Edited Successfully";
                        $this->redirect("package/viewPackages");
                    }
                    else {
                        $_SESSION['errormessege'] = "There was a problem while Editing your package";
                        $this->previousPage();
                    }

                }
                else {
                    $_SESSION['errormessege'] = "There was a problem while Editing your package";
                    $this->previousPage();
                }
            }
            else {
                $_SESSION['errormessege'] = "Cannot delete this package beacause there are contracts assigned to this package";
                $this->previousPage();
            }
        }
    }
}