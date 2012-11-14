<?php
class Api_Controller extends Base_Controller{
    public $restful = true;

    //Register
    public function get_register(){
        return 'get_register';
    }
    public function get_verify_user(){
        return 'get_verify_user';
    }

    //Login
    public function get_login(){
        return 'get_login';
    }

    //Forgot password
    public function get_forgot_password(){
        return 'get_forgot_password';
    }
    public function get_update_password(){
        return 'get_update_password';
    }

    //Location verification
    public function get_add_location(){
        return 'get_add_location';
    }
    public function get_verify_location(){
        return 'get_verify_location';
    }
    public function get_remove_location(){
        return 'get_remove_location';
    }

    //Credential management
    public function get_add_credential(){
        return 'get_add_credential';
    }
    public function get_update_credential(){
        return 'get_update_credential';
    }
    public function get_delete_credential(){
        return 'get_delete_credential';
    }
}