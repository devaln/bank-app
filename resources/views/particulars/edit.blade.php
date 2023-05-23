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
                            @isset($particular->id)
                            {{ method_field('PUT')}}
                            @endisset
                            <div class="form-body">
                                {{-- particular --}}
                                <div class="form-group">
                                    <label for="ammount">Ammount :</label>
                                    <input type="float" id="ammount" class="form-control" placeholder="Ammount"
                                        value="{{ old('ammount', $particular->ammount) }}" name="ammount" required>
                                    {!! $errors->first('ammount','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- Description --}}
                                <div class="form-group">
                                    <label for="description">Description :</label>
                                    <input type="text" id="description" class="form-control" placeholder="Description"
                                        value="{{ old('description', $particular->description) }}" name="description" required>
                                    {!! $errors->first('description','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                                {{-- receiver_id --}}
                                <div class="form-group">
                                    <label for="receiver_id">Send To : </label>
                                    <select type="text" id="receiver_id" class="" name="receiver_id">
                                        <option value="" selected>{{filled($particular->receiver_id)? $users->find($particular->receiver_id)->first_name : '-- Select User To Send Money --' }}</option>
                                        @foreach ($users as $user)
                                            <option name="receiver_id" value="{{ $user->id }}">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('receiver_id','<span class="alert-msg text-danger" aria-hidden="true"><i class="la la-times" aria-hidden="true">
                                    </i> :message</span>') !!}
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a type="button" href="{{ route('particulars.index') }}" class="btn btn-danger mr-1">
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

@section('script')
    <script>
        new TomSelect("#receiver_id",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    </script>
@endsection