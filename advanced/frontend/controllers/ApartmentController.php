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
use app\models\RegionKharkiv;
use app\models\Region;
use app\models\Street;
use app\models\Course;
use app\models\WallMaterial;
use app\models\Condit;
use app\models\Wc;
use app\models\Users;

use yii\data\ActiveDataProvider;
use yii\grid\GridView;

use yii\web\UrlManager;
use yii\helpers\Url;
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
		$data['id'] = $id;
		return $this->render('update', ['data' => $data]);
	}
		
	public function actionDelete($id = '0')
	{
		$data['id'] = $id;
		return $this->render('delete', ['data' => $data]);
	}

}