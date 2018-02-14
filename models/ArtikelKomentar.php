<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artikel_komentar".
 *
 * @property int $id
 * @property int $id_artikel
 * @property int $id_user
 * @property string $konten
 * @property string $create_at
 * @property int $create_by
 */
class ArtikelKomentar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel_komentar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artikel', 'id_user', 'konten'], 'required'],
            [['id_artikel', 'id_user', 'create_by'], 'integer'],
            [['create_at'], 'safe'],
            [['konten'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_artikel' => 'Id Artikel',
            'id_user' => 'Id User',
            'konten' => 'Konten',
            'create_at' => 'Create At',
            'create_by' => 'Create By',
        ];
    }
}
