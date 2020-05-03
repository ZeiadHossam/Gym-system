<?php


class ContractController extends Controller
{
    public function viewContracts()
    {
        $this->viewHome("contracts");
    }

    public function getContractTypes()
    {
        $packageId = isset($_POST['packageId']) ? $_POST['packageId'] : '';
        session_start();
        $gym = $this->getGymData();
        $options = "<option class='hidden'  selected disabled>Select Type</option>";
        foreach ($gym->getPackages()[$packageId]->getPeriod() as $period) {
            $options .= "<option value='" . $period->getId() . "'>" . $period->getPeriod() . "</option>";
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
        $contract->setAmountDue(htmlentities($_POST['AmountDue']));
        $contract->setTotalAmount(htmlentities($_POST['totalAmount']));
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
        $sales= explode("|",$_POST["Sales"]);
        $contract->setSales($sales[0]);


        if ($gym->getBranchs()[$branchId]->getMembers()[$memberId]->addContract($contract,$sales[1])) {

            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Added Successfully";
            $this->redirect("contract/viewContracts");

        } else {
            $_SESSION['errormessege'] = "There was a problem while Adding Contract";
            $this->previousPage();
        }


    }
    public function deleteContract($memberId,$contractId)
    {
        session_start();
        $gym=$this->getGymData();
        $contractId = $gym->getBranchs()->getMembers()[$memberId]->getContracts[$contractId]->getid();
        if ($gym->getBranchs()->getMembers()[$memberId]->deleteEmployee($contractId)) {
            $contracts = $gym->getBranchs()->getMembers()[$memberId];
            unset($contracts[$contractId]);
            $gym->getBranchs()->setMembers($contracts);
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Deleted Successfully";
            $this->redirect("contract/viewContracts");
        } else {
            $_SESSION['errormessege'] = "can't' delete this contract right now";
            $this->previousPage();
        }
    }
}
