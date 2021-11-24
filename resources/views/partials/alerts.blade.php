@if (session('success'))
<div class="alert alert-success" role="alert"><i class="fas fa-check-circle-fill"></i>
    {{ session('success') }}
  </div>
@endif

@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
  </div>
@endif

@if (session('status'))
<div class="alert alert-succes" role="alert">
    {{ session('status') }}
  </div>
@endif