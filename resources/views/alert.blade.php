@if(session()->has('pesan'))
<div class="alert alert-success">
    {{session()->get('pesan')}}
</div>
@endif

@if(session()->has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session("success") }}',
    });
</script>
@endif