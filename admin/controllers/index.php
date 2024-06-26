<?php
// Class AutoLoader implements
declare(strict_types=1);
spl_autoload_register(function ($class) {
    include_once  __DIR__ . "/$class.php";
});
require_once "config.php";
// Db instant
$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
// Controllers intialized
$auth = new AuthController($database);
$user = new UserController($database);
$admin = new AdminController($database);
$doc = new DocController($database);
$my_clients = new MyClientsController($database);
$med = new MedController($database);
$log = new LogController($database);
$todo_tasks = new TodoTasksController($database);
$notification = new NotificationController($database);
$todo = new ToDoController($database);
$todo_categories = new TodoCategoryController($database);
$todo_items = new TodoItemController($database);
$todo_participants = new ToDoParticipantController($database);
$allergy = new AllergyController($database);
$client_allergies = new ClientAllergiesController($database);
$doctor = new DoctorController($database);
$dentist = new DentistController($database);
$benifit = new BenifitController($database);
$risk = new RiskController($database);
$client_fin = new ClientFinController($database);
$support_plan  = new SupportPlanController($database);
$health = new HealthController($database);
$shift=new Shift_planController($database);
$shift_admin=new Shift_adminsController($database);

// Db controller 
$db = new DbController($database);



function dd($res){
var_dump($res);
exit;
}