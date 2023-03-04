@extends('main')

@section('title','DATOS DEL DE CIUDADANO')

@section('AddScritpHeader')

@endsection

@section('content')

    <div class="container mt-1">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        ° Registrar usuario
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form name="frmRegistroDatos" id="frmRegistroDatos" method="POST" enctype="multipart/form-data"  onKeyPress="return disableEnterKey(event)" onsubmit="return false;">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  validate[required,custom[onlyNumberSp],minSize[4],maxSize[10]]" name="document" id="document" placeholder="Documento">
                                        <label for="floatingInput">Documento <span class="Required">*</span></label>
                                    </div>        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select validate[required]" name="selectRol" id="selectRol" aria-label="Categoria">
                                            <option value="" selected>-Seleccione una categortias-</option>
                                        </select>
                                        <label for="selectRol">Categoria</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control validate[required,minSize[3]]" name="name" id="name" placeholder="Nombres">
                                        <label for="floatingInput">Nombres <span class="Required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  validate[required,minSize[3]]" name="lastName" id="lastName" placeholder="Apellidos">
                                        <label for="floatingInput">Apellidos <span class="Required">*</span></label>
                                    </div>       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  validate[required,custom[email]]" name="email" id="email" placeholder="Email">
                                        <label for="floatingInput">Email <span class="Required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  validate[required,custom[onlyNumberSp],minSize[10],maxSize[10]]" name="phone" id="phone" placeholder="Celular">
                                        <label for="floatingInput">Celular <span class="Required">*</span></label>
                                    </div>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" list="countries" class="form-control  validate[required]" name="country" id="country" placeholder="Pais">
                                        <datalist id="countries"></datalist>
                                        <label for="floatingInput">Pais <span class="Required">*</span></label>
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  validate[required]" name="address" id="address" placeholder="Direccion">
                                        <label for="floatingInput">Direccion <span class="Required">*</span></label>
                                    </div>            
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="d-grid gap-2">
                                        <input class="btn btn-primary" type="submit" value="Registrar" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-danger" type="reset">Limpiar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    ° Buscar Usuarios
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="documentFind" id="documentFind" placeholder="Documento">
                                    <label for="floatingInput">Numero de documento a buscar<span class="Required">*</span></label>
                                </div>        
                            </div>
                            <div class="col-md-6">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="button" onClick="userInfo()"> Buscar</button>
                                </div>
                            </div>
                        </div> 
                        <div class="row mt-2">
                            <div id="responseUserInfo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('AddScriptFooter')
<script>
    //Validador de registro
    $("#frmRegistroDatos").validationEngine('attach',{
        onValidationComplete:function(form, status) {
            if (status === true) {
                registroDatos();
            } else {
                llamarNotyTime('error','<b>Datos pendientes por diligenciar en el formulario</b>','topRight',2000);
                return;
            }
        }
    });
</script>
@endsection