<?php

namespace LaravelEncryptable;
use Crypt;

trait EncryptsAttributes

{
    /**
     * overriding set attribute
     * @param string $key the key being retrieved from the model
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        if (in_array($key, $this->encrypt) && !is_null($value)) {
            $value = decrypt($value);
        }
        return $value;
    }
 
    /**
     * overriding set attribute
     * @param string $key the key being set
     * @param various $value the value being set for the key
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encrypt) && !is_null($value)) {
            $value = encrypt($value);
        }
        return parent::setAttribute($key, $value);
    }
}