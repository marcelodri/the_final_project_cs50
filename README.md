<h1>Trivia GOT</h1>
<h5>This is The Final proyect for the CS50 course.</h5>

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
