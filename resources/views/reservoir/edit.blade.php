


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit data about reservoir</div>

               <div class="card-body">
               <form method="POST" action="{{route('reservoir.update',[$reservoir])}}">
    
                        
                        <div class="form-group">
                                <label>Title: </label>
                                <input type="text" class="form-control" name="reservoir_title" value="{{old('reservoir_title', $reservoir->title)}}">
                                <small class="form-text text-muted">Edit reservoir</small>
                        </div>
                        <div class="form-group">
                                <label>Area: </label>
                                <input type="text" class="form-control" name="reservoir_area" value="{{old('reservoir_area', $reservoir->area)}}">
                                <small class="form-text text-muted">Edit the area of reservoir</small>
                        </div>
                        <div class="form-group">
                                <label>About: </label>
                                <small class="form-text text-muted">Edit description of reservoir</small>
                                <textarea name="reservoir_about" id="summernote" cols="50" rows="2" value="{{old('reservoir_about', $reservoir->about)}}">{{$reservoir->about}}</textarea>
                        </div>

                            <!-- <select name="member_id">
                                @foreach ($members as $member)
                                    <option value="{{$member->id}}" @if($member->id == $reservoir->member_id) selected @endif>
                                        {{$member->name}} {{$member->surname}}
                                    </option>
                                @endforeach
                            </select> -->

                            @csrf
                            <br>
                            <br>
                            <button type="submit" class="btn btn-success">Update</button>
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

