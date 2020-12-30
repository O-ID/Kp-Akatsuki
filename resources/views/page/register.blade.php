@if (Session::has('LoginAdmin'))
<h1>Registrasi Admin</h1>
<hr>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<form action="{{ url('/registerPost') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
        @error('email') {{ $errors->first('email') }} @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="alamat">Password Confirmation:</label>
        <input type="password" class="form-control" id="confirmation" name="confirmation">
    </div>
    <div class="form-group">
        <label for="alamat">Name:</label>
        <input type="text"  class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-md btn-primary">Submit</button>
        <button type="reset" class="btn btn-md btn-danger">Cancel</button>
    </div>
</form>
@else
<script>
    alert('Pastikan Anda Login Sebagai Admin Di halaman utama');
    history.go(-1);
</script>
@endif

