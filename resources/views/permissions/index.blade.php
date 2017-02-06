@extends('app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Permissions List
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Permissions List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('flash::message')
                    <!-- /.box -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Display Name</th>
                                    <th>Name</th>
                                    <th colspan="2"><a href="{{ URL::route('permissions.create') }}" class="btn btn-primary btn-block">Create</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td width="80"><a class="btn btn-primary" href="{{ URL::route('permissions.edit', $permission->id) }}">Edit</a></td>
                                        <td width="80">{!! Form::open(['route' => ['permissions.update', $permission->id], 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?");']) !!}
                                            {!!  Form::close() !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {!! $permissions->render() !!}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop