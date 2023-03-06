@csrf
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if (session()->has('Success'))
        <div class="alert bg-teal alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h6><i class="icon fas fa-check"></i> Feliciades! {{ session('Success') }}</h6>
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="{{ __('Role') }}" value="{{ old('name', $user->name) }}">
                    <span id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" class="form-control form-control-border" id="email" name="email" placeholder="{{ __('Display Name') }}"
                        value="{{ old('email', $user->email) }}">
                    <span id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="email">{{ __('Password') }}</label>
                    <input type="password" class="form-control form-control-border" id="password" name="password"
                        placeholder="{{ __('Password') }}" value="{{ old('password', $user->password) }}">
                    <span id="password-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="password_confirmation">{{ __('Password Confirmation') }}</label>
                    <input type="password" name="password_confirmation"
                   class="form-control form-control-border @error('password_confirmation') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                    <span id="password_confirmation-error" class="error invalid-feedback"></span>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label for="role_id">{{ __('Roles') }}</label>
                <select class="select2 custom-select form-control-border" id="role_id" name="role_id[]" multiple="multiple" data-placeholder="{{ __('Select a role') }}"
                    style="width: 100%;">
                    @foreach ($roles as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="button" class="btn btn-default float-right">Cancel</button>
        <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
    </div>
</div>
<!-- /.card -->
