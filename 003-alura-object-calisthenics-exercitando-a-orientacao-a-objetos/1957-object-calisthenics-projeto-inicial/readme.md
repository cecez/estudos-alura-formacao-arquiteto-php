```shell
# composer install
docker build -t php-003 .
docker run -it --volume $PWD:/usr/src/myapp --name php-003-rodando php-003
docker start php-003-rodando
```

# Boas práticas
- Nunca use (ou pelo menos evite) getters e setters.
  - Utilizar métodos de acesso a nossas propriedades faz sentido, desde que nós não utilizemos o retorno para tomar decisões que poderiam estar encapsuladas na classe.
- Ter apenas 1 nível de indentação por método 
  - extrair métodos quando necessário
- Nunca usar else 
  - usar early return, fail fast
- Envolva tipos primitivos (quando houver comportamento)
  - ex: email: string - > Email
- Coleções de primeira classe (First-class collections)
  - Ao envolver uma estrutura de dados, deixa-la como único atributo da classe
- Apenas 1 "ponto" (operador de acesso, PHP "->") por linha
  - exceção: interface fluente "return self" ($obj->select()->where()->limit())
  - lei de Demeter
- NUNCA abrevie
- Mantenha pacotes (máx 10 itens) / classes (máx 50 linhas) / métodos (máx tela?) pequenos 