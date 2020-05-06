<?php


class ContractController extends Controller
{
    public function viewContracts()
    {
        $this->viewHome("contracts");
    }

    public function viewContract($branchId, $memberId, $contractId)
    {
        session_start();
        $gym = $this->getGymData();
        $employee = $gym->getBranchs()[$branchId]->getMembers()[$memberId]->getContracts()[$contractId];
        $this->viewHome("viewcontract", [
            "branchId" => $branchId,
            "memberId" => $memberId,
            "contractId" => $contractId
        ]);
    }
    public function viewEditContract($branchId, $memberId, $contractId)
    {
        session_start();
        $gym = $this->getGymData();
        $employee = $gym->getBranchs()[$branchId]->getMembers()[$memberId]->getContracts()[$contractId];
        $this->viewHome("editcontract", [
            "branchId" => $branchId,
            "memberId" => $memberId,
            "contractId" => $contractId
        ]);
    }
    public function getContractTypes()
    {
        $packageId = isset($_POST['packageId']) ? $_POST['packageId'] : '';
        session_start();
        $gym = $this->getGymData();
        $options = "<option class='hidden'  selected disabled>Select Type</option>";
        foreach ($gym->getPackages()[$packageId]->getPeriod() as $period) {
            $options .= "<option value='" . $period->getId() . "'>" . $period->getPeriod() . " " . $gym->getPackages()[$packageId]->getPeriodType() . "</option>";
        }
        echo $options;

    }

    public function addContract()
    {

        session_start();
        $gym = $this->getGymData();
        $package = $gym->getPackages()[$_POST["PackageType"]];
        $newpackage = $this->modelWithConst("Package", "period");
        $newpackage->setId($_POST["PackageType"]);
        $newpackage->setName($package->getName());
        $newpackage->setPeriodType($package->getPeriodType());
        $packageperiod = $this->model("PackagePeriod");
        $packageperiod->setId($_POST['contracttype']);
        $packageperiod->setPeriod($package->getPeriod()[$_POST['contracttype']]->getPeriod());
        $newpackage->setPeriod($packageperiod);
        $contract = $this->model("Contract");
        $contract->setPackage($newpackage);
        $contract->setStartdate(htmlentities($_POST['MemberShipStart']));
        $contract->setEnddate(htmlentities($_POST['MemberShipEnd']));
        $contract->setRemainfreezedays(htmlentities($_POST['freezedays']));
        $contract->setPaymentDiscount($_POST['Discount']);
        $contract->setAmountPaid(htmlentities($_POST['AmountPaid']));
        $contract->setAmountDateDue(htmlentities($_POST['AmountDueDate']));
        $contract->setNote(htmlentities(isset($_POST['Notes']) ? $_POST['Notes'] : ''));
        if ($_POST['Discount']==0) {

            $totalAmount =$_POST['ContractFees'];
        } else {

            $totalAmount =$_POST['ContractFees']-($_POST['ContractFees']*($_POST['Discount']/100));
        }
        $contract->setTotalAmount(htmlentities($totalAmount));
        $amountDue=$totalAmount-$_POST['AmountPaid'];
        $contract->setAmountDue(htmlentities($amountDue));
        $contract->setPaymentFees(htmlentities($_POST['ContractFees']));
        $paymentmethod = $gym->getPaymentMethods()[$_POST["PaymentMethod"]];
        $newpaymentMethod = $this->model("PaymentMethod");
        $newpaymentMethod->setId($_POST["PaymentMethod"]);
        $newpaymentMethod->setName($paymentmethod->getName());
        $contract->setPaymentMethod($newpaymentMethod);
        $ids = explode('|', $_POST['member']);
        $branchId = $ids[0];
        $memberId = $ids[1];
        $contract->setRemaningPackagePeriod($packageperiod->getPeriod());
        $issueDate = $_POST['MemberShipEnd'];
        $issueDate = strtotime($issueDate);
        $issueDate = strtotime("-7 day", $issueDate);
        $issueDate = date('Y/m/d', $issueDate);
        $contract->setIssueDate($issueDate);
        $sales = explode("|", $_POST["Sales"]);
        $contract->setSales($sales[0]);


        if ($gym->getBranchs()[$branchId]->getMembers()[$memberId]->addContract($contract, $sales[1])) {

            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Added Successfully";
            $this->redirect("contract/viewContracts");

        } else {
            $_SESSION['errormessege'] = "There was a problem while Adding Contract";
            $this->previousPage();
        }


    }

