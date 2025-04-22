<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Confirmation </title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; }
        h1 { color: #0a0a0a; }
        .details { margin-top: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .table th { background-color: #f4f4f4; }
        .total { font-weight: bold; }
        .logo { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{asset('assets/img/logo/logo.png')}}" alt="Website Logo" style="width: 180px; height: auto;">
        </div>
        <h1>Payment Confirmation & Invoice</h1>
        <p>Dear {{ $username }},</p>
        <p>Thank you for your recent purchase. Below are the details of your transaction:</p>

        <div class="details">
            <strong>Date:</strong> {{ now()->format('M d, Y') }}<br>
            <strong>Invoice #:</strong> {{ uniqid('INV-') }}<br>
            <strong>Customer:</strong> {{ $username }}
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Tradeline Owner</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tradeline }}</td>
                    <td>Tradeline Purchase</td>
                    <td>${{ number_format($amount, 2) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="total">Total Paid</td>
                    <td class="total">${{ number_format($amount, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <p>If you have any questions regarding your invoice, please feel free to contact us at accounts@tradelineenvy.com.</p>

        <p>Thank you for your business!</p>

        <p>Best regards,<br>The Tradeline Envy Team</p>
    </div>
</body>
</html>
