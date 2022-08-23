<!DOCTYPE html>
<html lang="en" style="width: 100%; padding: 0; margin: 0;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- fab -->
     <link rel="icon" type="image/ico" sizes="32x32" href="{{url('image/favicon.ico')}}">
    <!-- fab -->
    <title>SmartGreeter</title>
    <!-- Google font  Poppins-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- FontAwesome 5.15.3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="padding: 0; margin: 0; font-family: 'Poppins', sans-serif;">
    <table style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 50px auto 0; border-spacing: 0px; border-collapse: collapse;">
        <thead>
            <tr style="margin: 30px auto;">
                <th>
                    <a href="#" style="display: inline-block; text-decoration: none; padding: 0; margin: 0;">
                        <img style="width: 120px;" src="{{url('image/email-template/template-logo.png')}}" alt="">
                    </a>
                </th>
            </tr>
            <tr>
                <td><h4 style="padding: 0; margin: 40px 0 20px 0; font-size: 25px; color: #000; text-align: center;">Your electronic check</h4></td>
            </tr>
        </thead>
    </table>

    <table style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
        <tbody>
            <tr>
                <td>
                    <table style="max-width: 700px; width: 100%; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td>
                                    <p style="padding: 0; margin: 0px 0 20px 0; font-size: 16px; color: #000; text-align: center;">By order 74025377-0012 dated {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}, an electronic receipt was generated</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0" style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 0 auto 30px; border-spacing: 0px; border-collapse: collapse; border-radius: 5px;">
        <tbody>
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" style="max-width: 700px; width: 100%; background: #e9f9fd; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td>
                                    <table cellspacing="0" cellpadding="0" style="max-width: 600px; width: 100%; background: #e9f9fd; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: left; padding: 30px 0 0 0; width: 80%;">Product</th>
                                                <th style="text-align: right; padding: 30px 0 0 0; width: 20%;">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($order->orderDetails as $order_details)
                                                <tr>
                                                    <td style="padding: 8px 0 20px 0; border-bottom: 1px solid #fff; width: 80%;">
                                                        <p style="padding: 0; margin: 0; font-size: 14px; display: flex; align-items: center;"><img style="width: 50px;     margin: 0 15px 0 0;" src="{{url('image/email-template/product.png')}}" alt="">{{$order_details->item_name}}</p>
                                                    </td>
                                                    <td style="text-align: right; padding: 8px 0 20px 0; border-bottom: 1px solid #fff; width: 20%;">{{number_format($order_details->price, 2)}} <i class="fas fa-dollar-sign"></i></td>
                                                </tr> 
                                            @empty
                                                
                                            @endforelse
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="text-align: left; padding: 8px 0; width: 80%;">Total</td>
                                                <td style="text-align: right; padding: 8px 0; width: 20%;">{{number_format($order->amount, 2)}} <i class="fas fa-dollar-sign"></i></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left; padding: 8px 0; width: 80%;">Tax</td>
                                                <td style="text-align: right; padding: 8px 0; width: 20%;">{{number_format($order->tax, 2)}} <i class="fas fa-dollar-sign"></i></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left; padding: 8px 0 20px 0; width: 80%;">Final amount</td>
                                                <td style="text-align: right; padding: 8px 0 20px 0; width: 20%;">{{number_format($order->sub_total, 2)}} <i class="fas fa-dollar-sign"></i></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0" style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 0 auto 50px; border-spacing: 0px; border-collapse: collapse;">
        <tfoot>
            <tr>
                <td style="text-align: center;">
                    <a href="{{route('download.receipt',['order_id'=>Crypt::encryptString($order->id),'user_id'=> Crypt::encryptString(Auth()->user()->id)])}}" style="display: inline-block; border-radius: 5px; background: #1DCDFE; color: #000; padding: 0 25px; margin: 0 0 60px 0; line-height: 2; text-decoration: none; font-weight: 600;" target="_blank">Download the check</a>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">{{date("D j M Y G:i:s ")}} GMT</p>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">This is one-time code.</p>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">If this email is not intended for you, please ignore it.</p>
                    <p style="padding: 0; margin: 30px 0 10px 0; font-size: 14px; color: #000; text-align: center;">Sincerely,</p>
                    <p style="padding: 0 0 30px 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">The SmartGreeter team</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center; padding: 0 0 50px 0;">
                    <ul style="padding: 0; margin: 0; display: flex; justify-content: center;">
                        <li style="padding: 0; margin: 0; list-style: none;">
                            <a style="display: block; color: #1B1B1C; padding: 0 10px; margin: 0;" href="#"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li style="padding: 0; margin: 0; list-style: none;">
                            <a style="display: block; color: #1B1B1C; padding: 0 10px; margin: 0;" href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li style="padding: 0; margin: 0; list-style: none;">
                            <a style="display: block; color: #1B1B1C; padding: 0 10px; margin: 0;" href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li style="padding: 0; margin: 0; list-style: none;">
                            <a style="display: block; color: #1B1B1C; padding: 0 10px; margin: 0;" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
    
</body>
</html>