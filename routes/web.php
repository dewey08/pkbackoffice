<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\WarehousePayController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RepaireScanController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\UserarticleController;
use App\Http\Controllers\UserComController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get','post'],'connectdb',[App\Http\Controllers\ConfigDatabaseController::class, 'connectdb'])->name('db.connectdb');//
Route::match(['get','post'],'connectdb_save',[App\Http\Controllers\ConfigDatabaseController::class, 'connectdb_save'])->name('db.connectdb_save');//

//********************* */ KTB  ***********************************
Route::match(['get','post'],'ktb_getcard',[App\Http\Controllers\KTBController::class,'ktb_getcard'])->name('ktb.ktb_getcard');//

Route::match(['get','post'],'ktb_test',[App\Http\Controllers\KTBAPIController::class,'ktb_test'])->name('ktb.ktb_test');//

Route::match(['get','post'],'treedoc',[App\Http\Controllers\KTBController::class,'treedoc'])->name('ktb.treedoc');//


Route::match(['get','post'],'acc_test',[App\Http\Controllers\AccController::class,'acc_test'])->name('ktb.acc_test');

Route::match(['get','post'],'report_authen',[App\Http\Controllers\ReportFontController::class, 'report_authen'])->name('rep.report_authen');// report
Route::match(['get','post'],'report_authen_sub/{month}/{year}',[App\Http\Controllers\ReportFontController::class, 'report_authen_sub'])->name('rep.report_authen_sub');// report
Route::match(['get','post'],'report_authen_subsub/{month}/{year}/{staff}',[App\Http\Controllers\ReportFontController::class, 'report_authen_subsub'])->name('rep.report_authen_subsub');// report

Route::match(['get','post'],'reportauthen_getbar',[App\Http\Controllers\ReportFontController::class, 'reportauthen_getbar'])->name('rep.reportauthen_getbar');// report
Route::match(['get','post'],'reportauthen_getbaripd',[App\Http\Controllers\ReportFontController::class, 'reportauthen_getbaripd'])->name('rep.reportauthen_getbaripd');// report

Route::match(['get','post'],'report_authen_subipd/{month}/{year}',[App\Http\Controllers\ReportFontController::class, 'report_authen_subipd'])->name('rep.report_authen_subipd');// report
Route::match(['get','post'],'report_authen_subsubipd/{month}/{year}/{staff}',[App\Http\Controllers\ReportFontController::class, 'report_authen_subsubipd'])->name('rep.report_authen_subsubipd');// report

Route::match(['get','post'],'authen/getauthen_auto',[App\Http\Controllers\AUTHENCHECKController::class, 'getauthen_auto'])->name('getauthen_auto');
Route::match(['get','post'],'authen_getbar',[App\Http\Controllers\AUTHENCHECKController::class, 'authen_getbar'])->name('authen_getbar');
Route::match(['get','post'],'authen_getbar_days',[App\Http\Controllers\AUTHENCHECKController::class, 'authen_getbar_days'])->name('authen_getbar_days');

Route::match(['get','post'],'report_dashboard',[App\Http\Controllers\ReportFontController::class, 'report_dashboard'])->name('rep.report_dashboard');// report
Route::match(['get','post'],'report_or',[App\Http\Controllers\ReportFontController::class, 'report_or'])->name('rep.report_or');// report
Route::match(['get','post'],'report_ormonth/{month}',[App\Http\Controllers\ReportFontController::class, 'report_ormonth'])->name('rep.report_ormonth');// report
Route::match(['get','post'],'report_refer',[App\Http\Controllers\ReportFontController::class, 'report_refer'])->name('rep.report_refer');// report report_refer
Route::match(['get','post'],'report_refer_thairefer',[App\Http\Controllers\ReportFontController::class, 'report_refer_thairefer'])->name('rep.report_refer_thairefer');// report report_refer
Route::match(['get','post'],'report_refer_thairefer_detail/{newDate}/{datenow}',[App\Http\Controllers\ReportFontController::class, 'report_refer_thairefer_detail'])->name('rep.report_refer_thairefer_detail');// report report_refer
Route::match(['get','post'],'report_refer_hos',[App\Http\Controllers\ReportFontController::class, 'report_refer_hos'])->name('rep.report_refer_hos');// report report_refer
Route::match(['get','post'],'report_refer_opds',[App\Http\Controllers\ReportFontController::class, 'report_refer_opds'])->name('rep.report_refer_opds');// report report_refer
Route::match(['get','post'],'report_refer_opds_sub/{months}/{startdate}/{enddate}',[App\Http\Controllers\ReportFontController::class, 'report_refer_opds_sub'])->name('rep.report_refer_opds_sub');// report report_refer
Route::match(['get','post'],'report_refer_opds_subvn/{months}/{hospcode}/{startdate}/{enddate}',[App\Http\Controllers\ReportFontController::class, 'report_refer_opds_subvn'])->name('rep.report_refer_opds_subvn');// report report_refer
Route::match(['get','post'],'report_refer_opds_subct/{months}/{hospcode}/{startdate}/{enddate}',[App\Http\Controllers\ReportFontController::class, 'report_refer_opds_subct'])->name('rep.report_refer_opds_subct');// report report_refer
Route::match(['get','post'],'refer_opds_cross',[App\Http\Controllers\ReportFontController::class, 'refer_opds_cross'])->name('rep.refer_opds_cross');// report report_refer
Route::match(['get','post'],'refer_opds_cross_excel/{startdate}/{enddate}/{hospcode}',[App\Http\Controllers\ReportFontController::class, 'refer_opds_cross_excel'])->name('rep.refer_opds_cross_excel');// report report_refer
Route::match(['get','post'],'cross_exportexcel',[App\Http\Controllers\ReportFontController::class, 'cross_exportexcel'])->name('rep.cross_exportexcel');// report report_refer

Route::match(['get','post'],'check_knee',[App\Http\Controllers\ReportFontController::class, 'check_knee'])->name('rep.check_knee');// report ข้อเข่า
Route::match(['get','post'],'check_knee_ipddetail/{newDate}/{datenow}',[App\Http\Controllers\ReportFontController::class, 'check_knee_ipddetail'])->name('rep.check_knee_ipddetail');// report ข้อเข่า
Route::match(['get','post'],'check_knee_ipd',[App\Http\Controllers\ReportFontController::class, 'check_knee_ipd'])->name('rep.check_knee_ipd');// report ข้อเข่า
Route::match(['get','post'],'check_knee_opd',[App\Http\Controllers\ReportFontController::class, 'check_knee_opd'])->name('rep.check_knee_opd');// report ข้อเข่า

Route::match(['get','post'],'report_ct',[App\Http\Controllers\ReportFontController::class, 'report_ct'])->name('rep.report_ct');// report

Route::match(['get','post'],'check_kradook',[App\Http\Controllers\ReportFontController::class, 'check_kradook'])->name('rep.check_kradook');// report แผ่นโลหะดามกระดูก
Route::match(['get','post'],'check_kradookdetail/{newDate}/{datenow}',[App\Http\Controllers\ReportFontController::class, 'check_kradookdetail'])->name('rep.check_kradookdetail');// report แผ่นโลหะดามกระดูก

Route::match(['get','post'],'check_khosaphok',[App\Http\Controllers\ReportFontController::class, 'check_khosaphok'])->name('rep.check_khosaphok');// report ข้อสะโพก
Route::match(['get','post'],'check_khosaphokdetail/{newDate}/{datenow}',[App\Http\Controllers\ReportFontController::class, 'check_khosaphokdetail'])->name('rep.check_khosaphokdetail');// report ข้อสะโพก

Route::get('book/bookmake_detail/{id}',[App\Http\Controllers\BookController::class, 'bookmake_detail'])->name('book.bookmake_detail');
Route::get('computer/com_repair_add/{id}',[App\Http\Controllers\RepaireScanController::class, 'com_repair_add']);// แจ้งซ่อมคอมพิวเตอร์ ผ่านสแกน
Route::match(['get','post'],'com_repairscan_save',[App\Http\Controllers\RepaireScanController::class, 'com_repairscan_save'])->name('com_repairscan_save');//

Route::get('authen_dashboard',[App\Http\Controllers\AuthenController::class, 'authen_dashboard'])->name('au.authen_dashboard');
Route::get('authen_detail/{dep}',[App\Http\Controllers\AuthenController::class, 'authen_detail'])->name('au.authen_detail');
Route::get('authen_user/{iduser}',[App\Http\Controllers\AuthenController::class, 'authen_user'])->name('au.authen_user');
Route::post('authen_check',[App\Http\Controllers\AuthenController::class, 'authen_check'])->name('au.authen_check');
Route::post('/import',[App\Http\Controllers\AuthenController::class,'import'])->name('import');
Route::get('import_authen_auto',[App\Http\Controllers\AuthenController::class,'import_authen_auto'])->name('import_authen_auto');
Route::get('authen_realtime',[App\Http\Controllers\AuthenController::class,'authen_realtime'])->name('authen_realtime');

Route::match(['get','post'],'token_add',[App\Http\Controllers\AUTHENCHECKController::class,'token_add'])->name('aa.token_add');
Route::match(['get','post'],'token_save',[App\Http\Controllers\AUTHENCHECKController::class,'token_save'])->name('aa.token_save');


Route::match(['get','post'],'authencode_auto',[App\Http\Controllers\AuthenautoController::class,'authencode_auto'])->name('authencode_auto');
Route::match(['get','post'],'authencode_auto_detail',[App\Http\Controllers\AuthenautoController::class,'authencode_auto_detail'])->name('authencode_auto_detail');
Route::match(['get','post'],'authencode_auto_save',[App\Http\Controllers\AuthenautoController::class,'authencode_auto_save'])->name('authencode_auto_save');
Route::match(['get','post'],'getsmartcard_authencode',[App\Http\Controllers\AuthenautoController::class,'getsmartcard_authencode'])->name('getsmartcard_authencode');


Route::match(['get','post'],'authencode_index',[App\Http\Controllers\AUTHENCHECKController::class,'authencode_index'])->name('aa.authencode_index');
// Route::match(['get','post'],'getsmartcard_authencode',[App\Http\Controllers\AUTHENCHECKController::class,'getsmartcard_authencode'])->name('getsmartcard_authencode');
Route::match(['get','post'],'smartcard_authencode_save',[App\Http\Controllers\AUTHENCHECKController::class,'smartcard_authencode_save'])->name('smartcard_authencode_save');

Route::match(['get','post'],'authen/checkauthen_main',[App\Http\Controllers\AUTHENCHECKController::class, 'checkauthen_main'])->name('checkauthen_main');
Route::match(['get','post'],'authen/checkauthen_auto',[App\Http\Controllers\AUTHENCHECKController::class, 'checkauthen_auto'])->name('checkauthen_auto');


Route::match(['get','post'],'authen/checkauthen_update_vn',[App\Http\Controllers\AUTHENCHECKController::class, 'checkauthen_update_vn'])->name('checkauthen_update_vn');
Route::match(['get','post'],'checkauthen_update_vn_data',[App\Http\Controllers\AUTHENCHECKController::class, 'checkauthen_update_vn_data'])->name('Sit.checkauthen_update_vn_data');


Route::match(['get','post'],'checkauthen_autospsch',[App\Http\Controllers\AutoController::class, 'checkauthen_autospsch'])->name('sit.checkauthen_autospsch');
Route::match(['get','post'],'sit',[App\Http\Controllers\AutoController::class, 'sit'])->name('sit.sit');//
Route::match(['get','post'],'sit_pull_auto',[App\Http\Controllers\AutoController::class, 'sit_pull_auto'])->name('sit.sit_pull_auto');//
Route::match(['get','post'],'sit_auto',[App\Http\Controllers\AutoController::class, 'sit_auto'])->name('sit.sit_auto');//
Route::match(['get','post'],'repage',[App\Http\Controllers\AutoController::class, 'repage'])->name('sit.repage');//
Route::match(['get','post'],'sit_pullacc_auto',[App\Http\Controllers\AutoController::class, 'sit_pullacc_auto'])->name('auto.sit_pullacc_auto');//


Route::match(['get','post'],'dbday_auto',[App\Http\Controllers\AutoController::class, 'dbday_auto'])->name('db.dbday_auto');//
Route::match(['get','post'],'depauthen_auto',[App\Http\Controllers\AutoController::class, 'depauthen_auto'])->name('db.depauthen_auto');//

Route::match(['get','post'],'check_sit_day',[App\Http\Controllers\ChecksitController::class, 'check_sit_day'])->name('claim.check_sit_day');//
Route::match(['get','post'],'check_sit_daysearch',[App\Http\Controllers\ChecksitController::class, 'check_sit_daysearch'])->name('claim.check_sit_daysearch');//
Route::match(['get','post'],'check_sit_pull',[App\Http\Controllers\ChecksitController::class, 'check_sit_pull'])->name('claim.check_sit_pull');//
Route::match(['get','post'],'check_sit_font',[App\Http\Controllers\ChecksitController::class, 'check_sit_font'])->name('claim.check_sit_font');//
Route::match(['get','post'],'check_sit_token',[App\Http\Controllers\ChecksitController::class, 'check_sit_token'])->name('claim.check_sit_token');//

Route::match(['get','post'],'check_sit_money',[App\Http\Controllers\ChecksitController::class, 'check_sit_money'])->name('claim.check_sit_money');//
Route::match(['get','post'],'check_sit_money_pk',[App\Http\Controllers\ChecksitController::class, 'check_sit_money_pk'])->name('claim.check_sit_money_pk');//

Route::match(['get','post'],'screening_cigarette',[App\Http\Controllers\PPFSController::class, 'screening_cigarette'])->name('pp.screening_cigarette');//การคัดกรองและบำบัดผู้ติดบุหรี่
Route::match(['get','post'],'screening_spirits',[App\Http\Controllers\PPFSController::class, 'screening_spirits'])->name('pp.screening_spirits');//การคัดกรองและบำบัดผู้ดื่มสุรา

Route::match(['get','post'],'surgery_index',[App\Http\Controllers\SurgeryController::class, 'surgery_index'])->name('s.surgery_index');// รายงานศัลยกรรม
Route::match(['get','post'],'surgery_page/{dep}',[App\Http\Controllers\SurgeryController::class, 'surgery_page'])->name('s.surgery_page');// รายงานศัลยกรรม

Route::match(['get','post'],'telemedicine',[App\Http\Controllers\TelemedicineController::class, 'telemedicine'])->name('s.telemedicine');// telemedicine
Route::match(['get','post'],'telemedicine_visit',[App\Http\Controllers\TelemedicineController::class, 'telemedicine_visit'])->name('s.telemedicine_visit');// telemedicine


Route::match(['get','post'],'import_stm',[App\Http\Controllers\UpstmController::class, 'import_stm'])->name('s.import_stm');// ทดสอบ Import
Route::match(['get','post'],'import_stm_save',[App\Http\Controllers\UpstmController::class, 'import_stm_save'])->name('s.import_stm_save');// ทดสอบ Import

Route::match(['get','post'],'stm_aipn',[App\Http\Controllers\UpstmController::class, 'stm_aipn'])->name('s.stm_aipn');// ทดสอบ Import
Route::match(['get','post'],'import_stm_aipn',[App\Http\Controllers\UpstmController::class, 'import_stm_aipn'])->name('s.import_stm_aipn');// ทดสอบ Import
Route::match(['get','post'],'import_stm_aipnmax',[App\Http\Controllers\UpstmController::class, 'import_stm_aipnmax'])->name('s.import_stm_aipnmax');// ทดสอบ Import
Route::match(['get','post'],'import_stm_aipnsave',[App\Http\Controllers\UpstmController::class, 'import_stm_aipnsave'])->name('s.import_stm_aipnsave');// ทดสอบ Import

Route::match(['get','post'],'import_rep_aipn',[App\Http\Controllers\UpstmController::class, 'import_rep_aipn'])->name('s.import_rep_aipn');// ทดสอบ Import
Route::match(['get','post'],'import_rep_aipn_save',[App\Http\Controllers\UpstmController::class, 'import_rep_aipn_save'])->name('s.import_rep_aipn_save');// ทดสอบ Import

// ********************************* นักโทษ  *****************************************
Route::match(['get','post'],'prisoner_opd',[App\Http\Controllers\PrisonerController::class, 'prisoner_opd'])->name('prisoner.prisoner_opd');  //นักโทษ 438
Route::match(['get','post'],'prisoner_opd_detail/{month}/{startdate}/{endtdate}',[App\Http\Controllers\PrisonerController::class, 'prisoner_opd_detail'])->name('prisoner.prisoner_opd_detail');  //นักโทษ 438
Route::match(['get','post'],'prisoner_opd_detail_show/{vn}',[App\Http\Controllers\PrisonerController::class, 'prisoner_opd_detail_show'])->name('prisoner.prisoner_opd_detail_show');  //นักโทษ 438
Route::match(['get','post'],'prisoner_opd_detail_excel/{month}/{startdate}/{endtdate}',[App\Http\Controllers\PrisonerController::class, 'prisoner_opd_detail_excel'])->name('prisoner.prisoner_opd_detail_excel');  //นักโทษ 438

Route::match(['get','post'],'prisoner_ipd',[App\Http\Controllers\PrisonerController::class, 'prisoner_ipd'])->name('prisoner.prisoner_ipd');  //นักโทษ
Route::match(['get','post'],'prisoner_ipd_detail/{month}/{startdate}/{endtdate}',[App\Http\Controllers\PrisonerController::class, 'prisoner_ipd_detail'])->name('prisoner.prisoner_ipd_detail');  //นักโทษ 438
Route::match(['get','post'],'prisoner_ipd_detail_excel/{month}/{startdate}/{endtdate}',[App\Http\Controllers\PrisonerController::class, 'prisoner_ipd_detail_excel'])->name('prisoner.prisoner_ipd_detail_excel');  //นักโทษ 438






Route::get('/', function () {

  if (Auth::check()) {
    return view('welcome');
  }else{
      return view('auth.login');
  }
})->name('index');


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('type');
Route::get('staff/home', [App\Http\Controllers\HomeController::class, 'staffHome'])->name('staff.home')->middleware('type');
Route::get('user/home', [App\Http\Controllers\UserController::class, 'user_index'])->name('user.home')->middleware('type');

Route::get('manage/home', [App\Http\Controllers\HomeController::class, 'manageHome'])->name('manage.home')->middleware('type');

