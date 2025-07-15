@extends('layouts.miromiro')
@section('title', "Contact")
@section('content')

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row mt-2 mb-3">
            <div class="col-12">
                <p class="fs-4 text-center">Contactez-nous !</p>
            </div>
        </div>
        <form action="/api/contact" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="nameUserContact" class="form-label">NOM Prenom</label>
                    <input type="text" class="form-control" id="nameUserContact" name="nameUserContact"
                        placeholder="DUPON Martin" required>
                </div>
                <div class="col-6">
                    <label for="emailUserContact" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="emailUserContact" name="emailUserContact"
                        placeholder="name@example.com" required>
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-12">
                    <label for="subjectUserContact" class="form-label">Sujet</label>
                    <input type="text" class="form-control" id="subjectUserContact" name="subjectUserContact" required>
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-12">
                    <label for="messageUserContact" class="form-label">Message</label>
                    <textarea class="form-control" id="messageUserContact" name="messageUserContact" rows="2" required></textarea>
                </div>
            </div>
            <div class="row mt-4 mb-2">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <button class="btn bouton_style bouton_orange bouton_fond_noir" type="submit">
                        Envoyez
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>


@stop