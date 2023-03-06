@csrf
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('Register Role Form') }}</h3>
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
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="{{ __('Role') }}" value="{{ old('name', $role->name) }}">
                    <span id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="display_name">{{ __('Display Name') }}</label>
                    <input type="text" class="form-control form-control-border" id="display_name" name="display_name" placeholder="{{ __('Display Name') }}"
                        value="{{ old('display_name', $role->display_name) }}">
                    <span id="display_name-error" class="error invalid-feedback">{{ $errors->first('display_name') }}</span>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-sm-12">

                <div class="form-group">
                    <label>{{ __('Note') }}</label>
                    <textarea class="form-control form-control-border" rows="3" id="note" name="note" placeholder="{{ ('Enter a little description') }}">{{ old('note', $role->note) }}</textarea>
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
