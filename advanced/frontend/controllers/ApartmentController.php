<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use yii\data\Pagination;

use app\models\ApartmentSearchForm;

use app\models\Apartment;
use app\models\RegionKharkivAdmin;
use app\models\TypeObject;
use app\models\Locality;
use app\models\Layout;
use app\models\RegionKharkiv;
use app\models\Region;
use app\models\Street;
use app\models\Course;
use app\models\WallMaterial;
use app\models\Condit;
use app\models\Wc;
use app\models\Users;
use app\models\Metro;
use app\models\Mediator;
use app\models\SourceInfo;

use yii\data\ActiveDataProvider;
use yii\grid\GridView;

use yii\web\UrlManager;
use yii\helpers\Url;


use yii\web\UploadedFile;

//use yii\config\dbsearchinclude;
/**
 * Site controller
 */
class ApartmentController extends Controller
{
	public function actionView($id = '0')
	{
		$data['id'] = $id;
		$model = Apartment::findOne($id);
		return $this->render('view', ['data' => $data, 'model' => $model]);
	}
	
	public function actionUpdate($id = '0')
	{
		$model = [];
		if($id != '0')
        	$model['Apartment'] = Apartment::findOne($id);
        else
        	$model['Apartment'] = new Apartment();

        $model['RegionKharkivAdmin'] = new RegionKharkivAdmin();
        
		return $this->render('update', ['model' => $model]);
	}
		
	public function actionDelete($id = '0')
	{
		$data['id'] = $id;
		if(Apartment::findOne($data['id'])->delete())
			return $this->render('delete', ['data' => $data]);
	}

	public function actionAdd()
	{
		$values = Yii::$app->request->post('Apartment');
		if($values['id'] !='')
		{
			$model = Apartment::findOne($values['id']);
		}
		else
		{
			$model = new Apartment();
		}
		
/*
		if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                $path = Yii::getAlias('@webroot/uploader/files/'.$model->image->baseName.'.'.$model->image->extension);
				$model->attachImage($path);

            }
        }*/
        //var_dump($values);
        //die;

		$model->attributes = $values;
		$model->save();
		//var_dump($model);
		//die;

		


		$data['id'] = $model->id;
		//var_dump($data['id']);
		//die;
		$apart = Apartment::findOne($data['id']);
		return $this->render('view', ['data' => $data, 'model' => $apart]);
	}

}