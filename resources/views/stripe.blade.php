
@extends('layouts.app')

@section('content')

    
    
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .control-label{
            font-size: medium;
        }
        .hide{display:none!important}
        .show{display:block!important}
        .invisible{visibility:hidden}
        .text-hide{font:0/0 a;color:transparent;text-shadow:none};
    </style>

<div class="container">
  {{ LaravelLocalization::getCurrentLocaleName() }}
  {{ LaravelLocalization::getCurrentLocale() }}
  @php

echo __('abc.welcome');
echo Lang::get('messages.welcome');
  @endphp
    <h2 class="text-center">Stripe Payment Gateway</h2>
  
    <div class="row mt-2">
        <div class="col-md-3"></div>
        <div class="col-md-6 col-md-offset-3 border p-4 shadow-sm">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <!-- <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        
                    </div>  -->                   
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="pk_test_51KzxG0SDvyltGBb1fc3YPQXm1BLiBLWZvQoaCGtyls8N1NIBZSjBak73mVwKzVJnFpSUCbe38GZbw2PTuU6NObEN00K4fGnWz5"
                                                    id="payment-form" data-stripe-publishable-key="pk_test_51KzxG0SDvyltGBb1fc3YPQXm1BLiBLWZvQoaCGtyls8N1NIBZSjBak73mVwKzVJnFpSUCbe38GZbw2PTuU6NObEN00K4fGnWz5">
                        @csrf
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input 
                                   name="cardname" class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' name="cardnumber" class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' name="cvc" placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' name="month" placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' name="year" placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
  
                        <div class="row" style="padding: 0px;">
                            <div class="col-xs-12" style="padding: 0px;">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
         <div class="col-md-3"></div>
    </div>
      
</div>
  
</body>
@endsection
@push('script')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
    var stripe = Stripe('pk_test_51KzxG0SDvyltGBb1fc3YPQXm1BLiBLWZvQoaCGtyls8N1NIBZSjBak73mVwKzVJnFpSUCbe38GZbw2PTuU6NObEN00K4fGnWz5');

</script>
@endpush