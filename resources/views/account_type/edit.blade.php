@extends('layout.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">Account Types</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form class="form" action="{{ $action }}" method="POST">
                            @csrf
                            @isset($accountType->id)
                            {{ method_field('PUT')}}
                            @endisset
                            <div class="form-body">
                                {{-- Department Name --}}
                                <div class="form-group">
                                    <label for="eventRegInput1">Account Type </label>
                                    <select type="text" id="eventRegInput1" class="form-control" placeholder="Account Type"
                                        value="{{ old('type', ) }}" name="type" required>
                                        <option selected>{{ ($accountType->id)?  $accountType->type : __('-- Select Account Type --') }}</option>
                                        <option value="Salary">Salary</option>
                                        <option value="Zero-balance">Zero-balance</option>
                                        <option value="Zero-salarried">Zero-salarried</option>
                                        <option value="Business">Business</option>
                                    </select>
                                </div>
                                {{-- Employee Count --}}
                                <div class="form-group">
                                    <label for="eventRegInput2">Loan Intrest Rate</label>
                                    <input type="float" id="eventRegInput2" class="form-control" placeholder="Loan Intrest Rate"
                                        value="{{ old('loan_intrest_rate', $accountType->loan_intrest_rate) }}" name="loan_intrest_rate" required>
                                </div>
                                {{-- Employee Count --}}
                                <div class="form-group">
                                    <label for="eventRegInput3">Saving Intrest Rate</label>
                                    <input type="float" id="eventRegInput3" class="form-control" placeholder="Saving Intrest Rate"
                                        value="{{ old('saving_intrest_rate', $accountType->saving_intrest_rate) }}" required name="saving_intrest_rate">
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a type="button" href="{{ route('account-type.index') }}" class="btn btn-danger mr-1">
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
