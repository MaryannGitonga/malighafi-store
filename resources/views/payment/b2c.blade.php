@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-10">
        <div class="col-sm-8 mx-auto">
        <div class="card mt-5">
            <div class="card-header">B2C Transaction</div>
            <div id="b2c_response"></div>
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
                        <label for="occasion">Occasion</label>
                        <input type="text" name="occasion" id="occasion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" name="remarks" id="remarks" class="form-control">
                    </div>
                    <button class="btn btn-primary" id="b2csimulate">Simulate B2C</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    document.getElementById('b2csimulate').addEventListener('click', (event) =>{
    event.preventDefault()

    const requestBody = {

        amount: document.getElementById('amount').value,
        phone: document.getElementById('phone').value,
        occasion: document.getElementById('occasion').value,
        remarks: document.getElementById('remarks').value
    }

    axios.post('/b2ctransact', requestBody)
    .then((response) => {
        if(response.data.ResponseDescription){
        document.getElementById('b2c_response').innerHTML = response.data.ResponseDescription
    } else{
        document.getElementById('b2c_response').innerHTML = response.data.errorMessage
    }
    })
    .catch((error) => {
        console.log(error);
    })
});
</script>
@endsection
