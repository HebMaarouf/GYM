<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceptionController extends Controller
{
    //Zein

    //gaith

    //fadi

    //hebal

    /***********************    Subscription Deadline        ****************** */


    public function GetSubscriptionDeadline(Request $req)
    {

        try {
            //Reception id
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            //return null if false token
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $id_employee = $id;
                $id_gym = DB::select('select id_gym from Employee where id=?', [$id])[0]->id_gym;
                $date = $req->input('date');
                $data = DB::select('exec getsubscriptiondeadline ?,?', [$id_gym, $date]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);

            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405', 'error' => $e->getMessage()), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406', 'error' => $e->getMessage()), 200);
        }

    }

    /************************    Request Vacation    ************************ */
    public function AddVacationRequest(Request $req)
    {

        try {
            //Reception id
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            //return null if false token
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $id_employee = $id;
                $id_gym = DB::select('select id_gym from Employee where id=?', [$id])[0]->id_gym;
                $description = $req->input('description');
                $start_date = $req->input('start_date');
                DB::insert('exec addvacationrequest ?,?,?,?', [$id_employee, $id_gym, $start_date, $description]);
                return response()->json(array('header' => 'success'), 200);

            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405', 'error' => $e->getMessage()), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406', 'error' => $e->getMessage()), 200);
        }

    }
    //reham


    //**************   ADD new Player   ****************

    public function AddPlayer(Request $req)
    {
        try {
            //Reception id
            $token = $req->input('token');
            $user_name = $req->input('user_name');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $id_gym = DB::select('select id_gym from Employee where id=?', [$id])[0]->id_gym;
                $first_name = $req->input('first_name');
                $last_name = $req->input('last_name');
                $father_name = $req->input('father_name');
                $national_id = $req->input('national_id');
                $phone_number = $req->input('phone_number');
                $s_phone_number = $req->input('s_phone_number');
                $user_name = $req->input('user_name_new');
                $password = $req->input('password');
                $email = $req->input('email');
                $gender = $req->input('gender');
                try {
                    DB::beginTransaction();
                    DB::insert('insert into UsersName (user_name,type,token)values (?,?,?)', [$user_name, 4, '-1']);
                    DB::insert('exec addplayer ?,?,?,?,?,?,?,?,?,?,?', [$id_gym, $first_name, $last_name, $father_name, $national_id, $phone_number, $s_phone_number, $user_name, $password, $email, $gender]);
                    DB::commit();
                    return response()->json(array('header' => 'success'), 200);
                } catch (\Exception $e) {
                    return response()->json(array('header' => '410', 'error' => $e->getMessage()), 200);
                }
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405', 'error' => $e->getMessage()), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406', 'error' => $e->getMessage()), 200);
        }


    }


    //**************    ADD New Player Subscription    ****************

    public function AddPlayerSubscription(Request $req)
    {
        try {
            //Reception id
            $token = $req->input('token');
            $user_name = $req->input('user_name');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $id_subscription = $req->input('id_subscription');
                $id_player = $req->input('id_player');
                $id_employee = $id;
                $id_specific_subscription_type = $req->input('id_specific_subscription_type');
                $start_date = $req->input('start_date');
                $discount = $req->input('discount');

                try {

                    DB::insert('exec addsubscription ?,?,?,?,?,?', [$id_subscription, $id_player, $id_employee, $id_specific_subscription_type, $start_date, $discount]);
                    return response()->json(array('header' => 'success'), 200);
                } catch (\Exception $e) {
                    return response()->json(array('header' => '410'), 200);
                }
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }


    }

    //*********************	get today checked in	********************* */
    public function GetTodayCheckedIn(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;

                $date = $req->input('date');
                $id_gym = DB::select('select id_gym from Employee where id=?', [$id])[0]->id_gym;
                //return $date.$id_gym;
                $data = DB::select('exec gettodaycheckedin ?,?', [$date, $id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);

            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405', 'error' => $e->getMessage()), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406', 'error' => $e->getMessage()), 200);
        }
    }

    //**************    Check In    ****************

    public function CheckIn(Request $req)
    {
        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                //get id gym	update no id gym because "player id is unique per gym"
                //$id_gym=DB::select('select id_gym from Employee where id=?',[$id])[0]->id_gym;
                $id_player = $req->input('id_player');
                $date = $req->input('date');
                $time = $req->input('time');

                DB::insert('exec CheckIn ?,?,?', [$id_player, $date, $time]);
                //DB::insert('exec CheckIn ?,?,?,?',[$id_gym,$id_player,$date,$time]);
                return response()->json(array('header' => 'success'), 200);

            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405', 'error' => $e->getMessage()), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406', 'error' => $e->getMessage()), 200);
        }


    }


    //**************    Get Player Information    ****************

    public function GetPlayerInfo(Request $req)
    {
        try {
            //Reception id
            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $id_player = $req->input('id_player');
                $MyData = DB::select('exec getplayerinfo ? ', [$id_player]);
                return response()->json(array('header' => 'success', 'data' => $MyData), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }


    }


    //**************    Get Subscription Type     *********/

    public function GetSubscriptionType(Request $req)
    {
        try {
            //Reception id
            $token = $req->input('token');
            $user_name = $req->input('user_name');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $id_gym = DB::select('select id_gym from Employee where id=?', [$id])[0]->id_gym;
                $MyData = DB::select('exec getsubscriptiontype ?', [$id_gym]);

                return response()->json(array('header' => 'success', 'data' => $MyData), 200);


            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }


    }


    //************     Get Specific Subscription Type  ********//


    public function GetSpecificSubscriptionType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $MyData = DB::select('exec getspecificsubscriptiontype ');
                return response()->json(array('header' => 'success', 'data' => $MyData), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }


    //************     Get Player Subscription  ********/

    public function GetPlayerSubscription(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $id_player = $req->input('id_player');
                $MyData = DB::select('exec getplayersubscription ?', [$id_player]);

                return response()->json(array('header' => 'success', 'data' => $MyData), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }


}
