<form action="{{ route('courts.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}"  class="form-control form-control-sm {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Courtroom number" id="">
        @if ($errors->has('name'))
        <div class="invalid-feedback small text-danger">
            <strong>
                {{$errors->first('name')}}
            </strong>
        </div>
        @endif
    </div>
    <div class="form-group">
        <input type="submit" value="{{ $buttonText }}" class="btn btn-md btn-outline-primary">
    </div>
</form>
