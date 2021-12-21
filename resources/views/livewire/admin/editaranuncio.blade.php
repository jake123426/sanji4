<div>
    <form action="{{ route('anuncios.update',[$anuncio->id]) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="card shadow formulario ">
            <div class="card-body">
                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 info">
                        INFORMACIÓN DEL PRODUCTO O SERVICIO
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <label for="producto" class="form-label la">¿Qué estás vendiendo u ofreciendo?</label>
                        <input type="text" name="titulo" class="form-control shadow-sm" id="producto" value="{{$anuncio->nombre}}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <label for="ubicacion" class="form-label la">¿Donde Se Ubica?</label>
                        <input type="text" name="ubicacion" class="form-control shadow-sm" id="ubicacion" value="{{$anuncio->ubicacion}}">
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-6 mt-3">
                        <label for="categoria" class="form-label la">Categoría</label>
                        <select class="form-select shadow-sm" name="categoria" id="categoria" wire:model="sub">
                            <option value="{{$anuncio->categoria->id}}">{{$anuncio->categoria->nombre}}</option>
                            @foreach ($categorias as $categoria )
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-xs-4 col-sm-6 col-md-4 mt-3">
                        <label for="precio" class="form-label la">Precio</label>
                        <input type="number" class="form-control shadow-sm" name="precio" id="precio" value="{{$anuncio->precio}}">
                    </div>
                    <div class="col-xs-2 col-sm-6 col-md-2 mt-3">
                        <label for="moneda" class="form-label la">Moneda</label>
                        <select class="form-select shadow-sm" name="moneda" id="moneda" required>
                            <option value="2">Bs.</option>
                            <option value="1">$.</option>
                        </select>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-6 mt-3">
                        <label for="subcategoria" class="form-label la">Subcategoría</label>
                        <select class="form-select shadow-sm" name="subcategoria" id="subcategoria">

                            @foreach ($subcategorias as $subcategoria )
                            <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-6 mt-3">
                        <label for="estado" class="form-label la">Estado del producto</label>
                        <select class="form-select shadow-sm" name="estado" id="estado">
                            <option value="{{$anuncio->estado}}">{{$anuncio->estado}}</option>
                            <option value="En caja">En caja</option>
                            <option value="Nuevo">Nuevo</option>
                            <option value="Usado">Usado</option>
                            <option value="Defectuoso">Defectuoso</option>
                            <option value="De Fabrica">De Fabrica</option>

                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <label for="descripcion" class="form-label la">Descripción del producto o servicio</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"  required>{{$anuncio->descripcion}}</textarea>
                    </div>
                    {{-- Etiquetas start --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3" wire:ignore>
                        <label for="tags" class="form-label la">Ingrese algunas etiquetas:</label>
                        <div class="tags-input" data-name="tags"></div>
                    </div>
                    {{-- Etiquetas end --}}
                </div>
            </div>
        </div>
        {{-- Imagen edit start --}}
        <div class="card shadow formulario ">
            <div class="card-body">
                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 info">
                        IMAGENES
                    </div>
                    <div class="col-xs-4 col-sm-6 col-md-4 ">
                        <div class="card">
                            @foreach ($anuncio->imagen()->get() as $imagen )


                            <div class="card-body">
                                <img class="imagen" src="{{Storage::url($imagen->url) }}" alt="No Image">
                            </div>
                            <div style="text-align: center" class="card-footer">
                                <a class="delete" href="{{route('eliminar.imagen',[ $imagen->id]) }}">Eliminar</a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- Imagen edit end --}}

        <div class="card shadow formulario " wire:ignore >
            <div class="card-body">
                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 info">
                        FOTOS
                    </div>


                    <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12  ">

                        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                            <label
                              >Quitar todas
                              <a
                                href="javascript:void(0)"
                                class="custom-file-container__image-clear"
                                title="Clear Image"
                                >&times;</a
                              ></label
                            >

                            <label class="custom-file-container__custom-file">
                              <input
                                type="file"
                                class="custom-file-container__custom-file__custom-file-input"
                                accept="image/*"
                                multiple
                                aria-label="Elegir Imagen"
                                name="imagen[]"
                                id="imagen[]"
                                value="{{old('imagen')}}"

                              />

                              <input type="hidden" name="MAX_FILE_SIZE" value="10485760"  name="imagen2"/>
                              <span
                                class="custom-file-container__custom-file__custom-file-control"
                              ></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                          </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="card  btnFormulario ">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btnSub">Subir Producto</button>
            </div>
        </div>
    </form>
</div>
