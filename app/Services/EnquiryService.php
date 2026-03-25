<?php

namespace App\Services;

use App\Models\Enquiry;

class EnquiryService
{
    public function store(array $data)
    {
        return Enquiry::create($data);
    }

    public function updateStatus($id, $status)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update(['status' => $status]);

        return $enquiry;
    }
}

?>