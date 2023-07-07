@extends('layouts.guesthouse')   
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
?>

<center>
<div class="block mt-5" style="width: 95%;" >
    <div class="block block-rounded block-bordered shadow-lg">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left" style="font-family: 'Kanit', sans-serif;"><B>เพิ่มข้อมูลที่พัก</B></h3>
            <a href="{{ url('manager_guesthouse/guesthouserequestdetail')  }}"   class="btn btn-hero-sm btn-hero-success fo14 loadscreen" ><i class="fas fa-arrow-circle-left mr-2"></i>ย้อนกลับ</a>    
        </div>
            
    <div class="block-content block-content-full">
                <form  method="post" action="{{ route('mguesthouse.guesthouseinfomation_save') }}" enctype="multipart/form-data">
                @csrf


                <div class="row push">
                <div class="col-lg-4">
                <div class="form-group"> 
                <label style=" font-family: 'Kanit', sans-serif;">รูปประกอบ</label>
                </div>
                <div class="form-group">                         
                        <img src="{{ asset('image/default.jpg')}}" alt="Image" class="img-thumbnail" id="image_upload_preview" alt="กรุณาเพิ่มรูปภาพ" height="300px" width="350px"/>
                </div>
                <div class="form-group"> *ขนาดรูปไม่เกิน 300 x 350 pixel
                        <input type="file" name="picture" id="picture" class="form-control">
                </div>                
                </div>



                <div class="col-sm-8">
                <div class="row push">

                <div class="col-sm-2">
                <label>อ้างถึงอาคาร :</label>
                </div> 
                <div class="col-lg-9 ">              
                <select name="LOCATION_ID" id="LOCATION_ID" class="form-control input-lg fo13" >
                    <option value="">--เลือก--</option>
                    @foreach ($infolocations as $infolocation)
                                        
                            <option value=" {{ $infolocation -> LOCATION_ID }}" >{{ $infolocation -> LOCATION_NAME }}</option>
                                    
                    @endforeach         

                </select>

                </div> 

                </div>
                <div class="row push">
                <div class="col-sm-2">
                <label>ชื่ออาคาร :</label>
                </div> 
                <div class="col-lg-10 ">
                <input name="INFMATION_NAME" id="INFMATION_NAME" class="form-control input-lg fo13">

                </div> 

                </div>
                <div class="row push">
                <div class="col-sm-2">
                <label>ประเภทที่พัก :</label>
                </div> 
                <div class="col-lg-4 ">
                <select name="INFMATION_TYPE" id="INFMATION_TYPE" class="form-control input-lg fo13">
                    <option value="">--เลือก--</option>
                    <option value="1">แฟลต</option>
                    <option value="2">บ้านพัก</option>
                </select>

                </div> 

                <div class="col-sm-2">
                <label>สถานะห้อง :</label>
                </div> 
                <div class="col-lg-4">
                <select name="INFMATION_STATUS" id="INFMATION_STATUS" class="form-control input-lg fo13" >
                    <option value="">--เลือก--</option>
                    <option value="1">ปกติ</option>
                    <option value="2">ปิดปรับปรุง</option>
                    <option value="3">ซ่อมแซม</option>
                    <option value="4">ปิด</option>
                </select>
                </div>  

                </div>



                            <div class="row push">


                                    <div class="col-sm-2">
                                    <label>ผู้รับผิดชอบ :</label>
                                    </div> 
                                    <div class="col-lg-4">
                                    <select name="INFMATION_HR_ID" id="INFMATION_HR_ID" class="form-control input-lg fo13" >
                                        <option value="">--เลือก--</option>
                                        @foreach ($infopersons as $infoperson) 
                                        <option value=" {{ $infoperson -> ID }}" >{{ $infoperson -> HR_FNAME }} {{ $infoperson -> HR_LNAME }}</option>            
                                        @endforeach         
                                    </select>
                                    </div>

                                    <div class="col-sm-2">
                                    <label>ติดต่อ :</label>
                                    </div> 
                                    <div class="col-lg-4">
                                    <input name="INFMATION_HR_TEL" id="INFMATION_HR_TEL" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" maxlength="10" class="form-control input-lg fo13"  >  
                                    </div> 
                            </div>

                    </div>
                
                    </div>
<div class="modal-footer">
<div align="right">
<button type="submit"  class="btn btn-hero-sm btn-hero-info fo14 loadscreen" ><i class="fas fa-save mr-2"></i>บันทึกข้อมูล</button>
<a href="{{ url('manager_guesthouse/guesthouserequestdetail')  }}" class="btn btn-hero-sm btn-hero-danger fo14 " onclick="return confirm('ต้องการที่จะยกเลิกการเพิ่มข้อมูล ?')" ><i class="fas fa-window-close mr-2"></i>ยกเลิก</a>
</div>


</div>
</form>  

    
  
@endsection

@section('footer')
<script src="{{ asset('select2/select2.min.js') }}"></script>

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

$(document).ready(function() {
    $("select").select2();
});


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


   $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true,
                autoclose: true                         //Set เป็นปี พ.ศ.
            }).datepicker("setDate", 0);  //กำหนดเป็นวันปัจุบัน
    });
</script>


<script>
function readURL1(input) {
        var fileInput = document.getElementById('picture');
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();    
        var numb = input.files[0].size/1024;
   
                    if(numb > 64){
                        alert('กรุณาอัปโหลดไฟล์ขนาดไม่เกิน 64KB');
                            fileInput.value = '';
                            return false;
                        }
    		
                    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                        var reader = new FileReader();
            
                        reader.onload = function (e) {
                            $('#image_upload_preview').attr('src', e.target.result);
                        }
            
                        reader.readAsDataURL(input.files[0]);
                    }else{
                                alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                                fileInput.value = '';
                                return false;
                    }

                }


            
                $("#picture").change(function () {
                    readURL1(this);
                });

       

                </script>

@endsection