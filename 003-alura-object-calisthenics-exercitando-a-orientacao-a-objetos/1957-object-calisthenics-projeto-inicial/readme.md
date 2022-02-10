```shell
# composer install
docker build -t php-003 .
docker run -it --volume $PWD:/usr/src/myapp --name php-003-rodando php-003
docker start php-003-rodando
```

# Boas práticas
1. Nunca use (ou pelo menos evite) getters e setters.
   - Utilizar métodos de acesso a nossas propriedades faz sentido, desde que nós não utilizemos o retorno para tomar decisões que poderiam estar encapsuladas na classe.
2. Ter apenas 1 nível de indentação por método 
    - extrair métodos quando necessário
3. Nunca usar else 
    - usar early return, fail fast
4. Envolva tipos primitivos (quando houver comportamento)
    - ex: email: string - > Email
5. Coleções de primeira classe (First-class collections)
    - Ao envolver uma estrutura de dados, deixa-la como único atributo da classe
6. Apenas 1 "ponto" (operador de acesso, PHP "->") por linha
    - exceção: interface fluente "return self" ($obj->select()->where()->limit())
    - lei de Demeter
7. NUNCA abrevie
8. Mantenha pacotes (máx 10 itens) / classes (máx 50 linhas) / métodos (máx tela?) pequenos
9. Tenha no máximo 2 propriedades por classe (?! meio irreal, desconfiar acima de 5 já é um bom começo)

Object calisthenics são exercícios de programação, formalizados como um conjunto de 9 regras, inventadas por Jeff Bay em seu livro The ThoughtWorks Anthology