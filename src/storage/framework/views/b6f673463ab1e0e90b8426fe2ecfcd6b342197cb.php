<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content" >
                <ul class="navbar-nav">
                    <li class="nav-item" >
                        <a class="nav-link" href="<?php echo e(url('/')); ?>">
                            <i class="bx bx-home-circle mr-2"></i><?php echo e(__('Inicio')); ?>

                        </a>
                    </li>
                    <?php if($role == 'admin'): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Doctores')); ?> <div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('doctor')); ?>" class="dropdown-item"><?php echo e(__('Lista de Doctores')); ?></a>
                                <a href="<?php echo e(route('doctor.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar Doctor')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Pacientes')); ?> <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('patient')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de Patients')); ?></a>
                                <a href="<?php echo e(route('patient.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar Paciente')); ?></a>
                                <a href="<?php echo e(route('patient.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Urgencia')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Receptionista')); ?> <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('receptionist')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de Receptionistas')); ?></a>
                                <a href="<?php echo e(route('receptionist.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar Receptionista')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('pending-appointment')); ?>">
                                <i class='bx bx-list-plus mr-2'></i><?php echo e(__('Lista de cita')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('transaction')); ?>">
                                <i class='bx bx-list-check mr-2'></i><?php echo e(__('Transaccion')); ?>

                            </a>
                        </li>
                    <?php elseif($role == 'doctor'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('appointment.create')); ?>">
                                <i class="bx bx-calendar-plus mr-2"></i><?php echo e(__('Cita')); ?>

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Pacientes')); ?> <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('patient')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de Pacientes')); ?></a>
                                <a href="<?php echo e(route('patient.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar Paciente')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?php echo e(url('receptionist')); ?>">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Recepcionista')); ?>

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-notepad mr-2"></i><?php echo e(__('Prescripción')); ?><div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('prescription')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de Prescripciones')); ?></a>
                                <a href="<?php echo e(route('prescription.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Crear Prescripción')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-receipt mr-2"></i><?php echo e(__('Facturas')); ?> <div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('invoice')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de facturas')); ?></a>
                                <a href="<?php echo e(route('invoice.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Crear Factura')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('pending-appointment')); ?>">
                                <i class='bx bx-list-plus mr-2'></i><?php echo e(__('Lista de citas')); ?>

                            </a>
                        </li>
                    <?php elseif($role == 'receptionist'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="bx bx-calendar-plus mr-2"></i><?php echo e(__('Cita')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Doctores')); ?>

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Pacientes')); ?> <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href=""
                                    class="dropdown-item"><?php echo e(__('Lista de Pacientes')); ?></a>
                                <a href=""
                                    class="dropdown-item"><?php echo e(__('Agregar Paciente')); ?></a>
                                <a href="<?php echo e(url('urgency')); ?>"
                                    class="dropdown-item"><?php echo e(__('Listado de Urgencias')); ?></a>
                                <a href="<?php echo e(url('urgency/create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar Urgencia')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="bx bx-notepad mr-2"></i><?php echo e(__('Prescripción')); ?>

                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class='bx bx-list-plus mr-2'></i><?php echo e(__('Lista de citas')); ?>

                            </a>
                        </li>
                    <?php elseif($role == 'patient'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('appointment.create')); ?>">
                                <i class="bx bx-calendar-plus mr-2"></i><?php echo e(__('Cita')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('doctor')); ?>">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Doctores')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('prescription-list')); ?>">
                                <i class="bx bx-notepad mr-2"></i><?php echo e(__('Prescripción')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('invoice-list')); ?>">
                                <i class="bx bx-receipt mr-2"></i><?php echo e(__('Facturas')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('patient-appointment')); ?>">
                                <i class='bx bx-list-plus mr-2'></i><?php echo e(__('Lista de citas')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/layouts/hor-menu.blade.php ENDPATH**/ ?>