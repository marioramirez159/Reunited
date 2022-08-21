<?php $__env->startSection('title'); ?>
        <?php echo e(__('Agregar nueva urgencia')); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <body data-topbar="dark" data-layout="horizontal">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div id="titlepath" class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">


                            <?php echo e(__('Agregar nueva urgencia')); ?>


                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Inicio')); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('patient')); ?>"><?php echo e(__('Pacientes')); ?></a></li>
                            <li class="breadcrumb-item active">

                                <?php echo e(__('Agregar nueva urgencia')); ?>


                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">

                    <a href="<?php echo e(url('patient')); ?>">
                        <button type="button" class="btn btn-primary waves-effect waves-light mb-4">
                            <i
                                class="bx bx-arrow-back font-size-16 align-middle mr-2"></i><?php echo e(__('Listado de pacientes')); ?>

                        </button>
                    </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <blockquote><?php echo e(__('Busqueda formas de busqueda')); ?></blockquote>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>



                            <p>Verificación Facial</p>

                            <div class="form-group">
                                <label for="firstname">Lista de dispositivos:</label>
                                <select class="form-control" id="listaDeDispositivos"></select>
                            </div>
                                    
                            <div class="form-group text-center">
                                <div style="position: relative; width: 482px; height: 362px; top:0px; left:0px; margin-left: auto; margin-right: auto;">
                                    <video id="theVideo" controls autoplay style="width: 480px; height:360px;"></video>
                                    <canvas id="theVideoCanvasStream" style="position: absolute; border: solid 1px silver; width: 480px; height: 360px; top:0px; left:0px;"></canvas>
                                </div>
                                <canvas id="theCanvas" style="border: solid 1px silver; width: 480px; height: 360px;"></canvas>

                                <p id="errorTxt"></p>
                            </div>
                            <div class="form-group text-center">
                                <button type="button" class="btn btn-primary" id="btnCapture">Tomar imagen</button>
                                <button type="button" class="btn btn-default" id="btnDownloadImage">Descargar imagen</button>
                                <button type="button" class="btn btn-danger" id="btnDelAllI">Eliminar imagenes</button>
                            </div>

                            <div class="form-group" id="faceImages">


                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="window.location='<?php echo e(url("/urgency/create")); ?>';">
                                            <?php echo e(__('buscar paciente')); ?>

                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
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

        <script src="https://unpkg.com/face-api.js@0.22.2/dist/face-api.min.js"></script>
        <script type="text/javascript">
            

            var iterator = 0;
            var videoWidth = "480";
            var videoHeight = "360";
            var videoTag = document.getElementById('theVideo');
            var theVideoCanvasStream = document.getElementById('theVideoCanvasStream');
            var canvasTag = document.getElementById('theCanvas');
            var btnCapture = document.getElementById("btnCapture");
            var btnDelImages = document.getElementById('btnDelAllI');
            var btnDownloadImage = document.getElementById("btnDownloadImage");
            videoTag.setAttribute('width', videoWidth);
            videoTag.setAttribute('height', videoHeight);
            canvasTag.setAttribute('width', videoWidth);
            canvasTag.setAttribute('height', videoHeight);
            
            function startVideo(){
                navigator.mediaDevices.getUserMedia({
                    audio: false,
                    video: {
                        width: this.videoWidth,
                        height: this.videoHeight
                    }
                }).then(stream => {
                    this.videoTag.srcObject = stream;
                }).catch(e => {
                    document.getElementById('errorTxt').innerHTML = 'ERROR: ' + e.toString();
                });
            }

            window.onload = () => {
                var canvasContext = canvasTag.getContext('2d');
                btnCapture.addEventListener("click", () => {
                    canvasContext.drawImage(videoTag, 0, 0, videoWidth, videoHeight);
                    setimage( canvasTag.toDataURL() );
                    
                });
                btnDownloadImage.addEventListener("click", () => {
                    var link = document.createElement('a');
                    link.download = 'capturedImage.png';
                    link.href = canvasTag.toDataURL();
                    link.click();
                });
                btnDelImages.addEventListener("click", () => {
                    i = 0;
                    document.getElementById('faceImages').innerHTML = "";
                });


                Promise.all([
                        faceapi.nets.tinyFaceDetector.loadFromUri('/assets/models'),
                        faceapi.nets.ageGenderNet.loadFromUri('/assets/models'),
                    ]).then(startVideo());

                videoTag.addEventListener('play', async () => {
                    var displaySize = { width: videoTag.width, height: videoTag.height };
                    faceapi.matchDimensions(theVideoCanvasStream, displaySize);

                    var i = 0;

                    setInterval( async ()=> {
                        const detections = await faceapi.detectAllFaces(videoTag, new faceapi.TinyFaceDetectorOptions());

                        const resizedDetections = faceapi.resizeResults(detections, displaySize);
                        theVideoCanvasStream.getContext('2d').clearRect(0,0,theVideoCanvasStream.width, theVideoCanvasStream.height);
                        faceapi.draw.drawDetections(theVideoCanvasStream, resizedDetections);

                        if(i<=2){
                            sendFaceToSearch();
                        }
                        i++;

                    },500);

                });

            };

            function makeblob(dataURL) {
                const BASE64_MARKER = ';base64,';
                const parts = dataURL.split(BASE64_MARKER);
                const contentType = parts[0].split(':')[1];
                const raw = window.atob(parts[1]);
                const rawLength = raw.length;
                const uInt8Array = new Uint8Array(rawLength);

                for (let i = 0; i < rawLength; ++i) {
                    uInt8Array[i] = raw.charCodeAt(i);
                }

                return new Blob([uInt8Array], { type: contentType });
            }


            function sendFaceToSearch(){

                //var formData = new FormData();

                var canvasContext = canvasTag.getContext('2d');

                canvasContext.drawImage(videoTag, 0, 0, videoWidth, videoHeight);

                var base64Image = canvasTag.toDataURL();

                //formData.append('search_image', makeblob( base64Image ) , 'search_image.png' );

                $.ajax({
                    type: "POST",
                    url: "<?php echo e(url('patient/searchbyface')); ?>",
                    //contentType: 'multipart/form-data',
                    //processData: false,
                    headers: {'X-CSRF-Token': '<?php echo e(csrf_token()); ?>' },
                    //data: formData,
                    data:{
                        search_image : base64Image
                    },
                    dataType: "json",
                    success: function(data){
                        if(typeof data["id"] != 'undefined' ){
                            window.location = "<?php echo e(url('urgency')); ?>/"+data["id"]+"/create";
                        }
                    }
                });
            }


        </script>

        <script>
            var i = 0;
            var it = ["Selfie de la persona" ,"Foto al INE"];
            function setimage( base64img ){
                if( i < 1 ){
                    var e = document.createElement('div');

                    e.innerHTML = '<div style="padding: 10px;"> <img src="'+base64img+'" width="32" height="24" /> - <label>'+(i+1)
                          +' Imagen - '+'</label><input name="filesToUpload_'
                          +(i)+'" id="filesToUpload_'
                          +(i)+'" type="hidden" value="'
                          +base64img+'" />&nbsp;<!--<a id="delImage" class="btn btn-small btn-danger">Eliminar</a>--></div>';
                    document.querySelector("#faceImages").append(e);
                    
                    /*setTimeout(function(){
                        console.log("Agregando evento");
                        $('#faceImages').on('click', '#delImage', function(e){
                            console.log("elimminando elemento");
                           $(this).parent().parent().remove(); 
                        });
                },500);*/
                }else{
                    Swal.fire(
                      '¡Cuidado!',
                      'Solo puedes agregar 1 imagenes',
                      'warning'
                    );
                }
                i++;
            }
            document.querySelector("#fileappendbtn")
                .addEventListener("click", function (e){
                
                var e = document.createElement('div');
                e.innerHTML = '<div style="padding: 10px;"><label>Archivo '+(++i)+': </label><input name="filesToUpload_'+(i)+'" id="filesToUpload_'+(i)+'" type="file" multiple="" /></div>';
                document.querySelector("#fileappend").before(e);
            });
          </script>

        <script type="text/javascript">
              /*
            Tomar una fotografía y guardarla en un archivo v3
            @date  2018-10-22
            @author  parzibyte
            @web  parzibyte.me/blog
        */
        const tieneSoporteUserMedia = () =>
            !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
        const _getUserMedia = (...arguments) =>
            (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);

        // Declaramos elementos del DOM
        const $video = document.querySelector("#theVideo"),
            $canvas = document.querySelector("#canvas"),
            $estado = document.querySelector("#estado"),
            $boton = document.querySelector("#boton"),
            $listaDeDispositivos = document.querySelector("#listaDeDispositivos");

        const limpiarSelect = () => {
            for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--)
                $listaDeDispositivos.remove(x);
        };
        const obtenerDispositivos = () => navigator
            .mediaDevices
            .enumerateDevices();

        // La función que es llamada después de que ya se dieron los permisos
        // Lo que hace es llenar el select con los dispositivos obtenidos
        const llenarSelectConDispositivosDisponibles = () => {

            limpiarSelect();
            obtenerDispositivos()
                .then(dispositivos => {
                    const dispositivosDeVideo = [];
                    dispositivos.forEach(dispositivo => {
                        const tipo = dispositivo.kind;
                        if (tipo === "videoinput") {
                            dispositivosDeVideo.push(dispositivo);
                        }
                    });

                    // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
                    if (dispositivosDeVideo.length > 0) {
                        // Llenar el select
                        dispositivosDeVideo.forEach(dispositivo => {
                            const option = document.createElement('option');
                            option.value = dispositivo.deviceId;
                            option.text = dispositivo.label;
                            $listaDeDispositivos.appendChild(option);
                        });
                    }
                });
        }

        (function() {
            // Comenzamos viendo si tiene soporte, si no, nos detenemos
            if (!tieneSoporteUserMedia()) {
                alert("Lo siento. Tu navegador no soporta esta característica");
                $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
                return;
            }
            //Aquí guardaremos el stream globalmente
            let stream;


            // Comenzamos pidiendo los dispositivos
            obtenerDispositivos()
                .then(dispositivos => {
                    // Vamos a filtrarlos y guardar aquí los de vídeo
                    const dispositivosDeVideo = [];

                    // Recorrer y filtrar
                    dispositivos.forEach(function(dispositivo) {
                        const tipo = dispositivo.kind;
                        if (tipo === "videoinput") {
                            dispositivosDeVideo.push(dispositivo);
                        }
                    });

                    // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
                    // y le pasamos el id de dispositivo
                    if (dispositivosDeVideo.length > 0) {
                        // Mostrar stream con el ID del primer dispositivo, luego el usuario puede cambiar
                        mostrarStream(dispositivosDeVideo[0].deviceId);
                    }
                });



            const mostrarStream = idDeDispositivo => {
                _getUserMedia({
                        video: {
                            // Justo aquí indicamos cuál dispositivo usar
                            deviceId: idDeDispositivo,
                        }
                    },
                    (streamObtenido) => {
                        // Aquí ya tenemos permisos, ahora sí llenamos el select,
                        // pues si no, no nos daría el nombre de los dispositivos
                        llenarSelectConDispositivosDisponibles();

                        // Escuchar cuando seleccionen otra opción y entonces llamar a esta función
                        $listaDeDispositivos.onchange = () => {
                            // Detener el stream
                            if (stream) {
                                stream.getTracks().forEach(function(track) {
                                    track.stop();
                                });
                            }
                            // Mostrar el nuevo stream con el dispositivo seleccionado
                            mostrarStream($listaDeDispositivos.value);
                        }

                        // Simple asignación
                        stream = streamObtenido;

                        // Mandamos el stream de la cámara al elemento de vídeo
                        $video.srcObject = stream;
                        $video.play();

                        //Escuchar el click del botón para tomar la foto
                        //Escuchar el click del botón para tomar la foto
                        /*$boton.addEventListener("click", function() {

                            //Pausar reproducción
                            $video.pause();

                            //Obtener contexto del canvas y dibujar sobre él
                            let contexto = $canvas.getContext("2d");
                            $canvas.width = $video.videoWidth;
                            $canvas.height = $video.videoHeight;
                            contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);

                            let foto = $canvas.toDataURL(); //Esta es la foto, en base 64
                            $estado.innerHTML = "Enviando foto. Por favor, espera...";
                            fetch("./guardar_foto.php", {
                                    method: "POST",
                                    body: encodeURIComponent(foto),
                                    headers: {
                                        "Content-type": "application/x-www-form-urlencoded",
                                    }
                                })
                                .then(resultado => {
                                    // A los datos los decodificamos como texto plano
                                    return resultado.text()
                                })
                                .then(nombreDeLaFoto => {
                                    // nombreDeLaFoto trae el nombre de la imagen que le dio PHP
                                    console.log("La foto fue enviada correctamente");
                                    $estado.innerHTML = `Foto guardada con éxito. Puedes verla <a target='_blank' href='./${nombreDeLaFoto}'> aquí</a>`;
                                })

                            //Reanudar reproducción
                            $video.play();
                        });*/
                    }, (error) => {
                        console.log("Permiso denegado o error: ", error);
                        $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
                    });
            }
            })();
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/patient/urgency-searchpatient.blade.php ENDPATH**/ ?>