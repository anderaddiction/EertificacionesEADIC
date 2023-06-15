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
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name', $concept->name) }}">
                    <span id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="status">{{ __('Status') }}</label>
                    <select class="custom-select form-control-border" id="status" name="status">
                        <option value="">{{ __('Select an option') }}</option>
                        <option value="1" {{ old('status', $concept->status) == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                        <option value="0" {{ old('status', $concept->status) == '0' ? 'selected' : '' }}>{{ __('Inactive') }}</option>

                    </select>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-sm-12">

                <div class="form-group">
                    <label>{{ __('Note') }}</label>
                    <textarea class="form-control form-control-border" rows="3" id="note" name="note" placeholder="{{ ('Enter a little description') }}">{{ old('note', $concept->note) }}</textarea>
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
