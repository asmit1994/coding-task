@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="search-breadcrumb-only">
            <div class="row">
                <div class="col-lg-8">
                    <ol class="breadcrumb">
                        <li><a href="{{route('clients.index')}}">Clients</a></li>
                        <li class="active">{{ $client->name }}</li>
                    </ol>
                </div>

                <div class="col-lg-4">
                    <a href="{{ route('clients.index') }}" class="btn btn-info pull-right"
                       style="margin-left: 120px">
                        <i class="fa fa-chevron-left"></i> Back
                    </a>
                </div>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-hover table-striped">
                            <tr>
                                <td><b>Name :</b></td>
                                <td> {{ $client->name }}</td>
                            </tr>

                            <tr>
                                <td><b>Gender :</b></td>
                                <td>{{ $client->gender }}</td>
                            </tr>

                            <tr>
                                <td><b>Phone Number :</b></td>
                                <td>{{ $client->phone }}</td>
                            </tr>

                            <tr>
                                <td><b>Email Address :</b></td>
                                <td> {{ $client->email }}</td>
                            </tr>

                            <tr>
                                <td><b>Address : </b></td>
                                <td>{{ $client->address }}</td>
                            </tr>

                            <tr>
                                <td><b>Nationality :</b></td>
                                <td> {{ $client->nationality }}</td>
                            </tr>

                            <tr>
                                <td><b>Date of Birth :</b></td>
                                <td>{{ $client->date_of_birth }}</td>
                            </tr>

                            <tr>
                                <td><b>Education Level :</b></td>
                                <td>{{ $client->education }}</td>
                            </tr>

                            <tr>
                                <td><b>Preferred Contact : </b></td>
                                <td>{{ $client->preferred_contact }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@stop