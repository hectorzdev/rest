@extends('layouts.order')

@section('content')
<style>
    
</style>
<div class="content mt-5 container">
    @if ($session == false)
    <div class="row justify-content-center">
    <div class="col-12">
            <h1 class="text-center book-service">Book a Service</h1>
    </div>
    <div class="col-12 col-md-6 zipcode-ebject mt-3">
        <input type="text" id="zipcode" onkeyup="loadZipcode(this.value)" placeholder="Enter zipcode for service offerings">
        <input type="hidden" id="style" value="Deep tissue">
        <input type="hidden" id="price" value="119">
        <input type="hidden" id="_token" value="{{csrf_token()}}">
        <div class="form-group" id="zipcode-result">
            <select multiple  class="form-control" id="selectZipcode" onchange="addZipcode(this.value)">
             
            </select>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <h4 class="text-white text-left">Choose massage style</h4>
        <div class="row mt-4">
            <div class="col-6 col-md-2">
                <div class="massage-style" data-style="Swedish"> 
                  <span>Swedish</span>   
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="massage-style active" data-style="Deep tissue">
                  <span>Deep tissue </span>   
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="massage-style" data-style="Sport">
                  <span>Sport</span>   
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="massage-style" data-style="Thai">
                  <span>Thai</span>   
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="massage-style" data-style="Shiatsu">
                  <span>Shiatsu</span>   
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="massage-style" data-style="Hot stone">
                  <span>Hot stone</span>   
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="massage-style" data-style="Lymphatic">
                  <span>Lymphatic</span>   
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="massage-style" data-style="Medical">
                  <span>Medical</span>   
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="massage-style" data-style="Aroma">
                  <span>Aroma</span>   
                </div>
            </div>
        </div>
    </div>
 
</div>

<div class="row justify-content-center mt-5">
    <div class="col-md-4 text-center">
        <div class="border-gold">
            <div class="price-card active start" data-price="119">
                <h4 class="price-ch basic">BASIC</h4>
                <div class="form-inline">
                    <h4 class="price">119</h4>
                </div>
                <div class="hr"></div>
                <div class="price-co">
                    Get expert service for <strong>60 minutes</strong> 
                </div>
                {{-- <span>Massage</span> --}}

                <div class="form-inline">
                    <a href="{{url('ordernow')}}" class="price-book-now">Book now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="border-gold">
            <div class="price-card medium" data-price="189">
                <h4 class="price-ch medium">MEDIUM</h4>
                <div class="form-inline">
                    <h4 class="price">189</h4>
                </div>
                <div class="hr"></div>
                <div class="price-co">
                    Get expert service for <strong>90 minutes</strong> 
                </div>
                {{-- <span>Massage</span> --}}

                <div class="form-inline">
                    <a href="{{url('ordernow')}}" class="price-book-now">Book now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="border-gold">
            <div class="price-card advanced" data-price="239">
                <h4 class="price-ch advanced">ADVANCED</h4>
                <div class="form-inline">
                    <h4 class="price">239</h4>
                </div>
                <div class="hr"></div>
                <div class="price-co">
                    Get expert service for <strong>120 minutes</strong> 
                </div>
                {{-- <span>Massage</span> --}}

                <div class="form-inline">
                    <a href="{{url('ordernow')}}" class="price-book-now">Book now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 text-center">
        <button type="button" class="next-step" onclick="nextStep()">Confirm and next <i class="fa fa-forward ml-2"></i></button>
    </div>
