            <?php 
                    $servername = "localhost";
                    $username = "root";
                    $password= "";
                    $database = "fullstackeletro";

            //criando a conexão
            $conn = mysqli_connect($servername,$username,$password,$database);

                    if (!$conn){
                    die ("A conexão ao BD Falhou:" . mysqli_connect_error());
                }
                    if (isset($_POST['nome'])&& isset($_POST['msg'])){
                    $nome=$_POST['nome'];
                    $msg=$_POST['msg'];

                    $sql="INSERT INTO comentarios(nome,msg) values ('$nome','$msg')";
                    $result=$conn->query($sql);
                }
            ?>

            <!DOCTYPE html>
                <html lang="Pt-br">
                <head>
                <meta charset="UTL-8">
                <title>Contatos</title>
                <head>
                <link rel="stylesheet" href="css/estilo.css"> <!-- Configuração de estilo em css-->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
                </head>
                <body>
                <html>

                
        <?php
        include('menu.html');
        ?>
                <section>  
                    <div class="contatos">
                    <div class="Formacontato">
                    <img src="./imagens/email.png" width="40px">
                    <br>
                    <p>contato@fulleletro.com.br</p>


                </div>
                    <div class="Formacontato">
                    <img src="./imagens/zap.png" width="50px">
                    <p>(11) 99877-9778</p>
                    </div>


                <div class="Formacontato">

                    <form method="post" action="">
                    <main> Entre em contato:</main>
                    <h4> Nome:</h4>
                    <input title="text" name="nome" style="width:" 400px;>
                    <h4>Mensagens:</h4>
                    <textarea style="width:" name="msg" 400px></textarea>
                    <input type="submit" value="Enviar"></br>
                    </form>
                <?php 
                $sql = "select * from comentarios";
                $result=$conn->query($sql);
                
                
                if ($result->num_rows >0){
                    while ($row = $result-> fetch_assoc()) {
                        echo "Data:",$row['data'],"<br>";
                        echo "nome:",$row['nome'],"<br>";
                        echo "mensagem:",$row['msg'],"<br>";
                        echo  "<hr>";
                        
                ?>
                <?php
            }
            
                    } else {
                    echo "Nenhum comentarios";
                
                    }
                
            ?>
                </div>

            
                </section>

                <div class="container p-1 my-1">
        <footer id="rodape2">
        <p id="rodape1"> Formas de Pagamento</p>
        <img src="./imagens/1.jpg" alt="Forma de pagamento" width="350" align="center">
        <p>&copy;Recode pro </p>
    
    </footer>
                </body>
        </html>