@extends('admin.inc.main')
@section('container')

    <div class="editServices">
        <h2>Service Management</h2>
    </div>

    <div class="modalEdit" >
        <div class="editEmp-content">
            <h3>Edit Service</h3>
            <form enctype="multipart/form-data" method="POST" action="{{ route('services.update', $services->id) }}">
                @csrf
                @method('PUT')
                <div class="form-groups">
                    <label for="floatingInputValue">Service Name</label>
                    <input value="{{ $services->service_name }}" type="text" placeholder="Service Name" name="service_name" required>
                </div>
                <div class="form-groups">
                    <label for="floatingInputValue">Service Description</label>
                    <textarea placeholder="Service Description" name="service_desc" required>{{ $services->service_desc }}</textarea>
                </div>
                <div class="form-groups">
                    <label for="service_category">Service Category</label>
                    <select name="service_category" required>
                        <option value="">Select Category</option>
                        @foreach($serviceCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-groups">
                    <label for="floatingInputValue">Duration</label>
                    <input value="{{ $services->duration }}" type="number" placeholder="Duration (minutes)" name="duration" required>
                </div>

                <div class="form-groups">
                    <label for="image">Service Image</label>
                    <input type="file" name="image" id="image">
                    <img id="previewImage" src="{{asset('uploads/' . $services->image)}}" width="50px" height="50px">
                </div>


                <div class="form-groups">
                    <label for="floatingInputValue">Price</label>
                    <input value="{{ $services->price }}" type="number" placeholder="Price (NPR)" name="price" required>
                </div>

                <button type="submit" class="btn">Update Service</button>
                <button type="button" class="btn" onclick="goBack()">Back</button>
            </form>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "{{ route('services.create') }}";
        }
    </script>

@endsection
