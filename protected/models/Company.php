<?php

/**
 * This is the model class for table "companies".
 *
 * The followings are the available columns in table 'companies':
 * @property integer $id
 * @property string $company_name
 * @property integer $active
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $phone
 * @property string $fax
 * @property string $web_site
 *
 * The followings are the available model relations:
 * @property Associates[] $associates
 * @property Calendars[] $calendars
 * @property Clients[] $clients
 * @property InvoiceIds[] $invoiceIds
 * @property Invoices[] $invoices
 * @property Locations[] $locations
 * @property UserPrivs[] $userPrivs
 * @property Users[] $users
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return 'companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address, city, state, zip', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('company_name', 'length', 'max'=>255),
			array('address, city', 'length', 'max'=>80),
			array('state', 'length', 'max'=>2),
			array('zip', 'length', 'max'=>10),
			array('phone, fax', 'length', 'max'=>20),
			array('web_site', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_name, active, address, city, state, zip, phone, fax, web_site', 'safe', 'on'=>'search'),
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
			'associates' => array(self::HAS_MANY, 'Associates', 'company_id'),
			'calendars' => array(self::HAS_MANY, 'Calendars', 'company_id'),
			'clients' => array(self::HAS_MANY, 'Clients', 'company_id'),
			'invoiceIds' => array(self::HAS_MANY, 'InvoiceIds', 'company_id'),
			'invoices' => array(self::HAS_MANY, 'Invoices', 'company_id'),
			'locations' => array(self::HAS_MANY, 'Locations', 'company_id'),
			'userPrivs' => array(self::HAS_MANY, 'UserPrivs', 'company_id'),
			'users' => array(self::HAS_MANY, 'Users', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_name' => 'Company Name',
			'active' => 'Active',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'web_site' => 'Web Site',
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
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('web_site',$this->web_site,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getList($init="none")
    {
        $rows = Company::model()->findAll();
        $result = null;
        if ($init != "none") {
          $result[0] = $init;
        }
        
        foreach ($rows as $comp) {
          $result[$comp->id] = $comp->company_name;
        }
        
        return $result;
    }
}