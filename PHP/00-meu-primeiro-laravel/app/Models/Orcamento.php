<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Orcamento extends Model
{
    protected $fillable = ['cliente_id', 'valor_hora', 'total_horas', 'valor_final'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
