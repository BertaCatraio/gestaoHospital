@extends('layout.admin.main')
@section('content')

        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="/login" class="form-signin">
						<div class="account-logo">
                            <a href="/login"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Nome ou Email do usuario</label>
                            <input type="text" autofocus="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Esquecel a sua passeword?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Tua tens nao tens uma conta? <a href="register.html">Registar agora</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
@endsection

