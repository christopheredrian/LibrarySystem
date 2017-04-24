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
                                <tr>
                                    <th> Recent Visit</th>
                                    <td> {{ $user->getEntries()->first()->date }} </td>
                                </tr>
                                <tr>
                                    <th>  </th>
                                    <td> {{ $user->getEntries()->first()->startTime }} </td>
                                </tr>
                                <tr>
                                    <th>  </th>
                                    <td> {{ $user->getEntries()->first()->endTime }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
