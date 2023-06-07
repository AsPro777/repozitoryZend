<?php
namespace User\Model;
 
class User
{
    public $id;
    public $population;
    public $title;
 
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->population = (isset($data['population'])) ? $data['population'] : null;
        $this->title  = (isset($data['title'])) ? $data['title'] : null;
    }
}