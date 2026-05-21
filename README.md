# RH Pointer

Sistema de Gerenciamento de ponto de RH, para sistemas empresarias de micro e pequeno porte

<p align="center">
  <a href="https://go-skill-icons.vercel.app">
    <img src="https://go-skill-icons.vercel.app/api/icons?i=composer,php,mysql,apache,docker,html,css,javascript,jquery&perline=15&theme=dark" />
  </a>
</p>


O RHPointer é um sistema de gerenciamento de ponto eletrônico desenvolvido em php, de forma que pode ser usado para trackear as horas trabalhadas


### Tecnologias

Dentre as tecnologias usadas, temos:

- Jquery
- Javascript
- HTML/CSS
- PHP
- Composer
- Docker
- Apache
- MySQL


## Executando código

Para executar o código, deve ter em mente a necessidade de rodar o Docker, tendo em vista que estamos executando conjutanmente:

- Docker
- Apache
- PHP
- MySQL

Com isso, temos que a execução do código pode ser feita a partir de:

```bash
docker compose up --build
```

Posteriormente à construção de todos os containers, de forma que vamos ter eles executando dentro do nosso sistema, podemos criar as tabelas dentro do banco de dados, com as ferramentas de migração do php, que seria o **phinx**.

```bash
docker compose exec -it app bash
vendor/bin/phinx migrate
```

Com isso, as tabelas vão ser criadas dentro do banco de dados, e vamos poder ter a capcidade de persistir os dados dentro de um sistema web o qual estamos construindo.