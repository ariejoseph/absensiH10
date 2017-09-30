<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Absensi</title>

	<!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body style="padding-top: 70px;">
@include('header')

<div class="container">
	@yield('content')
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<script type="text/javascript">
	var timer;
	function searchup() {
		timer = setTimeout(function() {
			var keywords = $('#search-input').val().toLowerCase();
			if (keywords.length > 0) {
				$('tr').each(function() {
					var name = $('#name', this).html().toLowerCase();
					if(name.search(keywords) < 0) {
						$('td', this).hide();
					} else {
						$('td', this).show();
					}
				});
			} else {
				$('td').show();
			}
		}, 250);
	}

	function searchdown() {
		clearTimeout(timer);
	}

	function showResult() {
		keyword = $('#search').val().toLowerCase();
		if(keyword != '') {
			path = location.pathname.split('/')[1];
			if(path == 'jemaat') {
				location.href = '/jemaat/search/'+keyword;
			} else if(path == 'anak') {
				location.href = '/anak/search/'+keyword;
			} else if(path == 'remaja') {
				location.href = '/remaja/search/'+keyword;
			} else if(path == 'pemuda') {
				location.href = '/pemuda/search/'+keyword;
			}
		}
	}

	$('input[name="check_list_jemaat[]"]').click(function() {
		var count = $("[type='checkbox']:checked").length;
		if(count > 0) {
			$('#absen').attr('disabled',false);
			$('.fa-check').html(' Hadir(' + count + ')');
		} else {
			$('#absen').attr('disabled',true);
			$('.fa-check').html(' Hadir');
		}
	});

	$(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
</script>
</body>
</html>