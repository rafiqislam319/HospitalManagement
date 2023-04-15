@extends('frontend.master')

@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center pt-4">My Appointment Page</h1>


            <div class="row justify-content-center mt-5">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session()->get('message') }}
                </div>
                @endif
            </div>

            <div class="table-responsive pt-4 pb-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cancel Appointment</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointInfos as $appointInfo)
                        <tr>
                            <td>{{ $appointInfo->doctor }}</td>
                            <td>{{ $appointInfo->date }}</td>
                            <td>{{ $appointInfo->message }}</td>
                            <td><span class="badge bg-warning text-dark">{{ $appointInfo->status }}</span></td>
                            <td><a href="{{ url('cancel/appointment', $appointInfo->id) }}" class="badge bg-danger">Cancel</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection