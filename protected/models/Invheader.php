<?php

/**
 * This is the model class for table "invheader".
 *
 * The followings are the available columns in table 'invheader':
 * @property integer $id
 * @property string $invdate
 * @property integer $client_id
 * @property string $amount
 * @property string $tax
 * @property string $total
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 */
class Invheader extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invheader';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invdate, client_id', 'required'),
			array('client_id', 'numerical', 'integerOnly'=>true),
			array('amount, tax, total', 'length', 'max'=>10),
			array('note', 'length', 'max'=>100),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, invdate, client_id, amount, tax, total, note, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'invdate' => 'Invdate',
			'client_id' => 'Client',
			'amount' => 'Amount',
			'tax' => 'Tax',
			'total' => 'Total',
			'note' => 'Note',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('invdate',$this->invdate,true);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Invheader the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
