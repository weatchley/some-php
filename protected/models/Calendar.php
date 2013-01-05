<?php

/**
 * This is the model class for table "calendars".
 *
 * The followings are the available columns in table 'calendars':
 * @property integer $id
 * @property integer $company_id
 * @property integer $client_id
 * @property integer $showed_up
 * @property string $event_date
 * @property string $begin
 * @property string $end
 * @property string $notes
 *
 * The followings are the available model relations:
 * @property Companies $company
 * @property Clients $client
 */
class Calendar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Calendar the static model class
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
		return 'calendars';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, event_date, begin, end', 'required'),
			array('company_id, client_id, showed_up', 'numerical', 'integerOnly'=>true),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, client_id, showed_up, event_date, begin, end, notes', 'safe', 'on'=>'search'),
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
			'client_id' => 'Client',
			'showed_up' => 'Showed Up',
			'event_date' => 'Event Date',
			'begin' => 'Begin',
			'end' => 'End',
			'notes' => 'Notes',
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
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('showed_up',$this->showed_up);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('begin',$this->begin,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}