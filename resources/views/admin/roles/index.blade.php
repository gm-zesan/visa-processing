@extends('admin.app')
@section('title')
    Roles
@endsection


@push('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush


@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Role</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Role</li> 
                                </ol> 
                            </nav>
                        </div>
                        @if (Auth::user()->hasRole('superadmin'))
                            <a href="{{route('role.create')}}" class="add-new">New Role<i class="ms-1 ri-add-line"></i></a>
                        @endif
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Role Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="col-5">
                <form  action="{{ isset($role) ? route('role.update', ['id' => $role->id]) :route('role.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="card table-card">
                                        <div class="card-header table-header">
                                            <div class="title-with-breadcrumb">
                                                <div class="table-title">Role</div>
                                            </div>
                                            <button type="submit" class="btn add-new">{{ isset($role) ? 'Update' : 'Save' }}
                                                <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                                </span>
                                            </button>
                                        </div>
                                        <div class="card-body custom-form">
                                            
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-label custom-label custom-label">Role Name</label>
                                                        <input type="text" class="form-control custom-input" name="name" 
                                                            @if(isset($role))
                                                                value="{{ $role->name }}"
                                                            @else
                                                                placeholder="Role name"
                                                            @endif
                                                        >

                                                        @if($errors->has('name'))
                                                            <div class="error_msg">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="col-12">
                                                <label for="" class="form-label custom-label">Role Description</label>
                                                <textarea class="form-control custom-input" name="description" rows="5"  placeholder="Role Description"  style="resize: none; height: auto">
                                                    @if(isset($role))
                                                        {{ $role->description }}
                                                    @endif
                                                </textarea>
                                                @if($errors->has('description'))
                                                    <div class="error_msg">
                                                        {{ $errors->first('description') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
                                <div class="col-12">
                                    <div class="card table-card">
                                        <div class="table-header">
                                            <div class="table-title">Permission</div>
                                        </div>
                                        <div class="card-body custom-form">
                                            <div class="form-group">
                                                @foreach ($modules as $module)
                                                    <div class="form-check-wrapper mb-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="module" id="{{ $module->module }}" class="form-check-input custom-checkbox" onclick="checkRoleModule(this)">
                                                            <label for="{{ $module->module }}" class="form-check-label custom-checkbox-label">
                                                                {{ $module->module }}
                                                            </label>
                                                        </div>
                                                    @foreach ($permission as $value)
                                                        @if($module->module == $value->module)
                                                        <div class="form-check d-inline-block mb-2 inner-form-check">
                                                            <input type="checkbox" name="permission[]" class="form-check-input custom-checkbox inner-checkbox" id="check-{{ $value->id }}" value="{{ $value->id }}"  data-module="{{ $module->module }}"onclick="innerCheckboxUncheck(this)"
                                                                @if (isset($role))
                                                                {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}
                                                                @endif
                                                            >
                                                            <label class="form-check-label custom-checkbox-label" for="check-{{ $value->id }}">{{ $value->display_name }}</label>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
@endsection


@push('custom-scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/role';

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
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'name', name: 'name', orderable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/role/edit/' + data.id + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            if(data.role == 'superadmin'){
                                btn1 += '<a href="' + SITEURL + '/dashboard/role/delete/' + data.id + '" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></a>';
                            }
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'asc']]
            });
        });
    </script>

    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>

    <script>
        function checkRoleModule(moduleCheckbox) {
            var moduleId = moduleCheckbox.id;
            var isChecked = moduleCheckbox.checked;

            var innerCheckboxes = document.querySelectorAll('[data-module="' + moduleId + '"]');
            innerCheckboxes.forEach(function(innerCheckbox) {
                innerCheckbox.checked = isChecked;
            });
        }

        function innerCheckboxUncheck(innerCheckbox) {
            var moduleId = innerCheckbox.getAttribute('data-module');
            var moduleCheckbox = document.getElementById(moduleId);

            var allInnerCheckboxes = document.querySelectorAll('[data-module="' + moduleId + '"]');
            var allChecked = true;
            allInnerCheckboxes.forEach(function(checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });

            moduleCheckbox.checked = allChecked;
        }


        var modules = document.querySelectorAll('[data-module]');
        modules.forEach(function(module) {
            var moduleId = module.getAttribute('data-module');
            var moduleCheckbox = document.getElementById(moduleId);

            var allInnerCheckboxes = document.querySelectorAll('[data-module="' + moduleId + '"]');
            var allChecked = true;
            allInnerCheckboxes.forEach(function(checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });

            moduleCheckbox.checked = allChecked;
        });
    </script>

    {{-- <script>
        $.ajax({
            type: "GET",
            url: SITEURL + '/dashboard/role';
            dataType: "json",
            success: function (response) {
                var id = response.country.id;
                var flag = response.country.flag;
                var code = response.country.currency_code;
                var currency = response.country.currency;
                var region_code = response.country.region_code;

                var tdStyle;
                if(response.count % 2 == 1){
                    tdStyle = "background-color: {{$active_theme_settings->table_n_row_background_color}}; font-weight: {{$active_theme_settings->table_n_row_font_weight}}; color:{{$active_theme_settings->table_n_row_color}}; font-family:{{$active_theme_settings->table_n_row_font_family}}"
                }else{
                    tdStyle = "background-color: {{$active_theme_settings->table_n1_row_background_color}}; font-weight: {{$active_theme_settings->table_n1_row_font_weight}}; color:{{$active_theme_settings->table_n1_row_color}}; font-family:{{$active_theme_settings->table_n1_row_font_family}}"
                }

                var tr = "<tr style='font-size: {{$active_theme_settings->table_n_row_font_size}}px'><td style='"+tdStyle+"'><img src='"+ASSET_URL+"flags/"+flag+"' alt='flag' class='flag'></td><td style='"+tdStyle+"'>"+code+"<p class='currency'>"+currency+"</p><input type='hidden' class='theme_country_id' value='"+id+"'></td><td style='"+tdStyle+"'>"+region_code+"</td></tr>";

                var trPreview = "<tr><td class='country_name'>"+code+"</td><td class='country_btn'><button class='remove_from_list_btn' type='button' onclick=\"CountryListManage('" + id + "','remove')\"><i class='fa-solid fa-trash-can'></i><input type='hidden' class='country_id' id='country_"+id+"' value='"+id+"'></button></td></tr>";

                $(".nodata_tr").addClass("d-none");
                $("#exchange_rate_tbody").append(tr);
                $("#country_list_table_body").append(trPreview);
            

                $("#country_list option").each(function(){
                    var country_id = $(this).val();
                    if(country_id == id){
                        $(this).remove();
                    }
                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    </script> --}}
@endpush
