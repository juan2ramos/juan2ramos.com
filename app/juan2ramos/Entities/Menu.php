<?php namespace juan2ramos\Entities;

class Menu extends \Eloquent{
    protected $fillable = array('nameMenu','nameLink','route','permission','parent','orderMenu');
}