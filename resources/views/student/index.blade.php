@extends('layouts.app')

@section('template_title')
    Students
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estudiantes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear registro') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>

									<th >Primer nombre</th>
									<th >Apellido</th>
									<th >Cédula</th>
									<th >Teléfono</th>
									<th >Teléfono de habitación</th>
									<th >Correo</th>
									<th >Semestre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $student->First_name }}</td>
										<td >{{ $student->Suname }}</td>
										<td >{{ $student->Identification_card }}</td>
										<td >{{ $student->Phone }}</td>
										<td >{{ $student->Room_telephone }}</td>
										<td >{{ $student->Email }}</td>
										<td >{{ $student->Semeter }}</td>

                                            <td>
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('students.show', $student->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-info" href="{{ route('students.edit', $student->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Está seguro de borrar él registro?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $students->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
