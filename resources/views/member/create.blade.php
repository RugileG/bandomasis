

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create a new member</div>

               <div class="card-body">
               <form method="POST" action="{{route('member.store')}}">



            <div class="form-group">
                <label>Name: </label>
                <input type="text" class="form-control" name="member_name" value="{{old('member_name')}}">
                <small class="form-text text-muted">Enter new member name</small>
            </div>
            

            <div class="form-group">
                <label>Surname: </label>
                <input type="text" class="form-control" name="member_surname" value="{{old('member_surname')}}">
                <small class="form-text text-muted">Enter new member surname</small>
            </div> 
  
            <div class="form-group">
                <label>Live: </label>
                <input type="text" class="form-control" name="member_live" value="{{old('member_live')}}">
                <small class="form-text text-muted">City / Region</small>
            </div> 
            
            <div class="form-group">
                <label>Experience: </label>
                <input type="text" class="form-control" name="member_experience" value="{{old('member_experience')}}">
                <small class="form-text text-muted">Enter the duration of experience</small>
            </div> 
            
            <div class="form-group">
                <label>Registered: </label>
                <input type="text" class="form-control" name="member_registered" value="{{old('member_registered')}}">
                <small class="form-text text-muted">Enter the duration of registration</small>
            </div>
                        <select name="reservoir_id">
                           @foreach ($reservoirs as $reservoir)
                                <option value="{{$reservoir->id}}">
                                        {{$reservoir->title}} 
                                        {{$reservoir->area}}
                                        {{$reservoir->about}}
                                </option>
                           @endforeach
                        </select>
                        @csrf

                <button type="submit">ADD</button>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
