<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('client.layouts.blocks.head')	
</head>
<body class="js">
	
	
	
	@include('client.layouts.blocks.notification')
	<!-- Header -->
	@include('client.layouts.blocks.header')
	<!--/ End Header -->
	@yield('main-content')
	
	@include('client.layouts.blocks.footer')

</body>
</html>