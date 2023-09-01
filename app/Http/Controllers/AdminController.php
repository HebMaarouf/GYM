<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //testing
    public function testing(Request $req)
    {

        $token = $req->input('token');
        $user_name = $req->input('user_name');
        $res = DB::select('select type from UsersName where user_name=? and token=?', [$user_name, $token]);
        if ($res) {
            $id = DB::select('select id from Admin where user_name=?', [$user_name])[0]->id;
            return 'original';
        } else
            return 'fake';

    }

    public function page(Request $req)
    {
        return view('testingajax');
    }


    //work
    public function addgym(Request $req)
    {
        /*$validator = Validator::make($req->all(), [
            'name' => 'required',
            'phone' => 'required|string|max:10|min:7',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id' => 'required',
            'loc' => 'required',
            'des' => 'required',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'user_name_gym' => 'required',
            ]);*/
        //if ($validator->passes()) {
        try {
            // admin id
            $id = $req->input('id');
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $name = $req->input('name');
                $location = $req->input('loc');
                $description = $req->input('des');
                $user_name_new = $req->input('user_name_gym');
                $password = $req->input('password');
                $email = $req->input('email');
                $phone = $req->input('phone');
                $post1 = $req->file('file');
                $imageName = $post1->getClientOriginalName();
                $imagemove = $post1->move(public_path('images'), $imageName);
                try {
                    DB::beginTransaction();
                    DB::insert('insert into UsersName (user_name,type,token)values (?,?,?)', [$user_name_new, 1, '-1']);
                    DB::insert('exec addgym ?,?,?,?,?,?,?,?', [$name, $location, $description, $user_name_new, $password, $email, $phone, $imageName]);
                    DB::commit();
                    return response()->json(array('header' => 'success', 'image' => $imageName), 200);
                } catch (\Exception $e) {
                    return response()->json(array('header' => '410', 'error' => $e->getMessage(), 'image' => $imageName, 'token' => $token, 'id' => $id, 'pass' => $password, 'name' => $name, 'user' => $user_name_new, 'loc' => $location, 'des' => $description, 'email' => $email, 'phne' => $phone), 200);
                }
            } else {
                return response()->json(array('header' => '409', 'token' => $token, 'id' => $id, 'user_name' => $user_name), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405', 'error' => $e->getMessage()), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406', 'error' => $e->getMessage(), 'image' => $imageName, 'token' => $token, 'id' => $id, 'pass' => $password, 'name' => $name, 'user' => $user_name_new, 'loc' => $location, 'des' => $description, 'email' => $email, 'phne' => $phone, 'user_name' => $user_name), 200);
        }
        //}
        //return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function getAdmin(Request $req)
    {
        try {
            //admin id
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Admin where user_name=?', [$user_name])[0]->id;
                try {
                    $idAdmin = $id;
                    $data = DB::select('exec getadmin ?', [$idAdmin]);
                    return response()->json(array('header' => 'success', 'info' => $data), 200);
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

    public function deletegym(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Admin where user_name=?', [$user_name])[0]->id;
                $id_new = $req->input('id_new');
                DB::delete('exec deletegym ?', [$id_new]);
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

    public function getgyms(Request $req)
    {
        try {
            $data = DB::select('select * from GYM');
            return response()->json(array('header' => 'success', 'info' => $data), 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    //perform sql server operation
    public function createprocedure(Request $req)
    {
        $img = $req->file('file');
        $newimg = 'wdw.jpg';
        $img->move(public_path('images'), $newimg);
        $user_name = $req->input('user_name');
        $token = $req->input('token');
        return $token;
        /*try{
        //     DB::insert('create procedure InsertEmployeesVacation
        //     @id_employee int,
        //     @id_vacation_type int,
        //     @start_date date
        // as
        // begin
        //     insert into EmployeesVacation(id_employee,id_vacation_type,start_date)
        //     values (@id_employee,@id_vacation_type,@start_date);
        // end');
            return response()->json(array('header'=>'success'),200);
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json(array('header'=>'405'),200);
        }catch(\Exception $e){
            return response()->json(array('header'=>'406'),200);
        }*/
    }

    //return Admin view
    public function returnpage(Request $req)
    {
        $user_name = $req->input('user_name');
        $token = str_replace(' ', '+', $req->input('token'));
        $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
        Log::debug($token);
        if ($suc) {
            $page = $req->input('page');

            if ($page === 'AdminHome') //log in
                return view('AdminViews.Admin');

            if ($page === 'ARAdmin') //send user_name and token
                return view('AdminViews.adminar');

            if ($page === 'ARManager') //too
                return view('ManagerViews.managerViewar');

            if ($page === 'PlayerHome')    //log in
                return view('PlayerViews.home');

            if ($page === 'ReceptionHome')  //log in
                return view('ReceptionViews.home');

            if ($page === 'ManagerHome')   //log in
                return view('ManagerViews.managerView');

            if ($page === 'CoachHome') //log in
                return view('CoachViews.home');

        } else {
            return view('welcome');
        }
    }
}
