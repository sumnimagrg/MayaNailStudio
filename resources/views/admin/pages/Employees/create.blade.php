@extends('admin.inc.main')
@section('container')

    <div class="addEmp">
        <h2>Employee Management</h2>
        <button class="btn-open" onclick="openModal()">Add Technician</button>

        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    
                    <th>Rating</th>
                    <th>Bio</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td style="color: black" >{{ $loop->iteration }}</td>
                    <td style="color: black">{{$employee->fullName}}</td>

                    <td style="color: black">{{$employee->rating}}</td>
                    <td style="color: black">{{$employee->bio}}</td>
                    <td> <img src="{{ asset('uploads/' . $employee->image)}}" alt="" width="50px" height="50px"> </td>
                    <td>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                                    <div class="modal-footer">
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')                                           
                                            
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
            </tbody>
        </table>
    </div>

    <!-- Add Employee Modal -->
    <div class="modalEmp" id="employeeModal">
        <div class="modalEmp-content">
            <h3>Add Technician</h3>
            <form enctype="multipart/form-data" method="POST" action="{{ route('employee.store')}}">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Full Name" name="fullName" required>
                </div>
             
                <div class="form-group">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="text" class="form-control" name="rating" required>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Bio" name="bio" required>
                </div>
                <div class="form-group">
                    <label for="image">Technician Profile Image</label>
                    <input type="file" name="image" id="image">
                </div>

                <button type="submit" class="btn">Add Technician</button>
                <button type="button" class="close-btn" onclick="closeModal()">Close</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("employeeModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("employeeModal").style.display = "none";
        }
    </script>
 @endsection
