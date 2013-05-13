<?php
namespace Dis\Controller;

use Zend\Mvc\Controller\AbstractRestfulController; 
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class DisController extends AbstractRestfulController 
{
    protected $disTable;
    public function getList()
    {
        return new JsonModel(array());
    }
 
    public function get($id)
    {
        return new JsonModel($this->getDisTable()->getDis($id));
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
    public function getDisTable()
    {
        if (!$this->disTable){
            $sm = $this->getServiceLocator();
            $this->disTable = $sm->get('Dis\Model\DisTable');
        }
        return $this->disTable;
    }
}
