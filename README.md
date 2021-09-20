# Avalyst - Teste

Teste de [back-end (PHP)](back-end/README.md) e [front-end (Angular)](front-end/README.md).

## Tarefas

- criar um método *search* para o serviço **Contact** para realizar uma busca e retornar o resultado, sendo:  
  - o termo a ser buscado deverá vir no parametro `query`;
  - o método deve ser do tipo `POST`;
  - a busca do termo deverá procurar por parte de nome ou e-mail;  
  - o método deve retornar uma `array` com todos os resultados.

- adicionar o campo `phone` ao serviço **Contact**, sendo:
  - este campo não é obrigatório;
  - caso preenchido deve ser formatado no padrão `(00) 00000-0000`.

- criar um novo serviço **User**, com os campos: `name`, `email` e `password`, sendo:  
  - o novo serviço deve ter um método para cadastro e outro para retornar a lista;
  - a senha deve ser armazenada criptografada no banco de dados;
  - a lista deve não deve retornar as senhas;
  - não é necessário criar a autenticação.

## Observações

- as tarefas devem ser criadas no back-end e no front-end;
- são necessárias as ferramentas `composer`, `Angular CLI` e `npm`;
- não é necessário a criação de ambiente de servidor web local para executar este teste, basta PHP instalado;
- é necessário ter banco de dados MySQL local.

## Dicas

- consulte os arquivos **README** das duas aplicações [back-end (PHP)](back-end/README.md) e [front-end (Angular)](front-end/README.md) para informações sobre instalação.
- manual do ORM [Eloquent](https://laravel.com/docs/8.x/eloquent);
- manual do [Respect\Validation](https://respect-validation.readthedocs.io/en/1.1/);
- ao finalizar enviar o pacote de arquivos para charles@avalyst.com.br.
