<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    protected $usersTable;
    protected $educationsTable;

    public function getUsersTable()
    {
        if (!$this->usersTable) {
            $sm = $this->getServiceLocator();
            $this->usersTable = $sm->get('Application\Model\UsersTable');
        }

        return $this->usersTable;
    }

    public function getEducationsTable()
    {
        if (!$this->educationsTable) {
            $sm = $this->getServiceLocator();
            $this->educationsTable = $sm->get('Application\Model\EducationsTable');
        }

        return $this->educationsTable;
    }

    protected function getViewHelper($helperName)
    {

       return $this->getServiceLocator()->get('viewhelpermanager')->get($helperName);
    }

    public function changeEducationAction()
    {
        $name=$this->params()->fromPost('name'); 
        $value=$this->params()->fromPost('value');
        /*$name="Петр";
        $value="qqqq";*/
        $res=$this->getEducationsTable()->updateUser($name,$value);

        //print_r($res);
        
        $result = array('update is success');
        $response = $this->getResponse();
          $response->getHeaders()->addHeaderLine( 'Content-Type', 'application/json' );
          $response->setContent(json_encode($result , JSON_UNESCAPED_UNICODE));
          return $response;
    }

    public function indexAction()
    {      
        //$fetchUsers= $this->getUsersTable()->fetchAll();
        $fetchUsers= $this->getUsersTable()->joinTab();
        $fetchEducations=$this->getEducationsTable()->fetchAll();

        $users = array();
        $educations = array();

          foreach($fetchUsers as $user){
              $users[] = array(
                  "name"=>$user->name,
                  "education"=>$user->title,
                  "city"=>$user->cityTitle,
              );
          }

          foreach($fetchEducations as $educ){
            $educations[] = array(
                "id_user"=>$educ->id_user,
                "title"=>$educ->title,
            );
        }

          $result = array('dataUsers'=>$users,
    'dataEducations'=>$educations);

          $response = $this->getResponse();
          $response->getHeaders()->addHeaderLine( 'Content-Type', 'application/json' );
          $response->setContent(json_encode($result , JSON_UNESCAPED_UNICODE));

    return $response;
    }
}
