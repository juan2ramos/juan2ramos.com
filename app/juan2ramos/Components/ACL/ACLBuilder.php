<?php namespace juan2ramos\Components\ACL;

use juan2ramos\Entities\Role;
use juan2ramos\Entities\User;

class ACLBuilder
{
    private $idRole;
    private $idUser;
    private $permissionName;
    private $permissions;

    public function getPermissions($idUser = false){

        $this->idUser = ($idUser) ? $idUser : (\Auth::check() ? \Auth::user()->id : false);
        $this->idRole = User::find($this->idUser)->roles_id;
        return ['permissionsRole' => $this->permissionsRole(),
            'permissionsUser' => $this->permissionsUser(),
            'permissionsMerge' => array_merge(
                $this->permissionsRole(), $this->permissionsUser()
            )
        ];
    }
    public function permissions($permissionName,$idUser = false)
    {
        $this->permissionName = $permissionName;
        $this->idUser = ($idUser) ? $idUser : (\Auth::check() ? \Auth::user()->id : false);
        $this->idRole = User::find($this->idUser)->roles_id;
        return $this->compileACL();

    }

    private function compileACL(){
        if( ! $this->idRole ){ return false; }
        $this->permissions = array_merge(
            $this->permissionsRole(), $this->permissionsUser()
        );
        return $this->checkPermission();
    }

    private function checkPermission(){
        return (array_key_exists( $this->permissionName, $this->permissions))
            ?($this->permissions[$this->permissionName]['available'])?true:false
            :false;

    }
    private function permissionsRole()
    {
        $data = array();
        $permissions = Role::join('permissions_roles', 'roles.id', '=', 'permissions_roles.rol_id')
            ->join('permissions', 'permissions_roles.permission_id', '=', 'permissions.id')
            ->whereRaw('roles.id = ? AND permissions_roles.available = ?', [$this->idRole, 1])
            ->get();

        foreach($permissions as $permission){
            $key = $permission->name;
            $data[$key] = array(
                'permissionName' => $key,
                'available' => $permission->available,
                'inherit' => false,
            );
        }
        return $data;

    }
    private function permissionsUser(){
        $data = array();
        $permissions = User::join('permissions_users', 'users.id', '=', 'permissions_users.user_id')
            ->join('permissions', 'permissions_users.permission_id', '=', 'permissions.id')
            ->whereRaw('users.id = ? ', [$this->idUser])
            ->get();

        foreach($permissions as $permission){
            $key = $permission->name;
            $data[$key] = array(
                'permissionName' => $key,
                'available' => $permission->available,
                'inherit' => true,
            );
        }
        return  $data;
    }
}
