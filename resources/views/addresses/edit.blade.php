@extends('layout.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center"><strong>{{ $title }} : -</strong></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{ $action }}" method="POST">
                            @csrf
                            @isset($address->id)
                            {{ method_field('PUT')}}
                            @endisset
                            <div class="form-body">
                                {{-- address --}}
                                <div class="form-group">
                                    <label for="address_text">Address :</label>
                                    <input type="text" id="address_text" class="form-control" placeholder="address_text"
                                        value="{{ old('address_text', $address->address_text) }}" name="address_text" required>
                                    {!! $errors->first('address_text','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- District --}}
                                <div class="form-group">
                                    <label for="district">District :</label>
                                    <input type="text" id="district" class="form-control" placeholder="District"
                                        value="{{ old('district', $address->district) }}" name="district" required>
                                    {!! $errors->first('district','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- State --}}
                                <div class="form-group">
                                    <label for="state">State :</label>
                                    <input type="text" id="state" class="form-control" placeholder="State"
                                        value="{{ old('state', $address->state) }}" name="state" required>
                                    {!! $errors->first('state','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- Zip Code --}}
                                <div class="form-group">
                                    <label for="zip_code">Zip Code : </label>
                                    <input type="number" id="zip_code" class="form-control" placeholder="Zip Code"
                                        value="{{ old('zip_code', $address->zip_code) }}"
                                        name="zip_code">
                                    {!! $errors->first('zip_code','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a type="button" href="{{ route('addresses.index') }}" class="btn btn-danger mr-1">
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
