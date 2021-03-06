<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

// registro usuarios
use App\Acesso;
use Illuminate\Support\Facades\Auth;

class Usuario extends Authenticatable
{
    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = array(
        'email',
        'cpf',
        'password',
        'nome',
        'comunicado',
        'areapesquisador',
        'tecnologia',
        'remember_token',
        'updated_at',
        'created_at',
        'deleted_at',
        'reseta_senha',
    );

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function nits() {
        return $this->belongsToMany("App\Nit", "usuario_nit", "usuario_id", "nit_id")->using("App\UsuarioNit");
    }


    public function permissoes() {
        return DB::table($this->table)
            ->join('usuario_permissao',$this->table.".id", '=', 'usuario_permissao.usuario_id')
            ->where($this->table.".id", '=', $this->id)
            ->get();
    }


    public function hasNit($nitID) {
        foreach($this->nits as $nit) {
            if ($nitID === $nit->id) {
                return true;
            }
        }
        return false;
    }
    
    public function hasAtLeastOneNit() {
        return (sizeof($this->nits) !== 0);
    }

    public function hasPermissao($permissaoIdentificador) {
        foreach($this->permissoes() as $usuario_permissao) {
            if ($permissaoIdentificador === $usuario_permissao->permissao_identificador) {
                return true;
            }
        }
        return false;
    }

    // registro usuarios
    public function accesses(){
        return $this->hasMany(Acesso::class);
    }
    public function registerAccessIn()
    {
        // TESTE **********
//         $ip = $_SERVER['REMOTE_ADDR'];
//         print_r($ip); 
//         echo'<br>'; echo'<br>';
//         $dados = 'http://ip-api.com/php/'.$ip;
//         $usuario = @unserialize(file_get_contents($dados));
// var_dump($usuario);
// echo'<br>'; echo'<br>';
// print_r($usuario);
        // echo'<br>';echo'<br>';
        // $query = '>>> Seu IP: '.$usuario['query'];
        // print_r($query); echo'<br>';

        // $pais = '>>> Pais: '.$usuario['country'];
        // print_r($pais); echo'<br>';

        // $regiao = '>>> Estado: '.$usuario['region'];
        // print_r($regiao); echo'<br>';

        // $regiaonome = '>>> Estado - nome: '.$usuario['regionName'];
        // print_r($regiaonome); echo'<br>';

        // $cidade = '>>> Cidade: '.$usuario['city'];
        // print_r($cidade); echo'<br>';

        // $zip = '>>> Cep: '.$usuario['zip'];
        // print_r($zip); echo'<br>';

        // $lat = '>>> Latitude: '.$usuario['lat'];
        // print_r($lat); echo'<br>';

        // $lon = '>>> Longitude: '.$usuario['lon'];
        // print_r($lon); echo'<br>';

        // $fuso = '>>> Fuso/horario: '.$usuario['timezone'];
        // print_r($fuso); echo'<br>';

        // $isp = '>>> Serviço: '.$usuario['isp'];
        // print_r($isp); echo'<br>';

        // $org = '>>> Organização: '.$usuario['org'];
        // print_r($org); echo'<br>';

        // $as = '>>> AS: '.$usuario['as'];
        // print_r($as); echo'<br>';   

        // die('===============');
        
        // Cadastra na tabela acesso um novo registro com as informações do usuário logado + data e hora
        if (Auth::user()->email <> 'victor_prado@icloud.com') {
        return $this->accesses()->create([
            'usuario_id'   => $this->id,
            // 'datetime'  => date('YmdHis'),
            'data' => date('d/m/Y'),
            'hora' => date('H:i:s'),
            'nome' => Auth::user()->nome,
            'usuario' => Auth::user()->email,
            'tipo' => 'entra',
        ]);
        }
        
    }
    public function registerAccessOut()
    {
        // Cadastra na tabela acesso um novo registro com as informações do usuário logado + data e hora
        if (Auth::user()->email <> 'victor_prado@icloud.com') {
        return $this->accesses()->create([
            'usuario_id'   => $this->id,
            // 'datetime'  => date('Y-m-d H:i:s'),
            'data' => date('d/m/Y'),
            'hora' => date('H:i:s'),
            'nome' => Auth::user()->nome,
            'usuario' => Auth::user()->email,
            'tipo' => 'sai',
        ]);
        }
    }



    // fim registra acesso
}