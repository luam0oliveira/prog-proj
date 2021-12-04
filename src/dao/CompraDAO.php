<?php
  require_once __DIR__ . "/../../admin/src/dao/ConexaoBD.php";

  class CompraDAO{
    public function cadastrarCompra(array $sessao){
      $conexao = ConexaoBD::getConexao();
      
      //INCIO
      date_default_timezone_set('America/Sao_Paulo');
      $data = date("Y-m-d H:i:s");
      $sql = "INSERT INTO pedido(usuario_id,data,total)
        VALUES('{$sessao['clienteId']}',
        '{$data}',
        '{$sessao['total']}')";
      $conexao->exec($sql);

      $compraId = $conexao->lastInsertId();
  
      $cesta = $sessao['cesta'];
      foreach($cesta as $item){
        $sql = "INSERT INTO item(pedido_id, livro_id, quantidade, valor)
          VALUES('{$compraId}',
            '{$item['id']}',
            '{$item['quantidade']}',
            '{$item['preco']}')";

        $conexao->exec($sql);
      }
      //FIM
    }
  }