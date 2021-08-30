@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-8-mx-auto">
            <div class="card">
                <div class="card-header">
                    Obtain Access Token
                </div>
                <div class="card-body">
                    <h4 id="access-token"></h4>
                    <button id="access_token" class="btn btn-primary">Request Access Token</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Register URLs</div>
            <div class="card-body">
                <div id="response"></div>
                <button id="registerURLS" class="btn btn-primary">Register URLs</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Simulate Transcations</div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="account">Account</label>
                        <input type="text" name="account" id="account" class="form-control">
                    </div>
                    <button class="btn btn-primary" id="simulate">Simulate payment</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
    <script>
         document.getElementById('registerURLS').addEventListener('click', (event) =>{
     event.preventDefault()

     axios.post('/register-urls', {})
     .then((response) => {
         console.log(response.data);
     })
     .catch((error) => {
         console.log(error);
     })
 });

    document.getElementById('access_token').addEventListener('click', (event) =>{
        event.preventDefault()

        axios.post('/get-token', {})
        .then((response) => {
            console.log(response.data);
            document.getElementById('access-token').innerHTML = response.data.access_token
        })
        .catch((error) => {
            console.log(error);
        })
    });
    document.getElementById('simulate').addEventListener('click', (event) =>{
    event.preventDefault()

    const requestBody = {
        account: document.getElementById('account').value,
        amount: document.getElementById('amount').value
    }
    axios.post('/simulate', requestBody)
    .then((response) => {
        console.log(response.data);
    })
    .catch((error) => {
        console.log(error);
    })
});
</script>
@endsection
