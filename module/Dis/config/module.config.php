<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Dis\Controller\Dis' => 'Dis\Controller\DisController',
        ),
    ),
    'router' => array(
        'routes' => array(
          'dis' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/dis',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Dis\Controller',
						'controller'	=> 'Dis',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/:function[/:id][/]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
								'controller'	=> 'Dis',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'dis' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
