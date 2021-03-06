   
# API Teste Genezys

API REST criada para teste da empresa genesys. Essa API permite visualizar, alterar e deletar informações de produtos e lojas.

Recursos disponíveis para acesso via API:

### Produtos
| Método | EXP Comando | Descrição|
|---|---|---|
| `GET`    | http://localhost:8000/api/produto/     |Retorna informações de todos os produtos registrados. |
| `GET`    | http://localhost:8000/api/produto/{id} |Retorna informações de um produto utilizando o ID.|
| `POST`   | http://localhost:8000/api/produto?nome=Tablet&valor=1100&ativo=0&loja_id=1 |Cadastra um novo produto. |
| `PATCH`  | http://localhost:8000/api/produto/{id}?nome=cadeira&valor=150&ativo=1&loja_id=2  |Atualiza dados de um produto. |
| `DELETE` | http://localhost:8000/api/produto/{id}  |Remove um produto do sistema. |

#### Exemplo de Retorno
##### GET: http://localhost:8000/api/produto/
    [
    {
        "id": 13,
        "nome": "celular",
        "valor": "R$1.500,00",
        "ativo": 1,
        "loja_id": 2,
        "created_at": "2022-03-05T19:52:05.000000Z",
        "updated_at": "2022-03-05T22:42:31.000000Z"
    },
    {
        "id": 14,
        "nome": "celular",
        "valor": "R$200,00",
        "ativo": 0,
        "loja_id": 2,
        "created_at": "2022-03-05T19:52:54.000000Z",
        "updated_at": "2022-03-05T19:52:54.000000Z"
    },
    {
        "id": 15,
        "nome": "Tablet",
        "valor": "R$11,00",
        "ativo": 0,
        "loja_id": 1,
        "created_at": "2022-03-05T20:07:02.000000Z",
        "updated_at": "2022-03-05T20:07:02.000000Z"
    },
    {
        "id": 17,
        "nome": "Tablet",
        "valor": "R$900,00",
        "ativo": 0,
        "loja_id": 2,
        "created_at": "2022-03-05T20:15:38.000000Z",
        "updated_at": "2022-03-05T20:52:00.000000Z"
    }
    ]
##### GET: http://localhost:8000/api/produto/13
    {
        "id": 13,
        "nome": "celular",
        "valor": "R$1.500,00",
        "ativo": 1,
        "loja_id": 2,
        "created_at": "2022-03-05T19:52:05.000000Z",
        "updated_at": "2022-03-05T22:42:31.000000Z"
    }

##### POST: http://localhost:8000/api/produto?nome=Tablet&valor=1100&ativo=0&loja_id=1

    {
    "success": true
    }
    
##### PATCH: http://localhost:8000/api/produto/14?nome=notebook&valor=3000&ativo=1&loja_id=2
    {
    "id": 14,
    "nome": "notebook",
    "valor": "R$3.000,00",
    "ativo": "1",
    "loja_id": "2",
    "created_at": "2022-03-05T19:52:54.000000Z",
    "updated_at": "2022-03-05T23:10:20.000000Z"
    }
##### DELETE: http://localhost:8000/api/produto/14

    {
    "success": true
    }
    
### Loja
| Método | EX Comando | Descrição|
|---|---|---|
| `GET`    | http://localhost:8000/api/loja/     |Retorna informações de todas as lojas registradas. |
| `GET`    | http://localhost:8000/api/loja/{id} |Retorna informações da loja selecionada pelo id e todos os produtos da loja|
| `POST`   | http://localhost:8000/api/loja?nome=havan&email=financeiro@havan.com.br |Cadastra uma nova loja |
| `PATCH`  | http://localhost:8000/api/loja/{id}?email=financeiro@havan.com.br  |Atualiza dados de uma loja. |
| `DELETE` | http://localhost:8000/api/loja/{id}  |Remove uma loja do sistema. |


#### Exemplo de Retorno
##### GET: http://localhost:8000/api/loja/

    [
        {
            "id": 1,
            "nome": "Amazon",
            "email": "atendimento@magalu.com.br",
            "created_at": null,
            "updated_at": "2022-03-05T00:04:36.000000Z"
        },
        {
            "id": 2,
            "nome": "casas bahia",
            "email": "financeiro@casasbahia.com.br",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "nome": "Americanas",
            "email": "financeiro@americanas.com",
            "created_at": "2022-03-05T16:25:19.000000Z",
            "updated_at": "2022-03-05T16:26:42.000000Z"
        },
        {
            "id": 13,
            "nome": "havan",
            "email": "financeiro@havan.com.br",
            "created_at": "2022-03-05T20:43:55.000000Z",
            "updated_at": "2022-03-05T20:49:21.000000Z"
        }
    ]
  
##### GET: http://localhost:8000/api/loja/2
        [
        {
            "id": 2,
            "nome": "casas bahia",
            "email": "financeiro@casasbahia.com.br",
            "created_at": null,
            "updated_at": null,
            "produtos": [
                {
                    "id": 13,
                    "nome": "celular",
                    "valor": "R$1.500,00",
                    "ativo": 1,
                    "loja_id": 2,
                    "created_at": "2022-03-05T19:52:05.000000Z",
                    "updated_at": "2022-03-05T22:42:31.000000Z"
                },
                {
                    "id": 14,
                    "nome": "notebook",
                    "valor": "R$3.000,00",
                    "ativo": 1,
                    "loja_id": 2,
                    "created_at": "2022-03-05T19:52:54.000000Z",
                    "updated_at": "2022-03-05T23:10:20.000000Z"
                },
                {
                    "id": 17,
                    "nome": "Tablet",
                    "valor": "R$900,00",
                    "ativo": 0,
                    "loja_id": 2,
                    "created_at": "2022-03-05T20:15:38.000000Z",
                    "updated_at": "2022-03-05T20:52:00.000000Z"
                }
            ]
        }
    ]
##### POST: http://localhost:8000/api/loja?nome=havan&email=financeiro@havan.com.br
    {
    "success": true
    }
##### PATCH: http://localhost:8000/api/loja/1?email=atendimento@amazon.com.br
    {
    "id": 1,
    "nome": "Amazon",
    "email": "atendimento@amazon.com.br",
    "created_at": null,
    "updated_at": "2022-03-05T23:43:00.000000Z"
    }
##### DELETE: http://localhost:8000/api/loja/4
     {
    "success": true
     }


### Teste Automatizando
Foram criados testes automatizados para testar a API. Localizados no diretório Tests\Feature\Controllers.

### Migrations
O programa possui migrations para que as tabelas sejam criadas. Porém não terão registro.
