            <?php 
            $servername = "localhost";
            $username = "root";
            $password= "";
            $database = "fullstackeletro";

        $conn = mysqli_connect($servername,$username,$password,$database);
                
                if (!$conn){
                die ("A conexão ao BD Falhou:" . mysqli_connect_error());
            }
                if (isset($_POST['Nome_cli'])&& isset($_POST['endereço_cli'])&& isset($_POST['telefone'])  && isset($_POST['nome_produto'])  && isset($_POST['valor_unitário'])&& isset($_POST['quantidade'])&& isset($_POST['valor total'])){
                
                $nome=$_POST['Nome_cli'];
                $endereco=$_POST['endereço_cli'];
                $telefone=$_POST['telefone'];
                $Nproduto=$_POST['nome_produto'];
                $Vunitario=$_POST['valor_unitário'];
                $qtd=$_POST['quantidade'];
                $vTotal=$_POST['valor total'];

                $sql="INSERT INTO `pedidos`(`Nome_cli`, `endereço_cli`, `telefone`, `nome_produto`, `valor_unitário`, `quantidade`, `valor total`) VALUES ('$nome','$endereco',$telefone,$Nproduto,$Vunitario,$qtd,$vTotal)";
                $result=$conn->query($sql);
            }


    ?>

        <!DOCTYPE html>
        <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <title>Pedidos - Full Stack Eletro</title>
                <link rel="stylesheet" href="css/estilo.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
                <script src="./js/funcoes.js"></script>
            </head>
            <body>
            
        <?php

        include('menu.html');
        
        ?>

      
     <div class= "container-fluid">      

            <form method="post" action="">
            <main> Solicitar pedido</main>
            <h4> Nome:</h4>
            <input title="text" name="nome"> 
            <h4> Endereço:</h4>
            <input title="text" name="endereco">
            <h4> Telefone:</h4>
            <input title="text" name="telefone">
            <h4> Categoria:</h4>
            <input title="text" name="Nqproduto">
            <h4> Valor Unitario:</h4>
            <input title="number" name="Vunitario">
            <h4> Quantidade:</h4>
            <input title="number" name="qtd">
            <h4> Valor Total:</h4>
            <input title="number" name='Vtotal'>
            <input type="submit" value="Enviar"></br>
            
    </form>
        </div>
        



    <?php 
    
        $sql = "select * from  pedidos";
        $result=$conn->query($sql);


        if ($result->num_rows >0){
                while ($row = $result-> fetch_assoc()) {
                    echo "Nome:",$row['Nome_cli'],"<br>";
                    echo "endereço:",$row['endereço_cli'],"<br>";
                    echo "telefone:",$row['telefone'],"<br>";
                    echo "Produto:",$row['nome_produto'],"<br>";
                    echo "Valor:",$row['valor_unitário'],"<br>";
                    echo "quantidade:",$row['quantidade'],"<br>";
                    echo "valor total:",$row['valor total'],"<br>";
                    echo  "<hr>";
                


        }

        } else {
            echo "Nenhum produto cadastrado";

        }

        
        ?>

        
    <div class="container p-1 my-1">
            <footer id="rodape2">
            <p id="rodape1"> Formas de Pagamento</p>
            <img src="./imagens/1.jpg" alt="Forma de pagamento" width="350" align="center">
            <p>&copy;Recode pro </p>
        
        </footer>
    </div>

    </body>
    </html>



