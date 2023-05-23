@extends("layout.app")

@section('script')
<script>
let table = new DataTable('#recent-orders');

    async function notice () {
        const { value: notice } = await Swal.fire({
            input: 'textarea',
            inputLabel: 'Notice',
            inputPlaceholder: 'Notice Board...',
            inputAttributes: {
                'aria-label': 'Notice Board...'
            },
            showCancelButton: true,
            cancelButtonColor: '#d33',
        })
        if (notice) {
            Swal.fire(notice)
        }

    }

    function message () {
        Swal.fire(
            'Messages'
        )
    }

    function email () {
        Swal.fire(
            'Emial'
        )
    }

    function notify () {
        Swal.fire(
            'Notification'
        )
    }
</script>
@endsection

@section("content")
<!-- Bank Stats -->
<section id="bank-cards" class="bank-cards">
    <div class="row match-height">
        <div class="col-xl-3">
            <div class="card bg-gradient-directional-primary">
                <div class="card-content">
                    <div class="card-body" onclick="notice()">
                        <div class="media d-flex">
                            <div class="media-body text-white text-left">
                                <h3 class="text-white"></h3>
                                <span><strong>Send Notice</strong></span>
                                {{-- <li></li> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card bg-gradient-directional-danger">
                <div class="card-content">
                    <div class="card-body" onclick="message()">
                        <div class="media d-flex">
                            <div class="media-body text-white text-left">
                                <h3 class="text-white"></h3>
                                <span>Send SMS</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card bg-gradient-directional-cyan">
                <div class="card-content">
                    <div class="card-body" onclick="email()">
                        <div class="media d-flex">
                            <div class="media-body text-white text-left">
                                <h3 class="text-white"></h3>
                                <span>Send Email</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card bg-gradient-directional-warning">
                <div class="card-content">
                    <div class="card-body" onclick="notify()">
                        <div class="media d-flex">
                            <div class="media-body text-white text-left">
                                <h3 class="text-white"></h3>
                                <span>Send Notification</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row match-height">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card bank-card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 text-left">
                                <h3 class="mb-0">₹88K</h3>
                                <p class="text-light">12</p>
                                <h4 class="warning mt-1 text-bold-500">MAINTENANCE DUE</h4>
                            </div>
                            <div class="col-4">
                                <div class="float-right">
                                    <canvas id="gold-chart" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card bank-card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 text-left">
                                <h3 class="mb-0">₹28K</h3>
                                <p class="text-light">per Ounce</p>
                                <h4 class="info mt-1 text-bold-500">CASH IN HAND</h4>
                            </div>
                            <div class="col-4">
                                <div class="float-right">
                                    <canvas id="silver-chart" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card bank-card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 text-left">
                                <h3 class="mb-0">₹18K</h3>
                                <p class="text-light">per Unit</p>
                                <h4 class="danger mt-1 text-bold-500">BANK BALANCE</h4>
                            </div>
                            <div class="col-4">
                                <div class="float-right">
                                    <canvas id="euro-chart" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card bank-card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-left">
                                <h4 class="success mt-1 text-bold-500">COMPLAINTS</h4>
                                <p class="text-dark">OPEN</p>
                                <p class="text-dark">INPROGRESS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- add --}}
    <div class="row">
        <div class="col-xl-3 col-md-6 col-12">
            <div class="card bg-gradient-directional-success">
                <div class="card-content">
                    <a href="">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="la la-building-o text-white font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right">
                                    <h3 class="text-white">278</h3>
                                    <span>Total Blocks</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="card bg-gradient-directional-danger">
                <div class="card-content">
                    <a href="">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="la la-home text-white font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right">
                                    <h3 class="text-white">156</h3>
                                    <span>Total Flats/Units</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="card bg-gradient-directional-info">
                <div class="card-content">
                    <a href="">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="la la-users text-white font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right">
                                    <h3 class="text-white">689</h3>
                                    <span>Total Committee</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="card bg-gradient-directional-warning">
                <div class="card-content">
                    <a href="">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="ft-user text-white font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right">
                                    <h3 class="text-white">423</h3>
                                    <span>Total Tenants</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 col-12">
            <div class="card bg-gradient-directional-warning">
                <div class="card-content">
                    <a href="">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="ft-users text-white font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right">
                                    <h3 class="text-white">278</h3>
                                    <span>Total Owners</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="card bg-gradient-directional-info">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="la la-user-secret text-white font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right">
                                <h3 class="text-white">156</h3>
                                <span>Total Employees</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="card bg-gradient-directional-secondary">
                <div class="card-content">
                    <a href=">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="la la-book text-white font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right">
                                    <h3 class="text-white">2</h3>
                                    <span>Total Polls</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body">
                                <h3>$00.00</h3>
                                <span class="text-muted">Received Bills</span>
                            </div>
                            <div class="align-self-center">
                                <div id="sp-bar-total-cost"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body">
                                <h3>$00.00</h3>
                                <span class="text-muted">Facility Booking</span>
                            </div>
                            <div class="align-self-center">
                                <div id="sp-bar-total-sales"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body">
                                <h3>$00.00</h3>
                                <span class="text-muted">Received Fund</span>
                            </div>
                            <div class="align-self-center">
                                <div id="sp-bar-total-revenue"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Transactions</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="invoice-summary.html" target="_blank">Invoice Summary</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table hover order-column order-column table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Invoice#</th>
                                    <th class="border-top-0">Customer Name</th>
                                    <th class="border-top-0">Products</th>
                                    <th class="border-top-0">Categories</th>
                                    <th class="border-top-0">Shipping</th>
                                    <th class="border-top-0">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                    <td class="text-truncate"><a href="#">INV-001001</a></td>
                                    <td class="text-truncate">
                                        <span class="avatar avatar-xs">
                                            <img class="box-shadow-2" src="../../../app-assets/images/portrait/small/avatar-s-4.png" alt="avatar">
                                        </span>
                                        <span>Elizabeth W.</span>
                                    </td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="../../../app-assets/images/portfolio/portfolio-1.jpg" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="../../../app-assets/images/portfolio/portfolio-2.jpg" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="../../../app-assets/images/portfolio/portfolio-4.jpg" alt="Avatar">
                                            </li>
                                            <li class="avatar avatar-sm">
                                                <span class="badge badge-info">+1 more</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-danger round">Food</button>
                                    </td>
                                    <td>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">$ 1200.00</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection