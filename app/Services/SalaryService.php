<?php

namespace App\Services;

class SalaryService
{
    const MINIMOS_DIAS_TRABAJO = 30;

    /**
     * @param array $data
     * @return array
     */
    public function handle(array $data)
    {
        $salarioBase = data_get($data, 'salario_base');
        $diasTrabajados = data_get($data, 'dias_trabajados');
        $valorVentas = data_get($data, 'valor_ventas');
        $porcentajeProrrateo = 1;

        $comisionesGanadas = $this->calcularComisiones($salarioBase, $valorVentas);

        if ($diasTrabajados < self::MINIMOS_DIAS_TRABAJO){
            $porcentajeProrrateo = $diasTrabajados/self::MINIMOS_DIAS_TRABAJO ;
        }

        $salarioTotal = ($salarioBase * $porcentajeProrrateo) + $comisionesGanadas;

        return [
            'salario_base' => $salarioBase,
            'dias_trabajados' => $diasTrabajados,
            'valor_ventas' => is_null($valorVentas) ? 0 : $valorVentas,
            'salario_calculado' => round($salarioTotal, 2),
            'comisiones_ganadas' => round($comisionesGanadas, 2),
            'porcentaje_prorrateo' => round($porcentajeProrrateo * 100, 2),
        ];
    }

    /**
     * @param float $salario_base
     * @param int|null $valor_ventas
     * @return float
     */
    public function calcularComisiones(float $salario_base, ?int $valor_ventas)
    {
        $valorVentas = is_null($valor_ventas) ? 0 : $valor_ventas;

        if($valorVentas <= 1000){
            $comisionesGanadas = $salario_base * 0.01;
        } elseif ($valorVentas > 1000 && $valor_ventas <= 5000){
            $comisionesGanadas = $salario_base * 0.05;
        }else {
            $comisionesGanadas = $salario_base * 0.1;
        }

        return $comisionesGanadas;
    }
}
