<?php

declare(strict_types=1);

namespace App\Shared\Define\Category;


class CategoryShared
{
    /**
     * @var int
     */
    public $cat_id;

    /**
     * @var string
     */
    public $cat_name;

    /**
     * @var int
     */
    public $pid;

    /**
     * @var string
     */
    public $desc;

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }

    /**
     * @param int $cat_id
     */
    public function setCatId(int $cat_id): void
    {
        $this->cat_id = $cat_id;
    }

    /**
     * @return string
     */
    public function getCatName(): string
    {
        return $this->cat_name;
    }

    /**
     * @param string $cat_name
     */
    public function setCatName(string $cat_name): void
    {
        $this->cat_name = $cat_name;
    }

    /**
     * @return int
     */
    public function getPid(): int
    {
        return $this->pid;
    }

    /**
     * @param int $pid
     */
    public function setPid(int $pid): void
    {
        $this->pid = $pid;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }

    public function toArray() {
         return [
            'cat_id' => $this->cat_id,
            'cat_name' => $this->cat_name,
            'pid' => $this->pid,
            'desc' => $this->desc,
        ];
    }

    public function toJson() {
        return json_encode($this->toArray());
    }

    public function castToClass(array $data) {
        $this->setCatId($data['cat_id']);
        $this->setCatName($data['cat_name']);
        $this->setPid($data['pid']);
        $this->setDesc($data['desc']);

        return $this;
    }

}
