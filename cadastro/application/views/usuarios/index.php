<html>
    <head>
        <link rel="stylesheet" href=" <?= base_url("css/bootstrap.css") ?> ">
        <title>Cadastro</title>
    </head>
    <body>
        <div class="container">
            
            <?php if($this->session->flashdata("success")) : ?>
                <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
            <?php endif ?>
            
            <?php if($this->session->flashdata("danger")) : ?>
                 <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
            <?php endif ?>
            
            <?php if ($this->session->userdata("usuario_logado")) : ?>
            
            <h1>Usuários</h1>
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>RG</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>
                <?php foreach($usuarios as $usuario) : ?>
                <tr>
                    <td> <?= $usuario['nome'] ?> </td>
                    <td> <?= $usuario['email'] ?> </td>
                    <td> <?= $usuario['telefone'] ?> </td>
                    <td> <?= $usuario['rg'] ?> </td>
                    <td> <?= $usuario['rua'] ?> </td>
                    <td> <?= $usuario['bairro'] ?> </td>
                    <td> <?= $usuario['cidade'] ?> </td>
                    <td> <?= $usuario['estado'] ?> </td>
                </tr>
                <?php endforeach ?>
            </table>
            
            <?= anchor("usuarios/formulario", "Novo Usuário", array("class" =>"btn btn-primary btn-lg btn-block")) ?>
            
            <?= anchor("login/logout", "Sair", array("class" =>"btn btn-primary btn-lg btn-block")) ?>
            
            <?php else : ?>
            
            <h1>Login</h1>
            
            <?php    
                
                echo form_open("login/autenticar"); 
                                                
                echo form_label("Email", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));   
                        
                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));   

                  echo form_label("<br/>");          
                  echo form_button(array(
                    "class" => "btn btn-primary btn-lg btn-block",
                    "type" => "submit",
                    "content" => "Login"
                
                  ));  
                        
                echo form_close();       
            ?>
            
            <?php endif ?>
            
        </div>
    </body>
</html>