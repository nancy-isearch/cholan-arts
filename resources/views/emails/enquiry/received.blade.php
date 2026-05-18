<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enquiry Received</title>
</head>
<body style="margin:0; padding:0; background:#f4f7fb; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7fb; padding:40px 15px;">
        <tr>
            <td align="center">

                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#0f172a; padding:30px 40px; text-align:center;">
                            <h1 style="margin:0; font-size:28px; color:#ffffff;">
                                Thank You!
                            </h1>
                            <p style="margin:10px 0 0; color:#cbd5e1; font-size:15px;">
                                We have received your enquiry successfully.
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:40px; color:#334155;">

                            <p style="margin:0 0 18px; font-size:16px;">
                                Hello <strong>{{ $enquiry->name ?? 'there' }}</strong>,
                            </p>

                            <p style="margin:0 0 25px; line-height:1.7; font-size:15px; color:#475569;">
                                Thank you for contacting us. Our team has received your enquiry and will get back to you shortly with the required details.
                            </p>

                            <!-- Enquiry Box -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e2e8f0; border-radius:10px; overflow:hidden; margin-bottom:30px;">

                                <tr>
                                    <td colspan="2" style="background:#f8fafc; padding:15px 20px; font-size:16px; font-weight:bold; color:#0f172a; border-bottom:1px solid #e2e8f0;">
                                        Enquiry Details
                                    </td>
                                </tr>

                                @if(!empty($enquiry->name))
                                <tr>
                                    <td style="padding:14px 20px; font-weight:bold; width:180px; border-bottom:1px solid #f1f5f9; color:#334155;">
                                        Name
                                    </td>
                                    <td style="padding:14px 20px; border-bottom:1px solid #f1f5f9; color:#475569;">
                                        {{ $enquiry->name }}
                                    </td>
                                </tr>
                                @endif

                                @if(!empty($enquiry->email))
                                <tr>
                                    <td style="padding:14px 20px; font-weight:bold; width:180px; border-bottom:1px solid #f1f5f9; color:#334155;">
                                        Email
                                    </td>
                                    <td style="padding:14px 20px; border-bottom:1px solid #f1f5f9; color:#475569;">
                                        {{ $enquiry->email }}
                                    </td>
                                </tr>
                                @endif

                                @if(!empty($enquiry->phone))
                                <tr>
                                    <td style="padding:14px 20px; font-weight:bold; width:180px; border-bottom:1px solid #f1f5f9; color:#334155;">
                                        Phone
                                    </td>
                                    <td style="padding:14px 20px; border-bottom:1px solid #f1f5f9; color:#475569;">
                                        {{ $enquiry->phone }}
                                    </td>
                                </tr>
                                @endif

                                @if($enquiry->product?->name)
                                <tr>
                                    <td style="padding:14px 20px; font-weight:bold; width:180px; border-bottom:1px solid #f1f5f9; color:#334155;">
                                        Product
                                    </td>
                                    <td style="padding:14px 20px; border-bottom:1px solid #f1f5f9; color:#475569;">
                                        {{ $enquiry->product->name }}
                                    </td>
                                </tr>
                                @endif

                                @if(!empty($enquiry->message))
                                <tr>
                                    <td style="padding:14px 20px; font-weight:bold; vertical-align:top; color:#334155;">
                                        Message
                                    </td>
                                    <td style="padding:14px 20px; line-height:1.7; color:#475569;">
                                        {{ $enquiry->message }}
                                    </td>
                                </tr>
                                @endif

                            </table>

                            <p style="margin:0; font-size:15px; color:#475569; line-height:1.7;">
                                If you have any urgent questions, feel free to reply to this email.
                            </p>

                            <!-- Regards -->
                            <div style="margin-top:35px;">
                                <p style="margin:0; font-size:15px; color:#334155;">
                                    Regards,
                                </p>
                                <p style="margin:5px 0 0; font-size:16px; font-weight:bold; color:#0f172a;">
                                    {{ config('app.name') }} Team
                                </p>
                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc; padding:20px 40px; text-align:center; font-size:13px; color:#64748b;">
                            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>