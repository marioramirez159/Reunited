<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content" >
                <ul class="navbar-nav">
                    <li class="nav-item" >
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="bx bx-home-circle mr-2"></i>{{ __('Inicio') }}
                        </a>
                    </li>
                    @if ($role == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Doctores') }} <div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('doctor') }}" class="dropdown-item">{{ __('Lista de Doctores') }}</a>
                                <a href="{{ route('doctor.create') }}"
                                    class="dropdown-item">{{ __('Agregar Doctor') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Pacientes') }} <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('patient') }}"
                                    class="dropdown-item">{{ __('Lista de Patients') }}</a>
                                <a href="{{ route('patient.create') }}"
                                    class="dropdown-item">{{ __('Agregar Paciente') }}</a>
                                <a href="{{ route('patient.create') }}"
                                    class="dropdown-item">{{ __('Urgencia') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Receptionista') }} <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('receptionist') }}"
                                    class="dropdown-item">{{ __('Lista de Receptionistas') }}</a>
                                <a href="{{ route('receptionist.create') }}"
                                    class="dropdown-item">{{ __('Agregar Receptionista') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('pending-appointment') }}">
                                <i class='bx bx-list-plus mr-2'></i>{{ __('Lista de cita') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('transaction') }}">
                                <i class='bx bx-list-check mr-2'></i>{{ __('Transaccion') }}
                            </a>
                        </li>
                    @elseif ($role == 'doctor')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('appointment.create') }}">
                                <i class="bx bx-calendar-plus mr-2"></i>{{ __('Cita') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Pacientes') }} <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('patient') }}"
                                    class="dropdown-item">{{ __('Lista de Pacientes') }}</a>
                                <a href="{{ route('patient.create') }}"
                                    class="dropdown-item">{{ __('Agregar Paciente') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ url('receptionist') }}">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Recepcionista') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-notepad mr-2"></i>{{ __('Prescripción') }}<div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('prescription') }}"
                                    class="dropdown-item">{{ __('Lista de Prescripciones') }}</a>
                                <a href="{{ route('prescription.create') }}"
                                    class="dropdown-item">{{ __('Crear Prescripción') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-receipt mr-2"></i>{{ __('Facturas') }} <div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('invoice') }}"
                                    class="dropdown-item">{{ __('Lista de facturas') }}</a>
                                <a href="{{ route('invoice.create') }}"
                                    class="dropdown-item">{{ __('Crear Factura') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('pending-appointment') }}">
                                <i class='bx bx-list-plus mr-2'></i>{{ __('Lista de citas') }}
                            </a>
                        </li>
                    @elseif ($role == 'receptionist')
                        <li class="nav-item">
                            <a class="nav-link" href="{{-- route('appointment.create') --}}">
                                <i class="bx bx-calendar-plus mr-2"></i>{{ __('Cita') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{-- url('doctor') --}}">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Doctores') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Pacientes') }} <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{-- url('patient') --}}"
                                    class="dropdown-item">{{ __('Lista de Pacientes') }}</a>
                                <a href="{{-- route('patient.create') --}}"
                                    class="dropdown-item">{{ __('Agregar Paciente') }}</a>
                                <a href="{{ url('urgency') }}"
                                    class="dropdown-item">{{ __('Listado de Urgencias') }}</a>
                                <a href="{{ url('urgency/create') }}"
                                    class="dropdown-item">{{ __('Agregar Urgencia') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{-- url('prescription') --}}">
                                <i class="bx bx-notepad mr-2"></i>{{ __('Prescripción') }}
                            </a>
                        </li>
                        {{--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-receipt mr-2"></i>{{ __('Facturas') }}<div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('invoice') }}"
                                    class="dropdown-item">{{ __('Lista de Facturas') }}</a>
                                <a href="{{ route('invoice.create') }}"
                                    class="dropdown-item">{{ __('Crear Factura') }}</a>
                            </div>
                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{-- url('pending-appointment') --}}">
                                <i class='bx bx-list-plus mr-2'></i>{{ __('Lista de citas') }}
                            </a>
                        </li>
                    @elseif ($role == 'patient')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('appointment.create') }}">
                                <i class="bx bx-calendar-plus mr-2"></i>{{ __('Cita') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('doctor') }}">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Doctores') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('prescription-list') }}">
                                <i class="bx bx-notepad mr-2"></i>{{ __('Prescripción') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('invoice-list') }}">
                                <i class="bx bx-receipt mr-2"></i>{{ __('Facturas') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('patient-appointment') }}">
                                <i class='bx bx-list-plus mr-2'></i>{{ __('Lista de citas') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
