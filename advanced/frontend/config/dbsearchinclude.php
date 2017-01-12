<? 
	return yii\helpers\ArrayHelper::merge(
		require('app\models\Apartment'),
		require('app\models\RegionKharkivAdmin'),
		require('app\models\TypeObject'),
		require('app\models\Locality'),
		require('app\models\Layout'),
		require('app\models\RegionKharkiv'),
		require('app\models\Region'),
		require('app\models\Street'),
		require('app\models\Course'),
		require('app\models\WallMaterial'),
		require('app\models\Condit'),
		require('app\models\Wc'),
		require('app\models\Users'),
		require('app\models\Metro'),
		require('app\models\Mediator'),
		)	
	

	
?>