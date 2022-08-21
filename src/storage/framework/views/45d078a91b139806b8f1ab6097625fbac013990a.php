<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div id="titlepath" class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18" style="color: white;"><?php echo e(__('Inicio')); ?></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active" style="color: white;">¡Bienvenido a <?php echo e(config('app.name')); ?> Inicio</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4">
        <?php if(false): ?>
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary"><?php echo e(__('¡Bienvenido de nuevo!')); ?></h5>
                            <p><?php echo e(config('app.name')); ?> <?php echo e(__("Inicio")); ?></p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="<?php echo e(URL::asset('assets/images/profile-img.png')); ?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="<?php if($user->profile_photo != null): ?><?php echo e(URL::asset('storage/images/users/' . $user->profile_photo)); ?><?php else: ?><?php echo e(URL::asset('assets/images/users/noImage.png')); ?><?php endif; ?>" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate"> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> </h5>
                        <p class="text-muted mb-0 text-truncate"><?php echo e(__('Receptionista')); ?></p>
                    </div>
                    <div class="col-sm-8">
                        <div class="pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="font-size-12"><?php echo e(__('Ultimo inicio de sesión:')); ?></h5>
                                    <p class="text-muted mb-0"> <?php echo e($user->last_login); ?> </p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a href=""
                                        class="btn btn-primary waves-effect waves-light btn-sm"><?php echo e(__('Editar perfil')); ?>

                                        <i class="mdi mdi-arrow-right ml-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        
    </div>
    <div class="col-xl-12">
        <div class="row">
            
            <div class="col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium"><?php echo e(__('Agregar Pacientes')); ?></p>
                                <a href="<?php echo e(url('/patient')); ?>" class="mb-0 font-weight-medium font-size-24">
                                    <h1 class="mb-0"><?php echo e(number_format($data['total_patient'])); ?></h1>
                                </a>
                            </div>
                            <div class="avatar-sm rounded-circle  align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-user-rectangle font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium"><?php echo e(__('Buscar por rostro')); ?></p>
                                <a href="<?php echo e(url('/urgency/patient/search')); ?>"
                                    class="mb-0 font-weight-medium font-size-24">
                                    <h1 class="mb-0"><?php echo e(number_format($data['Upcoming_appointment'])); ?>

                                    </h1>
                                </a>
                            </div>
                            <div class="avatar-sm rounded-circle  align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class='bx bxs-calendar-minus font-size-24'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <?php if(false): ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?php echo e(__("Citas para hoy")); ?></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th><?php echo e(__('Sr.No.')); ?></th>
                                <th><?php echo e(__('Nombre de paciente')); ?></th>
                                <th><?php echo e(__('Nombre doctor')); ?></th>
                                <th><?php echo e(__('Fecha')); ?></th>
                                <th><?php echo e(__('Contacto No	')); ?></th>
                                <th><?php echo e(__('tiempo')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($item->patient->first_name . ' ' . $item->patient->last_name); ?></td>
                                    <td><?php echo e($item->doctor->first_name . ' ' . $item->doctor->last_name); ?></td>
                                    <td><?php echo e($item->appointment_date); ?></td>
                                    <td><?php echo e($item->patient->mobile); ?></td>
                                    <td><?php echo e($item->timeSlot->from . ' ' . $item->timeSlot->to); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?php echo e(__('Ultimos usuarios')); ?></h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#Doctors" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block"><?php echo e(__('Doctores')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Patients" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block"><?php echo e(__('Pacientes')); ?></span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="Doctors" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th><?php echo e(__('Sr. No.')); ?></th>
                                        <th><?php echo e(__('Nombre')); ?></th>
                                        <th><?php echo e(__('Contacto No')); ?></th>
                                        <th><?php echo e(__('Email')); ?></th>
                                        <th><?php echo e(__('Ver detalles')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->index + 1); ?></td>
                                            <td><?php echo e($item->doctor->first_name); ?> <?php echo e($item->doctor->last_name); ?>

                                            </td>
                                            <td><?php echo e($item->doctor->mobile); ?></td>
                                            <td><?php echo e($item->doctor->email); ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                        <?php echo e(__('View Details')); ?>

                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                    <div class="tab-pane" id="Patients" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th><?php echo e(__('Sr.No.')); ?></th>
                                        <th><?php echo e(__('Nombre')); ?></th>
                                        <th><?php echo e(__('Contacto No')); ?></th>
                                        <th><?php echo e(__('Email')); ?></th>
                                        <th><?php echo e(__('Ver detalles')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->index + 1); ?></td>
                                            <td><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></td>
                                            <td><?php echo e($patient->mobile); ?></td>
                                            <td><?php echo e($patient->email); ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                        <?php echo e(__('View Details')); ?>

                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php /**PATH /var/www/html/resources/views/layouts/receptionist-dashboard.blade.php ENDPATH**/ ?>