<?php

require_once "Repository.php";
require_once __DIR__.'/../models/AnimalsCategory.php';
require_once __DIR__.'/../models/Project.php';

class ProjectRepository extends Repository
{
    public function getProject(int $id): ?Project
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "animal" WHERE id = :id
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
            $project['id_user'],
            $project['address'],
            $project['country'],
            $project['place'],
            $project['phone']
        );
    }

    public function getProjects(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "Animal";
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach ($projects as $project) {
             $result[] = new Project(
                 $project['name'],
                 $project['description'],
                 $project['image'],
                 $project['id'],
                 $project['id_animal_category'],
                 $project['id_user'],
                 $project['address'],
                 $project['country'],
                 $project['place'],
                 $project['phone']
             );
         }
       return $result;
   }

    public function addProject(Project $project): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO "Animal" (id_animal_category, id_user, "name", address, place, country, phone, description, image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );

        $assignedBy = 1;

        $stmt->execute([
           $project->getIdAnimalCategory(),
           $project->getIdUser(),
           $project->getTitle(), //name
            $project->getAddress(),
           $project->getPlace(),
           $project->getCountry(),
           $project->getPhone(),
           $project-> getDescription(),
           $project->getImage(),
        ]);
    }

    public function getAnimalsCategory()
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "Animal_category"
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($projects as $project) {
            $result[] = new AnimalsCategory(
                $project['id'],
                $project['name'],
                $project['description'],
                $project['image']
            );
        }
        return $result;
    }

    public function addCategory(AnimalsCategory $animalCategory)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO "Animal_category" ("name", description, image)
        VALUES (?, ?, ?)'
        );

        $assignedBy = 1;

        $stmt->execute([
            $animalCategory->getName(),
            $animalCategory->getDescription(),
            $animalCategory->getImage()
        ]);
    }
}