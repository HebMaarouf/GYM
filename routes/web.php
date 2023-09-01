<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {



    return view('welcome');

});
//new

//testing
Route::get('/testing','AdminController@page');
Route::post('/testingg','AdminController@testing');
Route::post('/cp','AdminController@createprocedure');

//work log in
Route::post('/login','LogInController@login');

//************************ work admin *******************/
Route::get('/homepage','AdminController@returnpage');

Route::get('/ARAdmin', function(){
    return view('AdminViews.adminar');
});
Route::get('/ARManager', function(){
    return view('ManagerViews.managerViewar');
});
Route::post('/addgym','AdminController@addgym');
Route::post('/deletegym','AdminController@deletegym');
Route::get('/readGym','AdminController@getgyms');

Route::get('/getAdmin', 'AdminController@getAdmin');


//**************** */work Player  **********************


Route::post('/getPalyerInfo','PlayerController@getPalyerInfo');

Route::post('/getSportPlayerProgramsDate','PlayerController@getSportPlayerProgramsDate');
Route::post('/getSportPlayerProgram','PlayerController@getSportPlayerProgram');

Route::post('/getFoodPlayerProgramsDate','PlayerController@getFoodPlayerProgramsDate');
Route::post('/getFoodPlayerProgram','PlayerController@getFoodPlayerProgram');

Route::post('/requestFoodProgram','PlayerController@requestFoodProgram');
Route::post('/requestSportProgram','PlayerController@requestSportProgram');
Route::post('/ModalReqestSportProgram','PlayerController@ModalReqestSportProgram');
Route::post('/ModalReqestFoodProgram','PlayerController@ModalReqestFoodProgram');


//**************** */work reception  **********************


Route::post('/GetSubscriptionDeadline','ReceptionController@GetSubscriptionDeadline');

Route::post('/GetTodayCheckedIn','ReceptionController@GetTodayCheckedIn');//get all today checked in working on
Route::post('/AddVacationRequest','ReceptionController@AddVacationRequest');
Route::post('/AddPlayer','ReceptionController@AddPlayer');
Route::post('/AddPlayerSubscription','ReceptionController@AddPlayerSubscription');
Route::post('/GetSubscriptionType','ReceptionController@GetSubscriptionType');
Route::post('/GetSpecificSubscriptionType','ReceptionController@GetSpecificSubscriptionType');
Route::post('/CheckIn','ReceptionController@CheckIn');
Route::post('/GetPlayerInfo','ReceptionController@GetPlayerInfo');
Route::post('/GetPlayerSubscription','ReceptionController@GetPlayerSubscription');

/*********************** MANAGER ***************************/

//Statistics
Route::get('/getstatistics','ManagerController@getstatistics');
//Random Payments
Route::post('/addrandompayment','ManagerController@addrandompayment');
Route::post('/getrandompayments','ManagerController@getrandompayments');
Route::post('/deleterandompayment','ManagerController@deleterandompayment');
//Machines
Route::post('/addmachine','ManagerController@addmachine');
Route::post('/deletemachine','ManagerController@deletemachine');
Route::get('/getmachines','ManagerController@getmachines');
Route::post('/addrepair','ManagerController@addrepair');
Route::get('/getrepair','ManagerController@getrepair');
//Employees
Route::post('/addEmployee','ManagerController@addEmployee');
Route::get('/showEmployee','ManagerController@showEmployee');
Route::post('/setStateEmployee','ManagerController@setStateEmployee');
/*new */Route::post('/updateemployer','ManagerController@updateemployer');
//VacationType
Route::post('/insertV','ManagerController@insertVacationType');
Route::post('/deleteVacationType','ManagerController@deleteVacationType');
Route::get('/showVacationType','ManagerController@showVacationType');
Route::post('/getVacationsRequests','ManagerController@getVacationsRequests');
//SubscriptionType
Route::post('/insertSubscriptionType','ManagerController@insertSubscriptionType');
Route::post('/deleteSubscriptionType','ManagerController@deleteSubscriptionType');
Route::get('/showSubscriptionType','ManagerController@showSubscriptionType');
//SpecifictSubscriptionType
Route::post('/inserSpecifictSubscriptionType','ManagerController@inserSpecifictSubscriptionType');
Route::post('/deleteSpecificSubscriptionType','ManagerController@deleteSpecificSubscriptionType');
Route::get('/showSpecificSubscriptionType','ManagerController@showSpecificSubscriptionType');
//EmployeesVacation
Route::post('/insertEmployeesVacation','ManagerController@insertEmployeesVacation');
Route::post('/deleteEmployeesVacation','ManagerController@deleteEmployeesVacation');
Route::get('/showEmployeesVacation','ManagerController@showEmployeesVacation');
/*ibrahim extra*/
Route::get('/getnumberplyerstatistics', 'ManagerController@getnumberplyerstatistics');
Route::get('/getnumberemployee', 'ManagerController@getnumberemployee');
Route::get('/getcountsub', 'ManagerController@getcountsub');
Route::get('/getcountRepair', 'ManagerController@getcountRepair');
Route::get('/getcountEmp', 'ManagerController@getcountEmp');

