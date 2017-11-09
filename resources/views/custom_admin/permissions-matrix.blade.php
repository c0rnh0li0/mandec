@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            <span class="text-capitalize">{{ $crud->entity_name_plural }}</span>
            <small>{{ trans('backpack::crud.all') }} <span>{{ $crud->entity_name_plural }}</span> {{ trans('backpack::crud.in_the_database') }}.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
            <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
            <li class="active">{{ trans('backpack::crud.list') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">

        <!-- THE ACTUAL CONTENT -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive">
                    {!! Form::open(array('url' => $crud->route, 'method' => 'post')) !!}

                    <table id="crudTable" class="table table-bordered table-striped display">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            @foreach ($roles as $role)
                                <th>{{ $role['name'] }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($controllers as $c => $controller)
                            <tr>
                                <th class="controller-name-header cheader-{{ $c }}" data-class="{{ $c }}">{{ $c }}</th>
                                @foreach ($roles as $role)
                                    <td>
                                        <input type="checkbox" class="chk-header" data-controller="{{ $c }}" data-role="{{ $role['name'] }}" value="1" />
                                    </td>
                                @endforeach
                            </tr>

                            <tbody class="controller-name-body cbody-{{ $c }}">
                            @foreach ($controller as $action)
                                <tr>
                                    <td>
                                        &nbsp;&nbsp;&nbsp; - {{ $action }}
                                        <input type="hidden" name="permissionname_{{ $c }}~{{ $action }}" value="permissionname_{{ $c }}~{{ $action }}" />
                                    </td>
                                    @foreach ($roles as $role)
                                        <td>
                                            <input name="rolepermission_{{ $role['name'] }}|{{ $c }}~{{ $action }}" type="checkbox" class="chk-row" data-controller="{{ $c  }}" data-controller-action="{{ $c . '@' . $action }}" data-role="{{ $role['name'] }}" value="1" @if ($role_permissions[$role['name']][$c . "@" . $action] == 1)checked="checked"@endif />
                                            @if ($role_permissions[$role['name']][$c . "@" . $action] == 1)
                                                <input name="deletepermission_{{ $role['name'] }}|{{ $c }}~{{ $action }}" type="checkbox" class="chk-delete hidden"  data-controller="{{ $c }}" data-controller-action="{{ $c . '@' . $action }}" data-role="{{ $role['name'] }}" value="1" />
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer">
                        <div class="btn-group">

                            <button type="submit" class="btn btn-success">
                                <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
                                <span data-value="saveMatrix">Save permissions</span>
                            </button>
                        </div>

                    </div><!-- /.box-footer-->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@section('after_scripts')
    <script type="text/javascript">
        $(function () {
            $('.controller-name-body').slideUp();
            $('.controller-name-header').off('click').on('click', function (event) {
                $('tbody.cbody-' + $(this).attr('data-class')).slideToggle();
            });

            $('.chk-header').off('change').on('change', function () {
                var controllerName = $(this).attr('data-controller');
                var roleName = $(this).attr('data-role');

                getAllActions(controllerName, roleName).prop('checked', $(this).is(':checked'));

                $('.chk-row').change();
            });

            $('.chk-row').off('change').on('change', function () {
                var controllerName = $(this).attr('data-controller');
                var controllerActionName = $(this).attr('data-controller-action');
                var roleName = $(this).attr('data-role');

                getHeaderCheckbox(controllerName, roleName).prop('checked', allActionsChecked(controllerName, roleName));

                $('.chk-delete[data-controller-action="' + controllerActionName + '"][data-role="' + roleName + '"]').prop('checked', !$(this).is(':checked'));
            }).trigger('change');

            function allActionsChecked(controllerName, roleName) {
                return $('.chk-row[data-controller="' + controllerName + '"][data-role="' + roleName + '"]:checked').length == $('.chk-row[data-controller="' + controllerName + '"][data-role="' + roleName + '"]').length;
            }

            function getAllActions(controllerName, roleName) {
                return $('.chk-row[data-controller="' + controllerName + '"][data-role="' + roleName + '"]');
            }

            function getHeaderCheckbox(controllerName, roleName) {
                return $('.chk-header[data-controller="' + controllerName + '"][data-role="' + roleName + '"]');
            }
        });
    </script>
@endsection

@endsection