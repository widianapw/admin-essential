<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $fillable = ["id_user","jenis","nominal","deskripsi"];
    protected $primaryKey = "id";
    protected $table = "tb_keuangan";
}