//******************Customer Satisfaction************************ */
Route::get('/getQuestion', 'ManagerController@getQuestion');
Route::post('/addQuestion', 'ManagerController@addQuestion');
Route::post('/setstateQuestion', 'ManagerController@setstateQuestion');
Route::get('/getOptions', 'ManagerController@getOptions');
Route::post('/insertOptions', 'ManagerController@insertOptions');
Route::post('/delOptions', 'ManagerController@delOptions');

//*********************** COACH *************************** fadi & gaith


//hebal
Route::get('/addNewMeal','CoachController@addNewMeal');

//reham helping system
Route::post('/helpingSystemSportProgram','CoachController@helpingSystemSportProgram');
Route::post('/getProgramFromIdRequest','CoachController@getProgramFromIdRequest');

Route::get('/coash', 'HomeController@coash');
Route::get('/coach', 'HomeController@coach');
Route::get('/addMove', 'CoachController@addMove');
Route::post('/showSportProgramRequest', 'CoachController@showSportProgramRequest');
Route::post('/showFoodProgramRequest', 'CoachController@showFoodProgramRequest');
//Route::get('/spr','CoachController@fetch_data');
// Route::get('/fetch_data','HomeController@fetch_data');

//
Route::post('/insertProgram_Moves', 'CoachController@insertProgram_Moves');
Route::post('/insertSport_Program', 'CoachController@insertSport_Program');
Route::post('/insertFoodProgram', 'CoachController@insertFoodProgram');
Route::post('/insertMeals_Program', 'CoachController@insertMeals_Program');


// Route::get('/livetable', 'HomeController@table');
Route::get('/fetch_data', 'CoachController@fetch_data');
Route::get('/fetch_Move_data', 'CoachController@fetch_Move_data');
Route::get('/add_Sport_Program_data', 'CoachController@add_Sport_Program_data');
Route::get('/formatit', 'HomeController@formatit');

Route::post('/add_Img_link', 'CoachController@add_Img_link');
Route::get('/insert_programe_move', 'CoachController@insert_programe_move');
Route::get('/insert_programe_food', 'CoachController@insert_programe_food');

Route::get('/fetch_image', 'CoachController@fetch_image');
Route::get('/fetch_Sport_pro', 'CoachController@fetch_Sport_pro');


//new
Route::post('/showFoodProgramRequest','CoachController@showFoodProgramRequest');
Route::post('/insertFoodProgram','CoachController@insertFoodProgram');
Route::post('/insertMeals_Program','CoachController@insertMeals_Program');
Route::get('/fetch_data_food', 'CoachController@fetch_data_food');
Route::get('/fetch_Food_data', 'CoachController@fetch_Food_data');
Route::get('/add_food_Program_data', 'CoachController@add_food_Program_data');
Route::get('/fetch_food_pro', 'CoachController@fetch_food_pro');
Route::get('/show_image', 'CoachController@show_image');
Route::post('/addMove', 'CoachController@addMove');
Route::get('/draw_programe_meal', 'CoachController@draw_programe_meal');
Route::get('/draw_programe_sport', 'CoachController@draw_programe_sport');


//getIdPrForCoach
Route::get('/getIdPrForCoach', 'CoachController@getIdPrForCoach');
Route::get('/getIdFoodPrForCoach', 'CoachController@getIdFoodPrForCoach');
// Route::post('/add_data', 'HomeController@add_data')->name('livetable.add_data');
// Route::post('/update_data', 'HomeController@update_data')->name('livetable.update_data');
// Route::post('/delete_data', 'HomeController@delete_data')->name('livetable.delete_data');
