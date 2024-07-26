<?php
namespace App\Interfaces;

use App\Models\EstrategiaWms;
use App\Models\EstrategiaWmsHorarioPrioridade;

interface IEstrategiaWmsService
{
    /**
     * Obtem todas as estrategias WMS.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * Armazena uma nova estrategia WMS.
     *
     * @param array $data
     * @return EstrategiaWms
     */
    public function create(array $data);

    /**
     * Obtem uma estrategia WMS especifica
     *
     * @param int $id
     * @return EstrategiaWms|null
     */
    public function getById(int $id);

    /**
     * Atualiza uma estrategia WMS especifica
     *
     * @param int $id
     * @param array $data
     * @return EstrategiaWms|null
     */
    public function update(int $id, array $data);

    /**
     * Remove uma estrategia WMS especifica
     *
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id);

    /**
     * Obtem todos os horarios de prioridade para uma estrategia WMS
     *
     * @param int $estrategiaId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getHorariosPrioridade(int $estrategiaId);

    /**
     * Armazena um novo horario de prioridade
     *
     * @param array $data
     * @return EstrategiaWmsHorarioPrioridade
     */
    public function createHorarioPrioridade(array $data);

    /**
     * Atualiza um horario de prioridade especifico
     *
     * @param int $id
     * @param array $data
     * @return EstrategiaWmsHorarioPrioridade|null
     */
    public function updateHorarioPrioridade(int $id, array $data);

    /**
     * Remove um horario de prioridade especifico
     *
     * @param int $id
     * @return bool|null
     */
    public function deleteHorarioPrioridade(int $id);

    /**
     * Retorna prioridade para determinado horario ou default caso nao exista
     *
     * @param int $cdEstrategia
     * @param int $hora
     * @param int $minuto
     * @return int prioridade
     */
    public function getPrioridade($cdEstrategia, $hora, $minuto);
}
