@extends('layout.main')

@push('tittle')
    <title>page_1</title>
@endpush


@section('main-section')
    <div class="container-fluid mb-5">
        @if(session('error_message'))
        <div class="alert alert-danger sticky-top">
            {!! nl2br(e(session('error_message'))) !!}
        </div>
    @endif
        <div class="d-flex justify-content-between mb-5 mt-3">
            <h1 class="text-capitalize">user management system</h1>
            <div>
                <a class="btn btn-primary btn-sm my-4 fs-6 text-capitalize px-4" href="{{ route('add') }}"
                    role="button">add</a>

                <a class="btn btn-primary btn-sm my-4 fs-6 text-capitalize px-4" href="{{ route('age') }}" role="button">next
                    page</a>


            </div>

        </div>
        <div class="table-responsive">
            <form>
                @csrf

                <table id="myTable">
                    <thead>
                        <tr class="text-capitalize">
                            <th scope="col" id="selected">
                                <input type="checkbox" class="selectAll">
                            </th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">phone</th>
                            <th scope="col">location</th>
                            <th scope="col">Date_Of_Birth</th>
                            <th scope="col">Password</th>
                            <th scope="col">Created</th>
                            <th scope="col">Updated</th>
                            <th scope="col" class="text-center">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr class="">
                                <td class="check">
                                    <input type="checkbox" name="ids[]" class="check"
                                        value="{{ $item->registration_id }}">
                                </td>
                                <td>{{ $item->Name }}</td>
                                <td>{{ $item->Email }}</td>
                                <td>{{ $item->Phone }}</td>
                                <td>{{ $item->Location }}</td>
                                <td>{{ $item->Date_Of_Birth }}</td>
                                <td>{{ $item->Password }}</td>
                                <td class=".create-time">{{ $item->created_at }}</td>
                                <td class="update-time">{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('delete', ['id' => $item->registration_id]) }}" class="d-flex justify-content-center"
                                        onclick="return alert_msg()" role="button">
                                        <span><i class="fa-solid fa-trash text-danger"></i></span>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- "Delete Selected" button -->


                <button type="submit" class="btn btn-danger text-capitalize fw-semibold text-light" id="delete-btn" formaction="{{ route('multipledelete') }}" formmethod="POST" onclick="return checkIfAnyChecked('deleted')">Delete
                    Selected</button>
                <button type="submit" id="delete-btn" class="btn btn-warning text-capitalize fw-semibold text-light" formaction="{{ route('multipleupdate') }}" formmethod="POST" onclick="return checkIfAnyChecked('update')">updated
                    Selected</button>


                    <a name="export" id="" class="btn btn-success text-capitalize fw-semibold text-light" href="{{route('excel')}}">dowload excel sheet</a>
            </form>

            <form action="{{route('import')}}" method="POST" enctype="multipart/form-data" class="container-fluid mt-4">
                @csrf
                <div class="mb-3 row">
                    <div class="col-lg-4 d-inline">
                        <input class="form-control" type="file" name="file" id="formFile">
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary text-capitalize fw-semibold text-light mb-3">upload</button>
                    </div>
                  </div>

            </form>



        </div>


    </div>
    <script></script>
@endsection
