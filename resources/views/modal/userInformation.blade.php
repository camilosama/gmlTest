<script type="text/javascript">
    $('#modal').modal('show');
</script>

<div class="modal" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">

            <div class="modal-header btn-primary">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h5 class="modal-title" id="exampleModalLabel">Datos del usuario</h5>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>    
                </div>
            </div>
            <div class="modal-body">
                <center>
                @foreach ($data['userInformation'] as $info)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$info->name}} {{$info->last_name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Country: {{$info->country}}</h6>
                            <p class="card-text">Direcion: {{$info->address}}</p>
                            <p class="card-text">Telefono: {{$info->phone}}</p>
                            <p class="card-text">Email: {{$info->email}}</p>
                            <p class="card-text">Rol: {{$info->description}}</p>
                        </div>
                    </div>
                @endforeach
                </center>
            </div>
        </div>
    </div>
</div>
