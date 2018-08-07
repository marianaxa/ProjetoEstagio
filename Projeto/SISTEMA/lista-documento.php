<?php 
require_once 'header.php';

?>


<fieldset>
  <legend>Lista de Documentos</legend>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome Arquivo</th>
        <th scope="col">Data Cadastro</th>
        <th scope="col">Descrição</th>
        <th scope="col">Opções</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>documento1.pdf</td>
        <td>22/07/2018</td>
        <td>Este é um documento de teste</td>
        <td>
          <button class="btn btn-primary">Editar</button> 
          <button class="btn btn-danger">Excluir</button>
        </td>
      </tr>
    </tbody>
  </table>
</fieldset>

<?php
require_once 'footer.php';

?>