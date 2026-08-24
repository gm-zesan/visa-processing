@extends('admin.app')

@section('title')
    Dashboard
@endsection


@push('custom-style')
   {{-- Datatable css  --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
   <style>
    .card{
        border-radius: 10px;
    }
   </style>
@endpush

@section('content')
    <div class="container-fluid my-3">
        @canany(['activity-list', 'activity-create', 'activity-edit', 'activity-delete'])
        <div class="row mb-5">
            <div class="btf-title">
                <h1>Latest Activity</h1>
            </div>
            @foreach ($activities as $activity)
                <div class="col-md-4">
                    <div class="card dashboard-card">
                        <div class="card-body card-bg">
                            <div class="block-header">
                                <img src="{{asset('admin/assets/images/home/home-activity.svg')}}" class="card-img-top" alt="...">
                                <div class="block-info">
                                    <h4 class="target-title">{{$activity->title}}</h4>
                                    <p>{!!Illuminate\Support\Str::limit(preg_replace('/<img[^>]+>|&nbsp;/', '', $activity->description), 80)!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 text-center mt-3">
                <a class="btf-button" href="{{ route('activities') }}">View all Activities</a>
            </div>
        </div>
        @endcan
        <div class="row mb-5">
            <div class="col-md-4">
                @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
                    <div class="card dashboard-card">
                        <div class="card-body target-bg">
                            <div class="dashboard-icon">
                                <a href="#"><i class="ri-user-3-line"></i></a>
                            </div>
                            <div class="dashboard-info">
                                <h4 class="target-title">Total User</h4>
                                <h3 class="numbers">{{$total_users}} + </h3>
                                <a href="{{route('users')}}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
            <div class="col-md-4">
                @canany(['activity-list', 'activity-create', 'activity-edit', 'activity-delete'])
                    <div class="card dashboard-card">
                        <div class="card-body target-bg non">
                            <div class="dashboard-icon">
                                <a href="#"><i class="ri-file-list-line"></i></a>
                            </div>
                            <div class="dashboard-info">
                                <h4 class="target-title">Total Activity</h4>
                                <h3 class="numbers">{{$total_activity}} + </h3>
                                <a href="{{ route('activities') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
            <div class="col-md-4">
                @canany(['event-list', 'event-create', 'event-edit', 'event-delete'])
                    <div class="card dashboard-card">
                        <div class="card-body target-bg">
                            <div class="dashboard-icon">
                                <a href="#"><i class="ri-user-3-line"></i></a>
                            </div>
                            <div class="dashboard-info">
                                <h4 class="target-title">Total Event</h4>
                                <h3 class="numbers">{{$total_event}} + </h3>
                                <a href="{{route('events')}}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        </div>

        <div class="row">
            @canany(['contact-list', 'contact-delete'])
                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="card table-card dashboard-table">
                                <div class="card-header table-header">
                                    <div class="title-with-breadcrumb">
                                        <div class="table-title">Contact Messages</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table w-100" id="data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Messages</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection

@push('custom-scripts')
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>



    {{-- Datatable Ajax Call --}}
    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/message';

        $(document).ready( function () {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'email', name: 'email', orderable: true },
                    { data: 'subject', name: 'subject', orderable: true },
                    { data: 'message', name: 'message', orderable: true },
                ],
                order: [[0, 'asc']]
            });
        });
    </script>


@endpush
