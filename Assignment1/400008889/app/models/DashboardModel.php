<?php

spl_autoload_register();

class DashboardModel extends Model {
    public function __construct()
    {
        $this->connect();
    }

    public function fetchPermissions($email) 
    {
        $stmt = $this->db->prepare("SELECT AccessLevel FROM user_access_levels WHERE email=?");
        $stmt->execute([$email]);
        $accessLevel = $stmt->fetchColumn();
        return $accessLevel;
    }
}