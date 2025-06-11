<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - # {{ $billing->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 20mm;
        }
        .invoice-box {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #2c3e50;
        }
        .header p {
            margin: 5px 0;
        }
        .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .details div {
            width: 48%;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f5f5f5;
        }
        .footer {
            text-align: right;
            margin-top: 20px;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <h1>Invoice</h1>
            <p>Invoice # {{ $billing->id }} </p>
            <p>Issue Date: {{ \Carbon\Carbon::now()->format('F d, Y') }} </p>
        </div>

        <div class="details">
            <div>
                <h3>Billed To</h3>
                <p><strong>Name: </strong> {{ $billing->user->name ?? 'N\A' }} </p>
                <p><strong>Email:</strong> {{ $billing->user->email ?? 'N\A' }} </p>
                 
            </div>
            <div>
                <h3>Company Details</h3>
                <p><strong>Company:</strong> Easy </p>
                <p><strong>Address:</strong> 123 Main Street, City, Country</p>
                <p><strong>Email:</strong> support@easylearningbd.com</p>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Plan</th>
                    <th>Word Limit</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Plan Subscription ({{ $billing->status ?? 'N\A' }} )</td>
                    <td> {{ $billing->plan->name ?? 'N\A' }} Plan</td>
                    <td> {{ $billing->plan->monthly_word_limit ?? 'N\A' }} words</td>
                    <td>$ {{ number_format($billing->total , 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p><strong>Total Amount:</strong> ${{ number_format($billing->total , 2) }} </p>
            <p><strong>Payment Status: {{ $billing->status ?? 'N\A' }}</strong>  </p>
            <p><strong>Payment Date: </strong> {{ \Carbon\Carbon::parse($billing->payment_date)->format('F d, Y h:i A') }}  </p>
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>
</html>