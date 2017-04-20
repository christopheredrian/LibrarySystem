@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {{--You are logged in!--}}

                        <table id="studentsTable" class="table table-condendsed">
                            <thead>
                            <tr>
                                <th>Id Number</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id Number</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($entries as $entry)
                                <?php $currentUser = $entry->getUser() ?>
                                <tr>
                                    <td>{{ $currentUser->username }}</td>
                                    <td>{{ $currentUser->firstName }}</td>
                                    <td>{{ $currentUser->lastName }}</td>
                                    <td>{{ $currentUser->middleName }}</td>
                                    <td>{{ $currentUser->course }}</td>
                                    <td>{{ $currentUser->yearLevel }}</td>
                                    <td>{{ $entry->date }}</td>
                                    <td>{{ $entry->startTime }}</td>
                                    <td>{{ $entry->endTime }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous">

    </script>

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#studentsTable').DataTable();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">

@endsection
