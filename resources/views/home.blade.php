@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">INICIO</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡Bienvenid@!
                        <p>Con esta aplicación web se pretende ofrecer una plataforma para la gestión de tratamientos
                            a través de la cual pacientes y médicos puedan acceder a información sanitaria
                            de forma rápida, desde cualquier lugar y en cualquier momento.<br>
                            Por un lado, el personal sanitario puede acceder a información relacionada con los
                            pacientes a los que atiende, sus enfermedades y sus tratamientos y además, le permite
                            prescribirles de forma online un tratamiento
                            a cualquiera de sus pacientes.<br>
                            Por otro lado, a los pacientes se les ofrece la posibilidad de acceder a información
                            relacionada con su enfermedad, como el tratamiento. Además puede ver información sobre
                            los medicamentos que componen el tratamiento, la posología e incluso registrar tomas.
                            También pueden acceder a información del facultativo que le ha prescrito el tratamiento
                            y la información del centro sanitario al que pertenece.</p>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection
