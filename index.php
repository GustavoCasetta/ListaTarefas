<?php

require __DIR__ . "/functions.php";

$listaTarefas = [];
$tarefasRemovidas = [];
$tarefasConcluidas = [];

do{
echo "============================" . "\n";
echo "===== LISTA DE TAREFAS =====" . "\n";
echo "============================" . "\n";
echo "1 - VER LISTA" . "\n";
echo "2 - ADICIONAR TAREFA" . "\n";
echo "3 - REMOVER TAREFA" . "\n";
echo "4 - VER TAREFAS REMOVIDAS" . "\n";
echo "5 - CONCLUIR TAREFA" . "\n";
echo "6 - VER TAREFAS CONCLUIDAS" . "\n";
echo "7 - SAIR" . "\n";
$opcao = (int) trim(fgets(STDIN));
limparTela();

switch($opcao){
    case 1:
        verLista($listaTarefas, $tarefasConcluidas, $tarefasRemovidas);
    break;
    case 2:
        $listaTarefas = adicionarTarefa($listaTarefas);
    break;
    case 3:
        [$listaTarefas, $tarefasRemovidas] = removerTarefa($listaTarefas, $tarefasRemovidas);
    break;
    case 4:
        verTarefasRemovidas($tarefasRemovidas);
    break;
    case 5:
        [$listaTarefas, $tarefasConcluidas] = concluirTarefa($listaTarefas, $tarefasConcluidas);
    break;
    case 6:
        verTarefasConcluidas($tarefasConcluidas);
    break;
    case 7:
        echo "============================" . "\n";
        echo "========= Saindo... ========" . "\n";
        echo "============================" . "\n";
    break;
    default:
        echo "============================" . "\n";
        echo "= Opção inválida! Verifique! =" . "\n";
        echo "============================" . "\n";
    break;
}
}while($opcao != 7);