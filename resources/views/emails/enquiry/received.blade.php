<div style="font-family: Arial, sans-serif; font-size: 14px; color: #000;">
    <p><strong>{{ $enquiry->full_name ?? $enquiry->name ?? 'Customer' }},</strong></p>
    <p>Thank you for contacting us. We received your enquiry — we will get back to you soon.</p>
    <p><strong>Enquiry Details</strong></p>
    <table style="font-size: 14px; color: #000; text-align: left;" cellpadding="3" cellspacing="0">
        @if($enquiry->full_name ?? $enquiry->name)
        <tr>
            <td style="font-weight: bold; padding-right: 20px;">Name:</td>
            <td>{{ $enquiry->full_name ?? $enquiry->name }}</td>
        </tr>
        @endif
        @if($enquiry->email)
        <tr>
            <td style="font-weight: bold; padding-right: 20px;">Email:</td>
            <td><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></td>
        </tr>
        @endif
        @if($enquiry->phone)
        <tr>
            <td style="font-weight: bold; padding-right: 20px;">Phone:</td>
            <td>{{ $enquiry->phone }}</td>
        </tr>
        @endif
        @if($enquiry->country_city)
        <tr>
            <td style="font-weight: bold; padding-right: 20px;">Location:</td>
            <td>{{ $enquiry->country_city }}</td>
        </tr>
        @endif
        @if($enquiry->product?->name)
        <tr>
            <td style="font-weight: bold; padding-right: 20px;">Product:</td>
            <td>{{ $enquiry->product->name }}</td>
        </tr>
        @endif
        @if($enquiry->preferred_size)
        <tr>
            <td style="font-weight: bold; padding-right: 20px;">Preferred Size:</td>
            <td>{{ $enquiry->preferred_size }}</td>
        </tr>
        @endif
        @if($enquiry->purpose)
        <tr>
            <td style="font-weight: bold; padding-right: 20px;">Purpose:</td>
            <td>{{ $enquiry->purpose }}</td>
        </tr>
        @endif
        @if($enquiry->preferred_finish)
        <tr>
            <td style="font-weight: bold; padding-right: 20px;">Preferred Finish:</td>
            <td>{{ $enquiry->preferred_finish }}</td>
        </tr>
        @endif
        @if($enquiry->message)
        <tr>
            <td style="font-weight: bold; padding-right: 20px; vertical-align: top;">Message:</td>
            <td>{{ $enquiry->message }}</td>
        </tr>
        @endif
    </table>
    <br>
    <p>Regards,<br>
    {{ config('app.name') }} Team</p>
</div>