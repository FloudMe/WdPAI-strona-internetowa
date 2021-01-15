<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Project.php';
require_once __DIR__ .'/../models/AnimalsCategory.php';
require_once __DIR__.'/../repository/ProjectRepository.php';

class ProjectController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $projectRepository;

    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
    }

    public function addProject()
    {
        if ($this->isPost()
            && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validate($_FILES['file']))
        {
            print $_FILES['file']['name'];
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            //string $title, string $description, string $image, int $id=null,
            // int $id_animal_category=null, int $id_user=null, string $address, string $country, string $place, string $phone
            $project = new Project($_POST['name-animal'], $_POST['description'], $_FILES['file']['name'], null,
                null,null, $_POST['address'], $_POST['country'], $_POST['locality'], $_POST['phone-number']);
            $this->projectRepository->addProject($project);

            return $this->render("animalCategory", ['messages' => $this->messages, 'projects-form'=>$project]);
        }

        $this->render("addProject");
    }

    public function animalCategory()
    {
        $animals_category = $this->projectRepository->getAnimalsCategory();
        $this->render('animalCategory', ['animals_category' => $animals_category]);
//        $this->render('animalCategory');
    }

    public function foundAnimals()
    {
        $animals = $this->projectRepository->getProjects();
        $this->render('foundAnimals', ['animals' => $animals]);

//        $this->render('foundAnimals');

    }

    public function addCategory(){

        if ($this->isPost()
            && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validate($_FILES['file']))
        {
            print $_FILES['file']['name'];
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $animalCategory = new AnimalsCategory(null, $_POST['name-animal-category'], $_POST['description'], $_FILES['file']['name']);

            $this->projectRepository->addCategory($animalCategory);

            return $this->render("addCategory", ['messages' => $this->messages, 'addCategory'=>$animalCategory]);
        }
        $this->render('addCategory');
    }

    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE)
        {
            $this->messages[] = 'File is to large for destionation file system';
            return false;
        }

        if(!isset($file['type'])
            || !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[]="File type is not supported";
            return false;
        }

        return true;
    }
}
