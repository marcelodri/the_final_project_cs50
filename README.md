# Trivia GOT
#### Video Demo:  <https://www.youtube.com/watch?v=YZTSgSrnv0Y>
#### Description:
<h5>This is The Final proyect for the CS50 course.</h5>

<p>Project contains MVC layout (Model, View, Controller)
It was developed in PHP on the backend side to perform some small validations like "blank fields" or removing special characters (to add a bit of security). It is not necessary to register with an email as it does not use email validation. This project it is on trial basis.</p>

<p>I made a Game Of Throne trivia with PHP language for the backend and a bit of
JavaScript on the client side.
I leave the project link in the description.
Sign up and do the trivia. We'll see how much you know about Game of Throne. Thank you.</p>


> To use the project you just have to create a connection file to the Database and generate the Class as follows:
<code><pre>
Class Conexion{
	static public function conectar(){
		$link = new PDO("mysql:host=nameHost;dbname=nameDB","nameUserDB","passwordDB");
		$link->exec("set names utf8");
		return $link;
	}
}
</pre></code>

