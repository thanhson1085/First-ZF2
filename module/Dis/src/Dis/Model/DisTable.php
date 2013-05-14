<?php
namespace Dis\Model;

use Zend\Db\TableGateway\TableGateway;

class DisTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
    }

    public function getDis($id)
    {
    }

    public function saveDis(Dis $dis)
    {
    }

    public function deleteDis($id)
    {
    }
}
