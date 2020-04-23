<?php
namespace Alura\Courses\Entity;

/**
 * @Entity
 * @Table(name="courses")
 */
class Course 
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $description;

    public function getId(): int
    {
         return $this->id;
    }
   
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): voud
    {
        $this->description = $description;
    }
}

