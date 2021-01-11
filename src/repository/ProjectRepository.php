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
            $project['image'],
            $project['id'],
            $project['id_animal_category'],
            $project['id_user']
        );
    }

    public function getProjects(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM Animal;
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach ($projects as $project) {
             $result[] = new Project(
                 $project['title'],
                 $project['description'],
                 $project['image'],
                 $project['id'],
                 $project['id_animal_category'],
                 $project['id_user']
             );
         }
       return $result;
   }

    public function addProject(Project $project): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO Animal (id_animal_category, id_user, "name", description, image)
        VALUES (?,?,?,?,?)'
        );

        $assignedBy = 1;

        $stmt->execute([
           $project->getIdAnimalCategory(),
           $project->getIdUser(),
           $project->getTitle(),
           $project-> getDescription(),
           $project->getImage()
        ]);
    }

    public function getAnimalsCategory()
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM AnimalCategory
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($projects as $project) {
            $result[] = new AnimalsCategory(
                $project['id'],
                $project['name'],
                $project['description']
            );
        }
        return $result;
    }
}