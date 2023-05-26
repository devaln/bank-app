@extends('layout.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">Department</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    {{-- <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div> --}}
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form class="form" action="{{ $action }}" method="POST">
                            @csrf
                            @isset($department->id)
                            {{ method_field('PUT')}}
                            @endisset
                            <div class="form-body">
                     e           {{-- Department Name --}}
                                <div class="form-group">
                                    <label for="eventRegInput1">Department Name </label>
                                    <input type="text" id="eventRegInput1" class="form-control" placeholder="name"
                                        value="{{ old('name', $department->name) }}" name="name" required>
                                    {!! $errors->first('name','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- Employee Count --}}
                                <div class="form-group">
                                    <label for="eventRegInput2">Employee Count</label>
                                    <input type="number" id="eventRegInput2" class="form-control" placeholder="title"
                                        value="{{ old('employee_count', $department->employee_count) }}"
                                        name="employee_count">
                                    {!! $errors->first('employee_count','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a type="button" href="{{ route('departments.index') }}" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
