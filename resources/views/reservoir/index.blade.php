

        @extends('layouts.app')

        @section('content')
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reservoirs in Lithuania</div>

                    <div class="card-body">


                        <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Area</th>
                            <th>About</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        @foreach ($reservoirs as $reservoir)
                            <tr>
                            <td>{{$reservoir->title}}</td>
                            <td>{{$reservoir->area}}</td>
                            <td>{!!$reservoir->about!!}</td>
                            <td><a class="btn btn-primary" href="{{route('reservoir.edit',[$reservoir])}}">Edit</a></td>
                            <td>
                                <form method="POST" action="{{route('reservoir.destroy', $reservoir)}}">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </table>


                    </div>
                </div>
            </div>
        </div>
        </div>
      
        @endsection


