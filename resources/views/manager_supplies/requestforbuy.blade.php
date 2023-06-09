@extends('layouts.supplies')   
    <link href="{{ asset('datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
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
    padding-right:10px;
                        }

            .text-font {
        font-size: 13px;
                    }   

                    
      .form-control {
    font-size: 13px;
                  }   
                  table {
            border-collapse: collapse;
            }

        table, td, th {
            border: 1px solid black;
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


    use App\Http\Controllers\ManagersuppliesController;

    
?>
<?php
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d');
?>          

<center>    
    <div class="block" style="width: 95%;">
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title" style="font-family: 'Kanit', sans-serif;"><B>รายการขอซื้อขอจ้างพัสดุ</B></h3>
                   
            </div>
            <div class="block-content block-content-full">
            <form method="post">
                @csrf
                <div class="row">
                <div class="col-sm-0.5">
                            &nbsp;&nbsp; ปีงบ &nbsp;
                        </div>
                        <div class="col-sm-1.5">
                            <span>
                                <select name="YEAR_ID" id="YEAR_ID" class="form-control input-lg budget" style=" font-family: 'Kanit', sans-serif;">
                                @foreach ($budgets as $budget)
                                @if($budget->LEAVE_YEAR_ID== $year_id)
                                    <option value="{{ $budget->LEAVE_YEAR_ID  }}" selected>{{ $budget->LEAVE_YEAR_ID}}</option>
                                @else
                                    <option value="{{ $budget->LEAVE_YEAR_ID  }}">{{ $budget->LEAVE_YEAR_ID}}</option>
                                @endif                                 
                            @endforeach                         
                                </select>
                            </span>
                        </div>
                        <div class="col-sm-4 date_budget">
                    <div class="row">
                        <div class="col-sm">
                        วันที่
                        </div>
                  
                        <div class="col-sm-4">
                         
                                <input  name = "DATE_BIGIN"  id="DATE_BIGIN"  class="form-control input-lg datepicker" data-date-format="mm/dd/yyyy"  value="{{ formate($displaydate_bigen) }}" readonly>     
                           
                        </div>
                        <div class="col-sm">
                        ถึง 
                        </div>
                        <div class="col-sm-4">
                   
                        <input  name = "DATE_END"  id="DATE_END"  class="form-control input-lg datepicker" data-date-format="mm/dd/yyyy"  value="{{ formate($displaydate_end) }}" readonly>
                       
                        </div>
                        </div>

                </div>
                        <div class="col-md-0.5">
                            &nbsp;สถานะ &nbsp;
                        </div>
                        <div class="col-md-2">
                            <span>
                                <select name="SEND_STATUS" id="SEND_STATUS" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                    <option value="">--ทั้งหมด--</option>
                                        @foreach ($info_sendstatuss as $info_sendstatus)
                                            @if($info_sendstatus->STATUS_CODE == $status_check)
                                                <option value="{{ $info_sendstatus->STATUS_CODE }}" selected>{{ $info_sendstatus->STATUS_NAME}}</option>
                                             @else
                                                <option value="{{ $info_sendstatus->STATUS_CODE  }}">{{ $info_sendstatus->STATUS_NAME}}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </span>
                        </div>

                        <div class="col-md-0.5">
                            &nbsp;ค้นหา &nbsp;
                        </div>
                        <div class="col-md-2">
                            <span>
                                <input type="search"  name="search" class="form-control" style="font-family: 'Kanit', sans-serif;font-weight:normal;" value="{{$search}}">

                            </span>
                        </div>
                        <div class="col-md-30">
                            &nbsp;
                        </div>
                        <div class="col-md-2 text-left">
                            <span>
                               
                                <button type="submit" class="btn btn-hero-sm btn-hero-info"><i class="fas fa-search"></i> &nbsp;ค้นหา</button>
                            </span> 
                        </div>
                    </div>  
            </form>
             <div class="table-responsive"> 
             <div align="right">มูลค่ารวม {{number_format($sumbudget,2)}}  บาท</div>
              
                <table class="table-striped table-vcenter js-dataTable-simple" style="width: 100%;">
                    <thead style="background-color: #FFEBCD;">
                        <tr height="40">
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="5%">ลำดับ</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="5%">สถานะ</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="8%">เลขขอซื้อ</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="5%">ทะเบียนคุม</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="7%">ลงวันที่</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="10%">เพื่อจัดซื้อ/ซ่อมแซม</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" >เหตุผล</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" >บริษัทที่แนะนำ</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="8%">มูลค่า</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="15%">หน่วยงานที่ร้องขอ</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="10%">เจ้าหน้าที่</th>
                            <th  class="text-font" style="border-color:#F0FFFF;text-align: center;border: 1px solid black;" width="5%">คำสั่ง</th> 
                        </tr >
                    </thead>
                    <tbody>
                    <?php $number = 0; ?>
                    @foreach ($inforequests as $inforequest)  

                    <?php $number++;
                    
                    $status =  $inforequest -> STATUS;

                    if( $status === 'Pending'){
                       $statuscol =  "badge badge-danger";

                   }else if($status === 'Approve'){
                      $statuscol =  "badge badge-warning";

                   }else if($status === 'Verify'){
                       $statuscol =  "badge badge-info";
                   }else if($status === 'Allow'){
                       $statuscol =  "badge badge-success";
                    }else if($status === 'Cancel'){
                        $statuscol =  "badge badge-secondary";
                   }else{
                       $statuscol =  "badge badge-secondary";
                   }


                    ?>
                        <tr height="20">
                        <td class="text-font" align="center" width="5%">{{$number}}</td>
                            <td class="text-font" align="center" width="5%">
                                    <span class="{{$statuscol}}">{{ $inforequest -> STATUS_NAME }}</span>
                            </td>
                            <td class="text-font text-pedding" width="8%">{{ $inforequest -> REQUEST_ID }}</td>
                            <td class="text-font text-pedding" width="5%">
                           <?php

                                $checkref =  ManagersuppliesController::checkref($inforequest->ID);
                                if($checkref > 0){
                                        echo '<span class="btn btn-success"><i class="fa-xs fa fa-check"></i></span>';
                                }else{
                                    echo '';
                                }
                                
                            ?>
                            
                            </td>


                            <td class="text-font text-pedding" width="7%">{{ DateThai($inforequest -> DATE_WANT) }}</td>
                            <td class="text-font text-pedding" width="10%" >{{ $inforequest -> REQUEST_FOR }}</td>
                            <td class="text-font text-pedding" >{{ $inforequest -> REQUEST_BUY_COMMENT }}</td> 
                            <td class="text-font text-pedding" >{{ $inforequest -> REQUEST_VANDOR_NAME }}</td> 
                            <td class="text-font text-pedding" align="right" width="8%">{{ number_format($inforequest -> BUDGET_SUM,2) }}</td>
                            <td class="text-font text-pedding" width="15%">{{ $inforequest -> SAVE_HR_DEP_SUB_NAME }}</td> 
                            <td class="text-font text-pedding" width="10%">{{ $inforequest -> SAVE_HR_NAME }}</td> 
                            <td align="center" width="5%">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-info dropdown-toggle" id="dropdown-align-outline-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-weight:normal;">
                                        ทำรายการ
                                    </button>
                                <div class="dropdown-menu" style="width:10px">
                                   
                                    @if($status === 'Approve')
                                    <a class="dropdown-item"  href="#detail_repairnomalasset" data-toggle="modal"  style="font-family: 'Kanit', sans-serif; font-size: 15px;font-weight:normal;" onclick="detail({{ $inforequest -> ID}});"><i class="fas fa-clipboard-check text-success mr-2"></i>ตรวจสอบ</a>
                                    @endif

                                    @if($checkref == 0 && $status === 'Allow')
                                        <a class="dropdown-item" href="{{ url('manager_supplies/purchaseregister/'.$inforequest -> ID)}}" style="font-family: 'Kanit', sans-serif; font-size: 15px;font-weight:normal;"><i class="fas fa-clipboard-check text-success mr-2"></i>ลงทะเบียนคุม</a>
                                    @endif   
                             
                                    <a class="dropdown-item"  href="{{ url('manager_supplies/requestforbuyedit/'.$inforequest -> ID)}}"  style="font-family: 'Kanit', sans-serif; font-size: 15px;font-weight:normal;"><i class="fas fa-edit text-warning mr-2"></i>รายละเอียด/แก้ไข</a>
                                    <a class="dropdown-item" href="{{ url('manager_supplies/requestforbuycancel/'.$inforequest -> ID)}}" style="font-family: 'Kanit', sans-serif; font-size: 15px;font-weight:normal;"><i class="fas fa-window-close text-danger mr-2"></i>ยกเลิก</a>    
                                     
                              
                                    <a class="dropdown-item"  href="{{ url('manager_supplies/pdfwant/export_pdfwant/'.$inforequest -> ID)}}"  style="font-family: 'Kanit', sans-serif; font-size: 15px;font-weight:normal;" target="_blank"><i class="fas fa-print text-info mr-2"></i>พิมพ์ใบความต้องการ</a>

                                </div>
                                </div>
                            </td> 
                        </tr>
                        @endforeach   

                    </tbody>
                </table>
                <br><br><br><br><br>
            </div>
        </div>
    </div>    
</div>

<!-------------------------------------------------------ตรวจอสอบ---------------------------------------->   

<div id="detail_repairnomalasset" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            
                                            <div class="row">
                                            <div><h3  style="font-family: 'Kanit', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;ตรวจสอบขอซื้อขอจ้างพัสดุ&nbsp;&nbsp;</h3></div>
                                            </div>
                                                </div>
                                                <div class="modal-body" style="float:left;">
                                                <form  method="post" action="{{ route('msupplies.updateinforequestver') }}" enctype="multipart/form-data">
                                                @csrf  
                                        
                                                            
                                                 <div id="detail" ></div>
                                                
                                                 
                                                 <input type="hidden" name = "USER_CONFIRM_CHECK_ID"  id="USER_CONFIRM_CHECK_ID"  value="{{ $id_user}} ">
                                                    
                                                 <div class="row">
                                                    <div class="col-sm-2">
                                                            <label>ประเภทการขอซื้อ/ขอจ้าง :</label>
                                                        </div> 
                                                        <div class="col-lg-4">
                                                            <select name="REQUEST_BUY_TYPE_ID" id="REQUEST_BUY_TYPE_ID" class="form-control input-lg " style=" font-family: 'Kanit', sans-serif;" required>
                                                                <option value="" >--กรุณาเลือก--</option>
                                                                <option value="1" >เพื่อใช้ทดแทน</option>
                                                                <option value="2" >เพื่อใช้บำรุงรักษา</option>
                                                                <option value="3" >ซื้อใหม่</option>
                                                                          
                                                            </select> 
                                                           
                                                    </div>
          
                                                    <div class="col-sm-2">
                                                            <label>สถานะแผน :</label>
                                                        </div> 
                                                        <div class="col-lg-4">
                                                            <select name="REQUEST_PLAN_TYPE_ID" id="REQUEST_PLAN_TYPE_ID" class="form-control input-lg " style=" font-family: 'Kanit', sans-serif;" required>
                                                                <option value="" >--กรุณาเลือกสถานะแผน--</option>
                                                                <option value="1" >อยู่ในแผนการจัดซื้อ/จัดจ้าง </option>
                                                                <option value="2" >ไม่อยู่ในแผนการจัดซื้อ/จัดจ้าง</option>
                                                                          
                                                            </select> 
                                                           
                                                    </div>
                                                </div>

                             
                                                </div>
                                                <div class="modal-footer">
                                                    <div align="right">
                                                    <button type="submit" name = "SUBMIT"  class="btn btn-hero-sm btn-hero-success" value="approved" ><i class="fas fa-check-circle"></i> &nbsp;ผ่าน</button>
                                                    <button type="submit"  name = "SUBMIT"  class="btn btn-hero-sm btn-hero-danger" value="not_approved" ><i class="fas fa-minus-circle"></i> &nbsp;ไม่ผ่านการตรวจสอบ</button>
                                                    <button type="button" class="btn btn-hero-sm btn-hero-secondary" data-dismiss="modal" ><i class="fas fa-window-close"></i> &nbsp;ปิดหน้าต่าง</button>
                                                
                                                    </div>
                                                    </div>
                                                    </form>  
                                        </body>
                                            
                                            
                                            </div>
                                            </div>
                                        </div>

  
@endsection

@section('footer')

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


function detail(id){

$.ajax({
           url:"{{route('suplies.detailapp')}}",
          method:"GET",
           data:{id:id},
           success:function(result){
               $('#detail').html(result);
              //alert("Hello! I am an alert box!!");
           }
            
   })
    
}


 //------------------------เลือกปีงบ
 datepick();

 function datepick() {
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: true,
        language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
        thaiyear: true,
        todayHighlight: true,
        autoclose: true //Set เป็นปี พ.ศ.
    }); //กำหนดเป็นวันปัจุบัน
 }

 $('.budget').change(function(){
    if($(this).val()!=''){
        var select=$(this).val();
        var _token=$('input[name="_token"]').val();
        $.ajax({
            url:"{{route('admin.selectbudget')}}",
            method:"GET",
            data:{select:select,_token:_token},
            success:function(result){
                $('.date_budget').html(result);
                datepick();
            }
        });
    }
 });
</script>

@endsection