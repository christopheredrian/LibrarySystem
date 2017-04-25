@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">User {{ $user->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/users') }}" title="Back">
                            <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Edit User">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> Edit
                            </button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/users', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete User',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>Username</th>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ $user->category }}</td>
                                </tr>
                                @if($user->category === 'student')
                                    <tr>
                                        <th>Course</th>
                                        <td>{{ $user->course }}</td>
                                    </tr>
                                    <tr>
                                        <th>Year Level</th>
                                        <td>{{ $user->yearLevel }}</td>
                                    </tr>
                                @endif
                                @if($user->category === 'faculty')
                                    <tr>
                                        <th>Department</th>
                                        <td>{{ $user->department }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th> FirstName</th>
                                    <td> {{ $user->firstName }} </td>
                                </tr>
                                <tr>
                                    <th> LastName</th>
                                    <td> {{ $user->lastName }} </td>
                                </tr>
                                <tr>
                                    <th> MiddleName</th>
                                    <td> {{ $user->middleName }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <h2>Statistics</h2>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th> Total Entries</th>
                                    <td> {{ count($user->getEntries()) }} </td>
                                </tr>
                                @if($user->getEntries()->count() > 0)
                                    <tr>
                                        <th> Recent Visit</th>

                                        <td> {{ $user->getEntries()->last()->date }} </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td> {{ $user->getEntries()->last()->startTime }} </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td> {{ $user->getEntries()->last()->endTime }} </td>
                                    </tr>
                                @else
                                    <tr>
                                        <th> Recent Visit</th>

                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>-</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>

                            <div id="stocks-chart"></div>

                            <?php

                            use Khill\Lavacharts\Lavacharts;

                            $lava = new Lavacharts; // See note below for Laravel

                            $sales = $lava->DataTable();

                            $sales->addDateColumn('Date')
                                ->addNumberColumn('Orders');
                            $currentDate = new DateTime();
                            $days = [];

                            foreach ($user->getEntries() as $entry) {
                                $temp = new DateTime($entry->date);
                                if ($currentDate->format('y') === $temp->format('y')) {
                                    $days[$temp->format('m')] = $temp->format('d');
                                }
                            }
                            //                            dd($days);
                            //                            foreach (range(2, 5) as $month) {
                            //                                for ($a = 0; $a < 20; $a++) {
                            //                                    $day = rand(1, 30);
                            //                                    $sales->addRow(["$year-${month}-${day}", rand(0, 100)]);
                            //                                }
                            //                            }
                            foreach ($user->getEntries() as $entry) {
                                $temp = new DateTime($entry->date);
                                if ($currentDate->format('y') === $temp->format('y')) {
                                    $year = $temp->format('y');
                                    $month = $temp->format('m');
                                    $day = $temp->format('d');
                                    $sales->addRow(["${year}-${month}-${day}", 1]);
                                }

                            }

                            $lava->CalendarChart('Sales', $sales, [
                                'title' => 'Library Attendance',
                                'unusedMonthOutlineColor' => [
                                    'stroke' => '#ECECEC',
                                    'strokeOpacity' => 0.75,
                                    'strokeWidth' => 1
                                ],
                                'dayOfWeekLabel' => [
                                    'color' => '#4f5b0d',
                                    'fontSize' => 16,
                                    'italic' => true
                                ],
                                'noDataPattern' => [
                                    'color' => '#DDD',
                                    'backgroundColor' => '#11FFFF'
                                ],
                                'colorAxis' => [
                                    'values' => [0, 100],
                                    'colors' => ['black', 'green']
                                ]
                            ]);

                            ?>
                            <?= $lava->render('CalendarChart', 'Sales', 'sales_div') ?>
                        </div>
                        <div id="sales_div"></div>
                        <h2>Entries</h2>
                        <table class="table table-responsive">
                            <tbody>
                            <tr>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                            @foreach($user->getEntries() as $entry)
                                <tr>
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
