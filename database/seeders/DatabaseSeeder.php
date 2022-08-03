<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin Desa',
            'slug' => 'admin-desa',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('kosongin'),
            'role' => 'super-admin',
            'address' => 'Desa ini itu'
        ]);

        Profile::create([
            'site_name' => 'Desa Wisata',
            'email' => 'desawisata@gmail.com',
            'telephone' => '081717582871',
            'location' => 'Desa ini, kecamatan itu, kabupaten sini, provinsi sana'
        ]);

        About::create([
            'title' => 'Lorem Ipsum Dolor Sit Amet',
            'content' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem perspiciatis sapiente, esse assumenda distinctio minus! Numquam vero nesciunt eius beatae placeat deserunt quo, magnam nobis.</p><p> Maiores dicta quisquam sit provident fugiat corporis veniam laborum non est, blanditiis quos temporibus nam nisi sequi quibusdam possimus cum molestias ad aliquid, aut et? Beatae optio necessitatibus perspiciatis eius ipsum inventore hic quo nesciunt quibusdam suscipit aliquam ad ducimus officia, odit expedita distinctio cum voluptate, placeat nobis! Quidem delectus, fugit temporibus praesentium libero rerum tempore. Provident architecto debitis, eius ipsum vero voluptate quo commodi molestiae, recusandae nisi id eos corporis aliquid, quod dolores consequatur saepe et doloribus repellendus atque doloremque? Optio earum iste atque reiciendis in nulla, iusto sint modi voluptatibus quas dolor tenetur blanditiis illum vitae a at, itaque laboriosam.</p><p> Exercitationem unde fugiat tempora sunt voluptas nobis quam necessitatibus porro impedit quo perferendis aliquam debitis, ratione fuga quos, deserunt ullam est cumque cum. Voluptate explicabo adipisci, eos vitae, natus assumenda illo ipsam cupiditate debitis recusandae, error ducimus quaerat? Expedita asperiores nam error aspernatur quidem consequatur nemo, aut cumque ducimus nihil aliquid hic? Vel iusto dolor dolore quos dolorum, minus, suscipit officia commodi adipisci sequi delectus error numquam, nemo illo exercitationem.</p><p> Quo accusantium labore placeat, laboriosam ullam ex tenetur harum fugit repellat eum natus totam sint repellendus! Accusantium excepturi sit sequi, dolores obcaecati officia nobis exercitationem, doloribus, voluptatum et sunt doloremque nihil reiciendis delectus maxime a. Ipsum officiis harum voluptas corporis eaque ducimus facere iusto, ad voluptate pariatur, sunt sed molestias quod hic sapiente assumenda doloribus dolor, consequuntur cum.</p>'
        ]);
    }
}
