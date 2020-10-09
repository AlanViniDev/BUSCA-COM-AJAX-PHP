<?php

// cabeçalho.
header('Content-Type: text/html; iso-8859-1;charset:utf-8;');

// conexão com banco de dados.
$conecta = new PDO('mysql:host=localhost;dbname=aula_ajaxphp;charset=utf8', 'root', '');

//requisição post.

$pessoa = $_POST['pessoa'];

// se a variavel pessoa estiver preenchida o algoritimo realiza o select se não houver atribui 0.
if(!empty($pessoa))
{
    
    $sql = $conecta->query("SELECT id FROM usuario where nome LIKE '%$palavra%' ");
    $id = array($sql->fetch(\PDO::FETCH_COLUMN));
    
    $sql = $conecta->query("SELECT nome FROM usuario where nome LIKE '%$palavra%' ");
    $nome = array($sql->fetch(\PDO::FETCH_COLUMN));
    
    $sql = $conecta->query("SELECT email FROM usuario where nome LIKE '%$palavra%' ");
    $email = array($sql->fetch(\PDO::FETCH_COLUMN));
    
    $count = array($sql->rowCount(\PDO::FETCH_ASSOC));
    
    // se o nome não existir retorna a frase: Nao foram encontrados registros com esta palavra.
    if(implode($count) == 0)
    {
        $count = 0;
    }
    
}

// Se  a variavel pessoa estiver vazia atribui 0 e retorna a frase: Nao foram encontrados registros com esta palavra.
else
{
    $count = 0;
}

?>
<section class="panel col-lg-9">
    <header class="panel-heading">
        Dados da busca:
    </header>
    <?php
    if($count > 0){
    ?>
    <!-- Lista a pessoa buscada -->
    <table class="table table-striped table-advance table-hover">
        <tbody>
            <tr>
                <th><i class="icon_profile"></i> Id</th>
                <th><i class="icon_profile"></i> Nome</th>
                <th><i class="icon_mail_alt"></i> E-mail</th>
            </tr>
            <?php 
            foreach($id as $id){
            foreach($nome as $nome){
            foreach($email as $email){
            ?>
            <tr>
                <td><?=$id;?></td>
                <td><?=$nome;?></td>
                <td><?=$email;?></td>
            </tr>
            <?php }}}?>
        </tbody>
    </table>
    <?php }else{?>
    <h4>Nao foram encontrados registros com esta palavra.</h4>
    <?php }?>
</section>
