<div>


    <section class="payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2>Realizar Pago</h2>
                <p>Muchos beneficios te espera, no pierdas esta oportunidad de impulsar tu negocio.</p>
            </div>
            <form action="{{ route('suscripcion.store') }}"  method="POST">
                @csrf
                <div class="products">
                    <h3 class="title">Suscripción</h3>
                    <div class="item">
                        <span class="price" id="precio" name="precio">$ {{$precio}}</span>
                        <p class="item-name">Usuario Pro</p>
                        <p class="item-description" name="tiempo">Plan {{$tiempo}} sin limites</p>
                    </div>

                    <div class="total">Total<span class="price">$ {{$precio}}</span></div>
                </div>
                <div class="card-details">
                    <h3 class="title">Tarjeta de Debito/Credito</h3>
                    <div class="row">
                        <div class="form-group col-sm-7">
                            <label for="card-holder">Nombre</label>
                            <input id="card-holder" type="text" class="form-control" placeholder="Nombre"
                                aria-label="Card Holder" aria-describedby="basic-addon1" wire:model="nombre" required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="">Fecha de Expiración</label>
                            <div class="input-group expiration-date">
                                <input type="text" class="form-control" placeholder="Mes" aria-label="MM"
                                    aria-describedby="basic-addon1" wire:model="mes" required>
                                <span class="date-separator">/</span>
                                <input type="text" class="form-control" placeholder="Año" aria-label="YY"
                                    aria-describedby="basic-addon1" wire:model="year" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-8">
                            <label for="card-number">Numero de la Tarjeta</label>
                            <input id="card-number" type="text" class="form-control" placeholder="Numero de la Tarjeta"
                                aria-label="Card Holder" aria-describedby="basic-addon1" wire:model="numero" maxlength="16" required >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="cvc">CVC</label>
                            <input id="cvc" type="text" class="form-control" placeholder="CVC"
                                aria-label="Card Holder" aria-describedby="basic-addon1" wire:model="cvc"  maxlength="3"  required>
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="button" class="btn btn-primary btn-block" wire:click="pagar">Pagar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
