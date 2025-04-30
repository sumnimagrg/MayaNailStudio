@extends('admin.inc.main')
@section('container')

<div class="addEmp">
    <h2>Service Management</h2>
    <button class="btn-open" onclick="openModal()">Add Service</button>

    <table>
        <thead>
            <tr>
                <th>S.N</th>
                <th>Service Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Duration</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td style="color: black">{{ $loop->iteration }}</td>
                <td style="color: black">{{ $service->service_name }}</td>
                <td style="color: black">{{ $service->service_desc }}</td>
                <td style="color: black">{{ $service->service_category}}</td>
                <td style="color: black">{{ $service->duration }}hrs </td>
                <td> <img src="{{ asset('uploads/' . $service->image)}}" alt="" width="50px" height="50px"> </td>
                <td style="color: black">NPR {{ number_format($service->price, 2) }}</td>
                <td>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-footer">
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">Edit</a>
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

<!-- Add Service Modal -->
<div class="modalEmp" id="employeeModal">
    <div class="modalEmp-content">
        <h3>Add Service</h3>
        <form enctype="multipart/form-data" method="POST" action="{{ route('services.store') }}">
            @csrf
            <div class="form-group">
                {{-- <label for="floatingInputValue">Service Name</label>  --}}
                <input type="text" placeholder="Service Name" name="service_name" required>
            </div>
            <div class="form-group">
                {{-- <label for="floatingInputValue">Service Description</label>  --}}
                <textarea placeholder="Service Description" name="service_desc" required></textarea>
            </div>
            <div class="form-group">
                <label for="service_category">Service Category</label>
                <select name="service_category" required>
                    <option value="">Select Category</option>
                    @foreach($serviceCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{-- <label for="floatingInputValue">Duration</label>  --}}
                <input type="number" placeholder="Duration (hrs)" name="duration" required>
            </div>

            <div class="form-group">
                {{-- <label for="image">Service Image</label> --}}
                <input type="file" name="image" id="image">
            </div>
            
            <div class="form-group">
                {{-- <label for="floatingInputValue">Price</label>  --}}
                <input type="number" placeholder="Price (NPR)" name="price" required>
            </div>

            <button type="submit" class="btn">Add Service</button>
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
