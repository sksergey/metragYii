<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;
use yii\web\UploadedFile;


class Apartment extends ActiveRecord
{
    


    public $from_id;
    public $to_id;
    public $from_count_room;
    public $to_count_room;
    public $from_price;
    public $to_price;
    public $from_floor;
    public $to_floor;
    public $from_floor_all;
    public $to_floor_all;
    public $from_total_area;
    public $to_total_area;
    public $from_floor_area;
    public $to_floor_area;
    public $from_kitchen_area;
    public $to_kitchen_area;

    public $city_or_region = '1';
    public $enabled = '1';
    public $image;
    public $imageFiles;
    //public $phone = '0632766093,0664652008,0967998577';
    //public $phone = ['0632766093','0664652008','0967998577'];

    public function rules()
    {
        return [
            [['type_object_id', 'count_room', 'floor', 'floor_all', 'region_kharkiv_admin_id', 'region_kharkiv_id', 'street_id', 'number_building', 'corps', 'number_apartment', 'price', 'condit_id', 'source_info_id', 'wc_id', 'wall_material_id', 'total_area'], 'required'],
                ['imageFiles', 'file', 'skipOnEmpty' => true,
                 //'extensions' => 'png, jpg', 
                'maxFiles' => 4],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('yii','ID'),
            'type_object_id' => \Yii::t('yii','Type object'),
            'count_room' => \Yii::t('yii','Room count'),
            'layout_id' => \Yii::t('yii','Room count'),
            'floor' => \Yii::t('yii','Floor'),
            'floor_all' => \Yii::t('yii','Floor all'),
            'city_or_region' => \Yii::t('yii','City or Region'),
            'locality_id' => \Yii::t('yii','Locality'),
            'course_id' => \Yii::t('yii','Cource'),
            'region_id' => \Yii::t('yii','Region'),
            'region_kharkiv_id' => \Yii::t('yii','Region Kharkiv'),
            'region_kharkiv_admin_id' => \Yii::t('yii','Region Kharkiv admin'),
            'street_id' => \Yii::t('yii','Street'),
            'number_building' => \Yii::t('yii','Number building'),
            'corps' => \Yii::t('yii','Corps'),
            'number_apartment' => \Yii::t('yii','Number apartment'),
            'exchange' => \Yii::t('yii','Exchange'),
            'exchange_formula' => \Yii::t('yii','Exchange formula'),
            'landmark' => \Yii::t('yii','Landmark'),
            'condit_id' => \Yii::t('yii','Condition'),
            'source_info_id' => \Yii::t('yii','Source info'),
            'price' => \Yii::t('yii','Price'),
            'mediator_id' => \Yii::t('yii','Mediator'),
            'metro_id' => \Yii::t('yii','Metro'),
            'phone' => \Yii::t('yii','Phone'),
            'total_area' => \Yii::t('yii','Total area'),
            'floor_area' => \Yii::t('yii','Floor area'),
            'kitchen_area' => \Yii::t('yii','Kitchen area'),
            'wc_id' => \Yii::t('yii','Wc'),
            'wall_material_id' => \Yii::t('yii','Wall material'),
            'count_balcony' => \Yii::t('yii','Count balcony'),
            'count_balcony_glazed' => \Yii::t('yii','Count balcony glazed'),
            'exclusive_user_id' => \Yii::t('yii','Exclusive user'),
            'phone_line' => \Yii::t('yii','Phoneline'),
            'bath' => \Yii::t('yii','Bath'),
            'comment' => \Yii::t('yii','Comment'),
            'note' => \Yii::t('yii','Note'),
            'notesite' => \Yii::t('yii','Note for site'),
            'date_added' => \Yii::t('yii','Date added'),
            'date_modified' => \Yii::t('yii','Date modified'),
            'date_modified_photo' => \Yii::t('yii','Date modified photo'),
            'author_id' => \Yii::t('yii','Author'),
            'update_author_id' => \Yii::t('yii','Update author'),
            'update_photo_user_id' => \Yii::t('yii','Update photo user'),
            'enabled' => \Yii::t('yii','Enabled'),
            
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

	public function getApartments($param)
	{
		$query = Apartment::find()
							->where(['region_kharkiv_admin_id' => $param['region_kharkiv_admin']]);

        $data['pagination'] = new Pagination([
            'defaultPageSize' => 500,
            'totalCount' => $query->count(),
        ]);

        $data['apartments'] = $query->orderBy('id')
            ->offset($data['pagination']->offset)
            ->limit($data['pagination']->limit)
            ->all();
        
		return $data;
	}

    public function getPhonesArr($phone)
    {
        return $phones = explode(",", $phone);
    }

    public function upload()
    {
        if($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $path = Yii::getAlias('@webroot/upload/files/') . $file->name;
                //echo "path-".$path;
                $file->saveAs($path);
                $this->attachImage($path);
            }
            return true;
        } else {
            return false;
        }
    }


}

?>