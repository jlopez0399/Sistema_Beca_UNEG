@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Registrar sede
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Registrar sede</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('campuses.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('campus.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
