<?php
namespace App\Traits;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

trait Encryptable
{
    private $ahemd = 'ahle';
    public function decryptValue($attributes)
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->encryptable) && (! is_null($value))) {
                try {
                    $newEncrypter = new \Illuminate\Encryption\Encrypter(\Config::get('app.encryptKey'), \Config::get('app.cipher'));
                    $attributes[$key] = $newEncrypter->decrypt($value);
                } catch (DecryptException $e) {
                    $attributes[$key]  = $value;
                }
            }
        }
        return $attributes;
    }
    public function encryptedValues($attributes)
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->encryptable) && (! is_null($value))) {
                $newEncrypter = new \Illuminate\Encryption\Encrypter(\Config::get('app.encryptKey'), \Config::get('app.cipher'));
                $attributes[$key] = $newEncrypter->encrypt($value);
            }
        }
        return $attributes;
    }
    
    public function getAttributeFromArray($key)
    {
        $value = parent::getAttributeFromArray($key);
        
        if (in_array($key, $this->encryptable) && (! is_null($value))) {
            try {
                $newEncrypter = new \Illuminate\Encryption\Encrypter(\Config::get('app.encryptKey'), \Config::get('app.cipher'));
                $value = $newEncrypter->decrypt($value);
            } catch (DecryptException $e) {
                $value = $value;
            }
        }
        
        return $value;
    }
    public function getArrayableAttributes()
    {
        $value = parent::getArrayableAttributes();
        
        $value = $this->decryptValue($value);
            
        
        return $value;
    }
    public function getAttributes()
    {
        $value = parent::getAttributes();
        $value = $this->decryptValue($value);
        return $value;
    }
    protected function castAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $newEncrypter = new \Illuminate\Encryption\Encrypter(\Config::get('app.encryptKey'), \Config::get('app.cipher'));
            $value = $newEncrypter->encrypt($value);
        }
        
        return parent::castAttribute($key, $value);
    }
    
    public function castAttributes($attributes)
    {
        echo '1';
        $attributes = encryptedValues($attributes);
        
        return parent::castAttributes($attributes);
    }
    public function getDirty()
    {
        $dirty = [];
        foreach ($this->attributes as $key => $value) {
            if (! $this->originalIsEquivalent($key, $value)) {
                $dirty[$key] = $value;
            }
        }
        return $dirty;
    }
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $newEncrypter = new \Illuminate\Encryption\Encrypter(\Config::get('app.encryptKey'), \Config::get('app.cipher'));
            $value = $newEncrypter->encrypt($value);
        }
        
        return parent::setAttribute($key, $value);
    }
}
