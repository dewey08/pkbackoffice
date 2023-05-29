@extends('layouts.market')
@section('title', 'ZOFFice || ทำรายการรับสินค้า')
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
    $refnumber = MarketController::refnumber(); 
    $refmaxidfirst = MarketController::refmaxidfirst(); 
    $count_product = StaticController::count_product(); 
    $count_service = StaticController::count_service(); 
    $count_marketproducts = StaticController::count_marketproducts(); 
    $count_market_repproducts = StaticController::count_market_repproducts();
?>
   <div class="px-3 py-2 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">     
            
            {{-- <a href="{{url("market/product_index")}}" class="btn btn-light btn-sm text-dark me-1">รายการสินค้า<span class="badge bg-danger ms-2">{{$count_marketproducts}}</span></a>    --}}
            <a href="{{url("market/rep_product")}}" class="col-4 col-lg-auto mb-lg-0 me-lg-auto btn btn-light btn-sm text-dark me-2">รับสินค้า<span class="badge bg-danger ms-2">{{$count_market_repproducts}}</span></a>  
        <div class="text-end">
            <a href=" " class="btn btn-secondary btn-sm text-white me-2">รับสินค้า </a>
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
                        ทำรายการรับสินค้า
                    </div>
                    <div class="card-body shadow-lg">

                        <form class="custom-validation" action="{{ route('mar.rep_product_save') }}" method="POST" id="insert_repForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="store_id" id="store_id" value=" {{ Auth::user()->store_id }}">
                            <input type="hidden" name="user_id" id="user_id" value=" {{ Auth::user()->id }}">
                            <input id="request_phone" type="hidden" class="form-control" name="request_phone" value="{{ Auth::user()->tel }}">
                            <input id="dep_subsubtrueid" type="hidden" class="form-control" name="dep_subsubtrueid" value="{{ Auth::user()->dep_subsubtrueid }}">
                            <input id="dep_subsubtruename" type="hidden" class="form-control" name="dep_subsubtruename" value="{{ Auth::user()->dep_subsubtruename }}">
                            <input type="hidden" name="refmaxid" id="refmaxid" value=" {{ $refmaxidfirst }}">

                            <div class="row ">
                                <div class="col-md-2 text-end">
                                    <div class="form-group text-right">
                                        <label for="" class="">เลขที่</label>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input id="request_code" type="text" class="form-control" name="request_code"
                                            value="{{ $refnumber }}" readonly>
                                    </div>
                                </div>  
                                <div class="col-md-2 text-end">
                                    <div class="form-group">
                                        <label for="">เลขที่บิล </label>
                                    </div>
                                </div>                        
                                <div class="col-md-2">
                                    <div class="form-group">
                                    
                                        <input id="request_no_bill" type="text" class="form-control" name="request_no_bill" >
                                    </div>
                                </div>   
                                <div class="col-md-2 text-end">
                                    <div class="form-group">
                                        <label for="">ปี</label>
                                    </div>
                                </div>                                          
                                <div class="col-md-2">
                                    <div class="form-group">
                                     
                                        <select id="request_year" name="request_year" class="form-select-lg"
                                            style="width: 100%">
                                            @foreach ($budget_year as $year)
                                                <option value="{{ $year->leave_year_id }}"> {{ $year->leave_year_id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>         
                               
                                                  
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-2 text-end">
                                    <div class="form-group">
                                        <label for="">วันที่ </label>
                                    </div>
                                </div>                        
                                <div class="col-md-2">
                                    <div class="form-group">
                                    
                                        <input id="request_date" type="date" class="form-control" name="request_date" >
                                    </div>
                                </div> 
                                {{-- <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">ตัวแทนจำหน่าย</label>
                                    </div>
                                </div>                                          
                                <div class="col-md-2">
                                    <div class="form-group">
                                     
                                        <select id="request_vendor_id" name="request_vendor_id" class="form-select-lg"
                                            style="width: 100%">
                                            @foreach ($products_vendor as $ven)
                                                <option value="{{ $ven->vendor_id }}"> {{ $ven->vendor_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-2 text-end">
                                    <div class="form-group">
                                        <label for="">ผู้รับ </label>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                       
                                        
                                        <input id="" type="text" class="form-control" name="" value="{{ Auth::user()->fname }}  {{ Auth::user()->lname }}" readonly>
                                    </div>
                                </div>    
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-2 text-end">
                                    <div class="form-group">
                                        <label for="">ตัวแทนจำหน่าย</label>
                                    </div>
                                </div>                                          
                                <div class="col-md-2">
                                    <div class="form-group">
                                     
                                        <select id="request_vendor_id" name="request_vendor_id" class="form-select-lg shwo_ven"
                                            style="width: 100%">
                                            @foreach ($products_vendor as $ven)
                                                <option value="{{ $ven->vendor_id }}"> {{ $ven->vendor_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end">
                                    <label for="" style="color: rgb(255, 145, 0)">* ถ้าไม่มีให้เพิ่ม </label>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-outline bga">
                                            <input type="text" id="VEN_INSERT" name="VEN_INSERT" class="form-control shadow"/>
                                            <label class="form-label" for="VEN_INSERT" style="color: rgb(255, 72, 0)">เพิ่มตัวแทนจำหน่าย</label>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-1"> 
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="addvendor();">
                                            เพิ่ม
                                        </button> 
                                    </div>
                                </div> 
                                <div class="col-md-1">   </div>
                            </div>
                           
                            </div>
                            <div class="modal-footer"> 
                                <a href="{{url('market/rep_product')}}" class="btn btn-danger btn-sm" ><i class="fa-solid fa-circle-left me-2"></i>ย้อนกลับ</a>
                                {{-- <button type="button" id="#saveBtn" class="btn btn-primary btn-sm" data-mdb-toggle="collapse"
                                href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa-solid fa-circle-right me-2"></i>ต่อไป</button> --}}
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-right me-2"></i>ต่อไป</button>
                            </div>
                        </form>

                         <!-- Collapsed content -->
          <div class="collapse mt-3 mb-5" id="collapseExample">
            <div class="row text-center">
                  <div class="col-md-4 text-end">
                    <label for="meeting_time_begin">ผู้ร่วมเดินทาง :</label>
                  </div> 
                  <div class="col-md-3">
                    <div class="form-group">
                          <select name="meetting_year" id="meetting_year" class="form-control"
                          style="width: 100%;">
                        
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button type="button" id="closebtn" class="btn btn-primary btn-sm" >เพิ่มผู้ร่วมเดินทาง</button>
                  </div>
                  <div class="col-md-3">
                  </div>
            </div>
         
          <div class="row mt-3">
                <div class="col-md-1"> </div>
                <div class="col-md-10"> 
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm myTable" style="width: 100%;"> 
                            <thead>
                                    <tr>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>11</td>
                                        <td>22</td>
                                        <td>33</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-1"> </div>
          </div>


      </div>
                            
                    </div>
                </div>
            </div>
        </div>


       
   

    @endsection
