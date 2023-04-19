@extends('admin.admin.master')
@section('body')

<div class="container">
    <div class="row">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1 class="text-center py-3">Doctor List</h1>
                    <div class="table-responsive">
                        <table class="table table-striped" style="background-color: #b2b4bf;">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Doctor Name</th>
                                    <th>Phone</th>
                                    <th>Speciality</th>
                                    <th>Room No</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1
                                @endphp


                                @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->speciality }}</td>
                                    <td>{{ $doctor->room }}</td>
                                    <td><img src="doctor_image/{{ $doctor->image }}"></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ url('update/doctor', $doctor->id) }}" class="badge bg-success" disabled>Update</a>
                                            <a href="{{ url('delete/doctor', $doctor->id) }}" class="badge bg-danger ml-2">Delete</a>
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