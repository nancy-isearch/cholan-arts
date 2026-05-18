<x-email-layout
    :title="'New Enquiry — ' . config('app.name')"
    hero-title="New Enquiry Received"
    :hero-subtitle="'Submitted on ' . $enquiry->created_at->format('d M Y') . ' at ' . $enquiry->created_at->format('h:i A')"
    badge="Admin Notification"
    badge-color="#f59e0b"
    badge-bg="#1c1a14"
>

    {{-- ── Alert Banner ── --}}
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:26px;">
        <tr>
            <td style="background:#fffbeb;border:1px solid #fcd34d;border-radius:8px;padding:14px 18px;">
                <p style="margin:0;font-size:13px;color:#78350f;line-height:1.6;">
                    A new product enquiry has been submitted on
                    <strong>{{ config('app.name') }}</strong>.
                    Please review the details below and respond to the customer promptly.
                </p>
            </td>
        </tr>
    </table>

    {{-- ── Customer Information ── --}}
    <p style="margin:0 0 10px;font-size:11px;font-weight:700;color:#94a3b8;letter-spacing:1.2px;text-transform:uppercase;">
        Customer Information
    </p>

    <table width="100%" cellpadding="0" cellspacing="0"
           style="border:1px solid #ede9e0;border-radius:8px;overflow:hidden;margin-bottom:26px;">

        {{-- Reference header row --}}
        <tr>
            <td colspan="2"
                style="background:#fdf8ef;padding:11px 18px;border-bottom:2px solid #e8dcc8;">
                <span style="font-size:12px;font-weight:700;color:#c9962a;letter-spacing:0.8px;">
                    ENQ-{{ str_pad($enquiry->id, 5, '0', STR_PAD_LEFT) }}
                </span>
                &nbsp;&nbsp;
                <span style="font-size:12px;color:#94a3b8;">
                    {{ $enquiry->created_at->format('d M Y, h:i A') }}
                </span>
                &nbsp;&nbsp;
                <span style="display:inline-block;background:#fef3c7;color:#92400e;font-size:10px;font-weight:700;padding:2px 9px;border-radius:10px;text-transform:uppercase;letter-spacing:0.5px;">
                    {{ $enquiry->status }}
                </span>
            </td>
        </tr>

        @if($enquiry->full_name)
            @include('emails.enquiry._row', ['label' => 'Full Name', 'value' => $enquiry->full_name])
        @endif

        @if($enquiry->email)
        <tr>
            <td class="lbl"
                style="padding:11px 18px;width:150px;font-size:13px;font-weight:600;color:#374151;vertical-align:top;border-top:1px solid #ede9e0;background:#fdf9f3;white-space:nowrap;">
                Email
            </td>
            <td class="val"
                style="padding:11px 18px;font-size:14px;color:#4b5563;line-height:1.6;border-top:1px solid #ede9e0;">
                <a href="mailto:{{ $enquiry->email }}"
                   style="color:#0f172a;font-weight:600;text-decoration:none;">
                    {{ $enquiry->email }}
                </a>
            </td>
        </tr>
        @endif

        @if($enquiry->phone)
        <tr>
            <td class="lbl"
                style="padding:11px 18px;width:150px;font-size:13px;font-weight:600;color:#374151;vertical-align:top;border-top:1px solid #ede9e0;background:#fdf9f3;white-space:nowrap;">
                Phone
            </td>
            <td class="val"
                style="padding:11px 18px;font-size:14px;color:#4b5563;line-height:1.6;border-top:1px solid #ede9e0;">
                <a href="tel:{{ $enquiry->phone }}"
                   style="color:#0f172a;font-weight:600;text-decoration:none;">
                    {{ $enquiry->phone }}
                </a>
            </td>
        </tr>
        @endif

        @if($enquiry->country_city)
            @include('emails.enquiry._row', ['label' => 'Location', 'value' => $enquiry->country_city])
        @endif

    </table>

    {{-- ── Enquiry Details (product/preferences) ── --}}
    @if($enquiry->product?->name || $enquiry->preferred_size || $enquiry->purpose || $enquiry->preferred_finish)

    <p style="margin:0 0 10px;font-size:11px;font-weight:700;color:#94a3b8;letter-spacing:1.2px;text-transform:uppercase;">
        Enquiry Details
    </p>

    <table width="100%" cellpadding="0" cellspacing="0"
           style="border:1px solid #ede9e0;border-radius:8px;overflow:hidden;margin-bottom:26px;">

        @if($enquiry->product?->name)
        <tr>
            <td class="lbl"
                style="padding:11px 18px;width:150px;font-size:13px;font-weight:600;color:#374151;vertical-align:top;background:#fdf9f3;white-space:nowrap;">
                Product
            </td>
            <td class="val"
                style="padding:11px 18px;font-size:14px;line-height:1.6;">
                <strong style="color:#0f172a;">{{ $enquiry->product->name }}</strong>
            </td>
        </tr>
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

    </table>

    @endif

    {{-- ── Customer Message ── --}}
    @if($enquiry->message)

    <p style="margin:0 0 10px;font-size:11px;font-weight:700;color:#94a3b8;letter-spacing:1.2px;text-transform:uppercase;">
        Customer Message
    </p>

    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:26px;">
        <tr>
            <td style="background:#f8fafc;border:1px solid #ede9e0;border-left:3px solid #c9962a;border-radius:0 8px 8px 0;padding:16px 20px;font-size:14px;color:#374151;line-height:1.75;">
                {{ $enquiry->message }}
            </td>
        </tr>
    </table>

    @endif

    {{-- ── Action Buttons ── --}}
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" class="btn-wrap">
                    <tr>
                        <td style="padding-right:10px;">
                            <a href="{{ rtrim(config('app.url'), '/') }}/admin/enquiries/{{ $enquiry->id }}"
                               style="display:inline-block;background:#0f172a;color:#c9962a;font-size:13px;font-weight:700;text-decoration:none;padding:12px 26px;border-radius:6px;letter-spacing:0.5px;">
                                View in Admin Panel
                            </a>
                        </td>
                        <td>
                            <a href="mailto:{{ $enquiry->email }}"
                               style="display:inline-block;background:#c9962a;color:#0f172a;font-size:13px;font-weight:700;text-decoration:none;padding:12px 26px;border-radius:6px;letter-spacing:0.5px;">
                                Reply to Customer
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</x-email-layout>
