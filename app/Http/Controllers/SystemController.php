<?php

namespace App\Http\Controllers;
//Funciones
use Illuminate\Http\Request;
use DB;
//MODELOS
use App\Models\Rols;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class SystemController extends Controller
{
    public function index(){
        
        return((String)\View::make("index"));
    }
    public function roles(){
        return $rols = Rols::where('state', 0)
            ->orderBy('description')
            ->get();
    }
    public function dataSave(Request $request){
        
        $document = $request->input("document");
        $email = $request->input("email");
        $country= explode("-",$request->input("country"));  
        $country=$request->input("country");

        $count = User::where('email', $email)
            ->where('document', $document )
            ->count();
        if($count == 0){
            try {
                $user = new User;
                $user->document = $document;
                $user->name = $request->input("name");
                $user->last_name = $request->input("lastName");
                $user->email = $email;
                $user->phone = $request->input("phone");
                $user->country = $country;
                $user->address = $request->input("address");
                $user->id_rol = $request->input("selectRol");
                $user->save();
                DB::commit();
                $this->envioEmail($email,$request->input("name"),$request->input("lastName"));
                return '|1|ATENCIÓN...!. La información ha sido registrada correctamente.';
            } catch (\Exception $e) {
                DB::rollback();
                return '|0|Problema al insetar los datos en el sistema.|'.$e;
            }
        }else{
            return '|0|Documento o Email ya registrado en el sistema.';
        }
    }
    public function envioEmail($email,$name,$lastName){
        try {
            //1) Envio de correo a cliente
            $mensaje ="Buen dia $name $lastName <br>";
            $mensaje.="Por medio del presente mensaje se le notifica la creacion exitosa de su usuarios en la plataforma solicitada.<br><br>";
            $mensaje.="<center><small>IMPORTANTE:Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes</small></center>";
            $data = array('email' => $email,'subject' => 'Registro como nuevo usuario','mensaje' => $mensaje);
            Mail::send('plantillaEmail.emailUsuario', $data, function ($message) use ($data) {
                $message->from('grmlTest@gmail.com', 'Gml test');
                $message->subject($data['subject']);
            });
            //2) Envio de correo a Admin con lista de registros
            $adminEmail = env('ADMIN_EMAIL');
            $contadorCiudades = User::select('country', DB::raw('count(*) as total'))
                ->groupBy('country')
                ->get();
            $mensaje ="Buen dia <br>";
            $mensaje.="Por medio del presente mensaje se le notifica el historial de registros.<br><br>";
            $data = array('email' => $adminEmail,
                'subject' => 'Historial de registro',
                'mensaje' => $mensaje,
                'contadorCiudades' => $contadorCiudades
            );
            Mail::send('plantillaEmail.emailAdmin', $data, function ($message) use ($data) {
                $message->from('grmlTest@gmail.com', 'Gml test');
                $message->subject($data['subject']);
            });
        } catch (\Exception $e) {
            echo '|0|Problema al enviar el correo electronico|'.$e;
        }
    }
    //VIEW MODAL PARA EL REGISTRO DE DATOS DE UN NUEVO USDUARIO
    public function userInfo(Request $request){
        //Capturar numero de documento de la peticion
        $document = $request->input("userId");
        //Extraer informacion
        $userInformation= User::join('rols', 'users.id_rol', '=', 'rols.id')
            ->where('document',$document)
            ->get();
        //Crear array con data para retornar
        $data=array(
            "userInformation"=>$userInformation,
        );
        //Retornar vista 
        return((String)\View::make("modal.userInformation", array("data" => $data)));
    }
}
