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
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name', $country->name) }}">
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="name">{{ __('Phone Code') }}</label>
                    <input type="text" class="form-control form-control-border" id="phone_code" name="phone_code" placeholder="{{ __('Phone Code') }}"
                        value="{{ old('phone_code', $country->phone_code) }}">
                    <small class="text-danger">{{ $errors->first('phone_code') }}</small>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-sm-12">

                <div class="form-group">
                    <label>{{ __('Note') }}</label>
                    <textarea class="form-control form-control-border" rows="3" id="note" name="note" placeholder="{{ __('Enter a little description') }}">{{ old('note', $country->note) }}</textarea>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="button" class="btn btn-default float-right">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
    </div>
</div>
<!-- /.card -->
