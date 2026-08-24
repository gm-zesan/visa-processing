<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = array(
            array('id' => '1', 'category_id' => '1', 'title' => 'What visa do you need to work legally in Singapore?','slug' => 'blog-title-1','description' => '<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache.</p>

            <p>Bccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo .</p>

            <p>Bccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>','image' => 'upload/blog/20240316081930.jpg','created_by' => 'G.M. Zesan','created_at' => '2024-01-21 05:08:11','updated_at' => '2024-03-16 08:19:30'),
            array('id' => '2', 'category_id' => '2', 'title' => 'Top reasons for Australian working visa rejection','slug' => 'blog-title-2','description' => '<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache.</p>

            <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache. Incididunt ander labore amar sonar bangla ami.&nbsp; Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>

            <p>Bccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo .</p>

            <p>Bccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>','image' => 'upload/blog/20240316081942.jpg','created_by' => 'G.M. Zesan','created_at' => '2024-01-21 05:08:11','updated_at' => '2024-03-16 08:19:42'),
            array ('id' => '3', 'category_id' => '3', 'title' => 'Canada Federal Skilled Worker Program','slug' => 'blog-title-3','description' => '<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache.</p>

            <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache. Incididunt ander labore amar sonar bangla ami.&nbsp; Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>

            <p>Bccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo .</p>

            <p>Bccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>','image' => 'upload/blog/20240316081953.jpg','created_by' => 'Sabbir','created_at' => '2024-01-21 05:08:11','updated_at' => '2024-03-16 08:19:53'),
        );

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

    }
}
