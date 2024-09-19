<!-- resources/views/backend/verify-email.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>

    @if (session('status') == 'verification-link-sent')
        <p>A new verification link has been sent to the email address you provided during registration.</p>
    @endif

    <p>
        Before proceeding, please check your email for a verification link.
        If you did not receive the email, click the button below to request another.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
</body>
</html>
