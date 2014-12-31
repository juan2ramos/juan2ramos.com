<?php namespace juan2ramos\Repositories;

use juan2ramos\Entities\User;

class UserRepo extends BaseRepo{


    protected function getModel()
    {
        return new User();
    }
}