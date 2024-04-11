<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Withdrawal Receipt</title>
</head>
<body>

<div style="width: 80%; margin: 0 auto; border: 1px solid #ccc; padding: 20px;">
    <h1 style="text-align: center;">PayPal Withdrawal Receipt</h1>

    <hr>

    <h2>Sender Information</h2>
    <ul>
        <li><strong>Name:</strong> Jake Bartolay</li>
        <li><strong>Email:</strong> jakebartolay147@gmail.com</li>
        <li><strong>PayPal ID:</strong> #{{ $payout->withdrawal_account }}</li>
    </ul>

    <hr>

    <h2>Transaction Details</h2>
    <ul>
        <li><strong>Transaction Type:</strong> Withdrawal</li>
        <li><strong>Amount Withdrawn:</strong> ${{ $payout->amount }}</li>
        <li><strong>Withdrawal Method:</strong> Paypal</li>
        <li><strong>Withdrawal Account:</strong> {{ $payout->firstname }} {{ $payout->lastname }}</li>
    </ul>

    <hr>

    <h2>Transaction Summary</h2>
    <ul>
        <li><strong>Withdrawal Processed:</strong> {{ $payout->created_at->format('F d, Y') }}</li>
        <li><strong>Status:</strong> Completed</li>
    </ul>

    <hr>

    <h2>Additional Information</h2>
    <p>If you have any questions about this transaction, please contact PayPal Customer Service at PayPal Customer Service <span class="text-muted">#09724204804</span> or <span class="text-muted">jakebartolay147@gmail.com</span>.</p>
</div>

<!-- Footer -->
<footer id="footer" class="footer container text-center px-3">
    <div class="copyright text-center">
        &copy; <strong><span>Financial Guardian 2024</span></strong>. All Rights Reserved
    </div>
</footer>

</body>
</html>
