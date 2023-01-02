@if(session('success'))
    <div class="alert alert-custom alert-success">
        <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
        <div class="alert-text">{{ session('success') }}</div>
    </div>
@endif