    public function deleteContract($branchId, $memberId, $contractId)
    {
        session_start();
        $gym = $this->getGymData();
        if ($gym->getBranchs()[$branchId]->getMembers()[$memberId]->deleteContract($contractId)) {
            $contracts = $gym->getBranchs()[$branchId]->getMembers()[$memberId]->getContracts();
            unset($contracts[$contractId]);
            $gym->getBranchs()[$branchId]->getMembers()[$memberId]->setAllContracts($contracts);
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Deleted Successfully";
            $this->redirect("contract/viewContracts");
        } else {
            $_SESSION['errormessege'] = "can't' delete this contract right now";
            $this->previousPage();
        }
    }
    public function editContract($branchId,$memberId,$contractId){
        session_start();
        $gym=$this->getGymData();
        $member=$gym->getBranchs()[$branchId]->getMembers()[$memberId];
        $contract = $member->getContracts()[$contractId];
        $package = $gym->getPackages()[$_POST["PackageType"]];
        $newpackage = $this->modelWithConst("Package", "period");
        $newpackage->setId($_POST["PackageType"]);
        $newpackage->setName($package->getName());
        $newpackage->setPeriodType($package->getPeriodType());
        $packageperiod = $this->model("PackagePeriod");
        $packageperiod->setId($_POST['contracttype']);
        $packageperiod->setPeriod($package->getPeriod()[$_POST['contracttype']]->getPeriod());
        $newpackage->setPeriod($packageperiod);
        $contract->setPackage($newpackage);
        $contract->setRemainfreezedays(htmlentities($_POST['freezedays']));
        $contract->setStartdate(htmlentities($_POST['MemberShipStart']));
        $contract->setEnddate(htmlentities($_POST['MemberShipEnd']));
        $contract->setPaymentFees(htmlentities($_POST['ContractFees']));
        $contract->setPaymentDiscount($_POST['Discount']);
        $contract->setAmountPaid(htmlentities($_POST['AmountPaid']));
        $contract->setNote(htmlentities(isset($_POST['Notes']) ? $_POST['Notes'] : ''));
        $paymentmethod = $gym->getPaymentMethods()[$_POST["PaymentMethod"]];
        $newpaymentMethod = $this->model("PaymentMethod");
        $newpaymentMethod->setId($_POST["PaymentMethod"]);
        $newpaymentMethod->setName($paymentmethod->getName());
        $contract->setPaymentMethod($newpaymentMethod);
        $contract->setAmountDateDue(htmlentities($_POST['AmountDueDate']));
        $issueDate = $_POST['MemberShipEnd'];
        $issueDate = strtotime($issueDate);
        $issueDate = strtotime("-7 day", $issueDate);
        $issueDate = date('Y/m/d', $issueDate);
        $contract->setIssueDate($issueDate);

        if ($_POST['Discount']==0) {

            $totalAmount =$_POST['ContractFees'];
        } else {

            $totalAmount =$_POST['ContractFees']-($_POST['ContractFees']*($_POST['Discount']/100));
        }
        $contract->setTotalAmount(htmlentities($totalAmount));
        $amountDue=$totalAmount-$_POST['AmountPaid'];
        $contract->setAmountDue(htmlentities($amountDue));

        if ($gym->getBranchs()[$branchId]->getMembers()[$memberId]->EditContract($contractId)) {

            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Edited Successfully";
           $this->redirect("contract/viewContracts");

        } else {
            $_SESSION['errormessege'] = "There was a problem while Editing Contract";
           $this->previousPage();
        }

    }
    public function freezeContract($branchId,$memberId,$contractId)
    {
        session_start();
        $gym=$this->getGymData();
        $member=$gym->getBranchs()[$branchId]->getMembers()[$memberId];
        $freezeDate=$this->model("FreezeDate");
        $freezeDate->setFreezeFrom(htmlentities($_POST['freezeFromDate']));
        $freezeDate->setFreezeTo(htmlentities($_POST['freezeToDate']));
        foreach ($member->getContracts()[$contractId]->getFreezeDates() as $oldfreezeDate)
        {
            if ($freezeDate->getFreezeFrom()<=$oldfreezeDate->getFreezeFrom()&&$freezeDate->getFreezeTo()>=$oldfreezeDate->getFreezeTo())
            {
                $_SESSION['messege'] = "There is Already Freeze between ".$oldfreezeDate->getFreezeFrom()." And ".$oldfreezeDate->getFreezeTo();
                $this->redirect("contract/viewEditContract/".$branchId."/".$memberId."/".$contractId);
                return;
            }
            else if ($freezeDate->getFreezeFrom()>=$oldfreezeDate->getFreezeFrom()&&$freezeDate->getFreezeFrom()<=$oldfreezeDate->getFreezeTo())
            {
                $_SESSION['messege'] = "There is Already Freeze between ".$oldfreezeDate->getFreezeFrom()." And ".$oldfreezeDate->getFreezeTo();
                $this->redirect("contract/viewEditContract/".$branchId."/".$memberId."/".$contractId);
                return;

            }
            else if ($freezeDate->getFreezeTo()>=$oldfreezeDate->getFreezeFrom()&&$freezeDate->getFreezeTo()<=$oldfreezeDate->getFreezeTo()){
                $_SESSION['messege'] = "There is Already Freeze between ".$oldfreezeDate->getFreezeFrom()." And ".$oldfreezeDate->getFreezeTo();
                $this->redirect("contract/viewEditContract/".$branchId."/".$memberId."/".$contractId);
                return;

            }

        }
        if ($member->freezeContract($contractId,$freezeDate))
        {
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Freezed Successfully";
            $this->redirect("contract/viewEditContract/".$branchId."/".$memberId."/".$contractId);

        } else {
            $_SESSION['errormessege'] = "There was a problem while Freezing Contract";
            $this->previousPage();
        }
    }
    public function stopFreeze($branchId,$memberId,$contractId){
        session_start();
        $gym=$this->getGymData();
        $member=$gym->getBranchs()[$branchId]->getMembers()[$memberId];
        $contract = $member->getContracts()[$contractId];
        $todayDate = date("Y-m-d");

        foreach ($contract->getFreezeDates() as $freezeDate)
        {
            if ($todayDate >= $freezeDate->getFreezeFrom() && $todayDate <= $freezeDate->getFreezeTo()) {
                $freezeId=$freezeDate->getId();
            }
        }
        if ($member->stopFreeze($contractId,$freezeId))
        {
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Freeze stopped Successfully";
            $this->redirect("contract/viewEditContract/".$branchId."/".$memberId."/".$contractId);

        } else {
            $_SESSION['errormessege'] = "There was a problem while stopping Freezing";
            $this->previousPage();
        }
    }
    public function extendFreeze($branchId,$memberId,$contractId,$freezeId)
    {
        session_start();
        $gym=$this->getGymData();
        $member=$gym->getBranchs()[$branchId]->getMembers()[$memberId];
        if ($member->extendFreeze($contractId,$freezeId,$_POST['freezeToDate']))
        {
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Freeze Extended Successfully";
            $this->redirect("contract/viewEditContract/".$branchId."/".$memberId."/".$contractId);

        } else {
            $_SESSION['errormessege'] = "There was a problem while extending Freezing ";
            $this->previousPage();
        }
    }
}
