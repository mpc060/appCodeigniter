<html>
    <head>
        <link rel="stylesheet" href=" <?= base_url("css/bootstrap.css") ?> ">
        <title>Cadastro de Usuário</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
    </head>
    <body>   
        <div class="container">
            <?php if($this->session->flashdata("success")) : ?>
                <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
            <?php endif ?>
            
            <?php if($this->session->flashdata("danger")) : ?>
                 <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
            <?php endif ?>
            
            <h1>Cadastro de Usuário</h1>   
            <?php
                echo form_open("usuarios/novo");           
                echo form_label("Nome", "nome");
                echo form_input(array(
                    "name" => "nome",
                    "id" => "nome",
                    "type" => "text",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));  
                echo form_error("nome", "");     
                  
                echo form_label("Email", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));
                echo form_error("email", "");
                        
                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));
                echo form_error("senha", "");
                        
                echo form_label("Confirmar Senha", "confirmarSenha");
                echo form_password(array(
                    "name" => "confirmarSenha",
                    "id" => "confirmarSenha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));
                echo form_error("confirmarSenha", "");
                        
                echo form_label("Telefone", "telefone");
                echo form_input(array(
                    "name" => "telefone",
                    "id" => "telefone",
                    "class" => "form-control",
                    "placeholder" => "(00) 0000-0000",
                    "maxlength" => "255"
                )); 
                echo form_error("telefone", "");
                        
                echo form_label("RG", "rg");
                echo form_input(array(
                    "name" => "rg",
                    "id" => "rg",
                    "class" => "form-control",
                    "placeholder" => "00.000.000-0",
                    "maxlength" => "255"
                )); 
                echo form_error("rg", "");
                                 
                echo form_label("</br>CEP ", "cep"); 
                echo form_input(array(
                    "name" => "cep",
                    "id" => "cep",
                    "class" => "form-control",
                    "placeholder" => "Entre com o número do CEP e consulte para preencher os campos",
                    "maxlength" => "255"
                )); 
                echo form_error("cep", "");
                     
                echo form_label("<br/>");    
                echo form_button(array(
                    "class" => "btn btn-success btn-lg btn-block",
                    "id" => "btn_consulta",
                    "name" => "btn_consulta",
                   
                    "content" => "Consultar" 
                    
                )); 
                     
                echo form_label("<br/>Rua");
                echo form_input(array(
                    "name" => "rua",
                    "id" => "rua",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));   
                echo form_error("rua", "");
                        
                echo form_label("Bairro", "bairro");
                echo form_input(array(
                    "name" => "bairro",
                    "id" => "bairro",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));   
                echo form_error("bairro", "");
                        
                echo form_label("Cidade", "cidade");
                echo form_input(array(
                    "name" => "cidade",
                    "id" => "cidade",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));
                echo form_error("cidade", "");
                
                echo form_label("Estado", "estado");
                echo form_input(array(
                    "name" => "estado",
                    "id" => "estado",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));
                echo form_error("estado", "");
              
                echo form_label("<br/>");    
                echo form_button(array(
                    "class" => "btn btn-primary btn-lg btn-block",
                    "type" => "submit",
                    "content" => "Cadastrar"              
                ));          
                echo form_close();       
             ?>   
        </div>       
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script> 
        <script type="text/javascript">   
        $(function(){
            $("#btn_consulta").click(function(){
                var cep = $('#cep').val();
                if (cep == '') {
                    alert('Informe o CEP antes de continuar');
                    $('#cep').focus();
                    return false;
                }
                $('#btn_consulta').html('Aguarde...');
                $.post("index.php/usuarios/formulario/consulta",
                {
                    cep: cep
                }, 
                function(dados){
                    $('#rua').val(dados.logradouro);
                    $('#bairro').val(dados.bairro);
                    $('#cidade').val(dados.localidade);
                    $('#estado').val(dados.uf);
                    $('#btn_consulta').html('Consultar');
                }, 'json');
            });
        });
        </script>
        <script>
            $(document).ready(function () { 
                var $telefone = $("#telefone");
                $telefone.mask('(00) 00000-0000');
            });
        </script>
        <script>
            $(document).ready(function () { 
                var $rg = $("#rg");
                $rg.mask('00.000.000-0');
            });
        </script>
    </body>
</html>