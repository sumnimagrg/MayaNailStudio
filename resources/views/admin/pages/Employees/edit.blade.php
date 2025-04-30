@extends('admin.inc.main')
@section('container')

    <div class="editEmp" >
        <h2>Employee Management</h2>
    </div>

    <div class="modalEdit" >
        <div class="editEmp-content">
            <h3>Edit Employee</h3> <br>
            <form action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-groups">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullName" value="{{ $employee->fullName }}" required>
                </div>
               
                <div class="form-groups">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="text" class="form-control" name="rating" value="{{ $employee->rating }}" required>
                </div>
                <div class="form-groups">
                    <label for="floatingInputValue">Bio</label> 
                    <input value="{{$employee->bio}}" type="text" placeholder="Bio" name="bio" id="bio" required>
                </div>
                <div class="form-groups">
                    <label for="image">Technician Profile Image</label>
                    <input type="file" name="image" id="image">
                    <img id="previewImage" src="{{asset('uploads/' . $employee->image)}}" width="50px" height="50px">
                </div>

                <button type="submit" class="btn">Update Employee</button>
                <button type="button" class="btn" onclick="goBack()">Back</button>
            </form>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "{{ route('employee.create') }}"; 
        }
    </script>
    

@endsection
