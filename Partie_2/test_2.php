<?php

//création d'une classe Task
class Task {

    public $name;
    public $project;
    public $priority;
    public $is_blocked;
    public $block_reason;

    public function __construct($name, $project, $priority, $is_blocked = false, $block_reason = null) {
        $this->name = $name;
        $this->project = $project;
        $this->priority = $priority;// 1=haute, 2=moyenne, 3=basse
        $this->is_blocked = $is_blocked;
        $this->block_reason = $block_reason;
    }

    //fonction pour bloquer ou débloquer une tâche
    public function setBlocked($is_blocked, $block_reason) {

        //Mettre un condition que si la tâche est bloquée, la raison de blocage doit être remplie
        if ($is_blocked) {

            if ($block_reason === null || trim($block_reason) === "") {
                throw new Exception("Une raison de blocage est obligatoire.");
            }

        }
        //initialiser les propriétés de la tâche
        $this->is_blocked = $is_blocked;
        $this->block_reason = $block_reason;
    }

}

    //fonctiion pour récupérer les tâches bloquées et les trier
    function getBlockedTasks($tasks) {

        // filtrer les tâches bloquées et n'accepter que celles qui sont bloquées
        $blockedTasks = array_filter($tasks, function($task) {
            return $task->is_blocked;
        });

        // Trier les tâches avec la fonction usort
        usort($blockedTasks, function($a, $b) {
            //si les priorités sont égales, on va les trier par leur nom avec la fonction strcmp
            if ($a->priority == $b->priority) {
                return strcmp($a->name, $b->name);
            }

            return $a->priority - $b->priority;
        });
        //retourner les tâches bloquées triées
        return $blockedTasks;
    }




