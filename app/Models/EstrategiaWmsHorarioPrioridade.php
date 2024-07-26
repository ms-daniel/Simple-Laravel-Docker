<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstrategiaWmsHorarioPrioridade extends Model
{
    use HasFactory;

    protected $table = 'tb_estrategia_wms_horario_prioridade';
    protected $primaryKey = 'cd_estrategia_wms_horario_prioridade';

    protected $fillable = [
        'cd_estrategia_wms',
        'ds_horario_inicio',
        'ds_horario_final',
        'nr_prioridade',
    ];

    const CREATED_AT = 'dt_registro';
    const UPDATED_AT = 'dt_modificado';

    public function estrategiaWms(): BelongsTo
    {
        return $this->belongsTo(EstrategiaWms::class, 'cd_estrategia_wms', 'cd_estrategia_wms');
    }
}