Route::middleware(['type'])->group(function(){

  // Route::get('/', function () {
  //   if (Auth::check()) {
  //     return view('welcome');
  //   }else{
  //       return view('auth.login');
  //   }
  // })->name('index');
  Route::match(['get','post'],'admin_profile_edit/{id}',[App\Http\Controllers\ProfileController::class, 'admin_profile_edit'])->name('pro.admin_profile_edit');//
  Route::match(['get','post'],'admin_profile_update',[App\Http\Controllers\ProfileController::class, 'admin_profile_update'])->name('pro.admin_profile_update');//
  Route::match(['get','post'],'admin_password_update',[App\Http\Controllers\ProfileController::class, 'admin_password_update'])->name('pro.admin_password_update');//

  // ******************** ระบบลงเวลา Users ***********************
  Route::match(['get','post'],'user_timeindex',[App\Http\Controllers\UserstimerController::class, 'user_timeindex'])->name('usertime.user_timeindex');// ระบบลงเวลา
  // Route::match(['get','post'],'user_timeindex_excel',[App\Http\Controllers\UserstimerController::class, 'user_timeindex_excel'])->name('usertime.user_timeindex_excel');// ระบบลงเวลา
  // Route::match(['get','post'],'user_timeindex_excel/{startdate}/{enddate}',[App\Http\Controllers\UserstimerController::class, 'user_timeindex_excel'])->name('usertime.user_timeindex_excel');// ระบบลงเวลา
  Route::match(['get','post'],'user_timeindex_excel',[App\Http\Controllers\UserstimerController::class, 'user_timeindex_excel'])->name('usertime.user_timeindex_excel');// ระบบลงเวลา
  Route::match(['get','post'],'user_exportexcel',[App\Http\Controllers\UserstimerController::class, 'user_exportexcel'])->name('usertime.user_exportexcel');// ระบบลงเวลา

  Route::match(['get','post'],'user_timeindex_nurh',[App\Http\Controllers\UserstimerController::class, 'user_timeindex_nurh'])->name('usertime.user_timeindex_nurh');// ระบบลงเวลา
  Route::match(['get','post'],'user_timeindex_nurh_excel/{startdate}/{enddate}',[App\Http\Controllers\UserstimerController::class, 'user_timeindex_nurh_excel'])->name('usertime.user_timeindex_nurh_excel');// ระบบลงเวลา

  Route::match(['get','post'],'user_timeindex_day',[App\Http\Controllers\UserstimerController::class, 'user_timeindex_day'])->name('usertime.user_timeindex_day');// ระบบลงเวลา

  Route::match(['get','post'],'time_dashboard',[App\Http\Controllers\TimerController::class, 'time_dashboard'])->name('t.time_dashboard');// ระบบลงเวลา
  Route::match(['get','post'],'time_dashboard_excel',[App\Http\Controllers\TimerController::class, 'time_dashboard_excel'])->name('t.time_dashboard_excel');// ระบบลงเวลา
  Route::match(['get','post'],'time_dashboard_detail/{id}',[App\Http\Controllers\TimerController::class, 'time_dashboard_detail'])->name('t.time_dashboard_detail');// ระบบลงเวลา
  Route::match(['get','post'],'time_dashboard_detail_excel/{id}',[App\Http\Controllers\TimerController::class, 'time_dashboard_detail_excel'])->name('t.time_dashboard_detail_excel');// ระบบลงเวลา
  Route::match(['get','post'],'time_dashboard_detail_sub/{id}',[App\Http\Controllers\TimerController::class, 'time_dashboard_detail_sub'])->name('t.time_dashboard_detail_sub');// ระบบลงเวลา
  Route::match(['get','post'],'time_dashboard_detail_subexcel/{id}',[App\Http\Controllers\TimerController::class, 'time_dashboard_detail_subexcel'])->name('t.time_dashboard_detail_subexcel');// ระบบลงเวลา
  Route::match(['get','post'],'time_dashboard_detail_sub_person/{id}',[App\Http\Controllers\TimerController::class, 'time_dashboard_detail_sub_person'])->name('t.time_dashboard_detail_sub_person');// ระบบลงเวลา

  Route::match(['get','post'],'time_index',[App\Http\Controllers\TimerController::class, 'time_index'])->name('t.time_index');// ระบบลงเวลา
  Route::match(['get','post'],'time_index_search',[App\Http\Controllers\TimerController::class, 'time_index_search'])->name('t.time_index_search');// ระบบลงเวลา
  Route::match(['get','post'],'time_index_excel',[App\Http\Controllers\TimerController::class, 'time_index_excel'])->name('t.time_index_excel');// excel

  Route::match(['get','post'],'time_dep',[App\Http\Controllers\TimerController::class, 'time_dep'])->name('t.time_dep');// ระบบลงเวลา
  Route::match(['get','post'],'time_depsub',[App\Http\Controllers\TimerController::class, 'time_depsub'])->name('t.time_depsub');// ระบบลงเวลา
  Route::match(['get','post'],'time_depsubsub',[App\Http\Controllers\TimerController::class, 'time_depsubsub'])->name('t.time_depsubsub');// ระบบลงเวลา

  Route::match(['get','post'],'time_dep_excel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_dep_excel'])->name('t.time_dep_excel');// ระบบลงเวลา
  Route::match(['get','post'],'time_depsub_excel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_depsub_excel'])->name('t.time_depsub_excel');// ระบบลงเวลา
  Route::match(['get','post'],'time_depsubsub_excel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_depsubsub_excel'])->name('t.time_depsubsub_excel');// ระบบลงเวลา

  Route::match(['get','post'],'time_backot_dep',[App\Http\Controllers\TimerController::class, 'time_backot_dep'])->name('t.time_backot_dep');// ระบบลงเวลา
  Route::match(['get','post'],'time_backot_depexcel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_backot_depexcel'])->name('t.time_backot_depexcel');// ระบบลงเวลา

  Route::match(['get','post'],'time_backot_depsub',[App\Http\Controllers\TimerController::class, 'time_backot_depsub'])->name('t.time_backot_depsub');// ระบบลงเวลา
  Route::match(['get','post'],'time_backot_depsubexcel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_backot_depsubexcel'])->name('t.time_backot_depsubexcel');// ระบบลงเวลา

  Route::match(['get','post'],'time_backot_depsubsub',[App\Http\Controllers\TimerController::class, 'time_backot_depsubsub'])->name('t.time_backot_depsubsub');// ระบบลงเวลา
  Route::match(['get','post'],'time_backot_depsubsubexcel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_backot_depsubsubexcel'])->name('t.time_backot_depsubsubexcel');// ระบบลงเวลา

  // Route::match(['get','post'],'time_backot_dep',[App\Http\Controllers\TimerController::class, 'time_backot_dep'])->name('t.time_backot_dep');// ระบบลงเวลา
  // Route::match(['get','post'],'time_backot_depexcel',[App\Http\Controllers\TimerController::class, 'time_backot_depexcel'])->name('t.time_backot_depexcel');// ระบบลงเวลา

  Route::match(['get','post'],'time_nurs_dep',[App\Http\Controllers\TimerController::class, 'time_nurs_dep'])->name('t.time_nurs_dep');// ระบบลงเวลา
  Route::match(['get','post'],'time_nurs_depexcel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_nurs_depexcel'])->name('t.time_nurs_depexcel');// ระบบลงเวลา

  Route::match(['get','post'],'time_nurs_depsub',[App\Http\Controllers\TimerController::class, 'time_nurs_depsub'])->name('t.time_nurs_depsub');// ระบบลงเวลา
  Route::match(['get','post'],'time_nurs_depsubexcel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_nurs_depsubexcel'])->name('t.time_nurs_depsubexcel');// ระบบลงเวลา

  Route::match(['get','post'],'time_nurs_depsubsub',[App\Http\Controllers\TimerController::class, 'time_nurs_depsubsub'])->name('t.time_nurs_depsubsub');// ระบบลงเวลา
  Route::match(['get','post'],'time_nurs_depsubsubexcel/{id}/{startdate}/{enddate}',[App\Http\Controllers\TimerController::class, 'time_nurs_depsubsubexcel'])->name('t.time_nurs_depsubsubexcel');// ระบบลงเวลา
    // ******************** ผู้ดูแลงานบุคลากร ***********************
    Route::match(['get','post'],'person/person_index',[App\Http\Controllers\PersonController::class, 'person_index'])->name('person.person_index');//
    Route::match(['get','post'],'person/person_index_add',[App\Http\Controllers\PersonController::class, 'person_index_add'])->name('person.person_index_add');//
    Route::match(['get','post'],'person/person_index_addsub/{id}',[App\Http\Controllers\PersonController::class, 'person_index_addsub'])->name('person.person_index_addsub');//
    Route::match(['get','post'],'person/person_save',[App\Http\Controllers\PersonController::class, 'person_save'])->name('person.person_save');//
    Route::match(['get','post'],'person/person_index_edit/{id}',[App\Http\Controllers\PersonController::class, 'person_index_edit'])->name('person.person_index_edit');//
    Route::get('person/person_index_edittype/{id}',[App\Http\Controllers\PersonController::class, 'person_index_edittype'])->name('person.person_index_edittype');//
    Route::put('person/person_typeupdate',[App\Http\Controllers\PersonController::class, 'person_typeupdate'])->name('person.person_typeupdate');//
    Route::match(['get','post'],'person/person_update',[App\Http\Controllers\PersonController::class, 'person_update'])->name('person.person_update');//
    Route::delete('person/person_destroy/{id}',[App\Http\Controllers\PersonController::class, 'person_destroy'])->name('person.person_destroy');//

    Route::match(['get','post'],'p4p_dashboarduser',[App\Http\Controllers\P4puserController::class, 'p4p_dashboarduser'])->name('user.p4p_dashboarduser');//
    Route::match(['get','post'],'p4p_user',[App\Http\Controllers\P4puserController::class, 'p4p_user'])->name('user.p4p_user');//
    Route::match(['get','post'],'p4p_user_save',[App\Http\Controllers\P4puserController::class, 'p4p_user_save'])->name('user.p4p_user_save');//
    Route::match(['get','post'],'p4p_user_edit/{id}',[App\Http\Controllers\P4puserController::class, 'p4p_user_edit'])->name('user.p4p_user_edit');//
    Route::match(['get','post'],'p4p_user_update',[App\Http\Controllers\P4puserController::class, 'p4p_user_update'])->name('user.p4p_user_update');//

    Route::match(['get','post'],'workgroupset',[App\Http\Controllers\P4puserController::class, 'workgroupset'])->name('user.workgroupset');//
    Route::match(['get','post'],'workgroupset_save',[App\Http\Controllers\P4puserController::class, 'workgroupset_save'])->name('user.workgroupset_save');//
    Route::match(['get','post'],'workgroupset_edit/{id}',[App\Http\Controllers\P4puserController::class, 'workgroupset_edit'])->name('user.workgroupset_edit');//
    Route::match(['get','post'],'workgroupset_update',[App\Http\Controllers\P4puserController::class, 'workgroupset_update'])->name('user.workgroupset_update');//
    Route::match(['get','post'],'workset_switchactive',[App\Http\Controllers\P4pController::class, 'workset_switchactive'])->name('user.workset_switchactive');//

    Route::match(['get','post'],'workset',[App\Http\Controllers\P4puserController::class, 'workset'])->name('user.workset');//
    Route::match(['get','post'],'workset_save',[App\Http\Controllers\P4puserController::class, 'workset_save'])->name('user.workset_save');//
    Route::match(['get','post'],'workset_edit/{id}',[App\Http\Controllers\P4puserController::class, 'workset_edit'])->name('user.workset_edit');//
    Route::match(['get','post'],'workset_update',[App\Http\Controllers\P4puserController::class, 'workset_update'])->name('user.workset_update');//
    Route::match(['get','post'],'workset_switch',[App\Http\Controllers\P4puserController::class, 'workset_switch'])->name('user.workset_switch');//

    Route::match(['get','post'],'work_choose_detail/{id}',[App\Http\Controllers\P4puserController::class, 'work_choose_detail'])->name('user.work_choose_detail');//
    Route::match(['get','post'],'work_choose/{id}',[App\Http\Controllers\P4puserController::class, 'work_choose'])->name('user.work_choose');//
    Route::match(['get','post'],'work_choose_save',[App\Http\Controllers\P4puserController::class, 'work_choose_save'])->name('user.work_choose_save');//
    Route::match(['get','post'],'work_choose_worksetsave',[App\Http\Controllers\P4puserController::class, 'work_choose_worksetsave'])->name('user.work_choose_worksetsave');//

    Route::match(['get','post'],'work_choose_processpdf/{id}',[App\Http\Controllers\P4puserController::class, 'work_choose_processpdf'])->name('user.work_choose_processpdf');//
    Route::match(['get','post'],'work_choose_pdf/{id}',[App\Http\Controllers\P4puserController::class, 'work_choose_pdf'])->name('user.work_choose_pdf');//
    Route::match(['get','post'],'work_export_excel/{id}',[App\Http\Controllers\P4puserController::class, 'work_export_excel'])->name('user.work_export_excel');//
    Route::match(['get','post'],'work_export_excel2/{id}',[App\Http\Controllers\P4puserController::class, 'work_export_excel2'])->name('user.work_export_excel2');//

    Route::match(['get','post'],'work_load_save',[App\Http\Controllers\P4puserController::class, 'work_load_save'])->name('user.work_load_save');//
    Route::match(['get','post'],'work_load_saveCopy',[App\Http\Controllers\P4puserController::class, 'work_load_saveCopy'])->name('user.work_load_saveCopy');//
    Route::match(['get','post'],'work_load_update',[App\Http\Controllers\P4puserController::class, 'work_load_update'])->name('user.work_load_update');//
    Route::delete('work_load_destroy/{id}',[App\Http\Controllers\P4puserController::class, 'work_load_destroy'])->name('user.work_load_destroy');//


    Route::get('person/addpre',[App\Http\Controllers\PersonController::class, 'addpre'])->name('person.addpre');//  เพิ่มคำนำหน้า
    Route::match(['get','post'],'p4p_dayoff',[App\Http\Controllers\PersonController::class, 'p4p_dayoff'])->name('person.p4p_dayoff');//
    Route::match(['get','post'],'p4p_dayoff_save',[App\Http\Controllers\PersonController::class, 'p4p_dayoff_save'])->name('person.p4p_dayoff_save');//
    Route::match(['get','post'],'p4p_dayoff_edit/{id}',[App\Http\Controllers\PersonController::class, 'p4p_dayoff_edit'])->name('person.p4p_dayoff_edit');//
    Route::match(['get','post'],'p4p_dayoff_update',[App\Http\Controllers\PersonController::class, 'p4p_dayoff_update'])->name('person.p4p_dayoff_update');//

    Route::match(['get','post'],'person/department',[App\Http\Controllers\PersonController::class, 'department'])->name('person.department');//
    Route::match(['get','post'],'person/departmenthsub',[App\Http\Controllers\PersonController::class, 'departmenthsub'])->name('person.departmenthsub');//
    // Route::match(['get','post'],'person/person_index',[App\Http\Controllers\PersonController::class, 'person_index'])->name('person.person_index');//

    Route::get('province_fect',[App\Http\Controllers\PersonController::class, 'province_fect'])->name('fect.province_fect');//
    Route::get('district_fect',[App\Http\Controllers\PersonController::class, 'district_fect'])->name('fect.district_fect');//

     // ******************** ระบบการลา ***********************
 Route::match(['get','post'],'gleave',[App\Http\Controllers\GleaveController::class, 'gleave'])->name('gl.gleave');//
 Route::match(['get','post'],'gleave_calenda',[App\Http\Controllers\GleaveController::class, 'gleave_calenda'])->name('gl.gleave_calenda');//
 Route::match(['get','post'],'gleave_main',[App\Http\Controllers\GleaveController::class, 'gleave_main'])->name('gl.gleave_main');//
 Route::match(['get','post'],'gleave_config',[App\Http\Controllers\GleaveController::class, 'gleave_config'])->name('gl.gleave_config');//


  // ******************** งานสารบรรณ  ***********************

    Route::match(['get','post'],'book/book_dashboard',[App\Http\Controllers\BookController::class, 'book_dashboard'])->name('book.book_dashboard');//
    // Route::get('book/bookmake_detail/{id}',[App\Http\Controllers\BookController::class, 'bookmake_detail'])->name('book.bookmake_detail')->withoutMiddleware('type');
    // Route::get('bookdetail/{idref}','ManagerbookController@bookdetail')->name('book.book')->withoutMiddleware('type');

    Route::get('book/bookmake_index',[App\Http\Controllers\BookController::class, 'bookmake_index'])->name('book.bookmake_index');//
    Route::get('book/bookmake_index_edit/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_edit'])->name('book.bookmake_index_edit');//
    Route::match(['get','post'],'book/bookmake_index_update',[App\Http\Controllers\BookController::class, 'bookmake_index_update'])->name('book.bookmake_index_update');//

    Route::delete('bookmake_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookmake_destroy'])->name('bookmake_destroy');//

    Route::get('book/bookrep_file1_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookrep_file1_destroy'])->name('book.bookrep_file1_destroy');//
    Route::get('book/bookrep_file2_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookrep_file2_destroy'])->name('book.bookrep_file2_destroy');//
    Route::get('book/bookrep_file3_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookrep_file3_destroy'])->name('book.bookrep_file3_destroy');//
    Route::get('book/bookrep_file4_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookrep_file4_destroy'])->name('book.bookrep_file4_destroy');//
    Route::get('book/bookrep_file5_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookrep_file5_destroy'])->name('book.bookrep_file5_destroy');//

    Route::get('book/bookmake_index_send/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send'])->name('book.bookmake_index_send');//   ไปหน้ารายละเอียด
    Route::get('book/bookmake_index_send_deb/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send_deb'])->name('book.bookmake_index_send_deb');//   ไปหน้าส่งกลุ่ม
    Route::get('book/bookmake_index_send_debsub/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send_debsub'])->name('book.bookmake_index_send_debsub');// ไปหน้าส่ง ฝ่าย/แผนก
    Route::get('book/bookmake_index_send_debsubsub/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send_debsubsub'])->name('book.bookmake_index_send_debsubsub');// ไปหน้าส่ง หน่วยงาน
    Route::get('book/bookmake_index_send_person/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send_person'])->name('book.bookmake_index_send_person');// ไปหน้าส่ง หน่วยงาน
    Route::get('book/bookmake_index_send_team/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send_team'])->name('book.bookmake_index_send_team');// ไปหน้าส่ง ทีมนำองค์กร
    Route::get('book/bookmake_index_send_fileplus/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send_fileplus'])->name('book.bookmake_index_send_fileplus');// ไปหน้าไฟล์แนบ
    Route::get('book/bookmake_index_send_open/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send_open'])->name('book.bookmake_index_send_open');// ไปหน้าเปิดอ่าน
    Route::get('book/bookmake_index_send_file/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_send_file'])->name('book.bookmake_index_send_file');// ไปหน้าไฟล์ส่ง

    Route::get('book/bookmake_index_senddebindex/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_senddebindex'])->name('book.bookmake_index_senddebindex');//
    Route::get('book/process/{id}',[App\Http\Controllers\BookController::class, 'process'])->name('book.process');//

    Route::post('book/bookmake_sendretire/{id}',[App\Http\Controllers\BookController::class, 'bookmake_sendretire'])->name('book.bookmake_sendretire');// เสนอหัวหน้าบริหาร
    Route::post('book/bookmake_sendpo/{id}',[App\Http\Controllers\BookController::class, 'bookmake_sendpo'])->name('book.bookmake_sendpo');// เสนอ ผอ.

    Route::post('book/bookmake_index_senddep',[App\Http\Controllers\BookController::class, 'bookmake_index_senddep'])->name('book.bookmake_index_senddep');//ส่งกลุ่มงาน
    Route::delete('/book/bookmake_senddep_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookmake_senddep_destroy'])->name('book.bookmake_senddep_destroy');//

    Route::post('book/bookmake_index_senddepsub',[App\Http\Controllers\BookController::class, 'bookmake_index_senddepsub'])->name('book.bookmake_index_senddepsub');//ส่งฝ่าย/แผนก
    Route::delete('/book/bookmake_senddepsub_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookmake_senddepsub_destroy'])->name('book.bookmake_senddepsub_destroy');//

    Route::match(['get','post'],'book/bookmake_index_senddepsubsub',[App\Http\Controllers\BookController::class, 'bookmake_index_senddepsubsub'])->name('book.bookmake_index_senddepsubsub');//ส่งฝ่าย/แผนก
    Route::delete('/book/bookmake_senddepsubsub_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookmake_senddepsubsub_destroy'])->name('book.bookmake_senddepsubsub_destroy');//

    Route::post('book/bookmake_index_sendperson',[App\Http\Controllers\BookController::class, 'bookmake_index_sendperson'])->name('book.bookmake_index_sendperson');//ส่งบุคคล
    Route::delete('/book/bookmake_sendperson_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookmake_sendperson_destroy'])->name('book.bookmake_sendperson_destroy');//

    Route::post('book/bookmake_index_sendteam',[App\Http\Controllers\BookController::class, 'bookmake_index_sendteam'])->name('book.bookmake_index_sendteam');//ส่งทีมนำองค์กร
    Route::delete('/book/bookmake_sendteam_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookmake_sendteam_destroy'])->name('book.bookmake_sendteam_destroy');//

    Route::get('book/bookmake_index_openpdf/{id}',[App\Http\Controllers\BookController::class, 'bookmake_index_openpdf'])->name('book.bookmake_index_openpdf');//

    Route::get('/book/addtype',[App\Http\Controllers\BookController::class, 'addtype'])->name('book.addtype');//  เพิ่มประเภทหนังสือ
    Route::get('/book/addfam',[App\Http\Controllers\BookController::class, 'addfam'])->name('book.addfam');//  เพิ่มนำเข้าไว้ในแฟ้ม
    Route::match(['get','post'],'book/signature_save',[App\Http\Controllers\BookController::class, 'signature_save'])->name('book.signature_save');//บันทึกลายเซนต์
    Route::match(['get','post'],'book/comment1_save',[App\Http\Controllers\BookController::class, 'comment1_save'])->name('book.comment1_save');//บันทึกความคิดเห็น

     // -------------------------หนังสือรับ-------------------------
    Route::match(['get','post'],'book/bookrep_index',[App\Http\Controllers\BookController::class, 'bookrep_index'])->name('book.bookrep_index');//
    Route::match(['get','post'],'book/bookrep_index_add',[App\Http\Controllers\BookController::class, 'bookrep_index_add'])->name('book.bookrep_index_add');//
    Route::match(['get','post'],'book/bookrep_index_save',[App\Http\Controllers\BookController::class, 'bookrep_index_save'])->name('book.bookrep_index_save');//
    Route::get('book/bookrep_index_edit/{id}',[App\Http\Controllers\BookController::class, 'bookrep_index_edit'])->name('book.bookrep_index_edit');//
    Route::match(['get','post'],'book/bookrep_index_update',[App\Http\Controllers\BookController::class, 'bookrep_index_update'])->name('book.bookrep_index_update');//
    Route::delete('/book/bookrep_index_destroy/{id}',[App\Http\Controllers\BookController::class, 'bookrep_index_destroy'])->name('book.bookrep_index_destroy');//

 // -------------------------หนังสือส่ง-------------------------
    Route::match(['get','post'],'book/booksend_index',[App\Http\Controllers\BookController::class, 'booksend_index'])->name('book.booksend_index');//
    Route::match(['get','post'],'book/booksend_index_add',[App\Http\Controllers\BookController::class, 'booksend_index_add'])->name('book.booksend_index_add');//
    Route::match(['get','post'],'book/booksend_index_save',[App\Http\Controllers\BookController::class, 'booksend_index_save'])->name('book.booksend_index_save');//
    Route::get('book/booksend_index_edit/{id}',[App\Http\Controllers\BookController::class, 'booksend_index_edit'])->name('book.booksend_index_edit');//
    Route::match(['get','post'],'book/booksend_index_update',[App\Http\Controllers\BookController::class, 'booksend_index_update'])->name('book.booksend_index_update');//
    Route::delete('/book/booksend_index_destroy/{id}',[App\Http\Controllers\BookController::class, 'booksend_index_destroy'])->name('book.booksend_index_destroy');//

    Route::get('book/book_send_email/{id}',[App\Http\Controllers\BookController::class, 'book_send_email'])->name('book.book_send_email');//
    Route::get('book/book_sendemail_file/{id}',[App\Http\Controllers\BookController::class, 'book_send_emailfile'])->name('book.book_send_emailfile');//
    Route::get('dis-send-mail', [App\Http\Controllers\BookController::class, 'disSendMail']); // ส่งเมล์
    // Route::post('send_mailnew', [App\Http\Controllers\SendMailController::class, 'send_mailnew'])->name('book.send_mailnew');//
    Route::post('send_mailnewbook', [App\Http\Controllers\BookController::class, 'send_mailnewbook'])->name('book.send_mailnewbook');//


    // ******************** พัสดุ ***********************
    Route::match(['get','post'],'supplies/supplies_dashboard',[App\Http\Controllers\SuppliesController::class, 'supplies_dashboard'])->name('sup.supplies_dashboard');//
    Route::match(['get','post'],'supplies/supplies_index',[App\Http\Controllers\SuppliesController::class, 'supplies_index'])->name('sup.supplies_index');//
    Route::match(['get','post'],'supplies/supplies_index_add',[App\Http\Controllers\SuppliesController::class, 'supplies_index_add'])->name('sup.supplies_index_add');//
    Route::match(['get','post'],'supplies/supplies_index_save',[App\Http\Controllers\SuppliesController::class, 'supplies_index_save'])->name('sup.supplies_index_save');//
    Route::get('supplies/supplies_index_edit/{id}',[App\Http\Controllers\SuppliesController::class, 'supplies_index_edit'])->name('sup.supplies_index_edit');//
    Route::match(['get','post'],'supplies/supplies_index_update',[App\Http\Controllers\SuppliesController::class, 'supplies_index_update'])->name('sup.supplies_index_update');//
    Route::delete('supplies/supplies_destroy/{id}',[App\Http\Controllers\SuppliesController::class, 'supplies_destroy'])->name('sup.supplies_destroy');//

  // ******************** ครุภัณฑ์ ***********************
    Route::match(['get','post'],'article/article_dashboard',[App\Http\Controllers\ArticleController::class, 'article_dashboard'])->name('art.article_dashboard');//
    Route::match(['get','post'],'article/article_index',[App\Http\Controllers\ArticleController::class, 'article_index'])->name('art.article_index');//
    Route::match(['get','post'],'article/article_index_add',[App\Http\Controllers\ArticleController::class, 'article_index_add'])->name('art.article_index_add');//
    Route::match(['get','post'],'article/article_index_save',[App\Http\Controllers\ArticleController::class, 'article_index_save'])->name('art.article_index_save');//
    Route::get('article/article_index_edit/{id}',[App\Http\Controllers\ArticleController::class, 'article_index_edit'])->name('art.article_index_edit');//
    Route::match(['get','post'],'article/article_index_update',[App\Http\Controllers\ArticleController::class, 'article_index_update'])->name('art.article_index_update');//
    Route::delete('article/article_destroy/{id}',[App\Http\Controllers\ArticleController::class, 'article_destroy'])->name('art.article_destroy');//
    Route::get('article/selectfsn',[App\Http\Controllers\ArticleController::class, 'selectfsn'])->name('art.selectfsn'); // Select FSN
    Route::get('article/addunit',[App\Http\Controllers\ArticleController::class, 'addunit'])->name('art.addunit');//  เพิ่มหน่วยนับ
    Route::get('article/addbrand',[App\Http\Controllers\ArticleController::class, 'addbrand'])->name('art.addbrand');//  เพิ่มยี่ห้อ

    // ******************** ที่ดิน ********************
    Route::match(['get','post'],'land/land_index',[App\Http\Controllers\LandController::class, 'land_index'])->name('land.land_index');//
    Route::match(['get','post'],'land/land_index_add',[App\Http\Controllers\LandController::class, 'land_index_add'])->name('land.land_index_add');//
    Route::match(['get','post'],'land/land_index_save',[App\Http\Controllers\LandController::class, 'land_index_save'])->name('land.land_index_save');//
    Route::get('land/land_index_edit/{id}',[App\Http\Controllers\LandController::class, 'land_index_edit'])->name('land.land_index_edit');//
    Route::match(['get','post'],'land/land_index_update',[App\Http\Controllers\LandController::class, 'land_index_update'])->name('land.land_index_update');//
    Route::delete('land/land_destroy/{id}',[App\Http\Controllers\LandController::class, 'land_destroy'])->name('land.land_destroy');//

                    //****** อาคารสถานที่ *****
    Route::match(['get','post'],'building/building_index',[App\Http\Controllers\BuildingController::class, 'building_index'])->name('bu.building_index');//
    Route::match(['get','post'],'building/building_index_add',[App\Http\Controllers\BuildingController::class, 'building_index_add'])->name('bu.building_index_add');//
    Route::match(['get','post'],'building/building_index_save',[App\Http\Controllers\BuildingController::class, 'building_index_save'])->name('bu.building_index_save');//
    Route::get('building/building_index_edit/{id}',[App\Http\Controllers\BuildingController::class, 'building_index_edit'])->name('bu.building_index_edit');//
    Route::match(['get','post'],'building/building_index_update',[App\Http\Controllers\BuildingController::class, 'building_index_update'])->name('bu.building_index_update');//
    Route::delete('building/building_destroy/{id}',[App\Http\Controllers\BuildingController::class, 'building_destroy'])->name('bu.building_destroy');//

    Route::match(['get','post'],'building/building_addlevel/{id}',[App\Http\Controllers\BuildingController::class, 'building_addlevel'])->name('bu.building_addlevel');// ชั้น
    Route::match(['get','post'],'building/building_addlevel_save',[App\Http\Controllers\BuildingController::class, 'building_addlevel_save'])->name('bu.building_addlevel_save');//ชั้น
    Route::match(['get','post'],'building/building_addlevelone_save',[App\Http\Controllers\BuildingController::class, 'building_addlevelone_save'])->name('bu.building_addlevelone_save');//ชั้น
    Route::delete('building/building_leveldestroy/{id}',[App\Http\Controllers\BuildingController::class, 'building_leveldestroy'])->name('bu.building_leveldestroy');//ชั้น


    Route::match(['get','post'],'building/building_addlevel_room/{idbu}/{id}',[App\Http\Controllers\BuildingController::class, 'building_addlevel_room'])->name('bu.building_addlevel_room');// ห้อง
    Route::match(['get','post'],'building/building_addlevel_room_save',[App\Http\Controllers\BuildingController::class, 'building_addlevel_room_save'])->name('bu.building_addlevel_room_save');//ห้อง
    Route::delete('building/building_levelroomdestroy/{id}',[App\Http\Controllers\BuildingController::class, 'building_levelroomdestroy'])->name('bu.building_levelroomdestroy');//ห้อง
    Route::get('/building/addroomtype',[App\Http\Controllers\BuildingController::class, 'addroomtype'])->name('building_levelroomdestroy.addroomtype');//  เพิ่มประเภทห้อง

    // ******************** ข้อมูลบริการ ***********************
    Route::match(['get','post'],'serve/serve_index',[App\Http\Controllers\ServeController::class, 'serve_index'])->name('serve.serve_index');//
    Route::match(['get','post'],'serve/serve_index_add',[App\Http\Controllers\ServeController::class, 'serve_index_add'])->name('serve.serve_index_add');//
    Route::match(['get','post'],'serve/serve_index_save',[App\Http\Controllers\ServeController::class, 'serve_index_save'])->name('serve.serve_index_save');//
    Route::get('serve/serve_index_edit/{id}',[App\Http\Controllers\ServeController::class, 'serve_index_edit'])->name('serve.serve_index_edit');//
    Route::match(['get','post'],'serve/serve_index_update',[App\Http\Controllers\ServeController::class, 'serve_index_update'])->name('serve.serve_index_update');//
    Route::delete('/serve/serve_destroy/{id}',[App\Http\Controllers\ServeController::class, 'serve_destroy'])->name('serve.serve_destroy');//


      // ******************** คลังวัสดุ ***********************
      Route::match(['get','post'],'warehouse/warehouse_dashboard',[App\Http\Controllers\WarehouseController::class, 'warehouse_dashboard'])->name('ware.warehouse_dashboard');//
      Route::match(['get','post'],'warehouse/warehouse_index',[App\Http\Controllers\WarehouseController::class, 'warehouse_index'])->name('ware.warehouse_index');//
      Route::match(['get','post'],'warehouse/warehouse_add',[App\Http\Controllers\WarehouseController::class, 'warehouse_add'])->name('ware.warehouse_add');//
      Route::match(['get','post'],'warehouse/warehouse_addsub/{id}',[App\Http\Controllers\WarehouseController::class,'warehouse_addsub'])->name('ware.warehouse_addsub');//

      Route::match(['get','post'],'warehouse_billsave',[App\Http\Controllers\WarehouseController::class, 'warehouse_billsave'])->name('ware.warehouse_billsave');//
      Route::match(['get','post'],'warehouse_billupdate',[App\Http\Controllers\WarehouseController::class, 'warehouse_billupdate'])->name('ware.warehouse_billupdate');//
      Route::match(['get','post'],'warehouse/warehouse_save',[App\Http\Controllers\WarehouseController::class, 'warehouse_save'])->name('ware.warehouse_save');//

      Route::get('warehouse/warehouse_edit/{id}',[App\Http\Controllers\WarehouseController::class, 'warehouse_edit'])->name('ware.warehouse_edit');//
      Route::match(['get','post'],'warehouse/warehouse_detail/{id}',[App\Http\Controllers\WarehouseController::class, 'warehouse_detail'])->name('ware.warehouse_detail');//
      Route::match(['get','post'],'warehouse/warehouse_update',[App\Http\Controllers\WarehouseController::class, 'warehouse_update'])->name('ware.warehouse_update');//
      Route::match(['get','post'],'warehouse/warehouse_update_addsub',[App\Http\Controllers\WarehouseController::class, 'warehouse_update_addsub'])->name('ware.warehouse_update_addsub');//
      Route::match(['get','post'],'warehouse/warehouse_confirmbefor/{id}',[App\Http\Controllers\WarehouseController::class, 'warehouse_confirmbefor'])->name('ware.warehouse_confirmbefor');//
      Route::match(['get','post'],'warehouse/warehouse_confirm/{id}',[App\Http\Controllers\WarehouseController::class, 'warehouse_confirm'])->name('ware.warehouse_confirm');//
      Route::delete('warehouse/warehouse_destroy/{id}',[App\Http\Controllers\WarehouseController::class, 'warehouse_destroy'])->name('ware.warehouse_destroy');//

      Route::match(['get','post'],'warehouse/warehouse_inven',[App\Http\Controllers\WarehouseController::class,'warehouse_inven'])->name('ware.warehouse_inven');//
      Route::match(['get','post'],'warehouse/warehouse_inven_add',[App\Http\Controllers\WarehouseController::class,'warehouse_inven_add'])->name('ware.warehouse_inven_add');//
      Route::match(['get','post'],'warehouse/warehouse_invensave',[App\Http\Controllers\WarehouseController::class,'warehouse_invensave'])->name('ware.warehouse_invensave');//
      Route::match(['get','post'],'warehouse/warehouse_invenupdate',[App\Http\Controllers\WarehouseController::class,'warehouse_invenupdate'])->name('ware.warehouse_invenupdate');//
      Route::delete('warehouse_inven_destroy/{id}',[App\Http\Controllers\WarehouseController::class,'warehouse_inven_destroy'])->name('ware.warehouse_inven_destroy');//

      Route::match(['get','post'],'warehouse/warehouse_inven_addper/{id}',[App\Http\Controllers\WarehouseController::class,'warehouse_inven_addper'])->name('ware.warehouse_inven_addper');//
      Route::match(['get','post'],'warehouse/warehouse_inven_addpersave',[App\Http\Controllers\WarehouseController::class,'warehouse_inven_addpersave'])->name('ware.warehouse_inven_addpersave');//
      Route::get('warehouse/warehouse_inven_edit/{id}',[App\Http\Controllers\WarehouseController::class,'warehouse_inven_edit'])->name('ware.warehouse_inven_edit');//
      Route::put('warehouse/warehouse_inven_update',[App\Http\Controllers\WarehouseController::class,'warehouse_inven_update'])->name('ware.warehouse_inven_update');//
      Route::delete('warehouse/warehouse_inven_addper_destroy/{id}',[App\Http\Controllers\WarehouseController::class,'warehouse_inven_addper_destroy'])->name('ware.warehouse_inven_addper_destroy');//
      Route::match(['get','post'],'warehouse/warehouse_editplus',[App\Http\Controllers\WarehouseController::class,'warehouse_editplus'])->name('ware.warehouse_editplus');//

      // Route::get('warehouse/warehouse_addsub/{id}',[App\Http\Controllers\WarehouseController::class,'warehouse_addsub']);

      Route::match(['get','post'],'warehouse/warehouse_vendor',[App\Http\Controllers\WarehouseController::class, 'warehouse_vendor'])->name('ware.warehouse_vendor');//
      Route::match(['get','post'],'warehouse/warehouse_vendorsave',[App\Http\Controllers\WarehouseController::class, 'warehouse_vendorsave'])->name('ware.warehouse_vendorsave');//
      Route::match(['get','post'],'warehouse/warehouse_vendor_edit/{id}',[App\Http\Controllers\WarehouseController::class, 'warehouse_vendor_edit'])->name('ware.warehouse_vendor_edit');//
      Route::match(['get','post'],'warehouse/warehouse_vendorupdte',[App\Http\Controllers\WarehouseController::class, 'warehouse_vendorupdte'])->name('ware.warehouse_vendorupdte');//
      Route::delete('warehouse/warehouse_vendor_destroy/{id}',[App\Http\Controllers\WarehouseController::class, 'warehouse_vendor_destroy'])->name('ware.warehouse_vendor_destroy');//

      Route::get('warehouse/checksummoney',[App\Http\Controllers\WarehouseController::class, 'checksummoney'])->name('ware.checksummoney');//
      Route::get('warehouse/checkunitref',[App\Http\Controllers\WarehouseController::class, 'checkunitref'])->name('ware.checkunitref');//
      // Route::match(['get','post'],'warehouse/warehouse_save',[App\Http\Controllers\WarehouseController::class, 'warehouse_save'])->name('ware.warehouse_save');//
      Route::match(['get','post'],'warehouse/warehouse_main',[WarehouseController::class,'warehouse_main'])->name('ware.warehouse_main');
      Route::match(['get','post'],'warehouse/warehouse_main_detail/{id}',[WarehouseController::class,'warehouse_main_detail'])->name('ware.warehouse_main_detail');
      Route::match(['get','post'],'warehouse/warehouse_main_detail_sub/{idpro}',[WarehouseController::class,'warehouse_main_detail_sub'])->name('ware.warehouse_main_detail_sub');

      // Route::get('warehouse/warehouse_pay', function () {
      //   return view('welcome');
      // });
    // Route::match(['get','post'],'warehouse/warehouse_pay',[App\Http\Controllers\WarehousePayController::class,'warehouse_pay'])->name('pay.warehouse_pay');//

    // Route::match(['get','post'],'warehouse/warehouse_pay','WarehousePayController@warehouse_pay')->name('pay.warehouse_pay');//

    Route::match(['get','post'],'warehouse/warehouse_pay',[WarehousePayController::class,'warehouse_pay'])->name('pay.warehouse_pay');
    Route::match(['get','post'],'warehouse/warehouse_pay_edit/{id}',[WarehousePayController::class,'warehouse_pay_edit'])->name('pay.warehouse_pay_edit');
    Route::match(['get','post'],'warehouse/warehouse_paysave',[WarehousePayController::class,'warehouse_paysave'])->name('pay.warehouse_paysave');
    Route::match(['get','post'],'warehouse/warehouse_payupdate',[WarehousePayController::class,'warehouse_payupdate'])->name('pay.warehouse_payupdate');

    Route::match(['get','post'],'warehouse/warehouse_pay_sub/{id}',[WarehousePayController::class,'warehouse_pay_sub'])->name('pay.warehouse_pay_sub');

    Route::get('warehouse/warehouse_plus/{id}',[WarehouseController::class,'warehouse_plus'])->name('pay.warehouse_plus');











    // ******************** ตั้งค่า  กลุ่มงาน ***********************
    Route::match(['get','post'],'setting/setting_index',[App\Http\Controllers\SettingController::class,'setting_index'])->name('setting.setting_index');//
    Route::match(['get','post'],'setting/setting_depsave',[App\Http\Controllers\SettingController::class, 'setting_depsave'])->name('setting.setting_depsave');//
    Route::get('setting/setting_index_edit/{id}',[App\Http\Controllers\SettingController::class, 'setting_index_edit'])->name('setting.setting_index_edit');//
    Route::match(['get','post'],'setting/setting_depupdate',[App\Http\Controllers\SettingController::class, 'setting_depupdate'])->name('setting.setting_depupdate');//
    Route::delete('setting_index_destroy/{id}',[App\Http\Controllers\SettingController::class, 'setting_index_destroy'])->name('setting.setting_index_destroy');//

    // ******************** ตั้งค่า  ฝ่าย/แผนก ***********************
    Route::match(['get','post'],'setting/depsub_index',[App\Http\Controllers\SettingController::class, 'depsub_index'])->name('setting.depsub_index');//
    Route::match(['get','post'],'setting/depsub_save',[App\Http\Controllers\SettingController::class, 'depsub_save'])->name('setting.depsub_save');//
    Route::get('setting/depsub_edit/{id}',[App\Http\Controllers\SettingController::class, 'depsub_edit'])->name('setting.depsub_edit');//
    Route::match(['get','post'],'setting/depsub_update',[App\Http\Controllers\SettingController::class, 'depsub_update'])->name('setting.depsub_update');//
    Route::delete('depsub_destroy/{id}',[App\Http\Controllers\SettingController::class, 'depsub_destroy'])->name('setting.depsub_destroy');//

    // ******************** ตั้งค่า  หน่วยงาน ***********************
    Route::match(['get','post'],'setting/depsubsub_index',[App\Http\Controllers\SettingController::class, 'depsubsub_index'])->name('setting.depsubsub_index');//
    Route::match(['get','post'],'setting/depsubsub_add_color',[App\Http\Controllers\SettingController::class, 'depsubsub_add_color'])->name('setting.depsubsub_add_color');//
    Route::match(['get','post'],'setting/depsubsub_updatecolor',[App\Http\Controllers\SettingController::class, 'depsubsub_updatecolor'])->name('setting.depsubsub_updatecolor');//

    Route::match(['get','post'],'setting/depsubsub_save',[App\Http\Controllers\SettingController::class, 'depsubsub_save'])->name('setting.depsubsub_save');//
    Route::get('setting/depsubsub_edit/{id}',[App\Http\Controllers\SettingController::class, 'depsubsub_edit'])->name('setting.depsubsub_edit');//
    Route::match(['get','post'],'setting/depsubsub_update',[App\Http\Controllers\SettingController::class, 'depsubsub_update'])->name('setting.depsubsub_update');//
    Route::delete('depsubsub_destroy/{id}',[App\Http\Controllers\SettingController::class, 'depsubsub_destroy'])->name('setting.depsubsub_destroy');//

    // ******************** ตั้งค่า  กำหนดสิทธิ์การเห็นชอบ ***********************
    Route::match(['get','post'],'setting/leader',[App\Http\Controllers\SettingController::class, 'leader'])->name('setting.leader');//
    Route::match(['get','post'],'setting/leader_save',[App\Http\Controllers\SettingController::class, 'leader_save'])->name('setting.leader_save');//
    Route::delete('leader_destroy/{id}',[App\Http\Controllers\SettingController::class, 'leader_destroy'])->name('setting.leader_destroy');//
    Route::match(['get','post'],'setting/leader_addsub/{id}',[App\Http\Controllers\SettingController::class, 'leader_addsub'])->name('setting.leader_addsub');//
    Route::match(['get','post'],'setting/leader_addsub_save',[App\Http\Controllers\SettingController::class, 'leader_addsub_save'])->name('setting.leader_addsub_save');//
    Route::delete('leadersub_destroy/{id}',[App\Http\Controllers\SettingController::class, 'leadersub_destroy'])->name('setting.leadersub_destroy');//

     // ******************** ตั้งค่า  กำหนดสิทธิ์การใช้งาน ***********************
     Route::match(['get','post'],'setting/permiss',[App\Http\Controllers\PermissController::class, 'permiss'])->name('setting.permiss');//
     Route::match(['get','post'],'setting/permiss_liss/{id}',[App\Http\Controllers\PermissController::class, 'permiss_liss'])->name('setting.permiss_liss');//
     Route::match(['get','post'],'setting/permiss_save',[App\Http\Controllers\PermissController::class, 'permiss_save'])->name('setting.permiss_save');//
     Route::get('setting/permiss_edit/{id}',[App\Http\Controllers\PermissController::class, 'permiss_edit'])->name('setting.permiss_edit');//
     Route::match(['get','post'],'setting/permiss_update',[App\Http\Controllers\PermissController::class, 'permiss_update'])->name('setting.permiss_update');//
     Route::delete('permiss_destroy/{id}',[App\Http\Controllers\PermissController::class, 'permiss_destroy'])->name('setting.permiss_destroy');//

     Route::get('setting/switchpermiss_person',[App\Http\Controllers\PermissController::class, 'switchpermiss_person'])->name('setting.switchpermiss_person');//
     Route::get('setting/switchpermiss_book',[App\Http\Controllers\PermissController::class, 'switchpermiss_book'])->name('setting.switchpermiss_book');//
     Route::get('setting/switchpermiss_car',[App\Http\Controllers\PermissController::class, 'switchpermiss_car'])->name('setting.switchpermiss_car');//
     Route::get('setting/switchpermiss_meetting',[App\Http\Controllers\PermissController::class, 'switchpermiss_meetting'])->name('setting.switchpermiss_meetting');//
     Route::get('setting/switchpermiss_repair',[App\Http\Controllers\PermissController::class, 'switchpermiss_repair'])->name('setting.switchpermiss_repair');//


 // ******************** ตั้งค่า องค์กร ***********************
 Route::match(['get','post'],'setting/orginfo',[App\Http\Controllers\SettingController::class, 'orginfo'])->name('setting.orginfo');//
 Route::match(['get','post'],'setting/orginfo_update',[App\Http\Controllers\SettingController::class, 'orginfo_update'])->name('setting.orginfo_update');//

    // ******************** ตั้งค่า  Line Token ***********************
    Route::match(['get','post'],'setting/line_token',[App\Http\Controllers\SettingController::class, 'line_token'])->name('setting.line_token');//
    Route::match(['get','post'],'setting/line_token_save',[App\Http\Controllers\SettingController::class, 'line_token_save'])->name('setting.line_token_save');//
    Route::get('setting/line_token_edit/{id}',[App\Http\Controllers\SettingController::class, 'line_token_edit'])->name('setting.line_token_edit');//
    Route::put('setting/line_token_update',[App\Http\Controllers\SettingController::class, 'line_token_update'])->name('setting.line_token_update');//



    // ******************** User **************************
    Route::match(['get','post'],'user/user_data',[App\Http\Controllers\UserController::class, 'user_data'])->name('user.user_data');//
    Route::match(['get','post'],'user/profile_edit/{id}',[App\Http\Controllers\UserController::class, 'profile_edit'])->name('user.profile_edit');//
    Route::match(['get','post'],'user/profile_update',[App\Http\Controllers\UserController::class, 'profile_update'])->name('user.profile_update');//
    Route::match(['get','post'],'password_update',[App\Http\Controllers\UserController::class, 'password_update'])->name('user.password_update');//

    Route::match(['get','post'],'user/gleave_data/{iduser}',[App\Http\Controllers\UserController::class, 'gleave_data'])->name('user.gleave_data');//
    Route::match(['get','post'],'user/gleave_data_add/{iduser}',[App\Http\Controllers\UserController::class, 'gleave_data_add'])->name('user.gleave_data_add');//
    Route::match(['get','post'],'user/gleave_data_dashboard/{iduser}',[App\Http\Controllers\UserController::class, 'gleave_data_dashboard'])->name('user.gleave_data_dashboard');//

    Route::match(['get','post'],'user/gleave_data_sick',[App\Http\Controllers\UserController::class, 'gleave_data_sick'])->name('user.gleave_data_sick');//ป่วย
    Route::match(['get','post'],'user/gleave_data_leave',[App\Http\Controllers\UserController::class, 'gleave_data_leave'])->name('user.gleave_data_leave');//กิจ
    Route::match(['get','post'],'user/gleave_data_maternity',[App\Http\Controllers\UserController::class, 'gleave_data_maternity'])->name('user.gleave_data_maternity');//ลาคลอดบุตร
    Route::match(['get','post'],'user/gleave_data_vacation',[App\Http\Controllers\UserController::class, 'gleave_data_vacation'])->name('user.gleave_data_vacation');//พักผ่อน
    Route::match(['get','post'],'user/gleave_data_study',[App\Http\Controllers\UserController::class, 'gleave_data_study'])->name('user.gleave_data_study');//ลาศึกษา ฝึกอบรม
    Route::match(['get','post'],'user/gleave_data_work',[App\Http\Controllers\UserController::class, 'gleave_data_work'])->name('user.gleave_data_work');//ทำงานต่างประเทศ
    Route::match(['get','post'],'user/gleave_data_occupation',[App\Http\Controllers\UserController::class, 'gleave_data_occupation'])->name('user.gleave_data_occupation');//ฟิ้นฟูอาชีพ
    Route::match(['get','post'],'user/gleave_data_soldier',[App\Http\Controllers\UserController::class, 'gleave_data_soldier'])->name('user.gleave_data_soldier');//ลาเกณฑ์ทหาร
    Route::match(['get','post'],'user/gleave_data_helpmaternity',[App\Http\Controllers\UserController::class, 'gleave_data_helpmaternity'])->name('user.gleave_data_helpmaternity');//ลาช่วยภริยาคลอด
    Route::match(['get','post'],'user/gleave_data_spouse',[App\Http\Controllers\UserController::class, 'gleave_data_spouse'])->name('user.gleave_data_spouse');//ติดตามคู่สมรส
    Route::match(['get','post'],'user/gleave_data_out',[App\Http\Controllers\UserController::class, 'gleave_data_out'])->name('user.gleave_data_out');//ลาออก
    Route::match(['get','post'],'user/gleave_data_law',[App\Http\Controllers\UserController::class, 'gleave_data_law'])->name('user.gleave_data_law');//ลาป่วยตามกฎหมาย
    Route::match(['get','post'],'user/gleave_data_ordination',[App\Http\Controllers\UserController::class, 'gleave_data_ordination'])->name('user.gleave_data_ordination');//ลาอุปสมบท

    // ***************** ยานพาหนะ ผู้ใช้งานทั่วไป***************************
    Route::match(['get','post'],'user_car/car_calenda/{iduser}',[App\Http\Controllers\UsercarController::class, 'car_calenda'])->name('user_car.car_calenda');//
    Route::match(['get','post'],'user_car/car_narmal/{iduser}',[App\Http\Controllers\UsercarController::class, 'car_narmal'])->name('user_car.car_narmal');//
    Route::match(['get','post'],'user_car/car_narmal_show',[App\Http\Controllers\UsercarController::class, 'car_narmal_show'])->name('user_car.car_narmal_show');//
    Route::match(['get','post'],'user_car/car_narmal_showdetail/{id}',[App\Http\Controllers\UsercarController::class, 'car_narmal_showdetail'])->name('user_car.car_narmal_showdetail');//
    Route::match(['get','post'],'user_car/car_narmal_cancel/{id}',[App\Http\Controllers\UsercarController::class, 'car_narmal_cancel'])->name('user_car.car_narmal_cancel');//
    Route::match(['get','post'],'user_car/car_ambulance_cancel/{id}',[App\Http\Controllers\UsercarController::class, 'car_ambulance_cancel'])->name('user_car.car_ambulance_cancel');//
    Route::match(['get','post'],'user_car/car_ambulance_print/{id}',[App\Http\Controllers\UsercarController::class, 'car_ambulance_print'])->name('user_car.car_ambulance_print');//
    Route::match(['get','post'],'user_car/car_narmal_print/{id}',[App\Http\Controllers\UsercarController::class, 'car_narmal_print'])->name('user_car.car_narmal_print');//

    Route::match(['get','post'],'user_car/car_calenda_add/{id}',[App\Http\Controllers\UsercarController::class, 'car_calenda_add'])->name('user_car.car_calenda_add');//
    Route::match(['get','post'],'user_car/car_calenda_save',[App\Http\Controllers\UsercarController::class, 'car_calenda_save'])->name('user_car.car_calenda_save');//
    Route::match(['get','post'],'user_car/car_calenda_addsave',[App\Http\Controllers\UsercarController::class, 'car_calenda_addsave'])->name('user_car.car_calenda_addsave');//
    Route::match(['get','post'],'user_car/car_narmal_chose/{id}',[App\Http\Controllers\UsercarController::class, 'car_narmal_chose'])->name('user_car.car_narmal_chose');//
    Route::match(['get','post'],'user_car/car_calenda_savesign',[App\Http\Controllers\UsercarController::class, 'car_calenda_savesign'])->name('user_car.car_calenda_savesign');//
    Route::match(['get','post'],'user_car/car_calenda_edit/{id}',[App\Http\Controllers\UsercarController::class, 'car_calenda_edit'])->name('user_car.car_calenda_edit');//
    Route::match(['get','post'],'user_car/car_calenda_update',[App\Http\Controllers\UsercarController::class, 'car_calenda_update'])->name('user_car.car_calenda_update');//
    Route::match(['get','post'],'user_car/car_ambulance/{iduser}',[App\Http\Controllers\UsercarController::class, 'car_ambulance'])->name('user_car.car_ambulance');//
    Route::post('/user_car/addlocation',[App\Http\Controllers\UsercarController::class, 'addlocation'])->name('user_car.addlocation');//  เพิ่มสถานที่

    Route::match(['get','post'],'user_car/car_narmal_editshow/{id}',[App\Http\Controllers\UsercarController::class, 'car_narmal_editshow'])->name('user_car.car_narmal_editshow');//จัดสรร

    // ***************** สารบรรณ ผู้ใช้งานทั่วไป***************************
    Route::match(['get','post'],'user/book_inside/{iduser}',[App\Http\Controllers\UserbookController::class, 'book_inside'])->name('user.book_inside');//
    Route::match(['get','post'],'user/book_send/{iduser}',[App\Http\Controllers\UserbookController::class, 'book_send'])->name('user.book_send');//
    Route::match(['get','post'],'user/book_advertise/{iduser}',[App\Http\Controllers\UserbookController::class, 'book_advertise'])->name('user.book_advertise');//

    Route::match(['get','post'],'user_book/user_bookdetail/{id}',[App\Http\Controllers\UserbookController::class, 'user_bookdetail'])->name('user.user_bookdetail');//
    Route::match(['get','post'],'user_book/user_book_send_file/{id}',[App\Http\Controllers\UserbookController::class, 'user_book_send_file'])->name('user.user_book_send_file');//
    Route::match(['get','post'],'user_book/user_book_send_deb/{id}',[App\Http\Controllers\UserbookController::class, 'user_book_send_deb'])->name('user.user_book_send_deb');//
    Route::match(['get','post'],'user_book/user_book_send_debsub/{id}',[App\Http\Controllers\UserbookController::class, 'user_book_send_debsub'])->name('user.user_book_send_debsub');//
    Route::match(['get','post'],'user_book/user_book_send_debsubsub/{id}',[App\Http\Controllers\UserbookController::class, 'user_book_send_debsubsub'])->name('user.user_book_send_debsubsub');//
    Route::match(['get','post'],'user_book/user_book_send_person/{id}',[App\Http\Controllers\UserbookController::class, 'user_book_send_person'])->name('user.user_book_send_person');//
    Route::match(['get','post'],'user_book/user_book_send_team/{id}',[App\Http\Controllers\UserbookController::class, 'user_book_send_team'])->name('user.user_book_send_team');//
    Route::match(['get','post'],'user_book/user_book_send_fileplus/{id}',[App\Http\Controllers\UserbookController::class, 'user_book_send_fileplus'])->name('user.user_book_send_fileplus');//
    Route::match(['get','post'],'user_book/user_book_send_fileopen/{id}',[App\Http\Controllers\UserbookController::class, 'user_book_send_fileopen'])->name('user.user_book_send_fileopen');//

     // ***************** ประชุม/อบรม/ดูงาน ผู้ใช้งานทั่วไป***************************
     Route::match(['get','post'],'user/persondev_dashboard/{iduser}',[App\Http\Controllers\UserpersondevController::class, 'persondev_dashboard'])->name('user.persondev_dashboard');//
     Route::match(['get','post'],'user/persondev_index/{iduser}',[App\Http\Controllers\UserpersondevController::class, 'persondev_index'])->name('user.persondev_index');//
     Route::match(['get','post'],'user/persondev_inside/{iduser}',[App\Http\Controllers\UserpersondevController::class, 'persondev_inside'])->name('user.persondev_inside');//

    // ***************** ห้องประชุม ผู้ใช้งานทั่วไป***************************
    Route::match(['get','post'],'user_meetting/meetting_dashboard ',[App\Http\Controllers\UsermeettingController::class, 'meetting_dashboard'])->name('meetting.meetting_dashboard');//
    Route::match(['get','post'],'user_meetting/meetting_index',[App\Http\Controllers\UsermeettingController::class, 'meetting_index'])->name('meetting.meetting_index');//
    Route::match(['get','post'],'user_meetting/meetting_add/{iduser}',[App\Http\Controllers\UsermeettingController::class, 'meetting_add'])->name('meetting.meetting_add');//
    Route::match(['get','post'],'user_meetting/meetting_save',[App\Http\Controllers\UsermeettingController::class, 'meetting_save'])->name('meetting.meetting_save');//
    Route::match(['get','post'],'user_meetting/meetting_choose/{id}',[App\Http\Controllers\UsermeettingController::class, 'meetting_choose'])->name('meetting.meetting_choose');//
    Route::match(['get','post'],'user_meetting/meetting_choose_save',[App\Http\Controllers\UsermeettingController::class, 'meetting_choose_save'])->name('meetting.meetting_choose_save');//
    Route::match(['get','post'],'user_meetting/meetting_choose_linesave',[App\Http\Controllers\UsermeettingController::class, 'meetting_choose_linesave'])->name('meetting.meetting_choose_linesave');//
    Route::match(['get','post'],'user_meetting/meetting_choose_edit/{id}',[App\Http\Controllers\UsermeettingController::class, 'meetting_choose_edit'])->name('meetting.meetting_choose_edit');//
    Route::match(['get','post'],'user_meetting/meetting_detail/{id}',[App\Http\Controllers\UsermeettingController::class, 'meetting_detail'])->name('meetting.meetting_detail');//
    Route::match(['get','post'],'meetting_choose_cancel/{id}',[App\Http\Controllers\UsermeettingController::class, 'meetting_choose_cancel'])->name('meetting.meetting_choose_cancel');//

    Route::match(['get','post'],'user_meetting/meetting_calenda',[App\Http\Controllers\UsermeettingController::class, 'meetting_calenda'])->name('meetting.meetting_calenda');//ปฎิทิน
    Route::match(['get','post'],'user_meetting/calendar_save',[App\Http\Controllers\UsermeettingController::class, 'calendar_save'])->name('meetting.calendar_save');//
    Route::patch('user_meetting/calendar_update/{id}',[App\Http\Controllers\UsermeettingController::class, 'calendar_update'])->name('meetting.calendar_update');//
    // Route::match(['get','post'],'user_meetting/calendar_save',[App\Http\Controllers\UsermeettingController::class, 'calendar_save'])->name('meetting.calendar_save');//
    Route::delete('user_meetting/calendar_destroy/{id}',[App\Http\Controllers\UsermeettingController::class, 'calendar_destroy'])->name('meetting.calendar_destroy');//
    Route::match(['get','post'],'user_meetting/meetting_choose_lineupdate',[App\Http\Controllers\UsermeettingController::class, 'meetting_choose_lineupdate'])->name('meetting.meetting_choose_lineupdate');//

    Route::match(['get','post'],'user_meetting/meetting_calenda_add/{id}',[App\Http\Controllers\UsermeettingController::class, 'meetting_calenda_add'])->name('meetting.meetting_calenda_add');//ปฎิทิน


    // Route::resource('todo', CrudController::class);

    Route::match(['get','post'],'user_meetting/checkroom',[App\Http\Controllers\UsermeettingController::class, 'checkroom'])->name('meetting.checkroom');//

    // ***************** แจ้งซ่อม ผู้ใช้งานทั่วไป***************************
    Route::match(['get','post'],'user/repair_dashboard/{iduser}',[App\Http\Controllers\UserrepairController::class, 'repair_dashboard'])->name('user.repair_dashboard');//
    Route::match(['get','post'],'user/repair_narmal/{iduser}',[App\Http\Controllers\UserrepairController::class, 'repair_narmal'])->name('user.repair_narmal');//

    Route::match(['get','post'],'user/repair_med/{iduser}',[App\Http\Controllers\UserrepairController::class, 'repair_med'])->name('user.repair_med');//

  // ***************** งานซ่อมคอม ผู้ใช้งานทั่วไป***************************


  Route::match(['get','post'],'user_com/repair_com_calenda',[App\Http\Controllers\UsercomController::class, 'repair_com_calenda'])->name('user.repair_com_calenda');//
  Route::match(['get','post'],'user_com/repair_com',[App\Http\Controllers\UsercomController::class, 'repair_com'])->name('user.repair_com');//
  Route::match(['get','post'],'user_com/repair_com_add',[App\Http\Controllers\UsercomController::class, 'repair_com_add'])->name('user.repair_com_add');//
  Route::match(['get','post'],'user_com/repair_com_save',[App\Http\Controllers\UsercomController::class, 'repair_com_save'])->name('user.repair_com_save');//
  Route::match(['get','post'],'user_com/repair_com_edit/{id}',[App\Http\Controllers\UsercomController::class, 'repair_com_edit'])->name('user.repair_com_edit');//
  Route::match(['get','post'],'user_com/repair_com_update',[App\Http\Controllers\UsercomController::class, 'repair_com_update'])->name('user.repair_com_update');//
  Route::match(['get','post'],'user_com/repair_com_cancel/{id}',[App\Http\Controllers\UsercomController::class, 'repair_com_cancel'])->name('user.repair_com_cancel');//
  Route::match(['get','post'],'user_com/repair_com_print/{id}',[App\Http\Controllers\UsercomController::class, 'repair_com_print'])->name('user.repair_com_print');//

  Route::match(['get','post'],'user_com/com_calenda',[App\Http\Controllers\UserComController::class,'com_calenda'])->name('user.com_calenda');//

  // Route::get('user_com/com_calendanew',[App\Http\Controllers\UserComController::class,'com_calendanew']);//

  Route::get('/com_calendanew', [UserComController::class, 'com_calendanew']);


  Route::match(['get','post'],'user_com/com_index',[App\Http\Controllers\UserComController::class, 'com_index'])->name('user.com_index');//
  Route::match(['get','post'],'user_com/com_index_save',[App\Http\Controllers\UserComController::class, 'com_index_save'])->name('user.com_index_save');//
  Route::match(['get','post'],'user_com/com_index_edit/{id}',[App\Http\Controllers\UserComController::class, 'com_index_edit'])->name('user.com_index_edit');//


    // ***************** บ้านพัก ผู้ใช้งานทั่วไป***************************
    Route::match(['get','post'],'user/house_detail/{iduser}',[App\Http\Controllers\UserhouseController::class, 'house_detail'])->name('house.house_detail');//
    Route::match(['get','post'],'user/house_petition/{iduser}',[App\Http\Controllers\UserhouseController::class, 'house_petition'])->name('house.house_petition');//
    Route::match(['get','post'],'user/house_problem/{iduser}',[App\Http\Controllers\UserhouseController::class, 'house_problem'])->name('house.house_problem');//


    // ***************** ทะเบียนทรัพย์สิน ผู้ใช้งานทั่วไป***************************
    Route::match(['get','post'],'user_article',[App\Http\Controllers\UserarticleController::class, 'user_article'])->name('article.user_article');//
    Route::match(['get','post'],'user_article_borrow',[App\Http\Controllers\UserarticleController::class, 'user_article_borrow'])->name('article.user_article_borrow');//
    Route::match(['get','post'],'user_article_borrowsave',[App\Http\Controllers\UserarticleController::class, 'user_article_borrowsave'])->name('article.user_article_borrowsave');//
    Route::match(['get','post'],'user_article_borrowupdate',[App\Http\Controllers\UserarticleController::class, 'user_article_borrowupdate'])->name('article.user_article_borrowupdate');//
    Route::match(['get','post'],'user_article_return',[App\Http\Controllers\UserarticleController::class, 'user_article_return'])->name('article.user_article_return');//

   // ***************** พัสดุ ผู้ใช้งานทั่วไป***************************
    Route::match(['get','post'],'user/supplies_dashboard',[App\Http\Controllers\UsersuppliesController::class, 'supplies_dashboard'])->name('user.supplies_dashboard');//
    Route::match(['get','post'],'user/supplies_data/{iduser}',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data'])->name('user.supplies_data');//
    Route::match(['get','post'],'user/supplies_data_add/{iduser}',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_add'])->name('user.supplies_data_add');//
    Route::match(['get','post'],'user/supplies_data_save',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_save'])->name('user.supplies_data_save');//
    Route::get('user/supplies_data_edit/{iduser}/{id}',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_edit'])->name('user.supplies_data_edit');//

    // Route::get('staff/staff_member_edit/{id}',[App\Http\Controllers\UsersuppliesController::class, 'staff_member_edit'])->name('staff.staff_member_edit');//

    Route::match(['get','post'],'user/supplies_data_update',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_update'])->name('user.supplies_data_update');//
    Route::match(['get','post'],'user/supplies_data_add_sub/{iduser}/{idrep}',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_add_sub'])->name('user.supplies_data_add_sub');//
    Route::match(['get','post'],'user/supplies_data_add_subsave',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_add_subsave'])->name('user.supplies_data_add_subsave');//
    Route::match(['get','post'],'user/supplies_data_add_subupdate',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_add_subupdate'])->name('user.supplies_data_add_subupdate');//

    Route::delete('/user/supplies_data_add_destroy/{id}',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_add_destroy'])->name('user.supplies_data_add_destroy');//
    Route::delete('/user/supplies_data_add_subdestroy/{id}',[App\Http\Controllers\UsersuppliesController::class, 'supplies_data_add_subdestroy'])->name('user.supplies_data_add_subdestroy');//

    // ***************** คลังวัสดุ ผู้ใช้งานทั่วไป***************************
    Route::match(['get','post'],'user/warehouse_dashboard/{iduser}',[App\Http\Controllers\UserwarehouseController::class, 'warehouse_dashboard'])->name('user.warehouse_dashboard');//
    Route::match(['get','post'],'user/warehouse_deb_sub_sub/{iduser}',[App\Http\Controllers\UserwarehouseController::class, 'warehouse_deb_sub_sub'])->name('user.warehouse_deb_sub_sub');//
    Route::match(['get','post'],'user/warehouse_main_request/{iduser}',[App\Http\Controllers\UserwarehouseController::class, 'warehouse_main_request'])->name('user.warehouse_main_request');//

    Route::match(['get','post'],'user_ware/warehouse_stock_sub',[App\Http\Controllers\UserwarehouseController::class, 'warehouse_stock_sub'])->name('user_ware.warehouse_stock_sub');//
    Route::match(['get','post'],'user_ware/warehouse_stock_main',[App\Http\Controllers\UserwarehouseController::class, 'warehouse_stock_main'])->name('user_ware.warehouse_stock_main');//
    Route::match(['get','post'],'user_ware/warehouse_stock_sub_add/{id}',[App\Http\Controllers\UserwarehouseController::class, 'warehouse_stock_sub_add'])->name('user_ware.warehouse_stock_sub_add');//
    Route::match(['get','post'],'user_ware/warehouse_stock_subbillsave',[App\Http\Controllers\UserwarehouseController::class, 'warehouse_stock_subbillsave'])->name('user_ware.warehouse_stock_subbillsave');//

    Route::match(['get','post'],'user_ware/warehouse_stock_subsave',[App\Http\Controllers\UserwarehouseController::class, 'warehouse_stock_subsave'])->name('user_ware.warehouse_stock_subsave');//
    Route::get('user_ware/checkunituser',[App\Http\Controllers\UserwarehouseController::class, 'checkunituser'])->name('user_ware.checkunituser');//
    Route::get('user_ware/getdetailselect',[App\Http\Controllers\UserwarehouseController::class, 'getdetailselect'])->name('user_ware.getdetailselect');//
    Route::get('user_ware/selectsupreq',[App\Http\Controllers\UserwarehouseController::class, 'selectsupreq'])->name('user_ware.selectsupreq');//
    Route::get('user_ware/selectsupunitname',[App\Http\Controllers\UserwarehouseController::class, 'selectsupunitname'])->name('user_ware.selectsupunitname');//







 //***************** ยานพาหนะ รถทั่วไป ผู้ดูแล**************************
    Route::match(['get','post'],'car/car_narmal_calenda',[App\Http\Controllers\CarController::class, 'car_narmal_calenda'])->name('car.car_narmal_calenda');//รถทั่วไป Calenda


    Route::match(['get','post'],'car/car_narmal_calenda_add/{id}',[App\Http\Controllers\CarController::class, 'car_narmal_calenda_add'])->name('car.car_narmal_calenda_add');//รถทั่วไป Calenda
    Route::match(['get','post'],'car/car_narmal_index',[App\Http\Controllers\CarController::class, 'car_narmal_index'])->name('car.car_narmal_index');//รถทั่วไป
    Route::match(['get','post'],'car/car_narmal_updatecancel/{id}',[App\Http\Controllers\CarController::class, 'car_narmal_updatecancel'])->name('car.car_narmal_updatecancel');//
    Route::match(['get','post'],'car/car_narmal_editallocate/{id}',[App\Http\Controllers\CarController::class, 'car_narmal_editallocate'])->name('car.car_narmal_editallocate');//จัดสรร
    Route::match(['get','post'],'car/car_narmal_report',[App\Http\Controllers\CarController::class, 'car_narmal_report'])->name('car.car_narmal_report');//รถทั่วไป report
    Route::match(['get','post'],'car/car_narmal_allocate',[App\Http\Controllers\CarController::class, 'car_narmal_allocate'])->name('car.car_narmal_allocate');//

 // ***************** ข้อมูลยานพาหนะ ***************************
    Route::match(['get','post'],'car/car_data_index',[App\Http\Controllers\CarController::class, 'car_data_index'])->name('car.car_data_index');//ข้อมูลยานพาหนะ
    Route::match(['get','post'],'car/car_data_indexsearch',[App\Http\Controllers\CarController::class, 'car_data_indexsearch'])->name('car.car_data_indexsearch');//ข้อมูลยานพาหนะ
    Route::match(['get','post'],'car/car_data_index_add',[App\Http\Controllers\CarController::class, 'car_data_index_add'])->name('car.car_data_index_add');//เพิ่มข้อมูลยานพาหนะ
    Route::match(['get','post'],'car/car_data_index_save',[App\Http\Controllers\CarController::class, 'car_data_index_save'])->name('car.car_data_index_save');//บันทึกข้อมูลยานพาหนะ
    Route::match(['get','post'],'car/car_data_index_edit/{id}',[App\Http\Controllers\CarController::class, 'car_data_index_edit'])->name('car.car_data_index_edit');//แก้ไขข้อมูลยานพาหนะ
    Route::match(['get','post'],'car/car_data_index_update',[App\Http\Controllers\CarController::class, 'car_data_index_update'])->name('car.car_data_index_update');//อัพเดทข้อมูลยานพาหนะ
    Route::delete('car/car_destroy/{id}',[App\Http\Controllers\CarController::class, 'car_destroy'])->name('car.car_destroy');//ลบข้อมูลยานพาหนะ

    Route::get('car/add_cartype',[App\Http\Controllers\CarController::class, 'add_cartype'])->name('car.add_cartype');//  เพิ่มประเภทยานพาหนะ
    Route::get('car/add_carbrand',[App\Http\Controllers\CarController::class, 'add_carbrand'])->name('car.add_carbrand');//  เพิ่มยี่ห้อยานพาหนะ
    Route::get('car/add_carcolor',[App\Http\Controllers\CarController::class, 'add_carcolor'])->name('car.add_carcolor');//  เพิ่มสียานพาหนะ
    Route::post('car/adddrive',[App\Http\Controllers\CarController::class, 'adddrive'])->name('car.adddrive');//  เพิ่มคนขับ

    // ***************** ยานพาหนะ พยาบาล***************************
    Route::match(['get','post'],'car/car_ambulance',[App\Http\Controllers\CarController::class, 'car_ambulance'])->name('car.car_ambulance');//พยาบาล
    Route::match(['get','post'],'car/car_ambulancesearch',[App\Http\Controllers\CarController::class, 'car_ambulancesearch'])->name('car.car_ambulancesearch');//พยาบาล
    // ***************** ยานพาหนะ Report***************************
    Route::match(['get','post'],'car/car_report',[App\Http\Controllers\CarController::class, 'car_report'])->name('car.car_report');//Report

    // ***************** ห้องประชุม ผู้ดูแล***************************
    Route::match(['get','post'],'meetting/meettingroom_dashboard',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_dashboard'])->name('meetting.meettingroom_dashboard');//ห้องประชุม
    Route::match(['get','post'],'meetting/meettingroom_index',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_index'])->name('meetting.meettingroom_index');//ห้องประชุม
    Route::match(['get','post'],'meetting/meettingroom_index_save',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_index_save'])->name('meetting.meettingroom_index_save');//ห้องประชุม
    Route::match(['get','post'],'meetting/meettingroom_index_edit/{id}',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_index_edit'])->name('meetting.meettingroom_index_edit');//แก้ไข
    Route::match(['get','post'],'meetting/meettingroom_index_tool/{id}',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_index_tool'])->name('meetting.meettingroom_index_tool');//เพิ่มอุปกรณ์
    Route::match(['get','post'],'meetting/meettingroom_index_toolsave',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_index_toolsave'])->name('meetting.meettingroom_index_toolsave');//เพิ่มอุปกรณ์
    Route::delete('/meetting/room_listdestroy/{id}',[App\Http\Controllers\MeettingroomController::class, 'room_listdestroy'])->name('meetting.room_listdestroy');//ลบข้อมูล

    Route::match(['get','post'],'meetting/meettingroom_add',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_add'])->name('meetting.meettingroom_add');//ห้องประชุม

    Route::match(['get','post'],'meetting/meettingroom_check',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_check'])->name('meetting.meettingroom_check');//ห้องประชุม
    Route::match(['get','post'],'meetting/meettingroom_check_search',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_check_search'])->name('meetting.meettingroom_check_search');//ห้องประชุม
    Route::match(['get','post'],'meetting/meettingroom_check_allow/{id}',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_check_allow'])->name('meetting.meettingroom_check_allow');//ตรวจสอบ
    Route::match(['get','post'],'meetting/meettingroom_check_allow_update',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_check_allow_update'])->name('meetting.meettingroom_check_allow_update');//ตรวจสอบ
    Route::match(['get','post'],'meetting/meettingroom_check_searce',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_check_searce'])->name('meetting.meettingroom_check_searce');//ตรวจสอบ

    Route::match(['get','post'],'meetting/meettingroom_report',[App\Http\Controllers\MeettingroomController::class, 'meettingroom_report'])->name('meetting.meettingroom_report');//ห้องประชุม

 // ***************** บ้านพัก ผู้ดูแล***************************
 Route::match(['get','post'],'housing/housing_dashboard',[App\Http\Controllers\HousingController::class, 'housing_dashboard'])->name('housing.housing_dashboard');//บ้านพัก
 Route::match(['get','post'],'housing/housing_index',[App\Http\Controllers\HousingController::class, 'housing_index'])->name('housing.housing_index');//บ้านพัก รายการบ้านพัก
 Route::match(['get','post'],'housing/housing_request',[App\Http\Controllers\HousingController::class, 'housing_request'])->name('housing.housing_request');//บ้านพัก รายการขอเข้าพัก
 Route::match(['get','post'],'housing/housing_appeal',[App\Http\Controllers\HousingController::class, 'housing_appeal'])->name('housing.housing_appeal');//บ้านพัก  ร้องเรียนปัญหา
 Route::match(['get','post'],'housing/housing_report',[App\Http\Controllers\HousingController::class, 'housing_report'])->name('housing.housing_report');//บ้านพัก  รายงาน


 // ***************** คอมพิวเตอร์ ผู้ดูแล***************************
 Route::match(['get','post'],'computer/com_staff_dashboard',[App\Http\Controllers\ComputerController::class, 'com_staff_dashboard'])->name('com.com_staff_dashboard');//คอมพิวเตอร์
 Route::match(['get','post'],'computer/com_staff_calenda',[App\Http\Controllers\ComputerController::class, 'com_staff_calenda'])->name('com.com_staff_calenda');//ปฎิทินคอมพิวเตอร์
 Route::match(['get','post'],'computer/com_staff_index',[App\Http\Controllers\ComputerController::class, 'com_staff_index'])->name('com.com_staff_index');//  คอมพิวเตอร์
 Route::match(['get','post'],'computer/com_staff_index_add/{id}',[App\Http\Controllers\ComputerController::class, 'com_staff_index_add'])->name('com.com_staff_index_add');//  บันทึกคอมพิวเตอร์
 Route::match(['get','post'],'computer/com_staff_index_update',[App\Http\Controllers\ComputerController::class, 'com_staff_index_update'])->name('com.com_staff_index_update');//  บันทึกคอมพิวเตอร์
 Route::match(['get','post'],'computer/com_staff_repair',[App\Http\Controllers\ComputerController::class, 'com_staff_repair'])->name('com.com_staff_repair');// ทะเบียนซ่อมคอมพิวเตอร์
 Route::match(['get','post'],'computer/com_staff_report',[App\Http\Controllers\ComputerController::class, 'com_staff_report'])->name('com.com_staff_report');//  คอมพิวเตอร์
 Route::match(['get','post'],'computer/com_staff_cancel/{id}',[App\Http\Controllers\ComputerController::class, 'com_staff_cancel'])->name('com.com_staff_cancel');//

 Route::match(['get','post'],'computer/com_staff_print/{id}',[App\Http\Controllers\ComputerController::class, 'com_staff_print'])->name('com.com_staff_print');//
 Route::get('employee/pdf', [App\Http\Controllers\ComputerController::class, 'createPDF'])->name('bk.createPDF'); // Dompdf
 Route::get('employee/fpdi', [App\Http\Controllers\ComputerController::class, 'createFPDI'])->name('bk.createFPDI');  //Fpdi

 Route::match(['get','post'],'computer/com_index',[App\Http\Controllers\ComputerController::class, 'com_index'])->name('com.com_index');// ทะเบียนครุภัณฑ์คอมพิวเตอร์
 Route::match(['get','post'],'computer/com_tech',[App\Http\Controllers\ComputerController::class, 'com_tech'])->name('com.com_tech');// ช่างซ่อมคอมพิวเตอร์
 Route::match(['get','post'],'computer/com_tech_save',[App\Http\Controllers\ComputerController::class, 'com_tech_save'])->name('com.com_tech_save');// ช่างซ่อมคอมพิวเตอร์
 Route::delete('computer/com_techdestroy/{id}',[App\Http\Controllers\ComputerController::class, 'com_techdestroy'])->name('com.com_techdestroy');//ลบข้อมูล

 Route::match(['get','post'],'computer/com_maintenance/{id}',[App\Http\Controllers\ComputerController::class, 'com_maintenance'])->name('com.com_maintenance');// ทะเบียนครุภัณฑ์คอมพิวเตอร์
 Route::match(['get','post'],'computer/com_qrcode/{id}',[App\Http\Controllers\ComputerController::class, 'com_qrcode'])->name('com.com_qrcode');// ทะเบียนครุภัณฑ์คอมพิวเตอร์




 // ***************** แจ้งซ่อมทั่วไป ผู้ดูแล***************************
 Route::match(['get','post'],'repaire_narmal',[App\Http\Controllers\RepairnarmalController::class, 'repaire_narmal'])->name('narmal.repaire_narmal');//แจ้งซ่อมทั่วไป
 Route::match(['get','post'],'repaire_calenda',[App\Http\Controllers\RepairnarmalController::class, 'repaire_calenda'])->name('narmal.repaire_calenda');//

 Route::match(['get','post'],'repaire_tech',[App\Http\Controllers\RepairnarmalController::class, 'repaire_tech'])->name('narmal.repaire_tech');//
 Route::match(['get','post'],'repaire_techsave',[App\Http\Controllers\RepairnarmalController::class, 'repaire_techsave'])->name('narmal.repaire_techsave');//
 Route::match(['get','post'],'repaire_techedit/{id}',[App\Http\Controllers\RepairnarmalController::class, 'repaire_techedit'])->name('narmal.repaire_techedit');//
 Route::match(['get','post'],'repaire_techupdate',[App\Http\Controllers\RepairnarmalController::class, 'repaire_techupdate'])->name('narmal.repaire_techupdate');//
 Route::delete('repaire_tech_destroy/{id}',[App\Http\Controllers\RepairnarmalController::class, 'repaire_tech_destroy'])->name('narmal.repaire_tech_destroy');//

 Route::match(['get','post'],'repaire_req',[App\Http\Controllers\RepairnarmalController::class, 'repaire_req'])->name('narmal.repaire_req');//

 // ***************** เครื่องมือแพทย์ ผู้ดูแล***************************
 Route::match(['get','post'],'medical/med_dashboard',[App\Http\Controllers\MedicalController::class, 'med_dashboard'])->name('med.med_dashboard');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_dashboard_detail/{id}',[App\Http\Controllers\MedicalController::class, 'med_dashboard_detail'])->name('med.med_dashboard_detail');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_dashboard_night/{id}',[App\Http\Controllers\MedicalController::class, 'med_dashboard_night'])->name('med.med_dashboard_night');//คืนคลังเครื่องมือแพทย์
 Route::match(['get','post'],'med_dashboard_repaire/{id}',[App\Http\Controllers\MedicalController::class, 'med_dashboard_repaire'])->name('med.med_dashboard_repaire');//คืนคลังเครื่องมือแพทย์
 Route::match(['get','post'],'med_dashboard_deal/{id}',[App\Http\Controllers\MedicalController::class, 'med_dashboard_deal'])->name('med.med_dashboard_deal');//คืนคลังเครื่องมือแพทย์

 Route::match(['get','post'],'medical/med_con',[App\Http\Controllers\MedicalController::class, 'med_con'])->name('med.med_con');//เครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_consave',[App\Http\Controllers\MedicalController::class, 'med_consave'])->name('med.med_consave');//เครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_con_edit/{id}',[App\Http\Controllers\MedicalController::class, 'med_con_edit'])->name('med.med_con_edit');//เครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_con_update',[App\Http\Controllers\MedicalController::class, 'med_con_update'])->name('med.med_con_update');//เครื่องมือแพทย์
 Route::delete('med_condestroy/{id}',[App\Http\Controllers\MedicalController::class, 'med_condestroy'])->name('med.med_condestroy');//

 Route::match(['get','post'],'medical/med_calenda',[App\Http\Controllers\MedicalController::class, 'med_calenda'])->name('med.med_calenda');//
 Route::match(['get','post'],'med_calenda_detail/{id}',[App\Http\Controllers\MedicalController::class, 'med_calenda_detail'])->name('car.med_calenda_detail');//รถทั่วไป Calenda

 Route::match(['get','post'],'med_store',[App\Http\Controllers\MedicalController::class, 'med_store'])->name('med.med_store');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_store_add/{id}',[App\Http\Controllers\MedicalController::class, 'med_store_add'])->name('med.med_store_add');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_store_save',[App\Http\Controllers\MedicalController::class, 'med_store_save'])->name('med.med_store_save');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_store_update',[App\Http\Controllers\MedicalController::class, 'med_store_update'])->name('med.med_store_update');//เครื่องมือแพทย์

 Route::match(['get','post'],'med_store_rep/{id}',[App\Http\Controllers\MedicalController::class, 'med_store_rep'])->name('med.med_store_rep');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_store_repsave',[App\Http\Controllers\MedicalController::class, 'med_store_repsave'])->name('med.med_store_repsave');//เครื่องมือแพทย์

 Route::match(['get','post'],'med_store_subsave',[App\Http\Controllers\MedicalController::class, 'med_store_subsave'])->name('med.med_store_subsave');//เครื่องมือแพทย์
//  ********************************* คลัง เครื่องมือแพทย์ **********************************
 Route::match(['get','post'],'medical_stock/{id}',[App\Http\Controllers\MedicalController::class, 'medical_stock'])->name('med.medical_stock');//คลังเครื่องมือแพทย์


 //  ********************************* ยืม เครื่องมือแพทย์ **********************************
 Route::match(['get','post'],'medical_store_borrow/{id}',[App\Http\Controllers\MedicalController::class, 'medical_store_borrow'])->name('med.medical_store_borrow');//ยืมคลังเครื่องมือแพทย์



 //  ********************************* คืน เครื่องมือแพทย์ **********************************
 Route::match(['get','post'],'medical_store_night/{id}',[App\Http\Controllers\MedicalController::class, 'medical_store_night'])->name('med.medical_store_night');//คืนคลังเครื่องมือแพทย์


 Route::match(['get','post'],'med_store_subadd',[App\Http\Controllers\MedicalController::class, 'med_store_subadd'])->name('med.med_store_subadd');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_store_subsave',[App\Http\Controllers\MedicalController::class, 'med_store_subsave'])->name('med.med_store_subsave');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_store_subedit/{id}',[App\Http\Controllers\MedicalController::class, 'med_store_subedit'])->name('med.med_store_subedit');//เครื่องมือแพทย์
 Route::match(['get','post'],'med_store_subupdate',[App\Http\Controllers\MedicalController::class, 'med_store_subupdate'])->name('med.med_store_subupdate');//เครื่องมือแพทย์

 Route::match(['get','post'],'medical/med_index',[App\Http\Controllers\MedicalController::class, 'med_index'])->name('med.med_index');// ทะเบียนครุภัณฑ์เครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_add',[App\Http\Controllers\MedicalController::class, 'med_add'])->name('med.med_add');//
 Route::match(['get','post'],'medical/med_save',[App\Http\Controllers\MedicalController::class, 'med_save'])->name('med.med_save');//
 Route::match(['get','post'],'medical/med_edit/{id}',[App\Http\Controllers\MedicalController::class, 'med_edit'])->name('med.med_edit');//
 Route::match(['get','post'],'medical/med_update',[App\Http\Controllers\MedicalController::class, 'med_update'])->name('med.med_update');//

 Route::match(['get','post'],'medical/med_maintenance/{id}',[App\Http\Controllers\MedicalController::class, 'med_maintenance'])->name('med.med_maintenance');//การบำรุงรักษา

 Route::match(['get','post'],'medical/med_repair',[App\Http\Controllers\MedicalController::class, 'med_repair'])->name('med.med_repair');// ทะเบียนซ่อมเครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_report',[App\Http\Controllers\MedicalController::class, 'med_report'])->name('med.med_report');// ทะเบียนซ่อมเครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_borrow',[App\Http\Controllers\MedicalController::class, 'med_borrow'])->name('med.med_borrow');// ทะเบียนซ่อมเครื่องมือแพทย์

 Route::match(['get','post'],'medical/med_borroweditpage/{id}',[App\Http\Controllers\MedicalController::class, 'med_borroweditpage'])->name('med.med_borroweditpage');//

 Route::match(['get','post'],'medical/med_borrow_search',[App\Http\Controllers\MedicalController::class, 'med_borrow_search'])->name('med.med_borrow_search');//
 Route::match(['get','post'],'medical/med_borrowsave',[App\Http\Controllers\MedicalController::class, 'med_borrowsave'])->name('med.med_borrowsave');// ทะเบียนซ่อมเครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_borrowedit/{id}',[App\Http\Controllers\MedicalController::class, 'med_borrowedit'])->name('med.med_borrowedit');//
 Route::match(['get','post'],'medical/med_borrowedit2/{id}',[App\Http\Controllers\MedicalController::class, 'med_borrowedit2'])->name('med.med_borrowedit2');//
 Route::match(['get','post'],'medical/med_borrowupdate',[App\Http\Controllers\MedicalController::class, 'med_borrowupdate'])->name('med.med_borrowupdate');//
 Route::match(['get','post'],'medical/med_borrowDataupdate',[App\Http\Controllers\MedicalController::class, 'med_borrowDataupdate'])->name('med.med_borrowDataupdate');//
 Route::match(['get','post'],'medical/med_borrowupdate_Noalert',[App\Http\Controllers\MedicalController::class, 'med_borrowupdate_Noalert'])->name('med.med_borrowupdate_Noalert');// Update แบบไม่มี Alert
 Route::match(['get','post'],'medical/med_borrowupdate_status/{id}',[App\Http\Controllers\MedicalController::class, 'med_borrowupdate_status'])->name('med.med_borrowupdate_status');// จัดสรร
 Route::delete('med_borrowdestroy/{id}',[App\Http\Controllers\MedicalController::class, 'med_borrowdestroy'])->name('med.med_borrowdestroy');//

 Route::match(['get','post'],'medical/med_repaire/{id}',[App\Http\Controllers\MedicalController::class, 'med_repaire'])->name('med.med_repaire');// ส่งซ่อม
 Route::match(['get','post'],'medical/med_repaire_save',[App\Http\Controllers\MedicalController::class, 'med_repaire_save'])->name('med.med_repaire_save');// ส่งซ่อม

 Route::match(['get','post'],'medical/med_rep1',[App\Http\Controllers\MedicalController::class, 'med_rep1'])->name('med.med_rep1');//รายงานการยืม/การใช้เครื่องมือแพทย์ ครุภัณฑ์เครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_rep1_search',[App\Http\Controllers\MedicalController::class, 'med_rep1_search'])->name('med.med_rep1_search');//


 Route::match(['get','post'],'medical/med_rep2',[App\Http\Controllers\MedicalController::class, 'med_rep2'])->name('med.med_rep2');//รายงานการยืม/การใช้เครื่องมือแพทย์ ครุภัณฑ์เครื่องมือแพทย์
 Route::match(['get','post'],'medical/med_rep2_search',[App\Http\Controllers\MedicalController::class, 'med_rep2_search'])->name('med.med_rep2_search');//รายงานการยืม/การใช้เครื่องมือแพทย์ ครุภัณฑ์เครื่องมือแพทย์


 Route::match(['get','post'],'medical/med_rep3',[App\Http\Controllers\MedicalController::class, 'med_rep3'])->name('med.med_rep3');//รายงานการยืม/การใช้เครื่องมือแพทย์ ครุภัณฑ์เครื่องมือแพทย์


 Route::match(['get','post'],'medical/med_rep1_excel',[App\Http\Controllers\MedicalController::class, 'med_rep1_excel'])->name('med.med_rep1_excel');
 Route::match(['get','post'],'medical/med_rep2_excel',[App\Http\Controllers\MedicalController::class, 'med_rep2_excel'])->name('med.med_rep2_excel');
 Route::match(['get','post'],'medical/med_rep3_excel/{startdate}/{enddate}',[App\Http\Controllers\MedicalController::class, 'med_rep3_excel'])->name('med.med_rep3_excel');



    // ***************** หัวหน้า ***************************
    Route::match(['get','post'],'hn/hn_dashboard/{iduser}',[App\Http\Controllers\HnController::class, 'hn_dashboard'])->name('hn.hn_dashboard');//

    Route::match(['get','post'],'hn/hn_bookindex/{iduser}',[App\Http\Controllers\HnController::class, 'hn_bookindex'])->name('hn.hn_bookindex');//
    Route::match(['get','post'],'hn/hn_bookdetail/{id}',[App\Http\Controllers\HnController::class, 'hn_bookdetail'])->name('hn.hn_bookdetail');//
    Route::match(['get','post'],'hn/hn_book_send_file/{id}',[App\Http\Controllers\HnController::class, 'hn_book_send_file'])->name('hn.hn_book_send_file');//
    Route::match(['get','post'],'hn/hn_book_send_deb/{id}',[App\Http\Controllers\HnController::class, 'hn_book_send_deb'])->name('hn.hn_book_send_deb');//
    Route::match(['get','post'],'hn/hn_book_send_debsub/{id}',[App\Http\Controllers\HnController::class, 'hn_book_send_debsub'])->name('hn.hn_book_send_debsub');//
    Route::match(['get','post'],'hn/hn_book_send_debsubsub/{id}',[App\Http\Controllers\HnController::class, 'hn_book_send_debsubsub'])->name('hn.hn_book_send_debsubsub');//
    Route::match(['get','post'],'hn/hn_book_send_person/{id}',[App\Http\Controllers\HnController::class, 'hn_book_send_person'])->name('hn.hn_book_send_person');//
    Route::match(['get','post'],'hn/hn_book_send_team/{id}',[App\Http\Controllers\HnController::class, 'hn_book_send_team'])->name('hn.hn_book_send_team');//
    Route::match(['get','post'],'hn/hn_book_send_fileplus/{id}',[App\Http\Controllers\HnController::class, 'hn_book_send_fileplus'])->name('hn.hn_book_send_fileplus');//
    Route::match(['get','post'],'hn/hn_book_send_fileopen/{id}',[App\Http\Controllers\HnController::class, 'hn_book_send_fileopen'])->name('hn.hn_book_send_fileopen');//


    Route::match(['get','post'],'hn/hn_bookindex_comment/{id}/{iduser}',[App\Http\Controllers\HnController::class, 'hn_bookindex_comment'])->name('hn.hn_bookindex_comment');//
    Route::get('hn/hn_bookindex_comment_edit/{id}',[App\Http\Controllers\HnController::class, 'hn_bookindex_comment_edit'])->name('hn.hn_bookindex_comment_edit');//
    Route::match(['get','post'],'hn/hn_bookindex_comment_update',[App\Http\Controllers\HnController::class, 'hn_bookindex_comment_update'])->name('hn.hn_bookindex_comment_update');//

    Route::match(['get','post'],'hn/hn_leaveindex/{iduser}',[App\Http\Controllers\HnController::class, 'hn_leaveindex'])->name('hn.hn_leaveindex');//
    Route::match(['get','post'],'hn/hn_trainindex/{iduser}',[App\Http\Controllers\HnController::class, 'hn_trainindex'])->name('hn.hn_trainindex');//

    Route::match(['get','post'],'hn/hn_purchaseindex/{iduser}',[App\Http\Controllers\HnController::class, 'hn_purchaseindex'])->name('hn.hn_purchaseindex');//
    Route::get('/hn/hn_purchaseindex_detail/{id}',[App\Http\Controllers\HnController::class, 'hn_purchaseindex_detail'])->name('hn.hn_purchaseindex_detail');//
    Route::get('/suphn_detail/{id}',[App\Http\Controllers\HnController::class, 'suphn_detail'])->name('suphn_detail');//

    Route::get('/hn/detailappall',[App\Http\Controllers\HnController::class, 'detailappall'])->name('hn.detailappall');//
    // Route::get('general_warehouse/detailappall','WarehouseController@detailappall')->name('warehouse.detailappall');

    Route::match(['get','post'],'hn/hn_storeindex/{iduser}',[App\Http\Controllers\HnController::class, 'hn_storeindex'])->name('hn.hn_storeindex');//


    // ***************** หัวหน้ากลุ่ม ***************************

    Route::match(['get','post'],'group/group_bookindex/{iduser}',[App\Http\Controllers\GroupController::class, 'group_bookindex'])->name('group.rong_bookindex');//
    Route::match(['get','post'],'group/group_bookindex_detail/{id}/{iduser}',[App\Http\Controllers\GroupController::class, 'group_bookindex_detail'])->name('group.group_bookindex_detail');//
    Route::match(['get','post'],'group/group_bookindex_retire/{id}',[App\Http\Controllers\GroupController::class, 'group_bookindex_retire'])->name('group.group_bookindex_retire');//
    Route::match(['get','post'],'group/group_bookindex_printdetail/{id}',[App\Http\Controllers\GroupController::class, 'group_bookindex_printdetail'])->name('group.group_bookindex_printdetail');//
    Route::match(['get','post'],'group/group_leaveindex/{iduser}',[App\Http\Controllers\GroupController::class, 'group_leaveindex'])->name('group.group_leaveindex');//
    Route::match(['get','post'],'group/group_trainindex/{iduser}',[App\Http\Controllers\GroupController::class, 'group_trainindex'])->name('group.group_trainindex');//
    Route::match(['get','post'],'group/group_storeindex/{iduser}',[App\Http\Controllers\GroupController::class, 'group_storeindex'])->name('group.group_storeindex');//
    Route::match(['get','post'],'group/group_purchaseindex/{iduser}',[App\Http\Controllers\GroupController::class, 'group_purchaseindex'])->name('group.group_purchaseindex');//
    Route::post('group/bookmake_allowgroup',[App\Http\Controllers\GroupController::class, 'bookmake_allowgroup'])->name('group.bookmake_allowgroup');// หัวหน้ากลุ่ม.อนุมัติ

    // ***************** หัวหน้าบริหาร ***************************

    Route::match(['get','post'],'rong/rong_bookindex/{iduser}',[App\Http\Controllers\RongController::class, 'rong_bookindex'])->name('rong.rong_bookindex');//
    Route::match(['get','post'],'rong/rong_bookindex_detail/{id}/{iduser}',[App\Http\Controllers\RongController::class, 'rong_bookindex_detail'])->name('rong.rong_bookindex_detail');//
    Route::match(['get','post'],'rong/rong_bookindex_retire/{id}',[App\Http\Controllers\RongController::class, 'rong_bookindex_retire'])->name('rong.rong_bookindex_retire');//
    Route::match(['get','post'],'rong/rong_bookindex_retire_get/{id}',[App\Http\Controllers\RongController::class, 'rong_bookindex_retire_get'])->name('rong.rong_bookindex_retire_get');//
    Route::match(['get','post'],'rong/rong_bookindex_retire_getdom/{id}',[App\Http\Controllers\RongController::class, 'rong_bookindex_retire_getdom'])->name('rong.rong_bookindex_retire_getdom');//

    Route::match(['get','post'],'rong/rong_bookindex_printdetail/{id}',[App\Http\Controllers\RongController::class, 'rong_bookindex_printdetail'])->name('rong.rong_bookindex_printdetail');//

    Route::match(['get','post'],'rong/rong_leaveindex/{iduser}',[App\Http\Controllers\RongController::class, 'rong_leaveindex'])->name('rong.rong_leaveindex');//
    Route::match(['get','post'],'rong/rong_trainindex/{iduser}',[App\Http\Controllers\RongController::class, 'rong_trainindex'])->name('rong.rong_trainindex');//
    Route::match(['get','post'],'rong/rong_storeindex/{iduser}',[App\Http\Controllers\RongController::class, 'rong_storeindex'])->name('rong.rong_storeindex');//
    Route::match(['get','post'],'rong/rong_purchaseindex/{iduser}',[App\Http\Controllers\RongController::class, 'rong_purchaseindex'])->name('rong.rong_purchaseindex');//

    Route::post('rong/bookmake_retirerong',[App\Http\Controllers\RongController::class, 'bookmake_retirerong'])->name('rong.bookmake_retirerong');// หัวหน้าบริหาร.อนุมัติ อันเดียว
    Route::post('rong/bookmake_allowrong',[App\Http\Controllers\RongController::class, 'bookmake_allowrong'])->name('rong.bookmake_allowrong');// หัวหน้าบริหาร.อนุมัติ ทั้งหมด

       // ***************** ผู้อำนวยการ ***************************

       Route::match(['get','post'],'po/po_bookindex/{iduser}',[App\Http\Controllers\PoController::class, 'po_bookindex'])->name('po.po_bookindex');//

       Route::match(['get','post'],'po/po_bookindex_detail/{id}/{iduser}',[App\Http\Controllers\PoController::class, 'po_bookindex_detail'])->name('po.po_bookindex_detail');//
       Route::match(['get','post'],'po/po_bookindex_retire/{id}',[App\Http\Controllers\PoController::class, 'po_bookindex_retire'])->name('po.po_bookindex_retire');//
       Route::match(['get','post'],'po/po_bookindex_printdetail/{id}',[App\Http\Controllers\PoController::class, 'po_bookindex_printdetail'])->name('po.po_bookindex_printdetail');//
      //  Route::post('po/bookmake_allowpo/{iduser}',[App\Http\Controllers\PoController::class, 'bookmake_allowpo'])->name('po.bookmake_allowpo');// ผอ.อนุมัติ

      Route::post('po/bookmake_retirepo',[App\Http\Controllers\PoController::class, 'bookmake_retirepo'])->name('po.bookmake_retirepo');// ผอ.อนุมัติ อันเดียว
      Route::post('po/bookmake_allowpo',[App\Http\Controllers\PoController::class, 'bookmake_allowpo'])->name('po.bookmake_allowpo');// ผอ.อนุมัติ ทั้งหมด


      Route::match(['get','post'],'po/po_carcalenda',[App\Http\Controllers\PoController::class, 'po_carcalenda'])->name('po.po_carcalenda');//
      Route::match(['get','post'],'po/po_carcalenda_add/{id}',[App\Http\Controllers\PoController::class, 'po_carcalenda_add'])->name('po.po_carcalenda_add');//
      Route::match(['get','post'],'po/po_carcalenda_allowpo',[App\Http\Controllers\PoController::class, 'po_carcalenda_allowpo'])->name('po.po_carcalenda_allowpo');//ผอ.อนุมัติ อันเดียวหน้าปฎิทิน
      Route::match(['get','post'],'po/po_carcalenda_update_allallowpo',[App\Http\Controllers\PoController::class, 'po_carcalenda_update_allallowpo'])->name('po.po_carcalenda_update_allallowpo');//ผอ.อนุมัติ

      Route::match(['get','post'],'po/allow_all',[App\Http\Controllers\PoController::class, 'allow_all'])->name('po.allow_all');//ผอ.อนุมัติ ทั้งหมด
      Route::match(['get','post'],'po/allow_all_add/{id}',[App\Http\Controllers\PoController::class, 'allow_all_add'])->name('po.allow_all_add');//จัดการ ผอ.อนุมัติ อันเดียว 2
      Route::match(['get','post'],'po/po_carcalenda_update_allowonepo',[App\Http\Controllers\PoController::class, 'po_carcalenda_update_allowonepo'])->name('po.po_carcalenda_update_allowonepo');//ผอ.อนุมัติ อันเดียว

      Route::match(['get','post'],'po/po_meetting_calenda/{iduser}',[App\Http\Controllers\PoController::class, 'po_meetting_calenda'])->name('po.po_meetting_calenda');//


       Route::match(['get','post'],'po/po_leaveindex/{iduser}',[App\Http\Controllers\PoController::class, 'po_leaveindex'])->name('po.po_leaveindex');//
       Route::match(['get','post'],'po/po_trainindex/{iduser}',[App\Http\Controllers\PoController::class, 'po_trainindex'])->name('po.po_trainindex');//
       Route::match(['get','post'],'po/po_storeindex/{iduser}',[App\Http\Controllers\PoController::class, 'po_storeindex'])->name('po.po_storeindex');//
       Route::match(['get','post'],'po/po_purchaseindex/{iduser}',[App\Http\Controllers\PoController::class, 'po_purchaseindex'])->name('po.po_purchaseindex');//

     // ******************** ร้านค้า ***********************
    Route::match(['get','post'],'market/market_dashboard',[App\Http\Controllers\MarketController::class, 'market_dashboard'])->name('mar.market_dashboard');//
    Route::match(['get','post'],'market/market_index',[App\Http\Controllers\MarketController::class, 'market_index'])->name('mar.market_index');//
    Route::match(['get','post'],'market/market_add',[App\Http\Controllers\MarketController::class, 'market_add'])->name('mar.market_add');//
    Route::match(['get','post'],'market/market_save',[App\Http\Controllers\MarketController::class, 'market_save'])->name('mar.market_save');//
    Route::get('market/market_edit/{id}',[App\Http\Controllers\MarketController::class, 'market_edit'])->name('mar.market_edit');//
    Route::match(['get','post'],'market/market_update',[App\Http\Controllers\MarketController::class, 'market_update'])->name('mar.market_update');//
    Route::delete('market/market_destroy/{id}',[App\Http\Controllers\MarketController::class, 'market_destroy'])->name('mar.market_destroy');//

    Route::match(['get','post'],'market/product_index',[App\Http\Controllers\MarketController::class, 'product_index'])->name('mar.product_index');//
    Route::match(['get','post'],'market/product_add',[App\Http\Controllers\MarketController::class, 'product_add'])->name('mar.product_add');//
    Route::match(['get','post'],'market/product_save',[App\Http\Controllers\MarketController::class, 'product_save'])->name('mar.product_save');//
    Route::get('market/product_edit/{id}',[App\Http\Controllers\MarketController::class, 'product_edit'])->name('mar.product_edit');//
    Route::match(['get','post'],'market/product_update',[App\Http\Controllers\MarketController::class, 'product_update'])->name('mar.product_update');//
    Route::delete('market/product_destroy/{id}',[App\Http\Controllers\MarketController::class, 'product_destroy'])->name('mar.product_destroy');//
    Route::get('market/addcategory',[App\Http\Controllers\MarketController::class, 'addcategory'])->name('mar.addcategory');//  เพิ่มหมวด
    Route::get('market/addvendor',[App\Http\Controllers\MarketController::class, 'addvendor'])->name('mar.addvendor');//  เพิ่มตัวแทน

    Route::match(['get','post'],'market/rep_product',[App\Http\Controllers\MarketController::class, 'rep_product'])->name('mar.rep_product');//
    Route::match(['get','post'],'market/rep_product_add',[App\Http\Controllers\MarketController::class, 'rep_product_add'])->name('mar.rep_product_add');//
    Route::match(['get','post'],'market/rep_product_save',[App\Http\Controllers\MarketController::class, 'rep_product_save'])->name('mar.rep_product_save');//
    Route::delete('market/rep_product_destroy/{id}',[App\Http\Controllers\MarketController::class, 'rep_product_destroy'])->name('mar.rep_product_destroy');//

    Route::match(['get','post'],'market/rep_product_addsub/{id}',[App\Http\Controllers\MarketController::class, 'rep_product_addsub'])->name('mar.rep_product_addsub');//
    Route::match(['get','post'],'market/rep_product_addsub_save',[App\Http\Controllers\MarketController::class, 'rep_product_addsub_save'])->name('mar.rep_product_addsub_save');//
    Route::delete('market/rep_product_addsub_destroy/{id}',[App\Http\Controllers\MarketController::class, 'rep_product_addsub_destroy'])->name('mar.rep_product_addsub_destroy');//

    Route::match(['get','post'],'market/rep_product_detail/{id}',[App\Http\Controllers\MarketController::class, 'rep_product_detail'])->name('mar.rep_product_detail');//
    Route::match(['get','post'],'market/rep_product_edit/{id}',[App\Http\Controllers\MarketController::class, 'rep_product_edit'])->name('mar.rep_product_edit');//
    Route::match(['get','post'],'market/rep_product_update',[App\Http\Controllers\MarketController::class, 'rep_product_update'])->name('mar.rep_product_update');//

     // ******************** ร้านค้า รายชื่อลูกค้า ***********************
     Route::match(['get','post'],'customer/customer',[App\Http\Controllers\MarketController::class, 'customer'])->name('cus.customer');//
     Route::match(['get','post'],'customer/customer_add',[App\Http\Controllers\MarketController::class, 'customer_add'])->name('cus.customer_add');//
     Route::match(['get','post'],'customer/customer_save',[App\Http\Controllers\MarketController::class, 'customer_save'])->name('cus.customer_save');//
     Route::get('customer/customer_edit/{id}',[App\Http\Controllers\MarketController::class, 'customer_edit'])->name('cus.customer_edit');//
     Route::match(['get','post'],'customer/customer_update',[App\Http\Controllers\MarketController::class, 'customer_update'])->name('cus.customer_update');//
     Route::delete('customer/customer_destroy/{id}',[App\Http\Controllers\MarketController::class, 'customer_destroy'])->name('cus.customer_destroy');//

       // ******************** ร้านค้า ขายสินค้า ***********************
     Route::match(['get','post'],'market/sale',[App\Http\Controllers\MarketController::class, 'sale'])->name('mar.sale');//
     Route::match(['get','post'],'market/sale_index',[App\Http\Controllers\MarketController::class, 'sale_index'])->name('mar.sale_index');//
     Route::match(['get','post'],'market/sale_add',[App\Http\Controllers\MarketController::class, 'rep_product_add'])->name('mar.sale_add');//
     Route::match(['get','post'],'market/sale_save',[App\Http\Controllers\MarketController::class, 'sale_save'])->name('mar.sale_save');//
     Route::match(['get','post'],'market/sale_savebill',[App\Http\Controllers\MarketController::class, 'sale_savebill'])->name('mar.sale_savebill');//
     Route::match(['get','post'],'market/sale_update',[App\Http\Controllers\MarketController::class, 'sale_update'])->name('mar.sale_update');//
     Route::match(['get','post'],'market/editsale_save',[App\Http\Controllers\MarketController::class, 'editsale_save'])->name('mar.editsale_save');//
     Route::match(['get','post'],'market/sale_updatebill',[App\Http\Controllers\MarketController::class, 'sale_updatebill'])->name('mar.sale_updatebill');//
     Route::match(['get','post'],'market/sale_edit/{id}',[App\Http\Controllers\MarketController::class, 'sale_edit'])->name('mar.sale_edit');//
     Route::delete('market/sale_destroy/{id}',[App\Http\Controllers\MarketController::class, 'sale_destroy'])->name('mar.sale_destroy');//
     Route::delete('market/bill_destroy/{id}',[App\Http\Controllers\MarketController::class, 'bill_destroy'])->name('mar.bill_destroy');//


    // ******************** PKClaim ***********************
    Route::match(['get','post'],'pkclaim/pkclaim_info',[App\Http\Controllers\PkclaimController::class, 'pkclaim_info'])->name('claim.pkclaim_info');// PKClaim
    Route::match(['get','post'],'bk_getbar',[App\Http\Controllers\PkclaimController::class, 'bk_getbar'])->name('claim.bk_getbar');// get ค่า ajax bar
    Route::match(['get','post'],'bk_getline',[App\Http\Controllers\PkclaimController::class, 'bk_getline'])->name('claim.bk_getline');// get ค่า ajax line
    Route::match(['get','post'],'sss_in',[App\Http\Controllers\SssController::class, 'sss_in'])->name('claim.sss_in');//
    Route::match(['get','post'],'pkclaim/pkclaim_sss',[App\Http\Controllers\PkclaimController::class, 'pkclaim_sss'])->name('claim.pkclaim_sss');//

    Route::match(['get','post'],'fs_eclaim',[App\Http\Controllers\PkclaimController::class, 'fs_eclaim'])->name('claim.fs_eclaim');// PKClaim
    Route::match(['get','post'],'fs_eclaim_inhos/{income}',[App\Http\Controllers\PkclaimController::class, 'fs_eclaim_inhos'])->name('claim.fs_eclaim_inhos');// PKClaim
    Route::match(['get','post'],'fs_eclaim_instu/{income}',[App\Http\Controllers\PkclaimController::class, 'fs_eclaim_instu'])->name('claim.fs_eclaim_instu');// PKClaim
    Route::match(['get','post'],'fs_eclaim_instu_eclaim/{income}',[App\Http\Controllers\PkclaimController::class, 'fs_eclaim_instu_eclaim'])->name('claim.fs_eclaim_instu_eclaim');// PKClaim
    Route::match(['get','post'],'fs_eclaim_editable',[App\Http\Controllers\PkclaimController::class, 'fs_eclaim_editable'])->name('claim.fs_eclaim_editable');// PKClaim

    // ******************** PKClaim Report ***********************
    Route::match(['get','post'],'report_op',[App\Http\Controllers\ReportController::class, 'report_op'])->name('report.report_op');//
    Route::match(['get','post'],'report_op_getline',[App\Http\Controllers\ReportController::class, 'report_op_getline'])->name('rep.report_op_getline');// get ค่า ajax line
    Route::match(['get','post'],'report_op_getbar',[App\Http\Controllers\ReportController::class, 'report_op_getbar'])->name('rep.report_op_getbar');// get ค่า ajax
    Route::match(['get','post'],'report_ods_hsoft',[App\Http\Controllers\ReportController::class, 'report_ods_hsoft'])->name('report.report_ods_hsoft');//
    Route::match(['get','post'],'report_ipd',[App\Http\Controllers\ReportController::class, 'report_ipd'])->name('report.report_ipd');//
    Route::match(['get','post'],'report_ipd_getbar',[App\Http\Controllers\ReportController::class, 'report_ipd_getbar'])->name('rep.report_ipd_getbar');// get ค่า ajax
    Route::match(['get','post'],'report_opd_ofc',[App\Http\Controllers\ReportController::class, 'report_opd_ofc'])->name('report.report_opd_ofc');//
    Route::match(['get','post'],'report_opd_ofc_getbar',[App\Http\Controllers\ReportController::class, 'report_opd_ofc_getbar'])->name('rep.report_opd_ofc_getbar');// get ค่า ajax
    Route::match(['get','post'],'report_ipd_ofc',[App\Http\Controllers\ReportController::class, 'report_ipd_ofc'])->name('report.report_ipd_ofc');//
    Route::match(['get','post'],'report_ipd_ofc_getbar',[App\Http\Controllers\ReportController::class, 'report_ipd_ofc_getbar'])->name('rep.report_ipd_ofc_getbar');// get ค่า ajax



     // ******************** PKClaim Report REFER CAR***********************
     Route::match(['get','post'],'report_refer_main',[App\Http\Controllers\ReportController::class, 'report_refer_main'])->name('report.report_refer_main');//
     Route::match(['get','post'],'report_refer_main_repback',[App\Http\Controllers\ReportController::class, 'report_refer_main_repback'])->name('report.report_refer_main_repback');// การลงข้อมูลรับกลับ
     Route::match(['get','post'],'report_refer_main_rep',[App\Http\Controllers\ReportController::class, 'report_refer_main_rep'])->name('report.report_refer_main_rep');// การลงข้อมูลรับ
     Route::match(['get','post'],'report_refer_mainsub_opd/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_opd'])->name('report.report_refer_mainsub_opd');//
     Route::match(['get','post'],'report_refer_mainsub_ipd2/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_ipd2'])->name('report.report_refer_mainsub_ipd2');//
     Route::match(['get','post'],'report_refer_mainsub_ipd3/{day}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_ipd3'])->name('report.report_refer_mainsub_ipd3');//
     Route::match(['get','post'],'report_refer_mainsub_imcstork/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_imcstork'])->name('report.report_refer_mainsub_imcstork');//
     Route::match(['get','post'],'report_refer_mainsub_imcbrain/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_imcbrain'])->name('report.report_refer_mainsub_imcbrain');//
     Route::match(['get','post'],'report_refer_mainsub_imcinjury/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_imcinjury'])->name('report.report_refer_mainsub_imcinjury');//

     Route::match(['get','post'],'report_ipopd',[App\Http\Controllers\ReportController::class, 'report_ipopd'])->name('report.report_ipopd');//
     Route::match(['get','post'],'report_refer_main_ipopd_search ',[App\Http\Controllers\ReportController::class, 'report_refer_main_ipopd_search'])->name('report.report_refer_main_ipopd_search');//
     Route::match(['get','post'],'report_refer_out',[App\Http\Controllers\ReportController::class, 'report_refer_out'])->name('report.report_refer_out');//
     Route::match(['get','post'],'report_refer_outs',[App\Http\Controllers\ReportController::class, 'report_refer_outs'])->name('report.report_refer_outs');//
     Route::match(['get','post'],'report_refer_outipd',[App\Http\Controllers\ReportController::class, 'report_refer_outipd'])->name('report.report_refer_outipd');//
     Route::match(['get','post'],'report_refer_outopd',[App\Http\Controllers\ReportController::class, 'report_refer_outopd'])->name('report.report_refer_outopd');//
     Route::match(['get','post'],'report_refer_outmonth',[App\Http\Controllers\ReportController::class, 'report_refer_outmonth'])->name('report.report_refer_outmonth');//

     Route::match(['get','post'],'report_refer_opd/{years}',[App\Http\Controllers\ReportController::class, 'report_refer_opd'])->name('report.report_refer_opd');//
     Route::match(['get','post'],'report_refer_opdrep/{doc}',[App\Http\Controllers\ReportController::class, 'report_refer_opdrep'])->name('report.report_refer_opdrep');//
     Route::match(['get','post'],'report_refer_opdrep_sub/{hosname}/{doc}',[App\Http\Controllers\ReportController::class, 'report_refer_opdrep_sub'])->name('report.report_refer_opdrep_sub');//
     Route::match(['get','post'],'report_refer_opdrep_subsub/{vn}',[App\Http\Controllers\ReportController::class, 'report_refer_opdrep_subsub'])->name('report.report_refer_opdrep_subsub');//
     Route::match(['get','post'],'report_refer_opdrep_subsubtotal/{vn}',[App\Http\Controllers\ReportController::class, 'report_refer_opdrep_subsubtotal'])->name('report.report_refer_opdrep_subsubtotal');//
     Route::match(['get','post'],'report_refer_opdrep_subsubtran/{tran_id}',[App\Http\Controllers\ReportController::class, 'report_refer_opdrep_subsubtran'])->name('report.report_refer_opdrep_subsubtran');//


    //  รายงานการลงข้อมูลรับกลับ Refer IPD
     Route::match(['get','post'],'report_refer_mainsub_checkopd/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_checkopd'])->name('report.report_refer_mainsub_checkopd');// จำนวนผู้ป่วย OPD (ครั้ง)
     Route::match(['get','post'],'report_refer_mainsub_checkipd/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_checkipd'])->name('report.report_refer_mainsub_checkipd');// จำนวนผู้ป่วย IPD (ครั้ง)
     Route::match(['get','post'],'report_refer_mainsub_checkimcstork/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_checkimcstork'])->name('report.report_refer_mainsub_checkimcstork');// จำนวนผู้ป่วย IPD (ครั้ง)
     Route::match(['get','post'],'report_refer_mainsub_checkimcbrain/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_checkimcbrain'])->name('report.report_refer_mainsub_checkimcbrain');// จำนวนผู้ป่วย IPD (ครั้ง)
     Route::match(['get','post'],'report_refer_mainsub_checkinjury/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_checkinjury'])->name('report.report_refer_mainsub_checkinjury');// จำนวนผู้ป่วย IPD (ครั้ง)

     Route::match(['get','post'],'report_refer_mainsub_rep_opd/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_rep_opd'])->name('report.report_refer_mainsub_rep_opd');// จำนวนผู้ป่วย OPD (ครั้ง)
     Route::match(['get','post'],'report_refer_mainsub_rep_ipd/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_rep_ipd'])->name('report.report_refer_mainsub_rep_ipd');//
     Route::match(['get','post'],'report_refer_mainsub_rep_imcstork/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_rep_imcstork'])->name('report.report_refer_mainsub_rep_imcstork');//
     Route::match(['get','post'],'report_refer_mainsub_rep_imcbrain/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_rep_imcbrain'])->name('report.report_refer_mainsub_rep_imcbrain');//
     Route::match(['get','post'],'report_refer_mainsub_rep_imcinjury/{year}/{month}',[App\Http\Controllers\ReportController::class, 'report_refer_mainsub_rep_imcinjury'])->name('report.report_refer_mainsub_rep_imcinjury');//


     Route::match(['get','post'],'report_refer_main_search',[App\Http\Controllers\ReportController::class, 'report_refer_main_search'])->name('report.report_refer_main_search');//
     Route::match(['get','post'],'report_refer_2561',[App\Http\Controllers\ReportController::class, 'report_refer_2561'])->name('report.report_refer_2561');//
     Route::match(['get','post'],'report_refer_2562',[App\Http\Controllers\ReportController::class, 'report_refer_2562'])->name('report.report_refer_2562');//
     Route::match(['get','post'],'report_refer_2563',[App\Http\Controllers\ReportController::class, 'report_refer_2563'])->name('report.report_refer_2563');//
     Route::match(['get','post'],'report_refer_2564',[App\Http\Controllers\ReportController::class, 'report_refer_2564'])->name('report.report_refer_2564');//
     Route::match(['get','post'],'report_refer_2565',[App\Http\Controllers\ReportController::class, 'report_refer_2565'])->name('report.report_refer_2565');//
     Route::match(['get','post'],'report_report_refer_getline',[App\Http\Controllers\ReportController::class, 'report_report_refer_getline'])->name('rep.report_report_refer_getline');// get ค่า ajax line


 // ************************************************* งานประกัน   *****************************************************************
     // **************************** Karn ***********************
     Route::match(['get','post'],'karn_main',[App\Http\Controllers\karnController::class, 'karn_main'])->name('k.karn_main');//
     Route::match(['get','post'],'karn_main_sss',[App\Http\Controllers\karnController::class, 'karn_main_sss'])->name('k.karn_main_sss');//
     Route::match(['get','post'],'karn_main_sss_detail/{an}',[App\Http\Controllers\karnController::class, 'karn_main_sss_detail'])->name('k.karn_main_sss_detail');//
     Route::match(['get','post'],'karn_sss_309',[App\Http\Controllers\karnController::class, 'karn_sss_309'])->name('k.karn_sss_309');//


     Route::match(['get','post'],'opd_chai',[App\Http\Controllers\SssController::class, 'opd_chai'])->name('sss.opd_chai');//
     Route::match(['get','post'],'opd_chai_hn/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'opd_chai_hn'])->name('sss.opd_chai_hn');//
     Route::match(['get','post'],'opd_chai_vn/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'opd_chai_vn'])->name('sss.opd_chai_vn');//
     Route::match(['get','post'],'opd_chai_rep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'opd_chai_rep'])->name('sss.opd_chai_rep');//
     Route::match(['get','post'],'opd_chai_norep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'opd_chai_norep'])->name('sss.opd_chai_norep');//

     Route::match(['get','post'],'opd_chai_list',[App\Http\Controllers\SssController::class, 'opd_chai_list'])->name('sss.opd_chai_list');//
     Route::match(['get','post'],'opd_chai_listvn/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'opd_chai_listvn'])->name('sss.opd_chai_listvn');//
     Route::match(['get','post'],'opd_chai_listrep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'opd_chai_listrep'])->name('sss.opd_chai_listrep');//

     Route::match(['get','post'],'ipd_chai',[App\Http\Controllers\SssController::class, 'ipd_chai'])->name('sss.ipd_chai');//
     Route::match(['get','post'],'ipd_chai_an/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'ipd_chai_an'])->name('sss.ipd_chai_an');//
     Route::match(['get','post'],'ipd_chai_rep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'ipd_chai_rep'])->name('sss.ipd_chai_rep');//
     Route::match(['get','post'],'ipd_chai_norep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'ipd_chai_norep'])->name('sss.ipd_chai_norep');//

     Route::match(['get','post'],'opd_outlocate',[App\Http\Controllers\SssController::class, 'opd_outlocate'])->name('sss.opd_outlocate');//
     Route::match(['get','post'],'opd_outlocate_sub/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'opd_outlocate_sub'])->name('sss.opd_outlocate_sub');//
     Route::match(['get','post'],'opd_outlocate_subrep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class,'opd_outlocate_subrep'])->name('sss.opd_outlocate_subrep');//
     Route::match(['get','post'],'opd_outlocate_subnorep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class,'opd_outlocate_subnorep'])->name('sss.opd_outlocate_subnorep');//
     Route::match(['get','post'],'opd_outlocate_keyrep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class,'opd_outlocate_keyrep'])->name('sss.opd_outlocate_keyrep');//
     Route::match(['get','post'],'opd_outlocate_tupol/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class,'opd_outlocate_tupol'])->name('sss.opd_outlocate_tupol');//
     Route::match(['get','post'],'opd_outlocate_tupolkey/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class,'opd_outlocate_tupolkey'])->name('sss.opd_outlocate_tupolkey');//
     Route::match(['get','post'],'opd_outlocate_total/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class,'opd_outlocate_total'])->name('sss.opd_outlocate_total');//




    Route::match(['get','post'],'ipd_outlocate',[App\Http\Controllers\SssController::class, 'ipd_outlocate'])->name('sss.ipd_outlocate');//
    Route::match(['get','post'],'ipd_outlocate_sub/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class, 'ipd_outlocate_sub'])->name('sss.ipd_outlocate_sub');//
    Route::match(['get','post'],'ipd_outlocate_pdx/{an}',[App\Http\Controllers\SssController::class, 'ipd_outlocate_pdx'])->name('sss.ipd_outlocate_pdx');//
    Route::match(['get','post'],'ipd_outlocate_income/{an}',[App\Http\Controllers\SssController::class, 'ipd_outlocate_income'])->name('sss.ipd_outlocate_income');//
    Route::match(['get','post'],'ipd_outlocate_subrep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class,'ipd_outlocate_subrep'])->name('sss.ipd_outlocate_subrep');//
    Route::match(['get','post'],'ipd_outlocate_subnorep/{months}/{startdate}/{enddate}',[App\Http\Controllers\SssController::class,'ipd_outlocate_subnorep'])->name('sss.ipd_outlocate_subnorep');//

     Route::match(['get','post'],'eclaim_check',[App\Http\Controllers\EclaimController::class,'eclaim_check'])->name('claim.eclaim_check');//
     Route::match(['get','post'],'eclaim_check_update',[App\Http\Controllers\EclaimController::class,'eclaim_check_update'])->name('claim.eclaim_check_update');//
     Route::match(['get','post'],'eclaim_check_edit/{id}',[App\Http\Controllers\EclaimController::class,'eclaim_check_edit'])->name('claim.eclaim_check_edit');//

     Route::match(['get','post'],'prb_opd',[App\Http\Controllers\PrbController::class,'prb_opd'])->name('prb.prb_opd');//
     Route::match(['get','post'],'prb_opd_sub/{vn}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_opd_sub'])->name('prb.prb_opd_sub');//
     Route::match(['get','post'],'prb_opd_subsub/{day}/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_opd_subsub'])->name('prb.prb_opd_subsub');//

     Route::match(['get','post'],'prb_ipd',[App\Http\Controllers\PrbController::class,'prb_ipd'])->name('prb.prb_ipd');//
     Route::match(['get','post'],'prb_ipd_sub/{an}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_ipd_sub'])->name('prb.prb_ipd_sub');//
     Route::match(['get','post'],'prb_ipd_subsub/{day}/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_ipd_subsub'])->name('prb.prb_ipd_subsub');//

     Route::match(['get','post'],'prb_cpo',[App\Http\Controllers\PrbController::class,'prb_cpo'])->name('prb.prb_cpo');//
     Route::match(['get','post'],'prb_repopd',[App\Http\Controllers\PrbController::class,'prb_repopd'])->name('prb.prb_repopd');//
     Route::match(['get','post'],'prb_repopd_subhn/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repopd_subhn'])->name('prb.prb_repopd_subhn');//
     Route::match(['get','post'],'prb_repopd_subvn/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repopd_subvn'])->name('prb.prb_repopd_subvn');//
     Route::match(['get','post'],'prb_repopd_subsubvn/{vn}',[App\Http\Controllers\PrbController::class,'prb_repopd_subsubvn'])->name('prb.prb_repopd_subsubvn');//
     Route::match(['get','post'],'prb_repopd_subreq/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repopd_subreq'])->name('prb.prb_repopd_subreq');//
     Route::match(['get','post'],'prb_repopd_subnoreq/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repopd_subnoreq'])->name('prb.prb_repopd_subnoreq');//

     Route::match(['get','post'],'prb_repipd',[App\Http\Controllers\PrbController::class,'prb_repipd'])->name('prb.prb_repipd');//
     Route::match(['get','post'],'prb_repipd_subhn/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipd_subhn'])->name('prb.prb_repipd_subhn');//
     Route::match(['get','post'],'prb_repipd_subvn/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipd_subvn'])->name('prb.prb_repipd_subvn');//
     Route::match(['get','post'],'prb_repipd_subsuban/{an}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipd_subsuban'])->name('prb.prb_repipd_subsuban');//
     Route::match(['get','post'],'prb_repipd_subreq/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipd_subreq'])->name('prb.prb_repipd_subreq');//
     Route::match(['get','post'],'prb_repipd_subnoreq/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipd_subnoreq'])->name('prb.prb_repipd_subnoreq');//

     Route::match(['get','post'],'prb_repipd_subsuban_print/{an}',[App\Http\Controllers\PrbController::class,'prb_repipd_subsuban_print'])->name('prb.prb_repipd_subsuban_print');//

     Route::match(['get','post'],'prb_repipdpay',[App\Http\Controllers\PrbController::class,'prb_repipdpay'])->name('prb.prb_repipdpay');//
     Route::match(['get','post'],'prb_repipdpay_subhn/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipdpay_subhn'])->name('prb.prb_repipdpay_subhn');//
     Route::match(['get','post'],'prb_repipdpay_suban/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipdpay_suban'])->name('prb.prb_repipdpay_suban');//
     Route::match(['get','post'],'prb_repipdpay_suban_amount/{an}',[App\Http\Controllers\PrbController::class,'prb_repipdpay_suban_amount'])->name('prb.prb_repipdpay_suban_amount');//

     Route::match(['get','post'],'prb_repipdpay_subreq/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipdpay_subreq'])->name('prb.prb_repipdpay_subreq');//
     Route::match(['get','post'],'prb_repipdpay_subnoreq/{months}/{startdate}/{enddate}',[App\Http\Controllers\PrbController::class,'prb_repipdpay_subnoreq'])->name('prb.prb_repipdpay_subnoreq');//


     Route::match(['get','post'],'prb_repipdover',[App\Http\Controllers\PrbController::class,'prb_repipdover'])->name('prb.prb_repipdover');//

     Route::match(['get','post'],'request_report',[App\Http\Controllers\PrbController::class,'request_report'])->name('rep.request_report');//
     Route::match(['get','post'],'request_report_save',[App\Http\Controllers\PrbController::class,'request_report_save'])->name('rep.request_report_save');//
     Route::match(['get','post'],'request_report_edit/{id}',[App\Http\Controllers\PrbController::class,'request_report_edit'])->name('rep.request_report_edit');//
     Route::match(['get','post'],'request_report_update',[App\Http\Controllers\PrbController::class,'request_report_update'])->name('rep.request_report_update');//

     Route::match(['get','post'],'recieve/{id}',[App\Http\Controllers\PrbController::class,'recieve'])->name('rep.recieve');// รับเรื่อง
     Route::match(['get','post'],'inprogress/{id}',[App\Http\Controllers\PrbController::class,'inprogress'])->name('rep.inprogress');//
     Route::match(['get','post'],'submitwork/{id}',[App\Http\Controllers\PrbController::class,'submitwork'])->name('rep.submitwork');//

 
    // **************************** บัญชี ***********************

    Route::match(['get','post'],'account_pk',[App\Http\Controllers\AccountPKController::class, 'account_pk'])->name('acc.account_pk');//
    Route::match(['get','post'],'account_pksave',[App\Http\Controllers\AccountPKController::class, 'account_pksave'])->name('acc.account_pksave');//
    Route::match(['get','post'],'account_pkCheck_sit',[App\Http\Controllers\AccountPKController::class, 'account_pkCheck_sit'])->name('acc.account_pkCheck_sit');//
    Route::match(['get','post'],'account_pkCheck_sitipd',[App\Http\Controllers\AccountPKController::class, 'account_pkCheck_sitipd'])->name('acc.account_pkCheck_sitipd');//

    Route::match(['get','post'],'account_pk_debtor',[App\Http\Controllers\AccountPKController::class, 'account_pk_debtor'])->name('acc.account_pk_debtor');//  stamp OPD
    Route::match(['get','post'],'acc_debtor_send',[App\Http\Controllers\AccountPKController::class, 'acc_debtor_send'])->name('acc.acc_debtor_send');//  Send

    Route::match(['get','post'],'account_pkucs',[App\Http\Controllers\AccountPKController::class, 'account_pkucs'])->name('acc.account_pkucs');//

    Route::match(['get','post'],'account_pkofc401_dash',[App\Http\Controllers\AccountPKController::class, 'account_pkofc401_dash'])->name('acc.account_pkofc401_dash');//
    Route::match(['get','post'],'account_pkofc401/{id}',[App\Http\Controllers\AccountPKController::class, 'account_pkofc401'])->name('acc.account_pkofc401');//

    Route::match(['get','post'],'account_pkofc402_dash',[App\Http\Controllers\AccountPKController::class, 'account_pkofc402_dash'])->name('acc.account_pkofc402_dash');//
    Route::match(['get','post'],'account_pkofc402',[App\Http\Controllers\AccountPKController::class, 'account_pkofc402'])->name('acc.account_pkofc402');//
    Route::match(['get','post'],'account_pksss',[App\Http\Controllers\AccountPKController::class, 'account_pksss'])->name('acc.account_pksss');//

    // Route::match(['get','post'],'account_pklgo801',[App\Http\Controllers\AccountPKController::class, 'account_pklgo801'])->name('acc.account_pklgo801');//
    Route::match(['get','post'],'account_pklgo801/{id}',[App\Http\Controllers\AccountPKController::class, 'account_pklgo801'])->name('acc.account_pklgo801');//
    Route::match(['get','post'],'account_pklgo801_dash',[App\Http\Controllers\AccountPKController::class, 'account_pklgo801_dash'])->name('acc.account_pklgo801_dash');//
    Route::match(['get','post'],'account_pk801/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pk801'])->name('acc.account_pk801');//
    Route::match(['get','post'],'account_pk801_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pk801_stm'])->name('acc.account_pk801_stm');//

    Route::match(['get','post'],'account_pklgo802',[App\Http\Controllers\AccountPKController::class, 'account_pklgo802'])->name('acc.account_pklgo802');//
    Route::match(['get','post'],'account_pklgo803',[App\Http\Controllers\AccountPKController::class, 'account_pklgo803'])->name('acc.account_pklgo803');//
    Route::match(['get','post'],'account_pklgo804',[App\Http\Controllers\AccountPKController::class, 'account_pklgo804'])->name('acc.account_pklgo804');//

    Route::match(['get','post'],'account_pkti4011_dash',[App\Http\Controllers\AccountPKController::class, 'account_pkti4011_dash'])->name('acc.account_pkti4011_dash');//
    Route::match(['get','post'],'account_pkti4011_pull',[App\Http\Controllers\AccountPKController::class, 'account_pkti4011_pull'])->name('acc.account_pkti4011_pull');//
    Route::match(['get','post'],'account_pkti4011_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_pkti4011_pulldata'])->name('acc.account_pkti4011_pulldata');//
    Route::match(['get','post'],'account_pkti4011/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkti4011'])->name('acc.account_pkti4011');//
    Route::match(['get','post'],'account_pkti4011_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkti4011_stm'])->name('acc.account_pkti4011_stm');//
    Route::match(['get','post'],'account_pkti4011_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkti4011_stmnull'])->name('acc.account_pkti4011_stmnull');//
    Route::match(['get','post'],'account_pkti4011_stam',[App\Http\Controllers\AccountPKController::class, 'account_pkti4011_stam'])->name('acc.account_pkti4011_stam');// 

    Route::match(['get','post'],'account_pkti8011_dash',[App\Http\Controllers\AccountPKController::class, 'account_pkti8011_dash'])->name('acc.account_pkti8011_dash');//
    Route::match(['get','post'],'account_pkti8011/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkti8011'])->name('acc.account_pkti8011');//
    Route::match(['get','post'],'account_pkti8011_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkti8011_stm'])->name('acc.account_pkti8011_stm');//

    Route::match(['get','post'],'account_pkti2166_dash',[App\Http\Controllers\AccountPKController::class, 'account_pkti2166_dash'])->name('acc.account_pkti2166_dash');//
    Route::match(['get','post'],'account_pkti2166/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkti2166'])->name('acc.account_pkti2166');//
    Route::match(['get','post'],'account_pkti2166_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkti2166_stm'])->name('acc.account_pkti2166_stm');//
    Route::match(['get','post'],'account_pkti2166_stam',[App\Http\Controllers\AccountPKController::class, 'account_pkti2166_stam'])->name('acc.account_pkti2166_stam');//  stamp OPD
    Route::match(['get','post'],'account_pkti2166_stmtang/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkti2166_stmtang'])->name('acc.account_pkti2166_stmtang');//

    Route::match(['get','post'],'ti2166_send/{id}',[App\Http\Controllers\AccountPKController::class, 'ti2166_send'])->name('acc.ti2166_send');//
    Route::match(['get','post'],'ti2166_detail/{id}',[App\Http\Controllers\AccountPKController::class, 'ti2166_detail'])->name('acc.ti2166_detail');//

    Route::match(['get','post'],'upstm_ti',[App\Http\Controllers\AccountPKController::class, 'upstm_ti'])->name('acc.upstm_ti');// ไต
    Route::match(['get','post'],'upstm_ti_import',[App\Http\Controllers\AccountPKController::class, 'upstm_ti_import'])->name('acc.upstm_ti_import');// ไต
    Route::match(['get','post'],'upstm_hn',[App\Http\Controllers\AccountPKController::class, 'upstm_hn'])->name('acc.upstm_hn');// ไต

    Route::match(['get','post'],'upstm_tixml',[App\Http\Controllers\AccountPKController::class, 'upstm_tixml'])->name('acc.upstm_tixml');// ไต
    Route::match(['get','post'],'upstm_tixml_import',[App\Http\Controllers\AccountPKController::class, 'upstm_tixml_import'])->name('acc.upstm_tixml_import');// ไต

    Route::match(['get','post'],'upstm',[App\Http\Controllers\AccountPKController::class, 'upstm'])->name('acc.upstm');//
    Route::match(['get','post'],'upstm_save',[App\Http\Controllers\AccountPKController::class, 'upstm_save'])->name('acc.upstm_save');//
    Route::match(['get','post'],'upstm_import',[App\Http\Controllers\AccountPKController::class, 'upstm_import'])->name('acc.upstm_import');//

        
    Route::match(['get','post'],'account_pk_dash',[App\Http\Controllers\AccountPKController::class, 'account_pk_dash'])->name('acc.account_pk_dash');//

    Route::match(['get','post'],'account_pk_ipd',[App\Http\Controllers\AccountPKController::class, 'account_pk_ipd'])->name('acc.account_pk_ipd');//
    Route::match(['get','post'],'account_pk_ipdsave',[App\Http\Controllers\AccountPKController::class, 'account_pk_ipdsave'])->name('acc.account_pk_ipdsave');//
    Route::match(['get','post'],'account_pk_debtor_ipd',[App\Http\Controllers\AccountPKController::class, 'account_pk_debtor_ipd'])->name('acc.account_pk_debtor_ipd');//  stamp IPD

    Route::match(['get','post'],'account_pkucs202_pull',[App\Http\Controllers\AccountPKController::class, 'account_pkucs202_pull'])->name('acc.account_pkucs202_pull');//
    Route::match(['get','post'],'account_pkucs202_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_pkucs202_pulldata'])->name('acc.account_pkucs202_pulldata');//
    Route::match(['get','post'],'account_pkucs202_dash',[App\Http\Controllers\AccountPKController::class, 'account_pkucs202_dash'])->name('acc.account_pkucs202_dash');//
    Route::match(['get','post'],'account_pkucs202/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkucs202'])->name('acc.account_pkucs202');//
    Route::match(['get','post'],'account_pkucs202_detail/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkucs202_detail'])->name('acc.account_pkucs202_detail');//
    Route::match(['get','post'],'account_pkucs202_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkucs202_stm'])->name('acc.account_pkucs202_stm');//
    Route::match(['get','post'],'account_pkucs202_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkucs202_stmnull'])->name('acc.account_pkucs202_stmnull');//
    Route::match(['get','post'],'account_pkucs202_stam',[App\Http\Controllers\AccountPKController::class, 'account_pkucs202_stam'])->name('acc.account_pkucs202_stam');//  stamp IPD

    Route::match(['get','post'],'account_pkucs217_pull',[App\Http\Controllers\AccountPKController::class, 'account_pkucs217_pull'])->name('acc.account_pkucs217_pull');//
    Route::match(['get','post'],'account_pkucs217_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_pkucs217_pulldata'])->name('acc.account_pkucs217_pulldata');//
    Route::match(['get','post'],'account_pkucs217_dash',[App\Http\Controllers\AccountPKController::class, 'account_pkucs217_dash'])->name('acc.account_pkucs217_dash');//
    Route::match(['get','post'],'account_pkucs217/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkucs217'])->name('acc.account_pkucs217');//
    Route::match(['get','post'],'account_pkucs217_detail/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkucs217_detail'])->name('acc.account_pkucs217_detail');//
    Route::match(['get','post'],'account_pkucs217_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkucs217_stm'])->name('acc.account_pkucs217_stm');//
    Route::match(['get','post'],'account_pkucs217_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_pkucs217_stmnull'])->name('acc.account_pkucs217_stmnull');//
    Route::match(['get','post'],'account_pkucs217_stam',[App\Http\Controllers\AccountPKController::class, 'account_pkucs217_stam'])->name('acc.account_pkucs217_stam');//  stamp IPD

    Route::match(['get','post'],'account_304_pull',[App\Http\Controllers\AccountPKController::class, 'account_304_pull'])->name('acc.account_304_pull');//
    Route::match(['get','post'],'account_304_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_304_pulldata'])->name('acc.account_304_pulldata');//
    Route::match(['get','post'],'account_304_dash',[App\Http\Controllers\AccountPKController::class, 'account_304_dash'])->name('acc.account_304_dash');//
    Route::match(['get','post'],'account_304/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_304'])->name('acc.account_304');//
    Route::match(['get','post'],'account_304_detail/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_304_detail'])->name('acc.account_304_detail');//
    Route::match(['get','post'],'account_304_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_304_stm'])->name('acc.account_304_stm');//
    Route::match(['get','post'],'account_304_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_304_stmnull'])->name('acc.account_304_stmnull');//
    Route::match(['get','post'],'account_304_stam',[App\Http\Controllers\AccountPKController::class, 'account_304_stam'])->name('acc.account_304_stam');//  stamp IPD

    Route::match(['get','post'],'account_308_pull',[App\Http\Controllers\AccountPKController::class, 'account_308_pull'])->name('acc.account_308_pull');//
    Route::match(['get','post'],'account_308_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_308_pulldata'])->name('acc.account_308_pulldata');//
    Route::match(['get','post'],'account_308_dash',[App\Http\Controllers\AccountPKController::class, 'account_308_dash'])->name('acc.account_308_dash');//
    Route::match(['get','post'],'account_308/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_308'])->name('acc.account_308');//
    Route::match(['get','post'],'account_308_detail/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_308_detail'])->name('acc.account_308_detail');//
    Route::match(['get','post'],'account_308_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_308_stm'])->name('acc.account_308_stm');//
    Route::match(['get','post'],'account_308_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_308_stmnull'])->name('acc.account_308_stmnull');//
    Route::match(['get','post'],'account_308_stam',[App\Http\Controllers\AccountPKController::class, 'account_308_stam'])->name('acc.account_308_stam');//  stamp IPD

    Route::match(['get','post'],'account_2166_pull',[App\Http\Controllers\AccountPKController::class, 'account_2166_pull'])->name('acc.account_2166_pull');//
    Route::match(['get','post'],'account_2166_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_2166_pulldata'])->name('acc.account_2166_pulldata');//
    Route::match(['get','post'],'account_2166_dash',[App\Http\Controllers\AccountPKController::class, 'account_2166_dash'])->name('acc.account_2166_dash');//
    Route::match(['get','post'],'account_2166/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_2166'])->name('acc.account_2166');//
    Route::match(['get','post'],'account_2166_detail/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_2166_detail'])->name('acc.account_2166_detail');//
    Route::match(['get','post'],'account_2166_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_2166_stm'])->name('acc.account_2166_stm');//
    Route::match(['get','post'],'account_2166_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_2166_stmnull'])->name('acc.account_2166_stmnull');//
    Route::match(['get','post'],'account_2166_stam',[App\Http\Controllers\AccountPKController::class, 'account_2166_stam'])->name('acc.account_2166_stam');//  stamp IPD

    Route::match(['get','post'],'account_3099_pull',[App\Http\Controllers\AccountPKController::class, 'account_3099_pull'])->name('acc.account_3099_pull');//
    Route::match(['get','post'],'account_3099_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_3099_pulldata'])->name('acc.account_3099_pulldata');//
    Route::match(['get','post'],'account_3099_dash',[App\Http\Controllers\AccountPKController::class, 'account_3099_dash'])->name('acc.account_3099_dash');//
    Route::match(['get','post'],'account_3099/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_3099'])->name('acc.account_3099');//
    Route::match(['get','post'],'account_3099_detail/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_3099_detail'])->name('acc.account_3099_detail');//
    Route::match(['get','post'],'account_3099_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_3099_stm'])->name('acc.account_3099_stm');//
    Route::match(['get','post'],'account_3099_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_3099_stmnull'])->name('acc.account_3099_stmnull');//
    Route::match(['get','post'],'account_3099_stam',[App\Http\Controllers\AccountPKController::class, 'account_3099_stam'])->name('acc.account_3099_stam');//  stamp IPD

    Route::match(['get','post'],'account_8011_pull',[App\Http\Controllers\AccountPKController::class, 'account_8011_pull'])->name('acc.account_8011_pull');//
    Route::match(['get','post'],'account_8011_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_8011_pulldata'])->name('acc.account_8011_pulldata');//
    Route::match(['get','post'],'account_8011_dash',[App\Http\Controllers\AccountPKController::class, 'account_8011_dash'])->name('acc.account_8011_dash');//
    Route::match(['get','post'],'account_8011/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_8011'])->name('acc.account_8011');//
    Route::match(['get','post'],'account_8011_detail/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_8011_detail'])->name('acc.account_8011_detail');//
    Route::match(['get','post'],'account_8011_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_8011_stm'])->name('acc.account_8011_stm');//
    Route::match(['get','post'],'account_8011_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_8011_stmnull'])->name('acc.account_8011_stmnull');//
    Route::match(['get','post'],'account_8011_stam',[App\Http\Controllers\AccountPKController::class, 'account_8011_stam'])->name('acc.account_8011_stam');//  stamp IPD

    Route::match(['get','post'],'account_4011_pull',[App\Http\Controllers\AccountPKController::class, 'account_4011_pull'])->name('acc.account_4011_pull');//
    Route::match(['get','post'],'account_4011_pulldata',[App\Http\Controllers\AccountPKController::class, 'account_4011_pulldata'])->name('acc.account_4011_pulldata');//
    Route::match(['get','post'],'account_4011_dash',[App\Http\Controllers\AccountPKController::class, 'account_4011_dash'])->name('acc.account_4011_dash');//
    Route::match(['get','post'],'account_4011/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_4011'])->name('acc.account_4011');//
    Route::match(['get','post'],'account_4011_detail/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_4011_detail'])->name('acc.account_4011_detail');//
    Route::match(['get','post'],'account_4011_stm/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_4011_stm'])->name('acc.account_4011_stm');//
    Route::match(['get','post'],'account_4011_stmnull/{months}/{year}',[App\Http\Controllers\AccountPKController::class, 'account_4011_stmnull'])->name('acc.account_4011_stmnull');//
    Route::match(['get','post'],'account_4011_stam',[App\Http\Controllers\AccountPKController::class, 'account_4011_stam'])->name('acc.account_4011_stam');//  stamp IPD

    
    Route::match(['get','post'],'acc_stm',[App\Http\Controllers\AccountPKController::class, 'acc_stm'])->name('acc.acc_stm');//
    Route::match(['get','post'],'acc_repstm',[App\Http\Controllers\AccountPKController::class, 'acc_repstm'])->name('acc.acc_repstm');//

    Route::match(['get','post'],'acc_setting',[App\Http\Controllers\AccountPKController::class, 'acc_setting'])->name('acc.acc_setting');//
    Route::match(['get','post'],'acc_setting_edit/{id}',[App\Http\Controllers\AccountPKController::class, 'acc_setting_edit'])->name('acc.acc_setting_edit');//
    Route::match(['get','post'],'acc_setting_save',[App\Http\Controllers\AccountPKController::class, 'acc_setting_save'])->name('acc.acc_setting_save');//
    Route::match(['get','post'],'acc_setting_update',[App\Http\Controllers\AccountPKController::class, 'acc_setting_update'])->name('acc.acc_setting_update');//
     // **************************** PPFS 2566  ***********************
     Route::match(['get','post'],'anc_14001',[App\Http\Controllers\PPFSController::class, 'anc_14001'])->name('claim.anc_14001');//
     Route::match(['get','post'],'anc_14001_pull',[App\Http\Controllers\PPFSController::class, 'anc_14001_pull'])->name('claim.anc_14001_pull');//
     Route::match(['get','post'],'anc_14001_pull2',[App\Http\Controllers\PPFSController::class, 'anc_14001_pull2'])->name('claim.anc_14001_pull2');//

      // **************************** Anc  ***********************
     Route::match(['get','post'],'anc_dent',[App\Http\Controllers\AncController::class, 'anc_dent'])->name('claim.anc_dent');//
     Route::match(['get','post'],'anc_dent_search',[App\Http\Controllers\AncController::class, 'anc_dent_search'])->name('claim.anc_dent_search');//
     Route::match(['get','post'],'anc_dent_send16',[App\Http\Controllers\AncController::class, 'anc_dent_send16'])->name('claim.anc_dent_send16');//
     Route::match(['get','post'],'anc_dent_zip',[App\Http\Controllers\AncController::class, 'anc_dent_zip'])->name('claim.anc_dent_zip');//

     Route::match(['get','post'],'anc_dent_pull',[App\Http\Controllers\AncController::class, 'anc_dent_pull'])->name('claim.anc_dent_pull');//
     Route::match(['get','post'],'anc_dent_export',[App\Http\Controllers\AncController::class, 'anc_dent_export'])->name('claim.anc_dent_export');//


     Route::match(['get','post'],'anc_dent_insert',[App\Http\Controllers\AncController::class, 'anc_dent_insert'])->name('claim.anc_dent_insert');//

     Route::match(['get','post'],'anc_dent_searchvn',[App\Http\Controllers\AncController::class, 'anc_dent_searchvn'])->name('claim.anc_dent_searchvn');//
     Route::match(['get','post'],'anc_dent_sendvn',[App\Http\Controllers\AncController::class, 'anc_dent_sendvn'])->name('claim.anc_dent_sendvn');//
     Route::match(['get','post'],'anc_dent_zipvn',[App\Http\Controllers\AncController::class, 'anc_dent_zipvn'])->name('claim.anc_dent_zipvn');//

  // **************************** เงินเดือน ***********************
  Route::match(['get','post'],'account_money_hosrep',[App\Http\Controllers\AccountController::class, 'account_money_hosrep'])->name('acc.account_money_hosrep');//
  Route::match(['get','post'],'account_money_rep/{id}',[App\Http\Controllers\AccountController::class, 'account_money_rep'])->name('acc.account_money_rep');//
  Route::match(['get','post'],'account_money_personsave',[App\Http\Controllers\AccountController::class, 'account_money_personsave'])->name('acc.account_money_personsave');//
  Route::match(['get','post'],'account_money_copysave',[App\Http\Controllers\AccountController::class, 'account_money_copysave'])->name('acc.account_money_copysave');//
  Route::match(['get','post'],'account_money_personupdate',[App\Http\Controllers\AccountController::class, 'account_money_personupdate'])->name('acc.account_money_personupdate');//
  Route::match(['get','post'],'account_money_personcheckupdate',[App\Http\Controllers\AccountController::class, 'account_money_personcheckupdate'])->name('acc.account_money_personcheckupdate');//
  Route::match(['get','post'],'account_money_pay_onlyupdate',[App\Http\Controllers\AccountController::class, 'account_money_pay_onlyupdate'])->name('acc.account_money_pay_onlyupdate');//



  Route::match(['get','post'],'account_money_personedit/{id}',[App\Http\Controllers\AccountController::class, 'account_money_personedit'])->name('acc.account_money_personedit');//
  Route::match(['get','post'],'changstatus/{id}',[App\Http\Controllers\AccountController::class, 'changstatus'])->name('acc.changstatus');//
  Route::match(['get','post'],'account_money_repupdate',[App\Http\Controllers\AccountController::class, 'account_money_repupdate'])->name('acc.account_money_repupdate');//

  Route::match(['get','post'],'account_money_hospay',[App\Http\Controllers\AccountController::class, 'account_money_hospay'])->name('acc.account_money_hospay');//
  Route::match(['get','post'],'account_money_pay/{id}',[App\Http\Controllers\AccountController::class, 'account_money_pay'])->name('acc.account_money_pay');//
  Route::match(['get','post'],'account_money_payedit/{id}',[App\Http\Controllers\AccountController::class, 'account_money_payedit'])->name('acc.account_money_payedit');//
  Route::match(['get','post'],'account_money_payupdate',[App\Http\Controllers\AccountController::class, 'account_money_payupdate'])->name('acc.account_money_payupdate');//
  Route::match(['get','post'],'account_money_paycheckupdate',[App\Http\Controllers\AccountController::class, 'account_money_paycheckupdate'])->name('acc.account_money_paycheckupdate');//

  Route::match(['get','post'],'account_money_monthlydebthos',[App\Http\Controllers\AccountController::class, 'account_money_monthlydebthos'])->name('acc.account_money_monthlydebthos');//
  Route::match(['get','post'],'account_money_monthlydebt/{id}',[App\Http\Controllers\AccountController::class, 'account_money_monthlydebt'])->name('acc.account_money_monthlydebt');//
  Route::match(['get','post'],'account_money_monthlydebtedit/{id}',[App\Http\Controllers\AccountController::class, 'account_money_monthlydebtedit'])->name('acc.account_money_monthlydebtedit');//
  Route::match(['get','post'],'account_money_monthlydebtupdate',[App\Http\Controllers\AccountController::class, 'account_money_monthlydebtupdate'])->name('acc.account_money_monthlydebtupdate');//

  Route::match(['get','post'],'account_money_monthlydebt_personsave',[App\Http\Controllers\AccountController::class, 'account_money_monthlydebt_personsave'])->name('acc.account_money_monthlydebt_personsave');//
  Route::match(['get','post'],'account_money_monthlydebt_copypersonsave',[App\Http\Controllers\AccountController::class, 'account_money_monthlydebt_copypersonsave'])->name('acc.account_money_monthlydebt_copypersonsave');//








  Route::match(['get','post'],'account_money_setting',[App\Http\Controllers\AccountController::class, 'account_money_setting'])->name('acc.account_money_setting');//
  Route::match(['get','post'],'account_money_settingsave',[App\Http\Controllers\AccountController::class, 'account_money_settingsave'])->name('acc.account_money_settingsave');//
  Route::match(['get','post'],'account_money_settingedit/{id}',[App\Http\Controllers\AccountController::class, 'account_money_settingedit'])->name('acc.account_money_settingedit');//
  Route::match(['get','post'],'account_money_settingupdate',[App\Http\Controllers\AccountController::class, 'account_money_settingupdate'])->name('acc.account_money_settingupdate');//
  Route::delete('account_money_destroy/{id}',[App\Http\Controllers\AccountController::class, 'account_money_destroy'])->name('acc.account_money_destroy');//

  Route::match(['get','post'],'account_money_creditorsave',[App\Http\Controllers\AccountController::class, 'account_money_creditorsave'])->name('acc.account_money_creditorsave');//
  Route::match(['get','post'],'account_money_creditoredit/{id}',[App\Http\Controllers\AccountController::class, 'account_money_creditoredit'])->name('acc.account_money_creditoredit');//
  Route::match(['get','post'],'account_money_creditorupdate',[App\Http\Controllers\AccountController::class, 'account_money_creditorupdate'])->name('acc.account_money_creditorupdate');//

  Route::match(['get','post'],'account_money_report',[App\Http\Controllers\AccountController::class, 'account_money_report'])->name('acc.account_money_report');//




  // **************************** บัญชี ***********************
  Route::match(['get','post'],'account_info',[App\Http\Controllers\AccountController::class, 'account_info'])->name('acc.account_info');//
  Route::match(['get','post'],'account_info_vn/{year}/{months}/{startdate}/{enddate}',[App\Http\Controllers\AccountController::class, 'account_info_vn'])->name('acc.account_info_vn');//
  Route::match(['get','post'],'account_info_vnall/{year}/{months}/{startdate}/{enddate}',[App\Http\Controllers\AccountController::class, 'account_info_vnall'])->name('acc.account_info_vnall');//
  Route::match(['get','post'],'account_info_vnstmx/{cid}/{startdate}/{enddate}',[App\Http\Controllers\AccountController::class, 'account_info_vnstmx'])->name('acc.account_info_vnstmx');//

  Route::match(['get','post'],'account_info_vn_subofc_vn/{year}/{months}/{strdateadmit}/{enddateadmit}',[App\Http\Controllers\AccountController::class, 'account_info_vn_subofc_vn'])->name('acc.account_info_vn_subofc_vn');//
  Route::match(['get','post'],'account_info_vn_subofc_vndetail/{vn}',[App\Http\Controllers\AccountController::class, 'account_info_vn_subofc_vndetail'])->name('acc.account_info_vn_subofc_vndetail');//
  Route::match(['get','post'],'account_info_vn_subofc/{months}/{startdate}/{enddate}',[App\Http\Controllers\AccountController::class, 'account_info_vn_subofc'])->name('acc.account_info_vn_subofc');//

  Route::match(['get','post'],'account_info_noapproveofc/{months}/{startdate}/{enddate}',[App\Http\Controllers\AccountController::class, 'account_info_noapproveofc'])->name('acc.account_info_noapproveofc');//
  Route::match(['get','post'],'account_info_noapproveofc_vn/{vn}/{startdate}/{enddate}',[App\Http\Controllers\AccountController::class, 'account_info_noapproveofc_vn'])->name('acc.account_info_noapproveofc_vn');//
  Route::match(['get','post'],'account_info_vn_subofcdetail/{vn}',[App\Http\Controllers\AccountController::class, 'account_info_vn_subofcdetail'])->name('acc.account_info_vn_subofcdetail');//
  Route::match(['get','post'],'account_info_vn_subofcdetail_sub/{vn}/{income}',[App\Http\Controllers\AccountController::class, 'account_info_vn_subofcdetail_sub'])->name('acc.account_info_vn_subofcdetail_sub');//

  Route::match(['get','post'],'checksit_admit',[App\Http\Controllers\AccountController::class, 'checksit_admit'])->name('acc.checksit_admit');//
  Route::match(['get','post'],'checksit_admit_spsch',[App\Http\Controllers\AccountController::class, 'checksit_admit_spsch'])->name('acc.checksit_admit_spsch');//

  Route::match(['get','post'],'checksit_sendaccount',[App\Http\Controllers\AccountController::class, 'checksit_sendaccount'])->name('acc.checksit_sendaccount');//
  Route::match(['get','post'],'checksit_sendlist',[App\Http\Controllers\AccountController::class, 'checksit_sendlist'])->name('acc.checksit_sendlist');//
  Route::match(['get','post'],'checksit_ucs',[App\Http\Controllers\AccountController::class, 'checksit_ucs'])->name('acc.checksit_ucs');//
  Route::match(['get','post'],'checksit_sss',[App\Http\Controllers\AccountController::class, 'checksit_sss'])->name('acc.checksit_sss');//
  Route::match(['get','post'],'checksit_ofc',[App\Http\Controllers\AccountController::class, 'checksit_ofc'])->name('acc.checksit_ofc');//
  Route::match(['get','post'],'checksit_td',[App\Http\Controllers\AccountController::class, 'checksit_td'])->name('acc.checksit_td');//
  Route::match(['get','post'],'checksit_status',[App\Http\Controllers\AccountController::class, 'checksit_status'])->name('acc.checksit_status');//
  Route::match(['get','post'],'checksit_prb',[App\Http\Controllers\AccountController::class, 'checksit_prb'])->name('acc.checksit_prb');//
  Route::match(['get','post'],'checksit_ti',[App\Http\Controllers\AccountController::class, 'checksit_ti'])->name('acc.checksit_ti');//

  Route::match(['get','post'],'debtor_sss',[App\Http\Controllers\AccountController::class, 'debtor_sss'])->name('acc.debtor_sss');//


  // **************************** แผนโครงการ ***********************
  Route::match(['get','post'],'plan',[App\Http\Controllers\PlanController::class, 'plan'])->name('p.plan');//
  Route::match(['get','post'],'plan_save',[App\Http\Controllers\PlanController::class, 'plan_save'])->name('p.plan_save');//
  Route::get('plan_edit/{id}',[App\Http\Controllers\PlanController::class, 'plan_edit'])->name('p.plan_edit');//
  Route::match(['get','post'],'plan_update',[App\Http\Controllers\PlanController::class, 'plan_update'])->name('p.plan_update');//
  Route::delete('plan_destroy/{id}',[App\Http\Controllers\PlanController::class, 'plan_destroy'])->name('p.plan_destroy');//

  Route::match(['get','post'],'plan_project',[App\Http\Controllers\PlanController::class, 'plan_project'])->name('p.plan_project');// แผนโครงการ
  Route::match(['get','post'],'plan_project_add',[App\Http\Controllers\PlanController::class, 'plan_project_add'])->name('p.plan_project_add');// แผนโครงการ


  Route::match(['get','post'],'plan_development',[App\Http\Controllers\PlanController::class, 'plan_development'])->name('p.plan_development');// แผนพัฒนาบุคลากร
  Route::match(['get','post'],'plan_procurement',[App\Http\Controllers\PlanController::class, 'plan_procurement'])->name('p.plan_procurement');// แผนจัดซื้อครุภัณฑ์
  Route::match(['get','post'],'plan_maintenance',[App\Http\Controllers\PlanController::class, 'plan_maintenance'])->name('p.plan_maintenance');// แผนบำรุงรักษา
  Route::match(['get','post'],'plan_type',[App\Http\Controllers\PlanController::class, 'plan_type'])->name('p.plan_type');// ประเภทแผนงาน

  Route::match(['get','post'],'plan_vision',[App\Http\Controllers\PlanController::class, 'plan_vision'])->name('p.plan_vision');// วิสัยทัศน์
  Route::match(['get','post'],'plan_vision_save',[App\Http\Controllers\PlanController::class, 'plan_vision_save'])->name('p.plan_vision_save');// วิสัยทัศน์
  Route::get('plan_vision_edit/{id}',[App\Http\Controllers\PlanController::class, 'plan_vision_edit'])->name('p.plan_vision_edit');//
  Route::match(['get','post'],'plan_vision_update',[App\Http\Controllers\PlanController::class, 'plan_vision_update'])->name('p.plan_vision_update');// วิสัยทัศน์
  Route::delete('plan_vision_destroy/{id}',[App\Http\Controllers\PlanController::class, 'plan_vision_destroy'])->name('p.plan_vision_destroy');//


  Route::match(['get','post'],'plan_mission',[App\Http\Controllers\PlanController::class, 'plan_mission'])->name('p.plan_mission');// พันธกิจ
  Route::match(['get','post'],'plan_mission_save',[App\Http\Controllers\PlanController::class, 'plan_mission_save'])->name('p.plan_mission_save');// พันธกิจ
  Route::get('plan_mission_edit/{id}',[App\Http\Controllers\PlanController::class, 'plan_mission_edit'])->name('p.plan_mission_edit');//
  Route::match(['get','post'],'plan_mission_update',[App\Http\Controllers\PlanController::class, 'plan_mission_update'])->name('p.plan_mission_update');// พันธกิจ
  Route::delete('plan_mission_destroy/{id}',[App\Http\Controllers\PlanController::class, 'plan_mission_destroy'])->name('p.plan_mission_destroy');//

  Route::match(['get','post'],'plan_strategic',[App\Http\Controllers\PlanController::class, 'plan_strategic'])->name('p.plan_strategic');// ยุทธศาสตร์
  Route::match(['get','post'],'plan_strategic_save',[App\Http\Controllers\PlanController::class, 'plan_strategic_save'])->name('p.plan_strategic_save');// ยุทธศาสตร์
  Route::get('plan_strategic_edit/{id}',[App\Http\Controllers\PlanController::class, 'plan_strategic_edit'])->name('p.plan_strategic_edit');// ยุทธศาสตร์
  Route::match(['get','post'],'plan_strategic_update',[App\Http\Controllers\PlanController::class, 'plan_strategic_update'])->name('p.plan_strategic_update');//  ยุทธศาสตร์
  Route::delete('plan_strategic_destroy/{id}',[App\Http\Controllers\PlanController::class, 'plan_strategic_destroy'])->name('p.plan_strategic_destroy');//ยุทธศาสตร์

  Route::match(['get','post'],'plan_taget/{id}',[App\Http\Controllers\PlanController::class, 'plan_taget'])->name('p.plan_taget');// เป้าประสงค์
  Route::match(['get','post'],'plan_taget_save',[App\Http\Controllers\PlanController::class, 'plan_taget_save'])->name('p.plan_taget_save');//เป้าประสงค์
  Route::match(['get','post'],'plan_taget_update',[App\Http\Controllers\PlanController::class, 'plan_taget_update'])->name('p.plan_taget_update');//เป้าประสงค์
  Route::delete('plan_taget_destroy/{id}',[App\Http\Controllers\PlanController::class, 'plan_taget_destroy'])->name('p.plan_taget_destroy');//เป้าประสงค์

  Route::match(['get','post'],'plan_kpi/{strategic_id}/{taget_id}',[App\Http\Controllers\PlanController::class, 'plan_kpi'])->name('p.plan_kpi');// KPI
  Route::match(['get','post'],'plan_kpi_save',[App\Http\Controllers\PlanController::class, 'plan_kpi_save'])->name('p.plan_kpi_save');//KPI
  Route::match(['get','post'],'plan_kpi_update',[App\Http\Controllers\PlanController::class, 'plan_kpi_update'])->name('p.plan_kpi_update');//KPI
  Route::delete('plan_kpi_destroy/{id}',[App\Http\Controllers\PlanController::class, 'plan_kpi_destroy'])->name('p.plan_kpi_destroy');//KPI

 // ****************************User ใบงาน ***********************
  Route::match(['get','post'],'userrequest_report',[App\Http\Controllers\SendreportController::class,'userrequest_report'])->name('rep.userrequest_report');//
  Route::match(['get','post'],'userrequest_report_save',[App\Http\Controllers\SendreportController::class,'userrequest_report_save'])->name('rep.userrequest_report_save');//
  Route::match(['get','post'],'userrequest_report_edit/{id}',[App\Http\Controllers\SendreportController::class,'userrequest_report_edit'])->name('rep.userrequest_report_edit');//
  Route::match(['get','post'],'userrequest_report_update',[App\Http\Controllers\SendreportController::class,'userrequest_report_update'])->name('rep.userrequest_report_update');//

 // ****************************User OT ***********************
 Route::match(['get','post'],'user_otone',[App\Http\Controllers\UserotController::class, 'user_otone'])->name('userot.user_otone');//
 Route::match(['get','post'],'user_otonesearch_',[App\Http\Controllers\UserotController::class, 'user_otonesearch_'])->name('userot.user_otonesearch_');//
 Route::match(['get','post'],'user_otone_add',[App\Http\Controllers\UserotController::class, 'user_otone_add'])->name('userot.user_otone_add');//
 Route::match(['get','post'],'user_otone_save',[App\Http\Controllers\UserotController::class, 'user_otone_save'])->name('userot.user_otone_save');//
 Route::match(['get','post'],'user_otone_edit/{id}',[App\Http\Controllers\UserotController::class, 'user_otone_edit'])->name('userot.user_otone_edit');//
 Route::match(['get','post'],'user_otone_update',[App\Http\Controllers\UserotController::class, 'user_otone_update'])->name('userot.user_otone_update');//
 Route::match(['get','post'],'user_otone_add_color/{id}',[App\Http\Controllers\UserotController::class, 'user_otone_add_color'])->name('userot.user_otone_add_color');//
 Route::match(['get','post'],'user_otone_updatecolor',[App\Http\Controllers\UserotController::class, 'user_otone_updatecolor'])->name('userot.user_otone_updatecolor');//
 Route::match(['get','post'],'user_otone_print',[App\Http\Controllers\UserotController::class, 'user_otone_print'])->name('userot.user_otone_print');//
 Route::match(['get','post'],'user_export',[App\Http\Controllers\UserotController::class, 'user_export'])->name('userot.user_export');//
 Route::delete('user_otone_destroy/{id}',[App\Http\Controllers\UserotController::class, 'user_otone_destroy'])->name('userot.user_otone_destroy');//


 // **************************** OT ***********************
  Route::match(['get','post'],'otone',[App\Http\Controllers\OtController::class, 'otone'])->name('ot.otone');//
  Route::match(['get','post'],'otonesearch',[App\Http\Controllers\OtController::class, 'otonesearch'])->name('ot.otonesearch');//
  Route::match(['get','post'],'otone_add',[App\Http\Controllers\OtController::class, 'otone_add'])->name('ot.otone_add');//
  Route::match(['get','post'],'otone_save',[App\Http\Controllers\OtController::class, 'otone_save'])->name('ot.otone_save');//
  Route::match(['get','post'],'otone_edit/{id}',[App\Http\Controllers\OtController::class, 'otone_edit'])->name('ot.otone_edit');//
  Route::match(['get','post'],'otone_update',[App\Http\Controllers\OtController::class, 'otone_update'])->name('ot.otone_update');//
  Route::match(['get','post'],'otone_add_color/{id}',[App\Http\Controllers\OtController::class, 'otone_add_color'])->name('ot.otone_add_color');//
  Route::match(['get','post'],'otone_updatecolor',[App\Http\Controllers\OtController::class, 'otone_updatecolor'])->name('ot.otone_updatecolor');//
  Route::match(['get','post'],'otone_print',[App\Http\Controllers\OtController::class, 'otone_print'])->name('ot.otone_print');//

  Route::match(['get','post'],'export',[App\Http\Controllers\OtController::class, 'export'])->name('ot.export');//

  Route::match(['get','post'],'profile_edit/{id}',[App\Http\Controllers\OtController::class, 'profile_edit'])->name('ot.profile_edit');//
  Route::match(['get','post'],'profile_update',[App\Http\Controllers\OtController::class, 'profile_update'])->name('ot.profile_update');//

  Route::match(['get','post'],'ottwo',[App\Http\Controllers\OtController::class, 'ottwo'])->name('ot.ottwo');//
  Route::delete('otone_destroy/{id}',[App\Http\Controllers\OtController::class, 'otone_destroy'])->name('ot.otone_destroy');//


