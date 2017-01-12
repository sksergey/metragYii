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
use app\models\Layout;

use yii\data\ActiveDataProvider;
use yii\grid\GridView;

use yii\web\UrlManager;
use yii\helpers\Url;
/**
 * Site controller
 */
class AgencyController extends Controller
{
	/*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

	public function actionSearch()
    {
        $model = [];

        $model['Apartment'] = new Apartment();
        $model['RegionKharkivAdmin'] = new RegionKharkivAdmin();
        $model['TypeObject'] = new TypeObject();
        $model['Locality'] = new Locality();
        $model['Layout'] = new Layout();
        $model['RegionKharkiv'] = new RegionKharkiv();
        $model['Region'] = new Region();
        $model['Street'] = new Street();
        $model['Course'] = new Course();
        $model['WallMaterial'] = new WallMaterial();
        $model['Condit'] = new Condit();
        $model['Wc'] = new Wc();
        $model['Users'] = new Users();

        if (Yii::$app->request->post()) {

            //$url = Url::toRoute('/agency/testview');
            //return $this->redirect($url);

            //$post = Yii::$app->request->post();
            
            //print_r($post);
            /*
            $dataProvider = $this->getSearchResult($post);



            return $this->render('search-result',
            ['post' => $post, 'dataProvider' => $dataProvider]);
            */
            //return $this->render('apartments', ['post' => $post]);
        } else {
            // страница отображается первый раз
            return $this->render('apartments-search', ['model' => $model]);
        }
        
    }

    public function actionIndex()
    {
        
        $query = Apartment::find();

        $pagination = new Pagination([
            'defaultPageSize' => 500,
            'totalCount' => $query->count(),
        ]);

        $apartments = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'apartments' => $apartments,
            'pagination' => $pagination,
        ]);
    }

    public function actionTestview()
    {
        $query = Apartment::find();
        $apartment = $query->where(['id' => '24'])->one();
        return $this->render('apartmentshow',['apartment'=>$apartment]);
    }

    public function actionSearchresult()
    {
        $get = Yii::$app->request->get();

        $query = Apartment::find();

        if(!empty($get['Apartment']['from_id']))
        $query->andwhere(['between', 'id', $get['Apartment']['from_id'], $get['Apartment']['to_id']]);
              
        if(!empty($get['TypeObject']['type_object_id']))
        $query->andwhere(['type_object_id' => $get['TypeObject']['type_object_id']]);
        if(!empty($get['RegionKharkivAdmin']['region_kharkiv_admin_id']))
        $query->andwhere(['region_kharkiv_admin_id' => $get['RegionKharkivAdmin']['region_kharkiv_admin_id']]);
        if(!empty($get['RegionKharkiv']['region_kharkiv_id']))
        $query->andwhere(['region_kharkiv_id' => $get['RegionKharkiv']['region_kharkiv_id']]);
        if(!empty($get['Region']['region_id']))
        $query->andwhere(['region_id' => $get['Region']['region_id']]);
        if(!empty($get['Locality']['locality_id']))
        $query->andwhere(['locality_id' => $get['Locality']['locality_id']]);
        if(!empty($get['Course']['course_id']))
        $query->andwhere(['course_id' => $get['Course']['course_id']]);
        if(!empty($get['Street']['street_id']))
        $query->andwhere(['street_id' => $get['Street']['street_id']]);
        if(!empty($get['WallMaterial']['wall_material_id']))
        $query->andwhere(['wall_material_id' => $get['WallMaterial']['wall_material_id']]);
        if(!empty($get['Condit']['condit_id']))
        $query->andwhere(['condit_id' => $get['Condit']['condit_id']]);
        if(!empty($get['Wc']['wc_id']))
        $query->andwhere(['wc_id' => $get['Wc']['wc_id']]);
        if(!empty($get['Users']['update_author_id']))
        $query->andwhere(['update_author_id' => $get['Users']['update_author_id']]);
        if(!empty($get['Users']['author_id']))
        $query->andwhere(['author_id' => $get['Users']['author_id']]);
        if(!empty($get['Users']['update_photo_user_id']))
        $query->andwhere(['update_photo_user_id' => $get['Users']['update_photo_user_id']]);
        if(!empty($get['Users']['exclusive_user_id']))
        $query->andwhere(['exclusive_user_id' => $get['Users']['exclusive_user_id']]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        //return $dataProvider;
        return $this->render('search-result', ['dataProvider' => $dataProvider]);
    }

    
}