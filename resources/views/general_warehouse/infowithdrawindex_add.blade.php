@extends('layouts.backend')
   
    <link href="{{ asset('datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
    <link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet" />
@section('content')

<style>
.center {
  margin: auto;
  width: 100%;
  padding: 10px;
}
body {
      font-family: 'Kanit', sans-serif;
      font-size: 14px;
    
      }

      label{
            font-family: 'Kanit', sans-serif;
            font-size: 14px;
           
      } 

      @media only screen and (min-width: 1200px) {
label {
    float:right;
  }

      }

      .text-pedding{
   padding-left:10px;
                    }

        .text-font {
    font-size: 13px;
                  }   
                  .form-control {
    font-size: 13px;
                  }
      
</style>

<script>
    function checklogin(){
     window.location.href = '{{route("index")}}'; 
    }
    </script>
<?php
if(Auth::check()){
    $status = Auth::user()->status;
    $id_user = Auth::user()->PERSON_ID;   
}else{    
    echo "<body onload=\"checklogin()\"></body>";
    exit();
} 

$url = Request::url();
$pos = strrpos($url, '/') + 1;
$user_id = substr($url, $pos); 



use App\Http\Controllers\WarehouseController;
$refnumber = WarehouseController::refnumberRe();
$checkagree = WarehouseController::agree($user_id);

use App\Http\Controllers\FectdataController;
$checkleader_sub = FectdataController::checkleader_sub($id_user);

?>
<?php

  date_default_timezone_set("Asia/Bangkok");
  $date = date('Y-m-d');
  
?>
<!-- Advanced Tables -->
<div class="bg-body-light">
    <div class="content">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
             <h1 style="font-family: 'Kanit', sans-serif; font-size:15px;font-size: 1.5rem;font-weight:normal;">{{ $inforpersonuser -> HR_PREFIX_NAME }}   {{ $inforpersonuser -> HR_FNAME }}  {{ $inforpersonuser -> HR_LNAME }}</h1> 
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">                                           
                <div class="row">
                                            <div>
                                             <a href="{{ url('general_warehouse/dashboard/'.$inforpersonuserid -> ID) }}" class="btn loadscreen" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">Dashboard</a>
                                            </div>
                                            <div>&nbsp;</div>

                                            <div>
                                                <a href="{{ url('general_warehouse/infowithdrawindex/'.$inforpersonuserid -> ID)}}" class="btn  btn-info loadscreen" >เบิกจากคลังหลัก</a>
                                               </div>
                                               <div>&nbsp;</div>
                                               
                                            <div>
                                            <a href="{{ url('general_warehouse/infostockcard/'.$inforpersonuserid -> ID)}}" class="btn loadscreen" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">คลังย่อย

                                                <span class="badge badge-light" ></span>

                                            </a>
                                            </div>
                                            <div>&nbsp;</div>


                                    
                                           

                                            <div>
                                             <a href="{{ url('general_warehouse/infopayindex/'.$inforpersonuserid -> ID)}}" class="btn loadscreen" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">จ่ายวัสดุ</a>
                                            </div>
                                            <div>&nbsp;</div>

                                            <div>
                                                @if($checkagree <> 0)
                                           <a href="{{ url('general_warehouse/infoapp/'.$inforpersonuserid -> ID)}}" class="btn loadscreen" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">เห็นชอบ

                                                <span class="badge badge-light" ></span>

                                            </a>
                                            @endif
                                            </div>
                                            <div>&nbsp;</div>
                            


                                   


                                            </ol>
                   
                </nav>
                   
                </nav>
        </div>
    </div>
    </div>
    <div class="content">
    <!-- Dynamic Table Simple -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title" style="font-family: 'Kanit', sans-serif;"><B>ขอเบิกวัสดุ | หน่วยงาน</B></h3>
            <br>
            <div align="right" class="col-sm-6">
           
                <a href="{{ url('general_warehouse/infoquota/'.$inforpersonuserid->ID.'/'.$inforpersonuser->HR_DEPARTMENT_SUB_SUB_ID) }}"
                    class="btn btn-info btn-lg"
                    style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;"><i class="fas fa-plus mr-2"></i> เพิ่มรายการพัสดุจากรายการโควตา</a>
             
                
            </div>
        </div>
        <br>
