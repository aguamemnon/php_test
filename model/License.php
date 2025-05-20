<?php
class License {
    private $id;
    private $key;
    private $status;
    private $user_id;

    public function __construct($id, $key, $status, $user_id) {
        $this->id = $id;
        $this->key = $key;
        $this->status = $status;
        $this->user_id = $user_id;
    }

    // Getters et setters
}