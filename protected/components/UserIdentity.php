<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    public $company;
    private $_id;
    private $_company;
    
    public function getCompany(){
        return $this->_company;
    }

    public function setCompany($company){
        $this->_company = $company;
    }
    
    public function getId(){
        return $this->_id;
    }
    
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=User::model()->findByAttributes(array('username'=>$this->username, 'company_id'=>$this->company));
        //$sql = "select * from users where company_id=$this->company and username='$this->username'";
        //$connection=Yii::app()->db;
        //$command=$connection->createCommand($sql);
        //$row=$command->queryRow();
        
        //$users=array(
		//	// username => password
		//	'demo'=>'demo',
		//	'admin'=>'admin',
		//);
        //if ($row['username'] != $this->username)
        Yii::app()->user->setState('companyName', '');
        if ($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
        //else if ($row['password'] != crypt(md5($this->password),md5($this->username)))
        else if ($user->password != crypt(md5($this->password),md5($this->username)))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
			$this->errorCode=self::ERROR_NONE;
            $company = $user->company_id;
            Yii::app()->user->setState('company', $this->company);
            //$this->setState('email', $row['email']);
            //$this->_id=$row['id'];
            Yii::app()->user->setState('email', $user->email);
            Yii::app()->user->setState('hasAdminPriv', false);
            Yii::app()->user->setState('isCompanyOwner', false);
            Yii::app()->user->setState('companyName', Company::model()->findByAttributes(array('id'=>$this->company))->company_name);
            $rows = UserPriv::model()->findAllByAttributes(array('user_id'=>$user->id));
            foreach ($rows as $priv) {
                $mypriv = Priv::model()->findByAttributes(array('id'=>$priv->priv_id))->description;
                switch ($mypriv) {
                  case "admin":
                    Yii::app()->user->setState('hasAdminPriv', true);
                    break;
                  case "Company Owner":
                    Yii::app()->user->setState('isCompanyOwner', true);
                    break;
                }
            }
            $this->_id=$user->id;
            $_id = $user->id;
            $_company = $user->company_id;
            //Yii::trace("test message","system.CModule");
            //Yii::log("Data Values: Company: $this->company, Email: $user->email, Id: $user->id", CLogger::LEVEL_ERROR, "");
        }
        
		//if(!isset($users[$this->username]))
		//	$this->errorCode=self::ERROR_USERNAME_INVALID;
		//else if($users[$this->username]!==$this->password)
		//	$this->errorCode=self::ERROR_PASSWORD_INVALID;
		//else
		//	$this->errorCode=self::ERROR_NONE;
        
		return !$this->errorCode;
	}
}