<form  method="post" action="{{ route('warehouse.saveinforequestwithdrawindex') }}" enctype="multipart/form-data">
@csrf

    
        <div class="col-sm-12" style="text-align: left">
        <div class="row">
        <div class="col-lg-1" style="text-align: left">
        <label >                           
                            รหัส :              
        </label>
        </div> 
        <div class="col-lg-2">
        <input name="WAREHOUSE_REQUEST_CODE" id="WAREHOUSE_REQUEST_CODE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" value="{{$refnumber}}" readonly>
        </div> 
        <div class="col-lg-1" style="text-align: left">
        <label >                           
                            ปีงบประมาณ          
        </label>
        </div> 
        <div class="col-lg-2">
        <select name="WAREHOUSE_BUDGET_YEAR" id="WAREHOUSE_BUDGET_YEAR" class="form-control input-sm " style=" font-family: 'Kanit', sans-serif;" required>
        <option value="" >--เลือกปีงบประมาณ  --</option>  

                    @foreach ($budgets as $budget)   
                    @if($budget -> LEAVE_YEAR_ID == $year_id )
                    <option value="{{ $budget -> LEAVE_YEAR_ID }}" selected>{{ $budget -> LEAVE_YEAR_ID }}</option>                    
                    @else
                    <option value="{{ $budget -> LEAVE_YEAR_ID }}" >{{ $budget -> LEAVE_YEAR_ID }}</option>                    
                    @endif

                                                                                                                                       
                    @endforeach  
                                                                            
        </select> 
        </div> 
        <div class="col-lg-1" style="text-align: left">
        <label >                           
                            เหตุผล :              
        </label>
        </div> 
        <div class="col-lg-4" >
        <input name="WAREHOUSE_REQUEST_BUY_COMMENT" id="WAREHOUSE_REQUEST_BUY_COMMENT" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
        </div> 
        </div>

        <br>

      
        <div class="row">
        <div class="col-lg-1" style="text-align: left">
        <label >                           
        วันที่ต้องการ             
        </label>
        </div> 
        <div class="col-lg-2">
        <input name="WAREHOUSE_DATE_WANT" id="WAREHOUSE_DATE_WANT" class="form-control input-sm datepicker" style=" font-family: 'Kanit', sans-serif;" value="{{formate($date)}}" readonly required>
        </div> 
        <div class="col-lg-1" style="text-align: left">
        <label >                           
         หน่วยงาน :            
        </label>
        </div> 
        <div class="col-lg-2">
        <select name="WAREHOUSE_DEP_SUB_SUB_ID" id="WAREHOUSE_DEP_SUB_SUB_ID" class="form-control input-sm js-example-basic-single" style=" font-family: 'Kanit', sans-serif;" required>
        <option value="" >--เลือกหน่วยงาน--</option>  

                    @foreach ($departmentsubsubs as $departmentsubsub)   
                    @if($departmentsubsub -> HR_DEPARTMENT_SUB_SUB_ID == $inforpersonuserid->HR_DEPARTMENT_SUB_SUB_ID)
                    <option value="{{ $departmentsubsub -> HR_DEPARTMENT_SUB_SUB_ID }}" selected>{{ $departmentsubsub -> HR_DEPARTMENT_SUB_SUB_NAME }}</option>                                                                                                                        
                    @else
                    <option value="{{ $departmentsubsub -> HR_DEPARTMENT_SUB_SUB_ID }}" >{{ $departmentsubsub -> HR_DEPARTMENT_SUB_SUB_NAME }}</option>                                                                                                                        
                    @endif                                                              
                                   
                    @endforeach  
                                                                            
        </select> 
        </div> 
        <div class="col-lg-1 " style="text-align: left">
        <label>คลัง :</label>
        </div> 
        <div class="col-lg-4" id="detail_warehouse">
        
     
        <select name="WAREHOUSE_INVEN_ID" id="WAREHOUSE_INVEN_ID" class="form-control input-sm js-example-basic-single" style=" font-family: 'Kanit', sans-serif;" required>
        <option value="" >--เลือกคลัง--</option>  

                    @foreach ($infostores as $infostore)                                                                 
                    <option value="{{ $infostore -> INVEN_ID }}" >{{ $infostore -> INVEN_NAME }}</option>                                                                                                                                        
                    @endforeach  
                                                                            
        </select> 


        </div>
        </div>
        <br>


       <div class="row">
       
        <div class="col-lg-1" style="text-align: left">
        <label>ผู้ขอเบิก :</label>
        </div> 
        <div class="col-lg-2">
      {{$inforpersonuser->HR_FNAME}} {{$inforpersonuser->HR_LNAME}}
        
      <input type="hidden" name="WAREHOUSE_SAVE_HR_ID" id="TREASURT_PAY_SAVE_HR_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" value=" {{$inforpersonuserid->ID}}" required>

        
        
        </div>
        <div class="col-lg-1 " style="text-align: left">
        <label>ผู้เห็นชอบ :</label>
        </div> 
        <div class="col-lg-2">
      
        
        <select name="WAREHOUSE_AGREE_HR_ID" id="TREASURT_PAY_REQUEST_HR_ID" class="form-control input-sm js-example-basic-single" style=" font-family: 'Kanit', sans-serif;" required>
        <option value="" >--เลือกผู้เห็นชอบ--</option>  

        @foreach ($pessonalls as $pessonall)  
                @if($pessonall -> ID ==  $headdepartmentsubsub->LEADER_HR_ID)                                  
                <option value="{{ $pessonall -> ID }}" selected>{{ $pessonall -> HR_FNAME }} {{ $pessonall -> HR_LNAME }}</option> 
                @else
                <option value="{{ $pessonall -> ID }}" >{{ $pessonall -> HR_FNAME }} {{ $pessonall -> HR_LNAME }}</option>                                                                                                         
                @endif
             @endforeach  
           
                                          
        </select> 

        </div>

        <div class="col-lg-1 " style="text-align: left">
        <label>รพสต. :</label>
        </div> 
        <div class="col-lg-2">
      
        
        <select name="WAREHOUSE_SMALLHOS" id="WAREHOUSE_SMALLHOS" class="form-control input-sm js-example-basic-single" style=" font-family: 'Kanit', sans-serif;" >
        <option value="" >ไม่ระบุ</option>  

        @foreach ($smallhoss as $smallhos)  
                                                
             <option value="{{ $smallhos -> WAREHOUSE_SMALLHOS_ID }}" >{{ $smallhos -> WAREHOUSE_SMALLHOS_CODE }} :: {{ $smallhos -> WAREHOUSE_SMALLHOS_NAME }}</option> 
                                                                                                                          
        @endforeach  
                                          
        </select> 

        </div>
       
       
       </div>
       <br>
 
       <div class="col-sm-12 row"  align="right">
                               

       <table class="gwt-table table-striped table-vcenter " style="width: 100%;">
                    <thead style="background-color: #FFEBCD;">
                                     
                                            <tr>
                                            <td style="text-align: center; font-size: 13px;" width="5%">ลำดับ</td>
                                                <td style="text-align: center; font-size: 13px;" >รายการ</td>
                                                <td style="text-align: center; font-size: 13px;" width="5%">เลือก</td>
                                                <td style="text-align: center; font-size: 13px;" width="30%">จำนวน</td>
                                                <td style="text-align: center; font-size: 13px;" width="20%">หน่วย</td>                                               
                                     
                                                <td style="text-align: center; font-size: 13px;" width="5%"><a  class="btn btn-success addRow" style="color:#FFFFFF;"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                        </thead> 
                                        <tbody class="tbody1"> 
                            @if($checkdetail > 0)
                                            <?php  $count=0;$number=1; ?>   
                            @foreach ($detailquota as $row) 
                                      
                                    <tr style="text-align: center; font-size: 13px;">
                                        <td style="text-align: center; font-size: 13px;">
                                            {{$number}}
                                        </td>
                                        <td style="text-align: left;" class="text-pedding infoselectsupreq{{$count}}">
                                            {{$row->STORE_NAME}}
                                            <input type="hidden" name="WAREHOUSE_REQUEST_SUB_DETAIL_ID[]" id="WAREHOUSE_REQUEST_SUB_DETAIL_ID{{$count}}" class="form-control input-sm" value="{{$row->WAREHOUSE_TREASARY_QUOTA_SUP_ID}}">
                                        </td>
                                        <td style="text-align: left;" class="text-pedding">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".addsup" style="font-family: \'Kanit\', sans-serif; font-size: 10px;font-weight:normal;"   onclick="detailsupselect({{$count}});">เลือก</button>
                                        </td>
                                        <td style="text-align: left;" class="text-pedding">
                                        <input style="text-align: center; " name="WAREHOUSE_REQUEST_SUB_AMOUNT[]" id="WAREHOUSE_REQUEST_SUB_AMOUNT" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" value="{{$row->WAREHOUSE_TREASARY_QUOTA_AMOUNT}}" >
                                       </td>
                                       <td style="text-align: left;" class="text-pedding infounitname{{$count}}" >
                                        {{$row->SUP_UNIT_NAME}}
                                        <input type="hidden" name="WAREHOUSE_REQUEST_SUB_UNIT[]" id="WAREHOUSE_REQUEST_SUB_UNIT{{$count}}" class="form-control input-sm" value="{{$row->STORE_UNIT}}">
                                       </td>
              
                                       <td style="text-align: center;"><a class="btn btn-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>
                                   </tr>
                                   <?php  $count++; $number++;?>
                                        
                                   @endforeach 
                             @endif
                                    </tbody>   
                                    </table>


                                    </div>

        <div class="modal-footer">
        <div align="right">
        <button type="submit" name = "SUBMIT"  class="btn btn-hero-sm btn-hero-info" value="approved" ><i class="fas fa-save mr-2"></i>บันทึก</button>
        <a href="{{ url('general_warehouse/infowithdrawindex/'.$inforpersonuserid->ID)  }}" class="btn btn-hero-sm btn-hero-danger" onclick="return confirm('ต้องการที่จะยกเลิกการขอเบิก ?')" ><i class="fas fa-window-close mr-2"></i>ยกเลิก</a>
        </div>

       
        </div>
        </form>  


       
       
    
