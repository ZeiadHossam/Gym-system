<?php


class Users
{
    public $id;
    public $name;
    public $branchName;
    public $userType;
    public static function get_user_data($id)
    {
        $user=new Users();
        $user->id=$id;
        $user->name="Tarek";
        $user->branchName="Branch_Name";
        $user->userType="Admin";
        return $user;
    }
}