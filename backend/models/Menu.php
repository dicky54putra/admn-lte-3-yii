<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id_menu
 * @property string $nama
 * @property string $url
 * @property int $parent
 * @property int $no_urut
 * @property string $icon
 * @property int $status
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'url', 'icon'], 'required'],
            [['parent', 'no_urut', 'status'], 'integer'],
            [['nama', 'url', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'nama' => 'Nama',
            'url' => 'Url',
            'parent' => 'Parent',
            'no_urut' => 'No Urut',
            'icon' => 'Icon',
            'status' => 'Status',
        ];
    }
}
