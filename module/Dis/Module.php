<?php
namespace Dis;

use Dis\Model\Dis;
use Dis\Model\DisTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Dis\Model\DisTable' =>  function($sm) {
                    $tableGateway = $sm->get('DisTableGateway');
                    $table = new DisTable($tableGateway);
                    return $table;
                },
                'DisTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Dis());
                    return new TableGateway('errors', $dbAdapter, null, $resultSetPrototype);
                },
            ),
			'services' => array('aws'),
        );
    }
}
