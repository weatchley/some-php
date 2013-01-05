<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $id
 * @property integer $company_id
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property integer $active
 * @property string $occupation
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $phone
 * @property string $cell
 * @property string $fax
 * @property string $last_seen
 * @property integer $location_id
 * @property string $notes
 *
 * The followings are the available model relations:
 * @property Calendars[] $calendars
 * @property Companies $company
 * @property Locations $location
 * @property Invoices[] $invoices
 */
class Client extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Client the static model class
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
		return 'clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, last_name, first_name', 'required'),
			array('company_id, active, location_id', 'numerical', 'integerOnly'=>true),
			array('last_name, first_name, middle_name', 'length', 'max'=>40),
			array('occupation, address, city', 'length', 'max'=>80),
			array('email', 'length', 'max'=>255),
			array('state', 'length', 'max'=>2),
			array('zip', 'length', 'max'=>10),
			array('phone, cell, fax', 'length', 'max'=>20),
			array('last_seen, notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, last_name, first_name, middle_name, active, occupation, email, address, city, state, zip, phone, cell, fax, last_seen, location_id, notes', 'safe', 'on'=>'search'),
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
			'calendars' => array(self::HAS_MANY, 'Calendars', 'client_id'),
			'company' => array(self::BELONGS_TO, 'Companies', 'company_id'),
			'location' => array(self::BELONGS_TO, 'Locations', 'location_id'),
			'invoices' => array(self::HAS_MANY, 'Invoices', 'client_id'),
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
			'last_name' => 'Last Name',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'active' => 'Active',
			'occupation' => 'Occupation',
			'email' => 'Email',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'phone' => 'Phone',
			'cell' => 'Cell',
			'fax' => 'Fax',
			'last_seen' => 'Last Seen',
			'location_id' => 'Location',
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
        $criteria->order = "last_name, first_name";

		$criteria->compare('id',$this->id);
		//$criteria->compare('company_id',$this->company_id);
		$criteria->compare('company_id',Yii::app()->user->company);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('cell',$this->cell,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('last_seen',$this->last_seen,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getStateList($init="none")
    {
        $rows = Client::model()->findAll(array('select'=>'t.state', 'distinct'=>true, 'order'=>'state'));
        //$rows = Client::model()->selectDistinct('state')->order('state');
        $result = null;
        $i = 0;
        if ($init != "none") {
          $result[$i++] = $init;
        }
        
        foreach ($rows as $client) {
          $result[$i++] = $client->state;
        }
        
        return $result;
    }
    
    public function getStateHash($init="none")
    {
        $rows = Client::model()->findAll(array('select'=>'t.state', 'distinct'=>true, 'order'=>'state'));
        //$rows = Client::model()->selectDistinct('state')->order('state');
        $result = array();
        //if ($init != "none") {
        //  $result[''] = $init;
        //}
        
        foreach ($rows as $client) {
          $result[$client->state] = $client->state;
        }
        
        return $result;
    }
    
    public function getCityList($init="none")
    {
        $rows = Client::model()->findAll(array('select'=>'t.city', 'distinct'=>true, 'order'=>'city'));
        //$rows = Client::model()->selectDistinct('city')->order('city');
        $result = null;
        $i = 0;
        if ($init != "none") {
          $result[$i++] = $init;
        }
        
        foreach ($rows as $client) {
          $result[$i++] = $client->city;
        }
        
        return $result;
    }
     
    public function getCityHash($init="none")
    {
        $rows = Client::model()->findAll(array('select'=>'t.city', 'distinct'=>true, 'order'=>'city'));
        //$rows = Client::model()->selectDistinct('city')->order('city');
        $result = array();
        //if ($init != "none") {
        //  $result[$i++] = $init;
        //}
        
        foreach ($rows as $client) {
          $result[$client->city] = $client->city;
        }
        
        return $result;
    }
     
    public function getLabelData($active=null, $city=null, $state=null, $company_id=null)
    {
        $criteria = new CDbCriteria();
        if ($active != null) {
            $criteria->addCondition("active=$active");
        }
        if ($city != null and $city > " ") {
            $criteria->addCondition("city='$city'");
        }
        if ($state != null and $state > " ") {
            $criteria->addCondition("state='$state'");
        }
        if ($company_id != null and $company_id > 0) {
            $criteria->addCondition("company_id=$company_id");
        }
        $result = Client::model()->findAll($criteria);
        
        return $result;
    }
    
    public function getFullName($clnt) {
        return $clnt->first_name . " " . (($clnt->middle_name > " ") ? $clnt->middle_name : "") . $clnt->last_name;
    }
     
    public function getList($init="none", $company_id=null)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("company_id=$company_id");
        $rows = Client::model()->findAll($criteria);
        $result = null;
        if ($init != "none") {
          $result[0] = $init;
        }
        foreach ($rows as $obj) {
          $result[$obj->id] = Client::model()->getFullName($obj);
        }
        
        return $result;
    }
  
}