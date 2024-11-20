<html>
<body>
	<div class="container">
	<div class="box">
</div>
	<style>
		html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('webpics/back1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: white;
    display: flex;
    flex-direction: column;
    min-height: 100vh; 
}
		h1{
			position: relative;
			top: 15px;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}
	.bt{
		height:40px;
		width:140px;
		border: none;
		transition: .3s;
		border-radius:5px;
		font-size:20px;
		font-weight:600;
		color:white;
		border:2px solid white;
		background-color:rgba(0,0,0,0.1);
		
	}
	.container{
		display:flex;
		justify-content:center;
		align-items:center;
		width:100%;
	}
	.bt:active{
		color:black;
		background-color:white;

	}
	
	
	.box{
		position:relative;
		display:flex;
		flex-direction:column;
		justify-content:center;
		align-content:center;
		border:2px solid white;
		text-align:center;
		width:450px;
		height:350px;
		backdrop-filter:blur(2px);
		background-color:rgba(0,0,0,0.2);
		margin: 100px;
		border-radius:20px;
	
	}
	.box form{
		display:flex;
		flex-direction:column;
		justify-content:center;
		align-items:center;
	}
	input{
		display:flex;
		border-radius:15px;
		color:white;
		border:none;
		background-color:rgba(0,0,0,0.1);
		outline:none;
		width:80%;
		height:40px;
	}
	input:focus{
		outline:solid 1px white;
		
	}
	.text{
		
		border: 1px solid white;
		font-size:14px;
		font-weight:600;
		font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		transition: .2s;
		
	}
	a{
		color:white;
		text-decoration:none;
	}
	
	</style>
</body>




</html>