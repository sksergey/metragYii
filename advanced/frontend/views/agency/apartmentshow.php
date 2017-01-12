<?
	use yii\data\ActiveDataProvider;
	use yii\grid\GridView;
	use yii\widgets\ListView;
	use yii\widgets\DetailView;

	use app\models\Apartment;
?>

<?
/*
	$model = new Apartment();
	echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id' => ['class' => 'bg-red'],
        'note:html',
        [                                                  // name свойство зависимой модели owner
            'label' => 'Owner',
            'value' => $model->owner->name,            
            'contentOptions' => ['class' => 'bg-red'],     // настройка HTML атрибутов для тега, соответсвующего value
            'captionOptions' => ['tooltip' => 'Tooltip'],  // настройка HTML атрибутов для тега, соответсвующего label
        ],                                // description свойство, как HTML
        'street_id'                             // дата создания в формате datetime
    ],
]);
*/

$dataProvider = new ActiveDataProvider([
    'query' => Apartment::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Обычные поля определенные данными содержащимися в $dataProvider.
        // Будут использованы данные из полей модели.
        'id',
        'type_object_id',
        'count_room',
        'layout_id',
        'floor',
        'note',
        'phone',
        'price',
        'author'
        
    ],
]);



/*
$dataProvider = new ActiveDataProvider([
    'query' => Apartment::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_post',
]);
*/
?>