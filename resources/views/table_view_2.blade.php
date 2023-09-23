@extends('layout.main')

@push('tittle')
    <title>page_1</title>
@endpush


@section('main-section')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-5 mt-3">
            <h1 class="text-capitalize">user management system</h1>
            <div>
                <a class="btn btn-primary btn-sm my-4 fs-6 text-capitalize px-4" href="{{ route('table') }}"
                    role="button">previous page</a>

                <a class="btn btn-primary btn-sm my-4 fs-6 text-capitalize px-4" href="{{ route('location') }}"
                    role="button">next page</a>
            </div>

        </div>
        <div class="table-responsive">

            <table id="myTable-2">

                <thead>
                    <tr class="text-capitalize">
                        <th scope="col">user id</th>
                        <th scope="col">age category</th>
                        <th scope="col">age</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($categioes as $categioes)
                        <tr class="">
                            <td>{{ $categioes->user_id }}</td>
                            <td>{{ $categioes->age_category }}</td>
                            <td>{{ $categioes->age }}</td>
                            <td>{{ $categioes->created_at }}</td>
                            <td>{{ $categioes->updated_at }}</td>




                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>


    </div>
@endsection
