<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogCategoryPolicy extends Policy
{

    protected $methods = ['index', 'create'];
    protected $replacedMethods = [
       
    ];
    public function index()
    {
        return $this->commonCheck;
    }

    public function create()
    {
        return $this->commonCheck;
    }

    public function store()
    {
        return $this->create();
    }
}
