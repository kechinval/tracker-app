<?php

namespace App\Repository;

use App\Core\Collection;
use App\Repository\Interfaces\StaffRepositoryInterface;
use App\Database\Database;
use App\Models\Staff;

class SqlStaffRepository implements StaffRepositoryInterface{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get(){
        $array = [];
        $sql_result = $this->db->select('staff');

        while ($row = $sql_result->fetch_assoc()) {
            $staff = new Staff();
            $staff->loadData($row);
            $array[] = $staff;
        }

        return Collection::make($array);
    }

    public function getById($id)
    {
        $staff = new Staff();
        $staff->loadData($this->db->select('staff', '*', 'id='.$id)->fetch_assoc());
        return $staff;
    }

    public function save(Staff $staff): void
    {
        $set = array(
          'office_id' => $staff->office_id,
          'username' => $staff->username,
          'email' => $staff->email,
          'password' => md5($staff->password),
          'firstname' => $staff->firstname,
          'middlename' => $staff->middlename,
          'lastname' => $staff->lastname
        );
        $this->db->insert('staff', $set);
    }

    public function update(Staff $staff): void
    {
        //TODO update
        $set = 'office_id=' . $staff->office_id .
               ', username="' . $staff->username .
               '", email="' . $staff->email .
               '", password=" ' . md5($staff->password) .
               '", firstname="' . $staff->firstname .
               '", middlename="' . $staff->middlename .
               '", lastname="' . $staff->lastname . '"';
        $this->db->update('staff', $set, 'id='.$staff->id);
    }

    public function delete($id): void
    {
        $this->db->delete('staff', 'id='.$id);
    }
}