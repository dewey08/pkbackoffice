<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Validator;
use App\Models\User;
use App\Models\Acc_debtor;
use App\Models\Pttype_eclaim;
use App\Models\Account_listpercen;
use App\Models\Leave_month;
use App\Models\Acc_debtor_stamp;
use App\Models\Acc_debtor_sendmoney;
use App\Models\Pttype;
use App\Models\Pttype_acc;
use App\Models\Acc_stm_ti;
use App\Models\Acc_stm_ti_total;
use App\Models\Acc_opitemrece;
use App\Models\Acc_1102050101_202;
use App\Models\Acc_1102050101_217;
use App\Models\Acc_1102050101_2166;
use App\Models\Acc_stm_ucs;
use App\Models\Acc_1102050101_304;
use App\Models\Acc_1102050101_308;
use App\Models\Acc_1102050101_4011;
use App\Models\Acc_1102050101_3099;
use App\Models\Acc_1102050101_401;
use App\Models\Acc_1102050101_402;
use App\Models\Acc_1102050102_801;
use App\Models\Acc_1102050102_802;
use App\Models\Acc_1102050102_803;
use App\Models\Acc_1102050102_804;
use App\Models\Acc_1102050101_4022;
use App\Models\Acc_1102050102_602;
use App\Models\Acc_1102050102_603;
use App\Models\Acc_stm_prb;
use App\Models\Acc_stm_ti_totalhead;
use App\Models\Acc_stm_ti_excel;
use App\Models\Acc_stm_ofc;
use App\Models\acc_stm_ofcexcel;
use App\Models\Acc_stm_lgo;
use App\Models\Acc_stm_lgoexcel;
use App\Models\Check_sit_auto;
use App\Models\Acc_stm_ucs_excel;

use PDF;
use setasign\Fpdi\Fpdi;
use App\Models\Budget_year;
use Illuminate\Support\Facades\File;
use DataTables;
use Intervention\Image\ImageManagerStatic as Image;
use App\Mail\DissendeMail;
use Mail;
use Illuminate\Support\Facades\Storage;
use Auth;
use Http;
use SoapClient;
// use File;
// use SplFileObject;
use Arr;
// use Storage;
use GuzzleHttp\Client;

use App\Imports\ImportAcc_stm_ti;
use App\Imports\ImportAcc_stm_tiexcel_import;
use App\Imports\ImportAcc_stm_ofcexcel_import;
use App\Imports\ImportAcc_stm_lgoexcel_import;
use App\Models\Acc_1102050101_217_stam;
use App\Models\Acc_opitemrece_stm;

use SplFileObject;
use PHPExcel;
use PHPExcel_IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

date_default_timezone_set("Asia/Bangkok");


