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
// use Illuminate\Support\Facades\File;
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
use App\Models\Aipn_stm;
use App\Models\Status; 
use App\Models\Aipn_ipdx;
use App\Models\Aipn_ipop;   
use App\Models\Aipn_session;
use App\Models\Aipn_billitems;
use App\Models\Aipn_ipadt;
use App\Models\Check_sit;
use App\Models\Stm;
use App\Models\Ssop_session;
use App\Models\Ssop_opdx;
use App\Models\Pang_stamp_temp;
use App\Models\Ssop_token;
use App\Models\Ssop_opservices;
use App\Models\Ssop_dispenseditems;
use App\Models\Ssop_dispensing;
use App\Models\Ssop_billtran;
use App\Models\Ssop_billitems;
use App\Models\Claim_ssop;
use App\Models\Claim_sixteen_dru;
use App\Models\claim_sixteen_adp;
use App\Models\Claim_sixteen_cha;  
use App\Models\Claim_sixteen_cht;
use App\Models\Claim_sixteen_oop;
use App\Models\Claim_sixteen_odx;
use App\Models\Claim_sixteen_orf;
use App\Models\Claim_sixteen_pat;
use App\Models\Claim_sixteen_ins;
use App\Models\Claim_temp_ssop;
use App\Models\Claim_sixteen_opd;
use Auth;
use ZipArchive;
use Storage;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\If_;
use Stevebauman\Location\Facades\Location; 
use SoapClient; 
use SplFileObject;
use File;
use Illuminate\Filesystem\Filesystem;
 