</div>
    @else
        @if ($order->order_status == 0)
        <div class="row justify-content-center">
            <div class="col-12">
                    <h1 class="text-center book-service">Book a Service</h1>
            </div>
            <div class="col-12 col-md-6 zipcode-ebject mt-3">
                <input type="text" id="zipcode" onkeyup="loadZipcode(this.value)" value="{{$order->zipcode}}" placeholder="Enter zipcode for service offerings">
                <input type="hidden" id="style" value="{{$order->style}}">
                <input type="hidden" id="_token" value="{{csrf_token()}}">
                <div class="form-group" id="zipcode-result">
                    <select multiple  class="form-control" id="selectZipcode" onchange="addZipcode(this.value)">
                    
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <h4 class="text-white text-left">Choose massage style</h4>
                <div class="row mt-4">
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Swedish' ? 'active' : ''}}" data-style="Swedish"> 
                        <span>Swedish</span>   
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Deep tissue' ? 'active' : ''}}" data-style="Deep tissue">
                        <span>Deep tissue </span>   
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Sport' ? 'active' : ''}}" data-style="Sport">
                        <span>Sport</span>   
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Thai' ? 'active' : ''}}"  data-style="Thai">
                        <span>Thai</span>   
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Shiatsu' ? 'active' : ''}}" data-style="Shiatsu">
                        <span>Shiatsu</span>   
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Hot stone' ? 'active' : ''}}" data-style="Hot stone">
                        <span>Hot stone</span>   
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Lymphatic' ? 'active' : ''}}" data-style="Lymphatic">
                        <span>Lymphatic</span>   
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Medical' ? 'active' : ''}}" data-style="Medical">
                        <span>Medical</span>   
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="massage-style {{$order->style == 'Aroma' ? 'active' : ''}}" data-style="Aroma">
                        <span>Aroma</span>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 text-center">
                <button type="button" class="next-step" onclick="nextStep()">Confirm and next <i class="fa fa-forward ml-2"></i></button>
            </div>
        </div>
        @elseif($order->order_status == 1)
        <div class="row justify-content-center">
            <div class="col-12">
                    <h1 class="text-center book-service">Your infomation</h1>
            </div>
            
        </div>
        <form id="orderForm" class="row justify-content-center">
            @csrf
            @method('PUT')
            <input type="hidden" id="order_id" value="{{$order->id}}" >
            <div class="col-12 col-md-7 order-input-group mt-3">
                <label for="">Your fullname</label>
                <input type="text" class="order-input" value="{{$order->fullname}}" name="fullname" required>
            </div>
            <div class="col-12 col-md-7 order-input-group mt-3">
                <label for="">Your addess</label>
                <input type="text" class="order-input" value="{{$order->address}}"  name="address" required>
            </div>
            <div class="col-12 col-md-7 order-input-group mt-3">
                <label for="">Your phone</label>
                <input type="text" class="order-input"  value="{{$order->phone}}"  name="phone" required>
            </div>
            <div class="col-12 col-md-7 order-input-group mt-3">
                <label for="">Your phone</label>
                <input type="text" class="order-input"  value="{{$order->email}}"  name="phone" required>
            </div>
            <div class="col-md-7 text-center">
                <button type="submit" class="next-step" >Confirm and next <i class="fa fa-forward ml-2"></i></button>
            </div>
        </form>
        <div class="modal fade" id="policyModal"  data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="policyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content" style="border-radius: 0">
                <div class="modal-body p-5">
                  <h2 class="text-center"><strong>Policy Notification</strong> </h2>
                  <p class="text-center">We appreciate that you've chosen us for your massage and bodywork needs. To provide the best service possible to our clients
                    we have implemented the following policies.
                  </p>
                  <div class="mt-4 text-left">
                    <h3><strong>Cancellation Policy</strong> </h3>
                    <p>We respectfully ask that you preside us with a 24 hour notice of any schedule changes or cancellation requests. Please
                        understand that when you cancel or miss your appointment without providing a 24 hour notice we are often unable to fill that
                        appointment time. This is an inconvenience to your therapist and also means our other clients miss the chance to receive
                        services they need. For this reason, you will be charged 50% of the service fee for the first missed session and 100% of the
                        service fee for each session after that. We also reserve the right to require a credit card number to be given to book future
                        appointments so that appropriate fees may be charged if a late cancellation does occur.</p>
                    <p>We understand that emergencies can arise and illnesses do occur at inopportune times. If you have a fever, a known infection,
                        or have experienced vomiting or diarrhea within 24 hours prior to your appointment time, we request that you cancel your
                        session. Inclement weather may also result in the need for late cancellations. We will do our best to give advanced notice if we
                        are closing or need to cancel due to bad weather and we ask you to do the same. Please do not risk your own safety trying to
                        make your appointment. Late cancellation due to emergency, illness, or inclement weather will generally not result in any
                        missed session charges, but this is determined on a case-by-case basis.</p>
                  </div>
                  <div class="mt-5 text-left">
                    <h3><strong>Late Arrival Policy</strong> </h3>
                    <p>We request that you arrive 5-10 minutes prior to your appointment time to allow time to fill out any required paperwork as
                        well as answer any intake questions your therapist may have. We understand that issues can arise that may cause you to be late
                        for your appointment. However, we ask that you call to inform us if this ever occurs so we can do our best to accommodate
                        you. Appointment times are reserved for each client, so oftentimes we cannot exceed that reserved time without making the
                        next client late. For this reason, arriving after your appointment time may result in loss of time from your massage so that your
                        session ends at the scheduled time. Full service fees will be charged even when sessions are shortened due to late arrival. In
                        return we will do our best to be on time, and if we are unable to do so we will add time to your session to make up for our late
                        arrival or adjust the service charge accordingly.</p>
                  </div>
                  <div class="mt-5 text-left">
                    <h3><strong>Inappropriate Behavior Policy</strong> </h3>
                    <p>Massage therapy is for relaxation and therapeutic purposes only. There is absolutely no sexual component to massage
                        whatsoever. Any insinuation, jeke, gesture, conversation, or request otherwise will result in immediate termination of your
                        session and a refusal of any and all services in the future. You will be charged the full service fee regardless of the length of
                        your session. Depending on the behavior exhibited we may also file a report with the local authorities if necessary. Treat your
                        therapist with respect and dignity and you will be treated the same in return.</p>
                  </div>
                  <p class="my-5 mt-5">By signing below, you agree to abide by these policies.</p>
                  <form id="policyForm" class="row">
                      @csrf
                      <div class="col-6 text-center">
                        <div class="policy-group">
                            <input type="text" class="policy-input" name="signature" required>
                            <input type="hidden" value="{{$order->id}}" name="order_id">
                            <label for="">Clienr Signature</label>
                        </div>
                      </div>
                      <div class="col-2 text-center">
                        <div class="policy-group">
                            <input type="text" class="policy-input" name="date" required>
                            <label for="">Date</label>
                        </div>
                      </div>
                      <div class="col-4 text-center">
                          <button type="submit" class="policy-submit">Confirm</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        @elseif($order->order_status == 2)
        <div class="row justify-content-center ">
            <div class="col-6">
                    <h1 class="text-center checkout-price">$19.99</h1>
                    <h3 class="text-center book-service">Scan the qr code to transfer money and attach the bill.</h3>
            </div>
        </div>

         <form id="upload_bill" class="row pt-5 mt-5 justify-content-center" >
             @csrf
             @method('PUT')
                
                <div class="col-md-3">
                    <img src="{{asset('frontend/images/barcode.jpg')}}" class="w-100" alt="">
                </div>
                <div class="col-md-4">
                    <img src="https://dummyimage.com/600x400/cfcfcf/828282&text=++Bill++" class="w-100 img-preview" alt="">
                    <div class="form-group">
                        <label for="chooseBill" class="text-white">Choose your file</label>
                        <input type="hidden" id="order_id" value="{{$order->id}}" >
                        <input type="file" name="bill" class="form-control pt-1" onchange="readURL(this)" id="chooseBill" required>
                    </div>
                </div>
                <div class="col-8 text-center">
                    <button type="submit" class="next-step w-100" >Confirm order <i class="fa fa-forward ml-2"></i></button>
                </div>
            </form>
        @elseif($order->order_status == 3)

        <div class="row justify-content-center" style="margin-top: 50px;">
            <div class="col-6">
                    {{-- <h1 class="text-center checkout-price">$19.99</h1> --}}
                    <h3 class="text-center book-service">We have received your order. we will contact you back within minutes</h3>    
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-7 ">
                <div class="your-order">
                    <h5 class="text-center"><strong>Booking details </strong></h5>
                    <h6 class="text-center">Book ID #{{$order->id}}</h6>
                    <hr>
                    <h6><strong>Fullname</strong> : {{$order->fullname}}</h6>
                    <h6><strong>Address</strong> : {{$order->address}}</h6>
                    <h6><strong>Email</strong> : {{$order->email}}</h6>
                    <h6><strong>Phone</strong> : {{$order->phone}}</h6>
                    <h6><strong>Service type</strong> : Massage</h6>
                    <h6><strong>Massage style</strong> : {{$order->style}}</h6>
                    <div class="row mt-5">
                        <div class="col-8 text-center">
                            <div class="policy-group">
                                <input type="text" class="policy-input" name="signature" value="{{$policy->signature}}"  required>
                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                <label for="">Clienr Signature</label>
                            </div>
                          </div>
                          <div class="col-4 text-center">
                            <div class="policy-group">
                                <input type="text" class="policy-input" name="date" value="{{$policy->date}}" required>
                                <label for="">Date</label>
                            </div>
                          </div>
                    </div>
                </div>
                <p class="book-service mt-2">If you want to cancel, please read : <a href="#">cancellation policy </a></p>
            </div>
            
            <div class="col-12 col-md-8 text-center">
                {{-- <button type="submit" class="next-step" style="width: 80%" >Edit booking <i class="fa fa-forward"></i></button> --}}
                <div class="form-inline">
                    <a href="#" class="contact-us-order">Cancel</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        @endif
    
    @endif
    

    @if ($session)
        @if($order->order_status < 3)
        <section id="our-service ">
            <div class="row pt-5 mt-5 justify-content-center">
                <div class="col-md-10">
                    <div class="border-gold">
                        <div class="service-group s1">
                            <span>Massage</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        @endif
    @endif
