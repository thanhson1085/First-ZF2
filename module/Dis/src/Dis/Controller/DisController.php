<?php
namespace Dis\Controller;

use Zend\Mvc\Controller\AbstractRestfulController; 
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class DisController extends AbstractRestfulController 
{
    public function getList()
    {
        return new JsonModel(array());
    }
 
    public function get($id)
    {
        $aws    = $this->getServiceLocator()->get('aws');
        $client = $aws->get('dynamodb');
        $iterator = $client->getIterator('Query', array(
            'TableName' => 'errors',
            'KeyConditions' => array(
                'id' => array(
                    'AttributeValueList' => array(
                        array('N' => $id)
                    ),
                    'ComparisonOperator' => 'EQ'
                ),
            )
        ));
        return new JsonModel($iterator);
    }
 
    public function create($data)
    {
    }
 
    public function update($id, $data)
    {
    }
 
    public function delete($id)
    {
    }
}