//  *************************** Print OT form  *****
  Route::match(['get','post'],'otone_from1',[App\Http\Controllers\PrintController::class,'otone_from1'])->name('ot.otone_from1');//
  Route::match(['get','post'],'otone_from2',[App\Http\Controllers\PrintController::class,'otone_from2'])->name('ot.otone_from2');//
  Route::match(['get','post'],'otone_from3',[App\Http\Controllers\PrintController::class,'otone_from3'])->name('ot.otone_from3');//
  Route::match(['get','post'],'export_otform1/{start}/{end}/{reqsend}/{iddep}',[App\Http\Controllers\PrintController::class, 'export_otform1'])->name('export.export_otform1');//
  Route::match(['get','post'],'export_otform3/{start}/{end}/{reqsend}/{iddep}',[App\Http\Controllers\PrintController::class, 'export_otform3'])->name('export.export_otform3');//
  Route::match(['get','post'],'export_otform4/{start}/{end}/{reqsend}/{iddep}',[App\Http\Controllers\PrintController::class, 'export_otform4'])->name('export.export_otform4');//


//  *************************** Report รายงาน *******************************************************
Route::match(['get','post'],'report_type',[App\Http\Controllers\PersonController::class, 'report_type'])->name('re.report_type');//
Route::match(['get','post'],'report_dep',[App\Http\Controllers\PersonController::class, 'report_dep'])->name('re.report_dep');//

