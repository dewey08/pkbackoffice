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
            font-size: 13px;

        }

        label {
            font-family: 'Kanit', sans-serif;
            font-size: 13px;

        }

        .text-pedding {
            padding-left: 10px;
        }

        .text-font {
            font-size: 13px;
        }


        .form-control {
            font-size: 13px;
        }

    </style>

    <script>
        function checklogin() {
            window.location.href = '{{ route('index') }}';
        }

    </script>
    <?php
    if (Auth::check()) {
    $status = Auth::user()->status;
    $id_user = Auth::user()->PERSON_ID;
    } else {
    echo "

    <body onload=\"checklogin()\"></body>";
    exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

    use App\Http\Controllers\RiskController;
    $refnumber = RiskController::refnumberRisk();
    $checkrisknotify = RiskController::checkrisknotify($user_id);
    $countrisknotify = RiskController::countrisknotify($user_id);

    
    $check = RiskController::checkpermischeckinfo($user_id);

    use App\Http\Controllers\FectdataController;
    $checkleader_sub = FectdataController::checkleader_sub($id_user);

    $datenow = date('Y-m-d');
    ?>
    <?php

    function timeformate($strtime)
    {
    [$a, $b] = explode(':', $strtime);
    return $a . ':' . $b;
    }
    ?>

    <div class="bg-body-light">
        <div class="content">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 style="font-family: 'Kanit', sans-serif; font-size:15px;font-size: 1.3rem;font-weight:normal;">
                    {{ $inforpersonuser->HR_PREFIX_NAME }} {{ $inforpersonuser->HR_FNAME }}
                    {{ $inforpersonuser->HR_LNAME }}</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      
                        <div class="row">
                            <div>
                                <a href="{{ url('general_risk/dashboard_risk/' . $inforpersonuserid->ID) }}" class="btn "
                                    style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">

                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </div>
                            <div>&nbsp;</div>

                            <div>
                                <a href="{{ url('general_risk/risk_notify_internalcontrol/' . $inforpersonuserid->ID) }}"
                                    class="btn btn-hero-sm btn-hero"
                                    style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">กระบวนการทำงาน
                                </a>
                            </div>
                            <div>&nbsp;</div>
                            <div>
                                <a href="{{ url('general_risk/risk_notify_report4/'.$inforpersonuserid->ID) }}"
                                  class="btn btn-hero-sm btn-hero"
                                  style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">รายงาน ปค.4
                              </a>
                            </div>
                              <div>&nbsp;</div>

                              <div>
                                <a href="{{ url('general_risk/risk_notify_report5/' . $inforpersonuserid->ID) }}"
                                    class="btn btn-hero-sm btn-hero"
                                    style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">รายงาน ปค.5
                              </a>
                            </div>
                              <div>&nbsp;</div>

                            <div>
                                <a href="{{ url('general_risk/risk_notify_account_detail/' . $inforpersonuserid->ID) }}"
                                    class="btn btn-hero-sm btn-hero"
                                    style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">บัญชีความเสี่ยง
                                </a>
                            </div>
                            <div>&nbsp;</div>


                            <div>
                                <a href="{{ url('general_risk/risk_notify/' . $inforpersonuserid->ID) }}"
                                    class="btn btn-hero-sm btn-hero "
                                    style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">บันทึกความเสี่ยง</a>
                            </div>
                            <div>&nbsp;</div>
                        @if($check == 1)
                            <div>
                                <a href="{{ url('general_risk/risk_notify_checkinfo/' . $inforpersonuserid->ID) }}"
                                    class="btn btn-hero-sm btn-hero-info"
                                    style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;">ตรวจสอบ
                                </a>
                            </div>
                            <div>&nbsp;</div>
                        @endif
                            <div>
                                <a href="{{ url('general_risk/risk_notify_deal/' . $inforpersonuserid->ID) }}"
                                    class="btn btn-hero-sm btn-hero "
                                    style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">ความเสี่ยงที่เกี่ยวข้อง</a>
                                <span class="badge badge-light"></span>
                                </a>
                            </div>
                            <div>&nbsp;&nbsp;</div>
                       
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="content p-0">
        <div class="block block-rounded block-bordered " >


            <div class="block-content">
                <h2 class="content-heading pt-0" style="font-family: 'Kanit', sans-serif;">ตรวจสอบรายงานความเสี่ยง</h2>
                <div class="block-content block-content-full" >
                    <form method="post" action="{{ route('gen_risk.risk_notify_check_update') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <input value="{{ $id_user }}" type="hidden" name="USER_ID" id="USER_ID"
                            class="form-control input-lg">

                        <input value="{{ $rigreps->RISKREP_ID }}" type="hidden" name="RISKREP_ID" id="RISKREP_ID"
                            class="form-control input-lg">

                

                        <div class="row push text-left">
                            <div class="col-sm-2 fo14">
                                <label for="RISKREP_NO ">Risk no. :</label>
                            </div>
                            <div class="col-lg-2 ">
                                <input type="text" name="RISKREP_NO" id="RISKREP_NO" class="form-control input-sm fo13"
                                    value="{{ $rigreps->RISKREP_NO }}" readonly>
                            </div>

                            <div class="col-sm-1">
                                <label style="font-family:'Kanit',sans-serif;font-size:13px;">วันที่บันทึก:</label>
                            </div>
                            <div class="col-lg-2 ">
                                <input name="RISKREP_DATESAVE" id="RISKREP_DATESAVE"
                                    class="form-control input-sm datepicker fo13" data-date-format="mm/dd/yyyy"
                                    value="{{ formate($rigreps->RISKREP_DATESAVE) }}" readonly>

                            </div>
                            <div class="col-sm-2">
                                <label for="RISKREP_DEPARTMENT_SUB"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">หน่วยงานที่รายงาน :</label>
                            </div>
                            <div class="col-lg-3 ">
                                @foreach($departsubs as $departsub)
                                <input type="text" class="form-control input-sm fo13" name="" id="" value="{{ $departsub-> HR_DEPARTMENT_SUB_SUB_NAME}}" readonly>
                                <input type="hidden" class="form-control input-sm fo13" name="RISKREP_DEPARTMENT_SUB" id="RISKREP_DEPARTMENT_SUB" value="{{ $departsub-> HR_DEPARTMENT_SUB_SUB_ID}}" >
                                @endforeach                  
                            </div>
                        </div>
                        <div class="row push text-left">
                           
                            <div class="col-sm-2">
                                <label style="font-family:'Kanit',sans-serif;font-size:13px;">แหล่งที่มา/วิธีการค้นพบ
                                    :</label>
                            </div>
                            <div class="col-lg-2 ">
                                <select name="RISKREP_SEARCHLOCATE" id="RISKREP_SEARCHLOCATE"
                                    class="form-control js-example-basic-single" style="width: 100%" required>
                                    <option value="">--เลือก--</option>
                                    @foreach ($locations as $location)
                                        @if ($location->INCIDENCE_LOCATION_ID == $rigreps->RISKREP_SEARCHLOCATE)
                                            <option value="{{ $location->INCIDENCE_LOCATION_ID }}" selected>
                                                {{ $location->INCIDENCE_LOCATION_NAME }} </option>
                                        @else
                                            <option value="{{ $location->INCIDENCE_LOCATION_ID }}">
                                                {{ $location->INCIDENCE_LOCATION_NAME }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-1">
                                <label for="RISKREP_TYPE"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">ประเภทสถานที่:</label>
                            </div>
                            <div class="col-lg-2 ">
                                <select name="RISKREP_TYPE" id="RISKREP_TYPE"
                                    class="form-control js-example-basic-single typelocation fo13" style="width: 100%"
                                    required>
                                    @foreach ($typelocations as $typelocation)

                                        @if ($typelocation->SETUP_TYPELOCATION_ID == $rigreps->RISKREP_TYPE)

                                            <option value="{{ $typelocation->SETUP_TYPELOCATION_ID }}" selected>
                                                {{ $typelocation->SETUP_TYPELOCATION_NAME }} </option>
                                        @else
                                            <option value="{{ $typelocation->SETUP_TYPELOCATION_ID }}">
                                                {{ $typelocation->SETUP_TYPELOCATION_NAME }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="RISKREP_USEREFFECT"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">ผู้รายงาน :</label>
                            </div>
                            <div class="col-lg-3 ">
                              
                                <input type="text" class="form-control input-sm fo13" name="" id="" value="{{ $rigreps-> RISKREP_USEREFFECT_FULLNAME}}" readonly>
                                <input type="hidden" class="form-control input-sm fo13" name="RISKREP_USEREFFECT" id="RISKREP_USEREFFECT" value="{{ $rigreps-> RISKREP_USEREFFECT}}" >
                             
                            </div>
                        </div>


                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISKREP_STARTDATE"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">วันที่เกิดอุบัติการณ์ความเสี่ยง
                                </label><label style="color:red;"> **</label><label> :</label>
                            </div>
                            <div class="col-lg-2 ">
                                <input name="RISKREP_STARTDATE" id="RISKREP_STARTDATE"
                                    class="form-control input-sm datepicker fo13" data-date-format="mm/dd/yyyy"
                                    value="{{ formate( $rigreps->RISKREP_STARTDATE ) }}" readonly>
                            </div>
                            <div class="col-sm-1">
                                <label style="font-family:'Kanit',sans-serif;font-size:13px;">วันที่ค้นพบ </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-2 ">
                                <input name="RISKREP_DIGDATE" id="RISKREP_DIGDATE"
                                    class="form-control input-sm datepicker fo13" data-date-format="mm/dd/yyyy"
                                    value="{{ formate($rigreps->RISKREP_DIGDATE) }}" readonly>
                            </div>

                            <div class="col-sm-2">
                                <label for="RISKREP_LOCAL"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">ชนิดสถานที่ </label><label
                                    style="color:red;"> **</label><label> :</label>
                            </div>
                            <div class="col-lg-3 ">
                                <select name="RISKREP_LOCAL" id="RISKREP_LOCAL"
                                    class="form-control js-example-basic-single typelocationdetail fo13" required>
                                    <option value="">--กรุณาเลือก--</option>
                                    @foreach ($grouplocations as $grouplocation)
                                        @if ($rigreps->RISKREP_LOCAL == $grouplocation->RISK_LOCATION_ID)
                                            <option value="{{ $grouplocation->RISK_LOCATION_ID }}" selected>
                                                {{ $grouplocation->RISK_LOCATION_CODE }} ::
                                                {{ $grouplocation->RISK_LOCATION_NAME }}</option>

                                        @else
                                            <option value="{{ $grouplocation->RISK_LOCATION_ID }}">
                                                {{ $grouplocation->RISK_LOCATION_CODE }} ::
                                                {{ $grouplocation->RISK_LOCATION_NAME }}</option>

                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
    <div class="row push text-left">
        <div class="col-sm-2">
            <label style="font-family:'Kanit',sans-serif;font-size:13px;">สถานที่เกิดเหตุ อาคาร :</label>
        </div>

        <div class="col-lg-2 ">     

            <select name="RISKREP_LOCATION_ID" id="RISKREP_LOCATION_ID" class="form-control input-lg location "
            style=" font-family: 'Kanit', sans-serif;" onchange="locationsee();" >
           
            <option value="">--กรุณาเลือกสถานที่--</option>
            @foreach ($infolocations as $infolocation)
             @if($infolocation->LOCATION_ID == $rigreps->RISKREP_LOCATION_ID)
             <option value="{{$infolocation->LOCATION_ID}}" selected>{{ $infolocation->LOCATION_NAME}}</option>
             @else 
             <option value="{{$infolocation->LOCATION_ID}}">{{ $infolocation->LOCATION_NAME}}</option>
             @endif
            
            @endforeach
        </select>

        </div>

        <div class="col-sm-1">
            <label style="font-family:'Kanit',sans-serif;font-size:13px;">ชั้น :</label>
        </div>
        <div class="col-lg-2 ">
            <select name="RISKREP_LOCATION_LEVEL" id="RISKREP_LOCATION_LEVEL"
            class="form-control input-lg locationlevel" style=" font-family: 'Kanit', sans-serif;">
          
            <option value="">--กรุณาเลือกชั้น--</option>
            @foreach ($infolocationlevels as $infolocationlevel)
              @if($infolocationlevel->LOCATION_LEVEL_ID == $rigreps->RISKREP_LOCATION_LEVEL )
                <option value="{{$infolocationlevel->LOCATION_LEVEL_ID}}" selected>{{$infolocationlevel->LOCATION_LEVEL_NAME}}</option>
              @else
                <option value="{{$infolocationlevel->LOCATION_LEVEL_ID}}">{{$infolocationlevel->LOCATION_LEVEL_NAME}}</option>
              @endif
            @endforeach
        </select>
        </div>

        <div class="col-sm-2">
            <label style="font-family:'Kanit',sans-serif;font-size:13px;">ห้อง :</label>
        </div>
        <div class="col-lg-2 ">
            <select name="RISKREP_LOCATION_LEVEL_ROOM" id="RISKREP_LOCATION_LEVEL_ROOM"
        class="form-control input-lg locationlevelroom " style=" font-family: 'Kanit', sans-serif;">
        <option value="">--กรุณาเลือกห้อง--</option>
        @foreach ($infolocationlevelrooms as $infolocationlevelroom)
                @if($infolocationlevelroom->LEVEL_ROOM_ID == $rigreps->RISKREP_LOCATION_LEVEL_ROOM  )
                    <option value="{{$infolocationlevelroom->LEVEL_ROOM_ID}}" selected>{{$infolocationlevelroom->LEVEL_ROOM_NAME}}</option>
                @else
                    <option value="{{$infolocationlevelroom->LEVEL_ROOM_ID}}">{{$infolocationlevelroom->LEVEL_ROOM_NAME}}</option>
                @endif

        @endforeach
    </select>
        </div>

    </div>
    <div class="row push text-left">
        
        <div class="col-sm-2">
            <label style="font-family:'Kanit',sans-serif;font-size:13px;">พื้นที่นอกโรงพยาบาล :</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" name="RISKREP_LOCATION_OTHER" id="RISKREP_LOCATION_OTHER" placeholder="ระบุสถานที่กรณีพื้นที่นอกโรงพยาบาล" value="{{$rigreps->RISKREP_LOCATION_OTHER}}"  >
        </div>
    </div>

        <div class="row push text-left">

        <div class="col-sm-2">
            <label style="font-family:'Kanit',sans-serif;font-size:13px;">ช่วงเวลา :</label>
        </div>
        <div class="col-lg-5 ">
            <select name="RISKREP_FATE" id="RISKREP_FATE" class="form-control input-sm fo13" required>
                <option value="">--เลือก--</option>
                @foreach ($worktimes as $worktime)
                  @if($worktime->RISK_TIME_ID == $rigreps->RISKREP_FATE )
                  <option value="{{ $worktime->RISK_TIME_ID }}" selected>
                    {{ $worktime->RISK_TIME_NAME }}</option>
                  @else
                        <option value="{{ $worktime->RISK_TIME_ID }}">
                            {{ $worktime->RISK_TIME_NAME }}</option>

                  @endif
               
                @endforeach
            </select>
        </div>
        <div class="col-sm-2">
            <label style="font-family:'Kanit',sans-serif;font-size:13px;">หรือเวลา :</label>
        </div>
        <div class="col-lg-1 ">
            <input name="RISKREP_TIME" id="RISKREP_TIME" class="js-masked-time form-control fo13" value="{{$rigreps->RISKREP_TIME}}">
        </div>
        <div class="col-sm-1">
            <label style="font-family:'Kanit',sans-serif;font-size:13px;">เช่น 21.59</label>
        </div>
    </div>




                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label style="font-family:'Kanit',sans-serif;font-size:13px;">รายละเอียดเหตุการณ์ :</label>
                            </div>
                            <div class="col-lg-10 ">
                                <textarea name="RISKREP_DETAILRISK" id="RISKREP_DETAILRISK"
                                    class="form-control input-lg time fo13" rows="3"
                                    required> {{ $rigreps->RISKREP_DETAILRISK }} </textarea>
                            </div>
                        </div>

           

                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label style="font-family:'Kanit',sans-serif;font-size:13px;">การจัดการเบื้องต้น :</label>
                            </div>
                            <div class="col-lg-10 ">
                                <textarea name="RISKREP_BASICMANAGE" id="RISKREP_BASICMANAGE"
                                    class="form-control input-lg time"
                                    style=" font-family:'Kanit', sans-serif;font-size:13px;" rows="2"
                                    required> {{ $rigreps->RISKREP_BASICMANAGE }} </textarea>
                            </div>
                        </div>


                        <hr>
 
                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for=""
                                    style="font-family:'Kanit',sans-serif;font-size:15px;color:rgb(0,0,128);">หัวหน้าหน่วยงานตรวจสอบ
                                    :</label>
                            </div>
                            <div class="col-lg-10">
                                <label for=""
                                    style="font-family:'Kanit',sans-serif;font-size:15px;color:rgb(0,0,128);">{{ $rigreps->LEADER_PERSON_NAME }}</label>
                            </div>
                        </div>

                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISK_REPPROGRAM_ID"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">ลักษณะอุบัติการณ์ </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-10 ">
                                <select name="RISK_REPPROGRAM_ID" id="RISK_REPPROGRAM_ID"
                                    class="form-control js-example-basic-single" style="width: 100%" required>
                                    <option value="">--กรุณาเลือก--</option>
                                    @foreach ($riskprograms as $g)
                                        @if ($rigreps->RISK_REPPROGRAM_ID == $g->RISK_REPPROGRAM_ID)
                                            <option value="{{ $g->RISK_REPPROGRAM_ID }}" selected>
                                                {{ $g->RISK_REPPROGRAM_NAME }}</option>
                                        @else
                                            <option value="{{ $g->RISK_REPPROGRAM_ID }}">
                                                {{ $g->RISK_REPPROGRAM_NAME }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                            <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISK_REPPROGRAMSUB_ID"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">รายละเอียดย่อย 1 </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-10 ">
                                <select name="RISK_REPPROGRAMSUB_ID" id="RISK_REPPROGRAMSUB_ID"
                                    class="form-control js-example-basic-single programsub fo13" style="width: 100%">
                                    <option value="">--กรุณาเลือก--</option>
                                    @foreach ($riskprogramsubs as $gs)
                                        @if ($rigreps->RISK_REPPROGRAM_ID == $gs->RISK_REPPROGRAM_ID)
                                            <option value="{{ $gs->RISK_REPPROGRAMSUB_ID }}" selected>
                                                {{ $gs->RISK_REPPROGRAMSUB_NAME }}</option>
                                        @else
                                            <option value="{{ $gs->RISK_REPPROGRAMSUB_ID }}">
                                                {{ $gs->RISK_REPPROGRAMSUB_NAME }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISK_REPPROGRAMSUBSUB_ID"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">รายละเอียดย่อย2 </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-10 ">
                                <select name="RISK_REPPROGRAMSUBSUB_ID" id="RISK_REPPROGRAMSUBSUB_ID"
                                    class="form-control js-example-basic-single programsubsub fo13" style="width: 100%">
                                    <option value="">--กรุณาเลือก--</option>
                                    @foreach ($riskprogramsubsubs as $gss)
                                        @if ($rigreps->RISK_REPPROGRAMSUBSUB_ID == $gss->RISK_REPPROGRAMSUBSUB_ID)
                                            <option value="{{ $gss->RISK_REPPROGRAMSUBSUB_ID }}" selected>
                                                {{ $gss->RISK_REPPROGRAMSUBSUB_NAME }}</option>
                                        @else
                                            <option value="{{ $gss->RISK_REPPROGRAMSUBSUB_ID }}">
                                                {{ $gss->RISK_REPPROGRAMSUBSUB_NAME }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISK_REPTYPERESON_ID"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">สาเหตุที่ชัดแจ้ง </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-2 ">
                                <select name="RISK_REPTYPERESON_ID" id="RISK_REPTYPERESON_ID"
                                    class="form-control js-example-basic-single fo13" style="width: 100%" required>
                                    <option value="">--กรุณาเลือก--</option>
                                    @foreach ($risktypereasons as $gt)
                                        @if ($rigreps->RISK_REPTYPERESON_ID == $gt->RISK_REPTYPERESON_ID)
                                            <option value="{{ $gt->RISK_REPTYPERESON_ID }}" selected>
                                                {{ $gt->RISK_REPTYPERESON_NAME }}</option>
                                        @else
                                            <option value="{{ $gt->RISK_REPTYPERESON_ID }}">
                                                {{ $gt->RISK_REPTYPERESON_NAME }}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISK_REPTYPERESONSYS_ID"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">สาเหตุเชิงระบบ </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-10 ">
                                <select name="RISK_REPTYPERESONSYS_ID" id="RISK_REPTYPERESONSYS_ID"
                                    class="form-control js-example-basic-single fo13" style="width: 100%" required>
                                    <option value="">--กรุณาเลือก--</option>
                                    @foreach ($risktypereasonsyss as $gts)
                                        @if ($rigreps->RISK_REPTYPERESONSYS_ID == $gts->RISK_REPTYPERESONSYS_ID)
                                            <option value="{{ $gts->RISK_REPTYPERESONSYS_ID }}" selected>
                                                {{ $gts->RISK_REPTYPERESONSYS_NAME }} ::  {{$gts->RISK_REPTYPERESONSYS_DETAIL}} </option>
                                        @else
                                            <option value="{{ $gts->RISK_REPTYPERESONSYS_ID }}">
                                                {{ $gts->RISK_REPTYPERESONSYS_NAME }} ::  {{$gts->RISK_REPTYPERESONSYS_DETAIL}} </option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISKREP_LEVEL"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">ระดับความรุนแรง </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-10 ">
                                <select name="RISKREP_LEVEL" id="RISKREP_LEVEL"
                                    class="form-control js-example-basic-single fo13" style="width: 100%" required>
                                    <option value="">-เลือก-</option>
                                    @foreach ($levels as $item)
                                        @if ($rigreps->RISKREP_LEVEL == $item->RISK_REP_LEVEL_ID)
                                            <option value="{{ $item->RISK_REP_LEVEL_ID }}" selected>
                                                {{ $item->RISK_REP_LEVEL_NAME }} :: {{ $item->RISK_REP_LEVEL_DETAIL}}</option>
                                        @else
                                            <option value="{{ $item->RISK_REP_LEVEL_ID }}">
                                               {{ $item->RISK_REP_LEVEL_NAME }}:: {{ $item->RISK_REP_LEVEL_DETAIL}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                         
                        </div>

                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label 
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">ข้อเสนอแนะ/รายละเอียดเพิ่มเติม
                                    :</label>
                            </div>
                            <div class="col-lg-10 ">
                            
                                <textarea name="RISK_REP_FEEDBACK" id="RISK_REP_FEEDBACK"
                                    class="form-control input-lg time fo13 mt-0"
                                    rows="3"> {{ $rigreps->RISK_REP_FEEDBACK }} </textarea>
                            </div>
                        </div>
                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISK_REP_EFFECT"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">ผู้ได้รับผลกระทบ </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-2 ">
                                <select name="RISK_REP_EFFECT" id="RISK_REP_EFFECT" class="js-example-basic-single fo13"
                                    style="width: 100%" >
                                    <option value="">--กรุณาเลือก--</option>
                                    @foreach ($uefects as $uefect)
                                        @if ($rigreps->RISK_REP_EFFECT == $uefect->INCEDENCE_USEREFFECT_ID)
                                            <option value="{{ $uefect->INCEDENCE_USEREFFECT_ID }}" selected>
                                                {{ $uefect->INCEDENCE_USEREFFECT_NAME }}</option>
                                        @else
                                            <option value="{{ $uefect->INCEDENCE_USEREFFECT_ID }}">
                                                {{ $uefect->INCEDENCE_USEREFFECT_NAME }} </option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-0.5">
                                <label style="font-family:'Kanit',sans-serif;font-size:13px;">เพศ </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-1.5 ">
                                <select name="RISKREP_SEX" id="RISKREP_SEX" class="form-control input-sm"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">
                                    <option value="">--เลือก--</option>
                                    @foreach ($sexs as $sex)
                                        @if ($rigreps->RISKREP_SEX == $sex->SEX_ID)
                                            <option value="{{ $sex->SEX_ID }}" selected>{{ $sex->SEX_NAME }} </option>
                                        @else
                                            <option value="{{ $sex->SEX_ID }}">{{ $sex->SEX_NAME }} </option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-0.5 ml-2">
                                <label style="font-family:'Kanit',sans-serif;font-size:13px;">อายุ </label><label
                                    style="color:red;"> *</label><label> :</label>
                            </div>
                            <div class="col-lg-1">
                                <input name="RISKREP_AGE" id="RISKREP_AGE" class="form-control input-sm fo13"
                                    value="{{ $rigreps->RISKREP_AGE }}">
                            </div>
                            <div class="col-sm-0.5 text-left">
                                <label style="font-family:'Kanit',sans-serif;font-size:13px;">ปี</label>
                            </div>
                            <div class="col-sm-4 text-left">
                                <p>( เศษของปี น้อยกว่า 6 เดือน ไห้นับเป็น 0 ปี ตั้งแต่ 6 เดือนขึ้นไปไห้นับเป็น 1 ปี)</p>
                            </div>
                        </div>
                        <div class="row push text-left">
                            <div class="col-sm-2">
                                <label for="RISK_REP_EFFECT"
                                    style="font-family:'Kanit',sans-serif;font-size:13px;">อ้างอิงบัญชีความเสี่ยง </label> :</label>
                            </div>
                            <div class="col-lg-10 ">

                                <select name="RISKREP_ACC_ID" id="RISKREP_ACC_ID" class="js-example-basic-single form-control input-sm"
                                style="font-family:'Kanit',sans-serif;font-size:13px;">
                                <option value="" >-เลือกบัญชีความเสี่ยง-</option>
                                @foreach ($inforiskaccs as $inforiskacc) 
                                       
                                    @if ($rigreps->RISKREP_ACC_ID == $inforiskacc->RISK_ACC_ID)
                                        <option value="{{ $inforiskacc->RISK_ACC_ID }}" selected>{{ $inforiskacc->RISK_ACC_ISSUE }} </option>
                                    @else
                                        <option value="{{ $inforiskacc->RISK_ACC_ID }}">{{ $inforiskacc->RISK_ACC_ISSUE }} </option>
                                    @endif

                                @endforeach
                            </select>
                               
                            </div>
                          
                        </div>

                        <hr>




                        <div class="row push ">
                            <div class="col-md-12">
                                <div class="block block-rounded block-bordered">
                                    <ul class="nav nav-tabs nav-tabs-info" data-toggle="tabs" role="tablist"
                                        style="background-color: #D2B4DE;">
                                        <li class="nav-item"><a class="nav-link active" href="#object1"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">ผู้ได้รับผลกระทบ</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#object2"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">รูปภาพ</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#object3"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">ไฟล์แนบ</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#object4"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">ทึมนำ</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#object5"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">กลุ่มงาน</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#object6"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">แผนก/ฝ่าย</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#object7"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">หน่วยงาน</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#object8"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">บุคคล</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#object9"
                                                style="font-family: 'Kanit', sans-serif; font-size:14px;font-weight:normal;">การทบทวน</a>
                                        </li>
                                    </ul>
                                    <div class="block-content tab-content">

                                        <div class="tab-pane active" id="object1" role="tabpanel">
                                            <table class="table-striped table-vcenter js-dataTable-simple"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;" width="5%">ลำดับ</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;">
                                                            ชื่อ-นามสกุล</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="7%">อายุ</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="7%">เพศ</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="15%">HN</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="10%">วันที่รับบริการ</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="15%">AN</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="10%">วันที่ Admit</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="5%"><a class="btn btn-hero-sm btn-hero-success addRow1"
                                                                style="color:#FFFFFF;"><i class="fa fa-plus"></i></a></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody1">
                                                    <?php $count=1;$number=1;?>                                                
                                                        @foreach ($ueffects as $ueffect) 
                                                    
                                                                <tr>
                                                                    <td style="text-align: center;">{{$number}}</td>                                                                                                
                                                                    <td><input name="RISK_REPEFFECT_FULLNAME[]" id="RISK_REPEFFECT_FULLNAME[]" class="form-control input-sm fo13" value="{{$ueffect->RISK_REPEFFECT_FULLNAME}}"></td>
                                                                    <td> <input name="RISK_REPEFFECT_AGE[]" id="RISK_REPEFFECT_AGE[]" class="form-control input-sm fo13" value="{{$ueffect->RISK_REPEFFECT_AGE}}"></td>
                                                                    <td> <input name="RISK_REPEFFECT_SEX[]" id="RISK_REPEFFECT_SEX[]" class="form-control input-sm fo13" value="{{$ueffect->RISK_REPEFFECT_SEX}}"> </td>
                                                                    <td><input name="RISK_REPEFFECT_HN[]" id="RISK_REPEFFECT_HN[]" class="form-control input-sm fo13" value="{{$ueffect->RISK_REPEFFECT_HN}}"> </td>
                                                                    
                                                                    <td>
                                                                        @if($ueffect->RISK_REPEFFECT_DATEIN !== '' && $ueffect->RISK_REPEFFECT_DATEIN !== null)
                                                                        <input name="RISK_REPEFFECT_DATEIN[]" id="RISK_REPEFFECT_DATEIN[]" class="form-control input-sm datepicker fo13" style=" font-family: 'Kanit', sans-serif;" value="{{ formate($ueffect->RISK_REPEFFECT_DATEIN)}}" readonly>
                                                                        @else
                                                                        <input name="RISK_REPEFFECT_DATEIN[]" id="RISK_REPEFFECT_DATEIN[]" class="form-control input-sm datepicker fo13" style=" font-family: 'Kanit', sans-serif;" readonly>
                                                                        @endif
                                                                    </td> 

                                                                    <td><input name="RISK_REPEFFECT_AN[]" id="RISK_REPEFFECT_AN[]" class="form-control input-sm fo13" value="{{$ueffect->RISK_REPEFFECT_AN}}"></td> 

                                                                    <td>
                                                                        @if($ueffect->RISK_REPEFFECT_DATEADMIN !== '' && $ueffect->RISK_REPEFFECT_DATEADMIN !== null)
                                                                        <input name="RISK_REPEFFECT_DATEADMIN[]" id="RISK_REPEFFECT_DATEADMIN[]" class="form-control input-sm datepicker fo13" style=" font-family: 'Kanit', sans-serif;" value="{{ formate($ueffect->RISK_REPEFFECT_DATEADMIN)}}" readonly>
                                                                        @else
                                                                        <input name="RISK_REPEFFECT_DATEADMIN[]" id="RISK_REPEFFECT_DATEADMIN[]" class="form-control input-sm datepicker fo13" style=" font-family: 'Kanit', sans-serif;" readonly>
                                                                        @endif
                                                                    </td> 
                                                                    
                                                                    <td style="text-align: center;"><a
                                                                            class="btn btn-hero-sm btn-hero-danger remove"
                                                                            style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php  $count++;?>
                                                            <?php $number++;?>
                                                        @endforeach   
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="object2" role="tabpanel">
                                            <table class="table-striped table-vcenter js-dataTable-simple"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-font text-pedding fo13" width="1350px">รูปภาพ</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody2">
                                                    <tr>
                                                        <td width="1350px">
                                                            @if ($rigreps->RISK_REP_IMG != null)
                                                                <img id="add_preview"
                                                                    src="data:image/png;base64,{{ chunk_split(base64_encode($rigreps->RISK_REP_IMG)) }}"
                                                                    alt="Image" class="img-thumbnail" height="250px"
                                                                    width="500px">
                                                            @else
                                                                <img id="add_preview"
                                                                    src="{{ asset('image/camera.png') }}" alt="Image"
                                                                    class="img-thumbnail" height="200" width="200" />
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="object3" role="tabpanel">
                                            <table class="gwt-table table-striped table-vcenter js-dataTable-simple"
                                                style="width: 100%;">
                                                <thead style="background-color: #F0F8FF;">
                                                    <tr>
                                                        <th style="text-align: center; font-size: 13px;">ไฟล์แนบ</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody3">
                                                    <tr>
                                                        <td class="text-font text-pedding">
                                                            @if ($rigreps->RISKREP_DOCFILE != null)
                                                                <?php [$a, $b, $c, $d] = explode('/', $url);
                                                                ?>
                                                                <iframe
                                                                    src="{{ asset('storage/riskrep/' . $rigreps->RISKREP_DOCFILE) }}"
                                                                    height="700px" width="100%"></iframe>
                                                            @else
                                                                ไม่มีข้อมูลไฟล์อัปโหลด
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="object4" role="tabpanel">                                           
                                            <table class="table-striped table-vcenter js-dataTable-simple"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;">
                                                            ชื่อทีม</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="5%">
                                                            <a class="btn btn-hero-sm btn-hero-success addRow4"
                                                                style="color:#FFFFFF;"><i class="fa fa-plus"></i></a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody4"> 
                                                    @foreach ($teamlists as $teamlist) 
                                                    <tr>                                                         
                                                        <td>
                                                            @if($teamlist->RISK_REP_TEAMLIST_CODE !== '' && $teamlist->RISK_REP_TEAMLIST_CODE !== null)
                                                                <select name="RISK_REP_TEAMLIST_NAME[]" id="RISK_REP_TEAMLIST_NAME" class="form-control input-sm foo13">
                                                                    <option value="">--กรุณาเลือก--</option>
                                                                    @foreach ($teams as $team)
                                                                    @if ($teamlist->RISK_REP_TEAMLIST_CODE == $team->HR_TEAM_NAME)
                                                                    <option value="{{ $team->HR_TEAM_ID }}" selected> {{ $team->HR_TEAM_NAME }} :: {{ $team->HR_TEAM_DETAIL }}</option>
                                                                    @else
                                                                    <option value="{{ $team->HR_TEAM_ID }}"> {{ $team->HR_TEAM_NAME }} :: {{ $team->HR_TEAM_DETAIL }}</option>
                                                                    @endif                                                                    
                                                                    @endforeach
                                                                </select>
                                                            @else
                                                                <select name="RISK_REP_TEAMLIST_NAME[]" id="RISK_REP_TEAMLIST_NAME" class="form-control input-sm foo13">
                                                                    <option value="">--กรุณาเลือก--</option>
                                                                    @foreach ($teams as $team)                                                               
                                                                    <option value="{{ $team->HR_TEAM_ID }}"> {{ $team->HR_TEAM_NAME }} :: {{ $team->HR_TEAM_DETAIL }}</option>                                                                                                                             
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center;"><a
                                                                class="btn btn-hero-sm btn-hero-danger remove"
                                                                style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="object5" role="tabpanel">
                                            <table class="table-striped table-vcenter js-dataTable-simple"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"> กลุ่มงาน</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;" width="5%"> <a class="btn btn-hero-sm btn-hero-success addRow5" style="color:#FFFFFF;"><i class="fa fa-plus"></i></a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody5">
                                                    @foreach ($rep_deps as $rep_dep)
                                                    <tr>
                                                        <td>
                                                            @if($rep_dep->RISK_REP_DEPARTMENT_NAME !== '' && $rep_dep->RISK_REP_DEPARTMENT_NAME !== null)
                                                            <select name="RISK_REP_DEPARTMENT_ID[]" id="RISK_REP_DEPARTMENT_ID" class="form-control input-sm foo13">
                                                                <option value="">--กรุณาเลือกกลุ่มงาน--</option>
                                                                @foreach ($departments as $department)
                                                                @if ($rep_dep->HR_DEPARTMENT_ID == $department->HR_DEPARTMENT_ID)
                                                                <option value="{{ $department->HR_DEPARTMENT_ID }}" selected> {{ $department->HR_DEPARTMENT_NAME }} </option>
                                                                @else
                                                                <option value="{{ $department->HR_DEPARTMENT_ID }}"> {{ $department->HR_DEPARTMENT_NAME }} </option>
                                                                @endif                                                                    
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select name="RISK_REP_DEPARTMENT_ID[]" id="RISK_REP_DEPARTMENT_ID" class="form-control input-sm fo13">
                                                                <option value="">--กรุณาเลือกกลุ่มงาน--</option>
                                                                @foreach ($departments as $department)
                                                                    <option value="{{ $department->HR_DEPARTMENT_ID }}"> {{ $department->HR_DEPARTMENT_NAME }} </option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                           
                                                        </td>
                                                        <td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="tab-pane" id="object6" role="tabpanel">
                                            <table class="table-striped table-vcenter js-dataTable-simple"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;">
                                                            แผนก/ฝ่าย</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="5%">
                                                            <a class="btn btn-hero-sm btn-hero-success addRow6"
                                                                style="color:#FFFFFF;"><i class="fa fa-plus"></i></a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody6">
                                                    @foreach ($rep_dep_subs as $rep_dep_sub)
                                                    <tr>
                                                        <td>
                                                            @if($rep_dep_sub->RISK_REP_DEPARTMENT_SUBID !== '' && $rep_dep_sub->RISK_REP_DEPARTMENT_SUBID !== null)
                                                            <select name="RISK_REP_DEPARTMENT_SUBID[]" id="RISK_REP_DEPARTMENT_SUBID" class="form-control input-sm foo13">
                                                                <option value="">--กรุณาเลือกฝ่าย/แผนก--</option>
                                                                @foreach ($infordepartmentsubs as $infordepartmentsub)
                                                                @if ($rep_dep_sub->HR_DEPARTMENT_SUB_ID == $infordepartmentsub->HR_DEPARTMENT_SUB_ID)
                                                                <option value="{{ $infordepartmentsub->HR_DEPARTMENT_SUB_ID }}" selected> {{ $infordepartmentsub->HR_DEPARTMENT_SUB_NAME }} </option>
                                                                @else
                                                                <option value="{{ $infordepartmentsub->HR_DEPARTMENT_SUB_ID }}"> {{ $infordepartmentsub->HR_DEPARTMENT_SUB_NAME }} </option>
                                                                @endif                                                                    
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select name="RISK_REP_DEPARTMENT_SUBID[]" id="RISK_REP_DEPARTMENT_SUBID" class="form-control input-sm fo13">
                                                                <option value="">--กรุณาเลือกฝ่าย/แผนก--</option>
                                                                @foreach ($infordepartmentsubs as $infordepartmentsub)
                                                                    <option value="{{ $infordepartmentsub->HR_DEPARTMENT_SUB_ID }}"> {{ $infordepartmentsub->HR_DEPARTMENT_SUB_NAME }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif

                                                        </td>
                                                        <td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="object7" role="tabpanel">
                                            <table class="table-striped table-vcenter js-dataTable-simple"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;">
                                                            หน่วยงาน</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;"
                                                            width="5%">
                                                            <a class="btn btn-hero-sm btn-hero-success addRow7"
                                                                style="color:#FFFFFF;"><i class="fa fa-plus"></i></a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody7">
                                                    @foreach ($rep_dep_subsubs as $rep_dep_subsub)
                                                        <tr>
                                                            <td>
                                                                @if($rep_dep_subsub->RISK_REP_DEPARTMENT_SUBSUBID !== '' && $rep_dep_subsub->RISK_REP_DEPARTMENT_SUBSUBID !== null)
                                                                    <select name="RISK_REP_DEPARTMENT_SUBSUBID[]" id="RISK_REP_DEPARTMENT_SUBSUBID" class="form-control input-sm foo13">
                                                                        <option value="">--กรุณาเลือกหน่วยงาน--</option>
                                                                        @foreach ($infordepartmentsubsubs as $infordepartmentsubsub)
                                                                        @if ($rep_dep_subsub->HR_DEPARTMENT_SUB_SUB_ID == $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_ID)
                                                                        <option value="{{ $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_ID }}" selected> {{ $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_NAME }}</option>
                                                                        @else
                                                                        <option value="{{ $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_ID }}"> {{ $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_NAME }}</option>
                                                                        @endif                                                                    
                                                                        @endforeach
                                                                    </select>
                                                                @else
                                                                    <select name="RISK_REP_DEPARTMENT_SUBSUBID[]" id="RISK_REP_DEPARTMENT_SUBSUBID" class="form-control input-sm fo13">
                                                                        <option value="">--กรุณาเลือกหน่วยงาน--</option>
                                                                            @foreach ($infordepartmentsubsubs as $infordepartmentsubsub)
                                                                                <option value="{{ $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_ID }}"> {{ $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_NAME }}</option>
                                                                            @endforeach
                                                                    </select>
                                                                @endif                                                            
                                                            </td>
                                                            <td style="text-align: center;"><a
                                                                    class="btn btn-hero-sm btn-hero-danger remove"
                                                                    style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="object8" role="tabpanel">
                                            <table class="table-striped table-vcenter js-dataTable-simple"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;">ชื่อ-นามสกุล</th>
                                                        <th class="text-font text-pedding fo13" style="text-align: center;" width="5%"> <a class="btn btn-hero-sm btn-hero-success addRow8" style="color:#FFFFFF;"><i class="fa fa-plus"></i></a></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody8">
                                                    <?php $count = 0; ?>

                                                    @foreach ($rep_infopers as $rep_infoper)
    
                                                        <select name="RISK_REP_PERSON_NAME[]" id="OFFER_WORK_HR_ID{{$count}}" class="form-control input-lg js-example-basic-single" style=" font-family: 'Kanit', sans-serif;" onchange="check_offer_work_hr_id();checkall();">
                                                            <option value="">--กรุณาเลือก--</option>
                                                                @foreach ($infopers as $infoperson)                                                     
                                                                    @if($rep_infoper->RISK_REP_PERSON_NAME == $infoperson ->ID)
                                                                        <option value="{{ $infoperson ->ID  }}" selected>{{ $infoperson->HR_FNAME}} {{$infoperson->HR_LNAME}}</option>
                                                                    @else
                                                                        <option value="{{ $infoperson ->ID  }}">{{ $infoperson->HR_FNAME}} {{$infoperson->HR_LNAME}}</option>
                                                                    @endif
                                                                @endforeach 
                                                            </select>
    
                                                        <?php $count++; ?>
    
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="tab-pane" id="object9" role="tabpanel">
                                            <table class="gwt-table table-striped table-vcenter" width="100%">
                                                <thead style="background-color: #FFEBCD;">
                                                    <tr height="40">
                                                        <th class="text-font" style="border-color:#000000; text-align: center;">ครั้งที่</th>
                                                        <th class="text-font" style="border-color:#000000; text-align: center;">วันที่ทบทวน</th>
                                                        <th class="text-font" style="border-color:#000000; text-align: center;">ไฟล์เอกสาร</th>
                                                        <th class="text-font" style="border-color:#000000; text-align: center;">หัวข้อการทบทวน</th>
                                                        <th class="text-font" style="border-color:#000000; text-align: center;">รายละเอียด</th>
                                                        <th class="text-font" style="border-color:#000000; text-align: center;">วันที่บันทึก</th>
                                                        <th class="text-font" style="border-color:#000000; text-align: center;">ผู้บันทึก</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $number = 0; ?>
                                                    @foreach ($inforechecks as $inforecheck)
                                                    <?php $number++;  ?>
                                                    <tr height="20">
                                                        <td class="text-font" align="center">{{$number}}</td>
                                                        <td class="text-font text-pedding">{{DateThai($inforecheck->RISK_RECHECK_DATE)}}</td>
                                                        @if($inforecheck->RISK_RECHECK_FILE == 'True')
                                                        <td class="text-font text-pedding" align="center"><span class="btn"
                                                                style="background-color:#5a5655;color:#F0FFFF;"><i
                                                                    class="fa fa-1.5x fa-file-pdf"></i></span></td>
                                                        @else
                                                        <td align="center"></td>
                                                        @endif
                                                        <td class="text-font text-pedding">{{$inforecheck->RISK_RECHECK_HEAD}}</td>
                                                        <td class="text-font text-pedding">{{$inforecheck->RISK_RECHECK_DETAIL}}</td>
                                                        <td class="text-font text-pedding">{{DateThai($inforecheck->RISK_RECHECK_DATE_SAVE)}}</td>
                                                        <td class="text-font text-pedding">{{$inforecheck->HR_FNAME}} {{$inforecheck->HR_LNAME}}
                                                        </td>
                                                      
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                        <div class="modal-footer">
                            <div align="right">
                                <button type="submit" class="btn btn-hero-sm btn-hero-info"><i class="fas fa-save mr-2"></i>บันทึกข้อมูล</button>
                                <a href="{{ url('general_risk/risk_notify/' . $inforpersonuserid->ID) }}"
                                    onclick="return confirm('ต้องการที่จะยกเลิกข้อมูล ?')"
                                    class="btn btn-hero-sm btn-hero-danger"
                                    onclick="return confirm('ต้องการที่จะยกเลิกการเพิ่มข้อมูล ?')"><i class="fas fa-window-close mr-2"></i>ยกเลิก</a>
                            </div>

                        </div>




                        <div class="modal fade addlevel" id="addlevel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true" id="modallevel">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-info shadow-lg">
                                        <h1 class="modal-title text-white">
                                            รายละเอียดความรุนแรง</h1>
                                    </div>
                                    <div class="modal-body">

                                        <body>

                                            <div style='overflow:scroll; height:300px;'>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td style="text-align: center;" width="10%">รหัส</td>
                                                            <td style="text-align: center;" width="10%">ความรุนแรง</th>
                                                            <td style="text-align: center;">รายละเอียด</td>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                        @foreach ($levels as $level)
                                                            <tr>
                                                                <td style="text-align: center;font-size:13px;">
                                                                    {{ $level->RISK_REP_LEVEL_CODE }}</td>
                                                                <td style="text-align: center;font-size:13px;">
                                                                    {{ $level->RISK_REP_LEVEL_NAME }}</td>
                                                                <td style="text-align:left;font-size:13px;">
                                                                    {{ $level->RISK_REP_LEVEL_DETAIL }}</td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>

                                </body>
                            </div>
                        </div>
                </div>


            @endsection

            @section('footer')

            <script src="{{ asset('asset/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}">
            </script>
            <script>
                jQuery(function() {
                    Dashmix.helpers(['masked-inputs']);
                });

            </script>

            <script src="{{ asset('datepicker/dist/js/bootstrap-datepicker-custom.js') }}"></script>
            <script src="{{ asset('datepicker/dist/locales/bootstrap-datepicker.th.min.js') }}"
                charset="UTF-8"></script>

                <script src="{{ asset('pdfupload/pdf_up.js') }}"></script>

                <script src="{{ asset('select2/select2.min.js') }}"></script>
                <script>
                    $(document).ready(function() {
                        $('select').select2({
                            width: '100%' 
                        });
                    });
                </script>

             
                <script>
                    function addURL(input) {
                        var fileInput = document.getElementById('RISK_REP_IMG');
                        var url = input.value;
                        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                        var numb = input.files[0].size / 2048;

                        if (numb > 64) {
                            alert('กรุณาอัพโหลดไฟล์ขนาดไม่เกิน 64KB');
                            fileInput.value = '';
                            return false;
                        }

                        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext ==
                            "jpg")) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#add_preview').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        } else {
                            alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                            fileInput.value = '';
                            return false;
                        }
                    }

                </script>
                <script>
                    function selectlevel(INCIDENCE_LEVEL_ID) {

                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: "{{ route('car.selectbookname') }}",
                            method: "GET",
                            data: {
                                INCIDENCE_LEVEL_ID: INCIDENCE_LEVEL_ID,
                                _token: _token
                            },
                            success: function(result) {
                                $('.detali_levelname').html(result);
                            }
                        })

                        $.ajax({
                            url: "{{ route('car.selectbooknum') }}",
                            method: "GET",
                            data: {
                                INCIDENCE_LEVEL_ID: INCIDENCE_LEVEL_ID,
                                _token: _token
                            },
                            success: function(result) {
                                $('.detali_booknum').html(result);
                            }
                        })


                        $('#modallevel').modal('hide');

                    }

                    function detail(id) {

                        $.ajax({
                            url: "{{ route('suplies.detailapp') }}",
                            method: "GET",
                            data: {
                                id: id
                            },
                            success: function(result) {
                                $('#detail').html(result);


                                //alert("Hello! I am an alert box!!");
                            }

                        })

                    }


                    $(document).ready(function() {

                        $('.datepicker').datepicker({
                            format: 'dd/mm/yyyy',
                            todayBtn: true,
                            language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                            thaiyear: true,
                            autoclose: true //Set เป็นปี พ.ศ.
                        }); //กำหนดเป็นวันปัจุบัน
                    });
                    $('.program').change(function() {
                                if ($(this).val() != '') {
                                    var select = $(this).val();
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url: "{{ route('mrisk.fectprogram') }}",
                                        method: "GET",
                                        data: {
                                            select: select,
                                            _token: _token
                                        },
                                        success: function(result) {
                                            $('.programsub').html(result);
                                        }
                                    })
                                }
                            });

                            $('.programsub').change(function() {
                                if ($(this).val() != '') {
                                    var select = $(this).val();
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url: "{{ route('mrisk.fectprogramsub') }}",
                                        method: "GET",
                                        data: {
                                            select: select,
                                            _token: _token
                                        },
                                        success: function(result) {
                                            $('.programsubsub').html(result);
                                        }
                                    })
                                }
                            });
                            $('.fectteam').change(function() {
                                if ($(this).val() != '') {
                                    var select = $(this).val();
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url: "{{ route('mrisk.fectteam') }}",
                                        method: "GET",
                                        data: {
                                            select: select,
                                            _token: _token
                                        },
                                        success: function(result) {
                                            $('.teamdetial').html(result);
                                        }
                                    })
                                }
                            });
                            $('.typelocation').change(function() {
                                if ($(this).val() != '') {
                                    var select = $(this).val();
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url: "{{ route('mrisk.fecttypelocation') }}",
                                        method: "GET",
                                        data: {
                                            select: select,
                                            _token: _token
                                        },
                                        success: function(result) {
                                            $('.typelocationdetail').html(result);
                                        }
                                    })
                                }
                            });
                            $('.items').change(function() {
                                if ($(this).val() != '') {
                                    var select = $(this).val();
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url: "{{ route('mrisk.fectitems') }}",
                                        method: "GET",
                                        data: {
                                            select: select,
                                            _token: _token
                                        },
                                        success: function(result) {
                                            $('.itemsub').html(result);
                                        }
                                    })
                                }
                            });
                            $('.depsub').change(function(){
                                    if($(this).val()!=''){
                                    var select=$(this).val();
                                    var _token=$('input[name="_token"]').val();
                                    $.ajax({
                                            url:"{{ route('mrisk.fectriskdepsub') }}",
                                            method:"GET",
                                            data:{select:select,_token:_token},
                                            success:function(result){
                                                $('.team').html(result);
                                            }
                                    })

                                    }        
                                }); 

                </script>
                <script type="text/javascript">

                     $('.addRow1').on('click', function() {
                                addRow1(); var count = $('.tbody1').children('tr').length;
                                var number =  (count).valueOf();
                                datepicker(number);
                                $('select').select2({ width: '100%' });
                            });

                            function addRow1() {
                                var count = $('.tbody1').children('tr').length;
                                var number =  (count + 1).valueOf();

                                var today = new Date();
                                var date = String(today.getFullYear()).substring(2)+''+String(today.getMonth()+1).padStart(2, '0')+''+String(today.getDate()).padStart(2, '0');
                                var time = String(today.getHours()).padStart(2, '0') + "" + String(today.getMinutes()).padStart(2, '0') + "" + String(today.getSeconds()).padStart(2, '0');;
                                var dateTime = 'L'+date+'-'+time;
                                var tr = '<tr>' +
                                    '<td style="text-align: center;">'+
                                    +number+
                                    '</td>'+
                                    '<td>' +
                                    '<input name="RISK_REPEFFECT_FULLNAME[]" id="RISK_REPEFFECT_FULLNAME[]" class="form-control input-sm fo13" >' +
                                    '</td>' +
                                    '<td>' +
                                    '<input name="RISK_REPEFFECT_AGE[]" id="RISK_REPEFFECT_AGE[]" class="form-control input-sm fo13">' +
                                    '</td>' +
                                    '<td>' +
                                    '<input name="RISK_REPEFFECT_SEX[]" id="RISK_REPEFFECT_SEX[]" class="form-control input-sm fo13" >' +
                                    '</td>' +
                                    '<td>' +
                                    '<input name="RISK_REPEFFECT_HN[]" id="RISK_REPEFFECT_HN[]" class="form-control input-sm fo13" >' +
                                    '</td>' +
                                    '<td>' +
                                    '<input name="RISK_REPEFFECT_DATEIN[]" id="RISK_REPEFFECT_DATEIN[]" class="form-control input-sm datepicker'+number+'" style=" font-family: \'Kanit\', sans-serif;font-size:13px;" readonly>'+
                                    '</td>' +
                                    '<td>' +
                                    '<input name="RISK_REPEFFECT_AN[]" id="RISK_REPEFFECT_AN[]" class="form-control input-sm fo13" >' +
                                    '</td>' +
                                    '<td>' +
                                        '<input name="RISK_REPEFFECT_DATEADMIN[]" id="RISK_REPEFFECT_DATEADMIN[]" class="form-control input-sm datepicker'+number+'" style=" font-family: \'Kanit\', sans-serif;font-size:13px;" readonly>'+
                                    '</td>' +
                                    '<td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>' +
                                    '</tr>';
                                $('.tbody1').append(tr);
                            };

                            $('.tbody1').on('click', '.remove', function() {
                                $(this).parent().parent().remove();
                            });

                            $('.addRow4').on('click', function() {
                                addRow4();
                                $('select').select2({ width: '100%' });
                            });

                            function addRow4() {
                                var count = $('.tbody4').children('tr').length;
                                var tr = '<tr>' +                                   
                                    '<td>' +
                                    '<select name="RISK_REP_TEAMLIST_NAME[]" id="RISK_REP_TEAMLIST_NAME" class="form-control input-sm foo13">' +
                                    '<option value="">--กรุณาเลือก--</option>'+
                                    '@foreach ($teams as $team)'+
                                    '<option value="{{ $team->HR_TEAM_ID }}"> {{ $team->HR_TEAM_NAME }} :: {{ $team->HR_TEAM_DETAIL }}</option>'+
                                    '@endforeach'+
                                    '</select>'+
                                    '</td>' +
                                    '<td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>' +
                                    '</tr>';
                                $('.tbody4').append(tr);
                            };

                            $('.tbody4').on('click', '.remove', function() {
                                $(this).parent().parent().remove();
                            });

                            $('.addRow5').on('click', function() {
                                addRow5();
                                $('select').select2({ width: '100%' });
                            });

                            function addRow5() {
                                var count = $('.tbody5').children('tr').length;
                                var tr = '<tr>' +
                                    '<td>' +
                                    '<select name="RISK_REP_DEPARTMENT_ID[]" id="RISK_REP_DEPARTMENT_ID" class="form-control input-sm fo13">' +
                                    '<option value="">--กรุณาเลือกกลุ่มงาน--</option>' +
                                    '@foreach ($departments as $department) '+
                                    '<option value="{{ $department->HR_DEPARTMENT_ID }}">{{ $department->HR_DEPARTMENT_NAME }}</option> '+
                                    '@endforeach ' +
                                '</select> ' +
                                '</td>' +
                                '<td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>' +
                                '</tr>';
                                $('.tbody5').append(tr);
                            };
                            $('.tbody5').on('click', '.remove', function() {
                                $(this).parent().parent().remove();
                            });

                            $('.addRow6').on('click', function() {
                                addRow6();
                                $('select').select2({ width: '100%' });
                            });

                            function addRow6() {
                                var count = $('.tbody6').children('tr').length;
                                var tr = '<tr>' +
                                    '<td>' +
                                    '<select name="RISK_REP_DEPARTMENT_SUBID[]" id="RISK_REP_DEPARTMENT_SUBID" class="form-control input-sm fo13">' +
                                    '<option value="">--กรุณาเลือกฝ่าย/แผนก--</option>' +
                                    '@foreach ($infordepartmentsubs as $infordepartmentsub)'+
                                    '<option value="{{ $infordepartmentsub->HR_DEPARTMENT_SUB_ID }}">{{ $infordepartmentsub->HR_DEPARTMENT_SUB_NAME }}</option>'+
                                    '@endforeach ' +
                                    '</select>' +
                                    '</td>' +
                                    '<td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>' +
                                    '</tr>';
                                    $('.tbody6').append(tr);
                                };
                            $('.tbody6').on('click', '.remove', function() {
                                $(this).parent().parent().remove();
                            });

                            $('.addRow7').on('click', function() {
                                addRow7();
                                $('select').select2({ width: '100%' });
                            });

                            function addRow7() {
                                var count = $('.tbody7').children('tr').length;
                                var tr = '<tr>' +
                                    '<td>' +
                                    '<select name="RISK_REP_DEPARTMENT_SUBSUBID[]" id="RISK_REP_DEPARTMENT_SUBSUBID" class="form-control input-sm fo13">' +
                                    '<option value="">--กรุณาเลือกหน่วยงาน--</option>' +
                                    '@foreach ($infordepartmentsubsubs as $infordepartmentsubsub)'+
                                    '<option value="{{ $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_ID }}">{{ $infordepartmentsubsub->HR_DEPARTMENT_SUB_SUB_NAME }}</option>'+
                                    '@endforeach ' +
                                '</select> ' +
                                '</td>' +
                                '<td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>' +
                                '</tr>';
                                $('.tbody7').append(tr);
                            };
                            $('.tbody7').on('click', '.remove', function() {
                                $(this).parent().parent().remove();
                            });

                            $('.addRow8').on('click', function() {
                                addRow8();
                                $('select').select2({ width: '100%' });
                            });

                            function addRow8() {
                                var count = $('.tbody8').children('tr').length;
                                var tr = '<tr>' +
                                    '<td>' +
                                    '<select name="RISK_REP_PERSON_NAME[]" id="OFFER_WORK_HR_ID'+count+'" class="form-control input-lg js-example-basic-single" style=" font-family: \'Kanit\', sans-serif;" onchange="check_offer_work_hr_id();checkall();">'+
                                    '<option value="">--กรุณาเลือก--</option>'+
                                    '@foreach ($infopers as $infoperson)'+                                                    
                                    '<option value="{{ $infoperson ->ID  }}">{{ $infoperson->HR_FNAME}} {{$infoperson->HR_LNAME}}</option>'+ 
                                    '@endforeach'+
                                    '</select>'+
                                    '</td>' +
                                    '<td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>' +
                                    '</tr>';
                                $('.tbody8').append(tr);
                            };

                            $('.tbody8').on('click', '.remove', function() {
                                $(this).parent().parent().remove();
                            });

                            $('.addRow9').on('click', function() {
                                addRow9();
                                $('select').select2({ width: '100%' });
                            });

                            function addRow9() {
                                var count = $('.tbody9').children('tr').length;
                                var tr = '<tr>' +
                                    '<td>' +
                                    '<textarea name="RISKREP_REPEAT" id="RISKREP_REPEAT" class="form-control input-lg time fo13 mt-0" rows="3"></textarea>' +
                                    '</td>' +
                                    '<td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>' +
                                    '</tr>';
                                $('.tbody9').append(tr);
                            };

                            $('.tbody9').on('click', '.remove', function() {
                                $(this).parent().parent().remove();
                            });


                </script>
              
            @endsection
