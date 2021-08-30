@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-10">
        <div class="col-sm-8 mx-auto">
        <div class="card mt-5">
            <div class="card-header">STK push</div>
            <div id="c2b_response"></div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="amount">Phone number</label>
                        <input type="number" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="account">Account</label>
                        <input type="text" name="account" id="account" class="form-control">
                    </div>
                    <button class="btn btn-primary" id="stkpush">Simulate payment</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    document.getElementById('stkpush').addEventListener('click', (event) =>{
        event.preventDefault()

        const requestBody = {
            account: document.getElementById('account').value,
            amount: document.getElementById('amount').value,
            phone: document.getElementById('phone').value
        }

        axios.post('/stkpush', requestBody)
        .then((response) => {
            if(response.data.ResponseDescription){
            document.getElementById('c2b_response').innerHTML = response.data.ResponseDescription
        } else{
            document.getElementById('c2b_response').innerHTML = response.data.errorMessage
        }
        })
        .catch((error) => {
            console.log(error);
        })
    });
</script>
@endsection
