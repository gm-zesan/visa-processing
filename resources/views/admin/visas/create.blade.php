@extends('admin.app')
@section('title')
Visa
@endsection

@section('content')

    <div class="container-fluid my-4">
        <form action="{{ route('visa.store') }}" method="POST" autocomplete="off">
        @csrf
            <div class="row">
                <div class="col-8">
                    <div class="card table-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Visa</div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{route('visa')}}">Visa</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> Create Visa</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="{{route('visa')}}" class="add-new">Visa<i class="ms-1 ri-list-ordered-2"></i></a>
                        </div>
                        <div class="card-body custom-form">
                            
                            <div class="row">
                                

                                {{-- client name --}}
                                <div class="col-md-6">
                                    <label for="client_id" class="form-label custom-label custom-label">Client Name</label>
                                    <select class="form-select custom-input" name="client_id">
                                        <option value="">Select Client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('client_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('client_id') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- sales_by --}}
                                <div class="col-md-6">
                                    <label for="sales_by" class="form-label custom-label custom-label">Sales By</label>
                                    <select class="form-select custom-input" name="sales_by">
                                        <option value="">Select Sales By</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('sales_by'))
                                        <div class="error_msg">
                                            {{ $errors->first('sales_by') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- invoice_no --}}
                                <div class="col-md-6">
                                    <label for="invoice_no" class="form-label custom-label custom-label">Invoice No</label>
                                    <input type="text" class="form-control custom-input" name="invoice_no" placeholder="invoice no" id="invoice_no">
                                    @if($errors->has('invoice_no'))
                                        <div class="error_msg">
                                            {{ $errors->first('invoice_no') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- sale_date --}}
                                <div class="col-md-6">
                                    <label for="sale_date" class="form-label custom-label custom-label">Sale Date</label>
                                    <input type="date" class="form-control custom-input" name="sale_date" placeholder="sale date" id="sale_date">
                                    @if($errors->has('sale_date'))
                                        <div class="error_msg">
                                            {{ $errors->first('sale_date') }}
                                        </div>
                                    @endif
                                </div>
                                    
                                    {{-- due_date --}}
                                <div class="col-md-6">
                                    <label for="due_date" class="form-label custom-label custom-label">Due Date</label>
                                    <input type="date" class="form-control custom-input" name="due_date" placeholder="due date" id="due_date">
                                    @if($errors->has('due_date'))
                                        <div class="error_msg">
                                            {{ $errors->first('due_date') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- agent_id --}}
                                <div class="col-md-6">
                                    <label for="agent_id" class="form-label custom-label custom-label">Agent</label>
                                    <select class="form-select custom-input" name="agent_id">
                                        <option value="">Select Agent</option>
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('agent_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('agent_id') }}
                                        </div>
                                    @endif
                                </div>
                                    
                                {{-- passport_no --}}
                                <div class="col-md-6">
                                    <label for="passport_no" class="form-label custom-label custom-label">Passport No</label>
                                    <input type="text" class="form-control custom-input" name="passport_no" placeholder="Passport no" id="passport_no">
                                    @if($errors->has('passport_no'))
                                        <div class="error_msg">
                                            {{ $errors->first('passport_no') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                

                <div class="col-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Action</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn submit-button">Save
                                                <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('visa')}}" class="btn leave-button">Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>


            </div>
        </form>
    </div>

@endsection

@push('custom-scripts')
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
@endpush
