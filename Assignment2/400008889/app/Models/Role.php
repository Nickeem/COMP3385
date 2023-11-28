<?php
namespace App\Models;

include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class Role extends \Abstracts\Model 
{
    public function __construct()
    {
        parent::__construct('user_access_levels');
    }
    
    // Methods for managing user roles and permissions
    public function assignRole($email, $role)
    {
        $this->fields('email, AccessLevel')->values([$email, $role])->create();
    }

    public function removeRole($email, $role) {
        $this->where('email', '=', $email)->where('AccessLevel', '=', $role)->remove();
    }

    private function getUserRoles($email) {
        $roles = [];
        $results = $this->select('AccessLevel')->where('email', '=', $email)->get();
        for ($i = 0; $i < count($results); $i++) 
        {
            $roles[] = $results[$i]['AccessLevel'];
        }
        return $roles;
    }

    public function hasPermission($email, $permission) : bool
    {
        return (array_search($permission, $this->getUserRoles($email) ) == false) ;
    }
    
}