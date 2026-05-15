<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>
<body style="margin:0; padding:0; background:#fdf6e3; font-family: Arial, Helvetica, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fdf6e3; padding:20px 10px;">
        <tr>
            <td align="center">
                <!-- Main card -->
                <table width="100%" max-width="550" cellpadding="0" cellspacing="0" border="0" style="max-width:550px; width:100%; background:#ffffff; border-radius:20px; border:1px solid #d0dbc2;">

                    <!-- Green header -->
                    <tr>
                        <td style="background:#0f4a2a; text-align:center; padding:24px 20px; border-radius:20px 20px 0 0;">
                            <h1 style="color:#f5c518; margin:0; font-size:28px;">Sa‑Wrap</h1>
                            <p style="color:#c8e6c9; margin:6px 0 0 0; font-size:13px;">Not Just a Wrap, It's SaWrap!</p>
                        </td>
                    </tr>

                    <!-- Message icon row -->
                    <tr>
                        <td style="padding:24px 20px 0 20px; text-align:center;">
                            <span style="font-size:48px;">📬</span>
                            <h2 style="color:#0f4a2a; margin:10px 0 5px 0; font-size:22px;">New Message Received</h2>
                            <p style="color:#4a6b4a; font-size:14px;">Someone just filled out your contact form.</p>
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding:0 20px;">
                            <hr style="border:0; height:2px; background:linear-gradient(90deg, #f5c518, #d4a812); margin:10px 0;">
                        </td>
                    </tr>

                    <!-- Customer details -->
                    <tr>
                        <td style="padding:10px 20px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fafbf7; border-radius:16px; border:1px solid #e2e8dc;">

                                <!-- Name -->
                                <tr>
                                    <td style="padding:16px 20px 8px 20px;">
                                        <p style="margin:0; font-size:11px; color:#8a9a8a; text-transform:uppercase;">👤 Name</p>
                                        <p style="margin:4px 0 0 0; font-size:18px; font-weight:bold; color:#0f4a2a;">{{ $data['name'] }}</p>
                                    </td>
                                </tr>

                                <!-- Email -->
                                <tr>
                                    <td style="padding:8px 20px;">
                                        <p style="margin:0; font-size:11px; color:#8a9a8a; text-transform:uppercase;">📧 Email</p>
                                        <p style="margin:4px 0 0 0; font-size:16px; color:#1a5f38;">
                                            <a href="mailto:{{ $data['email'] }}" style="color:#1a5f38; text-decoration:none;">{{ $data['email'] }}</a>
                                        </p>
                                    </td>
                                </tr>

                                <!-- Phone -->
                                <tr>
                                    <td style="padding:8px 20px;">
                                        <p style="margin:0; font-size:11px; color:#8a9a8a; text-transform:uppercase;">📞 Phone</p>
                                        <p style="margin:4px 0 0 0; font-size:16px; color:#0f4a2a;">{{ $data['phone'] }}</p>
                                    </td>
                                </tr>

                                <!-- Message -->
                                <tr>
                                    <td style="padding:8px 20px 20px 20px;">
                                        <p style="margin:0; font-size:11px; color:#8a9a8a; text-transform:uppercase;">💬 Message</p>
                                        <div style="background:#ffffff; border-radius:12px; padding:14px; margin-top:6px; border:1px solid #e2e8dc; color:#2d4a3a; font-size:14px; line-height:1.5;">
                                            {{ nl2br(e($data['message'])) }}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Buttons -->
                    <tr>
                        <td style="padding:0 20px 20px 20px; text-align:center;">
                            <a href="mailto:{{ $data['email'] }}" style="display:inline-block; background:#f5c518; color:#0f4a2a; text-decoration:none; font-weight:bold; padding:12px 22px; border-radius:50px; margin:5px; font-size:14px;">📧 Reply</a>
                            <a href="{{ url('/admin/dashboard') }}" style="display:inline-block; background:#ffffff; color:#0f4a2a; text-decoration:none; font-weight:bold; padding:12px 22px; border-radius:50px; margin:5px; font-size:14px; border:1px solid #c8e6c9;">🔐 Admin Panel</a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f4f5f2; text-align:center; padding:18px 20px; border-radius:0 0 20px 20px; font-size:12px; color:#8a9a8a;">
                            Sa‑Wrap · Filipino Breakfast Wraps<br>
                            Km.30 Brgy, R-2 Dasmariñas, Cavite, Philippines
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
