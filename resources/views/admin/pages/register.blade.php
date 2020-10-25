<style>
    .login-box {
        margin-top: -10rem;
        padding: 5px;
    }

    .login-card-body {
        padding: 1.5rem 1.8rem 1.6rem;
    }

    .card,
    .card-body {
        border-radius: .25rem
    }

    .login-btn {
        padding-left: 2rem !important;
        ;
        padding-right: 1.5rem !important;
    }

    .content {
        overflow-x: hidden;
    }

    .form-group .control-label {
        text-align: left;
    }
</style>

<div class="login-page bg-40">
    <div class="login-box">
        <div class="login-logo mb-2">
            Register
        </div>
        <div class="card">
            <div class="card-body login-card-body shadow-100">
                <p class="login-box-msg mt-1 mb-1">Welcome to OhMyStock</p>

                <form id="register-form" method="POST" action="{{ admin_url('register') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                        <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username" placeholder="{{ trans('admin.username') }}" value="{{ old('username') }}" required autofocus>

                        <div class="form-control-position">
                            <i class="feather icon-user"></i>
                        </div>

                        <label for="email">{{ trans('admin.username') }}</label>

                        <div class="help-block with-errors"></div>
                        @if($errors->has('username'))
                        <span class="invalid-feedback text-danger" role="alert">
                            @foreach($errors->get('username') as $message)
                            <span class="control-label" for="inputError"><i class="feather icon-x-circle"></i> {{$message}}</span><br>
                            @endforeach
                        </span>
                        @endif
                    </fieldset>

                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                        <input minlength="5" maxlength="20" id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="{{ trans('admin.password') }}" required autocomplete="current-password">

                        <div class="form-control-position">
                            <i class="feather icon-lock"></i>
                        </div>
                        <label for="password">{{ trans('admin.password') }}</label>

                        <div class="help-block with-errors"></div>
                        @if($errors->has('password'))
                        <span class="invalid-feedback text-danger" role="alert">
                            @foreach($errors->get('password') as $message)
                            <span class="control-label" for="inputError"><i class="feather icon-x-circle"></i> {{$message}}</span><br>
                            @endforeach
                        </span>
                        @endif

                    </fieldset>

                    <a href="{{admin_url('auth/login')}}" class="btn btn-secondary float-left register-btn">{{ __('login.sign_in') }}</a>

                    <button type="submit" class="btn btn-primary float-right login-btn">

                        Register
                        &nbsp;
                        <i class="feather icon-arrow-right"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    Dcat.ready(function() {
        // ajax表单提交
        $('#register-form').form({
            validate: true,
            success: function(data) {
                if (!data.status) {
                    Dcat.error(data.message);

                    return false;
                }

                Dcat.success(data.message);

                location.href = data.redirect;

                return false;
            }
        });
    });
</script>
