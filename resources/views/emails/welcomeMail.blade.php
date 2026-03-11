<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Inter', Helvetica, Arial, sans-serif; margin: 0; padding: 0; background-color: #F8F9FA; }
        .main-container { background-color: #ffffff; width: 100%; max-width: 600px; margin: 20px auto; border-radius: 12px; overflow: hidden; border: 1px solid #e9ecef; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .header { background-color: #6071B6; padding: 40px; text-align: center; color: #ffffff; }
        .content { padding: 40px; line-height: 1.6; color: #264653; }
        .token-container { background-color: #f1f3f9; border: 2px dashed #6071B6; padding: 20px; text-align: center; margin: 25px 0; border-radius: 8px; }
        .token-text { font-family: 'Courier New', monospace; font-size: 24px; font-weight: bold; color: #6071B6; letter-spacing: 2px; }
        .footer { padding: 20px; text-align: center; font-size: 12px; color: #6c757d; }
        .btn { background-color: #6071B6; color: #ffffff !important; padding: 12px 25px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="header">
            <h1 style="margin: 0; font-size: 24px;">Welcome to Social Reader</h1>
        </div>

        <div class="content">
            <p>Hello <strong>{{ $fullName }}</strong>,</p>
            <p>Your journey with <strong>Social Reader</strong> begins now. We're excited to help you connect with fellow readers and discuss your favorite books chapter by chapter.</p>
            
            <p>To verify your account or complete your setup, please use the following secure token:</p>
            
            <div class="token-container">
                <span class="token-text">{{ $token }}</span>
            </div>

            <p>This token is valid for a limited time. If you didn't request this, you can safely ignore this email.</p>
            
            <div style="text-align: center;">
                <a href="{{ url('/login') }}" class="btn">Start Reading</a>
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Social Reader. All rights reserved.
        </div>
    </div>
</body>
</html>