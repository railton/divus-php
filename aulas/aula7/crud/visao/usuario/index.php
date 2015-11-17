

      <div class="page-header">
        <h1>Usuários</h1> 

        <a href="index.php?r=usuario/cadastrar" class="btn btn-primary">Cadastrar usuário</a>

      </div>
      <div class="row">
        <div class="col-md-12">


          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

<?php

foreach($rows as $row): // {
?>

              <tr>
                <td><?= $row['codigo'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>

                   <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                      
                      <a href="index.php?r=usuario/alterar&codigo=<?= $row['codigo'] ?>" class="btn btn-default">Alterar</a>
                      <a href="index.php?r=usuario/deletar&codigo=<?= $row['codigo'] ?>" class="btn btn-danger">Deletar</a>

                    </div>


                </td>
              </tr>

<?php
// }
endforeach;
?>
              
            </tbody>
          </table>


        </div>
      </div>