<?php
use \Laravel\Input,
    \Laravel\Response;

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
    //Read
    public function get_password($id = null){
        $user_id = Input::get('user_id');

        if($user_id > 0){
            if($id != null){

                $password = Password::find($id);

                if($password->user_id == $user_id){

                    return Response::json(array(
                        'id'        => $password->id,
                        'service'   => $password->service,
                        'username'  => $password->username,
                        'password'  => $password->password,
                        'notes'     => $password->notes,
                        'favourite' => ($password->favourite ? true : false)
                    ));
                }
            }
            else{

                $passwords = Password::where('user_id', '=', $user_id)->get();

                $result = array();
                /* @var $password Password */
                foreach($passwords as $password){
                    $result[] = array(
                            'id'        => $password->id,
                            'service'   => $password->service,
                            'username'  => $password->username,
                            'password'  => $password->password,
                            'notes'     => $password->notes,
                            'favourite' => ($password->favourite ? true : false)
                        );
                }

                return Response::json($result);
            }
        }

        return Response::make('', 401);
    }
    //Save
    public function post_password($id){

        $password   = Password::find($id);
        $post       = json_decode(file_get_contents('php://input'));

        if($password != null && $post instanceof StdClass){

            foreach($post as $key => $val){

                switch($key){

                    //Don't update these:
                    case 'id':
                    case 'user_id':
                        break;

                    //For everything else, there's default
                    default:
                        $password->$key = $val;
                        break;
                }
            }

            $password->save();

            return Response::make('', 200);
        }

        return Response::make('', 403);
    }
    //Delete
    public function delete_password(){
        return 'delete_password';
    }
}