//  *************************** PT *******************************************************

Route::match(['get','post'],'restore',[App\Http\Controllers\PtController::class, 'restore'])->name('pt.restore');//
Route::match(['get','post'],'kayapap_vs/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_vs'])->name('pt.kayapap_vs');//
Route::match(['get','post'],'kayapap_vs_sub/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_vs_sub'])->name('pt.kayapap_vs_sub');//
Route::match(['get','post'],'kayapap_vs_spsch/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_vs_spsch'])->name('pt.kayapap_vs_spsch');//
Route::match(['get','post'],'kayapap_vs_nokey/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_vs_nokey'])->name('pt.kayapap_vs_nokey');//

Route::match(['get','post'],'kayapap_Keyspsch/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_Keyspsch'])->name('pt.kayapap_Keyspsch');//

Route::match(['get','post'],'kayapap_hoocojmokvs/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_hoocojmokvs'])->name('pt.kayapap_hoocojmokvs');//
Route::match(['get','post'],'kayapap_tavs/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_tavs'])->name('pt.kayapap_tavs');//
Route::match(['get','post'],'kayapap_tavs_subvn/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_tavs_subvn'])->name('pt.kayapap_tavs_subvn');//
Route::match(['get','post'],'kayapap_tavs_subspsch/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_tavs_subspsch'])->name('pt.kayapap_tavs_subspsch');//
Route::match(['get','post'],'kayapap_tavs_subnokey/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_tavs_subnokey'])->name('pt.kayapap_tavs_subnokey');//


