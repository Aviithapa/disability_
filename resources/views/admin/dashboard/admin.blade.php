@extends('admin.layout.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h2> Data Count </h2>
    </div>

    <div class="content">
        <div class="row">
            @foreach($countsByCategory as $count)
                <div class="col-lg-3 col-xs-6 m-b-3" style="margin-top: 5px;">
                    <div className="card widget-flat " style = "background : {{ isset($count->color) ? $count->color : 'white' }}; color : {{ isset($count->color) ? 'white' : 'black' }}; padding:10px ">
                    <div className="card-body">
                    <div className="float-end">
                        <i className="ri-wallet-2-line widget-icon"></i>
                    </div>
                    <h6 className="text-uppercase mt-0" title="Customers">
                        {{ $count->name_nepali }}
                    </h6>
                     <h6 className="text-uppercase mt-0" title="Customers">
                        {{ $count->name_english }}
                    </h6>
                    <h2 className="my-2">{{ $count->applicant_details_count }}</h2>
                  
                    </div>
                </div>
                
                </div>
            @endforeach

            @foreach($natureOfDisability as $count)
                <div class="col-lg-3 col-xs-6 m-b-3" style="margin-top: 5px;">
                    <div className="card widget-flat " style = "background : {{ isset($count->color) ? $count->color : 'white' }}; color : {{ isset($count->color) ? 'white' : 'black' }}; padding:10px ">
                    <div className="card-body">
                    <div className="float-end">
                        <i className="ri-wallet-2-line widget-icon"></i>
                    </div>
                    <h6 className="text-uppercase mt-0" title="Customers">
                        {{ $count->name_nepali }}
                    </h6>
                     <h6 className="text-uppercase mt-0" title="Customers">
                        {{ $count->name_english }}
                    </h6>
                    <h2 className="my-2">{{ $count->applicant_details_based_on_nature_of_disability_count }}</h2>
                  
                    </div>
                </div>
                
                </div>
            @endforeach
            
        </div>
        <div class="row">
        </div>

    </div>


</div>
<!-- /.content -->
</div>

@endsection

@push('scripts')

@endpush