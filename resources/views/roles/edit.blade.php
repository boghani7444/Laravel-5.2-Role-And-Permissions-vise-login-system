@extends('app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Role
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Role</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PATCH']) !!}
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('display_name', 'Display name') !!}
                                    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}
                                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('level', 'Level') !!}
                                    {!! Form::text('level', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    {!! Form::hidden('level', $role->level) !!}
                                </div>

                                <div class="form-group">
                                    <label for="">Permissions</label>
                                    @foreach($permissions as $permission)
                                        <?php /* $checked = in_array($permission->id, $rolePerms->lists('id')); */ ?>
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('perms[]', $permission->id, null) !!} {{ $permission->display_name }}
                                                </label>
                                            </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                                </div>
                             </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop