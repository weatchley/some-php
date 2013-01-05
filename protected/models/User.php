<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $company_id
 * @property string $username
 * @property integer $active
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property integer $failed_login_count
 * @property string $last_attempt
 * @property string $security_question
 * @property string $security_answer
 * @property string $last_login
 * @property string $date_created
 * @property string $date_canceled
 *
 * The followings are the available model relations:
 * @property Associates[] $associates
 * @property UserPrivs[] $userPrivs
 * @property Companies $company
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, username, email, password, first_name, last_name, security_question, security_answer', 'required'),
			array('company_id, active, failed_login_count', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('email', 'length', 'max'=>255),
			array('password', 'length', 'max'=>60),
			array('first_name, last_name', 'length', 'max'=>64),
			array('phone', 'length', 'max'=>16),
			array('security_question, security_answer', 'length', 'max'=>80),
			array('last_attempt, last_login, date_created, date_canceled', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, username, active, email, password, first_name, last_name, phone, failed_login_count, last_attempt, security_question, security_answer, last_login, date_created, date_canceled', 'safe', 'on'=>'search'),
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
			'associates' => array(self::HAS_MANY, 'Associates', 'user_id'),
			'userPrivs' => array(self::HAS_MANY, 'UserPrivs', 'user_id'),
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
			'username' => 'Username',
			'active' => 'Active',
			'email' => 'Email',
			'password' => 'Password',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'phone' => 'Phone',
			'failed_login_count' => 'Failed Login Count',
			'last_attempt' => 'Last Attempt',
			'security_question' => 'Security Question',
			'security_answer' => 'Security Answer',
			'last_login' => 'Last Login',
			'date_created' => 'Date Created',
			'date_canceled' => 'Date Canceled',
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
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('email',$this->email,true);
		//$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('failed_login_count',$this->failed_login_count);
		$criteria->compare('last_attempt',$this->last_attempt,true);
		//$criteria->compare('security_question',$this->security_question,true);
		//$criteria->compare('security_answer',$this->security_answer,true);
		$criteria->compare('last_login',$this->last_login,true);
		//$criteria->compare('date_created',$this->date_created,true);
		//$criteria->compare('date_canceled',$this->date_canceled,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getList($init="none",$showCompany=false)
    {
        $rows = User::model()->findAll();
        $result = null;
        if ($init != "none") {
          $result[0] = $init;
        }
        $compList = Company::model()->getList("none");
        foreach ($rows as $usr) {
          //$result[$usr->id] = $usr->username;
          $result[$usr->id] = (($showCompany) ? $compList[$usr->company_id] . "->" : "") . $usr->username;
        }
        
        return $result;
    }

}