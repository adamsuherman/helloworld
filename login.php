<!-- @authors Adam Suherman-->
<!DOCTYPE html>
<html>
<style>
html {
    font-size: 100%;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
}
body {
  background:#669999;
}
.container{
  background:#fff;
  border-radius:6px;
  padding:20px;
  padding-top:30px;
  position: relative;
  top:75px;
  width:300px;
  margin:50px auto;
  box-shadow:15px 15px 0px rgba(0,0,0,.1);
}
.tombol{
	position:relative;
	width:100%;
	padding:20px;
	border-radius:6px;
	border:0;
	background:#ff6666;
	font-size:1.2em;
	color:#fff;
	text-shadow:1px 1px 0px rgba(0,0,0,.1);
	box-shadow:0px 3px 0px #ff3333;
	cursor:pointer;
}
h1 {
font-family: "Trebuchet MS", Helvetica, sans-serif;
  text-align:center;
  font-size:2em;
  font-weight:700;
  color:#888989;
  margin-bottom:24px;
}
input {
  width:80%;
  background:#f5f5f5;
  border:0;
  padding:20px;
  border-radius:6px;
  margin-bottom:10px;
  border:1px solid #eee;
  float:center;
}
input:focus, 
textarea:focus {
    outline: none;
}
h4{
	font-style: thin;
	font-family: Verdana, Geneva, sans-serif;
	color:#888989;
	font-size:0.7em;
  text-decoration:none;
}
</style>
<head>
	<title>Evaluation System</title>
</head>
<body>
<form action="action_login.php" method="post" class="container">
<h1><center>Evaluation System</center></h1>
<input type="text" placeholder="NIK" name="username"><br>
<input type="password" placeholder="password" name="password"><br>
<input type="submit" name="submit" value="Log in" class="tombol"/><br>
<center><h4>PT Paramount Bed Indonesia</h4></center>
</form>
</body>
</html>