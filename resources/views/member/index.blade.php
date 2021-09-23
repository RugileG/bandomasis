




@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of Club Members</div>

               <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>City/Region</th>
                            <th>Experience</th>
                            <th>Registered</th>
                            <th>Vandens telkinys</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        @foreach ($members as $member)
                            <tr>
                            <td>{{$member->name}}</td>
                            <td>{{$member->surname}}</td>
                            <td>{{$member->live}}</td>
                            <td>{{$member->experience}}</td>
                            <td>{{$member->registered}}</td>
                            <td>{{$member->reservoir->title}}</td>
                             <td><a class="btn btn-primary" href="{{route('member.edit',[$member])}}">Edit</a></td>
                            <td>
                                <form method="POST" action="{{route('member.destroy', $member)}}">
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


