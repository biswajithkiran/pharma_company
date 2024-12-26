@extends('user.user_layout')
@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>&nbsp;||&nbsp;
                    <a href="{{ route('user.updates') }}">{{ __('Updates') }}</a>&nbsp;||&nbsp;
                    <a href="{{ route('updates.create') }}">{{ __('Create Update') }}</a>
                </div>

  

                <div class="card-body">

                    @if (session('success'))

                        <div class="alert alert-success" role="alert">

                            {{ session('success') }}

                        </div>

                    @endif
                    <form method="POST" action="{{ route('updates.save') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}"  autocomplete="date" placeholder="Select a date">

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Report Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" >

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="description" rows="4" >{{ old('title') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Upload File') }}</label>
                            <div class="col-md-6">
                                <input type="file" id="file" class="form-control @error('file') is-invalid @enderror" name="file" >
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>                                
                            </div>
                        </div>

                    </form>          

                </div>

            </div>

        </div>

    </div>

</div>


@endsection
@section('scripts')
<script>
    $(function() {
        $("#date").datepicker({
            dateFormat: "yy-mm-dd",//"mm/dd/yy", // Specify date format
            changeMonth: true,      // Add dropdown for month selection
            changeYear: true,       // Add dropdown for year selection
            yearRange: "1900:2100", // Set range of years
        });
    });
</script>
@endsection