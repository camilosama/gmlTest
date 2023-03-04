$(document).ready(async function() {
    //Extraccion de roles 
    llamarTipoRol();
    //Extraccion de Api Country
    const countriesName = await getCounties();
    const select = document.getElementById('countries');
    for (var i = 0; i<=countriesName.length; i++){
        var opt = document.createElement('option');
        opt.value =  countriesName[i].name+'-'+countriesName[i].id+'-'+countriesName[i].flag;
        opt.innerHTML = countriesName[i].name;
        select.appendChild(opt);
    };
});

const getCounties = async() =>{
    //Definicio de contenedor y llamado a url
    const countriesName = [];
    const url = `https://restcountries.com/v3.1/region/Americas`;    
    const rsp = await fetch(url);
    const data = await rsp.json();
    //Adicionar elementos de boject a Array
    data?.forEach((item) => {
        countriesName.push({name:item.name.common, id:item.cca2, flag:item.flag})
    })
    //Retornar lista de paises
    return countriesName 
}


const registroDatos = () => {
    $.ajax({
        type: "POST",
        url: "/dataSave",
        dataType: 'text',
        data: $("#frmRegistroDatos").serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend:function(){
            llamarNotyTime('info','Cargando Informacion ...','topRight',5000);
        },
        success: function(r){
            var datUsr=r.split("|");
            var valor=datUsr[1];
            var msg=datUsr[2];
            if(valor==0) {
                var msg="<b>"+msg+"</b>";
                llamarNotyTime('error',msg,'topRight',5000);
            }else{
                var msg="<b>"+msg+"</b>";
                new Noty({
                    text: msg,
                    type: 'success',
                    layout: 'center',
                    theme: 'bootstrap-v4',
                    killer:true,
                    progressBar:true,
                    timeout:5000,
                    callbacks: {
                        afterClose: function() {
                            $('#modal').modal('toggle');
                            document.getElementById("frmRegistroDatos").reset(); 
                        },
                    }
                }).show();
            }
        }
    });
}

const llamarTipoRol = () => {
    $.ajax({
        type: "GET",
        dataType: 'json',
        url:'/roles',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(response){
            for (var i = 0; i<=response.length; i++){
                $("#selectRol").append(new Option(response[i].description, response[i].id));
            };
        },
    })
}

const llamarNotyTime = (type,msg,layout,timeout) => {
    new Noty({
        text: msg,
        type: type,
        layout: layout,
        theme: 'bootstrap-v4',
        killer: true,
        progressBar: true,
        timeout: timeout
    }).show();
}


const userInfo = () =>{
    const userId = $("#documentFind").val();
    $.ajax({
        url:'userInfo',
        type:"POST",
        data: {userId:userId},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend:function(){
            llamarNotyTime('info','Cargando Informacion ...','topRight',5000);
        },
        success:function(respuesta){
            Noty.closeAll();
            $("#responseUserInfo").html(respuesta);
        },
    })
}