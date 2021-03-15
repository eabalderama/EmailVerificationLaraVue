@extends('welcome')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center mt-5 mx-auto" style="width: 400px">
    <h3>Login</h3>
    <form class="d-flex flex-wrap flex-column w-100" autocomplete="off">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" v-model="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" v-model="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>   
</div>
@endsection