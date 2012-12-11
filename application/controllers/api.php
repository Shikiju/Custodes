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

    //Password CRUD
    public function get_password($id = null){
        $user_id = Input::get('user_id');

        if($user_id > 0){

            //Get all
            if($id == null){

                $passwords = Password::where('user_id', '=', $user_id)->get();

                $result = array();
                /* @var $password Password */
                foreach($passwords as $password){
                    $result[] = $password->toJson();
                }

                return Response::json($result);
            }
            //Get one
            else{

                $password = Password::where('id', '=', $id)->where('user_id', '=', $user_id)->first();

                if($password != null){

                    return Response::json($password->toJson());
                }
            }
        }

        return Response::make('', 401);
    }

    public function post_password($id = null){
        $user_id    = Input::get('user_id');
        $post       = json_decode(file_get_contents('php://input'));

        var_dump($id);

        //Create
        if($id == null){
            $password = new Password();

            foreach($post as $key => $val){

                switch($key){

                    //Don't update these:
                    case 'id':
                        break;

                    //For everything else, there's default
                    default:
                        $password->$key = $val;
                        break;
                }
            }
            $password->user_id = $user_id;

            $password->save();

            return Response::json($password->toJson(), 200);
        }
        //Update
        else{
            $password = Password::where('id', '=', $id)->where('user_id', '=', $user_id)->first();

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

                return Response::json($password->toJson(), 200);
            }
        }

        return Response::make('', 403);
    }

    //Delete
    public function delete_password(){
        return 'delete_password';
    }
}