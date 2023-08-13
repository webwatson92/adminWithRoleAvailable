@extends('layouts.base')
@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card_header"> <h4>Modification du mot de passe</h4></div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('post.password') }}" class="form-horizontal">
            @if(Session::has('password_succes'))
                <div class="allert alert-success" role="alert"><strong>{{Session::get('password_succes')}}</strong></div>
            @endif
            @if(Session::has('password_error'))
                <div class="allert alert-danger" role="alert"><strong>{{Session::get('password_error')}}</strong></div>
            @endif
                @csrf
           <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nom" class="control-label">Mot de passe actuel</label>
                        <input type="password"name="current_password" class="form-control">
                        @error('current_password') <p class="text-info">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="nom" class="control-label">Nouveau mot de passe</label>
                        <input type="password"name="password" class="form-control">
                        @error('password') <p class="text-info">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="nom" class="control-label">Confirmation du nouveau mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @error('password_confirmation') <p class="text-info">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                      <img src="{{ asset('images/securite.png') }}" style="height: 15em" alt="inscription page">
                </div>
           </div>
           <div class="row">
                <button type="submit" class="btn btn-primary">Modifier</button>
           </div>
           
        </form>
    </div>
</div>

@stop