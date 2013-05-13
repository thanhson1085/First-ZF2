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
		return $iterator;
    }

    public function saveDis(Dis $dis)
    {
    }

    public function deleteDis($id)
    {
    }
}
