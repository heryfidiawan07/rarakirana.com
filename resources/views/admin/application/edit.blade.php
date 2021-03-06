<form method="POST" action="/admin/application/{{$application->id}}/update" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label>Img</label>
        @include('parts.upload')
    </div>
    <div class="form-group">
        <img src="/application/thumb/{{$application->img}}">
    </div>
    <div class="form-group">
        <label>App Name</label>
        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$application->name}}">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Title <small class="text-success"><i>search engine optimization</i></small></label>
        <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{$application->title}}">
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Description <small class="text-success"><i>search engine optimization</i></small></label>
        <textarea class="form-control" name="description{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5">{{strip_tags($application->description)}}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Telp</label>
        <input type="text" name="telp" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" value="{{$application->telp}}">
        @if ($errors->has('telp'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('telp') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Hp</label>
        <input type="text" name="hp" class="form-control{{ $errors->has('hp') ? ' is-invalid' : '' }}" value="{{$application->hp}}">
        @if ($errors->has('hp'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('hp') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$application->email}}">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" rows="3">{{$application->address}}</textarea>
        @if ($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Founder / Author</label>
        <input type="text" name="author" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" value="{{$application->author}}">
        @if ($errors->has('author'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('author') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Company</label>
        <input type="text" name="company" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" value="{{$application->company}}">
        @if ($errors->has('company'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('company') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-sm" value="Update">
    </div>
</form>