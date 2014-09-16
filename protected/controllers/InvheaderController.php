<?php

class InvheaderController extends Controller
{
	// public function init() {
 //        parent::init();
 //        $this->initAjaxCsrfToken();
 //    }
 
 //    // this function will work to post csrf token.
 //    protected function initAjaxCsrfToken() {
 
 //        Yii::app()->clientScript->registerScript('AjaxCsrfToken', ' $.ajaxSetup({
 //                         data: {"' . Yii::app()->request->csrfTokenName . '": "' . Yii::app()->request->csrfToken . '"},
 //                         cache:false
 //                    });', CClientScript::POS_HEAD);
 //    }
	
	public function actionIndex()
	{

		$model = Invheader::model();

		$inv = $model->findAll();

		$client = CJSON::encode($inv);

		$this->render('index', array('clientes' => $client));
	}


	// public function beforeAction($action){
	// 	$this->enableCsrfValidation = false;
	// 	return parent::beforeAction($action);
	// }

	public function actionUpdate()
	{
		if(Yii::app()->request->isPostRequest){
			$data = $_POST['data'];
			$campo = Invheader::model()->findByPk($data[0]);
			$campo->amount = $data[3];
			$campo->tax = $data[4];
			$campo->total = $data[5];
			$campo->update();
			echo "El campo se ha actualizado exitosamente";
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}