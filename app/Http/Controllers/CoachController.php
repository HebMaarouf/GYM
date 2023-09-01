<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoachController extends Controller
{
    // reham

    //helping system for sport program

    public function helpingSystemSportProgram(Request $req)
    {
        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id_request = $req->input('id_request_sport_program');
                $data1 = DB::select('exec showRequestSport ? ', [$id_request]);
                // return $data1[0]->goal;

                $data = DB::select('exec checkSimilarProgram ?,?,?,?,?', [$data1[0]->goal, $data1[0]->age, $data1[0]->weight, $data1[0]->height, $data1[0]->id_player]);
                //return $data;

                return response()->json($data, 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function getProgramFromIdRequest(Request $req)
    {

        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $MyReq = $req->input('MyReq');
                $HisReq = $req->input('HisReq');
                DB::insert('exec getProgramFromIdRequest ?,?', [$HisReq, $MyReq]);

                return response()->json("success", 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }




    // hebal

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
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }

    }

    /************************    Add New Meal    ************************ */
    public function addNewMeal(Request $req)
    {

        try {
            //Reception id
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            //return null if false token
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);

            if ($suc) {
                $id = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
                $name = $req->input('name');
                $description = $req->input('description');
                DB::insert('insert into Meal values(?,?)', [$name, $description]);
                return response()->json(array('header' => 'success'), 200);

            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }

    }

    //<hebal End>

    public function addMove(Request $req)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $link_image1 = $req->file('link_image1');
        $link_image2 = $req->file('link_image2');

        $description = $req->input('description');
        $name = $req->input('name');
        $target_muscle = $req->input('target_muscle');

        $image1 = explode(".", $link_image1->getClientOriginalName());
        $image2 = explode(".", $link_image2->getClientOriginalName());
        $name1 = $image1[0] . '' . rand() . '.' . $image1[1];
        $name2 = $image2[0] . '' . rand() . '.' . $image2[1];
        $link_image1->move(public_path('images'), $name1);
        $link_image2->move(public_path('images'), $name2);

        DB::insert('exec addMove ?, ?, ?, ?, ?', [$name1, $name2, $description, $name, $target_muscle]);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }
    }


    public function fetch_data(Request $req)
    {
        // try {
        //     $id = $req->input('id');
        $token = $req->input('token');
        $user_name = $req->input('user_name');
        //     $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        //     if ($suc) {
        $id_coach = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
        //$id_coach = 14;
        $data = DB::select('exec showSportProgramRequest ?', [$id_coach]);
        //echo json_encode($data);
        return response()->json(array('data' => $data), 200);
        //         return response()->json(array('header' => 'success', 'data' => $data), 200);
        //     } else {
        //         return response()->json(array('header' => '409'), 200);
        //     }
        // }
        // catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }
    }

    public function fetch_Move_data(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $data = DB::table('Move')->orderBy('id', 'desc')->get();
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }
    }

    //update by me
    public function add_Sport_Program_data(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {

        $id_sport_program_request = $_GET['idSportProReq']; // $id_sport_program_request;; //$id_sport_program_request;
        $data = DB::insert('exec insertSport_Program ?', [$id_sport_program_request]); // $data = DB::table('SportProgramRequest')->orderBy('id','desc')->get();
        return "asdasd";
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }
    }

    public function fetch_Move_Programe(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $data = DB::table('Program_Moves')->orderBy('id', 'desc')->get();
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }
    }

    public function insert_programe_move(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {

        //get
        $moves = $_GET['choicesMove'];
        $day = $_GET['choiceDay'];
        $repu = $_GET['choiceRepu'];
        $id_program = $_GET['idInsert_programe_move'];
        $data = DB::insert('exec insertProgram_Moves ?, ?, ?, ?', [$id_program, $moves, $day, $repu]);
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }

    public function insert_programe_food(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {

        $meals = $_GET['choicesMeal'];
        $day = $_GET['choiceDayFood'];
        $num = $_GET['choiceNumFood'];
        $id_program = $_GET['idLastRequest'];
        $data = DB::insert('exec insertMeals_Program ?, ?, ?, ?', [$meals, $id_program, $day, $num]);

        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }

    public function fetch_Sport_pro(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {

        $data = DB::table('Sport_Program')->orderBy('id', 'desc')->get();
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }
    /********************* Food pro ***********************/

    ///fetch food_pro
    public function fetch_food_pro(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {

        $data = DB::table('FoodProgram')->orderBy('id', 'desc')->get();
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }
    }

    ///end fetch food_pro
    ///fetch food programe

    public function add_food_Program_data(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $id_food_program_request = $_GET['idFoodProReq'];
        // $id_sport_program_request;; //$id_sport_program_request;
        $data = DB::insert('exec insertFoodProgram ?', [$id_food_program_request]); // $data = DB::table('SportProgramRequest')->orderBy('id','desc')->get();
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }
    }

    //end food prog

    ///fetch meals
    public function fetch_Food_data(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $data = DB::table('Meal')->orderBy('id', 'desc')->get();
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }

    //end fetch meal

    ///fetch food req
    public function fetch_data_food(Request $req)
    {
        // try {
        // $id = $req->input('id');
        $token = $req->input('token');
        $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        //$data = DB::table('FoodProgramRequest')->orderBy('id', 'desc')->get();
        $id_coach = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
        $data = DB::select('exec showFoodProgramRequest ?', [$id_coach]);
        return response()->json(array('data' => $data), 200);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }
    }

    //end fetch food

    //more info
    public function show_image(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {

        $id_program = $request->input('idRequest');
        // echo "id program : ".$id_program;
        // $id_program = 2;

        $data = DB::select('exec showimage ?', [$id_program]);
        //echo $data;
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }

    public function draw_programe_meal(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $id_program = $request->input('idLastRequest');
        // $id_program=71;
        $data = DB::select('exec showMeals_prog ?', [$id_program]);
        echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }

    public function draw_programe_sport(Request $request)
    {
        // try {
        // $id = $req->input('id');
        // $token = $req->input('token');
        // $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $id_program = $request->input('idLastRequest');
        // $id_program=71;
        $data = DB::select('exec showMoves_prog ?', [$id_program]);
        return response()->json($data, 200);
        //echo json_encode($data);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }

    public function getIdPrForCoach(Request $req)
    {
        // try {
        // $id = $req->input('id');
        $token = $req->input('token');
        $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $id_coach = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
        $data = DB::select('exec getIdPrForCoach ?', [$id_coach]);
        // echo $data;
        return response()->json($data, 200);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }

    public function getIdFoodPrForCoach(Request $req)
    {
        // try {
        // $id = $req->input('id');
        $token = $req->input('token');
        $user_name = $req->input('user_name');
        // $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        // if ($suc) {
        $id_coach = DB::select('select id from Employee where user_name=?', [$user_name])[0]->id;
        $data = DB::select('exec getIdFoodPrForCoach ?', [$id_coach]);
        // echo $data;
        return response()->json($data, 200);
        //     return response()->json(array('header' => 'success'), 200);
        // } else {
        //     return response()->json(array('header' => '409'), 200);
        // }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(array('header' => '405'), 200);
        // } catch (\Exception $e) {
        //     return response()->json(array('header' => '406'), 200);
        // }

    }
}
