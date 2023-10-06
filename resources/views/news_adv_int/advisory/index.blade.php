@extends('layouts.main')
@section('content')
    @include('news_adv_int.advisory.create')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Advisories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Advisory</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary mt-2 card-outline shadow"
                        style="background-color: rgba(245, 245, 245, 0.57)">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="card-title">Advisories Information List</h4>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#create"><i class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-reponsive">
                                <table class="table table-striped shadow table-hover text-center">
                                    <thead class="bg-primary text-center">
                                        <tr>
                                            <th>Place</th>
                                            <th>Details</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisories as $adv)
                                            <tr>
                                                <td>{{ $adv->place }}</td>
                                                <td>{{ $adv->info }}</td>
                                                <td>{{ $adv->dateTime }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-danger"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            $('input[name="dateTime"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });

        });
    </script>
@endsection
