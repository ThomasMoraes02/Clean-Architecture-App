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

// infraestructure
// mail
// phpmailer

repositorio de indicacao