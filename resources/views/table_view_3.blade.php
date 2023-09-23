@extends('layout.main')

@push('tittle')
    <title>page_1</title>
@endpush


@section('main-section')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-5 mt-3">
            <h1 class="text-capitalize">user management system</h1>
            <div>
                <a class="btn btn-primary btn-sm my-4 fs-6 text-capitalize px-4" href="{{ route('age') }}"
                    role="button">previous page</a>

                <a class="btn btn-primary btn-sm my-4 fs-6 text-capitalize px-4" href="{{ route('sheet') }}"
                    role="button">next page</a>
            </div>

        </div>
        <div class="table-responsive">

            <table id="myTable-3">

                <thead>
                    <tr class="text-capitalize">
                        <th scope="col">location</th>
                        <th scope="col">minior</th>
                        <th scope="col">adult</th>
                        <th scope="col">senior</th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $users)
                        <tr>
                            <td>{{ $users->location }}</td>
                            <td>{{ $users->minor_count }}</td>
                            <td>{{ $users->adult_count }}</td>
                            <td>{{ $users->senior_count }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>


    </div>
@endsection
