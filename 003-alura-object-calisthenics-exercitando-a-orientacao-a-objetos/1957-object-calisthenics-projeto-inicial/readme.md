```shell
# composer install
docker build -t php-003 .
docker run -it --volume $PWD:/usr/src/myapp --name php-003-rodando php-003
```

# Boas práticas
- Nunca use (ou pelo menos evite) getters e setters.
  - Utilizar métodos de acesso a nossas propriedades faz sentido, desde que nós não utilizemos o retorno para tomar decisões que poderiam estar encapsuladas na classe.
- Ter apenas 1 nível de indentação por método 
  - extrair métodos quando necessário
- Nunca usar else 
  - usar early return, fail fast