</div>
<div id="zipcode-overlay"></div>
@endsection


@section('script')
    <script>
        $('#upload_bill').on('submit' , function(e){
            e.preventDefault()
            var formData = new FormData(this);
            var id = $('#order_id').val()
            jQuery.ajax({
                url: `{{url('order/`+id+`')}}`,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(result){
                    if(result.success){
                        location.reload()
                    }else{
                        swal('Alert' , ' '+data.msg , 'error')
                    }
                }
            })
        })

        // $('#policyModal').modal("show")
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#policyForm').on('submit' , function(e){
            e.preventDefault()
            var formData = $(this).serialize()
            $.post(`{{url('confirm_policy')}}` , formData , function(data){
                if(data.success){
                    location.reload()
                }else{
                    swal('Alert' , ' '+data.msg , 'error')
                }
            })
        })
        $('#orderForm').on('submit' , function(e){
            e.preventDefault()
            var formData = $(this).serialize()
            var id = $('#order_id').val()
            $.post(`{{url('order/`+id+`')}}` , formData , function(data){
                if(data.success){
                    $('#policyModal').modal("show")
                }else{
                    swal('Alert' , ' '+data.msg , 'error')
                }
            })
        })
        

        $('.order-input-group').on('click' , function(){
            $(this).addClass('active')
        })
        function nextStep(){
            var zipcode = $('#zipcode').val()
            var style = $('#style').val()
            var _token = $('#_token').val()
            if(zipcode == ""){
                swal('Warning !!' , 'Please enter your zipcode !!' , 'warning')
                return false
            }
            $.post(`{{url('order')}}` , {zipcode:zipcode , style:style , _token:_token} , function(data){
                if(data.success){
                    location.reload()
                }else{
                    swal('Alert' , ' '+data.msg , 'error')
                }
            })
        }

        $('.massage-style').on('click' , function(){
            $('.massage-style').removeClass('active')
            $(this).addClass('active')
            var style = $(this).data('style')
            $('#style').val(style)
        })

        $('.price-card').on('click' , function(){
            $('.price-card').removeClass('active')
            $(this).addClass('active')
            var price = $(this).data('price')
            $('#price').val(price)
        })

        function addZipcode(zipcode){
            $('#zipcode').val(zipcode)
        }

        function  loadZipcode(zipcode){
            if(zipcode != ""){
                $.post(`{{urL('loadzipcode')}}` , {zipcode:zipcode , _method:'GET'} , function(data){
                    $('#selectZipcode').html(data.html)
                    $('#zipcode-result').css('display' , 'block')
                    $('#zipcode-overlay').css('display' , 'block')
                })
            }else{
                $('#zipcode-result').css('display' , 'none')
                $('#zipcode-overlay').css('display' , 'none')
            }
        }

        $('#zipcode-overlay').on('click' , function(){
            $('#zipcode-result').css('display' , 'none')
            $('#zipcode-overlay').css('display' , 'none')
        })
    </script>
@endsection