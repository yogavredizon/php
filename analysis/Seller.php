<?php

class Seller
{
    public function PredictSales($values)
    {
        if (count($values) < 0) {
            echo "Belum ada data penjualan.";
            return;
        }
        sort($values);
        $count = count($values);
        $middle = floor($count / 2);
        return ($count % 2 === 0)
            ? ($values[$middle - 1] + $values[$middle]) / 2
            : $values[$middle];

        // Lakukan analisis dan prediksi berdasarkan $salesData
    }
}
