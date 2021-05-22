@extends('layouts.lecturersidebar')

@section('title','Lecturer|Manage Proposal')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="card mb-4 mt-2" style="margin-left:-25px;">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">Students Proposals</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Name</th>
                                <th>Proposal</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($proposals as $proposal)
                                <tr class="proposal" data-proposal="{{ $proposal->id }}">
                                    <td> {{ $proposal->id }}</td>
                                    <td> {{ $proposal->First_name }}  {{ $proposal->Other_names }}</td>
                                    <td> {{ $proposal->title }}</td>
                                    <td>{!! $proposal->getTextualStatus('mt-1') !!}</td>
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

@section('script')
    <script>
        $('tr.proposal').click(function (event) {
            let proposalId = event.currentTarget.getAttribute('data-proposal');
            window.location = '/lecturer/proposal/' + proposalId;
        })
    </script>
@endsection
