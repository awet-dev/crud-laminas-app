<?php
namespace Blog;

use Blog\Model\PostRepository;
use Blog\Model\PostRepositoryInterface;
use Laminas\Router\Http\Literal;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'blog' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/blog',
                    'defaults' => [
                        'controller' => Controller\ListController::class,
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ],

    'service_manager' => [
      'aliases' => [
          Model\PostRepositoryInterface::class => Model\LaminasDbSqlRepository::class
      ],
        'factories' => [
            Model\PostRepository::class => InvokableFactory::class,
            Model\LaminasDbSqlRepository::class => Factory\LaminasDbSqlRepositoryFactory::class
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\ListController::class => Factory\ListControllerFactory::class,
        ]
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__.'/../view'
        ]
    ]
];