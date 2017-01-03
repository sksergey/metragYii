<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
	public $id;
	public $name;
	public $author_id;
	public $update_author_id;
	public $update_photo_user_id;
	public $exclusive_user_id;
}

?>