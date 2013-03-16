<?php

class MainController extends Controller
{

	public function init()
	{
		$uri = Yii::app()->baseUrl . '/css/homepage.css';
		Yii::app()->clientScript->registerCssFile($uri, 'screen, projection');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.cycle.all.latest.js');
		return parent::init();
	}

	public function actionIndex()
	{
		
		
		

		$this->render('index');
	}

	public function actionError(){
		$this->redirect(array('main/index'));
	}
	


}
