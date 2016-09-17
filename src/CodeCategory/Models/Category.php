<?php
namespace CodePress\CodeCategory\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Category extends Model implements SluggableInterface

{

    use SluggableTrait;
    
    private $validator;

    protected $table = "codepress_categories" ;

    protected $fillable = [
    'name','slug','active','parent_id' // categoria poderá ter outra categoria como pai
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'unique'     => true
    ];

    public function parent(){
        return $this->belongsTo(Category::class);
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function categorizable(){ //O método categorizable será útil para permitir categorizar todos outros tipos de model. Ex: páginas, produtos e etc
        return $this->morphTo();
    }

   public function setValidator($validator){
       $this->validator = $validator;
   }

   public function getValidator(){
       return $this->validator;
   }

}