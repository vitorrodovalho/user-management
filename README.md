# User Management
Gerenciamento de usuário possibilitando mais de um endereço por cadastro

### Login
<img width="850" src="http://vitortoledo.com.br/print_login.png">

### Index
<img width="850" src="http://vitortoledo.com.br/print_index.png">

### Criação Usuário
<img width="850" src="http://vitortoledo.com.br/print_create.png">

### Script Criação Banco
```sql
CREATE DATABASE user_management;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `EMAIL_UNIQUE` (`email`)
);

CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `postal_code` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `neighborhood` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
```
