<?php

Class FreeLancer {
    
    private $name;
    private $skills = [];
    private $rating;

    public function __construct($name, $skills = [""], $rating = 0) {
        $this->name = $name;
        $this->skills = $skills;
        $this->rating = $rating;
    }

    public function addSkill($skill) {
        $this->skills[] = $skill;
    }

    public function setRating($rating) {
        if ($rating >= 0 && $rating <= 5) {
            $this->rating = $rating;
        } else {
            throw new InvalidArgumentException("Avaliação deve ser de 0 a 5.");
        }
    }

    public function getProfile() {
        return "Freelancer: {$this->name}\n"
             . "Skills: " . implode(", ", $this->skills) . "\n"
             . "Rating: {$this->rating}/5\n";
    }
}

?>