<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\IEstrategiaWmsService;

class EstrategiaWmsController extends Controller
{
    protected $estrategiaWmsService;

    public function __construct(IEstrategiaWmsService $estrategiaWmsService)
    {
        $this->estrategiaWmsService = $estrategiaWmsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estrategias = $this->estrategiaWmsService->getAll();
        return response()->json($estrategias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $estrategia = $this->estrategiaWmsService->create([
                'ds_estrategia_wms' => $data['dsEstrategia'],
                'nr_prioridade' => $data['nrPrioridade'],
                'dt_registro' => now(),
            ]);

            foreach ($data['horarios'] as $horario) {
                $this->estrategiaWmsService->createHorarioPrioridade([
                    'cd_estrategia_wms' => $estrategia->cd_estrategia_wms,
                    'ds_horario_inicio' => $horario['dsHorarioInicio'],
                    'ds_horario_final' => $horario['dsHorarioFinal'],
                    'nr_prioridade' => $horario['nrPrioridade'],
                ]);
            }

            return response()->json([
                'message' => 'Estratégia e horários criados com sucesso',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar estratégia e horários.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showPrioridade($cdEstrategia, $hora, $minuto)
    {
        // Validacao de hora
        if (!$this->isValidTimeFormat($hora, $minuto)) {
            return response()->json([
                'message' => 'Formato de hora ou minuto inválido.',
            ], 400);
        }

        $prioridade = $this->estrategiaWmsService->getPrioridade($cdEstrategia, $hora, $minuto);

        return response()->json([
            'prioridade' => $prioridade
        ], 200);
    }

    private function isValidTimeFormat($hora, $minuto)
    {
        return is_numeric($hora) && is_numeric($minuto) && $hora >= 0 && $hora <= 23 && $minuto >= 0 && $minuto <= 59;
    }
}
