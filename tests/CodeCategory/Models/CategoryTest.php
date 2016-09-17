<?php
namespace CodePress\CodeCategory\Tests\Models;
use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Tests\AbstractTestCase;
use Illuminate\Validation\Validator;
use Mockery as m;

class CategoryTest extends AbstractTestCase
{

    public function setUp(){
        parent::setUp();
        $this->migrate();
    }

    public function test_check_if_a_category_can_be_persisted(){

        $category = Category::create(['name' => 'Category Test', 'slug' => 'category-test', 'active' => true]);
        $this->assertEquals('Category Test',$category->name);

        $category = Category::all()->first();
        $this->assertEquals('Category Test',$category->name);

    }

    public function test_check_if_can_assign_a_parent_to_a_category(){

        $parentCategory = Category::create(['name' => 'Parent Test', 'slug' => 'parent-test', 'active' => true]);

        $category  = Category::create(['name'=>'Category Test', 'slug' => 'category-test','active' => true]);

        $category->parent()->associate($parentCategory)->save();

        $child = $parentCategory->children()->first();

        $this->assertEquals('Category Test',$child->name);
        $this->assertEquals('Parent Test',$category->parent->name);
    }

    public function test_inject_validator_in_category_model(){
       $category = new Category();
       $validator = m::mock(Validator::class); // Uso do mockery para simular classe
       $category->setValidator($validator);
       //Test  
       $this->assertEquals($category->getValidator(), $validator);
   }

}