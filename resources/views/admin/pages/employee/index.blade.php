@extends('admin.layout.app')

@section('content')


     <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dasharath</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Community Member</a></li> --}}

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->   

                     
                        <div class="row">
    
                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('employee.create') }}" class="btn btn-primary" style="color: white;">नयाँ आवेदक थप्नुहोस्</a>
                                            </div>
                                            <h5 class="header-title mb-0">Employee List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                       <thead>
                                      <tr>
                                           <th>S.N.</th>
                                           <th>नेपाली</th>
                                           <th>अंग्रेजी भाषा</th>
                                           <th>Designation </th>
                                           <th>Phone Number </th>
                                           <th>Status </th>
                                           <th> Photo </th>
                                           <th>कार्य</th>
                                       </tr>
                                       </thead>
                                            <tbody>
                                                @foreach ($employees as $key => $item)
                                                @php
                                                        $pageRelativeIndex = ($employees->currentPage() - 1) * $employees->perPage() + ($key + 1);
                                                @endphp
                                                <tr>
                                                    <td>{{ $pageRelativeIndex }}</td>
                                                    <td>{{ $item->name_nepali }}</td>
                                                    <td>{{ $item->name_english }}</td>
                                                    <td>{{ $item->designation }}</td>
                                                    <td>{{ $item->phone_number }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td> <img src="{{ $item->getProfileImage() }}" alt="Profile Image" height="60"/>
                                                    <td><a href="{{ url('dashboard/edit/disability-type/'.$item->id) }}" title="edit"><span class="label label-danger"><i class="bi-pencil"></i></span></a></td>
                                                </tr>
                                                @endforeach


                                                
                                                
                                            </tbody>
                                            
                                        </table>
                                                   <div style="padding: 10px; float:right;">
                                                {{  $employees->appends(request()->query())->links('admin.layout.pagination') }}
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
