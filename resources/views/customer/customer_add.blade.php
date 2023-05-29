@extends('layouts.market')
@section('title', 'ZOFFice || เพิ่มรายชื่อสมาชิก')
@section('menu')
<script>
    function TypeAdmin() {
        window.location.href = '{{ route('index') }}';
    }
  </script>
    <?php
     if (Auth::check()) {
        $type = Auth::user()->type;
        $iduser = Auth::user()->id;
    } else {
        echo "<body onload=\"TypeAdmin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
   
    ?>
<style>
    .btn {
        font-size: 15px;
    }
    .bgc {
            background-color: #264886;
        }

        .bga {
            background-color: #fbff7d;
        }
</style>
<?php
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\MarketController;
use App\Http\Controllers\StaticController;
    $refcustomer = MarketController::refcustomer(); 
    $count_product = StaticController::count_product(); 
    $count_service = StaticController::count_service(); 
    $count_marketproducts = StaticController::count_marketproducts(); 
    $count_market_repproducts = StaticController::count_market_repproducts();
?>
   <div class="px-3 py-2 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">     
           
            <a href="{{url("customer/customer")}}" class="col-4 col-lg-auto mb-lg-0 me-lg-auto btn btn-light btn-sm text-dark me-2">สมาชิก<span class="badge bg-danger ms-2">{{$count_market_repproducts}}</span></a>  
        <div class="text-end">
            <a href="{{ url('customer/customer_add') }}" class="btn btn-light btn-sm text-dark me-2">เพิ่มสมาชิก </a>
        </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container-fluid " style="width: 97%">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        เพิ่มรายชื่อสมาชิก
                    </div>
                    <div class="card-body shadow-lg">
                        <form class="custom-validation" action="{{ route('cus.customer_save') }}" method="POST"
                            id="save_customerForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="store_id" id="store_id" value="{{ Auth::user()->store_id }}">

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <img src="{{ asset('assets/images/default-image.jpg') }}" id="add_upload_preview"
                                            alt="Image" class="img-thumbnail" width="450px" height="350px">
                                        <br>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="img">Upload</label>
                                            <input type="file" class="form-control" id="img" name="img"
                                                onchange="addpic(this)">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <label for="pcustomer_code">รหัสสมาชิก </label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input id="pcustomer_code" type="text" class="form-control" name="pcustomer_code" value="{{$refcustomer}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-1 mt-2">
                                            <label for="pcustomer_tel">เบอร์โทร </label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input id="pcustomer_tel" type="text" class="form-control"
                                                    name="pcustomer_tel">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3"> 
                                        
                                        <div class="col-md-2 mt-2">
                                            <label for="customer_pname">คำนำหน้า </label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select id="customer_pname" name="customer_pname"
                                                    class="form-select form-select-lg show_cat" style="width: 100%">
                                                    <option value="">--เลือก--</option>
                                                    @foreach ($users_prefix as $pre)
                                                        <option value="{{ $pre->prefix_code }}">
                                                            {{ $pre->prefix_name }}
                                                        </option>
                                                    @endforeach
                                                </select>     
                                            </div>
                                        </div>
                                        <div class="col-md-1 mt-2">
                                            <label for="pcustomer_fname" >ชื่อ </label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"> 
                                                    <input type="text" id="pcustomer_fname" name="pcustomer_fname" class="form-control"/>
                                                    
                                              
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1 mt-2">
                                            <label for="pcustomer_lname" >นามสกุล </label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"> 
                                                    <input type="text" id="pcustomer_lname" name="pcustomer_lname" class="form-control"/>
                                                    
                                                
                                            </div>
                                        </div> 

                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-md-2 mt-2">
                                            <label for="pcustomer_address">ที่อยู่ </label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea class="form-control" id="pcustomer_address" name="pcustomer_address" rows="3"></textarea>
                                            </div>
                                        </div>

                                       
                                        <div class="col-md-1">   </div> 

                                    </div>
                              
                                </div>
                                       
                                    <div class="card-footer mt-3">
                                        <div class="col-md-12 mt-3 text-end">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-floppy-disk me-2"></i>
                                                    บันทึกข้อมูล
                                                </button>
                                                <a href="{{ url('customer/customer') }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-xmark me-2"></i>
                                                    ยกเลิก
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


       
   

    @endsection