class ClaimreferController extends Controller
{
    public function sixteendata(Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate; 
             
        return view('claim.sixteendata',[
            'datestart'                => $datestart,
            'dateend'                  => $dateend, 
        ]);
    }
    public function sixteendata_pull(Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate; 
        $aipn_data = DB::connection('mysql3')->select('   
        SELECT
            i.an,  
            i.an as AN,i.hn as HN
            ,showcid(if(pt.nationality=99,pt.cid,pc.cardno)) as PIDPAT
            ,pt.pname as TITLE
            ,concat(pt.fname," ",pt.lname) as NAMEPAT 
            ,pt.birthday as DOB
            ,a.sex as SEX
            ,pt.marrystatus as MARRIAGE
            ,pt.chwpart as CHANGWAT
            ,pt.amppart as AMPHUR
            ,pt.citizenship as NATION
            ,"C" as AdmType
            ,"O" as AdmSource
            ,i.regdate as DTAdm_d
            ,i.regtime as DTAdm_t
            ,i.dchdate as DTDisch_d
            ,i.dchtime as DTDisch_t 
            ,"0" AS LeaveDay                
            ,i.dchstts as DischStat
            ,i.dchtype as DishType
            ,"" as AdmWt
            ,i.ward as DishWard
            ,sp.nhso_code as Dept
            ,seekhipdata(ptt.hipdata_code,0) maininscl
            ,i.pttype
            ,concat(i.pttype,":",ptt.name) pttypename 
            ,hospmain(i.an) HMAIN
            ,"IP" as ServiceType
            from ipt i
            left join patient pt on pt.hn=i.hn
            left join ptcardno pc on pc.hn=pt.hn and pc.cardtype="02"
            left join an_stat a on a.an=i.an
            left join spclty sp on sp.spclty=i.spclty
            left join pttype ptt on ptt.pttype=i.pttype
            left join pttype_eclaim ec on ec.code=ptt.pttype_eclaim_id 
            left join opitemrece oo on oo.an=i.an
            left join income inc on inc.income=oo.income
            left join s_drugitems d on d.icode=oo.icode 
            WHERE a.dchdate ="'.$an .'"                     
            AND ptt.pttype IN("A7","s7","14")
            group by i.an
            order by hn
    ');
             
        return view('claim.sixteendata',[
            'datestart'                => $datestart,
            'dateend'                  => $dateend, 
        ]);
    }
    public function aipnsearch (Request $request)
    {
        $datestart = $request->startdate;
        $dateend = $request->enddate;
        
            $aipn_data = DB::connection('mysql3')->select('   
                SELECT
                    i.an,  
                    i.an as AN,i.hn as HN,"0" as IDTYPE 
                    ,showcid(if(pt.nationality=99,pt.cid,pc.cardno)) as PIDPAT
                    ,pt.pname as TITLE
                    ,concat(pt.fname," ",pt.lname) as NAMEPAT 
                    ,pt.birthday as DOB
                    ,a.sex as SEX
                    ,pt.marrystatus as MARRIAGE
                    ,pt.chwpart as CHANGWAT
                    ,pt.amppart as AMPHUR
                    ,pt.citizenship as NATION
                    ,"C" as AdmType
                    ,"O" as AdmSource
                    ,i.regdate as DTAdm_d
                    ,i.regtime as DTAdm_t
                    ,i.dchdate as DTDisch_d
                    ,i.dchtime as DTDisch_t 
                    ,"0" AS LeaveDay                
                    ,i.dchstts as DischStat
                    ,i.dchtype as DishType
                    ,"" as AdmWt
                    ,i.ward as DishWard
                    ,sp.nhso_code as Dept
                    ,seekhipdata(ptt.hipdata_code,0) maininscl
                    ,i.pttype
                    ,concat(i.pttype,":",ptt.name) pttypename 
                    ,hospmain(i.an) HMAIN
                    ,"IP" as ServiceType
                    from ipt i
                    left join patient pt on pt.hn=i.hn
                    left join ptcardno pc on pc.hn=pt.hn and pc.cardtype="02"
                    left join an_stat a on a.an=i.an
                    left join spclty sp on sp.spclty=i.spclty
                    left join pttype ptt on ptt.pttype=i.pttype
                    left join pttype_eclaim ec on ec.code=ptt.pttype_eclaim_id 
                    left join opitemrece oo on oo.an=i.an
                    left join income inc on inc.income=oo.income
                    left join s_drugitems d on d.icode=oo.icode 
                    WHERE i.an ="'.$an .'"                     
                    AND ptt.pttype IN("A7","s7","14")
                    group by i.an
                    order by hn
            ');
            
            Aipn_ipadt::truncate();
            foreach ($aipn_data as $key => $value) {     
                Aipn_ipadt::insert([
                    'AN'             => $value->AN,
                    'HN'             => $value->HN,
                    'IDTYPE'         => $value->IDTYPE,
                    'PIDPAT'         => $value->PIDPAT,
                    'TITLE'          => $value->TITLE,
                    'NAMEPAT'        => $value->NAMEPAT,
                    'DOB'            => $value->DOB,
                    'SEX'            => $value->SEX,
                    'MARRIAGE'       => $value->MARRIAGE,
                    'CHANGWAT'       => $value->CHANGWAT,
                    'AMPHUR'         => $value->AMPHUR,
                    'NATION'         => $value->NATION,
                    'AdmType'        => $value->AdmType,
                    'AdmSource'      => $value->AdmSource,
                    'DTAdm_d'        => $value->DTAdm_d,
                    'DTAdm_t'        => $value->DTAdm_t,
                    'DTDisch_d'      => $value->DTDisch_d,
                    'DTDisch_t'      => $value->DTDisch_t,
                    'LeaveDay'       => $value->LeaveDay,
                    'DischStat'      => $value->DischStat,
                    'DishType'       => $value->DishType,
                    'AdmWt'          => $value->AdmWt,
                    'DishWard'       => $value->DishWard,
                    'Dept'           => $value->Dept,
                    'HMAIN'          => $value->HMAIN,
                    'ServiceType'    => $value->ServiceType 
                ]);                
            }
            Aipn_billitems::truncate();
            foreach ($aipn_data as $key => $item) {   
                $aipn_billitems = DB::connection('mysql3')->select('   
                    SELECT  i.an,
                    i.an as AN,"" as sequence                            
                    ,i.regdate as DTAdm_d
                    ,i.regtime as DTAdm_t
                    ,i.dchdate as ServDate
                    ,i.dchtime as ServTime 
                    ,case 
                    when oo.item_type="H" then "04"
                    else zero(inc.income) end BillGr 
					,inc.income as BillGrCS 
                   				                   
                    ,ifnull(case  
                    when inc.income in (02) then d.nhso_adp_code
					when inc.income in (03,04) then dd.billcode
					when inc.income in (06,07) then d.nhso_adp_code
                    else d.nhso_adp_code end,"") CSCode

                    ,ifnull(case  
					when inc.income in (03,04) then dd.tmt_tmlt
					when inc.income in (06,07) then dd.tmt_tmlt
                    else "" end,"") STDCode

                    ,ifnull(case                 
					when inc.income in (03,04) then "TMT"
					when inc.income in (06,07) then "TMLT"
                    else "" end,"") CodeSys

                    ,oo.icode as LCCode
                    ,concat_ws("",d.name,d.strength) Descript
                    ,sum(oo.qty) as QTY
                    ,oo.UnitPrice as pricehos
                    ,dd.UnitPrice as pricecat
                    ,sum(oo.sum_price) ChargeAmt_ 
                    ,dd.tmt_tmlt 
                    ,inc.income

                    ,case 
                    when oo.paidst in ("01","03") then "T"
                    else "D" end ClaimCat

                    ,"0" as ClaimUP
                    ,"0" as ClaimAmt
                    ,i.dchdate
                    ,i.dchtime
                    ,sum(if(oo.paidst="04",sum_price,0)) Discount    
                    from ipt i
                    left outer join opitemrece oo on oo.an=i.an
                    left outer join an_stat a on a.an=i.an
                    left outer join patient pt on i.hn=pt.hn
                    left outer join income inc on inc.income=oo.income
                   
                    left outer join s_drugitems d on oo.icode=d.icode
                    left join claim.aipn_drugcat_labcat dd on dd.icode=oo.icode	
                    left join claim.aipn_labcat_sks ls on ls.lccode=oo.icode
					left join claim.aipn_drugcat_sks dks on dks.hospdcode=oo.icode

                    WHERE i.an="'.$item->AN.'"                             
                    and oo.qty<>0
                    and oo.UnitPrice<>0  
                    and inc.income NOT IN ("02","22" )      
                    group by oo.icode
                    order by i.an desc
                    ');
                    // ,ifnull(if(inc.income in (03,04),dd.tmt_tmlt,dd.tmt_tmlt),"") as STDCode
                    // ,ifnull(if(inc.income in (03,04),dd.billcode,d.nhso_adp_code),"") as CSCode
                    // ,ifnull(if(inc.income in (03,04),"TMT","TMLT"),"") as CodeSys 
                    // ,ifnull(if(inc.income in (03,04),ls.lccode,d.nhso_adp_code),"") as CSCode
                    // ,ifnull(if(inc.income in (03,04),dks.tmtid,ls.tmlt),"") as STDCode

                    // ,ifnull(if(inc.income in (03,04,06,07),inc.income,ls.billgroup),"") as BillGrCS 
                    // and inc.group1 IN("03","04","06","07")
                    // left outer join income_group g on inc.income_group=g.income_group
                    // ,ifnull(if(inc.group1 in (03,04),"TMT","TMLT"),"") as CodeSys 
                    // and oo.paidst not in ("01","03") 
                    // ,ls.billcode
                    // and i.an ="660000147"
                    // as CodeSys 
                    // and inc.group1 in ("03","04","06","07")
                    $i = 1;
                    foreach ($aipn_billitems as $key => $value2) { 
                    
                    // $codesys = $value2->BillGr;
                    $cs_ = $value2->BillGrCS;
                    $cs = $value2->CSCode;
                    // $billcs = $value2->BillGrCS;
                   
 
                    if ($cs_ == '03') {
                        $csys = $value2->CodeSys;
                    }elseif ($cs_ == '02') {
                        $csys = $value2->CodeSys; 
                     }elseif ($cs_ == '06') {
                        $csys = $value2->CodeSys; 
                    }elseif ($cs_ == '04') {
                      $csys = $value2->CodeSys; 
                    }elseif ($cs_ == '07') {
                        $csys = $value2->CodeSys; 
                    } else {
                        $csys = '';
                    }

                      if ($cs == 'XXXX') {
                        $cs_code = '';
                    }elseif ($cs == 'XXXXX') {
                        $cs_code = '';  
                    }elseif ($cs == 'XXXXXX') {
                        $cs_code = ''; 
                    // }elseif ($cs == '04') {
                    //     $cs_ = '';
                    } else {
                        $cs_code = $value2->CSCode;
                    }
                                         
                    Aipn_billitems::insert([                        
                        'AN'                => $value2->AN,
                        'sequence'          => $i++,
                        'ServDate'          => $value2->ServDate,
                        'ServTime'          => $value2->ServTime,
                        'BillGr'            => $value2->BillGr,
                        'BillGrCS'          => $cs_,
                        'CSCode'            => $cs_code,
                        'LCCode'            => $value2->LCCode,
                        'Descript'          => $value2->Descript,
                        'QTY'               => $value2->QTY,
                        'UnitPrice'         => $value2->pricehos,
                        'ChargeAmt'         => $value2->QTY * $value2->pricehos,
                        'ClaimSys'          => "SS",
                        'CodeSys'           => $csys,
                        'STDCode'           => $value2->STDCode,
                        'Discount'          => "0.0000",
                        'ProcedureSeq'      => "0",
                        'DiagnosisSeq'      => "0",
                        'DateRev'          => $value2->ServDate,
                        'ClaimCat'          => $value2->ClaimCat,
                        'ClaimUP'           => $value2->ClaimUP,
                        'ClaimAmt'          => $value2->ClaimAmt 
                    ]);
 
                    
                    
                }
            }

            $aipn_ipop = DB::connection('mysql3')->select('   
                SELECT
                        i.an as AN
                        ,"" as sequence,"ICD9CM" as CodeSys 
                        ,cc.icd9 as Code
                        ,icdname(cc.icd9) as Procterm
                        ,doctorlicense(cc.doctor) as DR
                        
                        ,date_format(if(opdate is null,caldatetime(regdate,regtime),caldatetime(opdate,optime)),"%Y-%m-%dT%T") as DateIn
                        ,date_format(if(enddate is null,caldatetime(regdate,regtime),caldatetime(enddate,endtime)),"%Y-%m-%dT%T") as DateOut
                        ," " as Location
                        from ipt i
                        join iptoprt cc on cc.an=i.an
                        WHERE i.an ="'.$an .'"   
                        group by cc.icd9
            ');

            Aipn_ipop::truncate();
            $i = 1;  
            foreach ($aipn_ipop as $key => $valueipop) {  
                $doctop = $valueipop->DR;
                #ตัดขีด,  ออก
                   $pattern_drop = '/-/i';
                   $dr_cutop = preg_replace($pattern_drop, '', $doctop);
                   if ($dr_cutop == '') {
                    $doctop_ = 'ว47998';
                   } else {
                    $doctop_ = $dr_cutop;
                   }
                   
                
                Aipn_ipop::insert([
                    'an'             => $valueipop->AN,
                    'sequence'       => $i++,
                    'CodeSys'        => $valueipop->CodeSys,
                    'Code'           => $valueipop->Code,
                    'Procterm'       => $valueipop->Procterm,
                    'DR'             => $doctop_,
                    'DateIn'         => $valueipop->DateIn,
                    'DateOut'        => $valueipop->DateOut,
                    'Location'       => $valueipop->Location 
                ]);
            }

            $aipn_ipdx = DB::connection('mysql3')->select('   
                SELECT 
                        i.an as AN
                        ,"" as sequence
                        ,diagtype as DxType
                        ,if(ifnull(aa.codeset,"")="TT","ICD-10-TM","ICD-10") as CodeSys
                        ,dx.icd10 as Dcode
                        ,icdname(dx.icd10) as DiagTerm
                      
                        ,doctorlicense(cc.doctor) as DR  
                        ,null datediag
                        from ipt i
                        join iptdiag dx on dx.an=i.an
                        join iptoprt cc on cc.an=i.an
                        left join icd101 aa on aa.code=dx.icd10
                        WHERE i.an ="'.$an .'" 
                        group by dx.icd10
                        order by diagtype,ipt_diag_id 
            ');
           
            Aipn_ipdx::truncate();
            
            $j = 1;  
            foreach ($aipn_ipdx as $key => $valueip) {  

                $doct = $valueip->DR;
                 #ตัดขีด,  ออก
                    $pattern_dr = '/-/i';
                    $dr_cut = preg_replace($pattern_dr, '', $doct);

                    if ($dr_cut == '') {
                        $doctop_s = 'ว47998';
                       } else {
                        $doctop_s = $dr_cut;
                       }

                
                Aipn_ipdx::insert([
                    'an'             => $valueip->AN,
                    'sequence'       => $j++,
                    'DxType'         => $valueip->DxType,
                    'CodeSys'        => $valueip->CodeSys,
                    'Dcode'          => $valueip->Dcode,
                    'DiagTerm'       => $valueip->DiagTerm,
                    'DR'             => $doctop_s,
                    'datediag'       => $valueip->datediag
                ]);
            }

            $update_billitems = DB::connection('mysql7')->select('SELECT * FROM aipn_billitems WHERE CodeSys ="TMLT" AND STDCode ="" OR ClaimCat="T" ');
            // $update_billitems = DB::connection('mysql7')->select('SELECT * FROM aipn_billitems WHERE CodeSys ="TMLT" AND STDCode =""');
            // $update_billitems = DB::connection('mysql7')->select('SELECT * FROM aipn_billitems WHERE STDCode ="" AND BillGrCS <>"01" ');
            foreach ($update_billitems as $key => $value) {
                $id = $value->aipn_billitems_id;
                $del = Aipn_billitems::find($id);
                $del->delete();            
            }

            // $update_billitems2 = DB::connection('mysql7')->select('SELECT * FROM aipn_billitems WHERE CodeSys ="TMT" AND STDCode =""');
            $update_billitems2 = DB::connection('mysql7')->select('SELECT * FROM aipn_billitems WHERE CodeSys ="TMT" AND STDCode ="" OR ClaimCat="T" ');
            foreach ($update_billitems2 as $key => $value2) {
                $id = $value2->aipn_billitems_id;
                $del = Aipn_billitems::find($id);
                $del->delete();            
            }
                    
        
           
 
        return view('claim.aipn',[
            'start'            => $datestart,
            'end'              => $dateend,
            'aipn_data'        => $aipn_data,
            'aipn_billitems'   => $aipn_billitems,
            'an'               => $an,
            'aipn_ipop'        => $aipn_ipop,
            'aipn_ipdx'        => $aipn_ipdx
        ]);
    } 
    
   
}
   