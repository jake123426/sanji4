<div>

    <div class="container tamaño">
        <div class="row">
            @foreach ($opiniones as $opinion)

                @foreach ($opinion->opinion()->get() as $opi)


                    <div class="col-md-12 shadow">
                        <div class="media g-mb-30 media-comment mt-5">
                            <!-- aqui pones las imagen del user-->
                            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                                @isset($coment[$loop->index]->foto)
                                src="{{ asset(Storage::url($coment[$loop->index]->foto)) }}" @else
                                src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" @endisset
                                alt="Image Description">
                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    <h5 class="h5 g-color-gray-dark-v1 mb-0 nombre">{{ $coment[$loop->index]->nombre }}</h5>
                                    <div style="width: 50%;">
                                        <span>{{ \Carbon\Carbon::parse($opi->create_at)->format('d-m-Y') }}</span>
                                    </div>
                                </div>

                                <p>{{ $opi->descripcion }}</p>

                                <ul class="list-inline d-sm-flex my-0">
                                    <li class="list-inline-item g-mr-20">
                                        @for ($id = 1; $id <= 5; $id++)
                                            @if ($id <= $opi->puntuacion)
                                                <i class="fa fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                                            @else
                                                <i class="far fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                                            @endif

                                        @endfor



                                    </li>

                                    <li class="list-inline-item ml-auto">
                                        <i class="fas fa-bullhorn g-pos-rel g-top-1 g-mr-3"></i>

                                        <span>Publicación: <strong>{{ $opinion->nombre }}</strong></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

        </div>
    </div>

</div>
