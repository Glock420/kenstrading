<!--
    
<!doctype html>
<html lang="en">

<style>
   
</style>

<body>
    <div class="d-lg-flex half">
            <div class="bg order-0 order-md-0">
            <img src="{{ asset('images/kens pic/kens trading logo.jpg') }}" alt="kens logo" height="100" width="100">
    
    </div>

    <div> 
            <h1>About Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra mauris vel velit vulputate, eu efficitur tortor tristique. Quisque ac fermentum mauris, sit amet fringilla lectus. Mauris feugiat lectus vel nunc sagittis, vitae iaculis risus dictum. Nunc venenatis dolor sit amet purus interdum, id suscipit nisl eleifend. Vestibulum feugiat arcu et sapien vehicula viverra. Proin pulvinar purus ac lacinia volutpat. Aliquam rutrum augue et metus ullamcorper, eu commodo risus pulvinar. Morbi interdum sapien eu mi consequat, non iaculis dui placerat. Nam in tempor justo. Pellentesque consequat risus et magna bibendum, et viverra nunc interdum. Ut eleifend arcu in lectus pulvinar aliquet. Duis eu fringilla nisl. Suspendisse id malesuada libero, vitae facilisis velit. Donec vestibulum mauris id bibendum hendrerit.</p>
    </div>
    
   

        

</html>

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            font-size: 36px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }
        
        p {
            font-size: 18px;
            font-weight: 400;
            line-height: 1.5;
            color: #555555;
            text-align: justify;
        }
        
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        button {
            background-color: #000000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #333333;
        }

        button:focus {
            outline: none;
        }

    </style>

    <link rel="icon" href="{{ asset('images/kens pic/kens trading logo.jpg') }}">
</head>


<body>
    <div class="container">
        <div class="center">
        <img src="{{ asset('images/kens pic/kens trading logo.jpg') }}" alt="kens logo"  width="200">
        </div>
        <h1>About Us</h1>
        <p>Kens Trading is a leading car upgrade and accessory business, offering exceptional services to automotive enthusiasts. With years of professional experience, we specialize in transforming vehicles into extraordinary works of art. Our skilled technicians utilize the latest automotive technology to deliver top-notch results. We source high-quality materials and prioritize craftsmanship to ensure flawless installations and superior performance. Kens Trading stays ahead of the competition by staying updated with industry trends and innovations. We provide personalized attention, expert advice, and a seamless customer experience. Choose Kens Trading for unparalleled quality and professionalism in car upgrades and accessories. Elevate your vehicle's performance, style, and driving experience with us.</p>
    
        <form action ="{{route('/')}}" method ="get">
        <div class="text-center mb-3">
            <button type="submit">Go Back to Login Page</button>
        </div>
        </form>
    </div>

    
</body>
</html>