Route::match(['get','post'],'kayapap_jitvs/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_jitvs'])->name('pt.kayapap_jitvs');//
Route::match(['get','post'],'kayapap_jitvs_vn/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_jitvs_vn'])->name('pt.kayapap_jitvs_vn');//
Route::match(['get','post'],'kayapap_jitvs_spsch/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_jitvs_spsch'])->name('pt.kayapap_jitvs_spsch');//
Route::match(['get','post'],'kayapap_jitvs_nokey/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_jitvs_nokey'])->name('pt.kayapap_jitvs_nokey');//

Route::match(['get','post'],'kayapap_kratoonvs/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_kratoonvs'])->name('pt.kayapap_kratoonvs');//
Route::match(['get','post'],'kayapap_kratoonvs_sub/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_kratoonvs_sub'])->name('pt.kayapap_kratoonvs_sub');//
Route::match(['get','post'],'kayapap_kratoonvs_spsch/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_kratoonvs_spsch'])->name('pt.kayapap_kratoonvs_spsch');//
Route::match(['get','post'],'kayapap_kratoonvs_nokey/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_kratoonvs_nokey'])->name('pt.kayapap_kratoonvs_nokey');//

Route::match(['get','post'],'kayapap_hoocojmokvs_vs/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_hoocojmokvs_vs'])->name('pt.kayapap_hoocojmokvs_vs');//
Route::match(['get','post'],'kayapap_hoocojmokvs_spsch/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_hoocojmokvs_spsch'])->name('pt.kayapap_hoocojmokvs_spsch');//
Route::match(['get','post'],'kayapap_hoocojmokvs_nokey/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'kayapap_hoocojmokvs_nokey'])->name('pt.kayapap_hoocojmokvs_nokey');//

Route::match(['get','post'],'equipment',[App\Http\Controllers\PtController::class, 'equipment'])->name('pt.equipment');//
Route::match(['get','post'],'equipment_vn/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'equipment_vn'])->name('pt.equipment_vn');//
Route::match(['get','post'],'equipment_spsch/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'equipment_spsch'])->name('pt.equipment_spsch');//
Route::match(['get','post'],'equipment_nokey/{months}/{startdate}/{enddate}',[App\Http\Controllers\PtController::class, 'equipment_nokey'])->name('pt.equipment_nokey');//


Route::match(['get','post'],'thalassemia_year',[App\Http\Controllers\PctController::class, 'thalassemia_year'])->name('pct.thalassemia_year');//
Route::match(['get','post'],'thalassemia_yearsearch',[App\Http\Controllers\PctController::class, 'thalassemia_yearsearch'])->name('pct.thalassemia_yearsearch');//

Route::match(['get','post'],'thalassemia_ipd/{months}',[App\Http\Controllers\PctController::class, 'thalassemia_ipd'])->name('pct.thalassemia_ipd');//
Route::match(['get','post'],'thalassemia_ipdsearch/{months}',[App\Http\Controllers\PctController::class, 'thalassemia_ipdsearch'])->name('pct.thalassemia_ipdsearch');//

Route::match(['get','post'],'thalassemia_opd/{months}/{startdate}/{enddate}',[App\Http\Controllers\PctController::class, 'thalassemia_opd'])->name('pct.thalassemia_opd');//
Route::match(['get','post'],'thalassemia_opdsub/{months}/{startdate}/{enddate}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub'])->name('pct.thalassemia_opdsub');//
Route::match(['get','post'],'thalassemia_opdsub_diag/{months}/{startdate}/{enddate}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_diag'])->name('pct.thalassemia_opdsub_diag');//
Route::match(['get','post'],'thalassemia_opdsub_diag_vn/{vn}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_diag_vn'])->name('pct.thalassemia_opdsub_diag_vn');//
Route::match(['get','post'],'thalassemia_opdsub_diag_labvn/{vn}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_diag_labvn'])->name('pct.thalassemia_opdsub_diag_labvn');//
Route::match(['get','post'],'thalassemia_opdsub_drugvn/{vn}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_drugvn'])->name('pct.thalassemia_opdsub_drugvn');//

