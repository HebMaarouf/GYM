<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogInController extends Controller
{
    /*
    404 page invalid
    405 sqlserver error
    406 php error
    407 username error
    408 password error
    409 invalid token
    410 user_name in use
    */
    public function millisecsBetween($dateOne, $dateTwo, $abs = true) {
    $func = $abs ? 'abs' : 'intval';
    return $func(strtotime($dateOne) - strtotime($dateTwo)) * 1000;
    }
    public function generateToken(){
                $resp=resource_path();
                $myfile = fopen($resp."\key.txt", "r") or die("Unable to open file!");
                $key=fread($myfile,20);
                fclose($myfile);
                $token=$this->millisecsBetween(time(), "1970-10-26 20:30");
                $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-128-ctr'));
                $crypted_token = openssl_encrypt($token, 'aes-128-ctr', $key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
                return $crypted_token;
    }
    public function checkPassword($user_name,$password,$tablename){

        $id =DB::select("select id from ".$tablename." where user_name=? and password=?",[$user_name,$password]);
        if($id){
            $token=$this->generateToken();
        DB::update("update UsersName set token = ? where user_name = ?", [$token,$user_name]);
        switch ($tablename){
            case 'Gym':
            return response()->json(array('header'=>'success', 'id' => $id[0]->id,'token'=>$token,'user_name'=>$user_name,'page'=>'ManagerHome'),200);
            break;
            case 'Admin':
            return response()->json(array('header'=>'success','token' => $token,'user_name'=>$user_name,'page'=>'AdminHome'),200);
            break;
            case 'Employee':
            $temp=DB::select("select type [type], id_gym from ".$tablename." where id=?",[$id[0]->id]);
            $type=$temp[0]->type;
            if($type=='coach'){
                return response()->json(array('header'=>'success', 'id' => $temp[0]->id_gym,'token'=>$token,'user_name'=>$user_name,'page'=>'CoachHome'),200);
            }else{
                return response()->json(array('header'=>'success', 'id' => $temp[0]->id_gym,'token'=>$token,'user_name'=>$user_name,'page'=>'ReceptionHome'),200);
            }
            break;
            case 'Player':
            return response()->json(array('header'=>'success', 'id' => $id,'token'=>$token,'user_name'=>$user_name,'page'=>'PlayerHome'),200);
            break;
            }

        }
        else
        return response()->json(array('header'=>'408'),200);
    }

    //log in and return id and token and user_name
    public function login(Request $req)
    {
         try {
             $user_name=$req->input('user_name');
             $password=$req->input('password');
            $mydata=DB::select("select type [type] from UsersName where user_name=?",[$user_name]);
            if($mydata)
                {
                    //get the type
                    $type= $mydata[0]->type;

                    //admin
                    if($type==0)
                    {
                        return $this->checkPassword($user_name,$password,'Admin');

                    }//Gym
                    else if($type==1)
                    {
                        return $this->checkPassword($user_name,$password,'Gym');
                    }//employee
                    else if($type==2 || $type==3)
                    {
                        return $this->checkPassword($user_name,$password,'Employee');
                    }//player
                    else if($type==4)
                    {
                        return $this->checkPassword($user_name,$password,'Player');
                    }

                }
            else
            return response()->json(array('header'=>'407'),200);

        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header'=>'405'), 200);
        }
        catch(\Exception $e)
        {
            return response()->json(array('header'=>'406'), 200);

        }




    }


}
