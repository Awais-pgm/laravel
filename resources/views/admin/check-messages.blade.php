@extends('admin.app')
@push('title')
    <title>Manage Messages</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (count($messages) > 0)
                <h2 class="text-center fs-2 my-4 text-light">All Messages</h2>
                <div class="table-responsive" style="max-width:1064px;overflow-x:auto;">
                    <table class="table text-light" id="myOrderTable">
                        <thead>
                            <tr>
                                <th class="text-light">S.No</th>
                                <th class="text-light">Name</th>
                                <th class="text-light">Email</th>
                                <th class="text-light">Subject</th>
                                <th class="text-light">Message</th>
                                <th class="text-light">Read More</th>
                                <th class="text-light">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp

                            @foreach ($messages as $message)
                                <tr>
                                    <td scope="row">{{ $sno }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ Str::limit($message->message, 30, '...')  }}</td>
                                    <td><a class="badge bg-primary text-light" href="read/more/{{$message->id}}">Read More</a></td>
                                    <td><a class="badge bg-danger text-light" href="delete/message/{{$message->id}}" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a></td>
                                </tr>
                                @php
                                    $sno += 1;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <h2 class="text-center fs-2 my-4 text-light">No Messages were found.</h2>
            @endif
        </div>
    </div>
@endsection