<!--    เมนูเลือก   -->
       
<div class="modal fade addsup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modeladdsup">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">          
                            <h2 class="modal-title" style="font-family: 'Kanit', sans-serif; font-size:15px;font-size: 1.5rem;font-weight:normal;">เลือกวัสดุที่ต้องการเบิก</h2>
                        </div>
                    <div class="modal-body">
                <body>
                    <div class="container mt-3">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                        <div style='overflow:scroll; height:300px;'>
                
                        <div id="detailsupselect"></div>

                    </div>
                </div>
                </div>
                    <div class="modal-footer">
                        <div align="right">
                                <button type="button" class="btn btn-hero-sm btn-hero-danger" data-dismiss="modal" ><i class="fas fa-window-close mr-2"></i>ปิดหน้าต่าง</button>
                        </div>
                    </div>
                </body>
            </div>
          </div>
        </div>

@endsection

@section('footer')
<script src="{{ asset('select2/select2.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

<script src="{{ asset('datepicker/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('datepicker/dist/js/bootstrap-datepicker-custom.js') }}"></script>
<script src="{{ asset('datepicker/dist/locales/bootstrap-datepicker.th.min.js') }}" charset="UTF-8"></script>



 <!-- Page JS Plugins -->
<script src="{{ asset('asset/js/plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
 <script src="{{ asset('asset/js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('asset/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Page JS Code -->
