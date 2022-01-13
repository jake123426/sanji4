<div>



    <div>
        <form action="{{ route('storenotificar') }}" enctype="multipart/form-data" method="POST">
            @csrf
        <div class="card shadow formulario ">
            <div class="card-body">
                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 info">
                        Mensage de Notificación
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <label for="descripcion" class="form-label la">Mensage</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" wire:model="descripcion"></textarea>
                    </div>
                    {{-- Etiquetas start --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3" wire:ignore>
                        <label style="display: block" for="tags" class="form-label la">Usuarios:</label>
                        <button class="selec" wire:click="notificar">Enviar A Todos</button>


                        <div class="tags-input" data-name="tags"></div>

                    </div>
                    {{-- Etiquetas end --}}
                </div>
            </div>
        </div>


        <div class="card  btnFormulario ">
            <div class="card-body">
                <button class="btn btn-primary btnSub">Enviar Notificación</button>
            </div>

        </div>
    </form>
    <div class="card  btnFormulario ">
        <div class="card-body">
            <button class="btn btn-primary btnSub" wire:click="notificar">Enviar A Todos</button>
        </div>

    </div>

    </div>


</div>
