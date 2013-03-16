<?php

/**
 * This is the model base class for the table "user".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "User".
 *
 * Columns in table "user" available as properties of the model,
 * followed by relations of table "user" available as properties of the model.
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activationcode
 * @property integer $activated
 * @property string $registration_date
 * @property string $last_login_date
 * @property string $last_login_ip
 *
 * @property Profile[] $profiles
 */
abstract class BaseUser extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'User|Users', $n);
	}

	public static function representingColumn() {
		return 'username';
	}

	public function rules() {
		return array(
			array('username, password, email, activated, registration_date, last_login_date, last_login_ip', 'required'),
			array('activated', 'numerical', 'integerOnly'=>true),
			array('username, email', 'length', 'max'=>128),
			array('password, activationcode', 'length', 'max'=>60),
			array('last_login_ip', 'length', 'max'=>20),
			array('activationcode', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, username, password, email, activationcode, activated, registration_date, last_login_date, last_login_ip', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'profiles' => array(self::HAS_MANY, 'Profile', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'email' => Yii::t('app', 'Email'),
			'activationcode' => Yii::t('app', 'Activationcode'),
			'activated' => Yii::t('app', 'Activated'),
			'registration_date' => Yii::t('app', 'Registration Date'),
			'last_login_date' => Yii::t('app', 'Last Login Date'),
			'last_login_ip' => Yii::t('app', 'Last Login Ip'),
			'profiles' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('activationcode', $this->activationcode, true);
		$criteria->compare('activated', $this->activated);
		$criteria->compare('registration_date', $this->registration_date, true);
		$criteria->compare('last_login_date', $this->last_login_date, true);
		$criteria->compare('last_login_ip', $this->last_login_ip, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}