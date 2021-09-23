


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create new data about reservoir</div>

               <div class="card-body">
               <form method="POST" action="{{route('reservoir.store')}}">



                        <div class="form-group">
                                <label>Title: </label>
                                <input type="text" class="form-control" name="reservoir_title" value="{{old('reservoir_title')}}">
                                <small class="form-text text-muted">Enter new reservoir</small>
                        </div>
                        <div class="form-group">
                                <label>Area: </label>
                                <input type="text" class="form-control" name="reservoir_area" value="{{old('reservoir_area')}}">
                                <small class="form-text text-muted">Enter the area of reservoir</small>
                        </div>
                        <div class="form-group">
                                <label>About: </label>
                                <small class="form-text text-muted">Enter short description of reservoir</small>
                                <textarea name="reservoir_about" id="summernote" cols="50" rows="2" value="{{old('reservoir_about')}}"></textarea>
                        </div>

                        <!-- <select name="member_id">
                           @foreach ($members as $member)
                              <option value="{{$member->id}}">
                                    {{$member->name}} 
                                    {{$member->surname}}
                                    {{$member->live}}
                                    {{$member->experience}}
                                    {{$member->registered}}
                        </option>
                           @endforeach
                        </select> -->
                        @csrf 
                        <button type="submit">ADD</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>
@endsection
