    <?php
        $conn = mysqli_connect('localhost', 'root', ''); 
        if (!$conn)     
            die("Unable to connect to MySQL: " . mysqli_error($conn)); 
    	if (!mysqli_select_db($conn,'nasa_api'))     
			die("Unable to select database: " . mysqli_error($conn));
        ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload_image</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		  </head>
		
    <body>
		<div class="">
		  <center>
		  <h1>NASA API</h1>
		  <p>Astronomy Picture of the Day</p>
		  </center>
		<?php
		$sql_stmt = "SELECT * FROM `nasa_images` where reg_date='".date('Y-m-d')."'";
		date_default_timezone_set('Asia/Bishkek');
		echo date('Y-m-d h:i');
		$result = mysqli_query($conn, $sql_stmt);
		$rows = mysqli_num_rows($result);
		if (!$rows) {
			$url = "https://api.nasa.gov/planetary/apod?api_key=wlQx2Mr7CED3O4guKVR0Jsirsjtt1BjqYJnaNy6A";//&start_date=2021-2-10&end_date=2021-2-20";

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			//for debug only!
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

			$resp = curl_exec($curl);
			curl_close($curl);
			
			$arr = json_decode($resp, true);
			$cnt = count($arr);
			
			
			$img_url = '';
			if($arr['media_type'] == 'image'){
				$img_url = $arr['url'];	
				if(!empty($img_url)){
					$ext = explode('.', $img_url);
					$ext = array_slice($ext)[0]; 
					$folder = 'nasa-images/';
					//$filename = date('Y-m-d') .".". $ext;
					$filename = $arr['date'] .".". $ext;
					$filetmpname = file_get_contents($img_url);
					$file = file_put_contents($folder.$filename, $filetmpname);
					if ($file){
						$sql = "INSERT INTO `nasa_images`(`name`, `title`, `url`, `reg_date`) VALUES ('$filename', '".$arr[$i]['title']."', '".$arr[$i]['url']."', '".$arr[$i]['date']."')";
						$qry = mysqli_query($conn, $sql);
						if (!$qry)
							die("upload error" . mysqli_error($conn));
						else
							echo "Success!!!";
					}
					else{
						echo "Image not saved";
					}
				}
			}
			
			
			/*for($i=0; $i<=$cnt-1; $i++)
			{
				$img_url = '';
				if($arr[$i]['media_type'] == 'image'){
					$img_url = $arr[$i]['url'];	
					if(!empty($img_url)){
						$ext = explode('.', $img_url);
						$ext = array_slice($ext, -1)[0]; 
						$folder = 'nasa-images/';
						//$filename = date('Y-m-d') .".". $ext;
						$filename = $arr[$i]['date'] .".". $ext;
						$filetmpname = file_get_contents($img_url);
						$file = file_put_contents($folder.$filename, $filetmpname);
						if ($file){
							$sql = "INSERT INTO `nasa_images`(`name`, `title`, `url`, `reg_date`) VALUES ('$filename', '".$arr[$i]['title']."', '".$arr[$i]['url']."', '".$arr[$i]['date']."')";
							$qry = mysqli_query($conn, $sql);
							if (!$qry)
								die("upload error" . mysqli_error($conn));
							else
								echo "Success!!!";
						}
						else{
							echo "Image not saved";
						}
					}
				}
			}*/
			
			
		}?>
		<div class="your-class">
			<div class="row">
			<?php
				$sql_stmt = "SELECT * FROM `nasa_images` ORDER BY id DESC LIMIT 5";
				$result = mysqli_query($conn,$sql_stmt);
				$rows = mysqli_num_rows($result);
				if ($rows) {
					while ($row = mysqli_fetch_array($result)) {
						echo '<div class="col-md-4" style="text-align: center">
								'.$row["title"].'
								<img width="500px" height="300px" src="nasa-images/'. $row["name"] . '" alt="Astronomy Picture of the Day">
								<br/>'.
								"<b>Image name:</b> ".$row["name"]." <b>Date:</b> ".$row["reg_date"].'
							 </div>';
					}
				}?>
			</div>
		</div>
	</div>
		
	  </div><script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="js/slick.min.js"></script>
		<script>
			$(document).ready(function(){
			  $('.your-class').slick({
				setting-name: setting-value
			  });
			});
			</script>
    </body>
    </html>