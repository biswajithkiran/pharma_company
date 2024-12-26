@extends('admin.admin_layout')
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
                    <div class="row">
                    <h3>Updates</h3>            
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>File</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($updates as $update)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $update->user }}</td>
                            <td>{{ $update->date }}</td>
                            <td>{{ $update->title }}</td>
                            <td>@if ($update->file) 
                            <a href="{{ asset('storage/' . $update->file) }}" target="_blank" >View File</a>
                            @else
                            N/A
                            @endif
                            </td>
                            <td>{{ $update->created_at }}</td>
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                    </div>          

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