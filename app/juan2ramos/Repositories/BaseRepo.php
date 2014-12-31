<?php namespace juan2ramos\Repositories;


abstract class BaseRepo {

    protected $model;

    public function __construct(){
        $this->model = $this->getModel();
    }
    public function find($id){
        return $this->model->find($id);
    }

    abstract protected function getModel();
}