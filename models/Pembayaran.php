<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $id_pembayaran
 * @property string $tgl_bayar
 * @property int $total_bayar
 * @property int $id_transaksi
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembayaran', 'tgl_bayar', 'total_bayar', 'id_transaksi'], 'required'],
            [['id_pembayaran', 'total_bayar', 'id_transaksi'], 'integer'],
            [['tgl_bayar'], 'safe'],
            [['id_transaksi'], 'unique'],
            [['id_pembayaran'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran' => 'Id Pembayaran',
            'tgl_bayar' => 'Tgl Bayar',
            'total_bayar' => 'Total Bayar',
            'id_transaksi' => 'Id Transaksi',
        ];
    }
    public function getTransaksi()
    {
        // same as above
        return $this->hasOne(Transaksi::class, ['id_transaksi' => 'id_transaksi']);
    }
}
