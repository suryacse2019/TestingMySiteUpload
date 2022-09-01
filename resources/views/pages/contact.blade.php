
@extends('layouts.app')

@section('content')
<!-- <style>
  
.label-size{font-size: 18px;}
.input-size{font-size: 18px;}

</style> -->
<div class="container">

   <h2 class="text-center">The Contact Page</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                 @endif
                <div class="card-header">
                {{trans('messages.contactpage')}}
                </div>

                <div class="card-body" style="padding: 15px;">
                    <form class="table_contact-form1" action="{{ route('contact.store') }}" method="post" role="form" data-parsley-validate>
                      @csrf
                        <div class="msg_message_block_containt1 msg_message_block_wrapper1 msg_message_block_alert1">
                        <div class="msg_message_block2 alert-warning1 msg_message_block_rounded1">
                        </div></div>
                        <dl class="w-100">
                         
                          <label class="form-label">{{trans('messages.name')}}<em>*</em></label>
                          <input type="text" name="name" maxlength="60" class="form-control wow fadeInLeft" data-wow-delay="0.2s" placeholder="{{__('messages.contact.name')}}" required data-parsley-trigger="change" />
                         
                        </dl>

                        <dl class="w-100">
                         
                           <label class="form-label">{{trans('messages.email')}}<em>*</em></label>
                           <div class="fm_inp_position1">
                            <div class="container_wrapper1">
                             <span class="fm_inp_email1 ic_responsive_email1"></span>
                             <input type="email" name="email" maxlength="60" class="form-control wow fadeInLeft" placeholder="{{__('messages.contact.email')}}" required data-parsley-trigger="change" />
                            </div>
                           </div>
                         
                         <dd class="w-100">
                          <label class="form-label">{{trans('messages.number')}}<em>*</em></label>
                          <input id="val_num_phone1" type="text" name="number"  class="form-control wow fadeInLeft" data-wow-delay="0.4s" placeholder="{{__('messages.contact.number')}}" required data-parsley-type="digits" data-parsley-trigger="change" />
                          <input type="hidden" name="dialingcodescon1" id="val_int_country_dialing_codes1" />
                         </dd>
                         <dd class="bodyarea1 w-100">
                          <label class="form-label">{{trans('messages.address')}}<em>*</em></label>
                           <textarea rows="3" name="address" data-parsley-minlength="20" data-parsley-maxlength="2270" class="form-control wow fadeInLeft" data-wow-delay="0.6s" placeholder="{{__('messages.contact.address')}}" required data-parsley-trigger="change"></textarea>
                         </dd>
                        </dl>
                        <dl>
                        </dl>
                        <dl class="w-100">
                        <dd class="cta_contact-form1">
                        <button type="submit"  class=" btn btn-secondary btn-lg btn-block text-white">Submit</button>
                        </dd>
                        </dl>
                        <dl>
                        </dl>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection