@extends('admin.inc.main')
@section('container')

    <div class="editServiceCategory" >
        <h2>Service Category Management</h2>
    </div>

  <div class="modalCategory" id="categoryModal">
    <div class="modalCategory-content">
        <h3>Edit Service Category</h3>
        <form enctype="multipart/form-data" method="POST" action="{{ route('serviceCategory.update', $serviceCategory->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input value="{{$serviceCategory->category_name}}" type="text" placeholder="Category Name" name="category_name" required>
            </div>
            <div class="form-group">
                <label for="category_desc">Category Description</label>
                {{-- <textarea value="{{$serviceCategory->category_desc}}" placeholder="Category Description" name="category_desc"></textarea> --}}
                <input value="{{$serviceCategory->category_desc}}" type="text" placeholder="Category Description" name="category_desc" required>
            </div>

            <div class="form-groups">
                <label for="category_img">Service Category Image</label>
                <input type="file" name="category_img" id="category_img">
                <img id="previewImage" src="{{asset('uploads/' . $serviceCategory->category_img)}}" width="50px" height="50px">
            </div>

            <button type="submit" class="btn">Update Category</button>
            <button type="button" class="btn" onclick="goBack()">Back</button>
        </form>
    </div>
</div>

<script>
    function goBack() {
        window.location.href = "{{ route('serviceCategory.create') }}"; 
    }
</script>


@endsection