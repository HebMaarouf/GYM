<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    //Zein

    //gaith
    public function addEmployee(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name_gym');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $TypeEmp = $req->input('TypeEmp');
                $state = $req->input('state');
                // $userNameGym      = $req->input('user_name_gym');
                $id_gym = $id;
                $password = $req->input('password');
                $open_time = $req->input('open_time');
                $shift = $req->input('shift');
                $close_time = $req->input('close_time');
                $first_name = $req->input('first_name');
                $last_name = $req->input('last_name');
                $father_name = $req->input('father_name');
                $national_id = $req->input('national_id');
                $birthday = $req->input('birthday');
                $phone_number = $req->input('phone_number');
                $email = $req->input('email');
                $token = $req->input('token');
                $salary = $req->input('salary');
                $userName = $req->input('user_name');
                try {
                    //type=2 employee
                    DB::beginTransaction();
                    DB::insert('insert into UsersName (user_name,type,token)values (?,?,?)', [$userName, 2, '-1']);
                    DB::insert('EXEC insertEmployee ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?', [$TypeEmp, $userName, $id_gym, $state, $password, $open_time, $shift, $close_time, $first_name, $last_name, $father_name, $national_id, $birthday, $phone_number, $email, $salary]);
                    DB::commit();
                    return response()->json(array('header' => 'success'), 200);
                } catch (\Exception $e) {
                    return response()->json(array('header' => '410', 'error' => $e->getMessage()), 200);
                }
            } else {
                return response()->json(array('header' => '409', 'error' => $suc), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405', 'error' => $e->getMessage()), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406', 'error' => $e->getMessage()), 200);
        }
    }

    //Attention change Vacation and pass the id vacation Request hebal>
    public function insertEmployeesVacation(Request $req)
    {
        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_employee = $req->input('id_employee');
                $id_vacation_type = $req->input('id_vacation_type');
                $start_date = $req->input('start_date');
                DB::insert('exec InsertEmployeeVacation ?, ?, ?', [$id_employee, $id_vacation_type, $start_date]);
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


    public function deleteEmployeesVacation(Request $req)
    {


        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_employee = $req->input('id_employee');
                $id_vacationt_ype = $req->input('id_vacationt_ype');
                DB::delete('exec deleteEmployeesVacation ? , ?', [$id_employee, $id_vacationt_ype]);
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

    public function showEmployeesVacation(Request $req)
    {


        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_employee = $req->input('id_employee');
                $data = DB::select('exec showEmployeesVacation ?', [$id_employee]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }

    }

    //fadi

    public function setStateEmployee(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $iddelemp = $req->input('iddelemp');
                $state = $req->input('state');
                DB::update('EXEC setStateEmployee ?,?', [$iddelemp, $state]);
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

    public function showEmployee(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $idshowemp = $id;
                $data = DB::select('EXEC showEmployee ?', [$idshowemp]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function insertVacationType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $description = $req->input('description');
                $period = $req->input('period');
                $id_gym = $id;
                DB::insert('exec insertVacation ?,?,?', [$description, $period, $id_gym]);
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

    public function showVacationType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('EXEC showVacationType ?', [$id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function deleteVacationType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $idv = $req->input('idv');
                DB::delete('EXEC DeleteVacation ?', [$idv]);
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

    public function insertSubscriptionType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $duration = $req->input('duration');
                $price = $req->input('price');
                $description = $req->input('description');
                $id_gym = $id;
                DB::insert('exec insertSubscriptionType ?, ?, ?, ?', [$duration, $price, $description, $id_gym]);
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

    public function deleteSubscriptionType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $idsub = $req->input('idsub');
                DB::delete('exec deleteSubscriptionType ?', [$idsub]);
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

    public function showSubscriptionType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('exec showSubscriptionType ?', [$id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function inserSpecifictSubscriptionType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $name = $req->input('name');
                $price = $req->input('price');
                $duration = $req->input('duration');
                $id_gym = $id;
                DB::insert('exec insertspecificSubscriptionType ?, ?, ?, ?', [$name, $price, $duration, $id_gym]);
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

    public function deleteSpecificSubscriptionType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $idssub = $req->input('idssub');
                DB::delete('exec deleteSpecificSubscriptionType ?', [$idssub]);
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

    public function showSpecificSubscriptionType(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('exec showSpecificSubscriptionType ?', [$id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    //hebal


    public function getVacationsRequests(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('exec getVacationsRequests ?', [$id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    //add the new machine
    public function addmachine(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $name = $req->input('name');
                $price = $req->input('price');
                $date = $req->input('date');
                $id_gym = $id;
                DB::insert('exec addmachine ?, ?, ?, ?', [$name, $price, $date, $id_gym]);
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

    //delete machine
    public function deletemachine(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_new = $req->input('id_new');
                DB::delete('exec deletemachine ?', [$id_new]);
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

    //get all the machines and show them
    public function getmachines(Request $req)
    {

        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('exec getMachines ?', [$id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function getrepair(Request $req)
    {
        try {

            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_machine = $req->input('id_machine');
                $data = DB::select('exec getRapeir ?', [$id_machine]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    //add repair to machine
    public function addrepair(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_machine = $req->input('id_machine');
                $cost = $req->input('cost');
                $date = $req->input('date');
                $company = $req->input('company');
                $id_gym = $id;
                DB::insert('exec addrepair ?, ?, ?, ?', [$id_machine, $cost, $date, $company]);
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

    //random payments
    public function addrandompayment(Request $req)
    {

        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $description = $req->input('description');
                $cost = $req->input('cost');
                $id_gym = $id;
                $date = $req->input('date');
                //return $date.$id_gym.$cost.$description;
                DB::insert('exec addrandompayment ?, ? ,? ,?', [$description, $cost, $id_gym, $date]);
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

    public function getrandompayments(Request $req)
    {
        try {

            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('exec getrandompayments ?', [$id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function deleterandompayment(Request $req)
    {
        try {

            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_payment = $req->input('id_payment');

                DB::delete('exec deleterandompayment ?', [$id_payment]);
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

    public function getstatistics(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                //  return "test";
                //1- specific month or specific year
                $type = $req->input('type');
                switch ($type) {
                    case 'specificmonth':
                        //active employees salary
                        $employees = DB::select('select sum(salary) [expense] from employee where state=\'active\'')[0]->expense;
                        //machines repaires
                        $repairs = DB::select('select ISNULL(sum(cost),0) [expense]  from Repair where MONTH(date)=? and YEAR(date)=?', [$req->input('month'), date('Y')])[0]->expense;
                        //random payments
                        $randompayments = DB::select('select ISNULL(sum(cost),0) [expense] from RandomPayment where MONTH(date)=? and YEAR(date)=?', [$req->input('month'), date('Y')])[0]->expense;
                        //income
                        $income = DB::select('select ISNULL(sum(st.price),0)+ISNULL(sum(sst.price),0) [expense]from Player_Subscription ps inner join SubscriptionType st on ps.id_subscription=st.id
                            inner join SpecificSubscriptionType sst on ps.id_specific_subscription_type=sst.id where MONTH(start_date)=? and YEAR(start_date)=?', [$req->input('month'), date('Y')])[0]->expense;

                        return response()->json(array('header' => 'success', 'data' => array('employees' => $employees, 'repairs' => $repairs, 'randompayments' => $randompayments, 'income' => $income)), 200);
                        break;
                    case 'specificyear':
                        $employees = DB::select('select sum(salary) [expense] from employee where state=\'active\'')[0]->expense;
                        $repairs = DB::select('select ISNULL(sum(cost),0) [expense]  from Repair where YEAR(date)=?', [$req->input('year')])[0]->expense;
                        $randompayments = DB::select('select ISNULL(sum(cost),0) [expense] from RandomPayment where YEAR(date)=?', [$req->input('year')])[0]->expense;
                        $income = DB::select('select ISNULL(sum(st.price),0)+ISNULL(sum(sst.price),0) [expense]from Player_Subscription ps inner join SubscriptionType st on ps.id_subscription=st.id
                            inner join SpecificSubscriptionType sst on ps.id_specific_subscription_type=sst.id where YEAR(start_date)=?', [$req->input('year')])[0]->expense;

                        return response()->json(array('header' => 'success', 'data' => array('employees' => $employees, 'repairs' => $repairs, 'randompayments' => $randompayments, 'income' => $income)), 200);

                        break;
                    case 'allyear':
                        //all specific year
                        $res = array();
                        $res1 = array();
                        $res2 = array();
                        $res3 = array();
                        $res4 = array();
                        for ($i = 1; $i <= 12; $i++) {
                            $employees = DB::select('select sum(salary) [expense] from employee where state=\'active\'')[0]->expense;
                            $repairs = DB::select('select ISNULL(sum(cost),0) [expense]  from Repair where MONTH(date)=? and YEAR(date)=?', [$i, $req->input('year')])[0]->expense;
                            $randompayments = DB::select('select ISNULL(sum(cost),0) [expense] from RandomPayment where MONTH(date)=? and YEAR(date)=?', [$i, $req->input('year')])[0]->expense;
                            $income = DB::select('select ISNULL(sum(st.price),0)+ISNULL(sum(sst.price),0) [expense]from Player_Subscription ps inner join SubscriptionType st on ps.id_subscription=st.id
                        inner join SpecificSubscriptionType sst on ps.id_specific_subscription_type=sst.id where MONTH(start_date)=? and YEAR(start_date)=?', [$i, $req->input('year')])[0]->expense;
                            $res[$i] = $income;
                            $res1[$i] = $employees;
                            $res2[$i] = $repairs;
                            $res3[$i] = $randompayments;
                            $res4[$i] = $income - ($employees + $repairs + $randompayments);
                        }
                        return response()->json(array('header' => 'success', 'data' => array('employees' => $res1, 'repairs' => $res2, 'randompayments' => $res3, 'income' => $res, 'all' => $res4)), 200);
                        // return response()->json(array('header'=>'success','data'=>$res),200);
                        break;
                    case 'all':
                        //all years in the gym
                        $employees = DB::select('select sum(salary) [expense] from employee where state=\'active\'')[0]->expense;
                        $repairs = DB::select('select YEAR(date) [year],ISNULL(sum(cost),0) [expense]  from Repair group by YEAR(date) order by YEAR(date)');
                        $randompayments = DB::select('select YEAR(date) [year],ISNULL(sum(cost),0) [expense] from RandomPayment group by YEAR(date) order by YEAR(date)');
                        $income = DB::select('select YEAR(start_date) [year], ISNULL(sum(st.price),0)+ISNULL(sum(sst.price),0) [expense]from Player_Subscription ps inner join SubscriptionType st on ps.id_subscription=st.id
                        inner join SpecificSubscriptionType sst on ps.id_specific_subscription_type=sst.id group by YEAR(start_date) order by YEAR(start_date)');
                        $res = array();
                        foreach ($repairs as $arr) {
                            $res[$arr->year] = $arr->expense + $employees;
                        }
                        foreach ($randompayments as $arr) {
                            $res[$arr->year] += $arr->expense;

                        }
                        foreach ($income as $arr) {
                            $res[$arr->year] *= -1;
                            $res[$arr->year] += $arr->expense;
                        }
                        return $res;
                        break;
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

    public function getnumberplyerstatistics(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;

                $id_gym = $id;
                $data = DB::select('exec getnumberplyerstatistics ?', [$id_gym]);
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

    public function getnumberemployee(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('select count(*) [employee_count] ,sum(salary)[salary_count] from Employee where id_gym = ? and state =\'active\'', [$id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function getcountsub(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('select count(*)[count],ISNULL(sum(st.price),0)+ISNULL(sum(sst.price),0) [expense]from Player_Subscription ps inner join SubscriptionType st on ps.id_subscription=st.id
                                    inner join SpecificSubscriptionType sst on ps.id_specific_subscription_type=sst.id where YEAR(start_date)=?', [date('Y')]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function getcountRepair(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('select count(*) [count],ISNULL(sum(cost),0) [expense]  from Repair where YEAR(date)=?', [date('Y')]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function getcountEmp(Request $req)
    {
        try {

            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('exec getcountEmp ?', [$id_gym]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409', 'error' => 'Invalid token'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405', 'error' => $e->getMessage()), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406', 'error' => $e->getMessage()), 200);
        }
    }

    public function getQuestion(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_gym = $id;
                $data = DB::select('exec getQuestion ?', [$id_gym]);
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

    public function addQuestion(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $description = $req->input('description');
                $state = $req->input('state');
                $id_gym = $id;
                //return $date.$id_gym.$cost.$description;
                DB::insert('exec addQuestion ?, ?,?', [$id_gym, $description, $state]);
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

    public function setstateQuestion(Request $req)
    {
        try {
            $token = $req->input('token');
            $user_name = $req->input('user_name');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $Quastions_id = $req->input('Quastions_id');
                $state = $req->input('state');
                DB::update('EXEC setStateQuastions ?,?', [$Quastions_id, $state]);
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

    public function getOptions(Request $req)
    {
        try {
            $user_name = $req->input('user_name');
            $token = $req->input('token');
            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_Q = $req->input('id_Q');
                $id_gym = $id;
                $data = DB::select('select * from Options where id_Q=?', [$id_Q]);
                return response()->json(array('header' => 'success', 'data' => $data), 200);
            } else {
                return response()->json(array('header' => '409'), 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('header' => '405'), 200);
        } catch (\Exception $e) {
            return response()->json(array('header' => '406'), 200);
        }
    }

    public function delOptions(Request $req)
    {
        try {

            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;
                $id_option = $req->input('id_option');
                DB::delete('delete from Options where id= ?', [$id_option]);
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

    public function insertOptions(Request $req)
    {
        try {

            $user_name = $req->input('user_name');
            $token = $req->input('token');

            $suc = DB::select('exec checktoken ? , ?', [$user_name, $token]);
            if ($suc) {
                $id = DB::select('select id from Gym where user_name=?', [$user_name])[0]->id;

                $id_question = $req->input('id_question');
                $Opdes = $req->input('Opdes');
                $Opval = $req->input('Opval');
                DB::insert('insert into Options values (?,?,?)', [$id_question, $Opdes, $Opval]);
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

}
