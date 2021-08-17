<?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

    require_once('../../app/model/categoriaModel.php');
    require_once('../../app/service/categoriaService.php');
    require_once('../../app/service/conexao.php');

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
        $categoria = new CategoriaModel();
        $categoria->__set('nome', $_POST['nome']);
        $categoria->__set('id_status', 1);

        $conexao = new Conexao();
        $categoriaService = new CategoriaService($conexao, $categoria);
        $categoriaService->inserir();

        header('Location: ../../categoria.php?inclusao=1');
    }