<?php

namespace App\Repositories\Patients;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientRepository
{
    public function getData()
    {
        return Patient::orderBy('id', 'asc')->paginate(10);
    }
}
