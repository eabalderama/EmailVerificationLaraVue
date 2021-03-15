@extends('welcome')

@section('content')
<div id="app" class="d-flex flex-column align-items-center mt-5">
    <h3 class="fw-bolder mb-4">Verify Email</h3>
    <img src="{{ asset('img/email.png') }}" alt="">
    <b>A verification email has been sent</b>
    <p class="text-center" >Please click on the link in the email sent to <span class="fw-bold">{{$email}}</span></p>
    <p class="w-75 border-top text-center pb-4" style="border-color: #eeeeee">For improved security, your verification link will expire after 6 hours. If it has expired, you will be directed to this page where you can resend email.</p>
    <form @submit="submitCode" action="{{ route('verify') }}" method="POST" id="code_form" autocomplete="off" style="width: 400px">
        @csrf
        <input type="text" class="form-control text-center fw-bold fs-4 text-uppercase" name="code" v-model="code" minlength="4" maxlength="4">
        <div class="d-flex flex-row justify-content-between mt-4">
            <button class="rounded-pill px-4 py-2" style="color: #663399" @click="resendCode">RESEND NOW</button>
            <button class="rounded-pill px-4 py-2" style="color: white; background-color: #663399" @click="submitCode">SUBMIT CODE</button>
        </div>
    </form>
    <p class="mt-5">Not your correct address? <a @click="updateEmail" href="#"><u>Update your email address</u></a></p>
</div>

<script>
    let app = new Vue({
        el: '#app',
        data: {
            code: '',
        },
        methods: {
            submitCode(e){
                e.preventDefault()
                if(this.code.length == 4){
                    let form = document.getElementById('code_form')
                    form.method = "post"
                    form.submit()
                }else{
                    alert('invalid code')
                }
                console.log(this.code)
            },
            resendCode(e) {
            },
            updateEmail(){},
        },
        mounted() {
            console.log("Verification code is {{ $code }}")
            let error = "{{ $errors->first() }}"
            if(error.length > 0 ){
                alert(error)
            }
        }
    })
</script>
@endsection