@extends("Backend.app")
@section('title')
Dashboard
@endsection
@section('dashboard')
@include('message.message')
<div class="flex flex-col h-[89vh] p-4">  
    <div class="md:flex justify-between items-center bg-[#09605A] p-8 rounded-lg mx-3 mt-5">
        <div>
            <h6 class="text-3xl font-extralight text-white">Hello, 
                <span class="highlight-font text-4xl">
                    {{$userData->user_name}}
                </span>
            </h6>
            <p class="text-3xl font-extralight text-white">Have a nice day!</p>
        </div>
        <div class="mx-10">
            <img src="/Dash/mobile.png" alt="mobile png">
        </div>
    </div>
    <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-5 mx-3">
        <div class="bg-[#09605A] px-8 py-12 rounded-lg  relative overflow-hidden text-start">
    
            <div class="space-y-2">
                <h6 class="text-lg text-white">Total contact</h6>
                <h4 class="text-6xl font-bold text-white">{{count($contacts)}}</h4>
            </div>
            <img class="absolute -bottom-5 w-20 right-5 opacity-65 " src="{{ asset('/icons/call02.svg/') }}" alt="">
    
        </div>
        <div class="bg-[#09605A] px-8 py-12 rounded-lg  relative overflow-hidden text-start">
            <div class="space-y-2">
                <h6 class="text-lg text-white">Total Message</h6>
                <h4 class="text-6xl font-bold text-white">{{$remaingMessages}}</h4>
            </div>
            <img class="absolute -bottom-5 w-20 right-5 opacity-65 " src="{{ asset('/icons/inbox.svg/') }}" alt="">
        </div>
        <!-- <div class="bg-[#09605A] px-8 py-12 rounded-lg  relative overflow-hidden text-start">
            <img class="absolute -bottom-5 w-24 right-5 opacity-65 " src="{{ asset('/icons/send.svg/') }}" alt="">
    
            <div class="space-y-2">
                <h6 class="text-lg text-white">Remaining Message</h6>
                <h4 class="text-6xl font-bold text-white">{{$remaingMessages}}</h4>
            </div>
        </div> -->
        <div class="bg-[#09605A] px-8 py-12 rounded-lg  relative overflow-hidden text-start">
            <img class="absolute -bottom-5 w-12 right-5 opacity-65 " src="{{ asset('/icons/taka.svg/') }}" alt="">
    
            <div class="space-y-2">
                <h6 class="text-lg text-white">Send Messages</h6>
                <h4 class="text-6xl font-bold text-white">{{$totalMessageCount}}</h4>
            </div>
        </div>
    </div>
    
    <div class="h-full flex justify-center items-end grow">
        <p>Copyright © 2024 Bangladesh Associate of IT Solution</p>
    </div>
</div>



@endsection