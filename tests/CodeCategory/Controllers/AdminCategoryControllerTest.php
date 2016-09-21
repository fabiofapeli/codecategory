<?php

namespace CodePress\CodeCategory\Tests\Controllers;

use CodePress\CodeCategory\Controllers\Controller;
use CodePress\CodeCategory\Controllers\AdminCategoryController;
use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Tests\AbstractTestCase;
use Mockery as m;

class AdminCategoryControllerTest extends AbstractTestCase
{

    public function test_should_extend_from_controller(){
        $category = m::mock(Category::class);
        $controller = new AdminCategoryController($category);
        
        $this->assertInstanceOf(Controller::class, $controller); 
    }

}

