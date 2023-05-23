<!-- Primary Alert -->
@if ($message = Session::get('primary'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'question',
        html: '<strong>{{ $message }}</strong>'
    })
</script>
@endif

<!-- Success Alert -->
@if ($message = Session::get('success'))
<script>
    const Toast1 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast1.fire({
        icon: 'success',
        html: '<strong>{{ $message }}</strong>'
    })
</script>
@endif

<!-- Danger Alert -->
@if ($message = Session::get('danger'))
<script>
    const Toast2 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast2.fire({
        icon: 'error',
        html: '<strong>{{ $message }}</strong>'
    })
</script>
@endif

<!-- WarningAlert -->
@if ($message = Session::get('warning'))
<script>
    const Toast3 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast3.fire({
        icon: 'warning',
        html: '<strong>{{ $message }}</strong>'
    })
</script>
@endif

<!-- Info Alert -->
@if ($message = Session::get('info'))
<script>
    const Toast4 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast4.fire({
        icon: 'info',
        html: '<strong>{{ $message }}</strong>'
    })
</script>
@endif

@if ($errors->any())
<script>
    const Toast5 = Swal.mixin({
        toast: true,
        // background: 'red',
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast5.fire({
        icon: 'error',
        html: '<strong>Form Credientials gone Wrong.</strong'
    })
</script>
@endif