<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMAGANG - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome To SIMAGANG!</h1>
                                    </div>

                                    <form action="{{ route('register.proses') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                        </div>

                                        <div class="form-group">
                                            <select name="role" id="role" class="form-control form-control-user" required>
                                                <option selected disabled>-- Pilih Role --</option>
                                                <option value="mentor">Mentor</option>
                                                <option value="peserta">Peserta</option>
                                            </select>
                                        </div>

                                        <!-- Input mentor -->
                                        <div id="mentorFields" style="display:none;">
                                            <div class="form-group">
                                                <input type="text" name="handphone" class="form-control form-control-user" placeholder="No. Handphone">
                                            </div>
                                        </div>

                                        <!-- Input peserta -->
                                        <div id="pesertaFields" style="display:none;">
                                            <div class="form-group">
                                                <input type="text" name="institut" class="form-control form-control-user" placeholder="Institut/Universitas">
                                            </div>
                                            <div class="form-group">
                                                <small class="text-muted d-block mb-2">Periode Magang:</small>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="date" name="periode_start" class="form-control form-control-user mb-3 mb-md-0" placeholder="Tanggal Mulai">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="date" name="periode_end" class="form-control form-control-user" placeholder="Tanggal Selesai">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                    </form>

                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                      <div class="text-center">
                                        <small>
                                            Sudah punya akun?
                                            <a class="" href="{{ route('login') }}">Login disini</a>
                                        </small>
                                    </div>
                                    <div class="text-center">
                                        <small>
                                            Back to Home?
                                            <a class="" href="{{ route('welcome') }}">Click Here.</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <script>
document.getElementById('role').addEventListener('change', function() {
    let role = this.value;
    document.getElementById('mentorFields').style.display = role === 'mentor' ? 'block' : 'none';
    document.getElementById('pesertaFields').style.display = role === 'peserta' ? 'block' : 'none';
});
</script>

    @session('success')
    <script>
    Swal.fire({
        title: "Berhasil",
        text: "{{ session('success') }}",
        icon: "success"
    });
    </script>
    @endsession

    @session('error')
    <script>
    Swal.fire({
        title: "Gagal",
        text: "{{ session('error') }}",
        icon: "error"
    });
    </script>
    @endsession

</body>

</html>