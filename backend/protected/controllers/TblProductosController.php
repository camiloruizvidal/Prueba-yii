<?php

class TblProductosController extends Controller 
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
			'postOnly + create', 
            'postOnly + update',
            'deleteOnly + delete'
		);
	}

	public function actionView($id)
	{
		$id = (int) $id;
		$data = TblProductos::model()->findByPk($id);
		$response = is_null($data)?null:$data->getData();
        $this->sendResponse($response);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model  			= new TblProductos;
		$model->attributes 	= $_POST;
		$result 			= $model->save();
		$this->sendResponse($model->attributes);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=TblProductos::model()->findByPk($id);
		if(!is_null($model))
		{

			$model->description=$_POST['description'];
			$model->reference=$_POST['reference'];
			$model->stock=$_POST['stock'];
			$model->currency=$_POST['currency'];
			$model->price=$_POST['price'];
			$model->save();
			$this->sendResponse($_POST);
		}
		else{
			$this->sendResponse('No existe registro con el id '.$id,false,405);
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $model = $this->loadModel($id);
        $model->delete();
        $this->sendResponse($id);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new ActiveDataProvider('TblProductos');
        $this->sendResponse($dataProvider->getResponseData());
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblProductos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblProductos']))
			$model->attributes=$_GET['TblProductos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblProductos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblProductos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblProductos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-productos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
