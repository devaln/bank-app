@extends('layout.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center"><strong> {{ $title }} : - </strong></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form class="form" action="{{ $action }}" method="POST">
                            @csrf
                            @isset($nominee->id)
                            {{ method_field('PATCH')}}
                            @endisset
                            <div class="form-body">
                                {{-- Name --}}
                                <div class="row p-2">
                                    {{-- First Name --}}
                                    <div class="form-group">
                                        <label for="eventRegInput1" class="col-form-label text-md-end">First Name :</label>
                                        <input type="text" id="eventRegInput1" class="form-control" placeholder="First Name"
                                            value="{{ old('first_name', $nominee->first_name) }}" name="first_name" required>
                                        {!! $errors->first('first_name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                                    </div>
                                    {{-- Last Name --}}
                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}  ml-1">
                                        <label for="last_name" class="col-form-label text-md-end">Last Name :</label>
                                        <input type="text" id="last_name" class="form-control" placeholder="Last Name"
                                            value="{{ old('last_name', $nominee->last_name) }}" name="last_name" required autofocus>
                                        {!! $errors->first('last_name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                                    </div>
                                </div>
                                {{-- Phone Number --}}
                                <div class="form-group">
                                    <label for="phone">Phone Number :</label>
                                    <input type="text" id="phone" class="form-control" placeholder="Phone Number"
                                        value="{{ old('phone', $nominee->phone) }}" name="phone" required>
                                    {!! $errors->first('phone', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                                </div>
                                {{-- date_of_birth  --}}
                                <div class="form-group">
                                    <label for="date_of_birth">Date Of Birth :</label>
                                    <input type="date" id="date_of_birth" class="form-control" placeholder="date_of_birth"
                                        value="{{ old('date_of_birth', $nominee->date_of_birth) }}" name="date_of_birth" required>
                                    {!! $errors->first('date_of_birth', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                                </div>
                                {{-- gender  --}}
                                <div class="form-group">
                                    <label for="gender">Gender :</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="gender" value="{{ $nominee->gender}}" class="custom-control-input" {{ ($nominee->gender == 'Male')? 'checked': '' }} id="Male">
                                            <label class="custom-control-label" for="Male">Male</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="gender" value="{{ $nominee->gender }}" class="custom-control-input" {{ ($nominee->gender == 'Female')? 'checked': '' }} id="Female">
                                            <label class="custom-control-label" for="Female">Female</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="gender" value="{{ $nominee->gender }}" class="custom-control-input" {{ ($nominee->gender == 'Other')? 'checked': '' }} id="Other">
                                            <label class="custom-control-label" for="Other">Other</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Relation  --}}
                                <div class="form-group">
                                    <label for="relation">Relation :</label>
                                    <input type="text" id="relation" class="form-control" placeholder="Relation"
                                        value="{{ old('relation', $nominee->relation) }}" name="relation" required />
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a type="button" href="{{ route('nominees.index') }}" class="btn btn-danger mr-1">
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
