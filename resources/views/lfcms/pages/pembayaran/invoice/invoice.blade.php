<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice (Superadmin)</title>
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
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 26px;
            color: #007BFF;
            margin-bottom: 20px;
            text-align: center;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .invoice-header .company-info,
        .invoice-header .invoice-id {
            width: 48%;
        }
        .invoice-header p {
            margin: 0;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-details th, .invoice-details td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .invoice-details th {
            background-color: #007BFF;
            color: #fff;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
        .btn-download {
            display: inline-block;
            padding: 10px 20px;
            background: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn-download:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <h1>Invoice (Superadmin)</h1>
        <div class="invoice-header">
            <div class="company-info">
                <p><strong>Company:</strong> LearnFlow</p>
                <p><strong>Email:</strong> LearnFlow@gmail.com</p>
            </div>
            <div class="invoice-id">
                <p><strong>Order ID:</strong> {{ $order_id }}</p>
                <p><strong>Date:</strong> {{ $date }}</p>
            </div>
        </div>
        <div class="invoice-details">
            <h2>Transaction Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $course_name }}</td>
                        <td>{{ number_format($amount, 2) }}</td>
                        <td>{{ ucfirst($status) }}</td>
                        <td>{{ $customer_name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a href="#" class="btn-download">Download PDF</a>
        </div>
        <div class="invoice-footer">
            <p>This invoice is auto-generated for internal monitoring by the superadmin. For any discrepancies, contact support.</p>
        </div>
    </div>
</body>
</html>
