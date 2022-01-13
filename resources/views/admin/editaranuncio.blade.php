@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    <h1 class="titulo">Producto o Servicio</h1>

@stop

@section('content')
@livewire('admin.editaranuncio', [ 'anuncio' => $anuncio])
@stop


@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> --}}

    <link rel="stylesheet" type="text/css"
        href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap");

        :root {
            --green: #adc5ea;
            --black: #192a56;
            --light-color: #666;
        }

        *{
            text-decoration: none !important;
        }

        .titulo {
            color: var(--black);
        }

        .info {
            color: var(--black);
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .formulario {
            max-width: 70%;
            margin: auto;
            margin-bottom: 2rem;
            /* background: rgba(255, 255, 255, 0); */
        }

        .la {
            color: var(--green);
        }

        .btnFormulario {
            max-width: 60%;
            margin: auto;
            border: none;
            box-shadow: none;
            background: rgba(255, 255, 255, 0);
        }

        .btnSub {
            /* margin-top: 1.5rem; */
            background: var(--black);
            border: 0px;
            border-radius: 4rem;
            padding: 0.8rem 3rem;
            font-size: 1.3rem;
        }

        .btnSub:hover {
            background: var(--green);
        }


        .custom-file-container {
            max-width: 100%;
            margin: 0 auto;
            font-size: 0.8rem;
            font-weight: lighter;
            color: var(--green);
        }
        /* --------- Imagenes Start ------------------*/
        .imagen{
            max-width: 100%;
            height: 7rem;
        }

        .delete{
            text-decoration: none;
            font-size: 1.3rem;
            color: var(--black);
            font-weight: bold;
        }
        /* --------- Imagenes End ------------------*/

        /*----------- Tags style start ---------------*/
        .tags-input {
            border: 1px solid rgb(199, 199, 199);
            border-radius: 0.3rem;
           /*  height: 3.1rem; */
            box-shadow: 0 .125rem 0.25rem rgba(0, 0, 0, .075) !important;
            max-width: 100%;
            min-width: 100%;
        }

        .tags-input .tag {
            font-weight: 400;
            font-size: 95%;
            padding: 0.5em 0.75em;
            margin: 0.3em 0.2em;
            display: inline-block;
            background-color: rgb(231, 230, 230);
            transition: all 0.1s linear;
            cursor: pointer;
            border-radius: 2rem;
        }

        .tags-input .tag:hover {
            background-color: var(--green);
            color: white;
        }

        .tags-input .tag .close::after {
            content: '×';
            position: relative;
            font-weight: bold;
            display: inline-block;
            transform: scale(1);
            margin-left: 0.4em;
            top: -0.2rem;
        }

        .tags-input .tag .close:hover::after {
            color: red;
        }

        .tags-input .main-input {
            border: 0;
            outline: 0;
            padding: 0.5em 0.1em;
        }

        /*----------- Tags style end ---------------*/
        @media (max-width: 1024px) {

            .formulario {
                max-width: 95%;
            }

        }

        @media (max-width: 760px) {

            .formulario {
                max-width: 100%;
            }
            .content,
            .container-fluid {
                padding: 0 !important;
            }
            .container {
                max-width: 100%;
                padding: 0;

            }

        }

        @media (max-width: 575px) {
            .imagen{
                height: 100%;
            }
        }

        @media (max-width: 450px) {


        }

    </style>

@stop

@section('js')

    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>

    <script>
        var upload = new FileUploadWithPreview("myUniqueUploadId");

        // --------------Etiquetas Script start------------------------------
        [].forEach.call(document.getElementsByClassName('tags-input'), function(el) {
            let hiddenInput = document.createElement('input'),
                mainInput = document.createElement('input'),
                tags = [];

            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', el.getAttribute('data-name'));

            mainInput.setAttribute('type', 'text');
            mainInput.classList.add('main-input');
            mainInput.addEventListener('input', function() {
                let enteredTags = mainInput.value.split(',');
                if (enteredTags.length > 1) {
                    enteredTags.forEach(function(t) {
                        let filteredTag = filterTag(t);
                        if (filteredTag.length > 0)
                            addTag(filteredTag);
                    });
                    mainInput.value = '';
                }
            });

            mainInput.addEventListener('keydown', function(e) {
                let keyCode = e.which || e.keyCode;
                if (keyCode === 8 && mainInput.value.length === 0 && tags.length > 0) {
                    removeTag(tags.length - 1);
                }
            });

            el.appendChild(mainInput);
            el.appendChild(hiddenInput);

            @foreach ($anuncio->etiqueta()->get() as $tag )
            addTag('{{$tag->nombre}}');
            @endforeach


            function addTag(text) {
                let tag = {
                    text: text,
                    element: document.createElement('span'),
                };

                tag.element.classList.add('tag');
                tag.element.textContent = tag.text;

                let closeBtn = document.createElement('span');
                closeBtn.classList.add('close');
                closeBtn.addEventListener('click', function() {
                    removeTag(tags.indexOf(tag));
                });
                tag.element.appendChild(closeBtn);

                    tags.push(tag);

                    el.insertBefore(tag.element, mainInput);

                    refreshTags();


            }

            function removeTag(index) {
                let tag = tags[index];
                tags.splice(index, 1);
                el.removeChild(tag.element);
                mainInput.setAttribute('type', 'text');
                refreshTags();
            }

            function refreshTags() {
                let tagsList = [];
                tags.forEach(function(t) {
                    tagsList.push(t.text);
                });
                hiddenInput.value = tagsList.join(',');
            }

            function filterTag(tag) {
                return tag.replace(/[^\w-]/g, '').trim().replace(/\W+/g, '-');
            }
        });
        //---------------------Etiquetas script end --------------------------
    </script>
@stop
