<?php

class ClientController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','labels','genLabels','emailList','genEmailList','alphaList'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','weatchley','pkalweys','veronica','pauline'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$test="this is a test";
        $this->render('view',array(
			'model'=>$this->loadModel($id)
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Client;
        $model->company_id = Yii::app()->user->company;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('company_id',Yii::app()->user->company);
        $criteria->order = "last_name, first_name";
        $sort = new CSort;
        $sort->modelClass='Client';
        $sort->attributes = array('last_name', 'first_name',);
		$dataProvider=new CActiveDataProvider('Client', array('criteria'=>$criteria,'sort'=>$sort,));
		//$dataProvider=new CActiveDataProvider('Client');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionAlphaList()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('company_id',Yii::app()->user->company);
        $criteria->order = "last_name, first_name";
        $sort = new CSort;
        $sort->modelClass='Client';
        $sort->attributes = array('last_name', 'first_name',);
		$dataProvider=new CActiveDataProvider('Client', array('criteria'=>$criteria,'sort'=>$sort,'pagination'=>array('pageSize'=>100000,),));
		//$dataProvider=new CActiveDataProvider('Client');
		$this->render('alphaList',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * labels
	 */
	public function actionLabels()
	{
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('labels',array(
			'model'=>$model,
		));
	}

	/**
	 * gen labels 
	 */
	public function actionGenLabels()
	{

		$this->renderPartial('genLabels',array(
			'model'=>Client::model()->getLabelData($_POST['activeselect'],$_POST['cityselect'],$_POST['stateselect'],Yii::app()->user->company),
		));
	}

	/**
	 * email list
	 */
	public function actionEmailList()
	{
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('emailList',array(
			'model'=>$model,
		));
	}

	/**
	 * gen email list 
	 */
	public function actionGenEmailList()
	{

		$this->render('genEmailList',array(
			'model'=>Client::model()->getLabelData($_POST['activeselect'],$_POST['cityselect'],$_POST['stateselect'],Yii::app()->user->company),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Client::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
