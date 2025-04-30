@extends('admin.inc.main')
@section('container')

    <div class="addEmp">
        <h2>Service Category Management</h2>
        <button class="btn-open" onclick="openModal()">Add Service Category</button>

        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td style="color: black">{{ $loop->iteration }}</td>
                    <td style="color: black">{{ $category->category_name }}</td>
                    <td style="color: black">{{ $category->category_desc }}</td>
                    <td style="color: black">{{ $category->category_img }}</td>
                    <td>
                        <form action="{{ route('serviceCategory.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('serviceCategory.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Service Category Modal -->
    <div class="modalEmp" id="employeeModal">
        <div class="modalEmp-content">
            <h3>Add Service Category</h3>
            <form method="POST" action="{{ route('serviceCategory.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" placeholder="Category Name" name="category_name" required>
                </div>
                <div class="form-group">
                    <label for="category_desc">Category Description</label>
                    <input type="text" placeholder="Category Description" name="category_desc" required>
                </div>
                <div class="form-group">
                    <label for="category_img">Service Category Image</label>
                    <input type="file" name="category_img" id="category_img">
                </div>
                <button type="submit" class="btn">Add Category</button>
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
