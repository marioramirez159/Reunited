@extends('layouts.master-layouts')
@section('title')
        {{ __('Agregar nueva urgencia') }}

@endsection
@section('body')

    <body data-topbar="dark" data-layout="horizontal">
    @endsection
    @section('content')
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div id="titlepath" class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">


                            {{ __('Agregar nueva urgencia') }}

                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Inicio') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('patient') }}">{{ __('Pacientes') }}</a></li>
                            <li class="breadcrumb-item active">

                                {{ __('Agregar nueva urgencia') }}

                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">

                    <a href="{{ url('patient') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-4">
                            <i
                                class="bx bx-arrow-back font-size-16 align-middle mr-2"></i>{{ __('Regresar información de paciente') }}
                        </button>
                    </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <blockquote>{{ __('Información de Urgencia') }}</blockquote>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="row pdcard bas">
                                        <div class="col-sm-3 text-center">
                                            <div class="imgcircle">
                                                <img class="imgfile" src="{{ asset('storage/images/users/'.$patient->profile_photo) }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <h2>{{ $patient->first_name.' '.$patient->last_name }}</h2>
                                            <p>N03294202221</p>
                                            <p>Hora Atención: {{ date('Y-m-d h:m:s A') }}</p>

                                            <div class="steps">
                                                <p><a href="">1</a>&nbsp;<a href="">2</a>&nbsp;<a href="">3</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-md-1"><br/><br/></div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <label class="control-label">{{ __('Motivo de la consulta') }}<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control text-center" id="reason_for_consultation" name="reason_for_consultation" rows="10" placeholder="Escribe el motivo"></textarea>
                                            @error('reason_for_consultation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <label class="control-label">{{ __('Apariencia') }}<span
                                                    class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" checked id="tono" />
                                                        <label for="tono"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Tono</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="actividad" />
                                                        <label for="actividad"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Actividad</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="irritable" />
                                                        <label for="irritable"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Irritable</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="llantopatologico" />
                                                        <label for="llantopatologico"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Llanto patológico</p>
                                                </div>
                                            </div>

                                            @error('apariencia')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <label class="control-label">{{ __('Respiración') }}<span
                                                    class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="taquipnea" />
                                                        <label for="taquipnea"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Taquipnea</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="tiraje" />
                                                        <label for="tiraje"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Tiraje</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="sibilancia" />
                                                        <label for="sibilancia"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Sibilancia</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="estridor" />
                                                        <label for="estridor"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Estridor</p>
                                                </div>
                                            </div>

                                            @error('respiracion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <label class="control-label">{{ __('Circulación') }}<span
                                                    class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="palidez" />
                                                        <label for="palidez"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Palidez</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="piel" />
                                                        <label for="piel"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Piel</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="pielmorada" />
                                                        <label for="pielmorada"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Piel morada</p>
                                                </div>
                                                <div class="col-3">
                                                    <div class="checkcontainer">
                                                      <div class="round">
                                                        <input type="checkbox" id="llenadocapilar" />
                                                        <label for="llenadocapilar"></label>
                                                      </div>
                                                    </div>
                                                    <p style="margin-top: 15px;">Llenado capilar</p>
                                                </div>
                                            </div>

                                            @error('circulacion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <label class="control-label">{{ __('Ingresa los siguientes datos') }}<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 form-group text-center">
                                            <input type="text" name="peso" class="form-control" placeholder="Peso" />
                                        </div>
                                        <div class="col-md-6 form-group text-center">
                                            <input type="text" name="temperatura" class="form-control" placeholder="Temperatura" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group text-center">
                                            <input type="text" name="fc" class="form-control" placeholder="F.C." />
                                        </div>
                                        <div class="col-md-6 form-group text-center">
                                            <input type="text" name="fr" class="form-control" placeholder="F.R." />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group text-center">
                                            <input type="text" name="sato2" class="form-control" placeholder="Sato 2" />
                                        </div>
                                        <div class="col-md-6 form-group text-center">
                                            <input type="text" name="ta" class="form-control" placeholder="T.A." />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            
                                            <div class="row">
                                                
                                                <div class="col-4">
                                                    <div class="cardsz100">
                                                        <h1>I</h1>
                                                        <p>Categoria</p>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="cardsz100">
                                                        <h1>II</h1>
                                                        <p>Categoria</p>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="cardsz100">
                                                        <h1>III</h1>
                                                        <p>Categoria</p>
                                                    </div>
                                                </div>

                                            </div>

                                            @error('categorias')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <script type="text/javascript">
                                            var catops = document.querySelectorAll(".cardsz100");



                                            for (var i = catops.length - 1; i >= 0; i--) {
                                                
                                                catops[i].addEventListener('click', function(e){

                                                    //console.log(this.classList.contains('catls') );
                                                    if( this.classList.contains('catls') ){
                                                        this.classList.remove("catls");
                                                    }else{
                                                        this.classList.add("catls");
                                                    }
                                                });
                                            }
                                            

                                        </script>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <textarea name="peso" class="form-control" name="trajeavanzado" rows="6" placeholder="Triaje Avanzado" ></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <input type="test" name="doctorname" class="form-control" name="trajeavanzado" rows="6" placeholder="Nombre completo del medico" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-6 form-group text-center">
                                            <input type="test" name="cedula" class="form-control" name="trajeavanzado" rows="6" placeholder="Cedula" />
                                        </div>
                                        <div class="col-6 form-group text-center">
                                            <input type="test" name="firma" class="form-control" name="trajeavanzado" rows="6" placeholder="Firma" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <label class="control-label">{{ __('Evaluación') }}<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="padecimientoactual" placeholder="Padecimiento Actual" rows="6"></textarea>
                                        </div>
                                        <div class="col-md-12 form-group text-center">
                                            <textarea class="form-control" name="exploracionfisica" placeholder="Exploración física" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-12 form-group text-center">
                                            <textarea class="form-control" name="planyrecomendaciones" placeholder="Plan y recomendaciones" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="register()">
                                            {{ __('Agregar urgencia') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection
    @section('script')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            function register(){
                setTimeout(function (){
                    Swal.fire(
                      '¡Hecho!',
                      'Urgencia registrada con exito',
                      'success'
                    )
                    setTimeout(function (){
                        window.location = "{{ url('') }}";
                    },1000);
                },3000);
            }
        </script>
        <script>
            // Profile Photo
            function triggerClick() {
                document.querySelector('#profile_photo').click();
            }

            function displayProfile(e) {
                if (e.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('#profile_display').setAttribute('src', e.target.result);
                    }
                    reader.readAsDataURL(e.files[0]);
                }
            }
        </script>
    @endsection
