<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembeli".
 *
 * @property int $id_pembeli
 * @property string $nama_pembeli
 * @property string $jk
 * @property string $no_telp
 * @property string $alamat
 */
class Pembeli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembeli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembeli', 'nama_pembeli', 'jk', 'no_telp', 'alamat'], 'required'],
            [['id_pembeli'], 'integer'],
            [['jk'], 'string'],
            [['nama_pembeli'], 'string', 'max' => 30],
            [['no_telp'], 'string', 'max' => 14],
            [['alamat'], 'string', 'max' => 50],
            [['id_pembeli'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembeli' => 'Id Pembeli',
            'nama_pembeli' => 'Nama Pembeli',
            'jk' => 'Jk',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
        ];
    }
}
