<?php

namespace Tests\Feature\Controllers;

use App\Models\Produtos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ProdutoControllerTests extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //  testa se não ocorreu nenhum erro na resposta e se as informações estão corretas
    public function testIndexReturnsDataInValidFormat()
    {
        $this->json('get', 'api/produto')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    [

                        'nome',
                        'valor',
                        'ativo',
                        'loja_id'
                    ]
                ]
            );
    }
    public function testShowReturnsDataInValidFormat()
    {
        $this->json('get', 'api/produto/1')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'nome',
                    'valor',
                    'ativo',
                    'loja_id'
                ]
            );
    }
    public function testStoreReturnsDataInValidFormat()
    {
        $this->json('post', 'api/produto?nome=teste&valor=200&ativo=1&loja_id=1')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'success'
                ]
            );
    }
    public function testUpdateReturnsDataInValidFormat()
    {
        $id_product = Produtos::select('id')->latest()->first();
        $this->json('patch', 'api/produto/' . $id_product['id'] . '?nome=testeUpdate&valor=500&ativo=0&loja_id=2')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [

                    'nome',
                    'valor',
                    'ativo',
                    'loja_id'
                ]
            );
    }
    public function testDeleteReturnsDataInValidFormat()
    {
        $id_product = Produtos::select('id')->latest()->first();
        $this->json('delete', 'api/produto/' . $id_product['id'])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'success'
                ]
            );
    }
}