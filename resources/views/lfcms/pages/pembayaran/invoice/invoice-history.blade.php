<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $payment->order_id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .invoice-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            color: #007BFF;
            margin-bottom: 30px;
            text-align: center;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .invoice-header .company-info,
        .invoice-header .invoice-id {
            width: 48%;
        }

        .invoice-header p {
            margin: 0;
            font-size: 14px;
        }

        .company-logo img {
            max-height: 60px;
            padding-bottom: 10px; 
        }

        .invoice-details {
            margin-bottom: 30px;
        }

        .invoice-details h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-details th,
        .invoice-details td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .invoice-details th {
            background-color: #007BFF;
            color: #fff;
        }

        .invoice-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }

        .btn-download {
            display: inline-block;
            padding: 12px 30px;
            background: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 30px;
        }

        .btn-download:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="company-logo">
                <!-- Add your company logo here -->
                <img src="assets/images/logo/logo_1.png" alt="Company Logo">
            </div>
            <div class="invoice-id">
                <p><strong>Order ID:</strong> {{ $payment->order_id }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($payment->order_date)->format('d-m-Y') }}</p>
            </div>
        </div>
        <h1>Invoice</h1>
        <div class="invoice-details">
            <h2>Transaction Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Amount</th>
                        <th>Code</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $payment->course->name }}</td>
                        <td>{{ number_format($payment->harga, 2) }}</td>
                        <td>{{ 'LF-' . sprintf('%04d', $payment->id) }}</td>
                        <td>{{ $payment->user->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="invoice-footer">
            <p>This invoice is auto-generated for internal monitoring by the superadmin. For any discrepancies, contact support.</p>
        </div>
    </div>
</body>

</html>
