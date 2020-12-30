<?php


namespace Blog\Controller;

use Blog\Model\PostRepositoryInterface;
use InvalidArgumentException;
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

    public function detailAction(): ViewModel
    {
        $id = $this->params()->fromRoute('id');

        try {
            $post = $this->postRepository->findPost($id);
        } catch (InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('blog');
        }
        return new ViewModel([
            'post' => $post
        ]);
    }
}