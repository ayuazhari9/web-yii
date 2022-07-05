<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id_transaksi
 * @property int $id_barang
 * @property int $id_pembeli
 * @property string $tanggal
 * @property string $keterangan
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_barang', 'id_pembeli', 'tanggal', 'keterangan'], 'required'],
            [['id_transaksi', 'id_barang', 'id_pembeli'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string', 'max' => 50],
            [['id_barang'], 'unique'],
            [['id_pembeli'], 'unique'],
            [['id_transaksi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Transaksi',
            'id_barang' => 'Id Barang',
            'id_pembeli' => 'Id Pembeli',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
        ];
    }

    public function getBarang()
    {
        // same as above
        return $this->hasOne(Barang::class, ['id_barang' => 'id_barang']);
    }

    public function getPembeli()
    {
        // same as above
        return $this->hasOne(Pembeli::class, ['id_pembeli' => 'id_pembeli']);
    }
}
