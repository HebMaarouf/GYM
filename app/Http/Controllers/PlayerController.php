<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{


    //Get Gym Questions
    public function getquestions(Request $req)
    {
        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
                $data = DB::select('select * from Quastions Q inner join Options O on Q.id=O.id_Q  where state=\'active\' order by Q.id
                ');
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

    //Get Palyer Information
    public function getPalyerInfo(Request $req)
    {
        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $data = DB::select('exec getplayerinfo ? ', [$id]);
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


    // get sport player programs date getting all programs as date
    public function getSportPlayerProgramsDate(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $data = DB::select('exec getSportPlayerProgramsDate ? ', [$id]);
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


    // get sport player program data (moves)
    public function getSportPlayerProgram(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $date = $req->input('date');
                $data = DB::select('exec getSportPlayerProgram ?,?', [$date, $id]);

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


// get food player programs date getting all programs as date
    public function getFoodPlayerProgramsDate(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $data = DB::select('exec getFoodtPlayerProgramsDate ? ', [$id]);
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


// get food player program data (meal)
    public function getFoodPlayerProgram(Request $req)
    {
        try {


            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $date = $req->input('date');
                $data = DB::select('exec getFoodPlayerProgram ?,?', [$date, $id]);

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


// request sport player program
    public function requestSportProgram(Request $req)
    {
        try {


            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id_player = (int)DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id_coach = (int)$req->input('id_coach');
                $goal = $req->input('goal');
                $weight = (int)$req->input('weight');
                $height = (int)$req->input('height');
                $age = (int)$req->input('age');
                $side_image = $req->file('side_image');
                $front_image = $req->file('front_image');
                $back_image = $req->file('back_image');
                $name1 = "";
                $name2 = "";
                $name3 = "";
                if ($side_image != null) {
                    $image1 = explode(".", $side_image->getClientOriginalName());
                    $name1 = $image1[0] . '' . rand() . '.' . $image1[1];
                    $side_image->move(public_path('images'), $name1);
                }

                if ($front_image != null) {
                    $image2 = explode(".", $front_image->getClientOriginalName());
                    $name2 = $image2[0] . '' . rand() . '.' . $image2[1];
                    $front_image->move(public_path('images'), $name2);
                }
                if ($back_image != null) {
                    $image3 = explode(".", $back_image->getClientOriginalName());
                    $name3 = $image3[0] . '' . rand() . '.' . $image3[1];
                    $back_image->move(public_path('images'), $name3);
                }


                $data = DB::insert('exec requestSportProgram ?,?,?,?,?,?,?,?,?', [$id_player, $id_coach, $goal, $weight, $height, $age, $name1, $name2, $name3]);

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


// request food player program
    public function requestFoodProgram(Request $req)
    {
        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id_player = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id_coach = $req->input('id_coach');
                $height = $req->input('height');
                $weight = $req->input('weight');
                $sex = $req->input('sex');
                $sugar = $req->input('sugar');
                $social_status = $req->input('social_status');
                $age = $req->input('age');
                $goal = $req->input('goal');

                $data = DB::insert('exec requestFoodProgram ?,?,?,?,?,?,?,?,?,?', [$id_player, $id_coach, $height, $weight, $sex, $sugar, $social_status, $age, $goal, null]);

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

    public function ModalReqestSportProgram(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id_player = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);


            if ($suc) {
                $id_Gym = DB::select('select id_gym from Player where id=?', [$id_player])[0]->id_gym;
                $data = DB::select('exec getcoachid ?', [$id_Gym]);
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


    public function ModalReqestFoodProgram(Request $req)
    {
        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id_player = DB::select('select id from Player where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {

                $id_Gym = DB::select('select id_gym from Player where id=?', [$id_player])[0]->id_gym;
                $data = DB::select('exec getcoachid ?', [$id_Gym]);

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


}
