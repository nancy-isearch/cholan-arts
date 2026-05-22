<?php

namespace App\Services;

use App\Mail\EnquiryAdminMail;
use App\Mail\EnquiryUserMail;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Mail;

class EnquiryService
{
    public function store(array $data): Enquiry
    {
        $enquiry = Enquiry::create($data);
        // Notify admin of the new enquiry
        Mail::to(config('mail.admin_email'))
            ->cc(config('mail.admin_cc_email')) 
            ->queue(new EnquiryAdminMail($enquiry));

        // Send confirmation to the customer
        if (!empty($enquiry->email)) {
            Mail::to($enquiry->email)
                ->queue(new EnquiryUserMail($enquiry));
        }

        return $enquiry;
    }

    public function updateStatus(int $id, string $status): Enquiry
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update(['status' => $status]);
        return $enquiry;
    }
}
