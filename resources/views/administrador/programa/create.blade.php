@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Crear Programacion</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">

        <form class="form-horizontal" action="{{ route('admin.programas.store')}}" method="POST">
            @csrf
            <div class="row bg-light text-dark">

                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input class="form-control" placeholder="categoria" name="title" type="text" required>
                    </div>
                    @error('categoria')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     <div class="form-group">
                        <label>Nombre</label>
                        <textarea class="form-control" rows="3" placeholder="Nombre de la programa" name="nombre" required></textarea>
                    </div>
                    @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input class="form-control" placeholder="Descripcion del programa" name="descripcion" type="text" required>
                    </div>
                    @error('descripcion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="imagen">Nombre Imagen</label>
                        <input class="form-control" placeholder="Nombre de la imagen" name="image" id="imagen" readonly required>
                    </div>
                    @error('imagen')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="hora">Horario</label>
                        <input type="time-local" class="form-control" placeholder="Hora de la programa" name="hora" type="time" required>
                    </div>
                    @error('hora')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date-local" class="form-control" placeholder="fecha de la programa" name="hora" type="date" required>
                    </div>
                    @error('date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="col-md-6 mt-2">
                    <div class="card bg-light text-dark">


                        <div class="card-header bg-light text-dark">
                            Ajustar imagen
                        </div>
                        <div class="card-body">
                            <input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
                            <img id="idimag" class="profile-user-img img-fluid" src="https://images.unsplash.com/photo-1542261777448-23d2a287091c?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTR8fHxlbnwwfHx8&auto=format&fit=crop&w=500&q=60" alt="User profile picture">
                        </div>

                    </div>
                </div>
            </div>
            <div class="card bg-dark">
                <div class="container-fluid h-100 mt-2">
                    <div class="row w-100 align-items-center">
                        <div class="form-group ">
                            <div class="col text-center">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" required> Estoy seguro <a>de registrar</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn btn-success ">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>

    <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- Fin contenido -->
<!-- Modal imagen -->
<div id="imageModel" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajusta el imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <br />
                        <br />
                        <br />
                        <button class="btn btn-success crop_image">Guardar Foto</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script>
    $(document).ready(function() {
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle' //circle o square
            },
            boundary: {
                width: 300,
                height: 300
            }
        });
        $('#before_crop_image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#imageModel').modal('show');
        });
        $('.crop_image').click(function(event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $.ajax({
                    url: "{{url('/admin/actividadimagen')}}",
                    type: 'POST',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'image': response
                    },
                    success: function(data) {
                        $('#imageModel').modal('hide');
                        //alert('Crop image has been uploaded');
                        var json = $.parseJSON(data); // create an object with the key of the array
                        //console.log(json.nombrefoto);
                        $('#idimag').attr("src", '/storage/actividades/' + json.image);
                        $('#imagen').val(json.image);
                    }
                })
            });
        });
    });
</script>
@stop