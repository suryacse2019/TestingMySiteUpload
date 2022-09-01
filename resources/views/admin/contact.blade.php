
@extends('layouts.app')

@section('content')
<div class="container">
   <h1 class="text-center">The Contact Page</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{__('messages.contactpage')}}
                </div>

                <div class="card-body">
                    <form id="myform" method="post" action="{{ route('contact.store') }}">
                      @csrf
                        <div class="col-sm-12">
                            <div class="row">
                              <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">{{__('messages.name')}}</label>
                                <input type="text"   class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="{{__('messages.contact.name')}}">
                                
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="exampleInputPassword1">{{__('messages.number')}}</label>
                                <input type="number"  class="form-control" name="number" id="number"  placeholder="{{__('messages.contact.number')}}">
                              </div>
                              
                            </div>
                            <div class="row">
                                 <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">{{__('messages.email')}}

                                </label>
                                <input type="text"  class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="{{__('messages.contact.email')}}">
                              </div>

                               <div class="form-group col-sm-6">
                                <label for="exampleFormControlTextarea1">{{__('messages.address')}}</label>
                                <textarea class="form-control"  id="textarea" name="textarea" placeholder="{{__('messages.contact.address')}}" rows="3"></textarea>
                              </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                  
                                      <input type="submit" class="form-control btn btn-primary w-25" name="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>  
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript">

$(document).ready(function () {
$('#myform').validate({ 
 
   rules: {
    email: {
      required: true,
      email: true
    },
    name:{
      required:true,
    },
    number:{
        required:true,
    },
    textarea:{
        required:true,
    },

  }
});
 
});


</script>

@endpush