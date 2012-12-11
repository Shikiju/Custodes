<?php
use \Laravel\Database\Eloquent\Model as Eloquent;

class Password extends Eloquent{
    public static $table = 'password';

    public function toJson(){

        return array(
            'id'        => $this->id,
            'service'   => $this->service,
            'username'  => $this->username,
            'password'  => $this->password,
            'notes'     => $this->notes,
            'favourite' => ($this->favourite ? true : false)
        );
    }
}