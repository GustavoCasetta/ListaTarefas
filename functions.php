<?php

// Função para ver tarefas
function verLista(array $listaTarefas, array $tarefasConcluidas, array $tarefasRemovidas): void{
    if(empty($listaTarefas)){
        echo "============================" . "\n";
        echo "====== Não há tarefas! =====" . "\n";
        echo "============================" . "\n";
    } else {
        echo "========= TAREFAS =========" . "\n";
        foreach($listaTarefas as $tarefa){
            echo $tarefa . "\n";
        }
        echo "\n";
        echo "Tarefas Concluídas: " . count($tarefasRemovidas) . "\n";
        echo "Tarefas Removidas: " . count($tarefasConcluidas) . "\n";
    }
}

// Função para adicionar tarefas
function adicionarTarefa(array $listaTarefas): array{
    echo "============================" . "\n";
    echo "= Qual tarefa será adicionada? =" . "\n";
    echo "============================" . "\n";
    $novaTarefa = (string) trim(fgets(STDIN));

    $listaTarefas[] = $novaTarefa;
    
    echo "============================" . "\n";
    echo "= Tarefa nova adicionada! =" . "\n";
    echo "============================" . "\n";
    return $listaTarefas;
}

// Função para remover tarefas
function removerTarefa(array $listaTarefas, array $tarefasRemovidas): array{

    // Verifica se existe alguma tarefa no array
    if(empty($listaTarefas)){
        echo "============================" . "\n";
        echo "= Não há tarefas na lista! =" . "\n";
        echo "============================" . "\n";
        return [$listaTarefas, $tarefasRemovidas];
    } else {
        echo "========= TAREFAS =========" . "\n";
        foreach($listaTarefas as $tarefa){
            echo $tarefa . "\n";
        }
        echo "============================" . "\n";
        echo "= Qual tarefa será removida? =" . "\n";
        echo "============================" . "\n";
        $removerTarefa = (string) trim(fgets(STDIN));

        $indice = array_search($removerTarefa, $listaTarefas);

        // Remove a tarefa
        if($indice !== false){
            $tarefasRemovidas[] = $listaTarefas[$indice];
            unset($listaTarefas[$indice]);

            $listaTarefas = array_values($listaTarefas);
            echo "============================" . "\n";
            echo "===== Tarefa removida! =====" . "\n";
            echo "============================" . "\n";
        } else {
            echo "============================" . "\n";
            echo "== Tarefa não encontrada! ==" . "\n";
            echo "============================" . "\n";
        }
        return [$listaTarefas, $tarefasRemovidas];
    }
}

// Função que conclui tarefas
function concluirTarefa(array $listaTarefas, array $tarefasConcluidas): array{
    if(empty($listaTarefas)){
        echo "============================" . "\n";
        echo "= Não há tarefas na lista! =" . "\n";
        echo "============================" . "\n";
        return [$listaTarefas, $tarefasConcluidas];
    } else {
        echo "========= TAREFAS =========" . "\n";
        foreach($listaTarefas as $tarefa){
            echo $tarefa . "\n";
        }
        echo "============================" . "\n";
        echo "= Qual tarefa será concluida? =" . "\n";
        echo "============================" . "\n";
        $concluirTarefa = (string) trim(fgets(STDIN));

        $indice = array_search($concluirTarefa, $listaTarefas);

        if($indice !== false){
            $tarefasConcluidas[] = $listaTarefas[$indice];
            unset($listaTarefas[$indice]);

            $listaTarefas = array_values($listaTarefas);
            echo "============================" . "\n";
            echo "==== Tarefa concluida! =====" . "\n";
            echo "============================" . "\n";
        } else {
            echo "============================" . "\n";
            echo "== Tarefa não encontrada! ==" . "\n";
            echo "============================" . "\n";
        }
        return [$listaTarefas, $tarefasConcluidas];
    }
}

// Mostra tarefas removidas
function verTarefasRemovidas(array $tarefasRemovidas): void{
    if(empty($tarefasRemovidas)){
        echo "=============================" . "\n";
        echo "= Não há tarefas removidas! =" . "\n";
        echo "=============================" . "\n";
    } else {
        echo "===== TAREFAS REMOVIDAS =====" . "\n";
        foreach($tarefasRemovidas as $tarefa){
            echo $tarefa . "\n";
        }
    }
}

// Mostra tarefas concluidas
function verTarefasConcluidas(array $tarefasConcluidas): void{
    if(empty($tarefasConcluidas)){
        echo "=============================" . "\n";
        echo "= Não há tarefas concluidas! =" . "\n";
        echo "=============================" . "\n";
    } else {
        echo "===== TAREFAS CONCLUÍDAS =====" . "\n";
        foreach($tarefasConcluidas as $tarefa){
            echo $tarefa . "\n";
        }
    }
}

function limparTela(){
    if (PHP_OS_FAMILY === 'Windows') {
        system('cls');
    } else {
        system('clear');
    }
}