<?php


namespace Blog\Model;


class Post
{
    private $id;
    private $text;
    private $title;

    /**
     * Post constructor.
     * @param $id
     * @param $text
     * @param $title
     */
    public function __construct($id, $text, $title)
    {
        $this->id = $id;
        $this->text = $text;
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }



}