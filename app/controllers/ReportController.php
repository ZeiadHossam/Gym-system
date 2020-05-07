<?php


class ReportController extends Controller
{
    public function Contract()
    {
        $this->viewHome("contractreports");
    }

    public function Sales(){
        $this->viewHome("salesreports");
    }
    public function salesReport(){
        if(!isset($_SESSION))
        {
            session_start();
        }
        $gym=$this->getGymData();
        require_once '../app/models/FPDF/fpdf.php';
        $system=$this->model("System");
        $employeeId=isset($_POST['empId']) ? $_POST['empId'] : NULL;
        $firstName=isset($_POST['fName']) ? $_POST['fName'] : NULL;
        $lastName=isset($_POST['lName']) ? $_POST['lName'] : NULL;
        $pdf=new FPDF();
        $header = array('Employee Id', 'First Name', 'Last Name', 'Mobile Phone','Total Contracts','Total Amount','Total Paid','Total Remaining','Last Contract');
        $data = $system->getSalesReport($employeeId,$firstName,$lastName);
        $pdf->SetFont('Arial','',10);
        $pdf->AddPage();
        $pdf->Image('../public/img/'.$gym->getGymImage(),165,10,20);
        $Y=$pdf->GetY();
        $x=$pdf->GetX();
        $pdf->SetXY($x+145,$Y+10);
        $pdf->Cell(40,20,$gym->getGymName(),'','','C');

        $pdf->SetXY($x,$Y+30);

        $pdf->SetFont('Arial','',7);
        $pdf->FancyTable($header,$data);
        $pdf->Output();

    }
    public function contractsReport()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $gym=$this->getGymData();
        require_once '../app/models/FPDF/fpdf.php';
        $system=$this->model("System");
        $contractId=isset($_POST['contractId']) ? $_POST['contractId'] : NULL;
        $memberId=isset($_POST['memberId']) ? $_POST['memberId'] : NULL;
        $firstName=isset($_POST['fName']) ? $_POST['fName'] : NULL;
        $lastName=isset($_POST['lName']) ? $_POST['lName'] : NULL;
        $packageType=isset($_POST['PackageType']) ? $_POST['PackageType'] : NULL;
        $contractType=isset($_POST['contracttype']) ? $_POST['contracttype'] : NULL;
        $memExpiresFrom=isset($_POST['expiresFrom']) ? $_POST['expiresFrom'] : NULL;
        $memExpiresTo=isset($_POST['expiresTo']) ? $_POST['expiresTo'] : NULL;
        $AddedFrom=isset($_POST['addedFrom']) ? $_POST['addedFrom'] : NULL;
        $AddedTo=isset($_POST['addedTo']) ? $_POST['addedTo'] : NULL;
        $pdf=new FPDF();
        $header = array('Member Id', 'First Name', 'Last Name', 'Mobile Phone','Date Of Birth','Contract Id','Package Type','Contract Type','Starts','Expires','Remaining','Status');
        $data = $system->getContractsReport($contractId,$memberId,$firstName,$lastName,$packageType,$contractType,$memExpiresFrom,$memExpiresTo,$AddedFrom,$AddedTo);
        $pdf->SetFont('Arial','',10);
        $pdf->AddPage();
        $pdf->Image('../public/img/'.$gym->getGymImage(),165,10,20);
        $Y=$pdf->GetY();
        $x=$pdf->GetX();
        $pdf->SetXY($x+145,$Y+10);
        $pdf->Cell(40,20,$gym->getGymName(),'','','C');
        $pdf->SetFont('Arial','',6);
        $pdf->SetXY($x,$Y+30);
        $pdf->FancyTable($header,$data);
        $pdf->Output();
    }

}