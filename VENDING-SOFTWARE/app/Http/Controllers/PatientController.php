<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\FillterResource;
use App\Http\Resources\PatientOnWebResource;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatienttopResource;
use App\Models\Patient;
use App\Repositories\Patients\PatientRepository;
use App\Rules\PatientValidation;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    private $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list =  $this->patientRepository->getData();

        return PatientResource::collection($list)->additional(
            [
                'message' => true,
                'httpCode' => Response::HTTP_OK,
            ]
        );
    }
    public function update(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');


        $list =  $this->patientRepository->gettopNum($startDate, $endDate);

        return PatienttopResource::collection($list)->additional([
            'message' => true,
            'httpCode' => Response::HTTP_OK,
        ]);
    }


    public function filterData(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        // If at least one date is provided, filter the data by date
        $filteredData = DB::select("SELECT
                total_count_same_slot,
                p_name,
                price_out,
                price_in,
                created_at,
                date
            FROM (
                SELECT
                    SUM(count_same_slot) AS total_count_same_slot,
                    p_name,
                    price_out,
                    price_in,
                    created_at,
                    date
                FROM (
                    SELECT
                        COUNT(*) AS count_same_slot,
                        tab_products.p_name,
                        tab_product_prices.price_out,
                        tab_product_prices.price_in,
                        tab_pro_slot.created_at,
                        tab_product_slot.date
                    FROM
                        tab_pro_slot
                    INNER JOIN
                        tab_product_slot ON tab_pro_slot.slot_num = tab_product_slot.slot
                    INNER JOIN
                        tab_products ON tab_pro_slot.pro_id = tab_products.id
                    INNER JOIN
                        tab_product_categories ON tab_products.id_pro_categories = tab_product_categories.id
                    LEFT JOIN
                        tab_product_prices ON tab_products.id = tab_product_prices.product_id
                    WHERE
                        tab_product_slot.date BETWEEN ? AND ?
                    GROUP BY
                        tab_pro_slot.slot_num,
                        tab_product_slot.slot,
                        tab_products.id,
                        tab_pro_slot.pro_id,
                        tab_products.p_name,
                        tab_product_prices.price_out,
                        tab_product_prices.price_in,
                        tab_pro_slot.created_at,
                        tab_product_slot.date
                ) AS subquery
                GROUP BY
                    p_name,
                    price_out,
                    price_in,
                    created_at,
                    date
            ) AS result
            ORDER BY
                total_count_same_slot DESC
        ", [$startDate, $endDate]);
        return FillterResource::collection($filteredData)->additional([
            'message' => true,
            'httpCode' => Response::HTTP_OK,
        ]);
    }
    public function filterDataDashbord(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $totalSales = DB::select("SELECT
            SUM(total_count_same_slot) AS total_sales
        FROM (
            SELECT SUM(count_same_slot) AS total_count_same_slot
            FROM (
                SELECT COUNT(*) AS count_same_slot
                FROM tab_pro_slot
                INNER JOIN tab_product_slot ON tab_pro_slot.slot_num = tab_product_slot.slot
                INNER JOIN tab_products ON tab_pro_slot.pro_id = tab_products.id
                INNER JOIN tab_product_categories ON tab_products.id_pro_categories = tab_product_categories.id
                LEFT JOIN tab_product_prices ON tab_products.id = tab_product_prices.product_id
                WHERE tab_product_slot.date BETWEEN ? AND ?
                GROUP BY tab_pro_slot.slot_num, tab_product_slot.slot, tab_products.id
            ) AS subquery
        ) AS result", [$startDate, $endDate]);

        return response()->json(['total_sales' => $totalSales[0]->total_sales]);
    }


    //     public function filterData(Request $request)
    //     {
    //         $startDate = $request->input('start_date');
    //         $endDate = $request->input('end_date');

    //         $filteredData = DB::select(DB::raw("SELECT
    //         SUM(count_same_slot) AS total_count_same_slot,
    //         p_name,
    //         price_out,
    //         price_in,
    //         created_at,
    //         date,
    //         slot
    //     FROM (
    //         SELECT
    //             COUNT(*) AS count_same_slot,
    //             tab_products.p_name,
    //             tab_product_prices.price_out,
    //             tab_product_prices.price_in,
    //             tab_pro_slot.created_at,
    //             tab_product_slot.date,
    //             tab_product_slot.slot
    //         FROM
    //             tab_pro_slot
    //         INNER JOIN
    //             tab_product_slot ON tab_pro_slot.slot_num = tab_product_slot.slot
    //         INNER JOIN
    //             tab_products ON tab_pro_slot.pro_id = tab_products.id
    //         INNER JOIN
    //             tab_product_categories ON tab_products.id_pro_categories = tab_product_categories.id
    //         LEFT JOIN
    //             tab_product_prices ON tab_products.id = tab_product_prices.product_id
    //         WHERE
    //             tab_product_slot.date BETWEEN ? AND ?
    //         GROUP BY
    //             tab_pro_slot.slot_num,
    //             tab_product_slot.slot,
    //             tab_products.id,
    //             tab_pro_slot.pro_id,
    //             tab_products.p_name,
    //             tab_product_prices.price_out,
    //             tab_product_prices.price_in,
    //             tab_pro_slot.created_at,
    //             tab_product_slot.date
    //     ) AS subquery
    //     GROUP BY
    //         p_name,
    //         price_out,
    //         price_in,
    //         created_at,
    //         date,
    //         slot
    // "), [$startDate, $endDate]);

    //         // Sort the results by 'total_count_same_slot' in descending order
    //         usort($filteredData, function ($a, $b) {
    //             return $b->total_count_same_slot - $a->total_count_same_slot;
    //         });

    //         // Convert the results to a collection
    //         $filteredData = collect($filteredData);

    //         return FillterResource::collection($filteredData)->additional([
    //             'message' => true,
    //             'httpCode' => Response::HTTP_OK,
    //         ]);


    //         return FillterResource::collection($filteredData)->additional([
    //             'message' => true,
    //             'httpCode' => Response::HTTP_OK,
    //         ]);
    //     }
}
