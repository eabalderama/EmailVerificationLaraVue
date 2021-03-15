@extends('welcome')

@section('content')
<div id="app">
    <div class="d-flex flex-column align-items-center mt-5 mx-auto" style="width: 400px">
        <h3>Apply</h3>
        <form @submit="onSubmit" action="{{ route('submit') }}" id="apply_form" class="d-flex flex-wrap flex-column" style="width: 100%">
            @csrf
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" v-model="fname" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" v-model="lname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" v-model="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" v-model="password" required>
            </div>
            <p :class="[check_pass ? 'visually-hidden' : '', 'fs-6 text-danger']">Password must be at least 8 characters, and contain digits from 0-9 and a special characters !@#$%^&*?</p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>
    let app = new Vue({
        el: '#app',
        data: {
            fname: '',
            lname: '',
            email: '',
            password: '',
            check_pass: true,
        },
        methods: {
            onSubmit(e) {
                e.preventDefault()
                const regex = /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*?]).*$/
                if(regex.test(this.password)){
                    this.check_pass = true
                    this.apply = false
                    let form = document.getElementById('apply_form')
                    form.method = "get"
                    form.submit()
                }else{
                    this.check_pass = false
                }
            }
        }
    })
</script>
@endsection