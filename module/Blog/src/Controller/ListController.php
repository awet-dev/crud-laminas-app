<?php


namespace Blog\Controller;

use Blog\Model\PostRepositoryInterface;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class ListController extends AbstractActionController
{
    private $postRepository;

    /**
     * ListController constructor.
     * @param $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function indexAction(): ViewModel
    {
        return new ViewModel([
            'posts' => $this->postRepository->findAllPosts()
        ]);
    }

    public function getPostAction($id): ViewModel
    {
        return new ViewModel([
            'posts' => $this->postRepository->findPost($id)
        ]);
    }
}