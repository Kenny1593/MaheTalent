<?php

require_once 'test_2.php';

$tasks = [
    new Task("Configurer le serveur", "Client A", 1, true, "En attente des accès"),
    new Task("Rédiger la documentation", "Projet interne", 3, false, null),
    new Task("Mettre à jour le schéma", "Client B", 2, true, "Décision métier en attente"),
    new Task("Tester l'application", "Client A", 2, false, null),
    new Task("Migration base de données", "Client B", 1, true, "Serveur indisponible"),
    new Task("Revue du code", "Projet interne", 3, false, null),
    new Task("Créer les rapports", "Client C", 2, false, null),
    new Task("Formation équipe", "Client C", 3, true, "Planning non défini")
];

$blockedTasks = getBlockedTasks($tasks);




/* Test de la fonction setBlocked avec une tâche qui n'a pas de raison de blocage */
/******************************************************************/
/*$te=new Task("Tester la fonctionnalité", "Client A", 2);
$te->setBlocked(true , "");*/

?>

<table border="1">
    <thead>
        <tr>
            <th>Nom de la tâche</th>
            <th>Projet</th>
            <th>Priorité</th>
            <th>Raison du blocage</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($blockedTasks as $task): ?>
            <tr>
                <td><?php echo($task->name); ?></td>
                <td><?php echo ($task->project); ?></td>
                <td><?php echo ($task->priority); ?></td>
                <td><?php echo ($task->block_reason); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
