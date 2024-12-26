@extends('user.user_layout')
@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>&nbsp;||&nbsp;
                    <a href="{{ route('admin.updates') }}">{{ __('Updates') }}</a>
                </div>

  

                <div class="card-body">

                    @if (session('success'))

                        <div class="alert alert-success" role="alert">

                            {{ session('success') }}

                        </div>

                    @endif

  

                    You are Logged In

                </div>

            </div>

        </div>

    </div>

</div>


@endsection