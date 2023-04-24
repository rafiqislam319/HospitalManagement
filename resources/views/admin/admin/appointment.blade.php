@extends('admin.admin.master')
@section('body')

<div class="container">
    <div class="row">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="text-center py-3">All Appointment</h1>
                    <div class="table-responsive">
                        <table class="table table-striped" style="background-color: #b2b4bf;">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Doctor Name</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th>Send Mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1
                                @endphp
                                @foreach ($appointmets as $appointmet )


                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $appointmet->name }}</td>
                                    <td>{{ $appointmet->email }}</td>
                                    <td>{{ $appointmet->phone }}</td>
                                    <td>{{ $appointmet->doctor }}</td>
                                    <td>{{ $appointmet->date }}</td>
                                    <td>{{ $appointmet->message }}</td>
                                    <td>{{ $appointmet->status }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ url('appointment/approve', $appointmet->id) }}" class="badge bg-success" disabled>Approve</a>
                                            <a href="{{ url('appointment/cancel', $appointmet->id) }}" class="badge bg-danger ml-2">Cancel</a>
                                            <a href="{{ url('email/view', $appointmet->id) }}" class="badge bg-warning ml-2">Send Mail</a>
                                        </div>
                                    </td>
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


<style>
    .form-control:focus {
        background-color: white;
    }
</style>

@endsection

<!DOCTYPE html>
<html lang=" en">

<head>
    <base href="/public">
</head>

<body>


</body>

</html>