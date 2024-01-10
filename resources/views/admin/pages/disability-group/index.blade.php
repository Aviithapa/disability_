@extends('admin.layout.app')

@section('content')


     <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Disability Management System</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Disability Type List</a></li>

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
                                                <a href="{{ route('disability-group.create') }}" class="btn btn-primary" style="color: white;">नयाँ आवेदक थप्नुहोस्</a>
                                            </div>
                                            <h5 class="header-title mb-0">नयाँ असक्षमता प्रकार थप्नुहोस्</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                       <thead>
                                      <tr>
                                           <th>S.N.</th>
                                           <th>क्रम संख्या</th>
                                           <th>नेपाली भाषा</th>
                                           <th>अंग्रेजी भाषा</th>
                                           <th>रंग</th>
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
                                            <td>{{ $item->points }}</></td>
                                            <td>{{ $item->name_nepali }}</td>
                                            <td>{{ $item->name_english }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td><a href="{{ url('dashboard/edit/disability-group/'.$item->id) }}" title="edit"><span class="label label-danger"><i class="bi-pencil"></i></span></a></td>
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

