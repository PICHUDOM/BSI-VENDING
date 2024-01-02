<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\PatientOnWebResource;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Repositories\Patients\PatientRepository;
use App\Rules\PatientValidation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    private $RepositoryPatient;
    public function __construct(PatientRepository $RepositoryPatient)
    {
        $this->PatientRepository = $RepositoryPatient;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($type = 'api')
    {
        $list =  $this->PatientRepository->getData();
        if ($type === 'web') {
            return PatientOnWebResource::collection($list);
        } else {
            return PatientResource::collection($list)->additional(
                [
                    'message' => true,
                    'httpCode' => Response::HTTP_OK,
                ]
            );
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $information = new Patient([
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "phone" => $request->get("phone"),
            "gender" => $request->get("gender"),
            "dob" => $request->get("date_of_birth"),
            "village_id" => $request->get("village_id"),
        ]);
        $information->save();
        return redirect()->back()->with('success', 'Machine data has been saved successfully.');
    }

    protected function getValidator(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                "name" => 'required',
                "email" => 'required|email',
                "gender" => 'required',
                "phone" => 'required',
                "date_of_birth" => ['required', new PatientValidation],
                "province" => 'required',
                "districts" => 'required',
                "communes" => 'required',
                "village_id" => 'required',
            ],
            [
                "name.required" => "សូមបញ្ចូលឈ្នោះអ្នកជំងឺ",
                "email.required" => "សូមបញ្ចូលបញ្ចូលអុីមែរបស់អ្នកជំងឺ",
                "phone.required" => "សូមបញ្ចូលបញ្ចូលលេខទូរjសព៍របស់អ្នកជំងឺ",
                "gender.required" => "សូមបញ្ចូលបញ្ចូលភេទប្រុសឬក៏ជាស្រី",
                "date_of_birth.required" => "សូមបញ្ចូលថ្ងៃខែឆ្នាំកំណើតជំងឺរបស់អ្នកជំងឺ",
                "province.required" => "សូមបញ្ចូលខេត្តរបស់អ្នកជំងឺ",
                "districts.required" => "សូមបញ្ចូលស្រុករបស់អ្នកជំងឺ",
                "communes.required" => "សូមបញ្ចូលឃុំរបស់អ្នកជំងឺ",
                "village_id.required" => "សូមបញ្ចូលភូមិរបស់អ្នកជំងឺ",
            ]
        );
    }
}
