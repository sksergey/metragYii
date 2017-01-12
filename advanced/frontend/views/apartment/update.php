<style>
	div.required label.control-label:after {
    content: " *";
    color: red;
	}
	label.required:after {
	    content: " *";
	    color: red;
	}
	.divider-horizontal
	{
		height: 1px;
		margin: 20px 0px 20px 0px;
		background-color: #9d9d9d;
	}
</style>

<?php
//use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

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
use app\models\Mediator;
use app\models\Metro;
use app\models\SourceInfo;


?>
<?= $model['Apartment']->id; ?>
<?= 'apartment edit'; ?>

<?= $apartment->id; ?>
<?php $form = ActiveForm::begin([
          'method' => 'post',
          'action' => ['apartment/add'],
          //'options' => ['class' => 'form-inline'],
          'options' => ['enctype' => 'multipart/form-data'],
      ]); ?>


	<div class="col-xs-12 col-sm-3 col-md-3 ">
		<?= $form->field($model['Apartment'],'id')->textInput(['readonly' => 'true'])->label('ID'); ?>
		<?= $form->field($model['Apartment'], 'type_object_id')->dropdownList(
    		TypeObject::find()->select(['name', 'type_object_id'])->where(['type_realty_id'=>'2'])->indexBy('type_object_id')->column())->label('Тип объекта',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'count_room')->textInput()->label('Кол. комнат',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'layout_id')->dropdownList(
    		Layout::find()->select(['name', 'layout_id'])->orderby('name')->indexBy('layout_id')->column(),['prompt'=>'Выберите тип...'])->label('Тип планировки'); ?>
    	<?= $form->field($model['Apartment'],'floor')->textInput()->label('Этаж',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'floor_all')->textInput()->label('Этажность',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'city_or_region',['inline' => true])->radiolist(['1' => 'Харьков', '0' => 'Пригород'])->label(false); ?>
		<?= $form->field($model['Apartment'], 'region_kharkiv_admin_id')->dropdownList(RegionKharkivAdmin::find()->select(['name', 'region_kharkiv_admin_id'])->orderby('name')->indexBy('region_kharkiv_admin_id')->column(),['prompt'=>'Выберите район...'])->label('РайонАдмин/Харьков',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'locality_id')->dropdownList(
			Locality::find()->select(['name', 'locality_id'])->orderby('name')->indexBy('locality_id')->column(),['prompt'=>'Выберите населенный пункт...'])->label('Населенный пункт',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'course_id')->dropdownList(
    		Course::find()->select(['name', 'course_id'])->orderby('name')->indexBy('course_id')->column(),['prompt'=>'Выберите направление...'])->label('Направление',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'region_kharkiv_id')->dropdownList(
    		RegionKharkiv::find()->select(['name', 'region_kharkiv_id'])->orderby('name')->indexBy('region_kharkiv_id')->column(),['prompt'=>'Выберите район...'])->label('Район/Харьков',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'region_id')->dropdownList(Region::find()->select(['name', 'region_id'])->orderby('name')->indexBy('region_id')->column(),['prompt'=>'Выберите район...'])->label('Район/Область',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'street_id')->dropdownList(
    		Street::find()->select(['name', 'street_id'])->orderby('name')->indexBy('street_id')->column(),['prompt'=>'Выберите улицу...'])->label('Улица',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'number_building')->textInput()->label('Номер дома',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'corps')->textInput()->label('Корпус',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'number_apartment')->textInput()->label('Номер квартиры',['class'=>'required']); ?>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-3 ">
		<?= $form->field($model['Apartment'],'price')->textInput()->label('Цена',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'exclusive_user_id')->dropdownList(
    		Users::find()->select(['name', 'id'])->orderby('name')->indexBy('id')->column(),['prompt'=>'Выберите пользователя...'])->label('Экслюзив'); ?>
    	<?= $form->field($model['Apartment'], 'mediator_id')->dropdownList(
    		Mediator::find()->select(['name', 'mediator_id'])->orderby('name')->indexBy('mediator_id')->column(),['prompt'=>'Выберите посредника...'])->label('Посредник'); ?>
		<?= $form->field($model['Apartment'], 'metro_id')->dropdownList(
    		Metro::find()->select(['name', 'metro_id'])->orderby('name')->indexBy('metro_id')->column(),['prompt'=>'Выберите станцию метро...'])->label('Метро'); ?>
		<?= $form->field($model['Apartment'],'landmark')->textInput()->label('Ориентир'); ?>
		<?= $form->field($model['Apartment'],'comment')->textInput()->label('Причина удаления/восстановления'); ?>
		<?= $form->field($model['Apartment'],'exchange')->checkbox()->label('Обмен'); ?>
		<?= $form->field($model['Apartment'],'exchange_formula')->textInput()->label('Формула обмена'); ?>
		<?= $form->field($model['Apartment'], 'condit_id')->dropdownList(
    		Condit::find()->select(['name', 'condit_id'])->orderby('name')->indexBy('condit_id')->column(),['prompt'=>'Выберите состояние...'])->label('Состояние',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'source_info_id')->dropdownList(
    		SourceInfo::find()->select(['name', 'source_info_id'])->orderby('name')->indexBy('source_info_id')->column(),['prompt'=>'Выберите источник...'])->label('Источник информации',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'wc_id')->dropdownList(
    		Wc::find()->select(['name', 'wc_id'])->orderby('name')->indexBy('wc_id')->column(),['prompt'=>'Выберите тип сан.узла...'])->label('Сан. узел',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'wall_material_id')->dropdownList(
    		WallMaterial::find()->select(['name', 'wall_material_id'])->orderby('name')->indexBy('wall_material_id')->column(),['prompt'=>'Выберите материал стен...'])->label('Стены',['class'=>'required']); ?>
    	<?= $form->field($model['Apartment'],'date_added')->textInput(['readonly' => 'true'])->label('Дата добавления'); ?>
		<?= $form->field($model['Apartment'],'date_modified')->textInput(['readonly' => 'true'])->label('Дата изменения'); ?>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-3 ">
		<?= $form->field($model['Apartment'],'total_area')->textInput()->label('Площадь общая',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'floor_area')->textInput()->label('Площадь жилая',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'kitchen_area')->textInput()->label('Площадь кухни',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'phone_line')->checkbox()->label('Телефонная линия'); ?>
		<?= $form->field($model['Apartment'],'bath')->checkbox()->label('Ванна'); ?>
		<?= $form->field($model['Apartment'],'count_balcony')->textInput()->label('Количество балконов',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'],'count_balcony_glazed')->textInput()->label('Застекленных балконов',['class'=>'required']); ?>
		<?= $form->field($model['Apartment'], 'author_id')->textInput(['readonly' => 'true'])->label('Автор'); ?>
    	<?= $form->field($model['Apartment'], 'update_author_id')->textInput(['readonly' => 'true'])->label('Изменил дпи'); ?>
		<?= $form->field($model['Apartment'], 'update_photo_user_id')->textInput(['readonly' => 'true'])->label('Кто обновил фото'); ?>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-3 ">
		<?= $form->field($model['Apartment'], 'note')->textarea(['rows'=>6])->label('Заметки'); ?>
		<?= $form->field($model['Apartment'], 'notesite')->textarea(['rows'=>6])->label('Информация для показа на сайте'); ?>
		<?= $form->field($model['Apartment'], 'phone')->listBox(
			Apartment::getPhonesArr($model['Apartment']->phone))->label('Телефоны',['class'=>'required']); ?>
		<?= Html::button('Добавить', ['class' => 'btn btn-primary']) ?>
		<?= Html::button('Удалить', ['class' => 'btn btn-primary']) ?>
		<?= $form->field($model['Apartment'],'enabled')->checkbox()->label('Активное') ?>

	</div> 

<div class="col-xs-12 col-sm-12 col-md-12 divider-horizontal"></div>	
<div class="col-xs-12 col-sm-12 col-md-12">
	<? //$form->field($model['Apartment'],'image')->fileInput(); ?>
	<?= $form->field($model['Apartment'], 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
</div>	
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>