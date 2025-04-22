<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Item;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Log;

class ItemsImport implements ToCollection, WithHeadingRow
{
    protected $errors;

    public function __construct(&$errors)
    {
        $this->errors = &$errors;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            try {
                $requiredFields = ['owner', 'open_date', 'total_value', 'payment_term', 'type'];
                foreach ($requiredFields as $field) {
                    if (empty($row[$field])) {
                        throw new \Exception("The field '$field' cannot be empty.");
                    }
                }
                $validPaymentTerms = ['12 months', 'paid in full'];
                if (!in_array($row['payment_term'], $validPaymentTerms)) {
                    throw new \Exception("Invalid payment term: must be '12 months' or 'paid in full'.");
                }
                $openDate = now(); // Default if not provided
                if (!empty($row['open_date'])) {
                    if (is_numeric($row['open_date'])) {
                        $openDate = Carbon::instance(Date::excelToDateTimeObject($row['open_date']));
                    } else {
                        $openDate = Carbon::createFromFormat('m/d/Y', $row['open_date']);
                    }
                }

                // Save the item
                $item = new item();
                $item->owner = $row['owner'];
                $item->open_date = $openDate;
                $item->total_value = $row['total_value'];
                $item->payment_term = $row['payment_term'];
                $item->price = $row['payment_term'] === '12 months' ? $row['total_value'] * 0.01 : $row['total_value'] * 0.008;
                $item->type = $row['type'] ?? 'AU';
                $item->save();

            }catch (\Exception $e) {
                $item->delete();
                $errorMessage = "Row " . ($index + 1) . ": " . $e->getMessage();
                Log::error($errorMessage);
                $this->errors[] = $errorMessage;
            }

        }
    }
}
