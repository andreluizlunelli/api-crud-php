# api-crud-php

## Passos para executar

### Criar Banco
``create database apicrudphp``

### Atualizar dependencias
``composer update``

### Criar esquema das tabelas
``"vendor/bin/doctrine" orm:schema-tool:create"``

### Rotas em ``/api/person``
Arquivo de configuração das rotas em ``src/routes.php``
Ex:
```
GET /api/person
GET /api/person/{id}
GET /api/person?FILTRO
POST /api/person/{uf}
PUT /api/person/{uf}/{id}
DELETE /api/person/{id}
```

Os parâmetros no filtro correspondem aos atributos da classe ``Person``

### Testes
Contém alguns testes na pasta ``tests``