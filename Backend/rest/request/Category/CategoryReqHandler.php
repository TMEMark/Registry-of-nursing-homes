<?php
    class CategoryReqHandler {
        private CategoryService $categoryService;

        public function __construct(CategoryService $categoryService) {
            $this->categoryService = $categoryService;
        }


        public function handleRequests() {
            if (isset($_GET['getById']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
                echo json_encode($this->categoryService->getCategoryById());
            }
            if (isset($_GET['getByName']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
                echo json_encode($this->categoryService->getCategoryByName());
            }
            if (isset($_GET['listAll']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
                echo json_encode($this->categoryService->listCategories());
            }
            if (isset($_GET['insert']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $body = file_get_contents("php://input");
                $event = json_decode($body);
                $this->categoryService->insertCategory($event);
            }
            if (isset($_GET['update']) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
                $body = file_get_contents("php://input");
                $event = json_decode($body);
                $this->categoryService->updateCategory($event);
            }

            if (isset($_GET['delete']) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $this->categoryService->updateCategory($event);
            }
        }
    }
?>