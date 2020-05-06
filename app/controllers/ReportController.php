<?php


class ReportController extends Controller
{
    public function Contract()
    {
        $this->viewHome("contractreports");
    }

    public function Sales(){
        $this->viewHome("sales");
    }
    public function showReciept($branchId,$memberId,$contractId){
#require "/GYM/app/models/FPDF/fpdf.php";
        require_once '../app/models/FPDF/fpdf.php';

        $pdf=new FPDF();
        $header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)','id','type','amount','sas','id','type','amount','sas','id','type','amount','sas');
        $data = array(array('egypt','cairo','22','100','1','7lwa','50','55','1','7lwa','50','55','1','7lwa','50','55'));
        $pdf->SetFont('Arial','',7);
        $pdf->AddPage();
        $pdf->FancyTable($header,$data);
        $pdf->Output();

    }

}