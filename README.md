# Clean-Architecture-App

Projeto: Escola de Alunos

## Entidades
Uma entidade precisa ter uma entidade

- Aluno

## ValueObjects
Não precisa de identificação - são objetos de valor: email, cpf, telefone

## Named Constructos
Métodos de criação de um objeto


### O conceito de Services
Que há Domain, Application e Infrastructure Services:
- Domain Services são classes que representam uma ação entre mais de uma entidade
- Application Services controlam o fluxo de alguma regra em nossa aplicação
- Infrastructure Services são implementações de interfaces presentes nas camadas de domínio ou de aplicação

Os termos Use Case, Application Service e Command Handler são basicamente sinônimos e servem para fornecer pontos de entrada na sua aplicação, de forma independente dos mecanismos de entrega (Web, CLI, etc).

// infraestructure
// mail
// phpmailer

repositorio de indicacao

Conhecemos o termo Linguagem Ubíqua que consiste em ter uma linguagem onipresente entre a equipe de desenvolvimento e a equipe de negócios.