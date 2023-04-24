@extends('admin.admin.master')
@section('body')
<div class="container">
    <div class="row">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-center py-3">Send Email Form</h1>
                    <form action="{{ url('sendEmail', $data->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">Greeting</label>
                            <input type="text" name="greeting" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">Body</label>
                            <input type="text" name="body" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">Action Text</label>
                            <input type="text" name="actiontext" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">Action Url</label>
                            <input type="text" name="actionurl" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">End Part</label>
                            <input type="text" name="endpart" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
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