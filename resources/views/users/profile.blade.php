@extends('layout.app')
@section('script')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#profile-img').click(function(){
            $('input').click();
            jQuery(document).ready(function() {
                var readURL = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.input-img-user').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("input[type='file']").on('change', function() {
                    readURL(this);
                });
            });
        });
    </script>
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">Department</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form class="form" action="{{ route('user.profile.store', $LoggedInUser->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @isset($LoggedInUser->id)
                                {{ method_field('PUT') }}
                            @endisset
                            <div class="form-body">
                                <div class="">
                                    <a type="button" href="{{ route('admin.dashboard') }}" class="btn btn-secondary float-left">
                                        <i class="ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-success float-right">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                                <!-- User Image -->
                                <div class="form-item mb-4" align="center">
                                    <div class="input-wrapper">
                                        <div class="custom-input-file-user">
                                            <div class="input-file-wrapper-user p-3">
                                                <img src="{{ ($LoggedInUser->avatar)? $LoggedInUser->avatar : $image }}" alt="avatar" id="profile-img" style="max-width: 161px;border-radius: 50%">
                                                <input type="file" accept="image/png, image/gif, image/jpeg" style="display: block;visibility: hidden;" name="avatar">
                                                <b class="text-primary">Profile Image</b>
                                                <p>Click on image to change the profile image.</p>
                                            </div>
                                        </div>
                                        {!! $errors->first('avatar', '<span class="alert-msg text-danger" aria-hidden="true">
                                        <i class="la la-times-circle" aria-hidden="true"></i> :message</span>',) !!}
                                    </div>
                                </div>
                                {{-- First Name --}}
                                <div class="form-group">
                                    <label for="first_name">First Name :</label>
                                    <input type="text" id="first_name" class="form-control" placeholder="First Name" style="text-align: center"
                                        value="{{ old('first_name', $LoggedInUser->first_name) }}" name="first_name" required>
                                    {!! $errors->first('first_name','<span class="alert-msg text-danger" aria-hidden="true">
                                    <i class="la la-times-circle" aria-hidden="true"></i> :message</span>',) !!}
                                </div>
                                {{-- Middle Name --}}
                                <div class="form-group">
                                    <label for="middle_name">Middle Name :</label>
                                    <input type="text" id="middle_name" class="form-control" placeholder="Middle Name" style="text-align: center"
                                        value="{{ old('middle_name', $LoggedInUser->middle_name) }}" name="middle_name" required>
                                    {!! $errors->first( 'middle_name', '<span class="alert-msg text-danger" aria-hidden="true"><b>
                                    <i class="la la-times-circle" aria-hidden="true"> </i></b> :message</span>', ) !!}
                                </div>
                                {{-- Last Name --}}
                                <div class="form-group">
                                    <label for="last_name">Last Name :</label>
                                    <input type="text" id="last_name" class="form-control" placeholder="Last Name" required
                                        style="text-align: center" value="{{ old('last_name', $LoggedInUser->last_name) }}" name="last_name">
                                    {!! $errors->first( 'last_name', '<span class="alert-msg text-danger" aria-hidden="true">
                                    <i class="la la-times-circle" aria-hidden="true"> </i> :message</span>', ) !!}
                                </div>
                                {{-- E-mail --}}
                                <div class="form-group">
                                    <label for="email">E-Mail :</label>
                                    <input type="email" id="email" class="form-control" placeholder="E-Mail" required
                                        style="text-align: center" value="{{ old('email', $LoggedInUser->email) }}" name="email">
                                    {!! $errors->first( 'email', '<span class="alert-msg text-danger" aria-hidden="true">
                                    <i class="la la-times-circle" aria-hidden="true"> </i> :message</span>',) !!}
                                </div>
                                {{-- Phone Number --}}
                                <div class="form-group">
                                    <label for="phone">Phone Number :</label>
                                    <input type="text" id="phone" class="form-control" placeholder="Phone Number" required
                                        style="text-align: center" value="{{ old('phone', $LoggedInUser->phone) }}" name="phone">
                                    {!! $errors->first( 'phone', '<span class="alert-msg text-danger" aria-hidden="true">
                                    <i class="la la-times-circle" aria-hidden="true"> </i> :message</span>',) !!}
                                </div>
                                {{-- Date Of Birth --}}
                                <div class="form-group">
                                    <label for="date_of_birth">Date Of Birth :</label>
                                    <input type="date" id="date_of_birth" class="form-control" placeholder="Date Of Birth" style="text-align: center"
                                        value="{{ old('date_of_birth', $LoggedInUser->date_of_birth) }}" name="date_of_birth" >
                                    {!! $errors->first( 'date_of_birth', '<span class="alert-msg text-danger" aria-hidden="true">
                                    <i class="la la-times-circle" aria-hidden="true"> </i> :message</span>', ) !!}
                                </div>
                                {{-- gender  --}}
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="gender" value="{{ $LoggedInUser->gender }}" class="custom-control-input"
                                                {{ $LoggedInUser->gender === 'Male' ? 'checked' : '' }} id="Male">
                                            <label class="custom-control-label" for="Male">Male</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="gender" value="{{ $LoggedInUser->gender }}" class="custom-control-input"
                                                {{ $LoggedInUser->gender === 'Female' ? 'checked' : '' }} id="Female">
                                            <label class="custom-control-label" for="Female">Female</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="gender" value="{{ $LoggedInUser->gender }}" class="custom-control-input"
                                                {{ $LoggedInUser->gender === 'Other' ? 'checked' : '' }} id="Other">
                                            <label class="custom-control-label" for="Other">Other</label>
                                        </div>
                                        {!! $errors->first( 'gender', '<span class="alert-msg text-danger" aria-hidden="true">
                                        <i class="la la-times-circle" aria-hidden="true"> </i> :message</span>', ) !!}
                                    </div>
                                </div>
                                {{-- Pan Card Number  --}}
                                <div class="form-group">
                                    <label for="pan_card_number">Pan Card Number</label>
                                    <input type="text" id="pan_card_number" class="form-control" placeholder="Pan Card Number"
                                        value="{{ old('pan_card_number', $LoggedInUser->pan_card_number) }}" name="pan_card_number" required>
                                    {!! $errors->first( 'pan_card_number', '<span class="alert-msg text-danger" aria-hidden="true">
                                    <i class="la la-times-circle" aria-hidden="true"> </i> :message</span>', ) !!}
                                </div>
                                {{-- Adhaar Card Number  --}}
                                <div class="form-group">
                                    <label for="adhaar_card_number">Adhaar Card Number</label>
                                    <input type="text" id="adhaar_card_number" class="form-control" placeholder="Adhaar Card Number"
                                        value="{{ old('adhaar_card_number', $LoggedInUser->adhaar_card_number) }}" name="adhaar_card_number" required>
                                    {!! $errors->first( 'adhaar_card_number', '<span class="alert-msg text-danger" aria-hidden="true">
                                    <i class="la la-times-circle" aria-hidden="true"> </i> :message</span>', ) !!}
                                </div>
                                {{-- maritial_status  --}}
                                <div class="form-group">
                                    <label for="maritial_status">maritial_status</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="maritial_status" value="{{ $LoggedInUser->maritial_status }}" class="custom-control-input"
                                                {{ $LoggedInUser->maritial_status === 'Marrired' ? 'checked' : '' }} id="Marrired">
                                            <label class="custom-control-label" for="Marrired">Marrired</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="maritial_status" value="{{ $LoggedInUser->maritial_status }}" class="custom-control-input"
                                                {{ $LoggedInUser->maritial_status === 'Unmarried' ? 'checked' : '' }} id="Unmarried">
                                            <label class="custom-control-label" for="Unmarried">Unmarried</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="maritial_status" value="{{ $LoggedInUser->maritial_status }}" class="custom-control-input"
                                                {{ $LoggedInUser->maritial_status === 'Divorced' ? 'checked' : '' }} id="Divorced">
                                            <label class="custom-control-label" for="Divorced">Divorced</label>
                                        </div>
                                        {!! $errors->first( 'maritial_status', '<span class="alert-msg text-danger" aria-hidden="true">
                                        <i class="la la-times-circle" aria-hidden="true"> </i> :message</span>', ) !!}
                                    </div>
                                </div>
                                {{-- is_admin  --}}
                                <div class="form-group" align="center">
                                    <input type="checkbox" id="is_admin" value="{{ $LoggedInUser->is_admin }}" name="is_admin">
                                    <label for="is_admin">Be Admin User</label>
                                </div>

                            </div>

                            <div class="form-actions mb-2">
                                <a type="button" href="{{ route('departments.index') }}" class="btn float-left btn-secondary mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn float-right btn-success">
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
