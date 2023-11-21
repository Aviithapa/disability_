@extends('admin.layout.app')

@section('content')


     <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pandey Connect</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Community Member</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                         <div class="card">

                            <form  action="{{route('applicant.index')}}"  method="POST" novalidate>
                            @csrf

                                        <div class="row" style="padding: 20px 10px 0px 10px;"> 
                                            
                                            <div class="col-lg-4 col-md-4 col-sm-6"> 
                                                <div class="mb-3">      
                                                     <input type="text" name="full_name" class ="form-control" placeholder="Enter Full Name" id="name" value={{ isset($request) ? $request->full_name : '' }}>                             
                                                   
                                                </div>
                                            </div> 
                                            <div class="col-lg-2 col-md-2 col-sm-6"> 
                                                <div class="mb-3">
                                                     <select class="form-select" name="status">
                                                        <option value={{ isset($request->status) ? $request->status : ''}}>{{ isset($request->status) ? $request->status : 'स्थिति चयन गर्नुहोस्'}}</option>
                                                        <option value="">All</option>
                                                        <option value="New">New Applied</option>
                                                        <option value="Approved">Approved</option>
                                                        <option value="Rejected">Rejected</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-6"> 
                                                <div class="mb-3">
                                                    <select class="form-control" name="disability_type">
                                                        <option value={{ isset($request->disability_type) ? $request->disability_type : ''}}>{{ isset($request->disability_type) ? getDisabilityName($request->disability_type) : 'असक्षमता प्रकार चयन गर्नुहोस्'}}</option>
                                                        @foreach($disability_types as $disability)
                                                            <option value="{{ $disability->id }}">{{ $disability->name_nepali }}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div> 
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                      <select class="form-select " name="serverity_disability_type" id='serverity_disability_type'>
                                                            <option value={{ isset($request->serverity_disability_type) ? $request->serverity_disability_type : ''}}>{{ isset($request->serverity_disability_type) ? getDisabilityName($request->serverity_disability_type) : 'असक्षमता प्रकार चयन गर्नुहोस्'}}</option>
                                                            @foreach($severity_types as $disability)
                                                                <option value="{{ $disability->id }}">{{ $disability->name_nepali }}</option>
                                                            @endforeach
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-6"> 
                                                <button class="btn btn-primary" type="submit">Search</button>
                                             </div>
                                        </div>
                                    </form>
                                    
                                </div>     

                     
                        <div class="row">
    
                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('applicant.create') }}" class="btn btn-primary" style="color: white;">नयाँ आवेदक थप्नुहोस्</a>
                                            </div>
                                            <h5 class="header-title mb-0">Community Member List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                       <thead>
                                       <tr>
                                           <th>S.N.</th>
                                           <th>पूरा नाम</th>
                                           <th>असक्षमता प्रकार</th>
                                           <th>असक्षमता कारण</th>
                                           <th>स्थिति</th>
                                           <th>जन्म मिति</th>
                                           <th>कार्य</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($applicant as $key => $item)
                                          @php
                                                $pageRelativeIndex = ($applicant->currentPage() - 1) * $applicant->perPage() + ($key + 1);
                                          @endphp
                                          <tr>
                                          <td>{{ $pageRelativeIndex }}</td>
                                          <td>{{ $item->full_name }}</></td>
                                          <td>{{ isset($item->disability_type_id) ? $item->disability->name_nepali  :'' }}</td>
                                          <td>{{ $item->disability_cause }}</td>
                                          <td style="text-transfor: capitilized;">{{ $item->status }}</td>
                                          <td>{{ $item->dob_nep }}</td>
                                          <td>
                                            <a href="{{ url('applicant/'.$item->id) }}" title="view"><span class="label label-success"><i class="bi-eye"></i></span></a>
                                             @if(Auth::user()->role === 'admin' || $item->status === 'rejected')
                                            <a href="{{ url('applicant/'.$item->id .'/edit') }}" title="edit"><span class="label label-danger"><i class="bi-pencil"></i></span></a>
                                            @endif
                                            @if(Auth::user()->role === 'admin' && $item->status === 'approved' )
                                            <a href="{{ url('print/'.$item->id) }}" title="Print"><span class="label label-warning"><i class="bi-printer"></i></span></a>
                                            @endif
                                        </td>
                                          </tr>
                                          @endforeach

                                           
                                           
                                       </tbody>
                                     
                                   </table>
                                                   <div style="padding: 10px; float:right;">
                                                {{  $applicant->appends(request()->query())->links('admin.layout.pagination') }}
                                                </div>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>


@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endpush