@extends('admin.layout.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h3></h3>
        
    </div>

           <!-- Main content -->
           <div class="content">

               <div class="row">
                   <div class="col-lg-12 m-b-3">
                       <div class="box box-info">
                           <div class="box-header with-border p-t-1" style="text-align: center">
                            <h4 class="text-black" style="font-family:PreetiNormal">
                                Create New Employee
                               </h4>
                               <div class="pull-right">
                               </div>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                            <div class="card">

                                <div class="card-body">
                        

                                    @if(isset($employee))
                                    <form method="POST" action="{{ route('employee.update', ['employee' => $employee->id]) }}">
                                        @method('PUT')
                                    @else
                                        <form method="POST" action="{{ route('employee.store') }}"
                                    @endif
                                        @csrf
                    
                                       
                                            
                                        <div class="row">
                                             <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>नाम</label>
                                                    <input name="name_nepali" class="form-control" id="basicInput" type="text" value="{{ isset($employee) ? $employee->name_nepali : ''}}">
                                                    @if($errors->any())
                                                        <div style="color:red !important">
                                                            {{ $errors->first('name_nepali') }}
                                                        </div>
                                                    @endif
                                                </fieldset>
                                            </div>
                                             <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Name</label>
                                                    <input name="name_english" class="form-control" id="basicInput" type="text" value="{{ isset($employee) ? $employee->name_english : ''}}">
                                                    @if($errors->any())
                                                        <div style="color:red !important">
                                                            {{ $errors->first('name_english') }}
                                                        </div>
                                                    @endif
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Phone Number</label>
                                                    <input name="phone_number" class="form-control" id="basicInput" type="text" value="{{  isset($employee) ? $employee->phone_number : '' }}">
                                                    @if($errors->any())
                                                        <div style="color:red !important">
                                                            {{ $errors->first('phone_number') }}
                                                        </div>
                                                    @endif
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Designation</label>
                                                    <input name="designation" class="form-control" id="basicInput" type="text" value="{{ isset($employee) ? $employee->designation : ''}}">
                                                    @if($errors->any())
                                                        <div style="color:red !important">
                                                            {{ $errors->first('designation') }}
                                                        </div>
                                                    @endif
                                                </fieldset>
                                            </div>
                                             <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-select mb-3" name="status">
                                                            <option value={{isset($employee) ? $employee->status : old('status') }}>{{ isset($employee) ? $employee->status : old('status') }}</option>
                                                            <option value="active">Active</option>
                                                            <option value="in-active">In-Active</option>
                                                        </select>
                                                    @if($errors->any())
                                                        <div style="color:red !important">
                                                            {{ $errors->first('status') }}
                                                        </div>
                                                    @endif
                                                </fieldset>
                                            </div>                                          	
                                        </div>
                                         <div class="row" style="display: flex; justify-content:space-between;">
                                            
                                            <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Profile Photo *</label><br>
                                                                @if(isset($employee))
                                                                    <img src="{{url(isset($employee)?$employee->getProfileImage():imageNotFound())}}" height="150" width="150"
                                                                         id="photo_img">
                            
                                                                @else
                                                                    <img src="{{isset($employee)?$employee->getProfileImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="photo_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="photo_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="photo_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="photo_image" name="photo_image"
                                                                       onclick="anyFileUploader('photo')">
                                                                <input type="hidden" id="photo_path" name="photo" class="form-control"
                                                                       value="{{isset($employee)?$employee->photo:''}}"/>
                                                                 @if($errors->any())
                                                                    <div style="color:red !important">
                                                                        {{ $errors->first('photo') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Red Signature *</label><br>
                                                                @if(isset($employee))
                                                                    <img src="{{url(isset($employee)?$employee->getRedSignatureImage():imageNotFound())}}" height="150" width="150"
                                                                         id="red_signature_img">
                            
                                                                @else
                                                                    <img src="{{isset($employee)?$employee->getRedSignatureImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="red_signature_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="red_signature_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="red_signature_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="red_signature_image" name="red_signature_image"
                                                                       onclick="anyFileUploader('red_signature')">
                                                                <input type="hidden" id="red_signature_path" name="red_signature" class="form-control"
                                                                       value="{{isset($employee)?$employee->red_signature:''}}"/>
                                                                @if($errors->any())
                                                                    <div style="color:red !important">
                                                                        {{ $errors->first('red_signature') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Black Signature *</label><br>
                                                                @if(isset($employee))
                                                                    <img src="{{url(isset($employee)?$employee->getBlackSignatureImage():imageNotFound())}}" height="150" width="150"
                                                                         id="black_signature_img">
                            
                                                                @else
                                                                    <img src="{{isset($employee)?$employee->getBlackSignatureImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="black_signature_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="black_signature_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="black_signature_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="black_signature_image" name="black_signature_image"
                                                                       onclick="anyFileUploader('black_signature')">
                                                                <input type="hidden" id="black_signature_path" name="black_signature" class="form-control"
                                                                       value="{{isset($employee)?$employee->black_signature:''}}"/>
                                                                 @if($errors->any())
                                                                    <div style="color:red !important">
                                                                        {{ $errors->first('black_signature') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Stamp *</label><br>
                                                                @if(isset($employee))
                                                                    <img src="{{url(isset($employee)?$employee->getStampImage():imageNotFound())}}" height="150" width="150"
                                                                         id="stamp_img">
                            
                                                                @else
                                                                    <img src="{{isset($employee)?$employee->getStampImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="stamp_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="stamp_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="stamp_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="stamp_image" name="stamp_image"
                                                                       onclick="anyFileUploader('stamp')">
                                                                <input type="hidden" id="stamp_path" name="stamp" class="form-control"
                                                                       value="{{isset($employee)?$employee->stamp:''}}"/>
                                                                  @if($errors->any())
                                                                    <div style="color:red !important">
                                                                        {{ $errors->first('stamp') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                            

                                           
                                       
                        
                                        <button type="submit" class="btn btn-primary float-right mt-2"><i class="fa fa-check"></i>
                                            Save</button>
                        
                                    </form>
                        
                                </div>
                        
                            </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

</div>
<!-- /.content -->
</div>

@endsection
@push('scripts')
@include('parties.common.file-upload')
    <script>
         function materialUsed(){
            const sb = document.querySelector('#material_used');
            console.log(sb.value === "Yes");
            if(sb.value === "Yes"){
                $("#material_used_yes").show();

            }else{
                $("#material_used_yes").hide();

            }
        }
    </script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endpush
