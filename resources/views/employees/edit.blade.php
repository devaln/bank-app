@extends('layout.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">{{ $title }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form class="form" action="{{ $action }}" method="POST">
                            @csrf
                            @isset($employee->id)
                            {{ method_field('PUT')}}
                            @endisset
                            <div class="form-body">
                                {{-- Education --}}
                                <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                                    <label for="education" class="col-form-label text-md-end">Education </label>
                                    <input type="text" id="education" class="form-control" placeholder="Education"
                                        value="{{ old('education', $employee->education) }}" name="education" required autofocus>
                                    {!! $errors->first('education', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- date_of_joining  --}}
                                <div class="form-group">
                                    <label for="date_of_joining">Data Of Joining</label>
                                    <input type="date" id="date_of_joining" class="form-control" placeholder="Data Of Joining"
                                        value="{{ old('date_of_joining', $employee->date_of_joining) }}" name="date_of_joining" required>
                                    {!! $errors->first('date_of_joining','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- Designation --}}
                                <div class="form-group">
                                    <label for="designation" class="col-form-label text-md-end">Designation </label>
                                    <input type="text" id="designation" class="form-control" placeholder="Designation"
                                        value="{{ old('designation', $employee->designation) }}" name="designation" required>
                                    {!! $errors->first('designation','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>

                                {{-- Official Email --}}
                                <div class="form-group">
                                    <label for="official_email">Official Email Address</label>
                                    <input type="email" id="official_email" class="form-control" placeholder="Official Email Address"
                                        value="{{ old('official_email', $employee->official_email) }}" name="official_email" required>
                                    {!! $errors->first('designation','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- Salary Amount --}}
                                <div class="form-group">
                                    <label for="salary_ammount">Salary Amount </label>
                                    <input type="float" id="salary_ammount" class="form-control" placeholder="Salary Amount"
                                        value="{{ old('salary_ammount', $employee->salary_ammount) }}" name="salary_ammount" required>
                                    {!! $errors->first('salary_ammount','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- work_status --}}
                                <div class="form-group">
                                    <label for="work_status" >Work Status</label>
                                    <input type="work_status" id="work_status" class="form-control" placeholder="Work Status"
                                        value="{{ old('work_status', $employee->work_status) }}" name="work_status" required>
                                    {!! $errors->first('work_status','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- department_id  --}}
                                <div class="form-group">
                                    <label for="department_id">Department</label>
                                    <select type="department_id" id="department_id" class="form-control" name="department_id" required" >
                                        <option value="" selected>{{ filled($employee->department_id)? $name : '-- Select Department --' }}</option>
                                        @foreach ($departments as $depart)
                                            <option name="department_id" value="{{ $depart->id }}">{{ $depart->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('department_id','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>

                            </div>

                            <div class="form-actions center">
                                <a type="button" href="{{ route('employees.index') }}" class="btn btn-danger mr-1">
                                    <i class="ft-x"> Cancel</i>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"> Save</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
<script>
    new TomSelect("#department_id",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>
@endsection --}}