<script src="{{ asset('asset/js/pages/be_comp_charts.min.js') }}"></script>
<script>jQuery(function(){ Dashmix.helpers(['easy-pie-chart', 'sparkline']); });</script>


 <!-- Page JS Plugins -->
 <script src="{{ asset('asset/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('asset/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('asset/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('asset/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
 <script src="{{ asset('asset/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('asset/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
 <script src="{{ asset('asset/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
<!-- Page JS Code -->
 <script src="{{ asset('asset/js/pages/be_tables_datatables.min.js') }}"></script>

 <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>

<script>

function datepicker(number){
        
        $('.datepicker'+number).datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true,
                autoclose: true                         //Set เป็นปี พ.ศ.
            }).datepicker("setDate", 0);  //กำหนดเป็นวันปัจุบัน
   }


$('.addRow').on('click',function(){
        addRow();
        var count = $('.tbody1').children('tr').length;
        var number =  (count).valueOf();
        datepicker(number);
        checkcountdetail()
    });

   


    function addRow(){
    var count = $('.tbody1').children('tr').length;
    var number =  (count + 1).valueOf();

    
        var tr =   '<tr style="text-align: center; font-size: 13px;">'+
                '<td style="text-align: center;">'+
                +number+
                '</td>'+        
                '<td style="text-align: left;" class="text-pedding infoselectsupreq'+count+'">'+                             
                '</td>'+
                '<td style="text-align: left;" class="text-pedding">'+
                '<button type="button" class="btn btn-info" data-toggle="modal" data-target=".addsup" style="font-family: \'Kanit\', sans-serif; font-size: 10px;font-weight:normal;"   onclick="detailsupselect('+count+');">เลือก</button>'+
                '</td>'+
                '<td style="text-align: left;" class="text-pedding">'+
                '<input style="text-align: center; " name="WAREHOUSE_REQUEST_SUB_AMOUNT[]" id="WAREHOUSE_REQUEST_SUB_AMOUNT" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;"  >'+
                '</td>'+
                '<td style="text-align: left;" class="text-pedding infounitname'+count+'" >'+                           
                '</td>'+
                '<td style="text-align: center;"><a class="btn btn-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>'+
                '</tr>';
                                  
    $('.tbody1').append(tr);
    };

    $('.tbody1').on('click','.remove', function(){
        $(this).parent().parent().remove();
        checkcountdetail()
});




    $('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});




function detail(id){


$.ajax({
           url:"{{route('warehouse.detailappall')}}",
          method:"GET",
           data:{id:id},
           success:function(result){
               $('#detail').html(result);


              //alert("Hello! I am an alert box!!");
           }

   })

}


   $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true,
                autoclose: true                         //Set เป็นปี พ.ศ.
            }).datepicker();  //กำหนดเป็นวันปัจุบัน
    });

 //------------------------------------------function-----------------

 function detailsupselect(count){
  
  var idinven = document.getElementById("WAREHOUSE_INVEN_ID").value;

$.ajax({
           url:"{{route('warehouse.detailsupselect')}}",
          method:"GET",
           data:{idinven:idinven,count:count},
           success:function(result){
               $('#detailsupselect').html(result);
           }

   })
   

}





