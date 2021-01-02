<?php

require_once "Repository.php";
require_once __DIR__.'/../models/Project.php';

class ProjectRepository extends Repository
{
    public function getProject(int $id): ?Project
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM project WHERE id = :id
        '
        );

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if($project == flase)
        {
            return null;
        }

        return new Project(
            $project['title'],
            $project['description'],
            $project['image']
        );
    }

    public function addProject(Project $project): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO projects (title, description, created_at, id_assigned_by, image)
        VALUES (?,?,?,?,?)'
        );

        $assignedBy = 1;

        $stmt->execute([
           $project->getTitle(),
           $project->getDescription(),
           $date->format('Y-m-d'),
           $assignedBy,
           $project->getImage()
        ]);
    }
}