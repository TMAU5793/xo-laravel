<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XO Game</title>

    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Use project custom style -->
    <link rel="stylesheet" href="{{ url('assets/css/xo-style.css') }}">
</head>

<body>

	<div class="container position-releative">
		<div class="card p-3 mt-5">
			<div class="input-num">
				<div class="">
					<h4>ระบุจำนวนช่อง สำหรับเล่นเกม XO (ค่าเริ่มต้น 3x3 ช่อง)</h4>
				</div>
				<hr>
				<form action="{{ route('boxsize') }}" method="POST">
					@csrf
					<div class="row">

						<div class="col-5">
								<div class="form-group">
									<label for="rows">จำนวนช่องแนวนอน (แกน X)</label>
									<input type="text" id="rows" name="rows" class="form-control input-num" value="{{ $rows }}">
									<div class="error-num"></div>
								</div>
						</div>

						<div class="col-5">
								<div class="form-group">
									<label for="cols">จำนวนช่องแนวตั้ง (แกน Y)</label>
									<input type="text" id="cols" name="cols" class="form-control input-num" value="{{ $cols }}">
									<div class="error-num"></div>
								</div>
						</div>

						<div class="col-2 d-flex">
								<button type="submit" class="btn btn-primary align-self-end">ยืนยัน</button>
						</div>

					</div>
				</form>

				<div class="xo-box text-nowrap overflow-scroll mt-3">

					@for ($x=0; $x < $rows; $x++)
						@for ($y=0; $y < $cols; $y++)

							<input type="button" id="xo{{ $x.$y }}" value=" " onclick="playClick({{ $x }}, {{ $y }})" class="mb-2 input-player text-center" @readonly(true)>

						@endfor
						{!! '<br>' !!}
					@endfor
				</div>


			</div>
		</div>
	</div>

	<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

	<script>

		let player = 1;
		const playClick = (x, y) => {
			
			if(player == 1){
				player = 2;
				$('#xo'+x+y).val('x');
			}else{
				player = 1;
				$('#xo'+x+y).val('o');
			}
		}

		$(function(){
			$('.input-num').on('change', function(){
				let num = $(this).val();
				if(num < 3){
					$(this).val(3);
					$(this).parents('.form-group').find('.error-num').html('<span class="text-danger">* จำนวนตั้งแต่ 3 ขึ้นไป</span>');

					setTimeout(() => {
						$('.error-num').html('');
					}, 1500);
				}
			});
		});
	</script>
</body>

</html>
