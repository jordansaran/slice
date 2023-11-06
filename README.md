<p align="center">
    <h2 align="center">
        Slice API
    </h2>
    <a href="https://github.com/jordansaran/stationery-shop-api/actions">
      <img alt="Tests Passing" src="https://github.com/jordansaran/slice/workflows/slice-test-coverage/badge.svg" />
    </a>
    <a href="https://codecov.io/gh/jordansaran/sales-api">
      <img src="https://codecov.io/gh/jordansaran/stationery-shop-api/branch/main/graph/badge.svg" />
    </a>
    <a href="https://github.com/jordansaran/stationery-shop-api/issues">
      <img alt="Issues" src="https://img.shields.io/github/issues/jordansaran/slice?color=0088ff" />
    </a>
    <a href="https://github.com/jordansaran/stationery-shop-api/pulls">
      <img alt="GitHub pull requests" src="https://img.shields.io/github/issues-pr/jordansaran/slice?color=0088ff" />
    </a>
</p>

Foi desenvolvido uma API onde seu objetivo é ler arquivos CSV e adicionar ao banco de dados e ler CEP integrado com a API dos correios.

# 1.Instalação
Certifique-se de utilizar a última versão do código fonte, que normalmente fica na branch "main"(principal) do repositório do github.
Logo abaixo é apresentado opções de instalação de ambiente, sendo:
1. Docker

````shell
# clone o repositório
$ git clone https://github.com/jordansaran/slice.git
$ cd slice/correios-api
````

# 1. Docker

## 1.1. Docker

Para replicar o ambiente de desenvolvimento e colocar em execução a API, execute o comando logo abaixo.
Destacando que é necessário que seu ambiente de desenvolvimento possua [**Docker**](https://www.docker.com/products/docker-desktop/) instalado.
```
docker-compose up docker-slice-api
```
### Observações
A url de acesso a API é **http://0.0.0.0:8000/**, caso deseje alterar a porta de acesso modifique
o arquivo **docker-compose.yml** no parametro **ports** (8000:8000).

## 1.2. Docker
Apenas execute o seguinte comando para inicializar o container da aplicação via terminal ou IDE para inseir os seeders dentro do banco de dados.
````shell
docker-compose start docker-slice-api
````

# Documentação

Para acessar os endpoints:

1. GET - http://127.0.0.1:8000/sales/
2. GET - http://127.0.0.1:8000/sales/{id}
3. POST - http://127.0.0.1:8000/sales/
4. PUT - http://127.0.0.1:8000/sales/{id}
5. DELETE - http://127.0.0.1:8000/sales/{id}
6. POST - http://127.0.0.1:8000/sales/upload/csv
7. GET - http://127.0.0.1:8000/cep/

[POSTMAN](Slice.postman_collection.json) para importar.