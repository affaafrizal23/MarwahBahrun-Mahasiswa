@extends('layout/template')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto mt-5">
        <h1>LOGIN</h1>
        <form action="{{ url('login/cek') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="uname">USERNAME</label>
                <input type="text" name="uname" class="form-control" value="{{ Session::get('uname') }}">
            </div>
            <div class="mb-3">
                <label for="paswd">PASSWORD</label>
                <input type="password" name="paswd" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button class="btn btn-primary" name="submit" type="submit">LOGIN</button>
            </div>
        </form>
    </div>
@endsection
