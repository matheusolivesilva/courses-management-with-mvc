<?php
namespace Alura\Courses\Entity;

/**
 * @Entity
 * @Table(name="courses")
 */
class Course implements \JsonSerializable
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

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
	    'description' => $this->description
	];
    }
}

