<?php namespace juan2ramos\Entities;


class Permission extends \Eloquent{
    public function permissionRole()
    {
        return $this->hasMany('juan2ramos\Entities\PermissionsRole');
    }
    public function roles()
    {
        return $this->belongsTo('juan2ramos\Entities\Role');
    }
}

