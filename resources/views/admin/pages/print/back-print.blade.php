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
                                             <img src="{{ asset('assets/images/district.jpeg') }}" alt="" height="30" />
                                        </div>
                                        <div class="col-lg-6 fs-10" style="position: relative; display:flex; justify-content:center;">
                                              <div class="col-lg-5" style="position: absolute; z-index:1; top:0; left:40%; transform:translate(-50%);">
                                                <img src="{{isset($employee) ? $employee->getStampImage() : "" }}"  alt="stamp" height="50" />
                                            </div>
                                            <div class="text-center b-600"  style="color: red;  z-index:100; position: absolute; font-size: 10px !important; margin-top:-5px; ">
                                                <br>Dasharathchand Municipality, <br />  Office of Executive Municipal <br /> Gadi, Baitadi
                                            </div>
                                        </div>
                                        <div class="col-lg-3" style="height:20vh; margin-top:5px;">
                                            <div class="img-container">
                                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(40)->generate('Name : '.$applicant->full_name. 'Severity of Disability'  . $applicant->disabilitySeverity->name_english. 'Nature of Disability' . $applicant->disability->name_english )!!}

                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 0px 60px; margin-top:12px;">
                                            <div class="identity col-lg-12  b-600" style="color: #fff; font-size:8px; height:6vh; align-item: center; background :  @if($applicant->disability_type_id) {{ $applicant->disability->color }}  @else none; @endif">
                                                                                              DISABILITY IDENTITY CARD

                                            </div>
                                        </div>


                                        <div class="col-lg-12 fs-10">
                                                <div class="row">
                                                    <div class="col-lg-6" style="width: 50%; font-size: 8px;">
                                            <span>ID Card No:- <span style="font-weight: 700; text-transform: uppercase;">{{ str_pad($applicant->srn, 3, '0', STR_PAD_LEFT) }}</span></span><br />

                                                    </div>
                                                    <div class="col-lg-6" style="width: 50%; font-size: 8px;">
                                            <span>ID Card Type:- <span style="font-weight: 700; text-transform: uppercase;">{{ $applicant->disability->name_english }}</span></span>

                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6" style="width: 50%; font-size: 8px;">
                                            <span>Full Name :- <span style="font-weight: 700">{{ $applicant->full_name }}</span></span> <br />


                                                </div>
                                                <div class="col-lg-6" style="width: 50%; font-size: 8px;">
                                                    <span>Date of birth : <span style="font-weight: 700">{{ $applicant->dob_eng }}</span></span> <br />


                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6" style="width: 100%; font-size: 8px;">
                                            <span>Address :- Sudurpashchim Province Baitadi District Dasharathchand MP ward no <span style="font-weight: 700">{{ $applicant->ward_no }}</span></span>

                                            </div>

                                    </div>

                                    <div class="row">
                                    <div class="col-lg-6" style="width: 50%; font-size: 8px;">
                                        <span>Sex : <span style="font-weight: 700">{{ $applicant->sex  }}</span></span> <br />
                                    </div>
                                    <div class="col-lg-6" style="width: 50%; font-size: 8px;">

                                            <span>Citizenship No. : <span style="font-weight: 700">{{ $applicant->citizenship_number }}</span></span>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6" style="width: 50%; font-size: 8px;">
                                    <span> Type of disability : -<span>{{ $applicant->disabilitySeverity->name_english }} </span>
                                        </div>
                                        <div class="col-lg-6" style="width: 50%; font-size: 8px;">
                                            Severity :- <span>{{ $applicant->disability->severity_name_english }}</span></span><br>
                                    </div>
                                    </div>

                                        </div>
                                        <div class="row fs-10">
                                            <div class="col-lg-12">
                                                <span style="text-decoration: underline; font-size: 8px; font-weight:700;"> ID CARD CERTIFYING OFFICIAL  : </span>
                                            </div>
                                            <div class="col-lg-6">

                                                 <img src="{{   $employee->getRedSignatureImage() }}"  alt="red-signature" height="20px" style="margin-left: 10%;" /> <br />
                                                 <span style="font-size: 8px;">{{ $employee->name_english }}</span> <br />
                                                 <span style="font-size: 8px;">{{ $employee->designation }}</span> <br />
                                                 <span style="font-size: 8px;">{{ $applicant->approved_date  }}</span>
                                            </div>
                                            <div class="col-lg-6">


                                            </div>
                                            {{-- <div class="col-lg-3">
                                                <span> Signature </span> <br />
                                                <img src="{{   $employee->getRedSignatureImage() }}"  alt="red-signature" height="20px"  />
                                            </div>
                                            <div class="col-lg-3">
                                                <span> Designation </span> <br />
                                                 <span style="font-size: 8px;">{{ $employee->designation }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span> Date </span> <br />
                                                 <span style="font-size: 8px;">{{ $applicant->approved_date  }}</span>
                                            </div> --}}
                                        </div>



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
            // Print the page
            window.print();


        };
    });
</script>

@endpush
