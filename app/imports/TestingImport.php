<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestingImport implements WithHeadingRow
{
    /**
    */// @param Collection $collection

    public function collection(Collection $collection)
    {

    }
}

?>