class Account301Controller extends Controller
 {
    // ***************** 301********************************
     
    public function account_301_dash(Request $request)
    {
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $dabudget_year = DB::table('budget_year')->where('active','=',true)->first();
        $leave_month_year = DB::table('leave_month')->orderBy('MONTH_ID', 'ASC')->get();
        $date = date('Y-m-d');
        $y = date('Y') + 543;
        $newweek = date('Y-m-d', strtotime($date . ' -1 week')); //ย้อนหลัง 1 สัปดาห์
        $newDate = date('Y-m-d', strtotime($date . ' -5 months')); //ย้อนหลัง 5 เดือน
        $newyear = date('Y-m-d', strtotime($date . ' -1 year')); //ย้อนหลัง 1 ปี

        if ($startdate == '') {
            $datashow = DB::select('
                SELECT month(a.vstdate) as months,year(a.vstdate) as year,l.MONTH_NAME
                    ,count(distinct a.hn) as hn
                    ,count(distinct a.vn) as vn
                    ,sum(a.paid_money) as paid_money
                    ,sum(a.income) as income
                    ,sum(a.income)-sum(a.discount_money)-sum(a.rcpt_money) as total
                    FROM acc_debtor a
                    left outer join leave_month l on l.MONTH_ID = month(a.vstdate)
                    WHERE a.vstdate between "'.$newyear.'" and "'.$date.'"
                    and account_code="1102050101.301"
                    and income <> 0
                    group by month(a.vstdate) order by month(a.vstdate) desc limit 3;
            ');

        } else {
            $datashow = DB::select('
                SELECT month(a.vstdate) as months,year(a.vstdate) as year,l.MONTH_NAME
                    ,count(distinct a.hn) as hn
                    ,count(distinct a.vn) as vn
                    ,sum(a.paid_money) as paid_money
                    ,sum(a.income) as income
                    ,sum(a.income)-sum(a.discount_money)-sum(a.rcpt_money) as total
                    FROM acc_debtor a
                    left outer join leave_month l on l.MONTH_ID = month(a.vstdate)
                    WHERE a.vstdate between "'.$startdate.'" and "'.$enddate.'"
                    and account_code="1102050101.301"
                    and income <>0
                    group by month(a.vstdate) order by month(a.vstdate) desc;
            ');
        }

        return view('account_pk.account_301_dash',[
            'startdate'        => $startdate,
            'enddate'          => $enddate,
            'leave_month_year' => $leave_month_year,
            'datashow'         => $datashow,
            'newyear'          => $newyear,
            'date'             => $date,
        ]);
    }

    public function account_301_pull(Request $request)
    {
        $datenow = date('Y-m-d');
        $months = date('m');
        $year = date('Y');
        // dd($year);
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        if ($startdate == '') {
            // $acc_debtor = Acc_debtor::where('stamp','=','N')->whereBetween('dchdate', [$datenow, $datenow])->get();
            $acc_debtor = DB::select('
                SELECT a.*,c.subinscl from acc_debtor a
                left outer join check_sit_auto c on c.hn = a.hn and c.vstdate = a.vstdate
                WHERE a.account_code="1102050101.401"
                AND a.stamp = "N"
                group by a.vn
                order by a.vstdate asc;

            ');
            // and month(a.dchdate) = "'.$months.'" and year(a.dchdate) = "'.$year.'"
        } else {
            // $acc_debtor = Acc_debtor::where('stamp','=','N')->whereBetween('dchdate', [$startdate, $enddate])->get();
        }

        return view('account_pk.account_301_pull',[
            'startdate'     =>     $startdate,
            'enddate'       =>     $enddate,
            'acc_debtor'    =>     $acc_debtor,
        ]);
    }
    public function account_301_pulldata(Request $request)
    {
        $datenow = date('Y-m-d');
        $startdate = $request->datepicker;
        $enddate = $request->datepicker2;
        // Acc_opitemrece::truncate();
        $acc_debtor = DB::connection('mysql3')->select('
            SELECT o.vn,ifnull(o.an,"") as an,o.hn,showcid(pt.cid) as cid
                    ,concat(pt.pname,pt.fname," ",pt.lname) as ptname
                    ,setdate(o.vstdate) as vstdate,totime(o.vsttime) as vsttime
                    ,v.hospmain,op.income as income_group
                    ,o.vstdate as vstdatesave
                    ,seekname(o.pt_subtype,"pt_subtype") as ptsubtype
                    ,ptt.pttype_eclaim_id
                    ,o.pttype
                    ,e.gf_opd as gfmis,e.code as acc_code
                    ,e.ar_opd as account_code
                    ,e.name as account_name
                    ,v.income,v.uc_money,v.discount_money,v.paid_money,v.rcpt_money
                    ,v.rcpno_list as rcpno
                    ,v.income-v.discount_money-v.rcpt_money as debit
                    ,if(op.icode IN ("3010058"),sum_price,0) as fokliad
                    ,sum(if(op.income="02",sum_price,0)) as debit_instument
                    ,sum(if(op.icode IN("1560016","1540073","1530005","1540048","1620015","1600012","1600015"),sum_price,0)) as debit_drug
                    ,sum(if(op.icode IN ("3001412","3001417"),sum_price,0)) as debit_toa
                    ,sum(if(op.icode IN ("3010829","3010726 "),sum_price,0)) as debit_refer
                    ,ptt.max_debt_money
            from ovst o
            left join vn_stat v on v.vn=o.vn
            left join patient pt on pt.hn=o.hn
            LEFT JOIN pttype ptt on o.pttype=ptt.pttype
            LEFT JOIN pttype_eclaim e on e.code=ptt.pttype_eclaim_id
            LEFT JOIN opitemrece op ON op.vn = o.vn
            WHERE o.vstdate BETWEEN "' . $startdate . '" AND "' . $enddate . '"
            AND v.pttype = "A7"
            and (o.an="" or o.an is null)
            GROUP BY o.vn
        ');

        foreach ($acc_debtor as $key => $value) {
                    $check = Acc_debtor::where('vn', $value->vn)->where('account_code','1102050101.301')->whereBetween('vstdate', [$startdate, $enddate])->count();
                    if ($check == 0) {
                        Acc_debtor::insert([
                            'hn'                 => $value->hn,
                            'an'                 => $value->an,
                            'vn'                 => $value->vn,
                            'cid'                => $value->cid,
                            'ptname'             => $value->ptname,
                            'pttype'             => $value->pttype,
                            'vstdate'            => $value->vstdatesave,
                            'acc_code'           => $value->acc_code,
                            'account_code'       => $value->account_code,
                            'account_name'       => $value->account_name,
                            'income_group'       => $value->income_group,
                            'income'             => $value->income,
                            'uc_money'           => $value->uc_money,
                            'discount_money'     => $value->discount_money,
                            'paid_money'         => $value->paid_money,
                            'rcpt_money'         => $value->rcpt_money,
                            'debit'              => $value->debit,
                            'debit_drug'         => $value->debit_drug,
                            'debit_instument'    => $value->debit_instument,
                            'debit_toa'          => $value->debit_toa,
                            'debit_refer'        => $value->debit_refer,
                            'debit_refer'        => $value->debit_refer,
                            'fokliad'            => $value->fokliad,
                            'debit_total'        => $value->debit,
                            'max_debt_amount'    => $value->max_debt_money,
                            'acc_debtor_userid'  => Auth::user()->id
                        ]);
                    }
                    if ($value->fokliad > 0 && $value->pang_debit =='1102050101.301') {
                        $checkins = Acc_debtor::where('an', $value->an)->where('account_code', '1102050101.217')->count();

                        if ($checkins == 0) {
                            Acc_debtor::insert([
                                'hn'                 => $value->hn,
                                'an'                 => $value->an,
                                'vn'                 => $value->vn,
                                'cid'                => $value->cid,
                                'ptname'             => $value->fullname,
                                'pttype'             => $value->pttype,
                                'vstdate'            => $value->vstdate,
                                'regdate'            => $value->admdate,
                                'dchdate'            => $value->dchdate,
                                'acc_code'           => "03",
                                'account_code'       => '1102050101.217',
                                'account_name'       => 'บริการเฉพาะ(CR)',
                                'income_group'       => '02',
                                'debit'              => $value->debit_instument,
                                'debit_ipd_total'    => $value->debit_instument
                            ]);
                        }
                }

        }

            return response()->json([

                'status'    => '200'
            ]);
    }
    public function account_301_stam(Request $request)
    {
        $id = $request->ids;
        $iduser = Auth::user()->id;
        $data = Acc_debtor::whereIn('acc_debtor_id',explode(",",$id))->get();
            Acc_debtor::whereIn('acc_debtor_id',explode(",",$id))
                    ->update([
                        'stamp' => 'Y'
                    ]);
        foreach ($data as $key => $value) {
                $date = date('Y-m-d H:m:s');
            //  $check = Acc_debtor::where('vn', $value->vn)->where('account_code','1102050101.4011')->where('account_code','1102050101.4011')->count();
                $check = Acc_debtor::where('vn', $value->vn)->where('debit_total','=','0')->count();
                if ($check > 0) {
                # code...
                } else {
                    Acc_1102050101_401::insert([
                            'vn'                => $value->vn,
                            'hn'                => $value->hn,
                            'an'                => $value->an,
                            'cid'               => $value->cid,
                            'ptname'            => $value->ptname,
                            'vstdate'           => $value->vstdate,
                            'regdate'           => $value->regdate,
                            'dchdate'           => $value->dchdate,
                            'pttype'            => $value->pttype,
                            'pttype_nhso'       => $value->pttype_spsch,
                            'acc_code'          => $value->acc_code,
                            'account_code'      => $value->account_code,
                            'income'            => $value->income,
                            'income_group'      => $value->income_group,
                            'uc_money'          => $value->uc_money,
                            'discount_money'    => $value->discount_money,
                            'rcpt_money'        => $value->rcpt_money,
                            'debit'             => $value->debit,
                            'debit_drug'        => $value->debit_drug,
                            'debit_instument'   => $value->debit_instument,
                            'debit_refer'       => $value->debit_refer,
                            'debit_toa'         => $value->debit_toa,
                            'debit_total'       => $value->debit,
                            'max_debt_amount'   => $value->max_debt_amount,
                            'acc_debtor_userid' => $iduser
                    ]);
                }

        }
        return response()->json([
            'status'    => '200'
        ]);
    }
    public function account_301_detail(Request $request,$months,$year)
    {
        $datenow = date('Y-m-d');
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        // dd($id);
        $data['users'] = User::get();

        $data = DB::select('
        SELECT U2.repno,U1.vn,U1.hn,U1.cid,U1.ptname,U1.vstdate,U1.pttype,U1.debit_total,U2.pricereq_all,U2.STMdoc
            from acc_1102050101_401 U1
            LEFT JOIN acc_stm_ofc U2 ON U2.hn = U1.hn AND U2.vstdate = U1.vstdate
            WHERE month(U1.vstdate) = "'.$months.'" and year(U1.vstdate) = "'.$year.'"
            GROUP BY U1.vn
        ');

        return view('account_pk.account_301_detail', $data, [
            'startdate'     =>     $startdate,
            'enddate'       =>     $enddate,
            'data'          =>     $data,
            'months'        =>     $months,
            'year'          =>     $year
        ]);
    }
    public function account_301_stm(Request $request,$months,$year)
    {
        $datenow = date('Y-m-d');
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        // dd($id);
        $data['users'] = User::get();

        $datashow = DB::select('
        SELECT U2.repno,U1.vn,U1.hn,U1.cid,U1.ptname,U1.vstdate,U1.pttype,U1.debit_total,SUM(U2.pricereq_all) as pricereq_all,U2.STMdoc
            from acc_1102050101_401 U1
            LEFT JOIN acc_stm_ofc U2 ON U2.hn = U1.hn AND U2.vstdate = U1.vstdate
            WHERE month(U1.vstdate) = "'.$months.'"
            and year(U1.vstdate) = "'.$year.'"
            AND U2.pricereq_all IS NOT NULL
            GROUP BY U1.vn
        ');
        return view('account_pk.account_301_stm', $data, [
            'startdate'         =>     $startdate,
            'enddate'           =>     $enddate,
            'datashow'          =>     $datashow,
            'months'            =>     $months,
            'year'              =>     $year,

        ]);
    }
    public function account_301_stmnull(Request $request,$months,$year)
    {
        $datenow = date('Y-m-d');
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        // dd($id);
        $data['users'] = User::get();

        $datashow = DB::connection('mysql')->select('
                SELECT U2.repno,U1.vn,U1.hn,U1.cid,U1.ptname,U1.vstdate,U1.pttype,U1.debit_total,U2.pricereq_all,U2.STMdoc
                from acc_1102050101_401 U1
                LEFT JOIN acc_stm_ofc U2 ON U2.hn = U1.hn AND U2.vstdate = U1.vstdate
                WHERE month(U1.vstdate) = "'.$months.'" and year(U1.vstdate) = "'.$year.'"
                AND U1.status ="N"
            ');


        return view('account_pk.account_301_stmnull', $data, [
            'startdate'         =>     $startdate,
            'enddate'           =>     $enddate,
            'datashow'          =>     $datashow,
            'months'            =>     $months,
            'year'              =>     $year,
        ]);
    }

    public function account_301_stmnull_all(Request $request,$months,$year)
    {
        $datenow = date('Y-m-d');
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        // dd($id);
        $data['users'] = User::get();
        $mototal = $months + 1;
        $datashow = DB::connection('mysql')->select('
                SELECT U2.repno,U1.vn,U1.hn,U1.cid,U1.ptname,U1.vstdate,U1.pttype,U1.debit_total,SUM(U2.pricereq_all) as pricereq_all,U2.STMdoc
                from acc_1102050101_401 U1
                LEFT JOIN acc_stm_ofc U2 ON U2.hn = U1.hn AND U2.vstdate = U1.vstdate
                WHERE U1.status ="N"
                AND U2.pricereq_all IS NULL
                GROUP BY U1.vn
            ');
        return view('account_pk.account_301_stmnull_all', $data, [
            'startdate'         =>     $startdate,
            'enddate'           =>     $enddate,
            'datashow'          =>     $datashow,
            'months'            =>     $months,
            'year'              =>     $year,
        ]);
    }

 }