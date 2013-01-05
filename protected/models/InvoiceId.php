<?php

/**
 * This is the model class for table "invoice_ids".
 *
 * The followings are the available columns in table 'invoice_ids':
 * @property integer $id
 * @property integer $company_id
 * @property string $invoice_date
 * @property integer $invoice_id
 *
 * The followings are the available model relations:
 * @property Companies $company
 */
class InvoiceId extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InvoiceId the static model class
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
		return 'invoice_ids';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, invoice_date', 'required'),
			array('company_id, invoice_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, invoice_date, invoice_id', 'safe', 'on'=>'search'),
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
			'invoice_date' => 'Invoice Date',
			'invoice_id' => 'Invoice',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('invoice_id',$this->invoice_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getNextInvoiceId($company) {
        $today = date("Y-m-d");
        $current = InvoiceId::model()->findByAttributes(array('invoice_date'=>$today, 'company_id'=>$company));
        if ($current == null) {
            $current = new InvoiceId;
            $current->company_id = $company;
            $current->invoice_date = date("Y-m-d");
            $current->invoice_id = 0;
        }
        $current->invoice_id += 1;
        $invoiceId = date("Ymd") . sprintf("%03d", $current->invoice_id);
        $current->save();
        
        return $invoiceId;
    }
    
}