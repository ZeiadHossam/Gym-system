<?php


class ReceptionController extends Controller
{
    public function showReception()
    {
        $this->viewHome("reception");
    }
    public function signIn($branchId, $memberId, $contractId)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }        $gym = $this->getGymData();

        if ($gym->getBranchs()[$branchId]->getMembers()[$memberId]->signIn($contractId))
        {
            if ($gym->getBranchs()[$branchId]->getMembers()[$memberId]->getContracts()[$contractId]->getPackage()->getPeriodType()=="Sessions")
            {
                $gym->getBranchs()[$branchId]->getMembers()[$memberId]->getContracts()[$contractId]->setRemaningPackagePeriod($gym->getBranchs()[$branchId]->getMembers()[$memberId]->getContracts()[$contractId]->getRemaningPackagePeriod()-1);
                $gym->getBranchs()[$branchId]->getMembers()[$memberId]->getContracts()[$contractId]->updateSessions();
            }
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Signed In Successfully";
            $this->redirect("reception/showReception");

        } else {
            $_SESSION['errormessege'] = "There was a problem while Signing";
            $this->previousPage();
        }
    }
    public function checkSignIn($branchId, $memberId, $contractId)
    {
        session_start();
        $gym = $this->getGymData();
        $member = $gym->getBranchs()[$branchId]->getMembers()[$memberId];
        $attendances = $member->getAttendance()[$contractId];
        $todaydate = date("Y/m/d");
        $isSignedIn = false;

        foreach ($attendances as $attendance) {
            $attendDate=strtotime($attendance);
            $date= date('Y/m/d', $attendDate);
            if ($todaydate == $date) {
                $isSignedIn = true;
            }
        }
        if (!$isSignedIn)
        {
            $this->signIn($branchId, $memberId, $contractId);
        }
        else
        {
            $_SESSION['messege'] = "Already Signed In Today";
            $this->previousPage();
        }
    }
}