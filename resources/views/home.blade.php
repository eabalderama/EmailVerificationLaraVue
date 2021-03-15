@extends('welcome')

@section('content')
<div id="app" class="d-flex flex-column align-items-center mt-5">
<h3>Welcome {{$name}}</h3>
<h6>{{$email}}</h6>
</div>

<script>
    let app = new Vue({
        el: '#app',
        props: {
            name: String,
            email: String,
        }
    })
</script>
@endsection