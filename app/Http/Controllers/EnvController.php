<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Validator;
use App\Models\User;
use App\Models\Ot_one;
use PDF;
use setasign\Fpdi\Fpdi;
use App\Models\Budget_year;
use Illuminate\Support\Facades\File;
use DataTables;
use Intervention\Image\ImageManagerStatic as Image;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\OtExport;
// use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Department;
use App\Models\Departmentsub;
use App\Models\Departmentsubsub;
use App\Models\Position;
use App\Models\Product_spyprice;
use App\Models\Products;
use App\Models\Products_type;
use App\Models\Product_group;
use App\Models\Product_unit;
use App\Models\Products_category;
use App\Models\Article;
use App\Models\Product_prop;
use App\Models\Product_decline;
use App\Models\Department_sub_sub;
use App\Models\Products_vendor;
use App\Models\Status; 
use App\Models\Products_request;
use App\Models\Products_request_sub;   
use App\Models\Leave_leader;
use App\Models\Leave_leader_sub;
use App\Models\Book_type;
use App\Models\Book_import_fam;
use App\Models\Book_signature;
use App\Models\Bookrep;
use App\Models\Book_objective;
use App\Models\Book_senddep;
use App\Models\Book_senddep_sub;
use App\Models\Book_send_person;
use App\Models\Book_sendteam;
use App\Models\Bookrepdelete;
use App\Models\Car_status;
use App\Models\Car_index;
use App\Models\Article_status;
use App\Models\Car_type;
use App\Models\Product_brand;
use App\Models\Product_color;  
use App\Models\Leave_month;
use App\Models\P4p_workload;
use App\Models\P4p_work_position;
use App\Models\P4p_work_score;
use App\Models\P4p_work;
use App\Models\P4p_workset;
use App\Models\P4p_workgroupset_unit;
use App\Models\P4p_workgroupset;

use App\Models\Env_parameter_list;

use App\Models\Env_trash_set;
use App\Models\Env_trash_sub;
use App\Models\Env_trash_type;
use App\Models\Env_trash;

use App\Models\Env_water_save;
use App\Models\Env_water_sub;
use App\Models\Env_water;

use App\Models\Env_trash_parameter;
use Auth;

class EnvController extends Controller
{
      
