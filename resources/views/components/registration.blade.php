<div class="mb-3">
    <label for="name" class="form-label text-capitalize">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" id="" value="{{$value}}" class="form-control" placeholder="" aria-describedby="helpId">
    <span class="text-danger text">
        @error($name)
        {{$message}}
        @enderror
    </span>
  </div>
