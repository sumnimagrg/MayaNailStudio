{{-- this is email body not something that user can view --}}
<div>
    <h2>New Message From User</h2>
    <p><strong>Name:</strong>{{ $data['name']
    }}</p>
    <p><strong>Email:</strong>{{ $data['email']
    }}</p>
    <p><strong>Phone:</strong>{{ $data['phone']
    }}</p>
    <p><strong>Message:</strong>{{ $data['message']
    }}</p>
</div>
