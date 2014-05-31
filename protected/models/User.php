<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $site
 * @property integer $city_id
 *
 * The followings are the available model relations:
 * @property City $city
 */
class User extends CActiveRecord
{
	const WEAK = 0;
	const STRONG = 1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, password, email, city_id', 'required'),
			array('id', 'unique'),
			array('password', 'passwordStrength', 'strength'=>self::STRONG),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>50),
			array('username, password', 'length', 'max'=>45),
			array('email, site', 'length', 'max'=>150),
			array('email','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name, username, password, email, site', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * check if the user password is strong enough
	 * check the password against the pattern requested
	 * by the strength parameter
	 * This is the 'passwordStrength' validator as declared in rules().
	 */
	public function passwordStrength($attribute,$params)
	{
	    if ($params['strength'] === self::WEAK)
	        $pattern = '/^(?=.*[a-zA-Z0-9]).{5,}$/';  
	    elseif ($params['strength'] === self::STRONG)
	        $pattern = '/^(?=.*\d(?=.*\d))(?=.*[a-zA-Z](?=.*[a-zA-Z])).{5,}$/';  
	 
	    if(!preg_match($pattern, $this->$attribute))
	      $this->addError($attribute, 'your password is not strong enough!');
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'site' => 'Site',
			'city_id' => 'City',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('city_id',$this->city_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
    {
        //return CPasswordHelper::verifyPassword($password,$this->password);
        return $password == $this->password;
    }
 	
 	/*
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
    */
}
