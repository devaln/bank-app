@extends('layout.app')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">All Departments</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Settings</a>
                            </li>
                            <li class="breadcrumb-item active">All Departments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="media width-250 float-right">
                    <media-left class="media-middle">
                        <div id="sp-bar-total-sales"></div>
                    </media-left>
                    <div class="media-body media-right text-right">
                        <a class="btn btn-sm btn-primary box-shadow-2 round btn-min-width pull-right white"
                            href="{{ route('departments.create') }}">
                            <i class="ft-plus white"></i>Add Department
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Base style table -->
            <section id="base-style">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <h4 class="card-title float-left">Departments</h4>
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
                                <div class="container">

                                    <div class="card-body mt-1">
                                        <div class="table-responsive">
                                            <table id="department" class="table display alt-pagination table-wrapper">
                                                <thead>
                                                    <tr>
                                                        <th>#Id</th>
                                                        <th>Name</th>
                                                        <th>Count</th>
                                                        <th class="border-top-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($departments as $depart)
                                                    <tr>
                                                        <td>{{ $depart->id }}</td>
                                                        <td>{{ $depart->name }}</td>
                                                        <td>{{ $depart->employee_count }}</td>
                                                        <td>
                                                            <form action="{{ route('departments.destroy', $depart->id) }}" method="POST">
                                                                <a href="{{ route('departments.edit', $depart->id) }}">
                                                                    <i class="la la-pencil success font-medium-1 mr-1"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-light btn-round" onclick="return confirm('Do you really want to delete department!')">
                                                                    <i class="la la-trash danger font-medium-1 mr-1"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        let table = new DataTable('#department');
    </script>
@endsection
