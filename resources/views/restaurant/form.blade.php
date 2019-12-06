@extends('layouts.dashboard')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Administrar restaurantes
            </div>

            <form role="form" method="post" action="{{ route('restaurant.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nombre del restaurante">
                            @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Direccion">
                            @if($errors->has('address'))
                                <div class="error">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="telephone" >Telefono</label>
                            <input type="text" name="telephone" class="form-control" id="address" placeholder="Teledono">
                            @if($errors->has('telephone'))
                                <div class="error">{{ $errors->first('telephone') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="picture" name="picture">
                                    <label class="custom-file-label" for="exampleInputFile">Seleccionar imagen</label>
                                    @if($errors->has('picture'))
                                        <div class="error">{{ $errors->first('picture') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">

                        <img src="" alt="" id="imagepreview" style="height: 370px;">
                    </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('restaurant/index') }}" class="btn btn-primary float-right">Regresar al listaoo</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagepreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#picture").change(function() {
                readURL(this);
            });
        });

    </script>
@endsection

