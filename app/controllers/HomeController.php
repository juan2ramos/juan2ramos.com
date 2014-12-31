<?php

use juan2ramos\Repositories\UserRepo ;
class HomeController extends BaseController
{


    public function index()
    {
        $user =  new UserRepo();
        $juan = $user->find('1');
        return View::make('front/home',compact('juan'));
    }

}
