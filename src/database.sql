CREATE SCHEMA `atividades` DEFAULT CHARACTER SET latin1 ;


CREATE TABLE `atividades`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE `atividades`.`atividades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(600) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NULL,
  `status` INT NOT NULL,
  `situacao` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_atividades_status_idx` (`status` ASC),
  CONSTRAINT `fk_atividades_status`
    FOREIGN KEY (`status`)
    REFERENCES `atividades`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


INSERT INTO `atividades`.`status`
  (status)
VALUES
  ('Pendente'),
  ('Em Desenvolvimento'),
  ('Em Teste'),
  ('Concluído');