@extends('site.app')
@section('title', 'Order Completed')
@section('content')
<br>
<br>
<br>
<br>
<div class="ps-section__header mb-50">
        <h3 class="ps-section__title1" data-mask="Order"></h3>
</div>
<div class="ps-section__header mb-50">
        <h3 class="ps-section__title2" data-mask="Completed"></h3>
</div>
    <section class="section-content padding-y border-top">
        <div class="container">
            <div class="row">
                <main class="col-sm-12">
                    <h2 class="alert alert-success">Your order placed successfully. Your order number is : {{ $order->order_number }}.</h2></main>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
@stop