@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="search-breadcrumb-only">
            <div class="row">
                <div class="col-lg-8">
                    <ol class="breadcrumb">
                        <li><a href="{{route('clients.index')}}">Clients</a></li>
                    </ol>
                </div>

                <div class="col-lg-4 header-button">
                    <a href="{{ route('clients.create') }}" class="pull-right btn btn-info">
                        <i class="fa fa-plus"></i> Add Client
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">

                    <div class="box-body">
                        @if(count($clients)>0)
                            <table class="table table-striped table-hover" id="clientTable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Nationality</th>
                                    <th>Date Of Birth</th>
                                    <th>Education</th>
                                    <th>Preferred Contact</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    @if($client['name'] == '')
                                        <tr class="danger">
                                            <td>{{ $i }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">Record Deleted</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="{{ route('clients.edit',$i) }}">
                                                    <i class="fa fa-plus"></i> Add Record
                                                </a>
                                            </td>
                                        </tr>
                                        <?php ++$i;  ?>
                                    @else
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $client['name'] }}</td>
                                            <td>{{ $client['email'] }}</td>
                                            <td>{{ $client['phone'] }}</td>
                                            <td>{{ $client['address'] }}</td>
                                            <td>{{ $client['nationality'] }}</td>
                                            <td>{{ $client['date_of_birth'] }}</td>
                                            <td>{{ $client['education'] }}</td>
                                            <td>{{ $client['preferred_contact'] }}</td>
                                            <td>
                                                <a href="{{ route('clients.show', $i) }}"
                                                   title="View Client Record" data-rel="tooltip">
                                                    <i class="icon fa fa-eye"></i>
                                                </a>

                                                <a href="{{ route('clients.edit', $i) }}"
                                                   title="Edit Client Record" data-rel="tooltip">
                                                    <i class="icon fa fa-edit"></i>
                                                </a>

                                                <a href="{{ URL::to('clients/destroy/'.$i) }}"
                                                   title="Delete Client Record" data-rel="tooltip"
                                                   onclick="return ConfirmDelete()">
                                                    <i class="icon fa fa-trash"></i>
                                                </a>
                                            </td>

                                            <?php ++$i;  ?>
                                        </tr>
                                    @endif

                                @endforeach
                                </tbody>
                            </table>
                            {{--{{$clients->render()}}--}}

                        @else
                            <div class="alert alert-danger">
                                <strong style="padding-left: 150px">Sorry! No record found.</strong>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            {{--<div class="col-md-4">
                @if(\Request::segment(3)=='edit')
                    @include('clients/edit')
                @else
                    @include('clients/create')
                @endif
            </div>--}}
        </div>
    </div>

    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete this record?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@stop