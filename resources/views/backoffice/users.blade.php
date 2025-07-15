@extends('layouts.miromiro')
@section('content')
<section class="mt-5 mb-5" id="dashboardMain">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-3 text-center">Listes des utilisateurs</p>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            @if ($allUsers)
                @foreach ($allUsers as $user)
                    <div
                        class="col-12 col-lg-3 flex-column rounded background_couleur_principale_400 d-flex align-items-center justify-content-center m-2">
                        <form action="/backoffice/users/update" method="post">
                            @csrf
                            <p class="fs-5 fw-bold text-center">{{$user->name}}</p>
                            <input type="hidden" value="{{ $user->id }}" name="userId">
                            @if ($permissions)
                                <div>
                                    <select class="form-select" aria-label="" id="selectPerm" name="selectPerm">
                                        @foreach ($permissions as $perms)
                                            <option value="{{ $perms->ID - 1}}" @if ($user->permission === $perms->ID - 1) selected @endif>
                                                {{ $perms->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <button class="btn bouton_style bouton_noir bouton_fond_blanc mt-3" type="submit"> Mettre à jour
                            </button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@stop