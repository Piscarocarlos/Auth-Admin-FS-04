@extends('layouts.app')

@section('content')
    <p>
        Bonjour {{ $user->name }}, <br>
        Nous avons un nouveau compte pour vous sur le site {{ config('app.name') }}.
        Veuillez vous connecter et changer votre mot de passe. Pour ce faire, veuillez cliquer
        sur le boutton ci dessous.
    </p>

    <a href="{{ route('password.change', encrypt($user->id)) }}" class="btn btn-primary w-100">Valider mon compte</a>
@endsection
