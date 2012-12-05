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
    public function get_password(){

        return Response::json(array(
            array(
                'id'        => 1,
                'favourite' => true,
                'service'   => 'Gmail',
                'username'  => 'john.doe@gmail.com'
            ),array(
                'id'        => 2,
                'favourite' => true,
                'service'   => 'Gmail',
                'username'  => 'janedoe@gmail.com'
            ),array(
                'id'        => 3,
                'favourite' => true,
                'service'   => 'Gmail',
                'username'  => 'johndoe@gmail.com'
            ),array(
                'id'        => 4,
                'favourite' => true,
                'service'   => 'Outlook',
                'username'  => 'john@outlook.com'
            ),array(
                'id'        => 5,
                'favourite' => true,
                'service'   => 'CMS',
                'username'  => 'info@interactivestudios.nl'
            ),array(
                'id'        => 6,
                'favourite' => true,
                'service'   => 'Dashboard',
                'username'  => 'sander@interactivestudios.nl'
            ),array(
                'id'        => 7,
                'favourite' => true,
                'service'   => 'Facebook',
                'username'  => 'sanderverkuijlen'
            )
        ));
    }
    public function put_password(){
        return 'put_password';
    }
    public function delete_password(){
        return 'delete_password';
    }
}