function selectsupreq(idinven,count){

var _token=$('input[name="_token"]').val();



$.ajax({
               url:"{{route('warehouse.selectsupreq')}}",
               method:"GET",
               data:{idinven:idinven,_token:_token},
               success:function(result){
                $('.infoselectsupreq'+count).html(result);
               }
       })



       $.ajax({
                   url:"{{route('warehouse.selectsupunitname')}}",
                   method:"GET",
                   data:{idinven:idinven,_token:_token},
                   success:function(result){
                    $('.infounitname'+count).html(result);
                   }
           })

        
    
     
       $('#modeladdsup').modal('hide');

}



//-----------------------------------------------------

function checkcountdetail(){
    var idinven = document.getElementById("WAREHOUSE_INVEN_ID").value;
    var count = $('.tbody1').children('tr').length;
    var _token=$('input[name="_token"]').val();
  
                    $.ajax({
                            url:"{{route('warehouse.detailinvenselect')}}",
                            method:"GET",
                            data:{idinven:idinven,count:count,_token:_token},
                            success:function(result){
                                $('#detail_warehouse').html(result);
                            }

                    })
                  
}


//-----------------------------------------------------


// function checkcountdetail(){
//     var idinven = document.getElementById("WAREHOUSE_INVEN_ID").value;
//     var count = $('.tbody1').children('tr').length;
    
//     if (count > 1) {      
//         $('#WAREHOUSE_INVEN_ID').prop('disabled', true);  
//         alert(idinven);
//         document.getElementById("WAREHOUSE_INVEN_ID").value = idinven ; 

//     } else {
//         $('#WAREHOUSE_INVEN_ID').prop('disabled', false);
//         alert(idinven);
//         document.getElementById("WAREHOUSE_INVEN_ID").value = idinven ;       
       
//     }
// }

</script>



@endsection