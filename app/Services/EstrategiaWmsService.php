<?php

namespace App\Services;

use App\Models\EstrategiaWms;
use App\Models\EstrategiaWmsHorarioPrioridade;
use App\Interfaces\IEstrategiaWmsService;

class EstrategiaWmsService implements IEstrategiaWmsService
{
    protected $estrategiaWmsModel;
    protected $estrategiaWmsHPModel;

    public function __construct(EstrategiaWms $estrategiaWms, EstrategiaWmsHorarioPrioridade $estrategiaWmsHorarioPrioridade)
    {
        $this->estrategiaWmsModel = $estrategiaWms;
        $this->estrategiaWmsHPModel = $estrategiaWmsHorarioPrioridade;
    }

    public function getAll()
    {
        return $this->estrategiaWmsModel->all();
    }

    public function create(array $data)
    {
        return $this->estrategiaWmsModel->create($data);
    }

    public function getById(int $id)
    {
        return $this->estrategiaWmsModel->find($id);
    }

    public function update(int $id, array $data)
    {
        $estrategia = $this->estrategiaWmsModel->find($id);
        if ($estrategia) {
            $estrategia->update($data);
            return $estrategia;
        }
        return null;
    }

    public function delete(int $id)
    {
        $estrategia = $this->estrategiaWmsModel->find($id);
        if ($estrategia) {
            return $estrategia->delete();
        }
        return null;
    }

    public function getHorariosPrioridade(int $estrategiaId)
    {
        return $this->estrategiaWmsHPModel->where('cd_estrategia_wms', $estrategiaId)->get();
    }

    public function createHorarioPrioridade(array $data)
    {
        return $this->estrategiaWmsHPModel->create($data);
    }

    public function updateHorarioPrioridade(int $id, array $data)
    {
        $horario = $this->estrategiaWmsHPModel->find($id);
        if ($horario) {
            $horario->update($data);
            return $horario;
        }
        return null;
    }

    public function deleteHorarioPrioridade(int $id)
    {
        $horario = $this->estrategiaWmsHPModel->find($id);
        if ($horario) {
            return $horario->delete();
        }
        return null;
    }

    public function getPrioridade($cdEstrategia, $hora, $minuto)
    {
        $horaMinuto = sprintf('%02d:%02d', $hora, $minuto);

        $prioridade = $this->estrategiaWmsHPModel
                        ->where('cd_estrategia_wms', $cdEstrategia)
                        ->where('ds_horario_inicio', '<=', $horaMinuto)
                        ->where('ds_horario_final', '>=', $horaMinuto)
                        ->first('nr_prioridade');

        if($prioridade == null){
            $estrategia = $this->getById($cdEstrategia);
            $prioridade['nr_prioridade'] = $estrategia->nr_prioridade;
        }

        return $prioridade['nr_prioridade'];
    }
}
