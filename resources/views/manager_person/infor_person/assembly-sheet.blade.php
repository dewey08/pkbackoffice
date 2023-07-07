@extends('layouts.person')

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('asset/ets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
<link href="{{ asset('datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

<style>
      .center {
    margin: auto;
    width: 100%;
    padding: 10px;
  }

  body {
    font-family: 'Kanit', sans-serif;
    font-size: 13px;

  }

  .form-control {
    font-family: 'Kanit', sans-serif;
    font-size: 13px;
  }

  label {
    font-family: 'Kanit', sans-serif;
    font-size: 14px;
  }

  th {
    text-align: center;
  }


  .text-pedding {
    padding-left: 10px;
  }

  .font-table-title{
    font-weight: bold;
    font-size: 14px;
    text-align: center;
  }

</style>

{{-- <div class="loading-page">
  <div id="loader-wrapper">
    <div id="loader"></div>

  </div>
</div> --}}


<!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
{{-- <div id="page-header-loadesr" class="overlay-header bg-primary-darker">
  <div class="content-header">
      <div class="w-100 text-center">
          <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
      </div>
  </div>
</div> --}}
<!-- END Header Loader -->

@section('content')



<div class="content">
  <div class="block block-rounded block-bordered">
      <div class="block-content">
          <h2 class="content-heading pt-0" style="font-family: 'Kanit', sans-serif;">ข้อมูลใบประกอบการ</h2>
          <button type="button" class="btn btn-hero-sm btn-hero-info" data-toggle="modal" data-target=".add"><i
                  class="fas fa-plus"></i> เพิ่มข้อมูลใบประกอบการ
              </button>
          <div class="mt-3">
              <div class="panel-body" style="overflow-x:auto;">     
                  <div class="table-responsive">
                      <table class="table-striped table-vcenter js-dataTable-simple" width="100%">
                          <thead style="background-color: #FFEBCD;">
                              <tr height="40">
                                  <th width="">
                                      <span class="font-table-title">วันออกบัตร</span>
                                  </th>
                                  <th width="">
                                      <span class="font-table-title">วันที่หมดอายุ</span>
                                  </th>
                                  <th width="50%">
                                      <span class="font-table-title">เลขใบประกอบ</span>
                                  </th>
                                  <th width="20%">
                                      <span class="font-table-title">หมายเหตุ</span>
                                  </th>
                                  <th width="8%">
                                      <span class="font-table-title">คำสั่ง</span>
                                  </th>
                              </tr>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



@endsection
@section('footer')

<script src="{{ asset('datepicker/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('datepicker/dist/js/bootstrap-datepicker-custom.js') }}"></script>
<script src="{{ asset('datepicker/dist/locales/bootstrap-datepicker.th.min.js') }}" charset="UTF-8"></script>

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

@endsection