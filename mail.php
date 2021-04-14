
<form method="POST" enctype="multipart/form-data" action="send-mail.php">
<link rel="stylesheet" type= "text/css" href="style.css">
	<div class ="send">
	<p> 
		Send to:
		<input type="text" name="receiver" placeholder="Enter Email address" >
		
	</p>
	</div>

	<div class="subj">
	<p>
		Subject:
		<input type="text" name="subject" placeholder="Enter Subject">
	</p>
	</div>

	<div class="messg">
	<p>
		Message:
		<textarea name="message"placeholder="Enter Message"></textarea>
	</p>
	</div>

	<div class="file">
	<p>
		Select file:
		<input type="file" name="file">
	</p>
	</div>
	<input type="submit" class="button">
</form>