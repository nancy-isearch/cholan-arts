<x-email-layout
    :title="'Thank You for Your Enquiry – ' . config('app.name')"
    hero-title="Thank You for Reaching Out!"
    hero-subtitle="Your enquiry has been received. We will get back to you within 24–48 business hours."
    badge="Enquiry Confirmed"
>

    {{-- ── Greeting ── --}}
    <p style="margin:0 0 14px;font-size:15px;color:#1e293b;line-height:1.6;">
        Dear <strong>{{ $enquiry->full_name }}</strong>,
    </p>
    <p style="margin:0 0 30px;font-size:14px;color:#4b5563;line-height:1.75;">
        Thank you for contacting <strong style="color:#0f172a;">{{ config('app.name') }}</strong>.
        We are delighted to hear from you and appreciate your interest in our handcrafted Indian art
        and sculptures. Our team has received your enquiry and will review it carefully.
    </p>

    {{-- ── Enquiry Summary ── --}}
    <p style="margin:0 0 10px;font-size:11px;font-weight:700;color:#94a3b8;letter-spacing:1.2px;text-transform:uppercase;">
        Your Enquiry Summary
    </p>

    <table width="100%" cellpadding="0" cellspacing="0"
           style="border:1px solid #ede9e0;border-radius:8px;overflow:hidden;margin-bottom:32px;">

        {{-- Reference + timestamp header --}}
        <tr>
            <td colspan="2"
                style="background:#fdf8ef;padding:11px 18px;border-bottom:2px solid #e8dcc8;">
                <span style="font-size:12px;font-weight:700;color:#c9962a;letter-spacing:0.8px;">
                    Reference: ENQ-{{ str_pad($enquiry->id, 5, '0', STR_PAD_LEFT) }}
                </span>
                &nbsp;&nbsp;
                <span style="font-size:12px;color:#94a3b8;">
                    {{ $enquiry->created_at->format('d M Y, h:i A') }}
                </span>
            </td>
        </tr>

        @if($enquiry->full_name)
            @include('emails.enquiry._row', ['label' => 'Full Name',  'value' => $enquiry->full_name])
        @endif

        @if($enquiry->email)
            @include('emails.enquiry._row', ['label' => 'Email',      'value' => $enquiry->email])
        @endif

        @if($enquiry->phone)
            @include('emails.enquiry._row', ['label' => 'Phone',      'value' => $enquiry->phone])
        @endif

        @if($enquiry->country_city)
            @include('emails.enquiry._row', ['label' => 'Location',   'value' => $enquiry->country_city])
        @endif

        @if($enquiry->product?->name)
            @include('emails.enquiry._row', ['label' => 'Product',    'value' => $enquiry->product->name])
        @endif

        @if($enquiry->preferred_size)
            @include('emails.enquiry._row', ['label' => 'Preferred Size',   'value' => $enquiry->preferred_size])
        @endif

        @if($enquiry->purpose)
            @include('emails.enquiry._row', ['label' => 'Purpose',          'value' => $enquiry->purpose])
        @endif

        @if($enquiry->preferred_finish)
            @include('emails.enquiry._row', ['label' => 'Preferred Finish', 'value' => $enquiry->preferred_finish])
        @endif

        @if($enquiry->message)
        <tr>
            <td class="lbl"
                style="padding:11px 18px;width:150px;font-size:13px;font-weight:600;color:#374151;vertical-align:top;border-top:1px solid #ede9e0;background:#fdf9f3;white-space:nowrap;">
                Message
            </td>
            <td class="val"
                style="padding:11px 18px;font-size:14px;color:#4b5563;line-height:1.7;border-top:1px solid #ede9e0;">
                {{ $enquiry->message }}
            </td>
        </tr>
        @endif

    </table>

    {{-- ── What Happens Next ── --}}
    <p style="margin:0 0 14px;font-size:11px;font-weight:700;color:#94a3b8;letter-spacing:1.2px;text-transform:uppercase;">
        What Happens Next
    </p>

    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:30px;">
        <tr>
            <td width="34" valign="top" style="padding-bottom:14px;">
                <div style="width:27px;height:27px;background:#c9962a;border-radius:50%;text-align:center;line-height:27px;font-size:11px;font-weight:700;color:#ffffff;">
                    1
                </div>
            </td>
            <td valign="top" style="padding:4px 0 14px 10px;font-size:14px;color:#4b5563;line-height:1.6;">
                <strong style="color:#1e293b;">Review</strong> — Our team will carefully review your enquiry details and requirements.
            </td>
        </tr>
        <tr>
            <td width="34" valign="top" style="padding-bottom:14px;">
                <div style="width:27px;height:27px;background:#c9962a;border-radius:50%;text-align:center;line-height:27px;font-size:11px;font-weight:700;color:#ffffff;">
                    2
                </div>
            </td>
            <td valign="top" style="padding:4px 0 14px 10px;font-size:14px;color:#4b5563;line-height:1.6;">
                <strong style="color:#1e293b;">Contact</strong> — We will reach out to you via email or phone within 24–48 business hours.
            </td>
        </tr>
        <tr>
            <td width="34" valign="top">
                <div style="width:27px;height:27px;background:#c9962a;border-radius:50%;text-align:center;line-height:27px;font-size:11px;font-weight:700;color:#ffffff;">
                    3
                </div>
            </td>
            <td valign="top" style="padding:4px 0 0 10px;font-size:14px;color:#4b5563;line-height:1.6;">
                <strong style="color:#1e293b;">Personalise</strong> — We will help you find or customise the perfect piece to match your vision.
            </td>
        </tr>
    </table>

    {{-- ── Contact Info ── --}}
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:30px;">
        <tr>
            <td style="background:#fdf8ef;border:1px solid #ede9e0;border-left:3px solid #c9962a;border-radius:0 8px 8px 0;padding:16px 20px;">
                <p style="margin:0 0 5px;font-size:12px;font-weight:700;color:#c9962a;text-transform:uppercase;letter-spacing:0.8px;">
                    Have Urgent Questions?
                </p>
                <p style="margin:0;font-size:13px;color:#4b5563;line-height:1.65;">
                    Reply directly to this email or write to us at&nbsp;
                    <a href="mailto:sales@cholanarts.com"
                       style="color:#0f172a;font-weight:600;text-decoration:none;">
                        sales@cholanarts.com
                    </a>
                </p>
            </td>
        </tr>
    </table>

    {{-- ── Sign-off ── --}}
    <p style="margin:0 0 3px;font-size:14px;color:#64748b;">Warm regards,</p>
    <p style="margin:0;font-size:15px;font-weight:700;color:#0f172a;font-family:Georgia,'Times New Roman',serif;">
        The {{ config('app.name') }} Team
    </p>

</x-email-layout>
