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
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
        $this->userRepository = new UserRepository();
    }

    public function addProject()
    {
        $animal_category = $this->projectRepository->getAnimalsCategory();

        if ($this->isPost()
            && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validate($_FILES['file']))
        {
            print $_FILES['file']['name'];
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
            $user = $this->userRepository->getUser($_COOKIE['user']);
            //string $title, string $description, string $image, int $id=null,
            // int $id_animal_category=null, int $id_user=null, string $address, string $country, string $place, string $phone
            $project = new Project($_POST['name-animal'], $_POST['description'], $_FILES['file']['name'], null,
                $_POST['category-animal'], $this->userRepository->getUserDetailsId($user),
                $_POST['address'], $_POST['country'], $_POST['locality'], $_POST['phone-number']);
            $this->projectRepository->addProject($project);

            return $this->render("addProject", ['messages' => ['Ad has been successfully added'], 'animals_category' => $animal_category]);
        }
        $this->render("addProject", ['animals_category' => $animal_category]);
    }

    public function animalCategory()
    {
        $animals_category = $this->projectRepository->getAnimalsCategory();
        $this->render('animalCategory', ['animals_category' => $animals_category]);
//        $this->render('animalCategory');
    }

    public function foundAnimals($id)
    {
        if($id == null){
            $animals = $this->projectRepository->getProjects();
        }
        else{
            $animals = $this->projectRepository->getProjectsById($id);
        }
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

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->projectRepository->getProjectByTitle($decoded['search']));
        }
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
