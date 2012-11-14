<?php
use \Laravel\Auth\Drivers\Eloquent;

class User extends Eloquent{
    public static $table = 'users';

}