<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\TestProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProductTest extends TestCase
{
//    use RefreshDatabase;

    protected function setUp(): void
    {
//        parent::setUp();
//        $adminRole = Role::create([
//            'name' => 'admin'
//        ]);
//        $userRole = Role::create([
//            'name' => 'user'
//        ]);
//
//        $this->user = User::create([
//            'name' => 'Test Name',
//            'email' => 'testemail@yandex.ru',
//            'password' => Hash::make('123'),
//            'role_id' => $userRole->id
//        ]);
//        $this->user->email_verified_at = now();
//        $this->user->save();
//
//        $this->userAdmin = User::create([
//            'name' => 'Test Name Admin',
//            'email' => 'testemailAdmin@yandex.ru',
//            'password' => Hash::make('123'),
//            'role_id' => $adminRole->id
//        ]);
//        $this->userAdmin->email_verified_at = now();
//        $this->userAdmin->save();
//
//        $this->seed(TestProductSeeder::class);
    }

    public function test_get_products(): void
    {
        $products = $this->get('/products');

        $products->assertOk();
        dump($products);
    }

    public function test_store_products(): void
    {
        $this->withoutExceptionHandling();

        $products = $this->post('/products/store', ['name' => 'testName1234567', 'article' => 'testArticle']);
        $products->assertStatus(201);
        dump($products->status());
        dump($products);
    }

    public function test_update_products(): void
    {
        $this->withoutExceptionHandling();

        $id = 1;
        $oldProduct = Product::find($id);
        dump($oldProduct);

        $response = $this->post("/products/update/$id", ['name' => 'testName1234567', 'article' => 'testArticle']);
        $newProducts = Product::find($id);
        dump($newProducts);
    }

    public function test_role_products(): void
    {
        $this->withoutExceptionHandling();
//        $this->actingAs($this->userAdmin);
        $this->actingAs($this->user);
        $id = 1;
        $response = $this->post("/products/update/$id", ['name' => 'testName1234567', 'article' => 'testArticle']);
        dump($response);
    }

    public function test_notify()
    {
        $arr = ['one' => 111, 'two' => 222, 'three' => 333, 'four' => 444];
        $arrayTwo = [1,2,3,4,5,6,7,8];
        $attributes = implode(':', $arr);
        $ind = array_search(5, $arrayTwo);
        dump($attributes, $ind);

    }
}
