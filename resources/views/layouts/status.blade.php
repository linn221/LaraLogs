@if (session('status'))
    <div class=" alert alert-{{ session('status-color', 'success') }}">
        {{ session('status') }}
    </div>
@endif