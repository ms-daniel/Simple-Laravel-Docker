<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstrategiaWms extends Model
{
    use HasFactory;

    protected $table = 'tb_estrategia_wms';
    protected $primaryKey = 'cd_estrategia_wms';

    protected $fillable = [
        'ds_estrategia_wms',
        'nr_prioridade',
    ];

    const CREATED_AT = 'dt_registro';
    const UPDATED_AT = 'dt_modificado';

    public function estrategiaWmsHorarioPrioridade(): HasMany
    {
        return $this->hasMany(EstrategiaWmsHorarioPrioridade::class);
    }
}
