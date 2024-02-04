@extends('admin.layout.app')

@section('content')
 <style type="text/css" media="print">
   @media print{
        @page {
            size: 85.60mm 53.98mm landscape;
            margin: 0; /* No margin for the page */
            color: black;
        }
        body {
            margin: 0; /* No margin for the body */
            background: white;
        }
        span{
            line-height: 10.5px
        }
        .print-section {
            margin: 0px;
            background: #ffffff;
            size:A4;
        }
        .nepali-card row col-lg-12, .nepali-card row col-lg-7{
            display: flex;
            flex-direction: column;
        }
        .a4-size {
            size: A4 landscape;
            width: 100vw; /* A4 width in millimeters */
            height: 100vh; /* A4 height in millimeters */
            margin: 0 auto; /* Center the content on the page */
            background-color: white; /* Optional: set a background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: add a box shadow */
        }
        .row{
         display: flex;
         flex-wrap: wrap;
        }
         .id-card {
        width: 100vw;
        height: 100vh;
        margin: auto;
        box-sizing: border-box;
        }
        .col-lg-3 {
            width: 25%;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
        }

        .col-lg-12{
            width:100%;
        }

        .col-lg-6{
             width: 50%;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
        }
        .fs-10{
            font-size: 20px;
             color: black;
        }
        .fs-8{
            font-size: 18px;
             color: black;
        }

        .fs-12{
            font-size: 22px;
        }

        .b-600{
            font-weight: 600;
        }

        .align-item-center{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-container {
            height: 20vh;
            width: 20vw;
        }

        .img-container img{
            width: 100%;
            height: 100%;
        }

        .identity{
            text-align: center;
            color:white;
        }
        .main-footer{
            display: none; /* Hide the row by default */
        }
        .page {
        width: 21cm; /* A4 width */
        height: 14.85cm; /* A4 height */
        page-break-after: always; /* Force a new page after each page */
        }
    }
  </style>   
  <style>
     @page {
            size: CR80; /* Default page size */
            orientation: landscape;
            margin: 0; /* No margin for the page */
        }
   .id-card {
    width: 100vw;
    height: 100vh;
    margin: auto;
    box-sizing: border-box;
}
 .fs-10{
            font-size: 20px;
        }
        .fs-8{
            font-size: 18px;
        }

        .fs-12{
            font-size: 22px;
        }


.b-600{
    font-weight: 600;
}

.align-item-center{
    display: flex;
    justify-content: center;
    align-items: center;
}

.img-container {
    height: 18vh;
    width: 15vw;
}

.img-container img{
    width: 100%;
    height: 100%;
}

.identity{
    text-align: center;
}



  </style>   


 <div class="content-wrapper print-section" style="background: #fff;">
    <!-- Content Header (Page header) -->
   

    {{--        <!-- Main content -->--}}
           <div class="content">

             <div class="nepali-card a4-size id-card page" style="height: 100vh; padding:2px;">
                                  <div class="row">
                                        <div class="col-lg-3 align-item-center">
                                             <img src="{{ asset('assets/images/logo.png') }}" alt="" height="50" />
                                        </div>
                                        <div class="col-lg-6 fs-10" style="position: relative; display:flex; justify-content:center;">
                                              <div class="col-lg-5" style="position: absolute; z-index:1; top:0; left:60%; transform:translate(-50%);">
                                                <img src="{{isset($employee) ? $employee->getStampImage() : "" }}"  alt="stamp" height="50" />
                                            </div>
                                            <div class="text-center b-600"  style="color: red;  z-index:100; position: absolute; ">
                                                <span>प्रदेश सरकार</span>
                                                <br>सुदूरपश्चिम प्रदेश
                                                <br>दशरथचन्द नगरपालिका, <br/>बैतडी
                                            </div>
                                        </div>
                                        <div class="col-lg-3" style="height:20vh; margin-top:5px;">
                                            <div class="img-container">
                                                <img src="{{ $applicant->getProfileImage() }}" alt="" height="100" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 0px 69px; margin-top:15px;">
                                            <div class="identity col-lg-12 fs-12 b-600" style="color: #fff; height:8vh; align-item: center; background :  @if($applicant->disability_type_id) {{ $applicant->disability->color }}  @else none; @endif">
                                               अपाङ्गता परिचय पत्र
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12 fs-10" style="margin-top:3px;">
                                            <span>परिचयपत्र नं :- <span style="font-weight: 700; text-transform: uppercase;">{{ str_pad($applicant->id, 3, '0', STR_PAD_LEFT) }}</span></span>
                                            <br>
                                            <span>नाम,थर :- <span style="font-weight: 700">{{ $applicant->full_name_nep }} </span></span>
                                            <br>
                                            <span>ठेगानाः- सुदूरपश्चिम प्रदेश बैतडी जिल्ला दशरथचन्द नगरपालिका वडा नं <span style="font-weight: 700">{{ $applicant->ward_no }}</span></span>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>जन्म मिति : <span style="font-weight: 700">{{ $applicant->dob_nep }}</span></span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>नागरिकता नं : <span style="font-weight: 700">{{ $applicant->citizenship_number }}</span></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                   <span>लिङ्ग : <span style="font-weight: 700">
                                                      {{ 
                                                        $applicant->sex === "male" ? "पुरुष" : 
                                                        ($applicant->sex === "female" ? "महिला" : "अन्य")
                                                    }}
                                                    </span></span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>रक्त समूह : <span style="font-weight: 700">{{ $applicant->blood_group }}</span></span><br>
                                                </div>
                                            </div>
                                            <span> प्रकृतिको आधारमा <span style="font-weight: 700; font-size:16px; marginRight:5px;">{{ $applicant->disability->name_nepali }}</span> गम्भीरता:- <span>{{ $applicant->disabilitySeverity->name_nepali }}</span></span><br>
                                            <span>बाबु/आमा वा संरक्षकको नाम :- <span style="font-weight: 700">{{ $applicant->guardian }}</span></span><br>
                                     
                                        </div>
                                        <div class="col-lg-3 mt-2"></div>
                                    </div>
                             </div>
                                        <div class="nepali-card a4-size id-card page" style="height: 100vh; padding:2px;">
                                  <div class="row">
                                     <div class="col-lg-3 align-item-center">
                                             <img src="{{ asset('assets/images/logo.png') }}" alt="" height="50" />
                                        </div>
                                        <div class="col-lg-6 fs-10" style="position: relative; display:flex; justify-content:center;">
                                              <div class="col-lg-5" style="position: absolute; z-index:1; top:0; left:60%; transform:translate(-50%);">
                                                <img src="{{isset($employee) ? $employee->getStampImage() : "" }}"  alt="stamp" height="50" />
                                            </div>
                                            <div class="text-center b-600"  style="color: red;  z-index:100; position: absolute; ">
                                                  <span>Province Government </span>
                                                <br>Sudurpaschim Pardesh
                                                <br>Dasharathchand Municipality, <br /> Baitadi
                                            </div>
                                        </div>
                                        <div class="col-lg-3" style="height:20vh; margin-top:5px;">
                                            <div class="img-container">
                                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->generate('Name : '.$applicant->full_name. 'Severity of Disability'  . $applicant->disabilitySeverity->name_english. 'Nature of Disability' . $applicant->disability->name_english )!!}

                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 0px 69px; margin-top:10px;">
                                            <div class="identity col-lg-12 fs-12 b-600" style="color: #fff; height:8vh; align-item: center; background :  @if($applicant->disability_type_id) {{ $applicant->disability->color }}  @else none; @endif">
                                                                                              DISABILITY IDENTITY CARD

                                            </div>
                                        </div>
                                
                                
                                        <div class="col-lg-12 fs-10">
                                            <span>Card Number:- <span style="font-weight: 700; text-transform: uppercase;">{{ str_pad($applicant->id, 3, '0', STR_PAD_LEFT) }}</span></span>
                                            <br>
                                            <span>Full Name :- <span style="font-weight: 700">{{ $applicant->full_name }}</span></span> <br />
                                              <div class="row">
                                                <div class="col-lg-6">
                                                    <span>Date of birth : <span style="font-weight: 700">{{ $applicant->dob_eng }}</span></span> <br />
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>Contact Number : <span style="font-weight: 700">{{ $applicant->phone_number }}</span></span>
                                                </div>
                                            </div>
                              
                                            <span>Severity of disability :  <span style="font-weight: 700; font-size:12px;">{{ $applicant->disability->name_english }}</span> 
                                          <br>
                                
                                        </div>
                                        <div class="col-lg-7 fs-10" style="display: flex; flex-direction:column;  margin-top:5px;">
                                            <span style="text-decoration: underline;"> परिचयपत्र प्रमाणित गर्ने : </span>
                                            @if(isset($employee))
                                            <span> हस्ताक्षर :- <img src="{{   $employee->getRedSignatureImage() }}"  alt="red-signature" height="20px"  /></span>
                                            <span> नाम,थर : - {{ $employee->name_nepali }}</span>
                                            <span> पद :- {{ $employee->designation }}</span>
                                            <span>जारी मिति : - {{ $applicant->approved_date }} <span>
                                          
                                        </div>
                                       
                                          @endif
                                    </div>
                             </div>
               
           </div>
 </div>
 






                         




@endsection
 

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

   <script>
        // Wait for the DOM to be ready
        document.addEventListener("DOMContentLoaded", function () {
            // Find the "Print" button by its ID
            window.onload = function () {
                window.print();
            };
        });
    </script>

@endpush