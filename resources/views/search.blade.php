@extends('layouts.main')
@section('content')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inquiry</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-secondary">Inquiry</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary mt-2 card-outline shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Inquiries Information List</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table id="inquiry" class="table table-striped shadow table-hover text-center" width="100%">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Maiden Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Meter No.</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function () {
        let table = $('#inquiry').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": '50vh',
            "autoWidth": true,
            "lengthMenu": [[5, 10, 25, 50, 100, 10000], [5, 10, 25, 50, 100, "Max"]],
            "pageLength": 5,
            "ajax": {
                // "url": "https://dummyjson.com/users",
                "url": "{{ route('search') }}",
                "type": "GET",
                "dataSrc": "users"
            },
            "columns": [
                { "data": "firstName" },
                { "data": "lastName" },
                { "data": "maidenName" },
                { "data": "age" },
                { "data": "gender" },
                { "data": "address.address" },
                { "data": "ein" },
            ]
        });

        $('#search').on('input', function () {
            const searchTerm = this.value.toLowerCase();
            table.clear();
            table.rows().every(function () {
                let rowData = this.data();
                if (rowData.firstName.toLowerCase().includes(searchTerm)) {
                    this.data(rowData).draw();
                }
            });
        });
    });
</script>

@endsection
