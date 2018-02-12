<?php

namespace app\models;

use Yii;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "artikel_kategori".
 *
 * @property integer $id
 * @property string $nama
 */
class ArtikelKategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel_kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(),'id','nama');
    }
}
