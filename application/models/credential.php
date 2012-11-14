<?php
use \Laravel\Auth\Drivers\Eloquent;

class Credentials extends Eloquent{
    public static $table = 'credentials';

}