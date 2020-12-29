<?php


namespace Blog\Model;


use DomainException;

class PostRepository implements PostRepositoryInterface
{

    private $data = [
        1 => [
            'id'    => 1,
            'title' => 'Hello World #1',
            'text'  => 'This is our first blog post!',
        ],
        2 => [
            'id'    => 2,
            'title' => 'Hello World #2',
            'text'  => 'This is our second blog post!',
        ],
        3 => [
            'id'    => 3,
            'title' => 'Hello World #3',
            'text'  => 'This is our third blog post!',
        ],
        4 => [
            'id'    => 4,
            'title' => 'Hello World #4',
            'text'  => 'This is our fourth blog post!',
        ],
        5 => [
            'id'    => 5,
            'title' => 'Hello World #5',
            'text'  => 'This is our fifth blog post!',
        ],
    ];


    public function findAllPosts()
    {
        return array_map(function ($post) {
            return new Post($post['id'], $post['text'], $post['title']);
        }, $this->data);
    }

    public function findPost($id)
    {
        if (! isset($this->data[$id])) {
            throw new DomainException('Post by id "%s" not found', $id);
        }

        $post = $this->data[$id];
        return new Post($post['id'], $post['text'], $post['title']);
    }
}