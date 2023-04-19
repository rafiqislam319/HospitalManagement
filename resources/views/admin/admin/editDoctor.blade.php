@extends('admin.admin.master')
@section('body')
<div class="container">
    <div class="row">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-center py-3">Update Doctor</h1>
                    <form action="{{ route('update.doctor.data', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">Doctor Name</label>
                            <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" id="doctor-name" placeholder="Enter doctor name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" name="phone" value="{{ $doctor->phone }}" class="form-control" id="phone" placeholder="Enter phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="speciality" class="form-label">Speciality</label>
                            <select class="form-select" name="speciality" id="speciality" required>
                                <option selected disabled>Select a speciality</option>
                                @foreach($specialities as $speciality)
                                <option value="{{ $speciality }}" {{ $doctor->speciality == $speciality ? 'selected' : '' }}>{{ $speciality }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="room-no" class="form-label">Room No</label>
                            <input type="text" name="room" value="{{ $doctor->room }}" class="form-control" id="room-no" placeholder="Enter room number" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Old Image</label>
                            <img src="doctor_image/{{ $doctor->image }} " alt="" height="50px" width="50px">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="file" class="form-control" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
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