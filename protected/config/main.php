<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
		'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name'=>'Funisher',
		'defaultController' => 'main',

		// preloading 'log' component
		'preload'=>array('log'),

		// autoloading model and component classes
		'import'=>array(
				'application.models.*',
				'application.components.*',
				'application.extensions.yii-mail.*',
				'ext.giix-components.*',
		),
		
		

		'modules'=>array(
				// uncomment the following to enable the Gii tool

			'gii' => array(
					'class' => 'system.gii.GiiModule',
					'password' => 'oink2oink',
					'generatorPaths' => array( 'ext.giix-core' ),
			),

		),

		// application components
		'components'=>array(
				'user'=>array(
						// enable cookie-based authentication
						'allowAutoLogin'=>true,
				),
					
					
					
				'mail' => array(
						'class' => 'application.extensions.yii-mail.YiiMail',
						'transportType' => 'smtp',
						'transportOptions' => array(
								'host' => 'secure28.webhostinghub.com',
								'username' => 'monkey+funisher.com',
								'password' => 'oink2oink',
								'port' => '465',
								'encryption' => 'ssl',
						),
						'viewPath' => 'application.views.user',
						'logging' => true,
						'dryRun' => false
				),
				// uncomment the following to enable URLs in path-format

				'urlManager' => array(
						'urlFormat' => 'path',
						'showScriptName' => false,
						
				),

				'db'=>array(
						'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
				),
				// uncomment the following to use a MySQL database

				'db'=>array(
						'connectionString' => 'mysql:host=localhost;dbname=funisher',
						'emulatePrepare' => true,
						'username' => 'myspid5',
						'password' => 'oink2oink',
						'charset' => 'utf8',
				),

				'errorHandler'=>array(
						// use 'site/error' action to display errors
						'errorAction'=>'main/error',
				),
				'log'=>array(
						'class'=>'CLogRouter',
						'routes'=>array(
								array(
										'class'=>'CFileLogRoute',
										'levels'=>'error, warning',
								),
								// uncomment the following to show log messages on web pages

				//array( 'class'=>'CWebLogRoute',	),

						),
				),
		),

		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params'=>array(
				// this is used in contact page
				'adminEmail'=>'info@funisher.com',
				'admin_id'=>51,
				'articleAuthors' => array(51, 104),
				'forumModerators' => array(51, 104),
		),
);