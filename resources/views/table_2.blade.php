@extends('layout.main')

@push('tittle')
    <title>page_4</title>
@endpush


@section('main-section')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-5 mt-3">
            <h1 class="text-capitalize">user management system</h1>
            <div>
                <a class="btn btn-primary btn-sm my-4 fs-6 text-capitalize px-4" href="{{ route('location') }}"
                    role="button">previous page</a>

                <a class="btn btn-primary btn-sm my-4 fs-6 text-capitalize px-4" href="{{ route('table') }}"
                    role="button">first page</a>
            </div>

        </div>
        <div class="table-responsive my-3">
            <table class="table" width="100%" id="trackingTable" cellspacing="0">

                <thead>
                    <tr>
                        <th></th>
                        <th>AWB #</th>
                        <th>Assign</th>
                        <th>Address</th>
                        <th>Weight</th>
                        <th>PickupDate</th>
                        <th>PaymentDetails</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div>
            <a name="export" id="" class="btn btn-success text-capitalize fw-semibold text-light" href="{{route('final_excel')}}">dowload excel sheet</a>
        </div>

    </div>
      <script>

    </script>
@endsection
