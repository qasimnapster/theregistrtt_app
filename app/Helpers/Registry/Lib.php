<?php
//app/Helpers/Registry/Lib.php
namespace App\Helpers\Registry;
 
use Illuminate\Support\Facades\DB;
 
class Lib {
    public static function get_registry_types() {
        return DB::table('registry_types')->select()->get();
    }
}