<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id_barang
 * @property string $nama_barang
 * @property int $harga
 * @property int $stok
 * @property int $id_supplier
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang', 'nama_barang', 'harga', 'stok', 'id_supplier'], 'required'],
            [['id_barang', 'harga', 'stok', 'id_supplier'], 'integer'],
            [['nama_barang'], 'string', 'max' => 30],
            [['id_barang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'nama_barang' => 'Nama Barang',
            'harga' => 'Harga',
            'stok' => 'Stok',
            'id_supplier' => 'Id Supplier',
        ];
    }

    public function getSupplier()
    {
        // same as above
        return $this->hasOne(Supplier::class, ['id_supplier' => 'id_supplier']);
    }
}
