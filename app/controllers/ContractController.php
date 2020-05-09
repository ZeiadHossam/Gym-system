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
        if ($package->getPeriodType()!="Sessions")
        {
            if ($package->getPeriodType()=="Days")
            {
                $startTime=strtotime($contract->getStartDate());
                $endDate=strtotime("+".$packageperiod->getPeriod()." day",$startTime);
                $contract->setEnddate(date("Y-m-d",$endDate));
            }
            else
            {
                $startTime=strtotime($contract->getStartDate());
                $endDate=strtotime("+".($packageperiod->getPeriod()*30)." day",$startTime);
                $contract->setEnddate(date("Y-m-d",$endDate));
            }
        }
        else
        {
            $contract->setEnddate(htmlentities($_POST['MemberShipEnd']));

        }
        $contract->setRemainfreezedays(htmlentities($_POST['freezedays']));
        $contract->setPaymentDiscount($_POST['Discount']);
        $contract->setAmountPaid(htmlentities($_POST['AmountPaid']));
        $contract->setAmountDateDue(htmlentities($_POST['AmountDueDate']));
        $contract->setNote(htmlentities(isset($_POST['Notes']) ? $_POST['Notes'] : ''));
        if ($_POST['Discount'] == 0) {

            $totalAmount = $_POST['ContractFees'];
        } else {

            $totalAmount = $_POST['ContractFees'] - ($_POST['ContractFees'] * ($_POST['Discount'] / 100));
        }
        $contract->setTotalAmount(htmlentities($totalAmount));
        $amountDue = $totalAmount - $_POST['AmountPaid'];
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
        if ($package->getPeriodType() == "Days") {
            $datediff = strtotime($contract->getEndDate()) - strtotime($contract->getStartDate());
            $datediff = round($datediff / (60 * 60 * 24));
            $contract->setRemaningPackagePeriod($datediff);
        } else if ($package->getPeriodType() == "Months") {
            $diff = abs(strtotime($contract->getEndDate()) - strtotime($contract->getStartDate()));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $datediff = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $contract->setRemaningPackagePeriod($datediff);
        }
        else
        {
            $contract->setRemaningPackagePeriod($packageperiod->getPeriod());
        }
        $issueDate = $contract->getEndDate();
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

    public function editContract($branchId, $memberId, $contractId)
    {
        session_start();
        $gym = $this->getGymData();
        $member = $gym->getBranchs()[$branchId]->getMembers()[$memberId];
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
        if ($package->getPeriodType()!="Sessions")
        {
            if ($package->getPeriodType()=="Days")
            {
                $startTime=strtotime($contract->getStartDate());
                $endDate=strtotime("+".$packageperiod->getPeriod()." day",$startTime);
                $contract->setEnddate(date("Y-m-d",$endDate));
            }
            else
            {
                $startTime=strtotime($contract->getStartDate());
                $endDate=strtotime("+".($packageperiod->getPeriod()*30)." day",$startTime);
                $contract->setEnddate(date("Y-m-d",$endDate));
            }
        }
        else
        {
            $contract->setEnddate(htmlentities($_POST['MemberShipEnd']));

        }
        $todayDate = date("Y-m-d");
        if ($package->getPeriodType() == "Days") {
            $datediff = strtotime($contract->getEndDate()) - strtotime($todayDate);
            $datediff = round($datediff / (60 * 60 * 24));
            $contract->setRemaningPackagePeriod($datediff);
        } else if ($package->getPeriodType() == "Months") {
            $diff = abs(strtotime($contract->getEndDate()) - strtotime($todayDate));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $datediff = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $contract->setRemaningPackagePeriod($datediff);
        }
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
        $issueDate = $contract->getEndDate();
        $issueDate = strtotime($issueDate);
        $issueDate = strtotime("-7 day", $issueDate);
        $issueDate = date('Y-m-d', $issueDate);
        $contract->setIssueDate($issueDate);

        if ($_POST['Discount'] == 0) {

            $totalAmount = $_POST['ContractFees'];
        } else {

            $totalAmount = $_POST['ContractFees'] - ($_POST['ContractFees'] * ($_POST['Discount'] / 100));
        }
        $contract->setTotalAmount(htmlentities($totalAmount));
        $amountDue = $totalAmount - $_POST['AmountPaid'];
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

    public function freezeContract($branchId, $memberId, $contractId)
    {
        session_start();
        $gym = $this->getGymData();
        $member = $gym->getBranchs()[$branchId]->getMembers()[$memberId];
        $freezeDate = $this->model("FreezeDate");
        $freezeDate->setFreezeFrom(htmlentities($_POST['freezeFromDate']));
        $freezeDate->setFreezeTo(htmlentities($_POST['freezeToDate']));
        foreach ($member->getContracts()[$contractId]->getFreezeDates() as $oldfreezeDate) {
            if ($freezeDate->getFreezeFrom() <= $oldfreezeDate->getFreezeFrom() && $freezeDate->getFreezeTo() >= $oldfreezeDate->getFreezeTo()) {
                $_SESSION['messege'] = "There is Already Freeze between " . $oldfreezeDate->getFreezeFrom() . " And " . $oldfreezeDate->getFreezeTo();
                $this->redirect("contract/viewEditContract/" . $branchId . "/" . $memberId . "/" . $contractId);
                return;
            } else if ($freezeDate->getFreezeFrom() >= $oldfreezeDate->getFreezeFrom() && $freezeDate->getFreezeFrom() <= $oldfreezeDate->getFreezeTo()) {
                $_SESSION['messege'] = "There is Already Freeze between " . $oldfreezeDate->getFreezeFrom() . " And " . $oldfreezeDate->getFreezeTo();
                $this->redirect("contract/viewEditContract/" . $branchId . "/" . $memberId . "/" . $contractId);
                return;

            } else if ($freezeDate->getFreezeTo() >= $oldfreezeDate->getFreezeFrom() && $freezeDate->getFreezeTo() <= $oldfreezeDate->getFreezeTo()) {
                $_SESSION['messege'] = "There is Already Freeze between " . $oldfreezeDate->getFreezeFrom() . " And " . $oldfreezeDate->getFreezeTo();
                $this->redirect("contract/viewEditContract/" . $branchId . "/" . $memberId . "/" . $contractId);
                return;

            }

        }
        if ($member->freezeContract($contractId, $freezeDate)) {
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Freezed Successfully";
            $this->redirect("contract/viewEditContract/" . $branchId . "/" . $memberId . "/" . $contractId);

        } else {
            $_SESSION['errormessege'] = "There was a problem while Freezing Contract";
            $this->previousPage();
        }
    }

    public function stopFreeze($branchId, $memberId, $contractId)
    {
        session_start();
        $gym = $this->getGymData();
        $member = $gym->getBranchs()[$branchId]->getMembers()[$memberId];
        $contract = $member->getContracts()[$contractId];
        $todayDate = date("Y-m-d");

        foreach ($contract->getFreezeDates() as $freezeDate) {
            if ($todayDate >= $freezeDate->getFreezeFrom() && $todayDate <= $freezeDate->getFreezeTo()) {
                $freezeId = $freezeDate->getId();
            }
        }
        if ($member->stopFreeze($contractId, $freezeId)) {
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Freeze stopped Successfully";
            $this->redirect("contract/viewEditContract/" . $branchId . "/" . $memberId . "/" . $contractId);

        } else {
            $_SESSION['errormessege'] = "There was a problem while stopping Freezing";
            $this->previousPage();
        }
    }

    public function extendFreeze($branchId, $memberId, $contractId, $freezeId)
    {
        session_start();
        $gym = $this->getGymData();
        $member = $gym->getBranchs()[$branchId]->getMembers()[$memberId];
        if ($member->extendFreeze($contractId, $freezeId, $_POST['freezeToDate'])) {
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Freeze Extended Successfully";
            $this->redirect("contract/viewEditContract/" . $branchId . "/" . $memberId . "/" . $contractId);

        } else {
            $_SESSION['errormessege'] = "There was a problem while extending Freezing ";
            $this->previousPage();
        }
    }

    public function showReceipt($branchId, $memberId, $contractId)
    {
        session_start();
        $gym = $this->getGymData();
        $member = $gym->getBranchs()[$branchId]->getMembers()[$memberId];
        $this->printReceipt($member, $contractId);
    }

    public function printReceipt($member, $contractId)
    {

        $gym = $this->getGymData();
        $contract = $member->getContracts()[$contractId];
        $packageType = $contract->getPackage()->getName();
        $contractType = $contract->getPackage()->getPeriod()->getPeriod() . " " . $contract->getPackage()->getPeriodType();
        $FreezeDays = $contract->getRemainfreezedays();
        $startDate = $contract->getStartDate();
        $endDate = $contract->getEndDate();
        $remainingPeriod = $contract->getRemaningPackagePeriod() . " " . $contract->getPackage()->getPeriodType();
        $fees = $contract->getPaymentFees() . " LE";
        $discount = $contract->getPaymentDiscount() . "%";
        $totalAmount = $contract->getTotalAmount() . " LE";
        $amountPaid = $contract->getAmountPaid() . " LE";
        $amountDue = $contract->getAmountDue() . " LE";
        $dueDate = $contract->getAmountDateDue();
        $paymentMethod = $contract->getPaymentMethod()->getName();
        require_once '../app/models/FPDF/fpdf.php';
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Image('../public/img/' . $gym->getGymImage(), 165, 10, 20);
        $Y = $pdf->GetY();
        $x = $pdf->GetX();
        $pdf->SetXY($x + 145, $Y + 10);
        $pdf->Cell(40, 20, $gym->getGymName(), '', '', 'C');
        $pdf->SetXY($x, $Y + 20);
        $pdf->Cell(80);
        $pdf->SetTitle("Contract Receipt");
        $pdf->Cell(40, 20, 'Contract Receipt ID: ' . $contractId, '', '', 'C');
        $pdf->Ln();
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->Cell(190, 7, 'Contract Details', 1, 2, 'C');
        $pdf->SetFont('helvetica', '', 10);
        $Y = $pdf->GetY();
        $pdf->MultiCell(95, 8, " Package Type : " . $packageType . "\n Contract Type : " . $contractType . "\n Freeze Days : " . $FreezeDays, "LRB", "1");
        $x = $pdf->GetX();
        $pdf->SetXY($x + 95, $Y);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->MultiCell(95, 8, ' Start Date: ' . $startDate . "\n Expiry Date : " . $endDate . "\n Remaining Period : " . $remainingPeriod, "LRB", "1");
        $Y = $pdf->GetY();
        $pdf->SetXY($x, $Y);
        $pdf->Ln();
        $pdf->Cell(190, 7, 'Member Details', 1, 2, 'C');
        $Y = $pdf->GetY();
        $pdf->MultiCell(95, 8, " Member ID : " . $member->getId() . "\n First Name : " . $member->getFirstName(), "LRB", "1");
        $x = $pdf->GetX();
        $pdf->SetXY($x + 95, $Y);
        $pdf->MultiCell(95, 8, ' Mobile Phone : ' . $member->getMobilePhone() . "\n Last Name : " . $member->getLastName(), "LRB", "1");
        $pdf->Ln();
        $pdf->SetFillColor(235, 235, 235);
        $pdf->Cell(189, 7, 'Payment Details', 1, 2, 'C');

        $pdf->Cell(27, 10, 'Fees', 1, 0, 'C', 1);
        $pdf->Cell(27, 10, 'Discount', 1, 0, 'C', 1);
        $pdf->Cell(27, 10, 'Total Amount', 1, 0, 'C', 1);
        $pdf->Cell(27, 10, 'Amount Paid', 1, 0, 'C', 1);
        $pdf->Cell(27, 10, 'Amount Due', 1, 0, 'C', 1);
        $pdf->Cell(27, 10, 'Due Date', 1, 0, 'C', 1);
        $pdf->Cell(27, 10, 'Method', 1, 0, 'C', 1);
        $Y = $pdf->GetY();
        $pdf->SetXY($x, $Y + 10);
        $pdf->Cell(27, 10, $fees, 1, 0, 'C', 0);
        $pdf->Cell(27, 10, $discount, 1, 0, 'C', 0);
        $pdf->Cell(27, 10, $totalAmount, 1, 0, 'C', 0);
        $pdf->Cell(27, 10, $amountPaid, 1, 0, 'C', 0);
        $pdf->Cell(27, 10, $amountDue, 1, 0, 'C', 0);
        $pdf->Cell(27, 10, $dueDate, 1, 0, 'C', 0);
        $pdf->Cell(27, 10, $paymentMethod, 1, 0, 'C', 0);
        $pdf->Ln();
        $Y = $pdf->GetY();
        $pdf->SetXY($x + 84, $Y + 10);
        $Y = $pdf->GetY();
        $pdf->SetFont('helvetica', 'UB', 10);
        $pdf->Cell(27, 10, "Added By", '', 0, 'C', 0);
        $pdf->SetXY($x + 84, $Y + 10);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(27, 10, $contract->getSales(), '', 0, 'C', 0);
        $pdf->Output();
    }
}
