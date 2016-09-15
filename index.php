<?php
	if(!empty($_GET['submit'])){
		$col = isset($_GET['col']) ? $_GET['col'] : 6;
		$num = isset($_GET['num']) ? $_GET['num'] : 6;
		$min = isset($_GET['min']) ? $_GET['min'] : 1;
		$max = isset($_GET['max']) ? $_GET['max'] : 45;
		$error = '';
		if( !is_numeric($col) || !is_numeric($num) || !is_numeric($min) || !is_numeric($max) ){
			$error = "Nhập sai số";
		} else if( $max <= $min ){
			$error = 'Vingf chọn không có giá trị';
		} else if($num > ($max-$min+1)){
			$error = 'Số bạn nhập nằm ngoài vùng chọn';
		}

		if( empty($error) ){
			$range = range($min, $max);
			shuffle($range);
			$result = array_slice($range, 0,$num);
			$random_result = array_chunk($result, $col);	
		}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chương trình tạo số ngẫu nhiên</title>
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="/css/style.css" media="all" />
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="/css/iestyle.css" media="all" />
	<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="true random numbers" />
<meta name="description" content="This page allows you to generate random integers using true randomness, which for many purposes is better than the pseudo-random number algorithms typically used in computer programs." />
<meta name="author" content="Dat VQ" />
<!-- <script type="text/javascript" src="/js/random.js"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/js/simpledropdown.jquery.js"></script> -->
</head>

<body>
	<h2>Tạo số ngẫu nhiên dùng để chơi Vietlott</h2>


	<p>Chương trình này cho phép tạo các số ngẫu nhiên.  Số này 
	xuất hiện theo một trình tự đặc biệt, được sử dụng cho nhiều mục đích, tốt hơn 
	so với các số ngẫu nhiên thường được sử dụng trong các chương trình máy 
	tính.</p>

	<form method="get" action="">

	<h3>Phần 1: Chọn số</h3>

	<p>Tạo <input type="number" name="num" value="<?php echo $num ?>" size="6"
	maxlength="2" /> cặp số ngẫu nhiên (tối đa 45).</p>

	<p>Mỗi số phải có giá trị từ <input type="number"
	name="min" value="<?php echo $min ?>" size="6" maxlength="12" /> đến <input
	type="number" name="max" value="<?php echo $max?>" size="6" maxlength="12" />
	</p>

	<p>Định dạng thành <input type="number"
	name="col" value="<?php echo $col ?>" size="2" maxlength="6" /> cột.</p>

	<h3>Phần 2: Bắt đầu!</h3>

	<p>
		<input type="submit" value="Lấy số" />
		<input type="reset" value="Làm lại" onclick="form.reset();" />
	</p>

	</form>

	
	<div id="data">
		<?php if(!empty($error)):?>
		<p><?php echo $error?></p>
		<?php else :?>
		<p>Đây là dãy số của bạn:</p>
		<pre>
			<?php foreach($random_result as $i => $result ): ?>
			<?php echo implode("  ", $result); echo "\n"; ?>
			<?php endforeach?>
		</pre>
		<?php endif?>
	</div>	
</body>
</html>