    public function env_dashboard (Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();

        $acc_debtors = DB::select('
            SELECT count(*) as I from users u
            left join p4p_workload l on l.p4p_workload_user=u.id
            group by u.dep_subsubtrueid;
        ');
         

        return view('env.env_dashboard', $data,[
            'start' => $datestart,
            'end' => $dateend, 
        ]);
    }

//**************************************************************ระบบน้ำเสีย*********************************************

    public function env_water (Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();

        $acc_debtors = DB::select('
            SELECT count(*) as I from users u
            left join p4p_workload l on l.p4p_workload_user=u.id
            group by u.dep_subsubtrueid;
        ');
         

        return view('env.env_water', $data,[
            'startdate' => $datestart,
            'enddate' => $dateend, 
        ]);
    }

    public function env_water_add (Request $request)
    {
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();

        $acc_debtors = DB::select('
            SELECT count(*) as I from users u
            left join p4p_workload l on l.p4p_workload_user=u.id
            group by u.dep_subsubtrueid;
        ');


        $data_parameter = DB::table('env_parameter_list')->get();
         

        return view('env.env_water_add', $data,[
            'start'           => $startdate,
            'end'             => $enddate, 
            'dataparameters'  => $data_parameter, 
        ]);
    }

    public function env_water_save (Request $request)
    {

        // $datenow = date('Y-m-d H:m:s');
        // Env_parameter_list::insert([
        //     'parameter_list_name'                   => $request->parameter_list_name,
        //     'parameter_list_unit'                   => $request->parameter_list_unit,
        //     'parameter_list_normal'                 => $request->parameter_list_normal,
        //     'parameter_list_user_analysis_results'  => $request->parameter_list_user_analysis_results,
        //     'created_at'                            => $datenow
        // ]);
        // $data_parameter_list = DB::table('env_parameter_list')->get();
    
        // return redirect()->route('env.env_water_parameter');


        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();

        $acc_debtors = DB::select('
            SELECT count(*) as I from users u
            left join p4p_workload l on l.p4p_workload_user=u.id
            group by u.dep_subsubtrueid;
        ');


        $data_parameter = DB::table('env_parameter_list')->get();
         

        return view('env.env_water_save', $data,[
            'start'           => $startdate,
            'end'             => $enddate, 
            'dataparameters'  => $data_parameter, 
        ]);
    }

    public function env_water_datetime (Request $request)
    { 
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        
        
        return view('env.env_water', [
            'startdate'  =>  $startdate,
            'enddate'    =>  $enddate,

        ]);
    }
//**************************************************************ตั้งค่า parameter น้ำ*********************************************

    public function env_water_parameter (Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();
 
        $data_parameter_list = DB::table('env_parameter_list')->get();
         

        return view('env.env_water_parameter', $data,[
            'startdate' => $datestart,
            'enddate' => $dateend,
            'dataparameterlist' => $data_parameter_list, 
        ]);
    }

    public function env_water_parameter_add (Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();

        $acc_debtors = DB::select('
            SELECT count(*) as I from users u
            left join p4p_workload l on l.p4p_workload_user=u.id
            group by u.dep_subsubtrueid;
        ');

        $data_parameter = DB::table('env_parameter_list')->get();
         

        return view('env.env_water_parameter_add', $data,[
            'startdate'        => $datestart,
            'enddate'          => $dateend, 
            'dataparameters'  => $data_parameter, 
        ]);
    }

    public function env_water_parameter_edit (Request $request,$id)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();
 
        $data_edit = DB::table('env_parameter_list')->where('parameter_list_id','=',$id)->first();

        return view('env.env_water_parameter_edit', $data,[
            'startdate'        => $datestart,
            'enddate'          => $dateend, 
            'data_edit'        => $data_edit, 
        ]);
    }

    public function env_water_parameter_save (Request $request)
    {  
        $datenow = date('Y-m-d H:m:s');
        Env_parameter_list::insert([
            'parameter_list_name'                   => $request->parameter_list_name,
            'parameter_list_unit'                   => $request->parameter_list_unit,
            'parameter_list_normal'                 => $request->parameter_list_normal,
            'parameter_list_user_analysis_results'  => $request->parameter_list_user_analysis_results,
            'created_at'                            => $datenow
        ]);
        $data_parameter_list = DB::table('env_parameter_list')->get();
    
        return redirect()->route('env.env_water_parameter');

    }

    public function env_water_parameter_update  (Request $request)
    { 
        $datenow = date('Y-m-d H:m:s');
        $id = $request->parameter_list_id;
        // DB::table('env_parameter_list')->where('parameter_list_id','=',$id)
        Env_parameter_list::where('parameter_list_id','=',$id)
        ->update([
            'parameter_list_name'                   => $request->parameter_list_name,
            'parameter_list_unit'                   => $request->parameter_list_unit,
            'parameter_list_normal'                 => $request->parameter_list_normal,
            'parameter_list_user_analysis_results'  => $request->parameter_list_user_analysis_results, 
            'updated_at'                            => $datenow
        ]);

        $data_parameter_list = DB::table('env_parameter_list')->get();
        // return redirect()->back();
        return redirect()->route('env.env_water_parameter');
        // return view('env.env_water_parameter',[ 
        //     'dataparameterlist' => $data_parameter_list, 
        // ]);
    }

    public function env_water_parameter_delete (Request $request,$id)
    {
       $del = Env_parameter_list::find($id);  
       $del->delete(); 

        return redirect()->back();
    }

//**************************************************************ระบบขยะติดเชื้อ*********************************************

    public function env_trash (Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();

        $trash = DB::table('env_trash')->leftjoin('hrd_person','env_trash.trash_user','=','hrd_person.ID')
            ->leftjoin('env_trash_type','env_trash.trash_user','=','env_trash_type.trash_type_id')
            ->leftjoin('products_vendor','env_trash.trash_sub','=','products_vendor.vendor_id');

        $trash_type = DB::table('env_trash_type') ->get();
        
        // $acc_debtors = DB::select('SELECT count(*) as I from users u
        //     left join p4p_workload l on l.p4p_workload_user=u.id
        //     group by u.dep_subsubtrueid;
        // ');
         
        return view('env.env_trash',[
            'startdate' => $datestart,
            'enddate' => $dateend,
            'trashs'=>$trash,
            'trash_type'=>$trash_type,

        ]);
    }

    public function env_trash_add (Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();

        $acc_debtors = DB::select('
            SELECT count(*) as I from users u
            left join p4p_workload l on l.p4p_workload_user=u.id
            group by u.dep_subsubtrueid;
        ');        

        $data_parameter = DB::table('env_trash')->get();
        $data_trash_set = DB::table('env_trash_set')->get();
        $data_trash_sub = DB::table('env_trash_sub')->get();
        $data_trash_type = DB::table('env_trash_type')->get();
        $data['products_vendor'] = Products_vendor::get();

        $maxnum = Env_trash::max('trash_bill_on'); //****รันเลขที่อัตโนมัติ */
        if($maxnum != '' ||  $maxnum != null){
         $refmax = Env_trash::where('trash_bill_on','=',$maxnum)->first();

         if($refmax->trash_bill_on != '' ||  $refmax->trash_bill_on != null){
         $maxpo = substr($refmax->trash_bill_on, -2)+1;
         }else{
         $maxref = 1;
         }
         $refe = str_pad($maxpo, 5, "0", STR_PAD_LEFT);
         }else{
        $refe = '00001';
         }
         $billNo = 'TRA'.'-'.$refe;
         

        return view('env.env_trash_add', $data,[
            'startdate'        => $datestart,
            'enddate'          => $dateend, 
            'dataparameters'   => $data_parameter,
            'data_trash_set'   => $data_trash_set,
            'data_trash_sub'   => $data_trash_sub,
            'data_trash_type'  => $data_trash_type,
            'billNos'          => $billNo,
        ]);

    }

    public function env_trash_save (Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');

        $data_parameter = DB::table('env_trash_set')->get();

        $add = new env_trash();
        $add->trash_bill_on = $request->input('trash_bill_on');
        $add->trash_date = $request->input('trash_date'); 
        $add->trash_time = $request->input('trash_time'); 
        $add->trash_user = $request->input('trash_user'); 
        $add->trash_sub = $request->input('trash_sub'); 
        $add->save();
        
        $id_para =  Env_trash::max('trash_id');

        if($request->trash_set_id != '' || $request->trash_set_id != null){

        $trash_set_id = $request->trash_set_id;
        $TRASH_SUB_QTY = $request->TRASH_SUB_QTY;
        $TRASH_SUB_UNIT = $request->TRASH_SUB_UNIT;
                            
        $number =count($trash_set_id);
        $count = 0;
            for($count = 0; $count< $number; $count++)
            { 
                $idtrash = Env_trash_set::where('trash_set_id','=',$trash_set_id[$count])->first();

                $add_sub = new Env_trash_sub();
                $add_sub->trash_id = $id_para; 
                $add_sub->TRASH_SUB_IDID = $idtrash->trash_set_id;  
                $add_sub->TRASH_SUB_NAME = $idtrash->SET_TRASH_NAME; 
                $add_sub->TRASH_SUB_QTY = $TRASH_SUB_QTY[$count];  
                $add_sub->TRASH_SUB_UNIT = $TRASH_SUB_UNIT[$count];                          
                $add_sub->save(); 
            }
        } 
        return redirect()->route('env.env_trash');
        // return redirect()->route('env.env_trash');
    }

//**************************************************************ตั้งค่า   ประเภทขยะ*********************************************

    public function env_trash_parameter (Request $request) 
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();
 
        $data_parameter_list = DB::table('env_trash_set')->get();
         

        return view('env.env_trash_parameter', $data,[
            'startdate' => $datestart,
            'enddate' => $dateend,
            'dataparameterlist' => $data_parameter_list, 
        ]);
    }

    public function env_trash_parameter_add (Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();

        $acc_debtors = DB::select('
            SELECT count(*) as I from users u
            left join p4p_workload l on l.p4p_workload_user=u.id
            group by u.dep_subsubtrueid;
        ');

        $data_parameter = DB::table('env_trash_set')->get();
         

        return view('env.env_trash_parameter_add', $data,[
            'startdate'        => $datestart,
            'enddate'          => $dateend, 
            'dataparameters'  => $data_parameter, 
        ]);
    }

    public function env_trash_parameter_edit (Request $request,$id)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        $iduser = Auth::user()->id;
        $data['users'] = User::get();
        $data['leave_month'] = DB::table('leave_month')->get();
        $data['users_group'] = DB::table('users_group')->get();
        $data['p4p_workgroupset'] = P4p_workgroupset::where('p4p_workgroupset_user','=',$iduser)->get();
 
        $data_edit = DB::table('env_trash_set')->where('trash_set_id','=',$id)->first();

        return view('env.env_trash_parameter_edit', $data,[
            'startdate'        => $datestart,
            'enddate'          => $dateend, 
            'data_edit'        => $data_edit, 
        ]);
    }

    public function env_trash_parameter_save (Request $request)
    {  
        $datenow = date('Y-m-d H:m:s');

        Env_trash_set::insert([
            // 'trash_set_id'                    => $request->trash_set_id,
            'trash_set_name'                   => $request->trash_set_name,
            'trash_set_unit'                   => $request->trash_set_unit,
            'created_at'                       => $datenow
        ]);
        $data_parameter_list = DB::table('env_trash_set')->get();
    
        return redirect()->route('env.env_trash_parameter');

    }

    public function env_trash_parameter_update  (Request $request)
    { 
        $datenow = date('Y-m-d H:m:s');
        $id = $request->trash_set_id;
        // DB::table('env_parameter_list')->where('parameter_list_id','=',$id)
        Env_trash_set::where('trash_set_id','=',$id)
        ->update([
            'trash_set_name'                       => $request->trash_set_name,
            'trash_set_unit'                       => $request->trash_set_unit,
            // 'parameter_list_normal'                 => $request->parameter_list_normal,
            // 'parameter_list_user_analysis_results'  => $request->parameter_list_user_analysis_results, 
            'updated_at'                            => $datenow
        ]);

        $data_parameter_list = DB::table('env_trash_type')->get();
        // return redirect()->back();
        return redirect()->route('env.env_trash_parameter');
        // return view('env.env_water_parameter',[ 
        //     'dataparameterlist' => $data_parameter_list, 
        // ]);
    }

    public function env_trash_parameter_delete (Request $request,$id)
    {
       $del = Env_trash_set::find($id);  
       $del->delete(); 

        return redirect()->back();
    }


}