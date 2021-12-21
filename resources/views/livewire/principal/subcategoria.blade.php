<div>
    <div>
        <section class="navbar">
            <div style="display: flex">
              <div class="search-container">
                <input type="text"
                  placeholder="Buscar..."
                  class="search-input"
                  aria-autocomplete="none"
                  wire:model="search1"
                  class="search-btn"
                />

                  <i class="fas fa-search fa-lg"></i>
                </a>
              </div>
            </div>
            <div class="options-container">
              <a style="display: none;" href="#" class="modal__bg"></a>




              <div  class="option-item">
                <a onclick="miFuncion(this)" class="op" href="#">Precio <i class="fas fa-angle-down"></i></a>
                <div style="display: none;" class="contenedor">
                  <div class="contenedor-title">¿Cuanto deseas pagar?</div>
                  <div class="contenedor-body">
                    <div>
                      <p class="cont-p">Desde</p>
                      <input class="cont-input" type="number" value="500" aria-colspan="0" wire:modal="inicio">
                    </div>
                    <div style="margin-left: 1rem;">
                      <p class="cont-p">Hasta</p>
                      <input class="cont-input" type="number" placeholder="Sin limite" value="9999" wire:modal="final">
                    </div>
                  </div>
                  <div class="contenedor-footer">
                    <button onclick="cerrar(this)" class="botonf">Cerrar</button>
                    <button class="botonf" wire:click="buscarprecio">Aplicar</button>
                  </div>
                </div>
              </div>

                   <div class="option-item">
                <a onclick="miFuncion(this)" class="op" href="#">Estado del producto <i class="fas fa-angle-down"></i></a>
                <div style="display: none;" class="contenedor">
                  <select class="contenedor-title" wire:model="estado">
                      <option></option>
                   <option> <p class="ite">En caja</p></option>
                   <option> <p class="ite" >Nuevo</p></option>
                   <option> <p class="ite" >Semi-nuevo</p></option>
                   <option> <p class="ite">En buen estado</p></option>
                   <option> <p class="ite">Usado</p></option>
                   <option> <p class="ite">Condiciones aceptables</p></option>
                  </select>
                  <div class="contenedor-footer">
                    <button onclick="cerrar(this)" class="botonf">Cerrar</button>
                  </div>
                </div>
              </div>

              <div class="option-item">
                <a class="op" href="{{ route('anuncios.create') }}">Crear Anuncio<i class="fas fa-angle-down"></i></a>
              </div>

              <div class="option-item">
                <a class="op" href="{{ route('misanuncio.misanuncios') }}">Mis Anuncios<i class="fas fa-angle-down"></i></a>
              </div>
            </div>


          </section>



          <section class="menu" id="menu">
              <h3 class="sub-heading">Productos o Servicios</h3>


              <div class="box-container">
                @foreach ($anuncios as $anuncio)
                <div class="box">

                  <div class="image">
                    <img src="{{ asset(Storage::url($anuncio->imagen()->first()->url)) }}" alt="" />
                    <a href="#" class="fas fa-heart"></a>
                  </div>
                  <div class="content">
                    <div class="stars">
                        @for ($id=1;$id<$anuncio->puntuacion;$id++)
                        <i class="fas fa-star"></i>
                        @endfor


                    </div>
                    <h3>{{$anuncio->nombre}}</h3>
                    <p>{{$anuncio->descripcion}}</p>

                    <a href="{{ route('anuncios.show', [ $anuncio->id]) }}" class="botonsimple">Ver Detalles</a>
                    <span class="price">Bs {{$anuncio->precio}}</span>
                  </div>

                </div>
                @endforeach
              </div>

            </section>
    </div>
</div>
