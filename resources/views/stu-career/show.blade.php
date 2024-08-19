@extends('layouts.app')

@section('template_title')
    {{ $stuCareer->name ?? __('Show') . " " . __('Stu Career') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Vista de datos') }} de estudiantes y su carrera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('stu-careers.index') }}"> {{ __('Vorlver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                                <div class="form-group mb-2 mb20">
                                    <strong>Cédula del estudiante:</strong>
                                    {{ $stuCareer->student->Identification_card }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Carrera:</strong>
                                    {{ $stuCareer->career->Name }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
