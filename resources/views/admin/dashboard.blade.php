@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Statistics
                    </div>
                    <div class="panel-body">
                        <h2>Attendance Frequencies</h2>
                        <?php

                        use Khill\Lavacharts\Lavacharts;

                        $lava = new Lavacharts; // See note below for Laravel

                        $temperatures = $lava->DataTable();

                        $temperatures->addDateColumn('Date')
                            ->addNumberColumn('Frequency');
                        //                            ->addRow(['2014-10-1', 67])
                        //                            ->addRow(['2014-10-2', 67])
                        //                            ->addRow(['2014-11-1', 104])
                        $dates = \Illuminate\Support\Facades\DB::table('entries')
                            ->select(\Illuminate\Support\Facades\DB::raw('date, count(date) as count'))
                            ->groupBy('date')->get();
                        //                        dd($dates[0]);
                        foreach ($dates as $date) {
                            $temperatures->addRow([$date->date, $date->count]);
                        }

                        $lava->LineChart('Temps', $temperatures, [
                            'title' => 'Attendance Frequency'
                        ]);
                        ?>
                        <div id="temps_div"></div>
                        <?= $lava->render('LineChart', 'Temps', 'temps_div') ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"> Entries Report</div>

                    <div class="panel-body">
                        {{--<div id="chartContainer" style="height: 300px; width: 100%;">--}}
                        {{--</div>--}}
                        {{--You are logged in!--}}

                        <table id="studentsTable" class="table table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>Id Number</th>
                                <th>Role</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id Number</th>
                                <th>Role</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($entries as $entry)
                                <?php $currentUser = $entry->getUser() ?>
                                <tr class="clickable-row" style="cursor: pointer"
                                    data-href="/admin/users/{{ $currentUser->id }}">
                                    <td>{{ $currentUser->username }}</td>
                                    <td>{{ $currentUser->category }}</td>
                                    <td>{{ $currentUser->firstName }}</td>
                                    <td>{{ $currentUser->lastName }}</td>
                                    <td>{{ $currentUser->middleName }}</td>
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

                    <div class="panel-heading">Signed In Users</div>

                    <div class="panel-body">
                        <table id="signedInTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id Number</th>
                                <th>Role</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Date</th>
                                <th>Start Time</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id Number</th>
                                <th>Role</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
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
                                        <td>{{ $currentUser->category }}</td>
                                        <td>{{ $currentUser->firstName }}</td>
                                        <td>{{ $currentUser->lastName }}</td>
                                        <td>{{ $currentUser->middleName }}</td>
                                        <td>{{ $entry->date }}</td>
                                        <td>{{ $entry->startTime }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel panel-default">

                    <div class="panel-heading">Visitors List</div>

                    <div class="panel-body">
                        <table id="visitorTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Purpose</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Purpose</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach(\App\Visitor::orderBy('id', 'desc')->get() as $visitor)
                                <?php $currentUser = $entry->getUser() ?>
                                <tr>
                                    <td>{{ $visitor->firstName}}</td>
                                    <td>{{ $visitor->lastName }}</td>
                                    <td>{{ $visitor->purpose }}</td>
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

    {{--<script type="text/javascript"--}}
        {{--src="https://cdn.datatables.net/v/bs-3.3.7/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/fc-3.2.2/fh-3.1.2/r-2.1.1/sc-1.4.2/se-1.2.2/datatables.min.js"></script>--}}
    {{--<script>--}}
    <script type="text/javascript" src="/DataTables/datatables.min.js"></script>
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
            $('#visitorTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <script>
        // click event for table rows
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    </script>
@endsection

@section('css')
    {{--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">--}}
    {{--<link rel="stylesheet" type="text/css"--}}
          {{--href="https://cdn.datatables.net/v/bs-3.3.7/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/fc-3.2.2/fh-3.1.2/r-2.1.1/sc-1.4.2/se-1.2.2/datatables.min.css"/>--}}
    <link rel="stylesheet" href=" {{ asset('DataTables/datatables.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@endsection

