<?php

namespace App\Repositories\Patients;

use App\Models\Patient;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class PatientRepository
{
    public function getData()
    {
        return  DB::select(" SELECT
            SUM(count_same_slot) AS total_count_same_slot,
            type
        FROM (
            SELECT
                COUNT(*) AS count_same_slot,
                tab_product_categories.type
            FROM
                tab_pro_slot
            INNER JOIN
                tab_product_slot ON tab_pro_slot.slot_num = tab_product_slot.slot
            INNER JOIN
                tab_products ON tab_pro_slot.pro_id = tab_products.id
            INNER JOIN
                tab_product_categories ON tab_products.id_pro_categories = tab_product_categories.id
            GROUP BY
                tab_pro_slot.slot_num,
                tab_product_slot.slot,
                tab_products.id,
                tab_pro_slot.pro_id,
                tab_product_categories.type
        ) AS subquery
        GROUP BY
            type;
    ");
    }

    public function getDatatop()
    {
        return DB::select(" SELECT
            total_count_same_slot,
            p_name
        FROM (
            SELECT
                SUM(count_same_slot) AS total_count_same_slot,
                p_name
            FROM (
                SELECT
                    COUNT(*) AS count_same_slot,
                    tab_products.p_name
                FROM
                    tab_pro_slot
                INNER JOIN
                    tab_product_slot ON tab_pro_slot.slot_num = tab_product_slot.slot
                INNER JOIN
                    tab_products ON tab_pro_slot.pro_id = tab_products.id
                INNER JOIN
                    tab_product_categories ON tab_products.id_pro_categories = tab_product_categories.id
                GROUP BY
                    tab_pro_slot.slot_num,
                    tab_product_slot.slot,
                    tab_products.id,
                    tab_pro_slot.pro_id,
                    tab_products.p_name
            ) AS subquery
            GROUP BY
                p_name
        ) AS result
        ORDER BY
            total_count_same_slot DESC
        LIMIT
            5
    ");
    }
    public function gettopNum()
    {
        $number_top = 1;
        $results = collect($this->getDatatop())->map(function ($item) use (&$number_top) {
            $item->number_top = $number_top++;
            return $item;
        });

        return $results;
    }
}
