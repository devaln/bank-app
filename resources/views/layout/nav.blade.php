<ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item active"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="material-icons">settings_input_svideo</i><span>Dashboard</span></a></li>

    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="material-icons">playlist_add</i><span data-i18n="Accounts">Accounts</span><span class="badge badge badge-pill badge-success float-right mt-0">9</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="{{ route('account-type.index') }}" data-toggle=""><span data-i18n="All Accounts">Accounts List</span></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="{{ route('particulars.index') }}" data-toggle=""><span data-i18n="Payments">Payments List</span></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="{{ route('particulars.create') }}" data-toggle=""><span data-i18n="Add New">Add Payment</span></a>
            </li>

        </ul>
    </li>

    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="material-icons">card_travel</i><span data-i18n="Maintenance">Maintenance</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Maintenance Dashbaord">Maintenance Dashbaord</span></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Pending Maintenance List">Pending Maintenance List</span></a>
            </li>
        </ul>
    </li>

    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="material-icons">perm_identity</i><span data-i18n="Flats">Flats Management</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Mettings">Flats Owner List</span></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Mettings">Tenent List</span></a>
            </li>
        </ul>
    </li>
    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="material-icons">perm_identity</i><span data-i18n="Vendor">Employees</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="{{ route('employees.index') }}" data-toggle=""><span data-i18n="Mettings">Staff</span></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="{{ route('employees.create') }}" data-toggle=""><span data-i18n="Mettings">Add Staff</span></a>
            </li>

        </ul>
    </li>
    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="material-icons">perm_identity</i><span data-i18n="Reports">Reports</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Mettings">Maintenance Due Report</span></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Mettings">Pending Vendor Payment Report</span></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Mettings">Pending Diesel Provider Payment Report</span></a>
            </li>

        </ul>
    </li>

    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="material-icons">perm_identity</i><span data-i18n="BankAdmin">Bank Admin</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Notice Board">Bank Dashbaord</span></a>
            <li data-menu=""><a class="dropdown-item" href="{{ route('employees.index') }}" data-toggle=""><span data-i18n="Emergency Detail">Employees Detail</span></a>
            <li data-menu=""><a class="dropdown-item" href="{{ route('account-type.index') }}" data-toggle=""><span data-i18n="Notice Board">Account Types</span></a>
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Notice Board">Documents</span></a>

            <li data-menu=""><a class="dropdown-item" href="{{ route('departments.index') }}" data-toggle=""><span data-i18n="Notice Board">Department Details</span></a>
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Notice Board">Managers</span></a>
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Notice Board">Assets & Inventory List</span></a>
        </ul>
    </li>

    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="material-icons">perm_identity</i><span data-i18n="Settings">Settings</span></a>
        <ul class="dropdown-menu">

            <li data-menu=""><a class="dropdown-item" href="{{ route('users.index') }}" data-toggle=""><span data-i18n="Notice Board">User Management</span></a>

            <li data-menu=""><a class="dropdown-item" href="#" data-toggle=""><span data-i18n="Notice Board">Email Setting</span></a>
            <li data-menu=""><a class="dropdown-item" href="{{ route('employees.index') }}" data-toggle=""><span data-i18n="Notice Board">Employees Setting</span></a>
            <li data-menu=""><a class="dropdown-item" href="{{ route('account-type.index') }}" data-toggle=""><span data-i18n="Notice Board">Account Type Setting</span></a>
            <li data-menu=""><a class="dropdown-item" href="{{ route('departments.index') }}" data-toggle=""><span data-i18n="Notice Board">Department Setting</span></a>
        </ul>
    </li>

</ul>
