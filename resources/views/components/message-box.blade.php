
@if(session()->has("message"))
<script>
    alert("{{ session('message') }}");
</script>
@endif