@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Report</div>
                    <div class="panel-body">
                        {{--<div id="chartContainer" style="height: 300px; width: 100%;">--}}
                        {{--</div>--}}
                            {{--You are logged in!--}}

                            <table id="studentsTable" class="table">
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
                    <div class="panel panel-default">

                        <div class="panel-heading">Signed In Students</div>

                        <div class="panel-body">
                            <table id="signedInTable" class="table">
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

                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($entries as $entry)
                                    <?php $currentUser = $entry->getUser() ?>
                                    @if($entry->endTime === null)
                                        <tr>
                                            <td>{{ $currentUser->username }}</td>
                                            <td>{{ $currentUser->firstName }}</td>
                                            <td>{{ $currentUser->lastName }}</td>
                                            <td>{{ $currentUser->middleName }}</td>
                                            <td>{{ $currentUser->course }}</td>
                                            <td>{{ $currentUser->yearLevel }}</td>
                                            <td>{{ $entry->date }}</td>
                                            <td>{{ $entry->startTime }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{--<script--}}
    {{--src="https://code.jquery.com/jquery-2.2.4.min.js"--}}
    {{--integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="--}}
    {{--crossorigin="anonymous">--}}

    {{--</script>--}}

    {{--<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
    {{--<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>--}}
    {{--<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>--}}
    {{--<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>--}}
    {{--<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>--}}

    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs-3.3.7/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/fc-3.2.2/fh-3.1.2/r-2.1.1/sc-1.4.2/se-1.2.2/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#studentsTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('#signedInTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    title: {
                        text: "Simple Date-Time Chart"
                    },
                    axisX: {
                        title: "timeline",
                        gridThickness: 2
                    },
                    axisY: {
                        title: "Downloads"
                    },
                    data: [
                        {
                            type: "area",
                            dataPoints: [//array
                                {x: new Date(2012, 01, 1), y: 26},
                                {x: new Date(2012, 01, 3), y: 38},
                                {x: new Date(2012, 01, 5), y: 43},
                                {x: new Date(2012, 01, 7), y: 29},
                                {x: new Date(2012, 01, 11), y: 41},
                                {x: new Date(2012, 01, 13), y: 54},
                                {x: new Date(2012, 01, 20), y: 66},
                                {x: new Date(2012, 01, 21), y: 60},
                                {x: new Date(2012, 01, 25), y: 53},
                                {x: new Date(2012, 01, 27), y: 60}

                            ]
                        }
                    ]
                });

            chart.render();
        }
    </script>
@endsection

@section('css')
    {{--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">--}}
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs-3.3.7/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/fc-3.2.2/fh-3.1.2/r-2.1.1/sc-1.4.2/se-1.2.2/datatables.min.css"/>

@endsection
