<?php

/**
 * This is the model class for table "user_privs".
 *
 * The followings are the available columns in table 'user_privs':
 * @property integer $id
 * @property integer $company_id
 * @property integer $user_id
 * @property integer $priv_id
 *
 * The followings are the available model relations:
 * @property Companies $company
 * @property Users $user
 * @property Privs $priv
 */
class UserPriv extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserPriv the static model class
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
		return 'user_privs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, user_id, priv_id', 'required'),
			array('company_id, user_id, priv_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, user_id, priv_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'priv' => array(self::BELONGS_TO, 'Privs', 'priv_id'),
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
			'user_id' => 'User',
			'priv_id' => 'Priv',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('priv_id',$this->priv_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}