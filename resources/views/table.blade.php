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
        <div class="table-responsive">

            <table id="myTable-3">

                <thead>
                    <tr class="text-capitalize">
                        <th scope="col">registration id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">location</th>
                        <th scope="col">date of birth</th>
                        <th scope="col">new weight</th>
                        <th scope="col">weight diff</th>
                        <th scope="col">COD amount</th>
                        <th scope="col">new status</th>
                        <th scope="col">remark</th>
                        <th scope="col">Created at</th>
                        <th scope="col">updated at</th>





                    </tr>
                </thead>

                <tbody>
                    @foreach ($sheet as $sheets)
                        <tr>
                            <td>{{ $sheets->registration_id}}</td>
                            <td>{{ $sheets->Name}}</td>
                            <td>{{ $sheets->Email}}</td>
                            <td>{{ $sheets->Phone}}</td>
                            <td>{{ $sheets->Location}}</td>
                            <td>{{ $sheets->Date_Of_Birth}}</td>
                            <td>{{ $sheets->New_weight}}</td>
                            <td>{{ $sheets->Weight_diff}}</td>
                            <td>{{ $sheets->cod_ammount}}</td>
                            <td>{{ $sheets->New_status}}</td>
                            <td>{{ $sheets->Remark}}</td>
                            <td>{{ $sheets->Created_at}}</td>
                            <td>{{ $sheets->Updated_at}}</td>


                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div>
            <a name="export" id="" class="btn btn-success text-capitalize fw-semibold text-light" href="{{route('final_excel')}}">dowload excel sheet</a>
        </div>



    </div>
@endsection
