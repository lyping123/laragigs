@if (session()->has('message'))
<div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Message Box</h4>
    <p>{{ session('message') }}</p>
    
</div>
@endif