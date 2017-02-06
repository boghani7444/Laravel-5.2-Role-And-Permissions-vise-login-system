@extends('app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Role
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Role</li>
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

                        {!! Form::open(['route' => 'roles.store']) !!}
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
                                    {!! Form::number('level', null, ['class' => 'form-control', 'min' => '0']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="">Permissions</label>
                                    @foreach($permissions as $permission)
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('perms[]', $permission->id) !!} {{ $permission->display_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop