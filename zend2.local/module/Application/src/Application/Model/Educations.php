<?php
namespace Application\Model;
 
class Educations
{
    public $id_user;
    public $title;
 
    public function exchangeArray($data)
    {
        $this->id_user     = (!empty($data['id_user'])) ? $data['id_user'] : null;
        $this->title = (!empty($data['title'])) ? $data['title'] : null;
    }
}