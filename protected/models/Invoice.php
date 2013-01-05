<?php

/**
 * This is the model class for table "invoices".
 *
 * The followings are the available columns in table 'invoices':
 * @property integer $id
 * @property integer $company_id
 * @property integer $invoice_id
 * @property integer $client_id
 * @property string $invoice_date
 * @property string $status
 * @property string $data
 *
 * The followings are the available model relations:
 * @property Companies $company
 * @property Clients $client
 */
class Invoice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Invoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invoices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, invoice_id, client_id, invoice_date, status, data', 'required'),
			array('company_id, invoice_id, client_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, invoice_id, client_id, invoice_date, status, data', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Companies', 'company_id'),
			'client' => array(self::BELONGS_TO, 'Clients', 'client_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_id' => 'Company',
			'invoice_id' => 'Invoice',
			'client_id' => 'Client',
			'invoice_date' => 'Invoice Date',
			'status' => 'Status',
			'data' => 'Data',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id);
		//$criteria->compare('company_id',$this->company_id);
		//$criteria->compare('company_id',Yii::app()->user->company);
		$criteria->compare('company_id',Yii::app()->user->company);
		$criteria->compare('invoice_id',$this->invoice_id);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('data',$this->data,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}