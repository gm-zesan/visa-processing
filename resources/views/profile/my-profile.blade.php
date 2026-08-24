@extends('admin.app')
@section('title')
    My Profile | Edit
@endsection

@push('custom-style')
    <style>
        body{
            background:#eee;
        }

        .card{
            border:none;

            position:relative;
            overflow:hidden;
            border-radius:8px;
            cursor:pointer;
        }

        .card:before{
            
            content:"";
            position:absolute;
            left:0;
            top:0;
            width:4px;
            height:100%;
            background-color:#E1BEE7;
            transform:scaleY(1);
            transition:all 0.5s;
            transform-origin: bottom
        }

        .card:after{
            
            content:"";
            position:absolute;
            left:0;
            top:0;
            width:4px;
            height:100%;
            background-color:#845adf;
            transform:scaleY(0);
            transition:all 0.5s;
            transform-origin: bottom
        }

        .card:hover::after{
            transform:scaleY(1);
        }
        span{
            font-size: 14px;
        }

        p{
            font-size:11px;
        }

        .social-list{
            display:flex;
            list-style:none;
            justify-content:center;
            padding:0;
        }

        .social-list li{
            padding:10px;
            color:#845adf;
            font-size:19px;
        }


        .buttons button:nth-child(1){
            border:1px solid #845adf !important;
            color:#845adf;
            height:40px;
        }

        .buttons button:nth-child(1):hover{
            border:1px solid #845adf !important;
            color:#fff;
            height:40px;
            background-color:#845adf;
        }

        .buttons button:nth-child(2){
            border:1px solid #845adf !important;
            background-color:#845adf;
            color:#fff;
            height:40px;
        }
        
    </style>
@endpush

@section('content')
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    @if(Auth::user()->image)
                        <img src="{{ asset(Auth::user()->image) }}" width="100" class="rounded-circle">
                    @else
                        <img src="{{ asset('images/admin/user.jpeg') }}" width="100" class="rounded-circle">
                    @endif
                </div>
                
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">{{ Auth::user()->name }}</h5>
                    <span>{{ Auth::user()->email }}</span><br>
                    <span>{{ Auth::user()->phone_no }}</span>
                    
                    <div class="px-4 mt-2">
                        {!!Auth::user()->description!!}
                    </div>
                    
                    {{-- <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    
                    <div class="buttons">
                        
                        <button class="btn btn-outline-primary px-4">Message</button>
                        <button class="btn btn-primary px-4 ms-3">Contact</button>
                    </div> --}}
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>

@endsection