Route::match(['get','post'],'thalassemia_opdsub_diag_an/{an}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_diag_an'])->name('pct.thalassemia_opdsub_diag_an');//
Route::match(['get','post'],'thalassemia_opdsub_diag_lab/{an}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_diag_lab'])->name('pct.thalassemia_opdsub_diag_lab');//
Route::match(['get','post'],'thalassemia_opdsub_diag_blood/{an}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_diag_blood'])->name('pct.thalassemia_opdsub_diag_blood');//

Route::match(['get','post'],'thalassemia_opdsub_drugdiag_hn/{an}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_drugdiag_hn'])->name('pct.thalassemia_opdsub_drugdiag_hn');//
Route::match(['get','post'],'thalassemia_opdsub_drugdiag_lab/{an}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsub_drugdiag_lab'])->name('pct.thalassemia_opdsub_drugdiag_lab');//

Route::match(['get','post'],'thalassemia_opdsubdrug/{months}/{startdate}/{enddate}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsubdrug'])->name('pct.thalassemia_opdsubdrug');//
Route::match(['get','post'],'thalassemia_opdsubdrug_hn/{hn}/{startdate}/{enddate}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsubdrug_hn'])->name('pct.thalassemia_opdsubdrug_hn');//

Route::match(['get','post'],'thalassemia_opdsubdrug_hos/{vn}/{startdate}/{enddate}',[App\Http\Controllers\PctController::class, 'thalassemia_opdsubdrug_hos'])->name('pct.thalassemia_opdsubdrug_hos');//

