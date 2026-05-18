@props([
    'title'        => config('app.name'),
    'heroTitle'    => null,
    'heroSubtitle' => null,
    'badge'        => null,
    'badgeColor'   => '#c9962a',
    'badgeBg'      => '#1e2d42',
])
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ $title }}</title>
    <style>
        @media only screen and (max-width: 620px) {
            .wrap  { width: 100% !important; }
            .pad   { padding: 22px 16px !important; }
            .lbl   { width: 110px !important; font-size: 12px !important; }
            .val   { font-size: 13px !important; }
            .hero-h{ font-size: 18px !important; }
            .btn-wrap td { display: block !important; padding-right: 0 !important; padding-bottom: 10px !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#f0ede8;font-family:Arial,Helvetica,sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">

<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color:#f0ede8;padding:36px 12px;">
    <tr>
        <td align="center">

            <table width="600" cellpadding="0" cellspacing="0" role="presentation" class="wrap"
                   style="max-width:600px;width:100%;background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 4px 18px rgba(0,0,0,0.10);">

                {{-- ══════════ HEADER ══════════ --}}
                <tr>
                    <td style="background-color:#0f172a;padding:26px 36px 20px;" class="pad">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="vertical-align:middle;">
                                    <img src="{{ rtrim(config('app.url'), '/') }}/assets/svg/brand-logo.png"
                                         alt="{{ config('app.name') }}"
                                         height="40"
                                         style="display:block;height:40px;width:auto;border:0;-ms-interpolation-mode:bicubic;">
                                </td>
                                @if($badge)
                                <td align="right" style="vertical-align:middle;">
                                    <span style="display:inline-block;background:{{ $badgeBg }};color:{{ $badgeColor }};border:1px solid {{ $badgeColor }};font-size:10px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;padding:4px 14px;border-radius:20px;white-space:nowrap;">
                                        {{ $badge }}
                                    </span>
                                </td>
                                @endif
                            </tr>
                        </table>
                    </td>
                </tr>

                @if($heroTitle)
                {{-- ══════════ HERO STRIP ══════════ --}}
                <tr>
                    <td style="background-color:#0f172a;padding:0 36px 28px;" class="pad">
                        <div style="border-top:1px solid #1e3052;padding-top:18px;">
                            <h1 class="hero-h"
                                style="margin:0;font-size:22px;font-weight:700;color:#c9962a;font-family:Georgia,'Times New Roman',serif;letter-spacing:-0.3px;line-height:1.3;">
                                {{ $heroTitle }}
                            </h1>
                            @if($heroSubtitle)
                            <p style="margin:8px 0 0;font-size:13px;color:#94a3b8;line-height:1.55;">
                                {{ $heroSubtitle }}
                            </p>
                            @endif
                        </div>
                    </td>
                </tr>
                @endif

                {{-- ══════════ BODY ══════════ --}}
                <tr>
                    <td style="padding:36px;" class="pad">
                        {{ $slot }}
                    </td>
                </tr>

                {{-- ══════════ FOOTER ══════════ --}}
                <tr>
                    <td style="background-color:#0f172a;padding:22px 36px;text-align:center;" class="pad">
                        <p style="margin:0 0 5px;font-size:14px;font-weight:700;color:#c9962a;font-family:Georgia,'Times New Roman',serif;letter-spacing:0.5px;">
                            {{ config('app.name') }}
                        </p>
                        <p style="margin:0 0 12px;font-size:11px;color:#475569;letter-spacing:0.3px;">
                            Handcrafted Indian Art &amp; Sculptures
                        </p>
                        <p style="margin:0 0 5px;font-size:11px;color:#334155;">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </p>
                        <p style="margin:0;font-size:11px;">
                            <a href="{{ config('app.url') }}" style="color:#64748b;text-decoration:none;">
                                {{ config('app.url') }}
                            </a>
                            &nbsp;&bull;&nbsp;
                            <a href="mailto:sales@cholanarts.com" style="color:#64748b;text-decoration:none;">
                                sales@cholanarts.com
                            </a>
                        </p>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
