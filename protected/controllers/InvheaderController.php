<?php

class InvheaderController extends Controller
{
	public function actionIndex()
	{

		$model = Invheader::model();

		$inv = $model->findAll();

		$client = CJSON::encode($inv); 

		$this->render('index', array('clientes' => $client));
	}



	public function actionUpdate()
	{		
		$data = $_POST['data'];
		if(Yii::app()->request->isPostRequest){

			// $model = $this->loadModel($data[0]);

			// $model->attributes= $data;

			$model = Invheader::model()->findByPk($data[0]);
			$model->tax=$val[4];
			$model->update();
			// if($model->save())
				echo "Actualizado";


   		 // echo json_encode($_POST['data']);

 		} else {
  			  echo 'you are not allowed';
 		}
		
		
		
		// $campo = Invheader::model()->find($data[0]);

		// $actualizar = Invheader::model()->updateByPk(model)

		// $campo->invdate = $data[1];
		// $campo->client_id=$val[2];
  //   	$campo->amount=$val[3];
  //   	$campo->tax=$val[4];
  //   	$campo->total=$val[5];
  //   	$campo->note=$val[6];

  //   	$campo->save();

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