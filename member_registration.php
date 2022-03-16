First Name: <input type="text" name="first" value="<?php echo $first;?>">

Last Name: <input type="text" name="last" value="<?php echo $last;?>">

Email: <input type="text" name="email" value="<?php echo $email;?>">

Password: <input type="text" name="password" value="<?php echo $password;?>">

Phone Number: <input type="text" name="phone" value="<?php echo $phone;?>">

Name on Card: <input type="text" name="nameoncard" value="<?php echo $nameoncard;?>">

Card Number: <input type="text" name="card" value="<?php echo $card;?>">

Security Code: <input type="text" name="code" value="<?php echo $code;?>">

Date:
<input type="radio" name="date"
<?php if (isset($date) && $date=="010120202") echo "checked";?>
	value="01012020">January
	<input type="radio" name="date2"
<?php if (isset($date2) && $date2=="02012020") echo "checked";?>
	value="02022020">February
	<input type ="radio" name="date3"
<?php if (isset($date3) && $date3=="03012020") echo "checked";?>
	value="03012020">March
	
