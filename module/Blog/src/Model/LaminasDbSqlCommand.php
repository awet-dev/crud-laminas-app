<?php


namespace Blog\Model;


use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\Sql\Insert;
use Laminas\Db\Sql\Sql;
use RuntimeException;

class LaminasDbSqlCommand implements PostCommandInterface
{
    private $db;

    /**
     * LaminasDbSqlCommand constructor.
     * @param $db
     */
    public function __construct(AdapterInterface $db)
    {
        $this->db = $db;
    }


    public function insertPost(Post $post)
    {
        $insert = new Insert('posts');
        $insert->values([
            'title' => $post->getTitle(),
            'text' => $post->getText()
        ]);

        $sql = new Sql($this->db);
        $statement = $sql->prepareStatementForSqlObject($insert);
        $result = $statement->execute();

        if (! $result instanceof ResultInterface) {
            throw new RuntimeException(
                'Database error occurred during blog post insert operation'
            );
        }

        $id = $result->getGeneratedValue();

        return new Post($id, $post->getText(), $post->getTitle());
    }

    public function updatePost(Post $post)
    {
        // TODO: Implement updatePost() method.
    }

    public function deletePost(Post $post)
    {
        // TODO: Implement deletePost() method.
    }
}