Route::match(['get','post'],'thalassemia',[App\Http\Controllers\PctController::class, 'thalassemia'])->name('pct.thalassemia');//
Route::match(['get','post'],'thalassemia',[App\Http\Controllers\PctController::class, 'thalassemia'])->name('pct.thalassemia');//

Route::match(['get','post'],'p4p',[App\Http\Controllers\P4pController::class, 'p4p'])->name('p4.p4p');//
Route::match(['get','post'],'p4p_work',[App\Http\Controllers\P4pController::class, 'p4p_work'])->name('p4.p4p_work');//
Route::match(['get','post'],'p4p_work_save',[App\Http\Controllers\P4pController::class, 'p4p_work_save'])->name('p4.p4p_work_save');//
Route::match(['get','post'],'p4p_work_edit/{id}',[App\Http\Controllers\P4pController::class, 'p4p_work_edit'])->name('p4.p4p_work_edit');//
// Route::match(['get','post'],'p4p_work_choose/{year}/{month}',[App\Http\Controllers\P4pController::class, 'p4p_work_choose'])->name('p4.p4p_work_choose');//
Route::match(['get','post'],'p4p_work_update',[App\Http\Controllers\P4pController::class, 'p4p_work_update'])->name('p4.p4p_work_update');//
Route::match(['get','post'],'p4p_work_choose/{id}',[App\Http\Controllers\P4pController::class, 'p4p_work_choose'])->name('p4.p4p_work_choose');//
Route::match(['get','post'],'p4p_work_choose_save',[App\Http\Controllers\P4pController::class, 'p4p_work_choose_save'])->name('p4.p4p_work_choose_save');//
Route::match(['get','post'],'p4p_work_choose_worksetsave',[App\Http\Controllers\P4pController::class, 'p4p_work_choose_worksetsave'])->name('p4.p4p_work_choose_worksetsave');//

