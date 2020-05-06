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
}