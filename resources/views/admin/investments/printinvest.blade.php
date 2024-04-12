<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .receipt-info {
            margin-top: 20px;
        }
        .receipt-info p {
            margin: 5px 0;
        }
        .receipt-info p strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Deposit Receipt</h1>
        <div class="receipt-info">
            <p><strong>Account ID:</strong> {{ $invest->withdrawal_account }}</p>
            <p><strong>Account:</strong> {{ $invest->firstname }} {{ $invest->lastname }}</p>
            <p><strong>Amount:</strong> ${{ number_format($invest->amount, 2, '.', ',') }}</p>
            <p><strong>Tax:</strong> ${{ number_format($invest->tax_amount, 2, '.', ',') }}</p>
            <p><strong>Type:</strong> {{ $invest->type }}</p>
            <p><strong>Status:</strong> {{ $invest->status }}</p>
            <p><strong>Date:</strong> {{ $invest->created_at->format('F d, Y') }}</p>
            <!-- Add more deposit details here as needed -->
        </div>
    </div>
    <footer id="footer" class="footer container text-center px-3">
        <div class="copyright text-center">
            &copy; <strong><span>Financial Guardian 2024</span></strong>. All Rights Reserved
        </div>
    </footer>
</body>
</html>