Route::match(['get','post'],'p4p_work_choose_detail/{id}',[App\Http\Controllers\P4pController::class, 'p4p_work_choose_detail'])->name('p4.p4p_work_choose_detail');//

Route::match(['get','post'],'p4p_work_load_save',[App\Http\Controllers\P4pController::class, 'p4p_work_load_save'])->name('p4.p4p_work_load_save');//
Route::match(['get','post'],'p4p_work_load_saveCopy',[App\Http\Controllers\P4pController::class, 'p4p_work_load_saveCopy'])->name('p4.p4p_work_load_saveCopy');//
Route::match(['get','post'],'p4p_work_load_update',[App\Http\Controllers\P4pController::class, 'p4p_work_load_update'])->name('p4.p4p_work_load_update');//
Route::DELETE('p4p_work_load_destroy/{id}',[App\Http\Controllers\P4pController::class, 'p4p_work_load_destroy'])->name('p4.p4p_work_load_destroy');//

Route::match(['get','post'],'p4p_work_scorenowsave',[App\Http\Controllers\P4pController::class, 'p4p_work_scorenowsave'])->name('p4.p4p_work_scorenowsave');//

Route::match(['get','post'],'p4p_work_position',[App\Http\Controllers\P4pController::class, 'p4p_work_position'])->name('p4.p4p_work_position');//
Route::match(['get','post'],'p4p_work_position_save',[App\Http\Controllers\P4pController::class, 'p4p_work_position_save'])->name('p4.p4p_work_position_save');//
Route::match(['get','post'],'p4p_work_position_edit/{id}',[App\Http\Controllers\P4pController::class, 'p4p_work_position_edit'])->name('p4.p4p_work_position_edit');//
Route::match(['get','post'],'p4p_work_position_update',[App\Http\Controllers\P4pController::class, 'p4p_work_position_update'])->name('p4.p4p_work_position_update');//
Route::match(['get','post'],'p4p_work_position_switchactive',[App\Http\Controllers\P4pController::class, 'p4p_work_position_switchactive'])->name('p4.p4p_work_position_switchactive');//

Route::match(['get','post'],'p4p_work_position_sub/{id}',[App\Http\Controllers\P4pController::class, 'p4p_work_position_sub'])->name('p4.p4p_work_position_sub');//

Route::match(['get','post'],'p4p_workset',[App\Http\Controllers\P4pController::class, 'p4p_workset'])->name('p4.p4p_workset');//
Route::match(['get','post'],'p4p_workset_save',[App\Http\Controllers\P4pController::class, 'p4p_workset_save'])->name('p4.p4p_workset_save');//
Route::match(['get','post'],'p4p_workset_edit/{id}',[App\Http\Controllers\P4pController::class, 'p4p_workset_edit'])->name('p4.p4p_workset_edit');//
Route::match(['get','post'],'p4p_workset_update',[App\Http\Controllers\P4pController::class, 'p4p_workset_update'])->name('p4.p4p_workset_update');//
Route::match(['get','post'],'p4p_workset_switchactive',[App\Http\Controllers\P4pController::class, 'p4p_workset_switchactive'])->name('p4.p4p_workset_switchactive');//

Route::match(['get','post'],'p4p_workgroupset',[App\Http\Controllers\P4pController::class, 'p4p_workgroupset'])->name('p4.p4p_workgroupset');//
Route::match(['get','post'],'p4p_workgroupset_save',[App\Http\Controllers\P4pController::class, 'p4p_workgroupset_save'])->name('p4.p4p_workgroupset_save');//
Route::match(['get','post'],'p4p_workgroupset_edit/{id}',[App\Http\Controllers\P4pController::class, 'p4p_workgroupset_edit'])->name('p4.p4p_workgroupset_edit');//
Route::match(['get','post'],'p4p_workgroupset_update',[App\Http\Controllers\P4pController::class, 'p4p_workgroupset_update'])->name('p4.p4p_workgroupset_update');//
Route::match(['get','post'],'p4p_workgroupset_switchactive',[App\Http\Controllers\P4pController::class, 'p4p_workgroupset_switchactive'])->name('p4.p4p_workgroupset_switchactive');//

Route::match(['get','post'],'addunitwork',[App\Http\Controllers\P4pController::class, 'addunitwork'])->name('p4.addunitwork');//

Route::match(['get','post'],'p4p_activity',[App\Http\Controllers\P4pController::class, 'p4p_activity'])->name('p4.p4p_activity');//


Route::match(['get','post'],'medicine',[App\Http\Controllers\MedicineController::class, 'medicine'])->name('me.medicine');//
Route::match(['get','post'],'medicine_salt',[App\Http\Controllers\MedicineController::class, 'medicine_salt'])->name('me.medicine_salt');//
Route::match(['get','post'],'medicine_saltsearch',[App\Http\Controllers\MedicineController::class, 'medicine_saltsearch'])->name('me.medicine_saltsearch');//
Route::match(['get','post'],'medicine_salt_sub/{months}/{startdate}/{enddate}',[App\Http\Controllers\MedicineController::class, 'medicine_salt_sub'])->name('me.medicine_salt_sub');//
Route::match(['get','post'],'medicine_salt_subhn/{hn}',[App\Http\Controllers\MedicineController::class, 'medicine_salt_subhn'])->name('me.medicine_salt_subhn');//

//********************* */ Claim 16 แฟ้ม ***********************************
Route::match(['get','post'],'sixteendata',[App\Http\Controllers\ClaimreferController::class, 'sixteendata'])->name('data.sixteendata');//
Route::match(['get','post'],'sixteendata_pull',[App\Http\Controllers\ClaimreferController::class, 'sixteendata_pull'])->name('data.sixteendata_pull');//











//********************* */ Claim  ***********************************
Route::match(['get','post'],'aipn',[App\Http\Controllers\AipnController::class, 'aipn'])->name('claim.aipn');//
Route::match(['get','post'],'aipnsearch',[App\Http\Controllers\AipnController::class, 'aipnsearch'])->name('claim.aipnsearch');//

Route::match(['get','post'],'aipn_plb',[App\Http\Controllers\AipnController::class, 'aipn_plb'])->name('claim.aipn_plb');//
Route::match(['get','post'],'aipn_plb_search',[App\Http\Controllers\AipnController::class, 'aipn_plb_search'])->name('claim.aipn_plb_search');//
Route::match(['get','post'],'aipn_plb_send_anplb',[App\Http\Controllers\AipnController::class, 'aipn_plb_send_anplb'])->name('claim.aipn_plb_send_anplb');//

Route::match(['get','post'],'checkdata',[App\Http\Controllers\AipnController::class, 'checkdata'])->name('claim.checkdata');//

Route::match(['get','post'],'aipn_disability',[App\Http\Controllers\AipnController::class, 'aipn_disability'])->name('claim.aipn_disability');// 06
Route::match(['get','post'],'aipn_disability_search',[App\Http\Controllers\AipnController::class, 'aipn_disability_search'])->name('claim.aipn_disability_search');// 06
Route::match(['get','post'],'aipn_disability_an',[App\Http\Controllers\AipnController::class, 'aipn_disability_an'])->name('claim.aipn_disability_an');// 06

Route::match(['get','post'],'aipn_equipdev',[App\Http\Controllers\AipnController::class, 'aipn_equipdev'])->name('claim.aipn_equipdev');//
Route::match(['get','post'],'aipn_equipdevsearch',[App\Http\Controllers\AipnController::class, 'aipn_equipdevsearch'])->name('claim.aipn_equipdevsearch');//
Route::match(['get','post'],'aipn_equipdev_send',[App\Http\Controllers\AipnController::class, 'aipn_equipdev_send'])->name('claim.aipn_equipdev_send');//
Route::match(['get','post'],'aipn_equipdev_zip',[App\Http\Controllers\AipnController::class, 'aipn_equipdev_zip'])->name('claim.aipn_equipdev_zip');//

Route::match(['get','post'],'aipn_billitems_destroy/{id}',[App\Http\Controllers\AipnController::class, 'aipn_billitems_destroy'])->name('claim.aipn_billitems_destroy');//

Route::match(['get','post'],'aipn_send',[App\Http\Controllers\AipnController::class, 'aipn_send'])->name('claim.aipn_send');//
Route::match(['get','post'],'aipn_send_an',[App\Http\Controllers\AipnController::class, 'aipn_send_an'])->name('claim.aipn_send_an');//
Route::match(['get','post'],'aipn_send_all',[App\Http\Controllers\AipnController::class, 'aipn_send_all'])->name('claim.aipn_send_all');//
Route::match(['get','post'],'aipn_send_chang',[App\Http\Controllers\AipnController::class, 'aipn_send_chang'])->name('claim.aipn_send_chang');//
Route::match(['get','post'],'aipn_zip',[App\Http\Controllers\AipnController::class, 'aipn_zip'])->name('claim.aipn_zip');//

Route::match(['get','post'],'acc_checksit',[App\Http\Controllers\ClaimController::class, 'acc_checksit'])->name('claim.acc_checksit');//
Route::match(['get','post'],'acc_checksit_spsch',[App\Http\Controllers\ClaimController::class, 'acc_checksit_spsch'])->name('claim.acc_checksit_spsch');//
Route::match(['get','post'],'acc_checksit_spsch_pangstamp',[App\Http\Controllers\ClaimController::class, 'acc_checksit_spsch_pangstamp'])->name('claim.acc_checksit_spsch_pangstamp');//
Route::match(['get','post'],'acc_checksit_process',[App\Http\Controllers\ClaimController::class, 'acc_checksit_process'])->name('claim.acc_checksit_process');//


Route::match(['get','post'],'ssop_data',[App\Http\Controllers\ClaimController::class, 'ssop_data'])->name('claim.ssop_data');//
Route::match(['get','post'],'ssop_check',[App\Http\Controllers\ClaimController::class, 'ssop_check'])->name('claim.ssop_check');//
Route::match(['get','post'],'ssop_send',[App\Http\Controllers\ClaimController::class, 'ssop_send'])->name('claim.ssop_send');//
Route::match(['get','post'],'ssop_zip',[App\Http\Controllers\ClaimController::class, 'ssop_zip'])->name('claim.ssop_zip');//

Route::match(['get','post'],'ssop_data_vn',[App\Http\Controllers\ClaimController::class, 'ssop_data_vn'])->name('claim.ssop_data_vn');//

Route::match(['get','post'],'ssop_edit_svpid/{id}',[App\Http\Controllers\ClaimController::class, 'ssop_edit_svpid'])->name('claim.ssop_edit_svpid');//
Route::match(['get','post'],'ssop_edit_prescb/{id}',[App\Http\Controllers\ClaimController::class, 'ssop_edit_prescb'])->name('claim.ssop_edit_prescb');//

Route::match(['get','post'],'ssop',[App\Http\Controllers\ClaimController::class, 'ssop'])->name('claim.ssop');//
Route::match(['get','post'],'ssop_search',[App\Http\Controllers\ClaimController::class, 'ssop_search'])->name('claim.ssop_search');//
Route::match(['get','post'],'ssop_save16',[App\Http\Controllers\ClaimController::class, 'ssop_save16'])->name('claim.ssop_save16');//
Route::match(['get','post'],'ssop_detail',[App\Http\Controllers\ClaimController::class, 'ssop_detail'])->name('claim.ssop_detail');//
Route::match(['get','post'],'ssop_claimsixteen',[App\Http\Controllers\ClaimController::class, 'ssop_claimsixteen'])->name('claim.ssop_claimsixteen');//
Route::match(['get','post'],'ssop_recheck',[App\Http\Controllers\ClaimController::class, 'ssop_recheck'])->name('claim.ssop_recheck');//
Route::match(['get','post'],'ssop_recheck_search',[App\Http\Controllers\ClaimController::class, 'ssop_recheck_search'])->name('claim.ssop_recheck_search');//
Route::match(['get','post'],'ssop_report',[App\Http\Controllers\ClaimController::class, 'ssop_report'])->name('claim.ssop_report');//

Route::match(['get','post'],'ssop_recheck_new',[App\Http\Controllers\ClaimController::class, 'ssop_recheck_new'])->name('claim.ssop_recheck_new');//

Route::match(['get','post'],'ssop_pull_delete',[App\Http\Controllers\ClaimController::class, 'ssop_pull_delete'])->name('claim.ssop_pull_delete');//ลบข้อมูล
Route::match(['get','post'],'ssop_pull_new/{start}/{end}',[App\Http\Controllers\ClaimController::class, 'ssop_pull_new'])->name('claim.ssop_pull_new');//ดึงข้อมูลใหม่
Route::match(['get','post'],'ssop_send_pull_new',[App\Http\Controllers\ClaimController::class, 'ssop_send_pull_new'])->name('claim.ssop_send_pull_new');//ส่งออก
Route::match(['get','post'],'ssop_zip_pull_new',[App\Http\Controllers\ClaimController::class, 'ssop_zip_pull_new'])->name('claim.ssop_zip_pull_new');//

Route::match(['get','post'],'Tranfer_stm',[App\Http\Controllers\ClaimController::class, 'Tranfer_stm'])->name('claim.Tranfer_stm');//
Route::match(['get','post'],'Tranfer_stmsearch',[App\Http\Controllers\ClaimController::class, 'Tranfer_stmsearch'])->name('claim.Tranfer_stmsearch');//
Route::match(['get','post'],'Tranfer_stm_save',[App\Http\Controllers\ClaimController::class, 'Tranfer_stm_save'])->name('claim.Tranfer_stm_save');//

Route::match(['get','post'],'opt',[App\Http\Controllers\ClaimController::class, 'opt'])->name('claim.opt');//

Route::match(['get','post'],'free_schedule',[App\Http\Controllers\FreescheduleController::class, 'free_schedule'])->name('claim.free_schedule');//


//********************* */ Ward  ***********************************

Route::match(['get','post'],'check_ward',[App\Http\Controllers\CheckwardController::class, 'check_ward'])->name('ward.check_ward');//
Route::match(['get','post'],'check_warddetail/{id}',[App\Http\Controllers\CheckwardController::class, 'check_warddetail'])->name('ward.check_warddetail');//
Route::match(['get','post'],'check_wardnonote/{id}',[App\Http\Controllers\CheckwardController::class, 'check_wardnonote'])->name('ward.check_wardnonote');//
Route::match(['get','post'],'check_wardnoclaim/{id}',[App\Http\Controllers\CheckwardController::class, 'check_wardnoclaim'])->name('ward.check_wardnoclaim');//
Route::match(['get','post'],'check_wardsss/{id}',[App\Http\Controllers\CheckwardController::class, 'check_wardsss'])->name('ward.check_wardsss');//


//********************* */ รพสต  ***********************************

Route::match(['get','post'],'home_rpst',[App\Http\Controllers\RpstController::class, 'home_rpst'])->name('rpst.home_rpst');//




//********************* */ KTB CLAIM  ***********************************
Route::match(['get','post'],'ktb',[App\Http\Controllers\KTBController::class, 'ktb'])->name('k.ktb');//
Route::match(['get','post'],'ktb_search',[App\Http\Controllers\KTBController::class, 'ktb_search'])->name('k.ktb_search');//
Route::match(['get','post'],'ktb_ancdental_search',[App\Http\Controllers\KTBController::class, 'ktb_ancdental_search'])->name('k.ktb_ancdental_search');//

Route::match(['get','post'],'ktb_ferrofolic',[App\Http\Controllers\KTBController::class, 'ktb_ferrofolic'])->name('k.ktb_ferrofolic');//
Route::match(['get','post'],'ktb_ferrofolic_search',[App\Http\Controllers\KTBController::class, 'ktb_ferrofolic_search'])->name('k.ktb_ferrofolic_search');//

Route::match(['get','post'],'ktb_kids_glasses',[App\Http\Controllers\KTBController::class, 'ktb_kids_glasses'])->name('k.ktb_kids_glasses');//
Route::match(['get','post'],'ktb_kids_glasses_search',[App\Http\Controllers\KTBController::class, 'ktb_kids_glasses_search'])->name('k.ktb_kids_glasses_search');//

Route::match(['get','post'],'anc_Pregnancy_test',[App\Http\Controllers\KTBController::class, 'anc_Pregnancy_test'])->name('k.anc_Pregnancy_test');//
Route::match(['get','post'],'anc_Pregnancy_testsearch',[App\Http\Controllers\KTBController::class, 'anc_Pregnancy_testsearch'])->name('k.anc_Pregnancy_testsearch');//
Route::match(['get','post'],'anc_Pregnancy_test_export',[App\Http\Controllers\KTBController::class, 'anc_Pregnancy_test_export'])->name('k.anc_Pregnancy_test_export');//

Route::match(['get','post'],'ktb_spawn',[App\Http\Controllers\KTBController::class, 'ktb_spawn'])->name('k.ktb_spawn');//การตรวจหลังคลอด ANC


Route::match(['get','post'],'timein',[App\Http\Controllers\TimeINController::class, 'timein'])->name('TT.timein');//ลงเวลา
Route::match(['get','post'],'timein_save',[App\Http\Controllers\TimeINController::class, 'timein_save'])->name('TT.timein_save');//ลงเวลา

 //********************* */ ENV  ***********************************

 Route::match(['get','post'],'env_dashboard',[App\Http\Controllers\EnvController::class, 'env_dashboard'])->name('env.env_dashboard');//

 //บ่อบำบัด
 //ตั้งค่า parameter น้ำ
 Route::match(['get','post'],'env_water_parameter',[App\Http\Controllers\EnvController::class, 'env_water_parameter'])->name('env.env_water_parameter');//หน้าหลักแสดงข้อมูล
 Route::match(['get','post'],'env_water_parameter_add',[App\Http\Controllers\EnvController::class, 'env_water_parameter_add'])->name('env.env_water_parameter_add');//เพิ่มข้อมูล
 Route::match(['get','post'],'env_water_parameter_save',[App\Http\Controllers\EnvController::class, 'env_water_parameter_save'])->name('env.env_water_parameter_save');//บันทึก
 Route::match(['get','post'],'env_water_parameter_edit/{id}',[App\Http\Controllers\EnvController::class, 'env_water_parameter_edit'])->name('env.env_water_parameter_edit');//แก้ไข
 Route::match(['get','post'],'env_water_parameter_update',[App\Http\Controllers\EnvController::class, 'env_water_parameter_update'])->name('env.env_water_parameter_update');//อัพเดท
 Route::match(['get','post'],'env_water_parameter_delete/{id}',[App\Http\Controllers\EnvController::class, 'env_water_parameter_delete'])->name('env.env_water_parameter_delete');//ลบข้อมูล
 
 //ลงผลข้อมูลน้ำ บ่อบำบัด
 Route::match(['get','post'],'env_water',[App\Http\Controllers\EnvController::class, 'env_water'])->name('env.env_water');//หน้าหลักแสดงข้อมูล
 Route::match(['get','post'],'env_water_add',[App\Http\Controllers\EnvController::class, 'env_water_add'])->name('env.env_water_add');//เพิ่มข้อมูล
 Route::match(['get','post'],'env_water_save',[App\Http\Controllers\EnvController::class, 'env_water_save'])->name('env.env_water_save');//บันทึก
 Route::match(['get','post'],'env_water_datetime',[App\Http\Controllers\EnvController::class, 'env_water_datetime'])->name('env.env_water_datetime');//ค้นตามช่วงวันที่
 
 
 //ขยะ
 //ตั้งค่าประเภทขยะ
 Route::match(['get','post'],'env_trash_parameter',[App\Http\Controllers\EnvController::class, 'env_trash_parameter'])->name('env.env_trash_parameter');//หน้าหลักแสดงข้อมูล
 Route::match(['get','post'],'env_trash_parameter_add',[App\Http\Controllers\EnvController::class, 'env_trash_parameter_add'])->name('env.env_trash_parameter_add');//เพิ่ม
 Route::match(['get','post'],'env_trash_parameter_save',[App\Http\Controllers\EnvController::class, 'env_trash_parameter_save'])->name('env.env_trash_parameter_save');//บันทึก
 Route::match(['get','post'],'env_trash_parameter_edit/{id}',[App\Http\Controllers\EnvController::class, 'env_trash_parameter_edit'])->name('env.env_trash_parameter_edit');//แก้ไข
 Route::match(['get','post'],'env_trash_parameter_update',[App\Http\Controllers\EnvController::class, 'env_trash_parameter_update'])->name('env.env_trash_parameter_update');//อัพเดท
 Route::match(['get','post'],'env_trash_parameter_delete/{id}',[App\Http\Controllers\EnvController::class, 'env_trash_parameter_delete'])->name('env.env_trash_parameter_delete');//ลบข้อมูล
 
 //ลงผลข้อมูลขยะ
 Route::match(['get','post'],'env_trash',[App\Http\Controllers\EnvController::class, 'env_trash'])->name('env.env_trash');//หน้าหลักแสดงข้อมูล
 Route::match(['get','post'],'env_trash_add',[App\Http\Controllers\EnvController::class, 'env_trash_add'])->name('env.env_trash_add');//เพิ่มข้อมูล
 Route::match(['get','post'],'env_trash_save',[App\Http\Controllers\EnvController::class, 'env_trash_save'])->name('env.env_trash_save');//บันทึก

});
