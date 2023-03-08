<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <title>Welcome to our programme!</title>
</head>

<body>
<h1>Hello,</h1>
<p>You have been successfully enrolled into Inclusive Surrogacy programme. To continue, please use the link below to register!</p>
<p><a href="{{\Illuminate\Support\Facades\URL::to('/')}}/!/new-user?email={{$email}}">CLICK HERE</a> to register! </p>
<hr>
<p>Sent @php echo date('d.n.Y \v H:i')@endphp</p>
<img src="{{asset('images/is_full.png')}}" alt="">
