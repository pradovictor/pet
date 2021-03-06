<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

// class WildCardSubdomain {

//     public function handle($request, Closure $next)
//     {
//         $server = explode('.', $request->server('HTTP_HOST'));
//         $clientDatabase = "nitsys_".$server[0];
//         $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?";
//         $db = DB::select($query, [$clientDatabase]);
//         if(!empty($db)) {
//             if ("dev" === $server[0]) {
//                 Config::set("app.url", "//".$server[0].".".config("app.url"));
//             }
//             else {
//                 Config::set("app.url", "https://".$server[0].".".config("app.url"));
//             }
//             // Config::set("database.connections.mysql.database", $clientDatabase);


//             // dev
//             // Config::set("database.connections.mysql.host", "127.0.0.1");
//             // Config::set("database.connections.mysql.port", '3306');
//             // Config::set("database.connections.mysql.database", $clientDatabase);
//             // Config::set("database.connections.mysql.username", 'root');
//             // Config::set("database.connections.mysql.password", '');
//             // Config::set("database.connections.mysql.charset", 'utf8mb4');
//             // Config::set("database.connections.mysql.collation", 'utf8mb4_unicode_ci');

//             // ipen
//             Config::set("database.connections.mysql.host", "52.67.183.126");
//             Config::set("database.connections.mysql.port", '3306');
//             Config::set("database.connections.mysql.database", "nitsys_ipen");
//             Config::set("database.connections.mysql.username", "nitsys_user");
//             Config::set("database.connections.mysql.password", "LO57r6WWMBYHajzt");
//             Config::set("database.connections.mysql.charset", 'utf8mb4');
//             Config::set("database.connections.mysql.collation", 'utf8mb4_unicode_ci');


//             DB::purge('mysql');
//         } else {
//             die('NÃO LOCALIZADO');
//         }
//         return $next($request);
//     }
// }

class WildCardSubdomain {

    public function handle($request, Closure $next)
    {
        $server = explode('.', $request->server('HTTP_HOST'));
        $clientName = $server[0];
        // Essa linha deverá
        $clientDatabaseConfig = config('clients.databases.'.$clientName);
        // debugar se a variável $clientDatabaseConfig esta vindo corretamente o cliente
        // print_r($clientDatabaseConfig);
        // die('ccccxxxxxxxxxx===');

        if (!empty($clientDatabaseConfig)) {
          if ("dev" === $server[0])  {  
              //   Config::set("app.url", "//".$server[0].".".config("app.url"));
              // gambi
              Config::set("app.url", "//".$server[0].".".'pet');
          }
          else {
              Config::set("app.url", "https://".$server[0].".".config("app.url"));
          }
          Config::set("database.connections.mysql.host", $clientDatabaseConfig["host"]);
          Config::set("database.connections.mysql.port", $clientDatabaseConfig["port"]);
          Config::set("database.connections.mysql.database", $clientDatabaseConfig["database"]);
          Config::set("database.connections.mysql.username", $clientDatabaseConfig["username"]);
          Config::set("database.connections.mysql.password", $clientDatabaseConfig["password"]);
          Config::set("database.connections.mysql.charset", $clientDatabaseConfig["charset"]);
          Config::set("database.connections.mysql.collation", $clientDatabaseConfig["collation"]);
          DB::purge('mysql');

          // variavel no php para ficar 5 minutos processando, original >> 30
          ini_set('max_execution_time', 302);
        } else {
            die('NÃO LOCALIZADO');
        }
        return $next($request);
    }
}