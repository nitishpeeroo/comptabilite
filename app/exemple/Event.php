<?php

namespace Calendar;

class Event {

    private $id;
    private $name;
    private $description;
    private $start;
    private $end;

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description ?? '';
    }

    public function getStart(): \DateTime {
        return new \DateTime($this->start);
    }

    public function getEnd(): \DateTime {
        return new \DateTime($this->end);
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name) {
        $this->name = $name;
        return $this;
    }

    public function setDescription(string $description) {
        $this->description = $description;
        return $this;
    }

    public function setStart(string $start) {
        $this->start = $start;
        return $this;
    }

    public function setEnd(string $end) {
        $this->end = $end;
        return $this;
    }

}
