<?php

namespace common\auth;

use common\models\User;
use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

class Identity implements IdentityInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user =  User::findOne(['id' => $id, 'status' => User::STATUS_ACTIVE]);
        return $user ? new self($user): null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int
    {
        return $this->user->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): string
    {
        return $this->user->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * При обращении к свойствам сущности user
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->user->$name;
    }

    /**
     * При обращении к методам сущности user
     * @param $methodName
     * @param $args
     * @return mixed
     */
    public function __call($methodName, $args)
    {
        return $this->user->$methodName($args);
    }

}