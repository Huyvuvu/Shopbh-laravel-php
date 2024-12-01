<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #ff5733;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }
        h3 {
            font-size: 22px;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .order-details {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .order-details th,
        .order-details td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .order-details th {
            background-color: #f8f8f8;
            color: #333;
        }
        .order-details td {
            color: #555;
        }
        .order-total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .cta-btn {
            display: inline-block;
            background-color: #ff5733;
            color: #fff;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
        .cta-btn:hover {
            background-color: #e14c29;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>Xác Nhận Đơn Hàng</h1>
        <p>Chào <strong>Bạn</strong>,</p>
        <p>Cảm ơn bạn đã đặt hàng tại <strong>Shop của chúng tôi</strong>. Dưới đây là thông tin chi tiết về đơn hàng của bạn:</p>

        <h3>Thông Tin Đơn Hàng:</h3>
        <table class="order-details">
            <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    {{-- <th>Tổng</th> --}}
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($sp as $i) --}}
                <tr>
                    <td>Tên</td>
                    <td>1</td>
                    <td>500,000 đ</td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>

        <div class="order-total">
            <p><strong>Tổng cộng: 500,000 đ</strong></p>
        </div>

        <h3>Thông Tin Giao Hàng:</h3>
        <p><strong>Địa chỉ giao hàng: 12 Trịnh Đình Thảo</strong> </p>
        <p><strong>Phương thức thanh toán:  Tiền mặt</strong></p>

        <a class="cta-btn">Theo dõi đơn hàng của bạn tại Website: thegioididong.com</a>

        <div class="footer">
            <p>Cảm ơn bạn đã mua hàng tại <strong>Shop của chúng tôi</strong>!</p>
            <p>Đội ngũ hỗ trợ khách hàng luôn sẵn sàng giúp đỡ bạn.</p>
            <p>Trân trọng,</p>
            <p><strong>Đội ngũ Shop</strong></p>
        </div>
    </div>
</body>
</html>
