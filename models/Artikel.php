<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "artikel".
 *
 * @property integer $id
 * @property integer $id_artikel_kategori
 * @property integer $id_artikel_status
 * @property string $judul
 * @property string $konten
 * @property string $cover
 * @property string $file
 * @property string $create_at
 * @property integer $create_by
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artikel_kategori', 'id_artikel_status', 'judul', 'konten'], 'required'],
            [['id_artikel_kategori', 'id_artikel_status'], 'integer'],
            [['konten'], 'string'],
            [['create_at', 'cover', 'file','slug', 'create_by'], 'safe'],
            [['judul', 'cover', 'file'], 'string', 'max' => 255],
            ['cover', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif']],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'create_by',
                'updatedByAttribute' => null,
                    'value' => function ($event) {
                        return User::getIdUser();
                },
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'judul',
                'immutable' => true,
                'ensureUnique' => true,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_artikel_kategori' => 'Kategori Artikel',
            'id_artikel_status' => 'Status Artikel',
            'judul' => 'Judul',
            'konten' => 'Konten',
            'cover' => 'Cover',
            'file' => 'File',
            'create_at' => 'Create At',
            'create_by' => 'Create By',
        ];
    }

    public function getRelationField($relation,$field)
    {
        if(!empty($this->$relation->$field)){
            return $this->$relation->$field;   
        } else {
            return null;
        }
    }

    public function getArtikelStatus()
    {
        return $this->hasOne(ArtikelStatus::className(),['id' => 'id_artikel_status']);
    }

    public function getArtikelKategori()
    {
        return $this->hasOne(ArtikelKategori::className(),['id' => 'id_artikel_kategori']);
    }

    public function getCover($htmlOptions=[])
    {
        //Jika file ada dalam direktori
        if($this->cover !== null && file_exists('@web/uploads/'.$this->cover)){
            return Html::img('@web/uploads/'. $this->cover,$htmlOptions);
        }
    }

    public function test()
    {
        return "string";
    }
}
