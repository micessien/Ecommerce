@extends('master')

@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table">
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>$ {{$total}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$ 0</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>$ 10</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>$ {{$total+10}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <form action="/action_page.php">
                <div class="form-group">
                    <textarea placeholder="Enter your address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Payment method:</label> <br>
                    <input type="radio" name="payment"> <span>online payment</span> <br>
                    <input type="radio" name="payment"> <span>EMI payment</span><br>
                    <input type="radio" name="payment"> <span>Payment on delivery</span><br>
                </div>
                <button type="submit" class="btn btn-default">Order Now</button>
            </form>
        </div>
    </div>
</div>
@endsection