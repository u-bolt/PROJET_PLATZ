<!DOCTYPE HTML>
<html>
	<head>
		@include('templates.partials._head')
	</head>
	<body>
		
		<div id="app">
			<router-view></router-view>
		</div>

		@include('templates.partials._scripts')
	</body>
</html>
