<?php
namespace Application\Model;
 
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\Db\TableGateway\Feature\MetadataFeature;
use Zend\Db\TableGateway\Feature\FeatureSet;
use Zend\Db\ResultSet\ResultSet;
use Application\Model\UsersTable;

use Zend\Db\TableGateway\Feature\GlobalAdapterFeature as Another;

 
class UsersTable 
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway )
    {
        $this->tableGateway = $tableGateway;
    }

 
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;

    }

    public function joinTab(){

    $select = new Select;
        $select->from(array('u' => 'users')) 
               ->join(array('e' => 'userseducations'),    
                 'u.id = e.id_user')
               ->join(array('c' => 'userscity'),
                 'u.id = c.id_user');

 $ad = new Another;
  $adapter = $ad::getStaticAdapter();

    $statement = $adapter->createStatement();
$select->prepareStatement($adapter, $statement);
$driverResult = $statement->execute();
$resultSet = new ResultSet();
$resultSet->initialize($driverResult); 

return $resultSet;
    }
  
}