<?php

// Lista inicial de tarefas para demonstrar uma aplicação simples.
$tarefas = [
    ['titulo' => 'Estudar funções em PHP', 'concluida' => true],
    ['titulo' => 'Praticar estruturas de repetição', 'concluida' => false],
    ['titulo' => 'Montar o mapa mental', 'concluida' => false],
];

/**
 * Exibe uma lista de tarefas usando foreach.
 */
function listarTarefas(array $tarefas): void
{
    if (count($tarefas) === 0) {
        echo '<p>Nenhuma tarefa cadastrada.</p>';
        return;
    }

    echo '<ol>';

    foreach ($tarefas as $tarefa) {
        $status = $tarefa['concluida'] ? 'Concluída' : 'Pendente';
        $classe = $tarefa['concluida'] ? 'concluida' : 'pendente';

        echo '<li class="' . $classe . '">';
        echo htmlspecialchars($tarefa['titulo'], ENT_QUOTES, 'UTF-8');
        echo ' — <strong>' . $status . '</strong>';
        echo '</li>';
    }

    echo '</ol>';
}

/**
 * Conta quantas tarefas ainda estão pendentes usando foreach.
 */
function contarPendentes(array $tarefas): int
{
    $pendentes = 0;

    foreach ($tarefas as $tarefa) {
        if (!$tarefa['concluida']) {
            $pendentes++;
        }
    }

    return $pendentes;
}

/**
 * Simula a busca de uma tarefa pelo título usando for.
 */
function buscarTarefa(array $tarefas, string $titulo): ?array
{
    for ($i = 0; $i < count($tarefas); $i++) {
        if (strcasecmp($tarefas[$i]['titulo'], $titulo) === 0) {
            return $tarefas[$i];
        }
    }

    return null;
}

$quantidadePendentes = contarPendentes($tarefas);
$tarefaEncontrada = buscarTarefa($tarefas, 'Montar o mapa mental');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas em PHP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 760px; margin: 40px auto; padding: 0 20px; background: #f4f7fb; color: #1f2937; }
        main { background: white; padding: 28px; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,.08); }
        h1 { color: #2563eb; }
        .concluida { color: #15803d; }
        .pendente { color: #b45309; }
        .resumo { margin-top: 24px; padding: 14px; background: #eff6ff; border-left: 4px solid #2563eb; }
    </style>
</head>
<body>
<main>
    <h1>Lista de Tarefas em PHP</h1>
    <p>Exemplo acadêmico com funções e estruturas de repetição.</p>

    <h2>Tarefas cadastradas</h2>
    <?php listarTarefas($tarefas); ?>

    <section class="resumo">
        <p><strong>Tarefas pendentes:</strong> <?= $quantidadePendentes ?></p>
        <p><strong>Busca:</strong>
            <?= $tarefaEncontrada
                ? 'A tarefa "' . htmlspecialchars($tarefaEncontrada['titulo'], ENT_QUOTES, 'UTF-8') . '" foi encontrada.'
                : 'Tarefa não encontrada.' ?>
        </p>
    </section>
</main>
</body>
</html>
