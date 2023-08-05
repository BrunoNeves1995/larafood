@if ($errors->any())
{{-- <div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
  </div> --}}
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
  </div>
@endif
