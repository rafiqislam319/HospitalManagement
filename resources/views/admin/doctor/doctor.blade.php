@extends('admin.admin.master')
@section('body')
<div class="container">
    <div class="row">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-center py-3">Add Doctor</h1>
                    <form action="{{ url('save/doctor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">Doctor Name</label>
                            <input type="text" name="name" class="form-control" id="doctor-name" placeholder="Enter doctor name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="speciality" class="form-label">Speciality</label>
                            <select class="form-select" name="speciality" id="speciality" required>
                                <option selected disabled>Select a speciality</option>
                                <option value="family_physician">Family Physician</option>
                                <option value="cardiologist">Cardiologist</option>
                                <option value="medicine">Medicine</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="room-no" class="form-label">Room No</label>
                            <input type="text" name="room" class="form-control" id="room-no" placeholder="Enter room number" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="file" class="form-control" id="image" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
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