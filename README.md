We have 3 tables :
    post
    category
    category_post foreign key to category
php artisan make:model Post -m -c -f // m: migration, c: controller, f: factory fake data 
php artisan make:model Category -m -f
php artisan make:migration create_category_post_table



in Model Post
    public function scopePublished($query){
      $query->where("published_at", '<=', Carbon::now());
    }
    public function scopeFeatured($query){
      $query->where("featured", true); // if featured is true 
    }


'featuredPosts' => post::published()->take(3)->get(),


