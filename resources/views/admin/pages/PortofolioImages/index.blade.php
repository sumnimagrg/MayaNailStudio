@extends('admin.inc.main')
@section('container')

    <div class="addEmp">
        <h2>Employee Management</h2>
        <button class="btn-open" onclick="openModal()">Add Technician Work Image</button>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $index => $image)

                <tr>
                    <td style="color: black;">{{ $index + 1 }}</td>
                    <td style="color: black;">{{ $image->employee->fullName }}</td>
                    <td>
                        <img src="{{ asset('uploads/' . $image->image_path) }}" alt="Work Image" width="70" height="70">
                    </td>
                    <td>
                        <form action="{{ route('portofolioImages.destroy', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>


    <!-- Add Employee Work Image Modal -->
    <div class="modalEmp" id="employeeModal">
        <div class="modalEmp-content">
            <h3>Add Technician Work Image</h3>
            <form action="{{ route('portofolioImages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="employee">Select Employee:</label>
                <select name="employee_id"required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" style="color: black;">{{ $employee->fullName }}</option>
                    @endforeach
                </select>
                
                <br>
                
            
                <label for="images">Upload Images:</label>
                <input type="file" name="images[]" multiple required>
            
                <button type="submit" class="btn">Add Technician Work</button>
            </form>
            

                
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
