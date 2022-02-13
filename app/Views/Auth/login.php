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
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <div id="result_wrapper" class="d-none alert alert-danger alert-dismissible fade show" role="alert">
                                    <div id="result_error"></div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <label for="nis">Email</label>
                                        <input type="text" class="form-control form-control-user" value="<?= set_value('email') ?>" name="email" id="email" placeholder="Email">
                                        <small id="error_email" class="d-none text-danger pl-3"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <small id="error_password" class="d-none text-danger pl-3"></small>
                                    </div>
                                    <button type="button" style="cursor: default;" id="login_submit" class="btn btn-danger btn-user btn-block">
                                        <span id="spinner_login" class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <b>Login</b>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
    //button login
    $(document).ready(function() {
        $("#login_submit").click(function() {
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                type: "POST",
                data: JSON.stringify({
                    email,
                    password,
                    type: 'web'
                }),
                contentType: "application/json; charset=utf-8",
                url: "<?= site_url('api/login'); ?>",
                beforeSend: function() {
                    $("#spinner_login").removeClass("d-none");
                },
                complete: function() {
                    $("#spinner_login").addClass("d-none");
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.email) {
                            $('#error_email').removeClass('d-none')
                            $('#error_email').html(response.error.email)
                        } else {
                            $('#error_email').addClass('d-none')
                        }
                        if (response.error.password) {
                            $('#error_password').removeClass('d-none')
                            $('#error_password').html(response.error.password)
                        } else {
                            $('#error_password').addClass('d-none')
                        }
                        if (response.error.result) {
                            $('#result_wrapper').removeClass('d-none')
                            $('#result_error').html(response.error.result)
                        } else {
                            $('#result_wrapper').addClass('d-none')
                        }
                    } else {
                        window.location.href = '/admin';
                    }
                }
            });
        });
    });
</script>