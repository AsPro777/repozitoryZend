<?php
namespace Application\Model;
 
class Users
{
    public $id;
    public $name;
    public $surname;
    public $age;
 
    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->surname  = (!empty($data['surname'])) ? $data['surname'] : null;
        $this->age  = (!empty($data['age'])) ? $data['age'] : null;
    }
}