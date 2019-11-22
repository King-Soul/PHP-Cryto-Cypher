<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$db = "cripto";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Erro na conecção à Base de Dados: " . $conn->connect_error);
}
//echo "Conecção com Sucesso";





class Login
{

    private $uID;
    private $nome;
    private $email;
    private $senha;
    private $nif;

public function __construct($email, $senha) //Construtor / Valores vem via parametro pela Instancia // , $nome, $uID, $nif
{
   // $this->nome = $nome;
    $this->setEmail($email); //Vai atribuir o valor de $email passado por parametro ao setEmail
    $this->setSenha($senha);
    //$this->uID = $uID;
    //$this->nif = $nif;
}



public function getNome()
{
    return $this->nome;
}


public function setEmail($e)
{
        $email = filter_var($e, FILTER_SANITIZE_EMAIL);

        //Função do PHP para filtar o EMAIL
        //por caracters que n podem ser utilizados

        $this->email = $email;

}


public function getSenha() //Pega no $senha
    {
        return $this->senha;


    }

    public function setSenha($pw) //Adicionar o Valor em $pw
    {
        $this->senha = $pw;
    }



    public Function Logar($email, $senha) //Metodo ou Função
    {
        if($this->email == $email and $this->senha == $senha)
        {
           header('location: index.php');


        }
    }

}


    $chaveSecreta = "A Disciplina de Criptografia"; // Chave secreta é uma frase que é utilizada para encriptar e desencriptar um texto

    $ivSecreto = "A Disciplina de Criptografia"; //Serve para reduzir o tamanho da chave a 16Bites já que o metodo CBC apenas aceita 16

    $metodo = "AES-256-CBC"; // Metodo de Enciptação

    $hash = hash('sha256', $chaveSecreta); //Gera uma hash sha256 a partir da ChaveSecreta

    $iv = substr(hash('sha256', $ivSecreto), 0, 16); //Reduz o ivSecreto a 16Bites


if (isset($_POST['login']))
{
    $email = $_POST['email']; // Este campo vem do fomulario de Login (login.php)
    $senha = $_POST['senha']; // Este campo vem do fomulario de Login (login.php)


    //Neste momento a senha é "XPTO" e na base de dados não existe "XPTO" pois esta encriptada

    $senha = openssl_encrypt($senha, $metodo, $chaveSecreta , 0, $iv); // Aqui encripta-se a senha "XPTO" para dar match com a que esta enciptada na base de dados

    $sql = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'"; //Ao dar select ele já vai buscar a password encriptada
   // $de = openssl_decrypt($senha, $metodo, $chaveSecreta, 0, $iv); //Isto seria utilizado para desencriptar a senha, caso fosse usado a edição de utilizador
    $results = mysqli_query($conn, $sql);


    if (mysqli_num_rows($results) == 1) {
      //$results['nome'] = $nome;
  	  $_SESSION['email'] = $email;
      $_SESSION['success'] = "Login com sucesso";

    $logar = new Login($email, $senha);
    $logar -> Logar($email, $senha);

  }
  else
  {
    header('location: erro.php');
  }
}

 //Estanciar classe | O Construtor inicia aqui automaticamente
// Email / Senha / Nome são passador por parametro para o Construtor

//$logar -> setEmail('teste@teste.com'); //Esta a passar por parametro pro $e
//$logar -> setSenha('123456'); //Esta a passar por parametro pro $pw



//Com os atributos privados não conseguimos aceder a eles fora da Classe
//Para o fazer utilizamos Gets e Sets



if (isset($_POST['registo']))
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nif = $_POST['nif'];

    $id = uniqid();
    

    $senha = openssl_encrypt($senha, $metodo, $chaveSecreta , 0, $iv);


    $sql = "INSERT INTO users (id, nome, email, senha, nif) VALUES ('$id', '$nome', '$email', '$senha', '$nif')";
    $results = mysqli_query($conn, $sql);
    //$result = $conn->query($sql);

    header ('location:   index.php');
}



