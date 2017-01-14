<?
	use yii\helpers\Url;
	use yii\helpers\Html;

	use yii\data\ActiveDataProvider;
	use yii\grid\GridView;

	use app\models\RegionKharkivAdmin;
	use app\models\TypeObject;
?>

<?
	echo GridView::widget([
	    'dataProvider' => $dataProvider,
	    'columns' => [
	        ['class' => 'yii\grid\SerialColumn'],
	        [
	        	'class' => 'yii\grid\ActionColumn',
	        	'controller' => 'apartment'
	        	/*'attribute' => 'Action',
	        	'value' => function($dataProvider){
	        		//return Url::to(['agency/apartmentedit', 'id' => $dataProvider->id]);
	        		return Html::a('Редактировать', ['agency/apartmentedit', 'id' => $dataProvider->id], ['class' => 'profile-link']);
	        	}*/
	        ],
	        'id',
	       	[
	        	'attribute' => 'type_object_id',
	        	'value' =>  function ($dataProvider) {
	        		return TypeObject::findOne($dataProvider->type_object_id)->name;
	        	}
	        ],
	        [
	        	'attribute' => 'region_kharkiv_admin_id',
	        	'value' =>  function ($dataProvider) {
	        		return RegionKharkivAdmin::findOne($dataProvider->region_kharkiv_admin_id)->name;
                }
	        ],
	        'count_room',
	        'layout_id',
	        'floor',
	        'corps',
	        'number_apartment',
	        'note',
	        'notesite',
	        'phone',
	        'price',
	        'update_author_id',
	        'enabled'
	    ],
	]);
?>



